<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stuff_entries extends CI_Model {

	 


	 /**
	  *  @Description: delete the multiple entry only
	  *       @Params: entryid
	  *
	  *  	 @returns: nothing
	  */		

	public function del_entry($entryid)
	{
		
		//delete the routes
		


		$this->db->where('id', $entryid);
		$this->db->delete('entry');

		



	} 



	 /**
	  *  @Description: description
	  *       @Params: assetid
	  *
	  *  	 @returns: 
	  */

	public function del_asset($entryid,$fieldname)
	{
		
		//blank it out
		$object = array($fieldname => "" );

		$this->db->where('entryid', $entryid);
		$this->db->update('content', $object);
		
		


	}




	 /**
	  *  @Description: check if asset uploads have been exceeded
	  *       @Params: params
	  *
	  *  	 @returns: return TRUE or FALSE
	  */

	public function asset_upload_exceeded($entryid,$fieldname)
	{
		$this->db->select($fieldname);
		$this->db->from('content');
		$this->db->where('entryid', $entryid);
	
		$this->db->limit(1);

		$query = $this->db->get();
		
		$stuff = "";
		foreach ($query->result() as $row) 
		{
			$stuff =  $row->$fieldname;
		}

		$total = 0;
		if(($stuff === NULL) or (strlen($stuff == 0)))
		{

		}
		else
		{
			$arr = explode(",", $stuff);
			$total = count($arr);
		}

		


		//now get the limit

		$this->db->select('limitamount');
		$this->db->from('fields');
		$this->db->where('name', $fieldname);
		$this->db->limit(1);

		$query2 = $this->db->get();
		
		$limit = 0;
		foreach ($query2->result() as $row) 
		{
			$limit = $row->limitamount;
		}
		
		if($total < $limit )
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
		

	}
	

}

/* End of file Stuff_entries.php */
/* Location: ./application/models/Stuff_entries.php */