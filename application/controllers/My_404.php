<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_404 extends CI_Controller {

	public function index()
	{
	  $this->load->view('admin/header');
	  $this->load->view('admin/body');
	  $this->load->view('admin/404/404');
	  $this->load->view('admin/footer');	
	}

}

/* End of file My_404.php */
/* Location: ./application/controllers/My_404.php */