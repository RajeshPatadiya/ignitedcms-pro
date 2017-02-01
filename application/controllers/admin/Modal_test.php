<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: Quick and dirty modal test with view file
  *       @Params: params
  *
  *  	 @returns: returns
  */


class Modal_test extends CI_Controller {

	public function index()
	{
		
		$this->load->view('admin/header');
        $this->load->view('admin/body');
        $this->load->view('admin/modal/index');
        $this->load->view('admin/footer');

	}

	public function mtest()
	{
		$this->load->view('admin/modal/modal');
	}

}

/* End of file Modal_test.php */
/* Location: ./application/controllers/admin/Modal_test.php */