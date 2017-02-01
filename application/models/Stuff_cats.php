<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stuff_cats extends CI_Model {


	 /**
	  *  @Description: returns an array of the cat id and if it is checked
	  *       @Params: productid
	  *
	  *  	 @returns: $sd = array(
	  *	                       array('id' => 1, 'cat_name' => '', 'checked' => 0),
      *			  			   array('id' => 2, 'cat_name' => '', 'checked' => 1),
	  *		  				   array('id' => 3, 'cat_name' => '', 'checked' => 0),
      *			 			);
	  */
	public function get_cat_for_product($productid)
	{
		$this->db->select('*');
		$this->db->from('cats');

		$query = $this->db->get();
		
		$sd = array();
		foreach ($query->result() as $row) 
		{
			
			$is_checked = $this->is_checked($row->id,$productid);

			$tmp = array('id' => $row->id, 'cat_name' => $row->cat_name, 'checked' => $is_checked);
			array_push($sd, $tmp);
		}

		return $sd;
		


	}

	 /**
	  *  @Description: description
	  *       @Params: cat_id, productid
	  *
	  *  	 @returns: "" or "checked"
	  */
	public function is_checked($cat_id, $productid)
	{

		$this->db->select('*');
		$this->db->from('cat_links');
		$this->db->where('prod_id', $productid);
		$this->db->where('cat_id', $cat_id);

		$query = $this->db->get();
		
		$is_checked = "";

		if($query->num_rows() > 0)
		{
		   $is_checked = "checked";
		}

		return $is_checked;
		

	}
	

}

/* End of file Stuff_cats.php */
/* Location: ./application/models/Stuff_cats.php */