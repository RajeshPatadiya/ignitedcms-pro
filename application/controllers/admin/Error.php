<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: custom 404 error page
  *       @Params: params
  *
  *  	 @returns: returns
  */

class Error extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('404/404');
		$this->load->view('footer');
		
	}

}

/* End of file error.php */
/* Location: ./application/controllers/error.php */