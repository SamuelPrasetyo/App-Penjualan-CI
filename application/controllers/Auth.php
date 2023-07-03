<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_auth');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('login');
	}

	// public function aksi_login() 
	// {
	// 	$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
	// 	$password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

	// 	$cek_level=$this->Model_auth->auth_pegawai($username,$password);

	// 	if($cek_level->num_rows() > 0){
	// 			$row = $cek_level->row();

	// 			$data_session = array(
	// 				'nip' => $row->nip,
	// 				'password' => $row->password,
	// 				'nama_user' => $row->nama_pegawai
	// 			);

	// 			$this->session->set_userdata($data_session);

	// 		//Jika login sebagai Admin
	// 		$data=$cek_level->row_array();
	// 		$this->session->set_userdata('masuk',TRUE);
	//  			if($data['level']=='admin'){ 
	// 				//Akses admin
	// 				$this->session->set_userdata('akses','admin');
	// 				$this->session->set_userdata('ses_nip',$data['nip']);
	// 				$this->session->set_userdata('ses_nama',$data['nama_admin']);
	// 				redirect('home');
	//  	} else{
	// 		//Akses Petugas
	// 		$this->session->set_userdata('akses','pegawai');
	// 		$this->session->set_userdata('ses_nip',$data['nip']);
	// 		$this->session->set_userdata('ses_nama',$data['nama_pegawai']);
	// 		redirect('home');
	//  	}
	// } else{  
	// 	// jika username dan password tidak ditemukan atau salah
	// 	$url=base_url();
	// 	echo $this->session->set_flashdata('msg','Username Atau Password Salah');
	// 	redirect($url);
	// 	}
	// }

	public function aksi_login()
	{
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

		$cek_level = $this->Model_auth->auth_pegawai($username);

		if ($cek_level) {
			if (password_verify($password, $cek_level['password'])) {
				$data_session = array(
					'nip' => $cek_level['nip'],
					'nama_user' => $cek_level['nama_pegawai']
				);

				$this->session->set_userdata($data_session);

				if ($cek_level['level'] == 'admin') {
					// Akses admin
					$this->session->set_userdata('masuk', TRUE);
					$this->session->set_userdata('akses', 'admin');
					$this->session->set_userdata('ses_nip', $cek_level['nip']);
					$this->session->set_userdata('ses_nama', $cek_level['nama_admin']);
					redirect('home');
				} else {
					// Akses Petugas
					$this->session->set_userdata('masuk', TRUE);
					$this->session->set_userdata('akses', 'pegawai');
					$this->session->set_userdata('ses_nip', $cek_level['nip']);
					$this->session->set_userdata('ses_nama', $cek_level['nama_pegawai']);
					redirect('home');
				}
			} else {
				// Password salah
				$url = base_url();
				echo $this->session->set_flashdata('msg', 'Password Salah');
				redirect($url);
			}
		} else {
			// Username tidak ditemukan
			$url = base_url();
			echo $this->session->set_flashdata('msg', 'Username Tidak Ditemukan');
			redirect($url);
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		$url=base_url('');
		redirect($url);
	}
}
