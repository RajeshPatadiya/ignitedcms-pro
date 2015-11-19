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
	  *  @Description: Save only multiple routes
	  *       @Params: $sectionid, $entryid, $slug or EntryTitle
	  *
	  *  	 @returns: returns
	  */
	public function save_multiple_route($sectionid,$entryid,$entrytitle)
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

		//convert the entrytitle to safe url spaced replaced with dashes
		$entrytitle = $this->dash($entrytitle);

		$route = $route ."/". $entrytitle;

		$controller = "admin/test_twig/display/$entryid/$sectionid";

		//first check if route already exists
		//otherwise do an update instead of insert
		$this->db->select('controller');
		$this->db->from('routes');
		$this->db->where('controller', $controller);
		$query = $this->db->get();
		
		//////////////////////////////////////////
		//
		//  To do check for duplicate entry titles
		//  otherwise will conflict with urls
		//
		//
		//
		////////////////////////////////////////////

		

		if($query->num_rows() > 0)
		{
			//update if already exists
			$object = array('route' => $route );

			$this->db->where('controller', $controller);
			$this->db->update('routes', $object);

		}
		else
		{
			//otherwise do an insert
			$object = array('route' => $route, 'controller' => $controller );
			$this->db->insert('routes', $object);

		}

	}


	 /**
	  *  @Description: Save the route for the multiple index file
	  *       @Params: section_name
	  *
	  *  	 @returns: nothing
	  */
	public function save_multiple_index($section_name)
	{
		$route = $section_name;

		$controller = "admin/test_twig/index_page/$section_name";

		$object = array('controller' => $controller, 'route' => $route );
		$this->db->insert('routes', $object);

	}




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

	 /**
	  *  @Description: Remove the route if section is deleted
	  *       @Params: sectionid
	  *
	  *  	 @returns: returns
	  */
	public function remove_route($sectionid)
	{
		//first get the sectionHandle
		$this->db->select('name');
		$this->db->from('section');
		$this->db->where('id', $sectionid);
		$this->db->limit(1);
		$query = $this->db->get();
		
		$handle = "";
		foreach ($query->result() as $row) 
		{
			$handle = $row->name;
		}

		$this->db->like('route', $handle, 'after'); 
		$this->db->delete('routes');
		


	}


	/**
	 * Underscore
	 *
	 * Takes multiple words separated by spaces and puts a dash between  them
	 *
	 * @param	string	$str	Input string
	 * @return	string
	 */
	public function dash($str)
	{
		return preg_replace('/[\s]+/', '-', trim(MB_ENABLED ? mb_strtolower($str) : strtolower($str)));
	}



}

/* End of file Stuff_routes.php */
/* Location: ./application/models/Stuff_routes.php */