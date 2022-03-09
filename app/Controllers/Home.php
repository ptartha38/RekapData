<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use Config\Services;
use CodeIgniter\Controller;
use App\Models\dataModel;
use App\Models\personilModel;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        $myTime = Time::now('Asia/Hong_Kong', 'en_US')->toLocalizedString('yyyy-MM-dd');
        $judul = 'Beranda';
        $isi = 'home/beranda.php';
        $id_hapus = $db->query("SELECT * FROM data_angka")->getLastRow();
        if ($id_hapus != null) {
            $nomor_id = $id_hapus->id_hapus;
            $id_baru = (int)$nomor_id + 1;
        } else {
            $id_baru = 1;
        }
        $data = [
            'judul' => $judul,
            'isi'   => $isi,
            'id_hapus' => $id_baru,
            'hari_ini' => $myTime,
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('layout/v_wrapper.php', $data);
    }
}
