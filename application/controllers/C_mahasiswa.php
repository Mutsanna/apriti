<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mahasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();

		// cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="mahasiswa_login"){
			redirect(base_url().'c_login?alert=belum_login');
		}
	}

	function index(){
		$this->load->view('mahasiswa/v_header');
		$this->load->view('mahasiswa/v_index');
		$this->load->view('mahasiswa/v_footer');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'c_login/?alert=logout');
	}

	function gedung_ruangan(){
		// mengambil data dari database
		//SELECT * FROM ruangan WHERE status = 1
		//$where = array('status' => 1);
		$a = 2;
		$b = 3;
		$user = $this->session->userdata('id_mahasiswa');
		$data['gedung'] = $this->m_data->get_data('gedung')->result();
		
		$data['ruangan_konfirmasi'] = $this->db->query("
		SELECT * 
		FROM peminjaman 
		WHERE peminjaman_status = $a AND id_mahasiswa = $user
		")->result();

		$data['ruangan'] = $this->db->query("
		SELECT * 
		FROM ruangan 
		WHERE status = $b 
		")->result();

		$this->load->view('mahasiswa/v_header');
		$this->load->view('mahasiswa/v_gedung_ruangan',$data);
		$this->load->view('mahasiswa/v_footer');
	}
	function ruangan($id_gedung){
		$where = array('id_gedung' => $id_gedung);
		$a = 1;
        // mengambil data dari database
        $data['gedung'] = $this->m_data->get_data_id('gedung',$where)->result();
        $data['ruangan'] = $this->db->query("SELECT * FROM ruangan WHERE status = $a AND id_gedung = $id_gedung")->result();
		$this->load->view('mahasiswa/v_header');
		$this->load->view('mahasiswa/ruangan/v_ruangan',$data);
		$this->load->view('mahasiswa/v_footer');
	}

	// peminjaman
	function pinjam($id_ruangan,$id_gedung){
		$where = array('id_gedung' => $id_gedung);
		$data['gedung'] = $this->m_data->get_data_id('gedung',$where)->result();
		$data['ruangan'] = $this->db->query("select * from ruangan where id_ruangan = $id_ruangan ")->result();
		$this->load->view('mahasiswa/v_header');
		$this->load->view('mahasiswa/peminjaman/v_pinjam',$data);
		$this->load->view('mahasiswa/v_footer');
	}

	function pinjam_aksi(){
		$id_gedung = $this->input->post('idgedung');
		$id_ruang = $this->input->post('idruangan');
		$nama_ruangan = $this->input->post('nama_ruangan');
		$id_mahasiswa = $this->input->post('idmahasiswa');
		$mulai = $this->input->post('mulai');
		$selesai = $this->input->post('selesai');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');

		$data = array(
			'id_mahasiswa' => $id_mahasiswa,
			'id_gedung' => $id_gedung,
			'id_ruangan' => $id_ruang,
			'nama_ruangan' => $nama_ruangan,
			'tanggal_di_mulai' => $mulai,
			'tanggal_di_sampai' => $selesai,
			'keterangan' => $keterangan,
			'peminjaman_status' => $status
		);

		// insert data ke database
		$this->m_data->insert_data($data,'peminjaman');
		$this->db->query("UPDATE ruangan SET status = $status WHERE ruangan.id_ruangan = $id_ruang");


		// mengalihkan halaman ke halaman data ruangan
		// UPDATE `ruangan` SET `status` = '2' WHERE `ruangan`.`id_ruangan` = 10;
		redirect(base_url().'c_mahasiswa/ruangan/'.$id_gedung);
	}

	function detail_peminjaman($id_ruangan){
        // mengambil data dari database
        $data['peminjaman'] = $this->db->query("
		SELECT id_peminjaman,tanggal_di_mulai,tanggal_di_sampai,keterangan 
		FROM peminjaman 
		WHERE id_ruangan = $id_ruangan ")->result();
		$data['ruangan'] = $this->db->query("
		SELECT id_ruangan,nama_ruangan 
		FROM ruangan 
		WHERE id_ruangan = $id_ruangan ")->result();
		$this->load->view('mahasiswa/v_header');
		$this->load->view('mahasiswa/peminjaman/v_detail_peminjaman',$data);
		$this->load->view('mahasiswa/v_footer');
	}

	function batal_peminjaman($id_peminjaman,$id_ruangan){
		$where = array(
			'id_peminjaman' => $id_peminjaman
		);
		$status = 1;
		// menghapus data peminjaman dari database sesuai id
		$this->m_data->delete_data($where,'peminjaman');
		// mengupdate data ruangan
		$this->db->query("UPDATE ruangan SET status = $status WHERE ruangan.id_ruangan = $id_ruangan");

		// mengalihkan halaman ke halaman data ruangan
		redirect(base_url().'c_mahasiswa/gedung_ruangan');
	}

	// selesai peminjaman

	

}
