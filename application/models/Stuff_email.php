<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stuff_email extends CI_Model {

 /**
   * @Description: email function
   * @params     : to,subject,body
   * @returns    : success msg
   */
  public function my_email($to,$from,$subject,$body)
  {
      //needed to suppress errors
      ini_set('date.timezone', 'Europe/London');


      //collect email info from database
      $this->db->select('*');
      $this->db->from('email');
      $this->db->where('id', '1');
      $this->db->limit(1);

      $query = $this->db->get();
      

      $protocol = "";
      $smtp_host = "";
      $smtp_port = "";
      $smtp_user = "";
      $smtp_pass = "";

      foreach ($query->result() as $row) 
      {
    		$protocol  = $row->protocol; 
    		$smtp_host = $row->smtp_host;
    		$smtp_port = $row->smtp_port;
    		$smtp_user = $row->smtp_user;
    		$smtp_pass = $row->smtp_pass;
      }

      //Don't forget to decrypt password
      $this->load->library('encryption');
      $smtp_pass2 = $this->encryption->decrypt($smtp_pass);

      //echo $smtp_pass2;

      if($protocol === "phpmail")
      {
          $config['protocol']  = 'mail';
          

          $this->load->library('email');
          $this->email->initialize($config);
          $this->email->set_mailtype("html");

          $this->email->set_newline("\r\n");

          $this->email->from($from, 'Name');
          $this->email->to($to);   
          $this->email->subject($subject);   
          $this->email->message($body);

          // $path = $this->config->item('server_root');
          // $file = 'license.txt';

          // $this->email->attach($file);

          if($this->email->send())
          {
            //echo('Activation code has been successfully sent to your Email Address');
          }

          else
          {
            show_error($this->email->print_debugger());
          }    
      }
      else
      {

          //smtp
         /* E.g Settings
          'smtp';
          'ssl://smtp.googlemail.com';
           465;
          'email.com';
          'password';
          */
          $config['protocol']  = $protocol; 
          $config['smtp_host'] = $smtp_host;
          $config['smtp_port'] = $smtp_port;
          $config['smtp_user'] = $smtp_user;
          $config['smtp_pass'] = $smtp_pass2;



          $this->load->library('email');
          $this->email->initialize($config);
          $this->email->set_mailtype("html");

          $this->email->set_newline("\r\n");

          $this->email->from($from, 'Name');
          $this->email->to($to);   
          $this->email->subject($subject);   
          $this->email->message($body);

          // $path = $this->config->item('server_root');
          // $file = 'license.txt';

          // $this->email->attach($file);

          if($this->email->send())
          {
            //echo('Activation code has been successfully sent to your Email Address');
          }

          else
          {
            show_error($this->email->print_debugger());
          }    


      }

      
  }

	

}

/* End of file stuff_email.php */
/* Location: ./application/models/stuff_email.php */