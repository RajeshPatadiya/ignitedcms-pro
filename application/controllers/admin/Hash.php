<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hash extends CI_Controller {

	public function __construct()
	{
		  parent::__construct();
		  {
			//inlcude a better hashing library
            include('./resources/password/password.php');
		  }
	}

	public function index()
	{
		$hash = password_hash("passwordcheck", PASSWORD_BCRYPT);
		echo $hash;

		if (password_verify("passwordcheck", $hash)) 
		{
          echo "ok";
	    } 
	    else 
	    {
	        echo 'wrong';
	    }
	}

}

/* End of file hash.php */
/* Location: ./application/controllers/hash.php */