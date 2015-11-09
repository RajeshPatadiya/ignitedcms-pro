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
			 

			 foreach ($query2 as $key) 
			 {
			 	foreach ($key as $f_name => $f_content) 
			 	{
			 		if($this->is_asset($f_name))
			 	   	{
			 	   		$arr[$name][$f_name] = $this->get_assets($f_content);
			 	   	}
			 	   	else
			 	   	{
			 	   		$arr[$name][$f_name] = $f_content;
			 	   	}
			 	   	
			 	}
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

	 /**
	  *  @Description: checks if field is an asset
	  *       @Params: fieldname
	  *
	  *  	 @returns: TRUE or FALSE
	  */
	public function is_asset($fieldname)
	{
		$this->db->select('type');
		$this->db->from('fields');
		$this->db->where('name', $fieldname);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$type = "";
		foreach ($query->result() as $row) 
		{
			$type = $row->type;
		}

		if($type === 'file-upload')
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}

	}

	 /**
	  *  @Description: store the assets in a 2d multi assoc array
	  *       @Params: ids as comma delimited string {2,23,58}
	  *
	  *  	 @returns: array
	  */
	public function get_assets($asset_ids)
	{
		
		if(($asset_ids === NULL)  or (strlen($asset_ids) == 0))
        {
        	//do nothing
        }
        else
        {

        	$arr = array();
        	$counter = 0;
			//first explode
			$ids = explode(",", $asset_ids);

			foreach ($ids as $key)
			{
				$this->db->select('*');
				$this->db->from('assetfields');
				$this->db->where('id', $key);

				$query = $this->db->get();
			
				$query = $query->result_array();
				$arr[$counter] = $query[0];
				$counter++;
			}

			return $arr;
		}

	}

}

/* End of file Stuff_globals.php */
/* Location: ./application/models/Stuff_globals.php */