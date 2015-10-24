<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
			  		redirect('admin/installer','refresh');
			  	}
		  }
	}
	

	public function index()
	{
		//ip address and user agent test
		// $ip = $this->input->ip_address();
		// echo $ip;
		// echo $this->input->user_agent();

		

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/dashboard/dashboard_view');
		$this->load->view('admin/footer');
		
	}


	

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */