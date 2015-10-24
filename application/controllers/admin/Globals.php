<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: This class is for the global options that will be accessible on all pages
  *       @Params: params
  *
  *  	 @returns: returns
  */


class Globals extends CI_Controller {

	public function index()
	{
	   //main entry point!
		$this->db->select('entry.id AS eid,section.name,entry.sectionid,entry.type');
		$this->db->from('entry');
		$this->db->join('section', 'section.id = entry.sectionid', 'left');
		$this->db->where('section.sectiontype', 'Global');
		
		//ONLY select the global section types!!!
		

		$query = $this->db->get();
		

		$data['query'] = $query;


		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/globals/default',$data); 
		$this->load->view('admin/globals/footer');

	}

	/**
	  *  @Description: dumps all fields related to the global section id
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */

	public function render_section($sectionid,$entryid)
	{
		$this->db->select('*');
		$this->db->from('section_layout');
		$this->db->where('sectionid', $sectionid);

		$query = $this->db->get();
		
		
		
		$data['query'] = $query;

		$data['entryid'] = $entryid;
		$data['sectionid'] = $sectionid;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/globals/render',$data); 
		$this->load->view('admin/globals/footer',$data);


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

		if ($this->form_validation->run() == FALSE)
		{

			//failed

			$this->db->select('*');
			$this->db->from('section_layout');
			$this->db->where('sectionid', $sectionid);

			$query = $this->db->get();
			
			
			
			$data['query'] = $query;

			$data['entryid'] = $entryid;
			$data['sectionid'] = $sectionid;

			$this->load->view('admin/header');
			$this->load->view('admin/body');
			$this->load->view('admin/globals/render',$data); 
			$this->load->view('admin/globals/footer',$data);

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
						foreach ($_POST[$key] as $b => $value) {
							$total_contents = $total_contents .",". $value;
						}
					    
					}
					//trim the first comma!
					$total_contents = ltrim($total_contents,",");
					

	    			$arr[$key2] = $total_contents;

	    		}
	    		else
	    		{
	    			//$object = array( $key => $value  );
	    			$arr[$key] = trim($value);

	    		}

	    	}

	    	//update the content table NOT insertd
	    	$this->db->where('entryid', $entryid);
	    	$this->db->update('content', $arr);

	    	redirect("admin/globals/render_section/$sectionid/$entryid", "refresh");
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

/* End of file Globals.php */
/* Location: ./application/controllers/admin/Globals.php */