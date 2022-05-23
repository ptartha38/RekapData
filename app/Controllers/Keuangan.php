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

        // Start Filter untuk tanggal Laporan
        if ($tgl_keluaran != null) {
            $filter_tanggal = $this->tanggal_indo($tgl_keluaran, true);
        } else {
            $filter_tanggal = "";
        }
        // End Filter untuk tanggal Laporan

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
            'tgl_filter' => $filter_tanggal,
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
            '4D' => [
                'rules' => 'required|min_length[4]|numeric',
                'errors' => [
                    'required' => '4D Tidak Boleh Kosong',
                    'min_length' => 'Keluaran 4D Harus 4 Digit',
                    'numeric' => 'Masukan Hanya Boleh Angka',
                ]
            ],
            '3D' => [
                'rules' => 'required|min_length[3]|numeric',
                'errors' => [
                    'required' => '3D Tidak Boleh Kosong',
                    'min_length' => 'Keluaran 3D Harus 3 Digit',
                    'numeric' => 'Masukan Hanya Boleh Angka',
                ]
            ],
            '2D' => [
                'rules' => 'required|min_length[2]|numeric',
                'errors' => [
                    'required' => '2D Tidak Boleh Kosong',
                    'min_length' => 'Keluaran 2D Harus 2 Digit',
                    'numeric' => 'Masukan Hanya Boleh Angka',
                ]
            ],
            'kode_masukan' => [
                'rules' => 'required|is_unique[laporan_keuangan.kode_keluaran]',
                'errors' => [
                    'required' => 'Terdapat Data yang Kosong atau Tidak Benar (Silahkan isi Kembali atau Reload Halaman)',
                    'is_unique' => 'Nomor Keluar (Jackpot) Sudah di Input Sebelumnya',
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
            $kode_keluaran = $this->request->getVar('kode_masukan');

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
            $cari_2D = $rekap_nomor->where('nomor_data =', $nomor_2D)->where('id_pembelian =', $pasaran)->where('tgl_pembelian =', $tgl_keluaran)->select('nomor_data')->selectSum("harga_beli")->groupBy("nomor_data")->get()->getResultArray();
            $cari_3D = $rekap_nomor->where('nomor_data =', $nomor_3D)->where('id_pembelian =', $pasaran)->where('tgl_pembelian =', $tgl_keluaran)->select('nomor_data')->selectSum("harga_beli")->groupBy("nomor_data")->get()->getResultArray();
            $cari_4D = $rekap_nomor->where('nomor_data =', $nomor_4D)->where('id_pembelian =', $pasaran)->where('tgl_pembelian =', $tgl_keluaran)->select('nomor_data')->selectSum("harga_beli")->groupBy("nomor_data")->get()->getResultArray();

            if ($cari_2D != null) {
                foreach ($cari_2D as $row) {
                    $nomor_data = $row['nomor_data'];
                    $harga_beli = $row['harga_beli'];
                    $hadiah_2D = $harga_beli * 70;
                    $nomor_2D_dan_hadiah = $this->rupiah($harga_beli) . " x 70" . " = " . $this->rupiah($hadiah_2D) . "(2D)" .  " ";
                }
            } else {
                $nomor_2D_dan_hadiah = "";
                $hadiah_2D = 0;
            }

            if ($cari_3D != null) {
                foreach ($cari_3D as $row3D) {
                    $nomor_data_3D = $row3D['nomor_data'];
                    $harga_beli_3D = $row3D['harga_beli'];
                    $hadiah_3D = $harga_beli_3D * 400;
                    $nomor_3D_dan_hadiah =  $this->rupiah($harga_beli_3D) . " x 400" . " = " . $this->rupiah($hadiah_3D) . "(3D)" .  " ";
                }
            } else {
                $nomor_3D_dan_hadiah = "";
                $hadiah_3D = 0;
            }

            if ($cari_4D != null) {
                foreach ($cari_4D as $row4D) {
                    $nomor_data_4D = $row4D['nomor_data'];
                    $harga_beli_4D = $row4D['harga_beli'];
                    $hadiah_4D = $harga_beli_4D * 3000;
                    $nomor_4D_dan_hadiah = $this->rupiah($harga_beli_4D) . " x 3000" . " = " . $this->rupiah($hadiah_4D) . "(4D)" .  " ";
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
            $total = floor($hasil_bersih - $total_hadiah);
            /* Totalan */

            $data = [
                'tanggal' => $tgl_keluaran,
                'pasaran' => $pasaran,
                'kotor' => $this->rupiah($hasil_kotor),
                'bersih' => $this->rupiah($hasil_bersih),
                'hadiah' => $hadiah,
                'kode_keluaran' => $kode_keluaran,
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
}
