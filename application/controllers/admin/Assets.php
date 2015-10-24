<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		{
			if($this->session->userdata('isloggedin')=='1')
			{
				$this->load->model('Stuff_permissions');
				$pass = $this->Stuff_permissions->has_permission("assets");

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
	  *  @Description: the default view for asset management
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function index()
	{
		
		$this->db->select('*');
		$this->db->from('assets');
		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/assets/default',$data);
		$this->load->view('admin/footer');

	}

	 /**
	  *  @Description: upload the image insert into db
	  *       @Params: _POST filename
	  *
	  *  	 @returns: returns
	  */
	public function do_upload()
	{
		$config['upload_path'] = './img/uploads/';

            
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        

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
			$this->session->set_flashdata('msg', "<strong>Failed</strong> $errors");
			
			redirect('admin/assets','refresh');

        }
        //successful
        else
        {
        	$mytry = $this->upload->data();
            $filename = $mytry['raw_name'].$mytry['file_ext'];

            //create a thumbnail
            $config['image_library'] = 'gd2';
			$config['source_image']	= "./img/uploads/$filename";
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 200;
			$config['height']	= 200;

			$this->load->library('image_lib', $config); 

			$this->image_lib->resize();


			//insert this bad boy into the database
			$thumb = $mytry['raw_name'] . '_thumb' . $mytry['file_ext'];
			$fullsize = $mytry['raw_name'] .  $mytry['file_ext'];

			$object = array(
				'name' => $thumb,
				'fullsize' =>$fullsize
				);
			$this->db->insert('assets', $object);


			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> Image uploaded');
			
			redirect('admin/assets','refresh');
		}

	}

	public function search_assets_or_delete()
	{
		//check if search or delete
		if($this->input->post('sbm') == "search") 
		{

			$search_term = $this->input->post('search_term');

			$this->db->select('*');
			$this->db->from('assets');
			$this->db->like('name', $search_term);

			$query = $this->db->get();
			

			$data['query'] = $query;
			


			$this->load->view('admin/header');
			$this->load->view('admin/body');
			$this->load->view('admin/assets/default',$data);
			$this->load->view('admin/footer');
		}

		if($this->input->post('sbm') == "delete") 
		{
			//iterate over selected items and delete
			if (isset($_POST['chosen']))
			{
				$arrayName = $_POST['chosen'];

				foreach ($arrayName as $key => $value) {
					//echo $value;

					//delete the pages in the db
					$this->db->where('id', $value);
					$this->db->delete('assets');

				}
				
			}
			
			//return to page view
			redirect("admin/assets","refresh");
		
		}
	}


	 /**
	  *  @Description: Special uploader for page builder
	  *       @Params: pageid
	  *
	  *  	 @returns: returns
	  */

	 public function do_upload_builder($id)
	 {
	 	$config['upload_path'] = './img/uploads/';

            
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        

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
			$this->session->set_flashdata('msg', "<strong>Failed</strong> $errors");
			
			redirect("admin/pages/detail_view/$id",'refresh');

        }
        //successful
        else
        {
        	$mytry = $this->upload->data();
            $filename = $mytry['raw_name'].$mytry['file_ext'];

            //create a thumbnail
            $config['image_library'] = 'gd2';
			$config['source_image']	= "./img/uploads/$filename";
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 200;
			$config['height']	= 200;

			$this->load->library('image_lib', $config); 

			$this->image_lib->resize();


			//insert this bad boy into the database
			$thumb = $mytry['raw_name'] . '_thumb' . $mytry['file_ext'];
			$fullsize = $mytry['raw_name'] .  $mytry['file_ext'];

			$object = array(
				'name' => $thumb,
				'fullsize' =>$fullsize
				);
			$this->db->insert('assets', $object);


			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> Image uploaded, click on the Add Image button again to use!');
			
			redirect("admin/pages/detail_view/$id",'refresh');
		}




	 }


}

/* End of file assets.php */
/* Location: ./application/controllers/assets.php */