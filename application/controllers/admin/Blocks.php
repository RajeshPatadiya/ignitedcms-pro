<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: This is a test driver for the 'blocks' field type!
  *       @Params: params
  *
  *  	 @returns: returns
  */


class Blocks extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/blocks/detail',$data); 
		$this->load->view('admin/blocks/footer');
	}

	public function rich()
	{
		$unique_id = random_string('alnum', 16);
		$data['uid'] = $unique_id;
		//echo $unique_id;

		

		$this->load->view('admin/blocks/chunk',$data);
	}

}

/* End of file Blocks.php */
/* Location: ./application/controllers/admin/Blocks.php */