<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stuff_globals extends CI_Model {


	 /**
	  *  @Description: loop through database and build global array for twig
	  *       @Params: none
	  *
	  *  	 @returns: array
	  */

	public function dump_globals()
	{
		//loop through entry's and select global types
		$this->db->select('*');
		$this->db->from('entry');
		$this->db->where('type', 'Global');

		$query = $this->db->get();
		

		$arr = array();
		foreach ($query->result() as $row) 
		{
			$name = $this->get_section_name($row->sectionid);

			$this->db->select('*');
			$this->db->from('content');
			$this->db->where('entryid', $row->id);

			$query2 = $this->db->get();
		
			 $query2 = $query2->result_array();
			 foreach ($query2 as $key ) {
			 	$arr[$name] =  $key;
			 }
			

		}
		
		return $arr;

	}

	/**
	  *  @Description: returns the section name
	  *       @Params: sectionid
	  *
	  *  	 @returns: string (section_name)
	  */
	public function get_section_name($sectionid)
	{
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
		return $section_name;
	}

	

}

/* End of file Stuff_globals.php */
/* Location: ./application/models/Stuff_globals.php */