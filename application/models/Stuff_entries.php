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
	  *  	 @returns: array (sectionid, entryid)
	  */

	public function del_asset($assetid)
	{
		$this->db->select('*');
		$this->db->from('assetfields');
		$this->db->where('id', $assetid);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$entryid = "";
		$fieldname = "";
		foreach ($query->result() as $row) 
		{
			$entryid = $row->entryid;
			$fieldname = $row->fieldname;
		}

		//now get the sectionid
		$this->db->select('sectionid');
		$this->db->from('entry');
		$this->db->where('id', $entryid);
		$this->db->limit(1);

		$query2 = $this->db->get();
		
		$sectionid = "";
		foreach ($query2->result() as $row) 
		{
			$sectionid =  $row->sectionid;
		}

		//now do the delete
		//$this->db->where('id', $assetid);
		//$this->db->delete('assetfields');

		//now remove from contents table
		$this->db->select($fieldname);
		$this->db->from('content');
		$this->db->where('entryid', $entryid);

		$query = $this->db->get();
		
		$orig = "";
		foreach ($query->result() as $row) 
		{
			$orig =  $row->$fieldname;
		}
		
		//remove id rebuild comma delimited string
		$orig = str_replace($assetid, "", $orig);
		

		//utlitise string helper to tidy comma output
		$orig = reduce_multiples($orig, ",", TRUE);

		$object = array($fieldname => $orig );

		$this->db->where('entryid', $entryid);
		$this->db->update('content', $object);




		$tmp = array('entryid' => $entryid, 'sectionid' => $sectionid);

		return $tmp;
		
		


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