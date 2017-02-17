<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_twig extends CI_Controller {

	//check if user has access

	public function index()
	{

	}

	 /**
	  *  @Description: Special function to auto generate the twig syntax and file
	  *       @Params: sectionid,entryid
	  *
	  *  	 @returns: nothing
	  */
	public function gen_template($sectionid,$entryid)
	{
		$this->load->model('Stuff_template_generator');
		$this->Stuff_template_generator->create_template($sectionid,$entryid);

		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Success</strong> Congratulations your template file has been generated! Check under application > views > custom folder');

		redirect("admin/entries/render_section/$sectionid/$entryid","refresh");
	}


     /**
      *  @Description: test looping through all entries with a section section type
      *       @Params: params
      *
      *  	 @returns: returns
      */

     public function deprecated_test_all()
     {

     	/*
	     	{% for entry in entry.entriesFieldHandle %}
    		...
			{% endfor %}
		*/

		$this->load->model('Stuff_menu');
		$menu = $this->Stuff_menu->make_menu();


		$this->load->model('Stuff_template_generator');
		$this->Stuff_template_generator->get_all_sections();


     	
     }

      /**
       *  @Description: special case for the multiple index page
       *       @Params: section_name
       *
       *  	 @returns: returns
       */
     public function index_page($section_name)
     {

     	////////////////////////////////////////
     	//
     	//
     	//  To do need to pass in more twig vars
     	//  and store all section content in array
     	//
     	//////////////////////////////////////////

     	//Pass all the global vars to view
		$this->load->model('Stuff_globals');

		$x = $this->Stuff_globals->dump_globals();

		foreach ($x as $key => $value) {
			$data[$key] = $value;
		}

		//dump the menu structure
		$this->load->model('Stuff_menu');
		$menu = $this->Stuff_menu->make_menu();


		$data['menu'] = $menu;

		//get base url
		 $base_url = base_url();
		 $data['base_url'] = $base_url;

		 //get sessionid
		 
		 $data['session_id'] = session_id();
		 //get username
		 $data['username'] = $this->session->userdata('name');

		 //get site title
		 $this->db->select('site');
		 $this->db->from('site');
		 $this->db->where('id', '1');
		 $this->db->limit(1);
		 $query2 = $this->db->get();
		 
		 $site_name = "";
		 foreach ($query2->result() as $row) 
		 {
		 	$site_name =  $row->site;
		 }

		 $data['site_name'] = $site_name;
		 

 		
     	

     	$this->load->model('Stuff_template_generator');
		$x = $this->Stuff_template_generator->get_all_sections();


		$data['multiples'] = $x;

 		//get section name
		//$this->load->library('twig');

		$this->load->library('parser');
	
		$this->parser->parse("custom/$section_name/index", $data);

     }


     //checks to see if image and swap with img url
     public function for_image($col,$val)
     {
     	//return $val;

     	$col = trim($col);

     	$this->db->select('*');
     	$this->db->from('fields');
     	$this->db->where('name', $col);
     	$this->db->limit(1);

     	$query = $this->db->get();
     	
     	$type = "";
     	foreach ($query->result() as $row) 
     	{
     		$type= $row->type;
     	}
     	
     	if($type == 'file-upload')
     	{
     		$this->db->select('url');
     		$this->db->from('assetfields');
     		$this->db->where('id', $val);
     		$this->db->limit(1);
     		$query = $this->db->get();
     		
     		$url = "";
     		foreach ($query->result() as $row) 
     		{
     			$url= $row->url;
     		}
     		return $url;

     	}

     	else
     	{
     		return $val;
     	}

     }




	 /**
	  *  @Description: Displays the template file
	  *       @Params: entryid, sectionid
	  *
	  *  	 @returns: view
	  */
	public function display($entryid,$sectionid)
	{
		$this->db->select('*');
		$this->db->from('content');
		$this->db->where('entryid', $entryid);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$query =  $query->result_array();

		
		 $arrTmp = array();
		 foreach ($query as $b  ) {
		 	$arrTmp = $b;
		 }

		 //store all these in the entry array
		 foreach ($arrTmp as $key => $value) {
		 	//special case for images
		 	//make templating much easier
		 	 $tmp =$this->for_image($key,$value);

		 	$data[$key] = $tmp;
		 }


		//Pass all the global vars to view
		$this->load->model('Stuff_globals');

		$x = $this->Stuff_globals->dump_globals();

		foreach ($x as $key => $value) {
			$data[$key] = $value;
		}

		//dump the menu structure
		$this->load->model('Stuff_menu');
		$menu = $this->Stuff_menu->make_menu();


		$data['menu'] = $menu;

		//get base url
		 $base_url = base_url();
		 $data['base_url'] = $base_url;

		 //get sessionid
		 
		 $data['session_id'] = session_id();
		 //get username
		 $data['username'] = $this->session->userdata('name');

		 //get site title
		 $this->db->select('site');
		 $this->db->from('site');
		 $this->db->where('id', '1');
		 $this->db->limit(1);
		 $query2 = $this->db->get();
		 
		 $site_name = "";
		 foreach ($query2->result() as $row) 
		 {
		 	$site_name =  $row->site;
		 }

		 $data['site_name'] = $site_name;
		 
		

		//pass all the assets to view
		$this->load->model('Stuff_template_generator');
		$data['assets'] = $this->Stuff_template_generator->get_all_assets($entryid);


		//allow multiples to be accessed from anywhere
		$this->load->model('Stuff_template_generator');
		$x = $this->Stuff_template_generator->get_all_sections();


		$data['multiples'] = $x;


		

		if($this->Stuff_template_generator->is_multiple($sectionid))
		{

			//get section name
			
			$section_name = $this->Stuff_template_generator->get_section_name($sectionid);


			//twig template go backwards, so you call the child first and the parent 
			//get to access the same variables passed into it!

			//in short, always call the child template!!
			
			// Load our Twig template
			$this->load->view("custom/$section_name/_entry.php", $data);
		}
		else
		{
			//is Single type
			//$this->load->library('parser');
			$section_name = $this->Stuff_template_generator->get_section_name($sectionid);

			
			//twig template go backwards, so you call the child first and the parent 
			//get to access the same variables passed into it!

			//in short, always call the child template!!
			
			// Load our Twig template
			$this->load->view("custom/$section_name.php", $data);
			
		}
	}

}

/* End of file Test_twig.php */
/* Location: ./application/controllers/admin/Test_twig.php */