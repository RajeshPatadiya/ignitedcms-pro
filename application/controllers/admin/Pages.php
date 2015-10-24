<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		$this->load->model('Stuff_permissions');
					$pass = $this->Stuff_permissions->has_permission("pages");

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

	/**
	  *  @Description: list all current pages
	  *       @Params: none
	  *
	  *  	 @returns: none
	  */
	public function index()
	{
		$this->db->select('*');
		$this->db->from('pages');
		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/pages/default',$data);
		$this->load->view('admin/footer');
	}

	 /**
	  *  @Description: saves it as blog or custom controller
	  *       @Params: _POST check boxes
	  *
	  *  	 @returns: nothing
	  */
	public function save_page_options($id)
	{
		//update db with customer controller
		// if(isset($_POST['controller']))
		// {
		// 	$path = $this->input->post('path');

		// 	$object = array('path' => $path, 'controller' => '1' );
		// 	$this->db->where('id', $id);
		// 	$this->db->update('pages', $object);
		// }

		// if(isset($_POST['controller']))
		// {
		// 	$path = $this->input->post('path');
		// 	if(strlen($path == 0))
		// 	{
		// 		$object = array('path' => $path, 'controller' => '0' );
		// 		$this->db->where('id', $id);
		// 		$this->db->update('pages', $object);

		// 	}	
		// }



		//update db with blog controller
		if(isset($_POST['blog']))
		{
			$path = "site_preview/blog_preview";

			$object = array('path' => $path, 'controller' => '1' );
			$this->db->where('id', $id);
			$this->db->update('pages', $object);
		}
		else{
			$object = array('path' => "", 'controller' => '0' );
			$this->db->where('id', $id);
			$this->db->update('pages', $object);

		}

		redirect("admin/pages/detail_view/$id","refresh");

	}

	 /**
	  *  @Description: sort pages by column name
	  *       @Params: column name
	  *
	  *  	 @returns: nothing
	  */
	public function sort_by($column)
	{
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->order_by($column, 'asc');
		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/pages/default',$data);
		$this->load->view('admin/footer');


	}

	 


	 /**
	  *  @Description: page view
	  *       @Params: 
	  *
	  *  	 @returns: returns
	  */

	public function page_view()
	{

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/pages/page');
		$this->load->view('admin/footer');

	}

	 /**
	  *  @Description: add another page to the db
	  *       @Params: _POST name
	  *
	  *  	 @returns: nada
	  */
	public function add_page()
	{
		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Success</strong> Page added!');

		$name = $this->input->post('name');

		$object = array('name' => $name );
		$this->db->insert('pages', $object);

		redirect('admin/pages','refresh');

	}

	 /**
	  *  @Description: go to page builder
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function detail_view($id)
	{
		include('./resources/shortcodes/my_codes.php');
		
		$this->db->select('shortcodes');
		$this->db->from('pages');
		$this->db->where('id', $id);

		$query = $this->db->get();
		
		$shorttag = "";
		foreach ($query->result() as $row) 
		{
			$shorttag = $row->shortcodes;
		}

		//get all asset images
		$this->db->select('*');
		$this->db->from('assets');

		$query2 = $this->db->get();
		
		$data['query2'] = $query2;


		//check customer controllers!
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where('id', $id);

		$query3 = $this->db->get();
		
		$path = "";
		foreach ($query3->result() as $row) 
		{
			$path = $row->path;
		}

		$ck2 = "";
		$ck1 = "";
		if($path == "site_preview/blog_preview")
		{
			$ck2 = "checked";
		}
		if(strlen($path) > 0)
		{
			if($path != "site_preview/blog_preview")
			{
				$ck1 = "checked";
			}
		}
		$data['ck1'] = $ck1;
		$data['ck2'] = $ck2;
		$data['path'] = $path;

		
		$data['content'] = do_shortcode($shorttag);

		$data['id'] = $id;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/builder/builder',$data);
		$this->load->view('admin/builder/footer',$data);

	}

	 /**
	  *  @Description: search the database for pages
	  *       @Params: _post search_term
	  *
	  *  	 @returns: returns
	  */
	public function search_pages_or_delete()
	{
		//check if search or delete
		if($this->input->post('sbm') == "search") 
		{

			$search_term = $this->input->post('search_term');

			$this->db->select('*');
			$this->db->from('pages');
			$this->db->like('name', $search_term);

			$query = $this->db->get();
			

			$data['query'] = $query;
			


			$this->load->view('admin/header');
			$this->load->view('admin/body');
			$this->load->view('admin/pages/default',$data);
			$this->load->view('admin/footer');
		}

		if($this->input->post('sbm') == "delete") 
		{
			//iterate over selected items and delete
			if (isset($_POST['chosen']))
			{
				$arrayName = $_POST['chosen'];

				foreach ($arrayName as $key => $value) {
					//echo $value;

					//delete the pages in the db
					$this->db->where('id', $value);
					$this->db->delete('pages');

				}
				
			}
			
			//return to page view
			redirect("admin/pages","refresh");
		
		}
	}

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */