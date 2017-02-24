<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stuff_permissions extends CI_Model {

	 /**
	  *  @Description: This function returns all the pages the user has access to
	  *                in a comma separated string
	  *       @Params: params
	  *
	  *  	 @returns: pages,blog... etc
	  */
	public function get_permissions($userid)
	{
		

		$this->db->select('permissiongroup');
		$this->db->from('user');
		$this->db->where('id', $userid);

		$query = $this->db->get();
		

		$groupID = "";
		foreach ($query->result() as $row) 
		{
			$groupID =  $row->permissiongroup;
		}

		//this user has access to

		$this->db->select('*');
		$this->db->from('permissions');
		$this->db->join('permission_map', 'permission_map.permissionID = permissions.permissionID');
		$this->db->where('permission_map.groupID', $groupID);
		$this->db->order_by('permissions.order_position', 'asc');

		$query2 = $this->db->get();
		
		$permissions = "";

		foreach ($query2->result() as $row) 
		{
			$permissions = $permissions .$row->permission . ",";
			
		}

		return $permissions;

	}

	 /**
	  *  @Description: deletes group, checks if any users are assigned to group 
	  *                if so displays an error message, same with admin group
	  *       @Params: groupID
	  *
	  *  	 @returns: string * if successful or error message
	  */
	public function delete_group($groupID)
	{
		$pass = "*";
		//first check if groupID is linked with any users

		$this->db->select('*');
		$this->db->from('permission_groups');
		$this->db->join('user', 'user.permissiongroup = permission_groups.groupID');
		$this->db->where('permission_groups.groupID', $groupID);

		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			$pass = "<br/> Cannot delete group, A user is assigned to this group!
					 <br/> Please assign the user to another group and then try to delete.";
		}
		else
		{
			//check if trying to delete admin
			if($groupID != '1')
			{
				$this->db->where('groupID', $groupID);
				$this->db->delete('permission_groups');
			}
		}
		return $pass;

	}


	 /**
	  *  @Description: see if user has permission to controller
	  *       @Params: controller name
	  *
	  *  	 @returns: true or false
	  */
	public function has_permission($name_of_controller)
	{
		$perms = $this->session->userdata('permissions');

		$array = explode(",", $perms);

		$pass = false;
		foreach ($array as $key) 
		{
			if($name_of_controller == $key)
			{
				$pass = true;
			}
		}

		return $pass;


	}

	 /**
	  *  @Description: returns the icon for the controller name
	  *       @Params: controller name
	  *
	  *  	 @returns: string icon
	  */
	public function get_icon($controller)
	{

		if($controller == "users")
		{
			return "fa fa-users big";
		}
		if($controller == "site_settings")
		{
			return "fa fa-gear big";
		}
		if($controller == "assets")
		{
			return "fa fa-picture-o big";
		}
		if($controller == "blog")
		{
			return "fa fa-pencil big";
		}
		if($controller == "field_builder")
		{
			return "fa fa-bars big";
		}
		if($controller == "sections")
		{
			return "fa fa-pencil-square-o big";
		}
		if($controller == "entries")
		{
			return "fa fa-pencil big";
		}

		if($controller == "globals")
		{
			return "fa fa-globe big";
		}


		if($controller == "permissions")
		{
			return "fa fa-lock big";
		}
		if($controller == "menu")
		{
			return "fa fa-tasks big";
		}
		if($controller == "profile")
		{
			return "fa fa-user big";
		}
		if($controller == "pages")
		{
			return "fa fa-book big";
		}
		if($controller == "email")
		{
			return "fa fa-envelope big";
		}
		if($controller == "help")
		{
			return "fa fa-question big";
		}
		if($controller == "database")
		{
			return "fa fa-random big";
		}
		if($controller == "product_admin")
		{
			return "fa fa-shopping-cart big";
		}
		if($controller == "categories")
		{
			return "fa fa-tag big";
		}

		if($controller == "asset_lib")
		{
			return "fa fa-picture-o big";
		}
        if($controller == "plugins")
        {
            return "fa fa-upload big";
        }


	}

}

/* End of file stuff_permissions.php */
/* Location: ./application/models/stuff_permissions.php */