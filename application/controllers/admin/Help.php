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

	public function glance()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/help/glance');
		$this->load->view('admin/footer');

	}

	public function structure()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/help/structure');
		$this->load->view('admin/footer');

	}

	public function templating()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/help/templating');
		$this->load->view('admin/footer');

	}

	public function fields()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/help/fields');
		$this->load->view('admin/footer');

	}

	public function installing()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/help/installing');
		$this->load->view('admin/footer');

	}

	public function sections()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/help/sections');
		$this->load->view('admin/footer');

	}

	public function entries()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/help/entries');
		$this->load->view('admin/footer');

	}

	public function wherenow()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/help/where');
		$this->load->view('admin/footer');

	}

	public function global_vars()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/help/global-vars');
		$this->load->view('admin/footer');

	}

}

/* End of file help.php */
/* Location: ./application/controllers/help.php */