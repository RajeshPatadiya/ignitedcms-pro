<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
      
      public function __construct()
      {
          parent::__construct();
          {
            //this is where the magic happens

            //inlcude a better hashing library
            include('./resources/password/password.php');
          }
      }


      public function index()
      {

      }

       /**
        *  @Description: load the view for reset password
        *       @Params: username or email address
        *
        *     @returns: nothing
        */  
      public function forgot_password_view()
      {
        $this->load->view('admin/header');
        $this->load->view('admin/body-installer');
        $this->load->view('admin/login/forgot');
        $this->load->view('admin/footer');
      }


       /**
        *  @Description: accepts _GET var
        *       @Params: params
        *
        *     @returns: returns
        */
      public function reset_view($md5)
      {
         //check if md5 hash is valid
         $this->db->select('*');
         $this->db->from('user');
         $this->db->where('activ_key', $md5);

         $query = $this->db->get();

         $data['key'] = $md5;
         
         if($query->num_rows() > 0)
         {
            $this->load->view('admin/header');
            $this->load->view('admin/body-installer');
            $this->load->view('admin/login/reset', $data);
            $this->load->view('admin/footer');

         }
         else
         {
            echo 'invalid key!';
         }
      }


       /**
        *  @Description: send an email link to reset password
        *       @Params: _POST username
        *
        *     @returns: nothing
        */
      public function reset_password()
      {
         $username = $this->input->post('name');
         //get the email address
         $this->load->model('Stuff_user');
         $err = $this->Stuff_user->send_reset($username);

         //echo $err;
         if($err === "sent")
         {
            $this->session->set_flashdata('type', '1');
            $this->session->set_flashdata('msg', "<strong>Success</strong> Check your email!");
         }
         else
         {
           $this->session->set_flashdata('type', '0');
           $this->session->set_flashdata('msg', "<strong>Error</strong> $err");

         }
         

         redirect("admin/login/forgot_password_view","refresh");

      }

       /**
        *  @Description: update the password
        *       @Params: _POST password, $md5
        *
        *     @returns: returns
        */
      public function update_password($md5)
      {
          $password = $this->input->post('password');

          $this->load->model('Stuff_user');

          if($this->Stuff_user->check_password($password) === true)
          {
             $this->Stuff_user->update_password($password,$md5);

             $this->session->set_flashdata('type', '1');
             $this->session->set_flashdata('msg', '<strong>Success</strong> Password updated!');
          }
          else
          {
            $this->session->set_flashdata('type', '0');
            $this->session->set_flashdata('msg', '<strong>Error</strong> <br/>Password does not meet minimum requirements!');
          }

          redirect("admin/login/reset_view/$md5","refresh");

      }

      
      
      public function validate_login()
      {
            

            $data['errors'] = '';

            //------------------------------
            //  POST vars
            //------------------------------

            $name = $this->input->post('name');
            $password = $this->input->post('password');

            $this->db->where('name', $name);

            $query = $this->db->get('user');

            //check if user exists
            if($query->num_rows() == 1)
            {
              $query = $this->db->get_where('user', array('name' => $name));

              $hashed_password = "";
              $userid = "";
              foreach ($query->result() as $row)
              {

                  $hashed_password = $row->password;
                  $userid = $row->id;
              }

              if (password_verify($password, $hashed_password))
              {
                      //set the user's permissions
                      $this->load->model('Stuff_permissions');
                      $perms = $this->Stuff_permissions->get_permissions($userid);

                      $array = array(
                        'name' => $name,
                        'userid' => $userid,
                        'isloggedin' => '1',
                        'permissions' => $perms

                      );

                      //update the login count
                      $this->db->set('logins','logins+1', false);
                      $this->db->where('name', $name);
                      $this->db->update('user');
                      
                      $this->session->set_userdata( $array );
                      //login successful
                      redirect('admin/dashboard','refresh');
              }
              else
              {
                  $data['errors'] =   'Password is incorrect, check your caps lock is not on!';
                  $this->load->view('admin/header');
                  $this->load->view('admin/body-installer');
                  $this->load->view('admin/login/login', $data);
                  $this->load->view('admin/footer');
              }
            }
            else
            {
                $data['errors'] = 'User Does not exist';
                $this->load->view('admin/header');
                $this->load->view('admin/body-installer');
                $this->load->view('admin/login/login', $data);
                $this->load->view('admin/footer');
            
            }
 
      }


       /**
        *  @Description: make sure password is secure
        *                One number and at least 6 characters long
        *       @Params: string password
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
        *  @Description: Installer validate details
        *       @Params: _POST site name, email, password
        *
        *     @returns: returns
        */
      public function validate_details()
      {
            //$url = site_url();
            //-------------------------------
            //  POST vars
            //-------------------------------
            $site = $this->input->post('site');
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            $email = $this->input->post('email');


            $this->form_validation->set_rules('site', 'Site', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password1', 'First Password', 'trim|required');
            $this->form_validation->set_rules('password2', 'Second Password', 'trim|required|matches[password1]');

            if ($this->form_validation->run() == FALSE)
            {
              //failed
                $this->load->view('admin/header');
                $this->load->view('admin/body-installer');
                $this->load->view('admin/installer/installer-3');
                $this->load->view('admin/footer');
            }
            else
            {
                 //check if password is secure
                  if($this->check_password($password1)==false)
                  {
                    $data['errors'] =
                        'Password is too simple <br/> 
                         Password must contain a number and Uppercase letter!<br/>
                         Password must be at least 6 characters long';

                         $this->load->view('admin/header');
                         $this->load->view('admin/body-installer');
                         $this->load->view('admin/installer/installer-3', $data);
                         $this->load->view('admin/footer');

                  }
                  else
                  {

                      $hashed_password = password_hash($password1, PASSWORD_BCRYPT);
                       

                      $data = array(
                         'name' => 'admin' ,
                         'password' => $hashed_password ,
                         'isadmin' => '1',
                         'email'   => $email,
                         'permissiongroup' => '1',
                         'joindate'  => date("Y-m-d H:i:s")
                      );

                      //insert into the db
                      $this->db->insert('user', $data);

                      //update site title

                      $object = array('site' => $site );
                      $this->db->where('id', '1');
                      $this->db->update('site', $object);


                      redirect('admin/installer/set_time_local','refresh'); 
                  }
              }
  
      }


       /**
        *  @Description: destroy session and logout
        *       @Params: params
        *
        *     @returns: returns
        */
      public function logout()
      {
        $this->session->sess_destroy();

        redirect("login", "refresh");
  
      }

     

     

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */ ?>