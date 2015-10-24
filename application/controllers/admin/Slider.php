<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: cms for adding a slider to home page etc
  *       @Params: params
  *
  *  	 @returns: returns
  */


class Slider extends CI_Controller {
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
		  		redirect('installer','refresh');
		  	}
		}
	}

	public function index()
	{
		
	}

	 /**
	  *  @Description: slider view
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */

	public function slider_view()
	{



	}

	 /**
	  *  @Description: save the slider parameters
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function slider_save()
	{




	}


}

/* End of file slider.php */
/* Location: ./application/controllers/slider.php */