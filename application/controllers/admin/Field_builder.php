<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Field_builder extends CI_Controller {
   
    public function __construct()
	{
		
		parent::__construct();
		{
			if($this->session->userdata('isloggedin')=='1')
			{
				$this->load->model('Stuff_permissions');
				$pass = $this->Stuff_permissions->has_permission("field_builder");

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
		$this->db->from('fields');
		$query = $this->db->get();
		
		$data['query'] = $query;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/fields/default',$data); 
		$this->load->view('admin/fields/footer');
		
		
		
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
		$this->db->from('section');
		$this->db->where('sectionid', $sectionid);

		$query = $this->db->get();
		
		// foreach ($query->result() as $row) 
		// {
		// 	echo $row->fieldid;
		// }
		
		$data['query'] = $query;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/fields/render',$data); 
		$this->load->view('admin/fields/footer');



	}


	 /**
	  *  @Description: add a new field to db
	  *       @Params: none
	  *
	  *  	 @returns: returns
	  */
	public function add_new()
	{
		$data['title'] = 'Fields';
		
		$data['type'] = 'plain-text';

		$data['counter'] = 0;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/fields/detail',$data); 
		$this->load->view('admin/fields/footer',$data);

	}

	/**
	  *  @Description: search the database for posts or delete
	  *       @Params: _post search_term
	  *
	  *  	 @returns: returns
	  */
	public function search_posts_or_delete($value)
	{
		
			$this->load->model('Stuff_fields');
			$this->Stuff_fields->remove_field($value);

			//delete the pages in the db
			$this->db->where('id', $value);
			$this->db->delete('fields');

			
			//return to page view
			redirect("admin/field_builder","refresh");
		
		
	}


	 /**
	  *  @Description: load the view to update fields
	  *       @Params: fieldid
	  *
	  *  	 @returns: nothing
	  */
	public function update_field_view($fieldid)
	{
		$data['title'] = 'Fields';
		$data['fieldid'] = $fieldid;


		$this->load->model('Stuff_fields');
		$query = $this->Stuff_fields->get_field_params($fieldid);
		$type = $this->Stuff_fields->get_field_type($fieldid);
		$arr = $this->Stuff_fields->get_opts($fieldid);
		
		$data['query'] = $query;
		$data['type'] = $type;
		$data['arr']  = $arr;
		
		$data['counter'] = count($arr);

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/fields/update',$data); 
		$this->load->view('admin/fields/footer',$data);


	}

	 /**
	  *  @Description: update field id (this is destructive)
	  *       @Params: fieldid
	  *
	  *  	 @returns: nothing
	  */
	public function update_field($fieldid)
	{
		$this->form_validation->set_rules('handle', 'Handle', 'required|alpha'); 
		$this->form_validation->set_rules('type', 'Type', 'required');
		

		$handle = $this->input->post('handle');
		$type = $this->input->post('type');
		$opts = "";
		$instructions = $this->input->post('instructions');
		$maxchars = $this->input->post('maxchars');
		$limitamount = $this->input->post('limit');
		$formvalidation = $this->input->post('filetypes');
		$min = $this->input->post('min');
		$max = $this->input->post('max');

		$pass = FALSE;

		//if plain-text
		if($type === 'plain-text')
		{
			$this->form_validation->set_rules('maxchars', 'Maxchar', 'integer|greater_than[0]|required');
			if ($this->form_validation->run() == FALSE)
			{
				$data['title'] = 'Fields';
				$data['fieldid'] = $fieldid;


				$this->load->model('Stuff_fields');
				$query = $this->Stuff_fields->get_field_params($fieldid);
				$type = $this->Stuff_fields->get_field_type($fieldid);
				$arr = $this->Stuff_fields->get_opts($fieldid);
				
				$data['query'] = $query;
				$data['type'] = $type;
				$data['arr']  = $arr;
				
				$data['counter'] = count($arr);

				$this->load->view('admin/header');
				$this->load->view('admin/body');
				$this->load->view('admin/fields/update',$data); 
				$this->load->view('admin/fields/footer',$data);

			}
			else
			{
				$pass = TRUE;
			}
		}

		
		if($type === 'multi-line')
		{
			$pass = TRUE;
		}
		if($type === 'rich-text')
		{
			$pass = TRUE;
		}
		if($type === 'drop-down')
		{
			$pass = TRUE;
		}
		
		if($type === 'check-box')
		{
			$pass = TRUE;
		}
		if($type === 'color')
		{
			$pass = TRUE;
		}
		if($type === 'file-upload')
		{
			$this->form_validation->set_rules('limit', 'Limt', 'integer|greater_than[0]|required');
			$this->form_validation->set_rules('filetypes', 'File Type', 'trim|required');
			if ($this->form_validation->run() == FALSE)
			{
				$data['title'] = 'Fields';
				$data['fieldid'] = $fieldid;


				$this->load->model('Stuff_fields');
				$query = $this->Stuff_fields->get_field_params($fieldid);
				$type = $this->Stuff_fields->get_field_type($fieldid);
				$arr = $this->Stuff_fields->get_opts($fieldid);
				
				$data['query'] = $query;
				$data['type'] = $type;
				$data['arr']  = $arr;
				
				$data['counter'] = count($arr);

				$this->load->view('admin/header');
				$this->load->view('admin/body');
				$this->load->view('admin/fields/update',$data); 
				$this->load->view('admin/fields/footer',$data);

			}
			else
			{
				$pass = TRUE;
			}
		}
		if($type === 'number')
		{
			
			$this->form_validation->set_rules('min', 'Min', "integer|less_than[$max]|required");
			$this->form_validation->set_rules('max', 'Max', "integer|required|greater_than_equal_to[$min]");
			if ($this->form_validation->run() == FALSE)
			{
				$data['title'] = 'Fields';
				$data['fieldid'] = $fieldid;


				$this->load->model('Stuff_fields');
				$query = $this->Stuff_fields->get_field_params($fieldid);
				$type = $this->Stuff_fields->get_field_type($fieldid);
				$arr = $this->Stuff_fields->get_opts($fieldid);
				
				$data['query'] = $query;
				$data['type'] = $type;
				$data['arr']  = $arr;
				
				$data['counter'] = count($arr);

				$this->load->view('admin/header');
				$this->load->view('admin/body');
				$this->load->view('admin/fields/update',$data); 
				$this->load->view('admin/fields/footer',$data);

			}
			else
			{
				$pass = TRUE;
			}
		}
		if($type === 'date')
		{
			$pass = TRUE;
		}
		if($type === 'switch')
		{
			$pass = TRUE;
		}
		
		if($pass)
		{
			if ($this->form_validation->run() == FALSE)
			{
				
				$data['title'] = 'Fields';
				$data['fieldid'] = $fieldid;


				$this->load->model('Stuff_fields');
				$query = $this->Stuff_fields->get_field_params($fieldid);
				$type = $this->Stuff_fields->get_field_type($fieldid);
				$arr = $this->Stuff_fields->get_opts($fieldid);
				
				$data['query'] = $query;
				$data['type'] = $type;
				$data['arr']  = $arr;
				
				$data['counter'] = count($arr);

				$this->load->view('admin/header');
				$this->load->view('admin/body');
				$this->load->view('admin/fields/update',$data); 
				$this->load->view('admin/fields/footer',$data);

				
			}
			else
			{

				foreach($_POST as $key => $value) 
	    		{
	    			if($this->startsWith($key, "opts"))
	    			{
	    				$opts = $opts . $value . ",";
	    			}
	    			
	    		}

	    		$opts =  trim($opts,",");
	    		//pass this in as a comma delimited string!


				//successful
				$this->load->model('Stuff_fields');
				$this->Stuff_fields->update_field($fieldid,$handle,$type,$opts,$instructions,$maxchars,$limitamount,$formvalidation,$min,$max);




				$message = "Field Updated!";
				$this->session->set_flashdata('type', '1');
				$this->session->set_flashdata('msg', "<strong>Success</strong> $message");

				$this->db->select('*');
				$this->db->from('fields');
				$query = $this->db->get();

				$data['query'] = $query;

				$this->load->view('admin/header');
				$this->load->view('admin/body');
				$this->load->view('admin/fields/default',$data); 
				$this->load->view('admin/fields/footer');
			}

		}

	}


	 /**
	  *  @Description: validate and save the post field into db
	  *                save options as json
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function save_field($id)
	{

		$this->form_validation->set_rules('handle', 'Handle', 'required|alpha|is_unique[fields.name]'); //unique
		$this->form_validation->set_rules('type', 'Type', 'required');
		

		$handle = $this->input->post('handle');
		$type = $this->input->post('type');
		$opts = "";
		$instructions = $this->input->post('instructions');
		$maxchars = $this->input->post('maxchars');
		$limitamount = $this->input->post('limit');
		$formvalidation = $this->input->post('filetypes');
		$min = $this->input->post('min');
		$max = $this->input->post('max');

		$pass = FALSE;

		//if plain-text
		if($type === 'plain-text')
		{
			$this->form_validation->set_rules('maxchars', 'Maxchar', 'integer|greater_than[0]|required');
			if ($this->form_validation->run() == FALSE)
			{
				$data['type'] = $type;

				 $this->load->view('admin/header');
				 $this->load->view('admin/body');
				 $this->load->view('admin/fields/detail'); 
				 $this->load->view('admin/fields/footer',$data);
			}
			else
			{
				$pass = TRUE;
			}
		}

		
		if($type === 'multi-line')
		{
			$pass = TRUE;
		}
		if($type === 'rich-text')
		{
			$pass = TRUE;
		}
		if($type === 'drop-down')
		{
			$pass = TRUE;
		}
		
		if($type === 'check-box')
		{
			$pass = TRUE;
		}
		if($type === 'color')
		{
			$pass = TRUE;
		}
		if($type === 'file-upload')
		{
			$this->form_validation->set_rules('limit', 'Limt', 'integer|greater_than[0]|required');
			$this->form_validation->set_rules('filetypes', 'File Type', 'trim|required');
			if ($this->form_validation->run() == FALSE)
			{
				$data['type'] = $type;

				 $this->load->view('admin/header');
				 $this->load->view('admin/body');
				 $this->load->view('admin/fields/detail'); 
				 $this->load->view('admin/fields/footer',$data);
			}
			else
			{
				$pass = TRUE;
			}
		}
		if($type === 'number')
		{
			
			$this->form_validation->set_rules('min', 'Min', "integer|less_than[$max]|required");
			$this->form_validation->set_rules('max', 'Max', "integer|required|greater_than_equal_to[$min]");
			if ($this->form_validation->run() == FALSE)
			{
				$data['type'] = $type;

				 $this->load->view('admin/header');
				 $this->load->view('admin/body');
				 $this->load->view('admin/fields/detail'); 
				 $this->load->view('admin/fields/footer',$data);
			}
			else
			{
				$pass = TRUE;
			}
		}
		if($type === 'date')
		{
			$pass = TRUE;
		}
		if($type === 'switch')
		{
			$pass = TRUE;
		}
		
		if($pass)
		{
			if ($this->form_validation->run() == FALSE)
			{
				

				$data['type'] = $type;

				 $this->load->view('admin/header');
				 $this->load->view('admin/body');
				 $this->load->view('admin/fields/detail'); 
				 $this->load->view('admin/fields/footer',$data);
			}
			else
			{

				foreach($_POST as $key => $value) 
	    		{
	    			if($this->startsWith($key, "opts"))
	    			{
	    				$opts = $opts . $value . ",";
	    			}
	    			
	    		}

	    		$opts =  trim($opts,",");
	    		//pass this in as a comma delimited string!


				//successful
				$this->load->model('Stuff_fields');
				$this->Stuff_fields->add_new_field($handle,$type,$opts,$instructions,$maxchars,$limitamount,$formvalidation,$min,$max);




				$message = "Field Added!";
				$this->session->set_flashdata('type', '1');
				$this->session->set_flashdata('msg', "<strong>Success</strong> $message");

				$this->db->select('*');
				$this->db->from('fields');
				$query = $this->db->get();

				$data['query'] = $query;

				$this->load->view('admin/header');
				$this->load->view('admin/body');
				$this->load->view('admin/fields/default',$data); 
				$this->load->view('admin/fields/footer');
			}

		}

		

	}

	 /**
	  *  @Description: custom function to check if _POST name starts with opts
	  *       @Params: string, startwith string
	  *
	  *  	 @returns: true or false
	  */
	public function startsWith($haystack, $needle)
	{
	     $length = strlen($needle);
	     return (substr($haystack, 0, $length) === $needle);
	}



}

/* End of file Field_builder.php */
/* Location: ./application/controllers/admin/Field_builder.php */