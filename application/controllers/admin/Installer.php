<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Installer extends CI_Controller {

	public function __construct()
	{
	  	
	  parent::__construct();
	  
	  	
	}


	 /**
	  *  @Description: a better/more robust check database has been written
	  *       @Params: 
	  *
	  *  	 @returns: 
	  */

	 public function check_if_written()
	 {
	 	$is_written = false;
	 	

	 	require( APPPATH ."config/database.php");

	 	$check = $db['default']['database'];

	 	$check = strlen($check);

	 	//obviously if strlength count is greater than 0
	 	//something is in there!
	 	if ($check !== 0 )
	 	{
	 		$is_written = true;
	 	}
	 	else{
	 		$is_written = false;
	 	}

	 	return $is_written;
	 }


	//main entry point
	public function index()
	{
		if($this->check_if_written()==true)
		{
			redirect("login", "refresh");
		}
		else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/body-installer');
			$this->load->view('admin/installer/installer');
			$this->load->view('admin/footer');
		}	
	}

	 /**
	  *  @Description: Actually write the vars to the db config file Make sure 
	  *				   this is a private function
	  *       @Params: hostname,username,password,database,prefix
	  *
	  *  	 @returns: string
	  */
	public function _write_db_config($hostname,$username,$password,$database,$prefix)
	{
		$content = file_get_contents(APPPATH ."config/database.php");
		
		$content = str_replace("'hostname' => ''", "'hostname' => '$hostname'", $content);
		$content = str_replace("'username' => ''", "'username' => '$username'", $content);
		$content = str_replace("'password' => ''", "'password' => '$password'", $content);
		$content = str_replace("'database' => ''", "'database' => '$database'", $content);
		$content = str_replace("'dbprefix' => ''", "'dbprefix' => '$prefix'", $content);
		
		return $content;

		//write_file('./application/config/sh.php', $content);

	}



	public function write_file()
	{

		$hostname = $this->input->post('hostname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$database = $this->input->post('database');
		$prefix   = $this->input->post('prefix');

		$this->form_validation->set_rules('database', 'Database', 'trim|required|alpha_dash|max_length[64]');
		$this->form_validation->set_rules('hostname', 'Servername', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('prefix', 'Prefix', 'trim|required|alpha_dash');
		

		if ($this->form_validation->run() == FALSE)
		{
			  $data2['errors'] = 'Failed!';

			  $this->load->view('admin/header');
			  $this->load->view('admin/body-installer');
			  $this->load->view('admin/installer/installer', $data2);
			  $this->load->view('admin/footer');
		}
		else{		

		
		


		$data = $this->_write_db_config($hostname,$username,$password,$database,$prefix);



		$con = mysqli_connect("$hostname","$username","$password","");

		// Check connection
		if (mysqli_connect_errno()) {
		

	  	  $data2['errors'] = 'Database credentials are wrong dude!';

		  $this->load->view('admin/header');
		  $this->load->view('admin/body-installer');
		  $this->load->view('admin/installer/installer', $data2);
		  $this->load->view('admin/footer');
		}
		else
		{
			$sql="CREATE DATABASE $database";
			if (mysqli_query($con,$sql)) 
			{
			    //echo "Database my_db created successfully";
			    if ( ! write_file(APPPATH ."config/database.php", $data))
				{
				     echo 'Unable to write the file do you have permissions!';
				}
				else
				{
					//echo 'File written!';

					$data2['success'] = 'All good dude!';

					$this->load->view('admin/header');
					$this->load->view('admin/body-installer');
					$this->load->view('admin/installer/installer-2',$data2);
					$this->load->view('admin/footer');
					
				}
			} 
			else 
			{
			  //echo "Error creating database: " . mysqli_error($con);
			  $data2['errors'] = 'Database already exists!';

			  $this->load->view('admin/header');
			  $this->load->view('admin/body-installer');
			  $this->load->view('admin/installer/installer', $data2);
			  $this->load->view('admin/footer');


			}

			mysqli_close($con);

			
			
			}
		}

	}

	 /**
	  *  @Description: A more elegant way to create our tables
	  *       @Params: none but needs ignitedcsm.sql file
	  *
	  *  	 @returns: none
	  */
	public function create_tables()
	{
		$file = file_get_contents("ignitedcmspro.sql");

		//explode it into an array
		$file_array = explode(';', $file);

		$prefix = $this->db->dbprefix;

		//execute the exploded text content 
		foreach($file_array as $query) 
		{
			//this allows us to set the table prefix
			$query = str_replace("TABLE `", "TABLE `$prefix", $query);
			$this->db->query($query);
			
		}

		$sql1 = "
		INSERT INTO `".$prefix."menu` (`id`, `html`, `array`) VALUES
		(1, '', '');";

		$sql2 = "
		INSERT INTO `".$prefix."site` (`id`, `site`, `logo`,`color`) VALUES
		(1, '', 'ig2.png','');";
		
		$sql3 = "
		INSERT INTO `".$prefix."email`(`id`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`) VALUES 
		(1,'','','','','');";

		$sql4 = "
		INSERT INTO `".$prefix."permissions` (`permissionID`, `permission`,`order_position`) VALUES
		(3, 'email',6),
		(5, 'permissions',8),
		(6, 'profile',1),
		(9,'users',9),
		(7,'menu',2),
		(10,'database',10),
		(13,'field_builder',13),
		(14,'sections',14),
		(15,'entries',15),
		(17,'asset_lib',17),
		(18,'site_settings',18),
        (19,'plugins',19);";

		$sql5 = "
		INSERT INTO `".$prefix."permission_map`(`groupID`, `permissionID`) VALUES 
		(1,3),
		(1,5),
		(1,6),
		(1,7),
		(1,9),
		(1,10),
		(1,13),
		(1,14),
		(1,15),
		(1,17),
		(1,18),
        (1,19);";

		$sql6 = "
		INSERT INTO `".$prefix."permission_groups`(`groupID`, `groupName`) VALUES 
		(1,'Administrators');";


		$this->db->query($sql1);
		$this->db->query($sql2);
		$this->db->query($sql3);
		$this->db->query($sql4);
		$this->db->query($sql5);
		$this->db->query($sql6);

		$this->load->view('admin/header');
		$this->load->view('admin/body-installer');
		$this->load->view('admin/installer/installer-3');
		$this->load->view('admin/footer');
		
	}


	 

	 /**
	  *  @Description: set time local
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */

	 public function set_time_local()
	 {
	 	$this->load->view('admin/header');
		$this->load->view('admin/body-installer');
		$this->load->view('admin/installer/installer-4');
		$this->load->view('admin/footer');
	 }


	  /**
	   *  @Description: save time local setting to config file and set
	   *			    random encryption key
	   *       @Params: _POST time local
	   *
	   *  	 @returns: returns
	   */
	  public function save_time_local()
	  {

			//write over the routes file
	  		$route_content = file_get_contents(APPPATH ."config/routes.php");

	  	    $string = 
"require_once( BASEPATH .'database/DB'. '.php' );
\$db =& DB();

\$db->select('*');
\$db->from('routes');
\$query = \$db->get();

if(\$query->num_rows() > 0)
{
	//if db entries then loop through and generate routes
	foreach (\$query->result() as \$row) 
	{
		\$route[\$row->route] = \$row->controller;
	}
}";
			$route_content = $route_content . "\n" . $string;
			write_file(APPPATH ."config/routes.php",$route_content);


			//To do: write over config file

			//create and set a random encryption key
			$this->load->library('encryption');
			$key = bin2hex($this->encryption->create_key(16));

			$content = file_get_contents(APPPATH ."config/config.php");

			$content = str_replace("\$config['encryption_key'] = ''", "\$config['encryption_key'] = '$key'", $content);

			if ( ! write_file(APPPATH ."config/config.php", $content))
			{
			 	echo 'Unable to write the file do you have permissions!';
			}
			else
			{
			//file written
			}

			redirect('admin/installer/login', 'refresh');

	  }




	 /**
	  *  @Description: general login function
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function login()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/body-installer');
		$this->load->view('admin/login/login');
		$this->load->view('admin/footer');
	}

}

/* End of file installer.php */
/* Location: ./application/controllers/installer.php */