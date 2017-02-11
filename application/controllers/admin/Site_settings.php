<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//define the site settings
//write the permission constructor (todo)

class Site_settings extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		$this->load->model('Stuff_permissions');
					$pass = $this->Stuff_permissions->has_permission("site_settings");

					if($pass != true)
					{
						redirect('admin/dashboard','refresh');
					}
			  	}
			  	else
			  	{
			  		redirect('admin/installer','refresh');
			  	}
		  }
	}

	public function index()
	{
		
		//get all the sections and pass to view
		$this->db->select('*');
		$this->db->from('section');
		$this->db->where('sectiontype !=', 'Global');

		$query = $this->db->get();
		
		$data['query'] = $query;


		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/site/index',$data); 
		$this->load->view('admin/footer');

	}



	 /**
	  *  @Description: save the home page controller to the db and overwrite the enter config file
	  *       @Params: _post vars
	  *
	  *  	 @returns: returns
	  */
	public function save_home()
	{


		$default_page = $this->input->post('default_page');

		$object = array('default_page' => $default_page );


		$this->db->where('id', '1');
		$this->db->update('site', $object);


		//now overwrite the enter controller

		$string =
"<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//define the entry point
//Please do not delete this file!

class Enter extends CI_Controller {

	public function index()
	{
		redirect('%VAR%');	
	}
}";


		//$content = file_get_contents(APPPATH ."controllers/enter.php");
		
		$content = str_replace("%VAR%", "$default_page", $string);

		if ( ! write_file(APPPATH ."controllers/enter.php", $content))
		{
		     echo 'Unable to write the file do you have permissions!';
		}
		else
		{
			//written
		}



		redirect("admin/dashboard","refresh");


	}




}

/* End of file Site_settings.php */
/* Location: ./application/controllers/admin/Site_settings.php */