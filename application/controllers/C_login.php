<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$this->load->view('v_login');
	}

	function login_aksi(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$sebagai = $this->input->post('sebagai');

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() != false){
			if($sebagai == "admin"){
				$where = array(
					'username' => $username,
					'password' => md5($password)
				);
			}else if($sebagai == "mahasiswa"){
				$where = array(
					'nrp' => $username,
					'password' => md5($password)
				);
			}else{
				redirect(base_url().'c_login?alert=gagal');
			}

			if($sebagai == "admin"){
				$cek = $this->m_data->cek_login('admin',$where)->num_rows();
				$data = $this->m_data->cek_login('admin',$where)->row();

				if($cek > 0){
					$data_session = array(
						'id' => $data->id,
						'username' => $data->username,
						'status' => 'admin_login'
					);

					$this->session->set_userdata($data_session);

					redirect(base_url().'c_admin');
				}else{
					redirect(base_url().'c_login?alert=gagal');
				}

			}else if($sebagai == "mahasiswa"){
				$cek = $this->m_data->cek_login('mahasiswa',$where)->num_rows();
				$data = $this->m_data->cek_login('mahasiswa',$where)->row();

				if($cek > 0){
					$data_session = array(
						'id_mahasiswa' => $data->id_mahasiswa,
						'nrp' => $data->nrp,
						'nama_mahasiswa' => $data->nama_mahasiswa,
						'status' => 'mahasiswa_login'
					);

					$this->session->set_userdata($data_session);

					redirect(base_url().'c_mahasiswa');
				}else{
					redirect(base_url().'c_login?alert=gagal');
				}

			}
		}else{
			$this->load->view('v_login');
		}

	}
}
