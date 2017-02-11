<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//Don't forget to set permissions


//simply show a list of all the existing assets to choose from, maybe allow a filter by type



class Asset_lib extends CI_Controller {

	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		$this->load->model('Stuff_permissions');
					$pass = $this->Stuff_permissions->has_permission("asset_lib");

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
		$this->db->select('*');
		$this->db->from('assetfields');
		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/assets/main',$data); 
		$this->load->view('admin/footer');

	}


	 /**
	  *  @Description: loop through all the posts and delete from the asset file table and also remove file
	  *       @Params: _POST assetfile ids
	  *
	  *  	 @returns: nothing
	  */
	public function delete_file()
	{

		$formValues = $this->input->post(NULL, TRUE);

		foreach($formValues as $key => $value) 
		{
		    //echo $key;
		   	//unlink(filename)
			//first get the file path

			$this->db->select('*');
			$this->db->from('assetfields');
			$this->db->where('id', $key);
			$this->db->limit(1);

			$query = $this->db->get();
			
			$path = "";
			foreach ($query->result() as $row) 
			{
				$path =  $row->filename;
			}
			

			$path2 = "./assets/uploads/" . $path; 
			//$path2 = $path; 
			
			
			//dont forget to do the thumbnail as well!

			unlink($path2);


			$this->load->model('stuff_entries');
			$arr = $this->stuff_entries->del_asset($key);

			$this->db->where('id', $key);
			$this->db->delete('assetfields');



		}


		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Success</strong> Files deleted');

		redirect("admin/asset_lib","refresh");


	}


}

/* End of file Asset_lib.php */
/* Location: ./application/controllers/admin/Asset_lib.php */