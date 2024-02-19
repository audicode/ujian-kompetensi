<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public $input;
	public $MSudi;
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');
	}

	public function index()
	{
		if ($this->session->userdata('Login')){
			// Memuat model MSudi
			$this->load->model('MSudi');
	
			// Mengakses data dari model
			$data['DataFoto'] = $this->MSudi->GetData('foto');
			$data['content'] = 'beranda';
			$this->load->view('welcome_message', $data);
		} else {
			redirect(site_url('Login'));
		}
	}

	public function beranda()
		{
			if ($this->session->userdata('Login')){
			// Memuat model MSudi
			$this->load->model('MSudi');
	
			$userid=$this->session->userdata('userid');

			// Mengakses data dari model
			$data['DataFoto'] = $this->MSudi->GetData('foto');
			$data['GetLike'] = $this->MSudi->hitung_like($userid);
			$data['content'] = 'beranda';
			$this->load->view('welcome_message', $data);
		} else {
			redirect(site_url('Login'));
		}
		}

	public function gallery()
	{
		if ($this->session->userdata('Login')){
		// Memuat model MSudi
		$this->load->model('MSudi');

		// Mengakses data dari model
		$userid = $this->session->userdata('userid');
        $data['DataAlbum'] = $this->MSudi->GetDataWhere('album', 'userid', $userid)->result();
		$data['content'] = 'gallery/album';
		$this->load->view('welcome_message', $data);
	} else {
		redirect(site_url('Login'));
	}
	}

	public function addDataAlbum()
	{
		if ($this->session->userdata('Login')){
		$add['albumid'] = $this->input->post('albumid');
		$add['namaalbum'] = $this->input->post('namaalbum');
		$add['deskripsi'] = $this->input->post('deskripsi');
		$add['tanggaldibuat'] = $this->input->post('tanggaldibuat');
		$add['userid'] = $this->input->post('userid');
		$this->MSudi->AddData('album', $add);
		redirect(site_url('Welcome/gallery'));
	} else {
		redirect(site_url('Login'));
	}
	}

	public function updateDataAlbum()
	{
		if ($this->session->userdata('Login')){
		$albumid = $this->input->post('albumid');
		$update['namaalbum'] = $this->input->post('namaalbum');
		$update['deskripsi'] = $this->input->post('deskripsi');
		$update['tanggaldibuat'] = $this->input->post('tanggaldibuat');
		$this->MSudi->UpdateData('album', 'albumid', $albumid, $update);
		redirect(site_url('Welcome/gallery'));
	} else {
		redirect(site_url('Login'));
	}
	}

	public function deleteDataAlbum($albumid)
	{
		if ($this->session->userdata('Login')){
		$this->load->model('MSudi');

		$this->MSudi->DeleteData('album', 'albumid', $albumid);

		// Redirect ke halaman master setelah penghapusan
		redirect(site_url('Welcome/gallery'));
	} else {
		redirect(site_url('Login'));
	}
	}

	public function foto($albumid = null)
	{
		if ($this->session->userdata('Login')) {
			// Load the MSudi model
			$this->load->model('MSudi');

			// Check if albumid is provided
			if (!is_null($albumid)) {
				// Get photos for the selected album
				$data['DataFoto'] = $this->MSudi->GetDataWhere('foto', 'albumid', $albumid)->result();
			} else {
				// If albumid is not provided, you can handle it accordingly (e.g., show an error message)
				$data['DataFoto'] = array(); // Set empty array
			}

			// Load the view
			$data['content'] = 'gallery/foto';
			$this->load->view('welcome_message', $data);
		} else {
			redirect(site_url('Login'));
		}
	}

	public function addDataFoto()
{
    if ($this->session->userdata('Login')) {
        // Get the userid of the currently logged-in user
        $userid = $this->session->userdata('userid');

        $config['upload_path']   = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = 3218319;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('lokasifile')) {
            $upload_data = $this->upload->data();

            // Prepare data to be saved in the database
            $add['fotoid'] = $this->input->post('fotoid');
            $add['judulfoto'] = $this->input->post('judulfoto');
            $add['deskripsifoto'] = $this->input->post('deskripsifoto');
            $add['tanggalunggah'] = $this->input->post('tanggalunggah');
            $add['albumid'] = $this->input->post('albumid');
            $add['lokasifile'] = $upload_data['file_name'];
            // Assign the userid to the data array
            $add['userid'] = $userid;

            $this->MSudi->AddData('foto', $add);
            redirect(site_url('Welcome/foto'));
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
    } else {
        redirect(site_url('Login'));
    }
	}
	// Di dalam controller Welcome.php
        public function updateDataFoto($fotoid) {
        if ($this->input->post()) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judulfoto', 'Judul Foto', 'required');
        $this->form_validation->set_rules('deskripsifoto', 'Deskripsi Foto', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan pesan error
            $this->load->view('form_foto');
        } else {
            // Jika validasi berhasil, lakukan update data
            $data = array(
                'judulfoto' => $this->input->post('judulfoto'),
                'deskripsifoto' => $this->input->post('deskripsifoto')
                // tambahkan field lain yang perlu diupdate
            );

            // Panggil model untuk melakukan update data
            $this->load->model('MSudi'); // Gantilah 'MSudi' dengan nama model yang sesuai
            $this->MSudi->UpdateData('foto', 'fotoid', $fotoid, $data);

            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
			// Redirect ke halaman master setelah penghapusan
			redirect($referer);
        }
    } else {
        redirect('Welcome'); // Jika tidak ada data POST, redirect ke halaman lain
    }
}

	public function deleteDataFoto($fotoid)
	{
		if ($this->session->userdata('Login')){
		$this->load->model('MSudi');

		$this->MSudi->DeleteData('foto', 'fotoid', $fotoid);

		$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
			// Redirect ke halaman master setelah penghapusan
		redirect($referer);
	} else {
		redirect(site_url('Login'));
	}
	}

	public function user()
	{
		
		if ($this->session->userdata('Login')) {
			// Memuat model MSudi
			$this->load->model('MSudi');
	
			// Mengakses data dari model
			$data['DataUser'] = $this->MSudi->GetData('user');
			$data['userid']    = $this->MSudi->GetblokAlbum('user');
			$data['content'] = 'gallery/user';
			$this->load->view('welcome_message', $data);
		} else {
			redirect(site_url('Login'));
		}
	}
	
	public function addDataUser()
		{
			if ($this->session->userdata('Login')) {
				$add['userid'] = $this->input->post('userid');
				$add['username'] = $this->input->post('username');
				$add['password'] = $this->input->post('password');
				$add['email'] = $this->input->post('email');
				$add['namalengkap'] = $this->input->post('namalengkap');
				$add['alamat'] = $this->input->post('alamat');
				
	
				$this->MSudi->AddData('user', $add);
				redirect(site_url('Welcome/user'));
			} else {
				redirect(site_url('Login'));
			}
		}
	
		
		public function updateDataUser()
		{
			if ($this->session->userdata('Login')) {
				$userid = $this->input->post('userid');
				$update['userid'] = $this->input->post('userid');
				$update['username'] = $this->input->post('username');
				$update['password'] = $this->input->post('password');
				$update['email'] = $this->input->post('email');
				$update['namalengkap'] = $this->input->post('namalengkap');
				$update['alamat'] = $this->input->post('alamat');
	
				$this->MSudi->UpdateData('user', 'userid', $userid, $update);
				redirect(site_url('Welcome/user'));
			} else {
				redirect(site_url('Login'));
			}
		}
	
		
		public function deleteDataUser($userid)
		{
			if ($this->session->userdata('Login')) {
				$this->load->model('MSudi');
				$this->MSudi->DeleteData('user', 'userid', $userid);
	
				// Redirect ke halaman master setelah penghapusan
				redirect(site_url('Welcome/user'));
			} else {
				redirect(site_url('Login'));
			}
		}

		public function logout()
		{
			// Unset session data
			$this->session->unset_userdata('Login');
	
			// Redirect to 'Login' controller
			redirect(site_url('Home'));
		}

		
		public function display_namaalbum() {
			if ($this->session->userdata('Login')) {
			// Call the method in the model to get only namaalbum
			$data['album'] = $this->MSudi->relasialbum();
	
			// Load a view to display the data
			$this->load->view('foto', $data);
		}
	}

		// Ini versi baru
		public function getComments() {
			if ($this->session->userdata('Login')) {
			$fotoid = $this->input->get('fotoid');
			$comments = $this->MSudi->GettambahKomentarByFotoId($fotoid);

			header('Content-Type: application/json');
			echo json_encode($comments);
		}
	}

		public function getUsername($userid) {
			if ($this->session->userdata('Login')) {
			$this->load->model('MSudi');
			$username = $this->MSudi->getUsername($userid);
			echo json_encode($username);
		}
	}
}