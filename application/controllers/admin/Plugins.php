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



        $this->load->model('stuff_plugins');
        $query = $this->stuff_plugins->get_all();
        
        $data['query'] = $query;


        $this->load->view('admin/header');
        $this->load->view('admin/body');
        $this->load->view('admin/plugins/default',$data); 
        $this->load->view('admin/footer');
    }


   


    //comment delete the entry, remove permission and permission group remove plugin asset
    public function delete_plug($id)
    {

        $this->load->model('stuff_plugins');
        $this->stuff_plugins->delete_plug($id);

        $this->session->set_flashdata('type', '1');
        $this->session->set_flashdata('msg', '<strong>Entry removed</strong> ');

        redirect("admin/plugins","refresh");


    }


    /**
      *  @Description: upload the image insert into db
      *       @Params: _POST filename
      *
      *      @returns: returns
      */
    public function do_upload()
    {
        $config['upload_path'] = './assets/plugins/';

            
        $config['allowed_types'] = 'zip';
        //$config['encrypt_name'] = TRUE;
        

        $this->load->library('upload', $config);
        /**
             * @Description: unsuccessful
             * @params     : params
             * @returns    : return
             */
        if ( ! $this->upload->do_upload())
        {
            $errors =  $this->upload->display_errors();
            $this->session->set_flashdata('type', '0');
            $this->session->set_flashdata('msg', " <strong>Failed</strong>$errors");
            
            redirect('admin/plugins','refresh');
        }
        //successful
        else
        {
            
            
                //successful

                $mytry = $this->upload->data();
                $filename = $mytry['raw_name'].$mytry['file_ext'];
                $name = $mytry['raw_name'];

                $this->load->model('stuff_plugins');


                $install = date("Y-m-d H:i:s");
                $this->stuff_plugins->add_plug($name,$install,'1');

                


                $this->unzip_and_import($filename);

                //without the .zip extentsion
                $this->install_plugin($mytry['raw_name']);
                
    
                $this->session->set_flashdata('type', '1');
                $this->session->set_flashdata('msg', '<strong>Success</strong> Plugin installed!');
                redirect('admin/plugins','refresh');

            
        }

    }

   


     /**
      *  @Description: unzip file, import sql move files into relevant folders, and new permission and map
      *       @Params: params
      *
      *       @returns: returns
      */
    public function unzip_and_import($filename)
    {

        //quick and dirty unzip test
        $zip = new ZipArchive;
        $res = $zip->open("assets/plugins/$filename");
        if ($res === TRUE) 
        {
            $zip->extractTo('./assets/plugins');
            $zip->close();
            
        } 
        else 
        {
            echo 'Extraction Failed.';
        }
    }



     /**
      *  @Description: install the plugin
      *       @Params: filename
      *
      *       @returns: returns
      */
     public function install_plugin($filename)
     {

        //first let's import the sql!

        $this->load->database();
        $prefix =  $this->db->dbprefix;

        $file = file_get_contents("assets/plugins/$filename/test.sql");

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

        //now let's add the permission map
        $object = array('permission' => $filename );
        $this->db->insert('permissions', $object);

        $tmpid = $this->db->insert_id();

        $object2 = array('groupID' => "1", 'permissionID' => $tmpid );
        $this->db->insert('permission_map', $object2);


        //now lets move the controllers and models and views into the right folders!
        $this->create_files($filename);

     }



     //move the files into the right directories
     public function create_files($filename)
     {

        //first create a directory with the name of the table
        

        //view file directories todo move to admin folder only!
        mkdir(APPPATH ."/views/admin/$filename");
        

        //model directory
        mkdir(APPPATH ."/models/$filename");


        //write the controller
        $stmp = ucfirst($filename);
        $stmp = $stmp . ".php";
        $string3 = read_file("assets/plugins/$filename/controllers/admin/$filename.php");

        if ( ! write_file(APPPATH. "/controllers/admin/$stmp", $string3))
        {
            echo 'Unable to write the file, check you have right permissions';
        }
        else
        {
            //echo 'File written!';
        }


        $tmp = ucfirst($filename);
        $tmp = $tmp . "_model.php";
        //write the model
        $string2 = read_file("assets/plugins/$filename/models/$filename/$tmp");

        if ( ! write_file(APPPATH. "/models/$filename/$tmp", $string2))
        {
            echo 'Unable to write the file, check you have right permissions';
        }
        else
        {
            //echo 'File written!';
        }


        //finally do the views!//////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////








         //////////////////////////////////////////index file


        $input = "assets/plugins/$filename/views/$filename";
        $output = APPPATH ."/views/admin";


        $string = read_file("$input/index.php");
        
        

        if ( ! write_file("$output/$filename/index.php", $string))
        {
            echo 'Unable to write the file, check you have right permissions';
        }
        else
        {
            //echo 'File written!';
        }

      
        $string = read_file("$input/new.php");
        


        if ( ! write_file("$output/$filename/new.php", $string))
        {
            echo 'Unable to write the file, check you have right permissions';
        }
        else
        {
            //echo 'File written!';
        }
        

        //////////////////////////////////////////////////////////edit file
        $string = read_file("$input/edit.php");
        


        if ( ! write_file("$output/$filename/edit.php", $string))
        {
            echo 'Unable to write the file, check you have right permissions';
        }
        else
        {
            //echo 'File written!';
        }




        ////////////////////////////////////////////////////////////////////////breadcrumb all
        $string = read_file("$input/breadcrumb-all.php");
        
        

        if ( ! write_file("$output/$filename/breadcrumb-all.php", $string))
        {
            echo 'Unable to write the file, check you have right permissions';
        }
        else
        {
            //echo 'File written!';
        }

        ////////////////////////////////////////////////////////////////////////breadcrumb edit
        $string = read_file("$input/breadcrumb-edit.php");
        
       

        if ( ! write_file("$output/$filename/breadcrumb-edit.php", $string))
        {
            echo 'Unable to write the file, check you have right permissions';
        }
        else
        {
            //echo 'File written!';
        }

        ////////////////////////////////////////////////////////////////////////breadcrumb new
        $string = read_file("$input/breadcrumb-new.php");
        
       

        if ( ! write_file("$output/$filename/breadcrumb-new.php", $string))
        {
            echo 'Unable to write the file, check you have right permissions';
        }
        else
        {
            //echo 'File written!';
        }




     }

}

/* End of file Plugins.php */
/* Location: ./application/controllers/admin/Plugins.php */