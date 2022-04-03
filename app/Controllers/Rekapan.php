<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use Config\Services;
use CodeIgniter\Controller;
use App\Models\dataModel;
use App\Models\personilModel;

class Rekapan extends BaseController
{

    public function index()
    {
        $session = session();
        $waktu = Time::now('Asia/Makassar', 'en_US')->getHour();
        $tanggal_filter = $this->request->getVar('date_filter');
        $pasaran_filter = $this->request->getVar('filter_pasaran');
        $db = \Config\Database::connect();
        $data = $db->table('data_angka')->where('tgl_pembelian =', $tanggal_filter)->where('id_pembelian =', $pasaran_filter);
        $rekap_nomor = $data->select('nomor_data')->selectSum("harga_beli")->groupBy("nomor_data")->get()->getResultArray();
        // CARI ID HAPUS ---------------------------------------------------------------
        $id_hapus = $db->query("SELECT * FROM data_angka")->getLastRow();
        if ($id_hapus != null) {
            $nomor_id = $id_hapus->id_hapus;
            $id_baru = (int)$nomor_id;
        } else {
            $id_baru = "kosong";
        }
        // CARI ID HAPUS ---------------------------------------------------------------
        if ($tanggal_filter != "") {
            $total = $data->selectSum("harga_beli")->where('tgl_pembelian =', $tanggal_filter)->where('id_pembelian =', $pasaran_filter)->get()->getRow();
            $jumlah_pembelian = $this->rupiah($total->harga_beli) . " " . "(" . $this->terbilang($total->harga_beli) . ")";
        } else {
            $jumlah_pembelian = "Belum Ada Data";
        }
        if ($tanggal_filter != "") {
            $tanggal_indo = $this->tanggal_indo($tanggal_filter = $this->request->getVar('date_filter'), true);
        } else {
            $tanggal_indo = "";
        }
        $myTime = Time::now('Asia/Hong_Kong', 'en_US')->toLocalizedString('yyyy-MM-dd');
        $judul = 'Sistem Rekapan Data Nomor';
        $isi = 'home/rekapan_nomor.php';
        $data = [
            'judul' => $judul,
            'isi'   => $isi,
            'waktu' => $waktu,
            'hari_ini' => $myTime,
            'rekap_nomor' => $rekap_nomor,
            'jumlah_pembelian' => $jumlah_pembelian,
            'tanggal_filter' => $tanggal_indo,
            'id_hapus' => $id_baru,
            'pasaran' => $pasaran_filter,
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('layout/v_wrapper.php', $data);
    }

    public function rekap_data()
    {
        $session = session();
        helper('form');
        if (!$this->validate([
            'data_angka' => [
                'rules' => 'required|CekDigit[data_angka]|CekPembelian[data_angka]',
                'errors' => [
                    'required' => 'Data Tidak Boleh Kosong',
                    'CekDigit' => 'Terdapat Kesalahan Format',
                    'CekPembelian' => 'Terdapat Pembelian di Bawah 500 Rupiah',
                ]
            ],
        ])) {
            return redirect()->to(base_url() . '/Home')->withInput();
        }
        $request = Services::request();
        $dataModel = new dataModel($request);
        if ($request->getMethod(true) == 'POST') {
            $pasaran = $this->request->getVar('pasaran');
            $id_hapus = $this->request->getVar('id_hapus');
            $tgl_pembelian = Time::now('Asia/Hong_Kong', 'en_US')->toLocalizedString('yyyy-MM-dd');
            $deret_nomor = $this->request->getVar('data_angka');
            if (strpos($deret_nomor, '+')) {
                $hasil = $this->rumus_pembelian_banyak($deret_nomor, $tgl_pembelian, $pasaran, $id_hapus);
            } else {
                $hasil = $this->rumus_pembelian($deret_nomor, $tgl_pembelian, $pasaran, $id_hapus);
            }
            $nomor_data = $hasil[0];
            $harga_beli = $hasil[1];
            $tgl_pembelian = $hasil[2];
            $id_pembelian = $hasil[3];
            $id_hapus = $hasil[4];
            $data = [];
            $tmp_data = [
                'nomor_data' => $nomor_data,
                'harga_beli' => $harga_beli,
                'tgl_pembelian' => $tgl_pembelian,
                'id_pembelian' => $id_pembelian,
                'id_hapus' => $id_hapus,
            ];
            foreach ($tmp_data as $k => $v) {
                for ($i = 0; $i < count($v); $i++) {
                    $data[$i][$k] = $v[$i];
                }
            }
            $insert = $dataModel->insertNomordata($data);
            if ($insert) {
                $session->setFlashdata('sukses', 'Nomor data Berhasil di Simpan');
                return redirect()->to(base_url() . '/Home');
            }
        }
    }

    public function hapus_data_terakhir()
    {
        $session = session();
        helper('filesystem');
        $request = Services::request();
        $dataModel = new dataModel($request);
        if ($request->getMethod(true) == 'POST') {
            $id_hapus = $this->request->getVar('delete_id');
            $hapus = $dataModel->hapusNomordata($id_hapus);
            if ($hapus) {
                $session->setFlashdata('sukses', 'Data Berhasil di Hapus');
                return redirect()->to(base_url() . '/Rekapan');
            }
        }
    }

    /* RUMUS PEMBELIAN */
    public function rumus_pembelian($deret_nomor, $tgl_pembelian, $pasaran, $id_hapus)
    {
        $pembelian = substr($deret_nomor, strrpos($deret_nomor, '#') + 1);
        $pembelian_pagar = substr($deret_nomor, strrpos($deret_nomor, '#'));
        $per_nomor = explode('*', $deret_nomor);
        $per_nomor_beli = str_replace($pembelian_pagar, "", $per_nomor);
        $per_pembelian = preg_replace('/[#&0-9]+/', $pembelian, $per_nomor);
        $per_tanggal = preg_replace('/[#&0-9]+/', $tgl_pembelian, $per_nomor);
        $per_pasaran = preg_replace('/[#&0-9]+/', $pasaran, $per_nomor);
        $per_id_hapus = preg_replace('/[#&0-9]+/', $id_hapus, $per_nomor);
        $array = array($per_nomor_beli, $per_pembelian, $per_tanggal, $per_pasaran, $per_id_hapus);
        return $array;
    }

    public function rumus_pembelian_banyak($deret_nomor, $tgl_pembelian, $pasaran, $id_hapus)
    {
        $pecah = explode('+', $deret_nomor);
        $per_pembelian = array_map(array($this, 'per_pembelian'), $pecah);
        $satukan = implode('+', $per_pembelian);
        $pembelian = explode('+', $satukan);
        $harga_beli = array_map(array($this, 'hanya_harga'), $pembelian);
        $nomor_data = array_map(array($this, 'hanya_nomor'), $pembelian);
        // Generating Array Tangal & Pasaran
        $per_tanggal = preg_replace('/[#&0-9]+/', $tgl_pembelian, $nomor_data);
        $per_pasaran = preg_replace('/[#&0-9]+/', $pasaran, $nomor_data);
        $per_id_hapus = preg_replace('/[#&0-9]+/', $id_hapus, $nomor_data);
        $array = array($nomor_data, $harga_beli, $per_tanggal, $per_pasaran, $per_id_hapus);
        return $array;
    }

    public function per_pembelian($nomor)
    {
        $pembelian = substr($nomor, strrpos($nomor, '#')) . "+";
        $hasil = str_replace('*', $pembelian, $nomor);
        return $hasil;
    }

    public function hanya_harga($nomor)
    {
        $hasil = substr($nomor, strrpos($nomor, '#') + 1);
        return $hasil;
    }

    public function hanya_nomor($nomor)
    {
        $hilangkan_harga = substr($nomor, strrpos($nomor, '#'));
        $hasil = str_replace($hilangkan_harga, "", $nomor);

        return $hasil;
    }

    /* FUNGSI PENDUKUNG LAINNYA */
    public function tanggal_indo($tanggal, $cetak_hari = false)
    {
        $hari = array(
            1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        $tgl_indo = $split[2] .
            ' ' . $bulan[(int) $split[1]] .
            ' ' . $split[0];
        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] .
                ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }

    public function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }

    public function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . " milyar" . $this->penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . " trilyun" . $this->penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    function rupiah($angka)
    {

        $hasil_rupiah = number_format($angka, 0, '.', '.');
        return $hasil_rupiah;
    }
}
