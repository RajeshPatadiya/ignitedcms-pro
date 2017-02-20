<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: Create new users and define user management roles
  *       @Params: 
  *
  *  	 @returns: 
  */



class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		{
		  	//inlcude a better hashing library
            include('./resources/password/password.php');


		  	if($this->session->userdata('isloggedin')=='1')
		  	{
		  		$this->load->model('Stuff_permissions');
				$pass = $this->Stuff_permissions->has_permission("users");

				if($pass != true)
				{
					redirect('admin/dashboard','refresh');
				}
		  	}
		  	else
		  	{
		  		redirect('admin/installer','refresh');
		  	}
		}
	}

	public function index()
	{

		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('permission_groups', 'permission_groups.groupID = user.permissiongroup');
		

		$query = $this->db->get();
		
		$data['query'] = $query;
		
		
		foreach ($query->result() as $row) 
		{
			// echo $row->name;
			// echo $row->email;
			// echo $row->groupName;
		}

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/users/user-view',$data); 
		$this->load->view('admin/footer');
		
	}


	 /**
	  *  @Description: description
	  *       @Params: column
	  *
	  *  	 @returns: redirect to main page
	  */
	public function sort_by($column)
	{
		$this->load->model('Stuff_user');
		$query = $this->Stuff_user->sort_by($column);

		$data['query'] = $query;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/users/user-view',$data); 
		$this->load->view('admin/footer');


	}



	 /**
	  *  @Description: Add user view, assign username password and role
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function add_user_view()
	{
		
		$this->db->select('*');
		$this->db->from('permission_groups');
		$query = $this->db->get();
		
		$data['query'] = $query;
		




		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/users/add-user',$data); 
		$this->load->view('admin/footer');


	}


	 /**
	  *  @Description: update user settings
	  *       @Params: userid
	  *
	  *  	 @returns: nothing
	  */
	public function user_update_view($userid)
	{

		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('permission_groups', 'permission_groups.groupID = user.permissiongroup');
		$this->db->where('id', $userid);
		$this->db->limit(1);

		$query = $this->db->get();


		$this->db->select('*');
		$this->db->from('permission_groups');
		$query2 = $this->db->get();
		
		$data['query'] = $query;
		
		$data['query2'] = $query2;

		$data['userid'] = $userid;
		

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/users/update-user',$data); 
		$this->load->view('admin/footer');


	}

	 /**
	  *  @Description: update user details
	  *       @Params: _POST email,password,role
	  *
	  *  	 @returns: returns
	  */
	public function update_user($userid)
	{
		
		$permissiongroup = $this->input->post('roles');


		$this->load->model('Stuff_user');
		$pass = $this->Stuff_user->update_user($permissiongroup);

		if($pass === "*")
		{

			if($this->Stuff_user->is_admin($userid))
			{
				$this->session->set_flashdata('type', '0');
				$this->session->set_flashdata('msg', '<strong>Failed</strong> You may not update admin rights!');
				redirect("admin/users","refresh");
			}
			else
			{
				$object = array(
				'permissiongroup' => $permissiongroup
		 		);

				$this->db->where('id', $userid);
				$this->db->update('user', $object);

				redirect("admin/users","refresh");

			}

			

		}

		

		redirect("admin/users","refresh");

	}


	 /**
	  *  @Description: search the database for users or delete cannot delete admin!
	  *       @Params: _post search_term
	  *
	  *  	 @returns: returns
	  */
	public function search_users_or_delete($value)
	{
		//check if search or delete
		
					
			$this->load->model('Stuff_user');
			$this->Stuff_user->delete_user($value);

			
			
			//return to page view
			redirect("admin/users","refresh");
		
		
	}


	 




	 /**
	  *  @Description: Save user, make sure duplicate username and email is not used!
	  *       @Params: _POST 
	  *
	  *  	 @returns: returns
	  */
	public function save_user()
	{
		
		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			//error
			$this->db->select('*');
			$this->db->from('permission_groups');
			$query = $this->db->get();
			
			$data['query'] = $query;


			$this->load->view('admin/header');
			$this->load->view('admin/body');
			$this->load->view('admin/users/add-user',$data); 
			$this->load->view('admin/footer');
		}
		else
		{
			$name     = $this->input->post('name');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			$roles     = $this->input->post('roles');

			

			//do sanity if ok insert into database!
			$this->load->model('Stuff_user');
			if ($this->Stuff_user->add_user($name,$email,$password,$roles) == "*")
			{
				//success
				$hashed_password = password_hash($password, PASSWORD_BCRYPT);
				

				$object = array(
					'name' => $name, 
					'email' => $email,
					'password' => $hashed_password,
					'permissiongroup' => $roles,
					'joindate'  => date("Y-m-d H:i:s")
					);
				$this->db->insert('user', $object);

				$this->session->set_flashdata('type', '1');
				$this->session->set_flashdata('msg', '<strong>Success</strong> User created!');
				redirect("admin/users","refresh");

			}
			else
			{
				//failure
				$error_message = $this->Stuff_user->add_user($name,$email,$password,$roles);
				$this->session->set_flashdata('type', '0');
				$this->session->set_flashdata('msg', "<strong>Failed</strong> $error_message");
				
				$this->db->select('*');
				$this->db->from('permission_groups');
				$query = $this->db->get();
				
				$data['query'] = $query;


				$this->load->view('admin/header');
				$this->load->view('admin/body');
				$this->load->view('admin/users/add-user',$data); 
				$this->load->view('admin/footer');
			}
			
		}

	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */