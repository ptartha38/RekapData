<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use Config\Services;
use CodeIgniter\Controller;
use App\Models\personilModel;

class Personil extends BaseController
{
    public $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => [],
    ];

    // PERSONIL CODE
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        $builder = $db->table('personil')->get();
        $data_anggota = $builder->getResultArray();
        $judul = 'Data Personil';
        $isi = 'personil/personil.php';
        $data = [
            'judul' => $judul,
            'isi'   => $isi,
            'data_personil' => $data_anggota,
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('layout/v_wrapper.php', $data);
    }
    public function tambah_personil()
    {
        $session = session();
        helper('form');
        $request = Services::request();
        $personil_model = new personilModel($request);
        if ($request->getMethod(true) == 'POST') {
            $data = [
                'nama' => $this->request->getVar('nama_insert'),
                'username'    => $this->request->getVar('username_insert'),
                'password' => password_hash($this->request->getVar('password_insert'), PASSWORD_DEFAULT),
            ];
            $simpan = $personil_model->register_new_user($data);
            if ($simpan) {
                $session->setFlashdata('sukses', 'Data Berhasil di Simpan');
                return redirect()->to(base_url() . '/personil');
            }
        }
    }

    public function edit_anggota()
    {
        $request = Services::request();
        $personilModel = new personilModel($request);
        if ($request->getMethod(true) == 'POST') {
            $res = $personilModel->edit();
            if ($res) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data ditemukan';
                $this->output['data']   = $res;
            }
            echo json_encode($this->output);
        }
    }
    public function update_personil()
    {
        $session = session();
        helper('filesystem');
        $request = Services::request();
        $personilModel = new personilModel($request);
        if ($request->getMethod(true) == 'POST') {
            $data = [
                'nama' => $this->request->getVar('nama_update'),
                'username' => $this->request->getVar('username_update'),
                'password' => password_hash($this->request->getVar('password_update'), PASSWORD_DEFAULT)
            ];
            $id_update = $this->request->getVar('id_update');
            $ubah = $personilModel->update_biodata_user($data, $id_update);
            if ($ubah) {
                $session->setFlashdata('sukses', 'Data Berhasil di Update');
                return redirect()->to(base_url() . '/personil');
            }
        }
    }

    public function hapus_personil()
    {
        $session = session();
        helper('filesystem');
        $request = Services::request();
        $personilModel = new personilModel($request);
        if ($request->getMethod(true) == 'POST') {
            $id_hapus = $this->request->getVar('delete_id');
            $hapus = $personilModel->hapus_biodata_user($id_hapus);
            if ($hapus) {
                $session->setFlashdata('sukses', 'Data Berhasil di Hapus');
                return redirect()->to(base_url() . '/personil');
            }
        }
    }

    public function update_status_user()
    {
        $session = session();
        $request = Services::request();
        $data_lengkap = new personilModel($request);
        if ($request->getMethod(true) == 'POST') {
            $username = $this->request->getVar('status_username');
            $data = [
                'username' => $this->request->getVar('status_username'),
                'status' => "online",
            ];
            $res = $data_lengkap->update_status_user($username, $data);
            if ($res) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'User Online';
                $this->output['data']   = $res;
            }
            echo json_encode($this->output);
        }
    }

    public function ambil_data_user()
    {
        $request = Services::request();
        $data_lengkap = new personilModel($request);
        if ($request->getMethod(true) == 'POST') {
            $res = $data_lengkap->ambil_data_user();
            if ($res) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data ditemukan';
                $this->output['data']   = $res;
            }
            echo json_encode($this->output);
        }
    }
}
