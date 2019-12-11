<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	function __construct(){
		parent::__construct();

		// cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="admin_login"){
			redirect(base_url().'c_login?alert=belum_login');
		}
	}

	function index(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_index');
		$this->load->view('admin/v_footer');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'c_login/?alert=logout');
	}

	function ganti_password(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_ganti_password');
		$this->load->view('admin/v_footer');
	}

	function ganti_password_aksi(){
		$baru = $this->input->post('password_baru');
		$ulang = $this->input->post('password_ulang');

		$this->form_validation->set_rules('password_baru','Password Baru','required|matches[password_ulang]');
		$this->form_validation->set_rules('password_ulang','Ulangi Password','required');

		if($this->form_validation->run()!=false){
			$id = $this->session->userdata('id');

			$where = array('id' => $id);

			$data = array('password' => md5($baru));

			$this->m_data->update_data($where,$data,'admin');

			redirect(base_url().'admin/ganti_password/?alert=sukses');

		}else{
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_ganti_password');
			$this->load->view('admin/v_footer');
		}

	}


	// CRUD petugas
	function mahasiswa(){
		// mengambil data dari database
		$data['mahasiswa'] = $this->m_data->get_data('mahasiswa')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_mahasiswa',$data);
		$this->load->view('admin/v_footer');
    }

	function mahasiswa_tambah(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_mahasiswa_tambah');
		$this->load->view('admin/v_footer');
	}

	function mahasiswa_tambah_aksi(){
        $nrp = $this->input->post('nrp');
		$nama = $this->input->post('nama');
		$prodi = $this->input->post('prodi');
		$password = $this->input->post('password');

		$data = array(
            'nrp' => $nrp,
			'nama_mahasiswa' => $nama,
			'prodi' => $prodi,
			'password' => md5($password)
		);

		// insert data ke database
		$this->m_data->insert_data($data,'mahasiswa');

		// mengalihkan halaman ke halaman data petugas
		redirect(base_url().'c_admin/mahasiswa');
	}

	function mahasiswa_edit($id_mahasiswa){
		$where = array('id_mahasiswa' => $id_mahasiswa);
		// mengambil data dari database sesuai id
		$data['mahasiswa'] = $this->m_data->edit_data($where,'mahasiswa')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_mahasiswa_edit',$data);
		$this->load->view('admin/v_footer');
	}

	function mahasiswa_update(){
        $id_mahasiswa = $this->input->post('id_mahasiswa');
		$nrp = $this->input->post('nrp');
		$nama = $this->input->post('nama');
		$prodi = $this->input->post('prodi');
		$password = $this->input->post('password');

		$where = array(
			'id_mahasiswa' => $id_mahasiswa
		);

		// cek apakah form password di isi atau tidak
		if($password==""){
			$data = array(
                'nrp' => $nrp,
				'nama_mahasiswa' => $nama,
				'prodi' => $prodi
			);

			// update data ke database
			$this->m_data->update_data($where,$data,'mahasiswa');
		}else{
			$data = array(
                'nrp' => $nrp,
				'nama_mahasiswa' => $nama,
				'prodi' => $username,
				'password' => md5($password)
			);

			// update data ke database
			$this->m_data->update_data($where,$data,'mahasiswa');
		}

		// mengalihkan halaman ke halaman data petugas
		redirect(base_url().'c_admin/mahasiswa');
	}


	function mahasiswa_hapus($id_mahasiswa){
		$where = array(
			'id_mahasiswa' => $id_mahasiswa
		);

		// menghapus data petugas dari database sesuai id
		$this->m_data->delete_data($where,'mahasiswa');

		// mengalihkan halaman ke halaman data petugas
		redirect(base_url().'c_admin/mahasiswa');
	}
	// akhir CRUD petugas

	// anggota
	function anggota(){
		// mengambil data dari database
		$data['anggota'] = $this->m_data->get_data('anggota')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_anggota',$data);
		$this->load->view('admin/v_footer');
	}

	function anggota_kartu($id){
		$where = array('id' => $id);
		// mengambil data dari database sesuai id
		$data['anggota'] = $this->m_data->edit_data($where,'anggota')->result();
		$this->load->view('admin/v_anggota_kartu',$data);
	}
	// akhir anggota



    // gedung & ruangan

    function gedung(){
        $data['gedung'] = $this->m_data->get_data('gedung')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/gedung/v_gedung',$data);
		$this->load->view('admin/v_footer');
    }
    function gedung_tambah(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/gedung/v_gedung_tambah');
		$this->load->view('admin/v_footer');
    }
    function gedung_tambah_aksi(){
        $gedung = $this->input->post('gedung');

		$data = array(
            'nama_gedung' => $gedung,
		);

		// insert data ke database
		$this->m_data->insert_data($data,'gedung');

		// mengalihkan halaman ke halaman data petugas
		redirect(base_url().'c_admin/gedung');
    }
    function gedung_edit($id_gedung){
		$where = array('id_gedung' => $id_gedung);
		// mengambil data dari database sesuai id
		$data['gedung'] = $this->m_data->edit_data($where,'gedung')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/gedung/v_gedung_edit',$data);
		$this->load->view('admin/v_footer');
	}
	
    function gedung_update(){
        $id_gedung = $this->input->post('id_gedung');
		$nama_gedung = $this->input->post('namagedung');

		$where = array(
			'id_gedung' => $id_gedung
        );
        $data = array(
            'nama_gedung' => $nama_gedung
        );
        
        $this->m_data->update_data($where,$data,'gedung');

		// mengalihkan halaman ke halaman data petugas
		redirect(base_url().'c_admin/gedung');
	}

	function gedung_hapus($id_gedung){
		$where = array(
			'id_gedung' => $id_gedung
		);

		// menghapus data petugas dari database sesuai id
		$this->m_data->delete_data($where,'gedung');

		// mengalihkan halaman ke halaman data gedung
		redirect(base_url().'c_admin/gedung');
	}

	function ruangan($id_gedung){
        $where = array('id_gedung' => $id_gedung);
        // mengambil data dari database
        $data['gedung'] = $this->m_data->get_data_id('gedung',$where)->result();
        $data['ruangan'] = $this->m_data->get_data_id('ruangan',$where)->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/ruangan/v_ruangan',$data);
		$this->load->view('admin/v_footer');
	}

	function ruangan_tambah($id_gedung){
		$where = array('id_gedung' => $id_gedung);
        // mengambil data dari database
        $data['gedung'] = $this->m_data->get_data_id('gedung',$where)->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/ruangan/v_ruangan_tambah',$data);
		$this->load->view('admin/v_footer');
	}

	function ruangan_tambah_aksi(){
		$id_gedung = $this->input->post('idgedung');
		$nama_ruangan = $this->input->post('nama');
		$kapasitas = $this->input->post('kapasitas');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_gedung' => $id_gedung,
			'nama_ruangan' => $nama_ruangan,
			'kapasitas' => $kapasitas,
			'keterangan' => $keterangan
		);

		// insert data ke database
		$this->m_data->insert_data($data,'ruangan');

		// mengalihkan halaman ke halaman data ruangan
		redirect(base_url().'c_admin/ruangan/'.$id_gedung);
	}

	function ruangan_edit($id_ruangan){
		$where = array('id_ruangan' => $id_ruangan);
		// mengambil data dari database sesuai id
		$data['ruangan'] = $this->m_data->edit_data($where,'ruangan')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/ruangan/v_ruangan_edit',$data);
		$this->load->view('admin/v_footer');
	}
	
	function ruangan_update(){
		$id_gedung = $this->input->post('id_gedung');
        $id_ruangan = $this->input->post('id_ruangan');
		$nama_ruangan = $this->input->post('namaruangan');
		$kapasitas = $this->input->post('kapasitas');
		$keterangan = $this->input->post('keterangan');

		$where = array(
			'id_ruangan' => $id_ruangan
        );
        $data = array(
			'nama_ruangan' => $nama_ruangan,
			'kapasitas' => $kapasitas,
			'keterangan' => $keterangan
        );
        
        $this->m_data->update_data($where,$data,'ruangan');

		// mengalihkan halaman ke halaman data petugas
		redirect(base_url().'c_admin/ruangan/'.$id_gedung);
	}

	function ruangan_hapus($id_ruangan,$id_gedung){
		$where = array(
			'id_ruangan' => $id_ruangan
		);

		// menghapus data petugas dari database sesuai id
		$this->m_data->delete_data($where,'ruangan');

		// mengalihkan halaman ke halaman data ruangan
		redirect(base_url().'c_admin/ruangan/'.$id_gedung);
	}

	function gedung_ruangan(){
		// mengambil data dari database
		//SELECT * FROM ruangan WHERE status = 1
		//$where = array('status' => 1);
		$a = 2;
		$b = 3;
		$data['gedung'] = $this->m_data->get_data('gedung')->result();

		$data['ruangan_konfirmasi'] = $this->db->query("
		SELECT * 
		FROM peminjaman 
		WHERE peminjaman_status = $a 
		")->result();

		$data['ruanganii'] = $this->db->query("select * from ruangan where status = $b ")->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/gedung/v_gedung_ruangan',$data);
		$this->load->view('admin/v_footer');
	}
	
	function detail_peminjaman($id_ruangan){
        // mengambil data dari database
        $data['peminjaman'] = $this->db->query("
		SELECT * 
		FROM mahasiswa AS p 
		INNER JOIN peminjaman AS i ON p.id_mahasiswa = i.id_mahasiswa 
		INNER JOIN ruangan AS r ON i.id_ruangan = r.id_ruangan
		WHERE i.id_ruangan = $id_ruangan ")->result();
		$data['ruangan'] = $this->db->query("
		SELECT id_ruangan,nama_ruangan 
		FROM ruangan 
		WHERE id_ruangan = $id_ruangan ")->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/peminjaman/v_detail_peminjaman',$data);
		$this->load->view('admin/v_footer');
	}
    
	// akhir gedung $ ruangan


	// peminjaman
	function pinjam($id_ruangan,$id_gedung){
		$where = array('id_gedung' => $id_gedung);
		$data['gedung'] = $this->m_data->get_data_id('gedung',$where)->result();
		$data['ruangan'] = $this->db->query("select * from ruangan where id_ruangan = $id_ruangan ")->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/peminjaman/v_pinjam',$data);
		$this->load->view('admin/v_footer');
	}


	function peminjaman_laporan(){
		if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])){
			$mulai = $this->input->get('tanggal_mulai');
			$sampai = $this->input->get('tanggal_sampai');
			// mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
			$data['peminjaman'] = $this->db->query("select * from peminjaman,buku,anggota where peminjaman.peminjaman_buku=buku.id and peminjaman.peminjaman_anggota=anggota.id and date(peminjaman_tanggal_mulai) >= '$mulai' and date(peminjaman_tanggal_mulai) <= '$sampai' order by peminjaman_id desc")->result();	
		}else{
			// mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
			$data['peminjaman'] = $this->db->query("select * from peminjaman,buku,anggota where peminjaman.peminjaman_buku=buku.id and peminjaman.peminjaman_anggota=anggota.id order by peminjaman_id desc")->result();	
		}
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_peminjaman_laporan',$data);
		$this->load->view('admin/v_footer');
	}

	function peminjaman_cetak(){
		if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])){
			$mulai = $this->input->get('tanggal_mulai');
			$sampai = $this->input->get('tanggal_sampai');
			// mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
			$data['peminjaman'] = $this->db->query("select * from peminjaman,buku,anggota where peminjaman.peminjaman_buku=buku.id and peminjaman.peminjaman_anggota=anggota.id and date(peminjaman_tanggal_mulai) >= '$mulai' and date(peminjaman_tanggal_mulai) <= '$sampai' order by peminjaman_id desc")->result();	
			$this->load->view('admin/v_peminjaman_cetak',$data);
		}else{
			redirect(base_url().'admin/peminjaman');
		}
	}
	// akhir peminjaman
	

}
