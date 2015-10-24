<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class 404 extends CI_Controller {

	public function index()
	{
	  $this->load->view('header');
	  $this->load->view('body');
	  $this->load->view('404/404');
	  $this->load->view('footer');	
	}

}

/* End of file 404.php */
/* Location: ./application/controllers/404.php */