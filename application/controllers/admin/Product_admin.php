<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_admin extends CI_Controller {

	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		$this->load->model('Stuff_permissions');
					$pass = $this->Stuff_permissions->has_permission("product_admin");

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
		$data['title'] = 'Products';
		
		$this->db->select('*');
		$this->db->from('products');
		
		$query = $this->db->get();
		
		

		$data['query'] = $query;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/product_admin/dashboard',$data); 
		$this->load->view('admin/footer');
	}

	 /**
	  *  @Description: delete product
	  *       @Params: productid
	  *
	  *  	 @returns: nothing
	  */
	public function delete_product($productid)
	{
		$this->db->where('id', $productid);
		$this->db->delete('products');

		redirect('admin/product_admin','refresh');
	}


	public function insert_product()
	{
		$data['title'] = 'Products';
		
		$this->db->select('*');
		$this->db->from('products');
		
		$query = $this->db->get();
		
		$data['query'] = $query;

		//get the product categories
		//and dump to view

		$this->db->select('*');
		$this->db->from('cats');
		$query2 = $this->db->get();
		
		$data['query2'] = $query2;


		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/product_admin/add_product',$data); 
		$this->load->view('admin/product_admin/footer-add-product');
	}

	public function edit_product($productid)
	{
		$data['title'] = 'Products';
		
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id', $productid);
		
		$this->db->limit(1);
		$query = $this->db->get();
		
		//get the product categories
		//and dump to view
		

		$this->db->select('*');
		$this->db->from('cats');
		$query2 = $this->db->get();
		
		$data['query2'] = $query2;

		$data['query'] = $query;
		$data['id']    = $productid;


		$this->load->model('Stuff_cats');
		$sd = $this->Stuff_cats->get_cat_for_product($productid);

		$data['sd'] = $sd;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/product_admin/edit-product',$data); 
		$this->load->view('admin/product_admin/footer-edit-product',$data);

	}

	 /**
	  *  @Description: view file for product image upload
	  *       @Params: none
	  *
	  *  	 @returns: returns
	  */
	public function img_view($productid)
	{
		
		$data['id'] = $productid;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/product_admin/image',$data); 
		$this->load->view('admin/footer');


	}


	public function upload_img($productid)
	{
		$config['upload_path'] = './img/uploads/'; 
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        // $config['max_size'] = '1048';
        // $config['max_width'] = '120';
        // $config['max_height'] = '120';

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
			
			redirect('admin/product_admin','refresh');

        }
        //successful
        else
        {
        	$mytry = $this->upload->data();
            $filename = $mytry['raw_name'].$mytry['file_ext'];


		 	$img = $filename;

			$data2 = array(
               'img' => $img          
            );

	        $this->db->where('id', $productid);
	      	$this->db->update('products', $data2);


			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> Product image has been added');

			redirect('admin/product_admin','refresh');
		}

	}

	 /**
	  *  @Description: view file for product pdf upload
	  *       @Params: none
	  *
	  *  	 @returns: returns
	  */
	public function spec_view($productid)
	{
		
		$data['id'] = $productid;

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('admin/product_admin/spec',$data); 
		$this->load->view('admin/footer');


	}

	public function upload_spec($productid)
	{
		$config['upload_path'] = './img/uploads/';

            
        $config['allowed_types'] = 'pdf|PDF';
        $config['encrypt_name'] = TRUE;
        // $config['max_size'] = '1048';
        // $config['max_width'] = '120';
        // $config['max_height'] = '120';

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
			
			redirect('admin/product_admin','refresh');

        }
        //successful
        else
        {
        	$mytry = $this->upload->data();
            $filename = $mytry['raw_name'].$mytry['file_ext'];


			 	$spec = $filename;

				$data2 = array(
	               
	               'spec' => $spec
	                
	            );

	        $this->db->where('id', $productid);
	      	$this->db->update('products', $data2);

			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> Product spec has been added');

			redirect('admin/product_admin','refresh');
		}


	}

	public function actual_edit_product($productid)
	{

		//delete all cat_links with this productid
		$this->db->where('prod_id', $productid);
		$this->db->delete('cat_links');


		//loop through all the _POST values and save to database
		//first check if it starts with cat-


		$formValues = $this->input->post(NULL, TRUE);

		foreach($formValues as $key => $value) 
		{
		    if(substr($key, 0,4)==="cat-")
		    {
		    	//split
		    	$chunks = explode("-", $key);

		    	//insert into database
		    	$object = array('prod_id' => $productid , 'cat_id' => $chunks[1] );
		    	$this->db->insert('cat_links', $object);
		    }
		}


		$content2 = $this->input->post('dummy');
	 	$name = $this->input->post('name');
	 	$description = $content2;
	 	$h    = $this->input->post('h');
	 	$w    = $this->input->post('w');
	 	$d    = $this->input->post('d');
	 	$demo = $this->input->post('demo');
 	
		$object = array(
           'name'        => $name,
           'description' => $description,
           'h'           => $h,
           'w'           => $w,
           'd'           => $d,
           'demo'        => $demo
           
            
        );

		$this->db->where('id', $productid);
		$this->db->update('products', $object);

		redirect('admin/product_admin','refresh');

	}



	public function actual_insert_product()
	{

		$content2 = $this->input->post('dummy');
	 	$name = $this->input->post('name');
	 	$description = $content2;
	 	$h    = $this->input->post('h');
	 	$w    = $this->input->post('w');
	 	$d    = $this->input->post('d');
	 	$demo = $this->input->post('demo');
 	
		$object = array(
           'name' => $name,
           'description' => $description,
           'h'    => $h,
           'w'=> $w,
           'd'=> $d,
           'demo'=> $demo
        );
	      	$this->db->insert('products', $object);


			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> Product has been added');
			
			redirect('admin/product_admin','refresh');
	    
	}

}

/* End of file product_admin.php */
/* Location: ./application/controllers/product_admin.php */