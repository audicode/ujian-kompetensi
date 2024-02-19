<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{

		$data = array (
                        'title' => 'Halaman Home'
                      );

        // var_dump($data);
        // die;

        $this->template->load('depan/template', 'depan/v_isi');


	}

}

/* End of file Home.php */
/* Location: ./application/controllers/front/Home.php */