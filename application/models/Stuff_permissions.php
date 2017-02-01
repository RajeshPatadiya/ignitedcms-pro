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
	  *  @Description: return a prettier name for the controller
	  *       @Params: controller name
	  *
	  *  	 @returns: returns
	  */
	public function get_name($controller)
	{
		if($controller == "users")
		{
			return "Users";
		}
		
		if($controller == "permissions")
		{
			return "Permissions";
		}
		
		if($controller == "profile")
		{
			return "Profile";
		}
		
		if($controller == "email")
		{
			return "Email System ";
		}
		if($controller == "help")
		{
			return "Help";
		}
		if($controller == "mbl_artwork")
		{
			return "Artwork";
		}
		if($controller == "mbl_enquiry")
		{
			return "Enquiry";
		}
		if($controller == "mbl_purchase")
		{
			return "Purchase Orders";
		}
		if($controller == "mbl_suppliers")
		{
			return "Suppliers";
		}
		if($controller == "mbl_reports")
		{
			return "Reports";
		}
		if($controller == "mbl_dealers")
		{
			return "Dealers";
		}




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
		


		if($controller == "permissions")
		{
			return "fa fa-lock big";
		}
		
		if($controller == "profile")
		{
			return "fa fa-user big";
		}
		
		if($controller == "email")
		{
			return "fa fa-envelope big";
		}
		if($controller == "help")
		{
			return "fa fa-question big";
		}
		
	}

}

/* End of file stuff_permissions.php */
/* Location: ./application/models/stuff_permissions.php */