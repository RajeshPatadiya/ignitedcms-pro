<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		{
			if($this->session->userdata('isloggedin')=='1')
			{
				$this->load->model('Stuff_permissions');
				$pass = $this->Stuff_permissions->has_permission("site_settings");

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

	 /**
	  *  @Description: save site settings like logo and site name
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function index()
	{
		$this->db->select('*');
		$this->db->from('site');
		$this->db->where('id', '1');
		$this->db->limit(1);

		$site = "";
		$query = $this->db->get();
		
		$data['query'] = $query;



		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/sitesettings/main',$data);
		$this->load->view('admin/footer');
	}

	
	

	 /**
	  *  @Description: save site settings to database
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function save_site_settings()
	{
		$config['upload_path'] = './img/uploads/';

            
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        // $config['max_size'] = '1048';
        //$config['max_width'] = '200';
        // $config['max_height'] = '120';

        $this->load->library('upload', $config);
        /**
             * @Description: unsuccessful
             * @params     : params
             * @returns    : return
             */
        if ( ! $this->upload->do_upload())
        {
        	$err = $this->upload->display_errors();
			
			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', "<strong>Success</strong> $err");

			$site = $this->input->post('site');
            $color = $this->input->post('color');
            $font = $this->input->post('font');
            $footer1 = $this->input->post('footer1');
            $footer2 = $this->input->post('footer2');
            $footer3 = $this->input->post('footer3');
            $footercolor = $this->input->post('footercolor');
            $footerfontcolor = $this->input->post('footerfontcolor');


           

            $object = array(
            	'site' => $site,  
            	'color' => $color,
            	'font'  => $font,
            	'footer1' => $footer1,
            	'footer2' => $footer2,
            	'footer3' => $footer3,
            	'footercolor' => $footercolor,
            	'footerfontcolor' => $footerfontcolor  
            	);


            $this->db->where('id', '1');
            $this->db->update('site', $object);
			
			redirect('admin/site_settings','refresh');

        }
        //successful
        else
        {
        	$mytry = $this->upload->data();
            $filename = $mytry['raw_name'].$mytry['file_ext'];

            $logo = $filename;
            $site = $this->input->post('site');
            $color = $this->input->post('color');
            $font = $this->input->post('font');
            $footer1 = $this->input->post('footer1');
            $footer2 = $this->input->post('footer2');
            $footer3 = $this->input->post('footer3');
            $footercolor = $this->input->post('footercolor');
            $footerfontcolor = $this->input->post('footerfontcolor');

            

            $object = array(
            	'site' => $site, 
            	'logo' => $logo, 
            	'color' => $color,
            	'font'  => $font,
            	'footer1' => $footer1,
            	'footer2' => $footer2,
            	'footer3' => $footer3,
            	'footercolor' => $footercolor,
            	'footerfontcolor' => $footerfontcolor      
            	);


            $this->db->where('id', '1');
            $this->db->update('site', $object);
            

			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> Saved!');
			
			redirect('admin/site_settings','refresh');
			
			
        }

	}

}

/* End of file site_settings.php */
/* Location: ./application/controllers/site_settings.php */