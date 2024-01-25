<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models', 'm');
		if ($this->session->userdata('status_login')) {
			redirect($this->session->userdata('akses'));
		}
	}
	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$namepass = $this->input->post('username', 'password');
		$cek = $this->m->Masuk($username, $password, $namepass);
		if ($cek == 'usernotfound') {
			$this->session->set_flashdata('usernotfound', true);
			redirect('Auth');
		} elseif ($cek == 'passnotfound') {
			$this->session->set_flashdata('passnotfound', true);
			redirect('Auth');
		} else {
			foreach ($cek as $d) {
				$username = $d->username;
				$nama = $d->nama;
				$akses = $d->akses;
				$status_login = TRUE;
			}
			$data = array(
				'username' => $username,
				'nama' => $nama,
				'akses' => $akses,
				'status_login' => $status_login,
			);
			$this->session->set_userdata($data);
			if ($akses == 'admin') {
				redirect('Admin');
			} else {
				redirect('Kasir');
			}
		}
	}
}
