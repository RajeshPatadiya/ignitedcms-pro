<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: defines all the help functions folder structure etc
  *       @Params: 
  *
  *  	 @returns: 
  */


class Help extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		//allow access
			  	}
			  	else
			  	{
			  		redirect('admin/login','refresh');
			  	}
		  }
	}

	 /**
	  *  @Description: load the default view
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/help/help');
		$this->load->view('admin/footer');
		
	}

	

	

}

/* End of file help.php */
/* Location: ./application/controllers/help.php */