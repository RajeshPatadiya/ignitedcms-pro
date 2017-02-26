<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stuff_plugins extends CI_Model {

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('plugins');
        
		$query = $this->db->get();
		
		return $query;

	}


    public function add_plug($name,$install,$status)
    {
    	$object = array(
    		'name'=>$name,'install'=>$install,'status'=>$status


    		);
    	$this->db->insert('plugins', $object);


    }

    public function edit_plug($id,$name,$install,$status)
    {

    	$object = array(
    		'name'=>$name,'install'=>$install,'status'=>$status


    		);

    	$this->db->where('id', $id);
    	$this->db->update('plugins', $object);


    }

    public function get_plug($id)
    {

    	$this->db->select('*');
    	$this->db->from('plugins');
    	$this->db->where('id', $id);

    	$query = $this->db->get();
    		
    	return $query;


    }

    public function delete_plug($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('plugins');

    }
	

}

/* End of file Stuff_plugins.php */
/* Location: ./application/models/Stuff_plugins.php */