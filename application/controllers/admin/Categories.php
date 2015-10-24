<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
	{
		  parent::__construct();
		  {
			  //check to see if they have permissions for categories!!
		  }
	}

	public function index()
	{
		$this->db->select('*');
		$this->db->from('cats');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/categories/default',$data);
		$this->load->view('admin/footer');
		
	}

	 /**
	  *  @Description: the view file to add another category
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function cat_view()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/categories/cats');
		$this->load->view('admin/footer');
	}


	 /**
	  *  @Description: add another category
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function add_cat()
	{
		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Success</strong> Category added!');
		

		$cat_name = $this->input->post('cat_name');

		$object = array('cat_name' => $cat_name );
		$this->db->insert('cats', $object);

		redirect('admin/categories','refresh');


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
		$this->db->from('cats');
		$this->db->order_by($column, 'asc');
		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/categories/default',$data);
		$this->load->view('admin/footer');


	}


	 /**
	  *  @Description: search the database for cats
	  *       @Params: _post search_term
	  *
	  *  	 @returns: returns
	  */
	public function search_cats_or_delete()
	{
		//check if search or delete
		if($this->input->post('sbm') == "search") 
		{

			$search_term = $this->input->post('search_term');

			$this->db->select('*');
			$this->db->from('cats');
			$this->db->like('cat_name', $search_term);

			$query = $this->db->get();
			

			$data['query'] = $query;
			


			$this->load->view('admin/header');
			$this->load->view('admin/body');
			$this->load->view('admin/categories/default',$data);
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
					$this->db->delete('cats');

				}
				
			}
			
			//return to page view
			redirect("admin/categories","refresh");
		
		}
	}




}

/* End of file Categories.php */
/* Location: ./application/controllers/admin/Categories.php */