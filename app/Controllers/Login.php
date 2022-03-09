<?php

namespace App\Controllers;

use Config\Services;
use App\Models\personilModel;

class Login extends BaseController
{
	public function index()
	{
		$session = session();
		$data = [
			'judul' => 'Rekap Data Nomor',
			'session' => $session,
			'validation' => \Config\Services::validation()
		];
		echo view('login/login_form', $data);
	}

	public function auth()
	{
		if (session()->get('username') != "") {
			return redirect()->to(base_url('/'));
		}
		$session = session();
		$request = Services::request();
		$model = new personilModel($request);
		$username = $this->request->getVar('username_login');
		$password = $this->request->getVar('pass_signin');
		$data = $model->where('username', $username)->first();
		if ($data) {
			$pass = $data['password'];
			$verify_pass = password_verify($password, $pass);
			if ($verify_pass) {
				$ses_data = [
					'id'       => $data['id'],
					'nama'       => $data['nama'],
					'username'     => $data['username'],
					'status'     => "aktif",
					'logged_in'     => TRUE
				];
				$session->set($ses_data);
				return redirect()->to(base_url() . '/Home');
			} else {
				$session->setFlashdata('login_error', 'Password Salah');
				return redirect()->to(base_url() . '/');
			}
		} else {
			$session->setFlashdata('login_error', 'Username Tidak Ditemukan');
			return redirect()->to(base_url() . '/');
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url() . '/');
	}
}
