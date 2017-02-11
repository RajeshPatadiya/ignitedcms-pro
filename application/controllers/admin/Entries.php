<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entries extends CI_Controller {

	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		$this->load->model('Stuff_permissions');
					$pass = $this->Stuff_permissions->has_permission("entries");

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
	  *  @Description: special function to add a type of 'multiple'
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function add_multiple_entry($sectionid,$type)
	{
		//first add entry then get the insert_id and add content
		$object3 = array('sectionid' => $sectionid , 'type' => $type );
		$this->db->insert('entry', $object3);

		$entryid = $this->db->insert_id();

		$object4 = array('entryid' => $entryid );
		$this->db->insert('content', $object4);

		redirect("admin/entries/show_multiple_view/$sectionid","refresh");

	}


	public function index()
	{
		$this->db->select('entry.id AS eid,section.name,entry.sectionid,entry.type');
		$this->db->from('entry');
		$this->db->join('section', 'section.id = entry.sectionid', 'left');
		$this->db->where('section.sectiontype', 'Single');

		$query = $this->db->get();
		
		$data['query'] = $query;

		$this->db->select('*');
		$this->db->from('section');
		$this->db->where('sectiontype','Multiple');

		$query2 = $this->db->get();
		
		$data['query2'] = $query2;


		$this->db->select('entry.id AS eid,section.name,entry.sectionid,entry.type');
		$this->db->from('entry');
		$this->db->join('section', 'section.id = entry.sectionid', 'left');
		$this->db->where('section.sectiontype', 'Global');
		
		//ONLY select the global section types!!!
		

		$query3 = $this->db->get();
		

		$data['query3'] = $query3;
		
		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/entries/default',$data); 
		$this->load->view('admin/entries/footer');


	}

	public function show_multiple_view($sectionid)
	{
		$this->db->select('entry.id AS eid,section.name,entry.sectionid,entry.type');
		$this->db->from('entry');
		$this->db->join('section', 'section.id = entry.sectionid', 'left');
		$this->db->where('section.id', $sectionid);

		$query = $this->db->get();
		
		$data['query'] = $query;
		$data['sect_id'] = $sectionid;
		

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/entries/add',$data); 
		$this->load->view('admin/entries/footer');


	}

	/**
	  *  @Description: dumps all fields related to section id
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */

	public function render_section($sectionid,$entryid)
	{
		
		//get the section name
		$this->db->select('*');
		$this->db->from('section');
		$this->db->where('id', $sectionid);
		$this->db->limit(1);

		$query2 = $this->db->get();
		
		$section_name = "";
		$type = "";
		foreach ($query2->result() as $row) 
		{
			$section_name =  $row->name;
			$type = $row->sectiontype;
		}
		
		$data['section_name'] = $section_name;
		$data['type'] = $type;



		$this->db->select('*');
		$this->db->from('section_layout');
		$this->db->where('sectionid', $sectionid);

		$query = $this->db->get();


		//get all asset files
		$this->db->select('*');
		$this->db->from('assetfields');

		$query3 = $this->db->get();
		
		
		



		
		
		
		$data['query'] = $query;
		$data['query3'] = $query3;

		$data['entryid'] = $entryid;
		$data['sectionid'] = $sectionid;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/entries/render',$data); 
		$this->load->view('admin/entries/footer',$data);


	}

	 /**
	  *  @Description: To do ONLY delete multiple entries and not singles or globals
	  *       @Params: sectionid
	  *
	  *  	 @returns: returns
	  */
	public function search_posts_or_delete($sectionid)
	{
		//check if search or delete
		if($this->input->post('sbm') == "search") 
		{
			///////////////////////////////////////////
			//
			//  Doesn't work need to do another join
			//
			///////////////////////////////////////////
			$search_term = $this->input->post('search_term');

			$this->db->select('entry.id AS eid,section.name,entry.sectionid,entry.type');
			$this->db->from('entry');
			$this->db->join('section', 'section.id = entry.sectionid', 'left');
			$this->db->where('section.id', $sectionid);
			$this->db->like('name', $search_term);

			$query = $this->db->get();
			
			$data['query'] = $query;
			$data['sect_id'] = $sectionid;
			

			$this->load->view('admin/header');
			$this->load->view('admin/body');
			$this->load->view('admin/entries/add',$data); 
			$this->load->view('admin/entries/footer');
		}

		if($this->input->post('sbm') == "delete") 
		{
			
			$this->load->model('Stuff_entries');

			//iterate over selected items and delete
			if (isset($_POST['chosen']))
			{
				$arrayName = $_POST['chosen'];

				foreach ($arrayName as $key => $value) 
				{
					
					$this->Stuff_entries->del_entry($value);

				}
				
			}
			
			//return to page view
			redirect("admin/entries/show_multiple_view/$sectionid","refresh");
		
		}
	}



	 /**
	  *  @Description: removes image asset
	  *       @Params: assetid
	  *
	  *  	 @returns: goes to view
	  */
	public function remove_asset($entryid,$fieldname)
	{
		//first get the sectionid and entryid so we can return to view file!!
		//do this before deleting
		$this->load->model('Stuff_entries');
		$arr = $this->Stuff_entries->del_asset($entryid,$fieldname);


		//get the sectionid
		$this->db->select('sectionid');
		$this->db->from('entry');
		$this->db->where('id', $entryid);
		$this->db->limit(1);
		$query = $this->db->get();
		
		$sectionid = "";
		foreach ($query->result() as $row) 
		{
			$sectionid =  $row->sectionid;
		}
		



		redirect("admin/entries/render_section/$sectionid/$entryid", "refresh");



	}


	 /**
	  *  @Description: loop the _POST values and save into db consider dynamic formvalidation later
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */

    public function save_content($sectionid,$entryid)
    {

    	
    	//dynamically create the rules on each post value
    	//query database on field name for formvalidation rules
    	$config = array();

    	//value is post content key is post name

    	$counter = 0;
    	foreach($_POST as $key => $value) 
    	{
    		
    		//please ignore checkbox _POST vars
    		if ($this->startsWith($key, "chk-"))
    		{
    			//skip
    		}
    		elseif ($key == "entrytitle")
    		{
    			$rule2 =  array(
	                'field' => $key,
	                'label' => $key,
	                'rules' => 'required'
	        	);

	        	$config[$counter] = $rule2;
	        	$counter++;
    		}
    		else
    		{
    			

	    		//check if required append |required to rules string
	    		$this->db->select('*');
	    		$this->db->from('fields');
	    		$this->db->join('section_layout', 'fields.id = section_layout.fieldid', 'left');
	    		$this->db->where('fields.name', $key);
	    		$this->db->where('section_layout.sectionid', $sectionid);
	    		$this->db->limit(1);

	    		$query2 = $this->db->get();
	    		
	    		$re = "";
	    		foreach ($query2->result() as $row) 
	    		{
	    			if($row->required == "1")
	    			{
	    				$re = "|required";
	    			}
	    		}
	    		

	    		$this->db->select('formvalidation');
	    		$this->db->from('fields');
	    		$this->db->where('name', trim($key));
	    		$this->db->limit(1);

	    		$query = $this->db->get();
	    		
	    		$rules = "";
	    		foreach ($query->result() as $row) 
	    		{
	    			$rules =  $row->formvalidation;
	    		}
	    		
	    		$rules = $rules . $re;

	    		$rule1 =  array(
	                'field' => $key,
	                'label' => $key,
	                'rules' => $rules
	        	);

	    		//echo $rules;
	    		$config[$counter] = $rule1;

	    		$counter++;

	    		//reset $re variable
	    		$re = "";

    		}
    	}
    	

		$this->form_validation->set_rules($config);

		// echo '<pre>';
		// print_r($config);
		// echo '</pre>';

		if ($this->form_validation->run() == FALSE)
		{

			//failed

			//get the section name
			$this->db->select('*');
			$this->db->from('section');
			$this->db->where('id', $sectionid);
			$this->db->limit(1);

			$query2 = $this->db->get();
			
			$section_name = "";
			$type = "";
			foreach ($query2->result() as $row) 
			{
				$section_name =  $row->name;
				$type = $row->sectiontype;
			}
			
			$data['section_name'] = $section_name;
			$data['type'] = $type;


			$this->db->select('*');
			$this->db->from('section_layout');
			$this->db->where('sectionid', $sectionid);

			$query = $this->db->get();


			//get all asset files
			$this->db->select('*');
			$this->db->from('assetfields');

			$query3 = $this->db->get();
			
			
			
			$data['query'] = $query;
			$data['query3'] = $query3;

			$data['entryid'] = $entryid;
			$data['sectionid'] = $sectionid;

			$this->load->view('admin/header');
			$this->load->view('admin/body');
			$this->load->view('admin/entries/render',$data); 
			$this->load->view('admin/entries/footer',$data);

		}
		else
		{
			//successful

			$arr = array();
			foreach($_POST as $key => $value) 
	    	{
	    		
	    		//special case for checkbox _POST vars
	    		if ($this->startsWith($key, "chk-"))
	    		{
	    			//chk-checkboxHandle
	    			$ab = explode("-", $key);

	    			//collect the checkbox handle name
	    			$key2 = $ab[1];

	    			$total_contents = "";
	    			if (isset($_POST[$key])) 
					{
						//loop through each post and build comma delimited string
						foreach ($_POST[$key] as $b => $value) 
						{
							$total_contents = $total_contents .",". $value;
						}
					    
					}
					//trim the first comma!
					$total_contents = ltrim($total_contents,",");
					

	    			$arr[$key2] = $total_contents;

	    		}

	    		else
	    		{
	    			
	    			//special case to prevent saving date as 0000-00-00

	    			$this->load->model('stuff_fields');
	    			$type = $this->stuff_fields->get_field_type_n($key);

	    			if($type == 'date')
	    			{
	    				//10 is character count xxxx-xx-xx
	    				if(strlen($value) == 10)
	    				{
	    					$arr[$key] = trim($value);
	    				}
	    				else
	    				{
	    					//do nothing
	    					//don't save the empty date field
	    				}
	    				
	    			}
	    			else
	    			{
	    				$arr[$key] = trim($value);
	    			}


	    		}

	    	}


	    	//update the content table NOT insertd
	    	$this->db->where('entryid', $entryid);
	    	$this->db->update('content', $arr);

	    	//if multiple save new route!!
	    	if($this->input->post('entrytitle'))
	    	{
	    		$entrytitle = $this->input->post('entrytitle');
	    		$this->load->model('Stuff_routes');
	    		$this->Stuff_routes->save_multiple_route($sectionid,$entryid,$entrytitle);
	    	}







	    	redirect("admin/entries/render_section/$sectionid/$entryid", "refresh");
		}
    }

     /**
	  *  @Description: custom function to check if _POST name starts with chk
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

/* End of file Entries.php */
/* Location: ./application/controllers/admin/Entries.php */