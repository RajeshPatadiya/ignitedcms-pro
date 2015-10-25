<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database extends CI_Controller {

	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		$this->load->model('Stuff_permissions');
					$pass = $this->Stuff_permissions->has_permission("database");

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
		$data['some_var'] = 'test';

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/database/utils-view',$data);
		$this->load->view('admin/footer');
	   
	}


	 /**
	  *  @Description: This allows the user to do a database backup
	  *       @Params: none
	  *
	  *  	 @returns: none
	  */
	public function backup()
	{

		//utility to backup the database
	    // Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup(); 

		//----------------------------------------------------------------
		//To do ensure db backups do not overwrite existing backups
		//use codeigniters utility to implement this
		//
		// Allow optional params to backup just datastructure etc
		// and backup time
		//
		//
		//----------------------------------------------------------------

		write_file('./img/uploads/mybackup.gz', $backup); 

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('mybackup.gz', $backup);	

		redirect("admin/database","refresh");


	}


	 /**
	  *  @Description: replace all localhost urls in pagebuilder, updates data in table pages->shortcodes
	  *       @Params: _POST replace
	  *
	  *  	 @returns: nothing
	  */
	public function deprecated_replace_urls()
	{
		//get original url
		$old_url = base_url();

		//echo $old_url;

		//To do validate url, make sure it has trailing forward slash
		$replace = $this->input->post('replace');

		//find and replace in shortcodes
		$this->db->select('shortcodes,id');
		$this->db->from('pages');

		$query = $this->db->get();
		
		foreach ($query->result() as $row) 
		{
			$id = $row->id;
			$text_dump = $row->shortcodes;

			$new_text_dump = str_replace($old_url, $replace, $text_dump);

			$object = array('shortcodes' => $new_text_dump, );

			$this->db->where('id', $id);
			$this->db->update('pages', $object);

		}
		
		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Success</strong> Urls have been replaced!');

		redirect("admin/database","refresh");


	}

}

/* End of file database.php */
/* Location: ./application/controllers/database.php */