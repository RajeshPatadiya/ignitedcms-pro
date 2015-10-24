<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Encryption_test extends CI_Controller {

	public function index()
	{
		$this->load->library('encryption');

		$key = bin2hex($this->encryption->create_key(16));

		echo $key;
		echo br();


		$plain_text = 'letmein123';
		$ciphertext = $this->encryption->encrypt($plain_text);

		echo $ciphertext;
		echo br();

		// Outputs: This is a plain-text message!
		echo $this->encryption->decrypt($ciphertext);		
	}

}

/* End of file Encryption_test.php */
/* Location: ./application/controllers/Encryption_test.php */