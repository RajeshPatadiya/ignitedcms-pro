<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: Dynamically create routes for SEO engines
  *       		   Ingeniously save sections and multiple 
  *				   entries as they are created on the fly	
  *				   and generate unique dynamic routes
  *  	
  */

class Stuff_routes extends CI_Model {

	 /**
	  *  @Description: Save new section route to db route table
	  *       @Params: sectionid,entryid
	  *
	  *  	 @returns: nothing
	  */
	public function save_new_route($sectionid,$entryid)
	{
		//get the section name
		$this->db->select('name');
		$this->db->from('section');
		$this->db->where('id', $sectionid);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$section_name = "";
		foreach ($query->result() as $row) 
		{
			$section_name = $row->name;
		}

		$route = $section_name;
		$controller = "admin/test_twig/display/$entryid/$sectionid";
		
		$object = array('route' => $route, 'controller' => $controller );

		$this->db->insert('routes', $object);

	}


}

/* End of file Stuff_routes.php */
/* Location: ./application/models/Stuff_routes.php */