<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plugins extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        {
            if($this->session->userdata('isloggedin')=='1')
            {
                $this->load->model('Stuff_permissions');
                $pass = $this->Stuff_permissions->has_permission("plugins");

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
        

        //quick and dirty unzip test
        echo 'bo';


    }

}

/* End of file Plugins.php */
/* Location: ./application/controllers/admin/Plugins.php */