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

        $data_waktu = $jam . ":" . $menit . " Wita";

        $judul = 'Chat Room';
        $isi = 'home/chat.php';


        $data = [
            'judul' => $judul,
            'isi'   => $isi,
            'data_waktu' => $data_waktu,
            'today' => $today,
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
            $data = [
                'username' => $this->request->getVar('username'),
                'message' => $this->request->getVar('message'),
                'waktu_pesan' => $this->request->getVar('waktu_pesan'),
                'hari_pesan' => $this->request->getVar('hari_pesan'),
            ];
            $insert = $chat_room->insert_chat($data);

            if ($insert) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data di Input';
                $this->output['data']   = $insert;
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
}
