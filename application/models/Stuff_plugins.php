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
    	//make sure duplicate entry does not exist


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

        //delete the permission and permission map first
        $this->db->select('name');
        $this->db->from('plugins');
        $this->db->limit(1);

        $query = $this->db->get();
        
        $name = "";
        foreach ($query->result() as $row) 
        {
            $name = $row->name;
        }
        

        $this->db->select('permissionID');
        $this->db->from('permissions');
        $this->db->where('permission', $name);
        $this->db->limit(1);

        $query2 = $this->db->get();
        
        foreach ($query2->result() as $row) 
        {
            //delete the permission map
            $this->db->where('permissionID', $row->permissionID);
            $this->db->delete('permission_map');
            
        }
        

        //delete the permission
        $this->db->where('permission', $name);
        $this->db->delete('permissions');


        //finallly delete the plugin entry

    	$this->db->where('id', $id);
    	$this->db->delete('plugins');

    }
	

}

/* End of file Stuff_plugins.php */
/* Location: ./application/models/Stuff_plugins.php */