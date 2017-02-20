<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sections extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		{
			if($this->session->userdata('isloggedin')=='1')
			{
				$this->load->model('Stuff_permissions');
				$pass = $this->Stuff_permissions->has_permission("sections");

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
		$this->db->from('section');
		
		$query = $this->db->get();
		
		$data['query'] = $query;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/section/default',$data); 
		$this->load->view('admin/footer');
		
	}





	 /**
	  *  @Description: Edit the section agains
	  *       @Params: sectionid
	  *
	  *  	 @returns: returns
	  */

	public function edit_section_view($id)
	{
		$this->db->select('*');
		$this->db->from('fields');
		$query = $this->db->get();
		


		$data['query'] = $query;


		$this->db->select('*');
		$this->db->from('section');
		$this->db->where('id', $id);

		$query2 = $this->db->get();
		
		$data['query2'] = $query2;

		//just get the selected fields
		$this->db->select('*');
		$this->db->from('section_layout');
		$this->db->join('fields', 'section_layout.fieldid = fields.id', 'left');
		$this->db->where('sectionid', $id);
		$this->db->order_by('sortorder', 'asc');

		$query3 = $this->db->get();
		
		$data['query3'] = $query3;
		




		$data['sectionid'] = $id;
		

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/section/update',$data); 
		$this->load->view('admin/section/footer');

	}

	 /**
	  *  @Description: update the section with new fields
	  *       @Params: sectionid
	  *
	  *  	 @returns: nothing
	  */
	public function update_section($sectionid)
	{
		$fields = rtrim($this->input->post('dummy'),",");
		


		$handle = $this->input->post('name');
		$sectiontype = $this->input->post('sectiontype');



		$this->load->model('Stuff_section');
		$this->Stuff_section->update_section($sectionid,$handle,$sectiontype,$fields);


		$message = "Section Updated!";
		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', "<strong>Success</strong> $message");

		$this->db->select('*');
		$this->db->from('section');

		$query = $this->db->get();

		$data['query'] = $query;



		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/section/default',$data); 
		$this->load->view('admin/footer');

	}


	public function add_new_section()
	{

		$this->db->select('*');
		$this->db->from('fields');
		$query = $this->db->get();
		


		$data['query'] = $query;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/section/detail',$data); 
		$this->load->view('admin/section/footer');



	}

	/**
	  *  @Description: search the database for posts or delete
	  *       @Params: _post search_term
	  *
	  *  	 @returns: returns
	  */
	public function search_posts_or_delete($value)
	{
	

			$this->load->model('Stuff_section');
			$this->Stuff_section->delete_section($value);



			
			
			//return to section view
			redirect("admin/sections","refresh");
		
		
	}


	 /**
	  *  @Description: validate and save the post field into db
	  *                save options as json
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function save_section($id)
	{

		$this->form_validation->set_rules('name', 'Handle', 'required|alpha_dash|is_unique[section.name]'); //unique
		$this->form_validation->set_rules('sectiontype', 'Type', 'callback_type_check');
		$this->form_validation->set_rules('dummy', 'Type', 'required');


		$fields = rtrim($this->input->post('dummy'),",");
		


		$handle = $this->input->post('name');
		$sectiontype = $this->input->post('sectiontype');
		
		
		
		
		if ($this->form_validation->run() == FALSE)
		{
			 // $message =  validation_errors(); 
			 // $this->session->set_flashdata('type', '0');
			 // $this->session->set_flashdata('msg', "<strong>Failed</strong> $message");

			 $this->db->select('*');
			$this->db->from('fields');
			$query = $this->db->get();
			


			$data['query'] = $query;

			$this->load->view('admin/header');
			$this->load->view('admin/body');
			$this->load->view('admin/section/detail',$data); 
			$this->load->view('admin/footer');
		}
		else
		{
			 $this->load->model('Stuff_section');
			 $this->Stuff_section->save_section($handle,$sectiontype,$fields);


			 $message = "Section Added!";
			 $this->session->set_flashdata('type', '1');
			 $this->session->set_flashdata('msg', "<strong>Success</strong> $message");

			 $this->db->select('*');
			 $this->db->from('section');
		
			 $query = $this->db->get();
		
			 $data['query'] = $query;
			
			

			$this->load->view('admin/header');
			$this->load->view('admin/body');
			$this->load->view('admin/section/default',$data); 
			$this->load->view('admin/footer');
		}

	}

	public function type_check($str)
    {
            if ($str == 'Please select')
            {
                    $this->form_validation->set_message('type_check', 'Please choose a Field Type');
                    return FALSE;
            }
            else
            {
                    return TRUE;
            }
    }


	/**
	  *  @Description: dumps all fields related to section id
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */

	public function render_section($sectionid)
	{
		$this->db->select('*');
		$this->db->from('section_layout');
		$this->db->where('sectionid', $sectionid);

		$query = $this->db->get();
		
		// foreach ($query->result() as $row) 
		// {
		// 	echo $row->fieldid;
		// }
		
		$data['query'] = $query;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/section/render',$data); 
		$this->load->view('admin/section/footer');



	}

}

/* End of file Sections.php */
/* Location: ./application/controllers/admin/Sections.php */