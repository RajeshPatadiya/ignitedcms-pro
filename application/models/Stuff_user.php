<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: Sanity check for adding a user, eg passwords, duplicate emails etc
  *       @Params: 
  *
  *  	 @returns: 
  */


class Stuff_user extends CI_Model {

	 public function __construct()
	 {
	 	  parent::__construct();

	 	  include('./resources/password/password.php');
	 }

	 /**
	  *  @Description: add new user 
	  *       @Params: name (username must be unique),email (unique),password,permissiongroup id
	  *
	  *  	 @returns: string ("*" or "Fail message") * indicates success
	  */
	public function add_user($name,$email,$password,$permissiongroup)
	{
		$pass = "*";

		//check if unique username
		$this->db->select('name');
		$this->db->from('user');
		$this->db->where('name', $name);

		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			$pass = $pass . "<br/>Username exists please choose another!";
		}
		


		//check if unique email
		//check if unique username
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('email', $email);

		$query2 = $this->db->get();
		
		if ($query2->num_rows() > 0)
		{
			$pass = $pass . "<br/>Email account already exists please choose another!";
		}

		//check if password is secure
		if($this->check_password($password) == false)
		{
			$pass = $pass . "<br/>Password does not meet minimum requirements!";
		}

		//check if valid permission group
		$this->db->select('groupID');
		$this->db->from('permission_groups');
		$this->db->where('groupID', $permissiongroup);

		$query3 = $this->db->get();
		
		//important use equal here!!!!
		if ($query3->num_rows() == 0)
		{
			$pass = $pass . "<br/>You have not selected a role!";
		}
		

		return $pass;


	}

	 /**
	  *  @Description: gets the current user's email address
	  *       @Params: userid
	  *
	  *  	 @returns: email
	  */
	public function get_user_email($userid)
	{
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('id', $userid);
		$this->db->limit(1);

		$query = $this->db->get();
		$email = "";
		foreach ($query->result() as $row) 
		{
			$email =  $row->email;
		}
		return $email;

	}


	 /**
	  *  @Description: update password checks to see if minimum requirements
	  *       @Params: password, activ_key
	  *
	  *  	 @returns: returns
	  */
	public function update_password($password,$activ_key)
	{
		
		$pass = "*";
		//check if password is secure
		if($this->check_password($password) == false)
		{
			$pass = $pass . "<br/>Password does not meet minimum requirements!";
		}
		else
		{
			$hashed_password = password_hash($password, PASSWORD_BCRYPT);

			$object = array('password' => $hashed_password );

			$this->db->where('activ_key', $activ_key);
			$this->db->update('user', $object);

		}
		


	}



	 /**
	  *  @Description: send email link password reset
	  *                checks to see if username is valid
	  *       @Params: username
	  *
	  *  	 @returns: string success or fail
	  */
	public function send_reset($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('name', $username);
		$this->db->limit(1);

		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			//get the email
			$email = "";
			foreach ($query->result() as $row) 
			{
				$email = $row->email;
			}

			
			$hash = random_string('md5');

			$url = site_url('admin/login/reset_view');
			$url = $url . "/$hash";

			$b = anchor($url, 'link', 'attributs');

			$body = "Please click the link to reset your password. <br/> $b";


			$this->load->model('Stuff_email');
			$this->Stuff_email->my_email($email,"Me", 'Password Reset',$body);


			//finally update user record activ_key
			$object = array('activ_key' => $hash );

			$this->db->where('name', $username);
			$this->db->update('user', $object);

			return "sent";

		}
		else
		{
			return "Username doesn't exist!";

		}

	}


	/**
	  *  @Description: add new user 
	  *       @Params: permissiongroup id
	  *
	  *  	 @returns: string ("*" or "Fail message") * indicates success
	  */
	public function update_user($permissiongroup)
	{
		$pass = "*";


		//check if valid permission group
		$this->db->select('groupID');
		$this->db->from('permission_groups');
		$this->db->where('groupID', $permissiongroup);

		$query3 = $this->db->get();
		
		//important use equal here!!!!
		if ($query3->num_rows() == 0)
		{
			$pass = $pass . "<br/>You have not selected a valid role!";
		}
		

		return $pass;


	}

	 /**
        *  @Description: make sure password is secure
        *                One number and Upper case letter
        *       @Params: params
        *
        *     @returns: returns
        */
      public function check_password($pwd)
      {
			$error ="";       

			if( strlen($pwd) < 6 ) 
			{
			  $error .= "Password too short! ";
			}


			if( !preg_match("#[0-9]+#", $pwd) ) 
			{
			  $error .= "Password must include at least one number! ";
			}


			if( !preg_match("#[a-zA-z]+#", $pwd) ) 
			{
			  $error .= "Password must include at least one letter! ";
			}


			if($error)
			{
			    return false;
			} 
			else 
			{
			  return true;
			}
      }

       /**
        *  @Description: sorts the user by either username, email, or role
        *       @Params: string username,email,or role
        *
        *  	 @returns: returns query object
        */

      public function sort_by($column)
      {
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('permission_groups', 'permission_groups.groupID = user.permissiongroup');
			$this->db->order_by($column, 'asc');

			$query = $this->db->get();
			
			return $query;
			


      }

       /**
        *  @Description: check to see if user is admin
        *       @Params: params
        *
        *  	 @returns: 1 or 0
        */
      public function is_admin($userid)
      {

			$this->db->select('isadmin');
			$this->db->from('user');
			$this->db->where('id', $userid);
			$this->db->limit(1);

			$query = $this->db->get();

			$is_admin = 0;
			foreach ($query->result() as $row) 
			{
				$is_admin = $row->isadmin;
			}

			return $is_admin;
      }



       /**
        *  @Description: delete user except admin!!
        *       @Params: userid
        *
        *  	 @returns: nothing
        */
      public function delete_user($userid)
      {

      	 $this->db->select('isadmin');
      	 $this->db->from('user');
      	 $this->db->where('id', $userid);
      	 $this->db->limit(1);

      	 $query = $this->db->get();
      	 
      	 $is_admin = 0;
      	 foreach ($query->result() as $row) 
      	 {
      	 	$is_admin = $row->isadmin;
      	 }

      	 //if not admin then proceed to delete user
      	 if ($is_admin != 1)
      	 {
      	 	$this->db->where('id', $userid);
      	 	$this->db->delete('user');


      	 }

      }


}

/* End of file stuff_user.php */
/* Location: ./application/models/stuff_user.php */