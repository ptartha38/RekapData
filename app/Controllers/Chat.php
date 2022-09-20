<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use Config\Services;
use CodeIgniter\Controller;
use App\Models\ChatModel;

class Chat extends BaseController
{
    public $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => [],
    ];

    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        $today = Time::now('Asia/Hong_Kong', 'en_US')->toLocalizedString('yyyy-MM-dd');
        $jam = Time::now('Asia/Makassar', 'en_US')->getHour();
        $menit = Time::now('Asia/Makassar', 'en_US')->getMinute();
        $detik = Time::now('Asia/Makassar', 'en_US')->getSecond();

        $data_waktu = $jam . ":" . $menit . ":" . $detik;

        $judul = 'Chat Room';
        $isi = 'home/chat.php';


        $data = [
            'judul' => $judul,
            'isi'   => $isi,
            'data_waktu' => $data_waktu,
            'today' => $this->tanggal_indo($today),
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('layout/v_wrapper.php', $data);
    }

    public function insert_chat()
    {
        $request = Services::request();
        $chat_room = new ChatModel($request);
        if ($request->getMethod(true) == 'POST') {

            $foto = $this->request->getFile('gambar');
            if ($foto != "") {
                $nama_baru = $foto->getRandomName();
                $foto->move('assets/img/dokumentasi_chat/', $nama_baru);
            } else {
                $nama_baru = "";
            }

            $data = [
                'username' => $this->request->getVar('username'),
                'message' => $this->request->getVar('message'),
                'waktu_pesan' => $this->request->getVar('waktu_pesan'),
                'hari_pesan' => $this->request->getVar('hari_pesan'),
                'gambar' => $nama_baru
            ];

            if ($this->request->getVar('message') or $this->request->getFile('gambar') != "") {
                $insert = $chat_room->insert_chat($data);
            } else {
                $insert = "kosong";
            }

            if ($insert != "kosong") {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data di Input';
                $this->output['data']   = $insert;
            } else {
                $this->output['sukses'] = false;
                $this->output['pesan']  = 'Data Tidak di Input';
            }
            echo json_encode($this->output);
        }
    }

    public function isi_pesan()
    {
        $request = Services::request();
        $data_lengkap = new ChatModel($request);
        if ($request->getMethod(true) == 'POST') {
            $res = $data_lengkap->ambil_data_pesan();
            if ($res) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data ditemukan';
                $this->output['data']   = $res;
            }
            echo json_encode($this->output);
        }
    }

    public function hapus_data_chat()
    {
        $session = session();
        helper('filesystem');
        $request = Services::request();
        $ChatModel = new ChatModel($request);
        $hapus = $ChatModel->hapus_riwayat_chat();
        $files = glob('assets/img/dokumentasi_chat/*');
        foreach ($files as $file) {
            unlink($file);
        }
        if ($hapus) {
            $session->setFlashdata('sukses', 'Data Berhasil di Hapus');
            return redirect()->to(base_url() . '/Chat');
        }
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
            1 => 'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Ags',
            'Sep',
            'Okt',
            'Nov',
            'Des'
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
