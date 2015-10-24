<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Shortcodes extends CI_Controller {

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
		//default route
	}

	
	


	 /**
	  *  @Description: save to pages
	  *       @Params: _POST pageid
	  *
	  *  	 @returns: returns
	  */
	public function save_to_database()
	{
		$pageid = $this->input->post('pageid');

		$shorttag = $this->input->post('shorttag');

		$object = array('shortcodes' => $shorttag );

		$this->db->where('id', $pageid);
		$this->db->update('pages', $object);

	}
	 
	public function rich()
	{

		$f = $this->input->post('richText');

		$lorem = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
		
		include('./resources/shortcodes/my_codes.php');
		echo do_shortcode("[col foo=4]".$f."[/col]");
	}


	//add text box

	public function box()
	{
		$lorem = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
		
		include('./resources/shortcodes/my_codes.php');
		echo do_shortcode("[col foo=4]".$lorem."[/col]");

	}

	//add image block
	public function image()
	{
		$id = $this->input->post('id');

		//get the img url
		$this->db->select('fullsize');
		$this->db->from('assets');
		$this->db->where('id', $id);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$url = "";
		foreach ($query->result() as $row) 
		{
			$url= $row->fullsize;
		}
		
		$url = base_url("img/uploads/$url");

		include('./resources/shortcodes/my_codes.php');
		echo do_shortcode("[img foo=4]".$url."[/img]");

	}

	public function code()
	{
		include('./resources/shortcodes/my_codes.php');
		echo do_shortcode("[col foo=4][code]".'sss'."[/code][/col]");

	}

	 /**
	  *  @Description: add slider block
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function slider()
	{
		$url = base_url("img/uploads/ig2.png");
		$cont = '<section class="panel"> 
           <div class="carousel slide auto panel-body" id="c-slide" style="min-height:80px;">
            <ol class="carousel-indicators out">
              <li data-target="#c-slide" data-slide-to="0" class=""></li>
              <li data-target="#c-slide" data-slide-to="1" class=""></li>
            
            </ol>
            <div class="carousel-inner">
              <div class="item active left">
                
                  <img src="'.$url.'" class="img-responsive my-center" style="position:relative;">
                
              </div>
              <div class="item next left">
                 
                 <img src="'.$url.'" class="img-responsive my-center" style="position:relative;">
                
              </div>
              
            </div>
            <a class="left carousel-control" href="#c-slide" data-slide="prev"> <i class="fa fa-angle-left"></i> 
            </a>
            <a class="right carousel-control" href="#c-slide" data-slide="next"> <i class="fa fa-angle-right"></i> 
            </a>
          </div>
        </section>';
		include('./resources/shortcodes/my_codes.php');
		echo do_shortcode("[col foo=4]".$cont."[/col]");

	}




}

/* End of file shortcodes.php */
/* Location: ./application/controllers/shortcodes.php */