<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use Config\Services;
use CodeIgniter\Controller;
use App\Models\dataModel;
use App\Models\keuanganModel;

class Keuangan extends BaseController
{

    public function index()
    {
        $session = session();
        $request = Services::request();
        $judul = 'Laporan Keuangan';
        $isi = 'home/laporan_keuangan.php';
        $keuanganModel = new keuanganModel($request);
        $tgl_keluaran = $this->request->getVar('date_filter');
        $hasil_filter = $keuanganModel->where('tanggal =', $tgl_keluaran);
        $hasil_sydney = $hasil_filter->where('pasaran =', "SD")->where('tanggal =', $tgl_keluaran)->get()->getResultArray();
        $hasil_singapore = $hasil_filter->where('pasaran =', "SGP")->where('tanggal =', $tgl_keluaran)->get()->getResultArray();
        $hasil_hongkong = $hasil_filter->where('pasaran =', "HK")->where('tanggal =', $tgl_keluaran)->get()->getResultArray();

        if ($hasil_sydney != null) {
            $tampil_hasil = $hasil_sydney;
            foreach ($tampil_hasil as $row) {
                $tanggal_sydney = $row['tanggal'];
                $pasaran_sydney = $row['pasaran'];
                $kotor_sydney = $row['kotor'];
                $bersih_sydney = $row['bersih'];
                $hadiah_sydney = $row['hadiah'];
                $total_sydney = $row['total'];
            }
        } else {
            $tanggal_sydney = "";
            $pasaran_sydney = "";
            $kotor_sydney = "";
            $bersih_sydney = "";
            $hadiah_sydney = "";
            $total_sydney = "";
        }

        if ($hasil_singapore != null) {
            $tampil_hasil = $hasil_singapore;
            foreach ($tampil_hasil as $row) {
                $tanggal_singapore = $row['tanggal'];
                $pasaran_singapore = $row['pasaran'];
                $kotor_singapore = $row['kotor'];
                $bersih_singapore = $row['bersih'];
                $hadiah_singapore = $row['hadiah'];
                $total_singapore = $row['total'];
            }
        } else {
            $tanggal_singapore = "";
            $pasaran_singapore = "";
            $kotor_singapore = "";
            $bersih_singapore = "";
            $hadiah_singapore = "";
            $total_singapore = "";
        }

        if ($hasil_hongkong != null) {
            $tampil_hasil = $hasil_hongkong;
            foreach ($tampil_hasil as $row) {
                $tanggal_hongkong = $row['tanggal'];
                $pasaran_hongkong = $row['pasaran'];
                $kotor_hongkong = $row['kotor'];
                $bersih_hongkong = $row['bersih'];
                $hadiah_hongkong = $row['hadiah'];
                $total_hongkong = $row['total'];
            }
        } else {
            $tanggal_hongkong = "";
            $pasaran_hongkong = "";
            $kotor_hongkong = "";
            $bersih_hongkong = "";
            $hadiah_hongkong = "";
            $total_hongkong = "";
        }

        $myTime = Time::now('Asia/Hong_Kong', 'en_US')->toLocalizedString('yyyy-MM-dd');
        $data = [
            'judul' => $judul,
            'isi'   => $isi,
            // SYDNEY
            'kotor_sydney' => $kotor_sydney,
            'bersih_sydney' => $bersih_sydney,
            'hadiah_sydney' => $hadiah_sydney,
            'total_sydney' => $total_sydney,
            // SINGAPORE
            'kotor_singapore' => $kotor_singapore,
            'bersih_singapore' => $bersih_singapore,
            'hadiah_singapore' => $hadiah_singapore,
            'total_singapore' => $total_singapore,
            // HONGKONG
            'kotor_hongkong' => $kotor_hongkong,
            'bersih_hongkong' => $bersih_hongkong,
            'hadiah_hongkong' => $hadiah_hongkong,
            'total_hongkong' => $total_hongkong,
            'tgl_hari_ini' => $myTime,
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('layout/v_wrapper.php', $data);
    }
    public function input_nomor_keluar()
    {
        $session = session();
        $myTime = Time::now('Asia/Hong_Kong', 'en_US')->toLocalizedString('yyyy-MM-dd');
        $waktu = Time::now('Asia/Hong_Kong', 'en_US')->getHour();

        $judul = 'Input Nomor Keluar';
        $isi = 'home/input_nomor_keluar.php';
        $data = [
            'judul' => $judul,
            'isi'   => $isi,
            'waktu' => $waktu,
            'tgl_hari_ini' => $myTime,
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('layout/v_wrapper.php', $data);
    }

    public function insert_nomor_keluar()
    {
        $session = session();
        helper('form');
        if (!$this->validate([
            'tgl_keluaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Tidak Boleh Kosong',
                ]
            ],
        ])) {
            return redirect()->to(base_url() . '/Keuangan/input_nomor_keluar')->withInput();
        }
        $request = Services::request();
        $keuanganModel = new keuanganModel($request);
        $dataModel = new dataModel($request);
        if ($request->getMethod(true) == 'POST') {
            $tgl_keluaran = $this->request->getVar('tgl_keluaran');
            $pasaran = $this->request->getVar('pasaran');
            $nomor_2D = $this->request->getVar('2D');
            $nomor_3D = $this->request->getVar('3D');
            $nomor_4D = $this->request->getVar('4D');

            /* PENDAPATAN KOTOR */
            $jumlah_pembelian = $dataModel->where('tgl_pembelian =', $tgl_keluaran)->where('id_pembelian =', $pasaran)->select('sum(harga_beli) as hasil')->first();
            $data['sum'] = $jumlah_pembelian['hasil'];
            $hasil_kotor = $data['sum'];
            /* PENDAPATAN KOTOR */

            /* PENDAPATAN BERSIH */
            $persen_agen = 27 / 100;
            $potong_agen = $hasil_kotor * $persen_agen;
            $hasil_bersih = $hasil_kotor - $potong_agen;
            /* PENDAPATAN BERSIH */

            $db = \Config\Database::connect();
            $data = $db->table('data_angka');
            $rekap_nomor = $data->select('nomor_data')->selectSum("harga_beli")->groupBy("nomor_data")->where('id_pembelian =', $pasaran)->where('tgl_pembelian =', $tgl_keluaran);
            $cari_2D = $rekap_nomor->where('nomor_data =', $nomor_2D)->where('id_pembelian =', $pasaran)->where('tgl_pembelian =', $tgl_keluaran)->get()->getResultArray();
            $cari_3D = $rekap_nomor->where('nomor_data =', $nomor_3D)->where('id_pembelian =', $pasaran)->where('tgl_pembelian =', $tgl_keluaran)->get()->getResultArray();
            $cari_4D = $rekap_nomor->where('nomor_data =', $nomor_4D)->where('id_pembelian =', $pasaran)->where('tgl_pembelian =', $tgl_keluaran)->get()->getResultArray();

            if ($cari_2D != null) {
                foreach ($cari_2D as $row) {
                    $nomor_data = $row['nomor_data'];
                    $harga_beli = $row['harga_beli'];
                    $hadiah_2D = $harga_beli * 70;
                    $nomor_2D_dan_hadiah = $nomor_data . " = " . $this->rupiah($hadiah_2D) . "(2D)" .  " ";
                }
            } else {
                $nomor_2D_dan_hadiah = "";
                $hadiah_2D = 0;
            }

            if ($cari_3D != null) {
                foreach ($cari_3D as $row3D) {
                    $nomor_data_3D = $row3D['nomor_data'];
                    $harga_beli_3D = $row3D['harga_beli'];
                    $hadiah_3D = $harga_beli_3D * 350;
                    $nomor_3D_dan_hadiah = $nomor_data_3D . " = " . $this->rupiah($hadiah_3D) . "(3D)" .  " ";
                }
            } else {
                $nomor_3D_dan_hadiah = "";
                $hadiah_3D = 0;
            }

            if ($cari_4D != null) {
                foreach ($cari_4D as $row4D) {
                    $nomor_data_4D = $row4D['nomor_data'];
                    $harga_beli_4D = $row4D['harga_beli'];
                    $hadiah_4D = $harga_beli_4D * 3500;
                    $nomor_4D_dan_hadiah = $nomor_data_4D . " = " . $this->rupiah($hadiah_4D) . "(4D)" .  " ";
                }
            } else {
                $nomor_4D_dan_hadiah = "";
                $hadiah_4D = 0;
            }

            /* Nilai Hadiah  */
            $total_hadiah = $hadiah_2D + $hadiah_3D + $hadiah_4D;
            $hadiah = $nomor_2D_dan_hadiah . $nomor_3D_dan_hadiah . $nomor_4D_dan_hadiah . " = " . $this->rupiah($total_hadiah) . " (TOTAL HADIAH)";
            /* Nilai Hadiah  */

            /* Totalan */
            $total = $hasil_bersih - $total_hadiah;
            /* Totalan */

            $data = [
                'tanggal' => $tgl_keluaran,
                'pasaran' => $pasaran,
                'kotor' => $this->rupiah($hasil_kotor),
                'bersih' => $this->rupiah($hasil_bersih),
                'hadiah' => $hadiah,
                'total' => $total,
            ];
            $insert = $keuanganModel->insertNomordata($data);
            if ($insert) {
                $session->setFlashdata('sukses', 'Nomor data Berhasil di Simpan');
                return redirect()->to(base_url() . '/Keuangan');
            }
        }
    }

    function rupiah($angka)
    {

        $hasil_rupiah = "Rp " . number_format($angka, 0, '.', '.');
        return $hasil_rupiah;
    }
}
