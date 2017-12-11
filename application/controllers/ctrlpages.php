<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


/*
    HANDLE SESSION:
        - $this->pageauth->sess_auth(); untuk cek session saja pada halaman, semua level bisa akses pleh admin
				- $this->pageauth->sess_auth_admin(); untuk halaman yg bisa diakses oleh "admin" saja
        - $this->pageauth->sess_auth_pengajar(); untuk halaman yg bisa diakses oleh "pengajar" saja
        - $this->pageauth->sess_auth_siswa(); untuk halaman yg bisa diakses oleh "siswa" saja
*/

class Ctrlpages extends CI_Controller {

	/*function construct*/
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/*Other page*/
	public function index() {
		$this->pageauth->sess_auth();
		$data = array (
			'title'		=> 'Dashboard',
			'page'		=> 'pages/dashboard'
		);

		$this->load->view('wrapper', $data);
	}

	/* halaman siswa */
    // public function halsiswa(){
		// 	$this->pageauth->sess_auth();
    //     $data = array(
    //         'title'    => 'Halaman Siswa',
    //         'page'     => 'pages/vsiswa'
    //     );
    //     $this->load->view('wrapper', $data);
    // }

	public function help() {
		$this->pageauth->sess_auth();
		$data = array (
			'title'		=> 'Help',
			'page'		=> 'pages/help'
		);
//		$this->pageauth->sess_auth();
//		$this->load->model('m_agrowisata');
		$this->load->view('wrapper', $data);
	}

	public function pengumuman() {
		$this->pageauth->sess_auth();
		$data = array (
			'title'		=> 'Pengumuman',
			'page'		=> 'pages/vpengumuman'
		);
//		$this->pageauth->sess_auth();
//		$this->load->model('m_agrowisata');
		$this->load->view('wrapper', $data);
	}

// 	public function login() {
// 		$this->pageauth->sess_auth();
// 		$data = array (
// 			'title'		=> 'Login',
// 			'page'		=> 'pages/login'
// 		);
// //		$this->pageauth->sess_auth();
// //		$this->load->model('m_agrowisata');
// //		$this->load->view('wrapper', $data);
// 	}

	public function manakelas() {
		$this->pageauth->sess_auth_admin();
		$data = array (
			'title'		=> 'Manajemen Kelas',
			'page'		=> 'pages/vkelas'
		);
//		$this->pageauth->sess_auth();
//		$this->load->model('m_agrowisata');
		$this->load->view('wrapper', $data);
	}

	public function manamapel() {
		$this->pageauth->sess_auth_admin();
		$data = array (
			'title'		=> 'Manajemen Matapelajaran',
			'page'		=> 'pages/vmapel'
		);
//		$this->pageauth->sess_auth();
//		$this->load->model('m_agrowisata');
		$this->load->view('wrapper', $data);
	}

	public function mapelkelas() {
		$this->pageauth->sess_auth_admin();
		$data = array (
			'title'		=> 'Matapelajaran Kelas',
			'page'		=> 'pages/vmapel_kelas'
		);
//		$this->pageauth->sess_auth();
//		$this->load->model('m_agrowisata');
		$this->load->view('wrapper', $data);
	}

	public function materi() {
		$this->pageauth->sess_auth();
		$data = array (
			'title'		=> 'Materi',
			'page'		=> 'pages/vmateri'
		);
//		$this->pageauth->sess_auth();
//		$this->load->model('m_agrowisata');
		$this->load->view('wrapper', $data);
	}

	public function tugas() {
		$this->pageauth->sess_auth();
		$data = array (
			'title'		=> 'tugas',
			'page'		=> 'pages/vtugas'
		);
//		$this->pageauth->sess_auth();
//		$this->load->model('m_agrowisata');
		$this->load->view('wrapper', $data);
	}

	public function pengajar() {
		$this->pageauth->sess_auth();
		$data = array (
			'title'		=> 'Pengajar',
			'page'		=> 'pages/vpengajar'
		);

		$this->load->view('wrapper', $data);
	}

	public function siswa() {
		$this->pageauth->sess_auth();
		$data = array(
            'title'    => 'Halaman Siswa',
            'page'     => 'pages/vsiswa'
        );
        $this->load->view('wrapper', $data);
    }

	public function kelas_siswa() {
		$this->pageauth->sess_auth_admin();
		$data = array(
	          'title'    => 'Halaman Kelas Siswa',
	          'page'     => 'pages/vkelas_siswa'
	      );
	      $this->load->view('wrapper', $data);
	  }

	public function manauser() {
		$this->pageauth->sess_auth_admin();
		$data = array (
			'title'		=> 'user',
			'page'		=> 'pages/vuser'
		);


		$this->load->view('wrapper', $data);
	}

}
?>
