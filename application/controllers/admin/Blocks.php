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

	 /**
	  *  @Description: Test the json array
	  *       @Params: none
	  *
	  *  	 @returns: none
	  */
	public function json_test()
	{
		$obj = array(
			'plaintext'     => array('maxchars' =>'0'),
                'date'      => array('timestamp' => TRUE),
                'number'    => array('min' => '0', 'max' => '100')
               );

		$json = json_encode($obj);
		echo '<pre>';
		print_r($json);
		echo '</pre>';
	}


	 /**
	  *  @Description: Render the matrix block
	  *       @Params: fieldid
	  *
	  *  	 @returns: returns
	  */

	public function render($fieldid)
	{



	}


	public function rich()
	{
		$unique_id = random_string('alnum', 4);
		$data['uid'] = $unique_id;
		//echo $unique_id;

		

		$this->load->view('admin/blocks/chunk',$data);
	}

	 /**
	  *  @Description: loop through post and build new matrix block
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function validate()
	{

		//first insert the block into the field table
		$matrix_name = $this->input->post('block-name');

		$settings = array('maxBlocks' => '5');
		$settings = json_encode($settings);

		$object = array(

		'name' 			 => $matrix_name,
		'type' 			 => 'block',
		'instructions'   =>   '',
		'maxchars'       =>   '',
		'limitamount'    =>   '',
		'formvalidation' =>   '',
		'settings'       =>   $settings
		

		);

		// $this->db->insert('fields', $object);
		// $insert_id = $this->db->insert_id;

		$formValues = $this->input->post(NULL, TRUE);

		$this->load->model('Stuff_blocks');
		$this->Stuff_blocks->add_block_fields($formValues);

		// //get the post vars and validate
		// foreach($_POST as $key => $value) 
		// {
		// 	echo $key;
		// 	echo " ";
		// 	echo $value;
		// 	echo br();
			
		// }
	}

}

/* End of file Blocks.php */
/* Location: ./application/controllers/admin/Blocks.php */