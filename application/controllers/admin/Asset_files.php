<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: the base class for uploading from sections/entries
  *       @Params: none
  *
  *  	 @returns: none
  */


class Asset_files extends CI_Controller {

	//default constructor check if has access


	public function index()
	{
		
		
	}


	//add from lib test
	//need to check validation matches otherwise flag issue


	 /**
	  *  @Description: add images from lib
	  *       @Params: entryid,sectionid,fieldname, _post (asset id)
	  *
	  *  	 @returns: returns
	  */
	public function add_from_lib()
	{

		//loop through post values

		$fieldname2 = trim($this->input->post('fieldname2'));
		$entryid2   =  trim($this->input->post('entryid2'));
		$sectionid2 = trim($this->input->post('sectionid2'));



		$count = 0;
		$assetid = "";
		foreach($_POST as $key => $value) 
	    {
	    	//set the key
	    	if($key == 'chosen')
	    	{
	    		
	    		foreach ($value as $val) 
	    		{
	    			$assetid = $val;
	    			$count++;

	    			//echo $assetid;
	    		}

	    		
	    	}
	    	
	    }

	    //they cannot attach more than one image
	    if ($count > 1) 
	    {
	    	$this->session->set_flashdata('type', '0');
	    	$this->session->set_flashdata('msg', '<strong>Failed</strong> You cannot add more than one asset!');

	    	redirect("admin/entries/render_section/$sectionid2/$entryid2", "refresh");
	    }
	    else
	    {
	    	//do the validation logic here
	    	//echo 'pass';

	    	//retrieve the allowed file types
			$this->db->select('formvalidation');
			$this->db->from('fields');
			$this->db->where('name', $fieldname2);
			$this->db->limit(1);

			

			$query = $this->db->get();
			$formvalidation = "";
			foreach ($query->result() as $row) 
			{
				$formvalidation =  $row->formvalidation;
			}


	       $allowed_types = $formvalidation;

	       //check if this file is in the allowed type array
	       if($this->check_file_type($allowed_types,$assetid))
	       {
		       	$object = array($fieldname2 => $assetid );

				$this->db->where('entryid', $entryid2);
				
				$this->db->update('content', $object);

				redirect("admin/entries/render_section/$sectionid2/$entryid2", "refresh");

	       }
	       else
	       {
	       	    //failed
	       	  	$this->session->set_flashdata('type', '0');
	    		$this->session->set_flashdata('msg', '<strong>Failed</strong> File type not allowed!');

	    		redirect("admin/entries/render_section/$sectionid2/$entryid2", "refresh");

	       }

	    }
	}



	 /**
	  *  @Description: check if validate array asset id is allowed file type
	  *       @Params: [jpg|png], asset id
	  *
	  *  	 @returns: true or false
	  */
	public function check_file_type($allowed_types,$assetid)
	{

		//first get the assetid extension
		$this->db->select('kind');
		$this->db->from('assetfields');
		$this->db->where('id', $assetid);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$kind = "";
		foreach ($query->result() as $row) 
		{
			$kind =  $row->kind;
		}

		//get rid of the fullstop at the beginning
		$kind = trim($kind,'.');

		
		
		//explode allowed type array
		$arr = explode("|", $allowed_types);


		$pass = 0;

		$count = 0;
		foreach ($arr as $key)
		{
			
			if($key == $kind)
			{
 				
 				$count++;
			}
		}


		if($count > 0)
		{
			$pass = 1;
		}

		return $pass;

	}






	 /**
	  *  @Description: upload the asset insert into db
	  *       @Params: _POST filename, _POST entryid, _POST fieldname, _POST sectionid
	  *
	  *  	 @returns: returns
	  */
	public function do_upload()
	{
		
		


		
		$fieldname = trim($this->input->post('fieldname'));
		$entryid   =  trim($this->input->post('entryid'));
		$sectionid = trim($this->input->post('sectionid'));


		//check if maximum files uploaded has not been exceeded!
		$this->load->model('Stuff_entries');
		if($this->Stuff_entries->asset_upload_exceeded($entryid,$fieldname))
		{
			$this->session->set_flashdata('type', '0');
			$this->session->set_flashdata('msg', '<strong>Error</strong> Limit exceeded!');
			redirect("admin/entries/render_section/$sectionid/$entryid", "refresh");
		}
		else
		{
			//limit not exceeded


			//retrieve the allowed file types
			$this->db->select('formvalidation');
			$this->db->from('fields');
			$this->db->where('name', $fieldname);
			$this->db->limit(1);

			

			$query = $this->db->get();
			$formvalidation = "";
			foreach ($query->result() as $row) 
			{
				$formvalidation =  $row->formvalidation;
			}
			

			$config['upload_path'] = './assets/uploads/';

	          

	        $config['allowed_types'] = $formvalidation;
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
				$this->session->set_flashdata('msg', "<strong>Failed</strong> $errors");
				
				

				redirect("admin/entries/render_section/$sectionid/$entryid", "refresh");

				

	        }
	        //successful
	        else
	        {

	        	$mytry = $this->upload->data();
	            $filename = $mytry['raw_name'].$mytry['file_ext'];

	            //careful only apply thumbnails to image types todo!!

	            if($mytry['is_image'])
	            {


		            //create a thumbnail
		   			$config['image_library'] = 'gd2';
					$config['source_image']	= "./assets/uploads/$filename";
					$config['create_thumb'] = TRUE;
					
					$config['maintain_ratio'] = FALSE;
					
					$config['width']	= 50;
					$config['height']	= 50;
					


					$this->image_lib->initialize($config);

					$this->image_lib->resize();
					

					
					$thumb = $mytry['raw_name'] . '_thumb' . $mytry['file_ext'];

					$this->image_lib->clear();


					//make square image
					// $config2['image_library'] = 'gd2';
					// $config2['source_image']	= "./assets/uploads/$thumb";
					// $config2['create_thumb'] = FALSE;
					// $config2['maintain_ratio'] = FALSE;
					// $config2['x_axis']  =5;
					// $config2['y_axis']  =5;
					// $config2['quality'] =100;
					// $config2['width']	= 40;
					// $config2['height']	= 40;


					// $this->image_lib->initialize($config2); 
					// //now crop
					// $this->image_lib->crop();

					$fullsize = $mytry['raw_name'] .  $mytry['file_ext'];

					$url = base_url('assets/uploads') . "/" . $mytry['file_name'];
					$thumb = base_url('assets/uploads') . "/" . $thumb;

					$arrayName = array(
						'entryid'     =>  $entryid, 
						'filename'    =>   $mytry['file_name'] ,
						'kind'        =>   $mytry['file_ext'] ,
						'width'       =>   $mytry['image_width'] ,
						'height'      =>   $mytry['image_height'] ,
						'size'        =>   $mytry['file_size'] ,
						'datecreated' =>   date("Y-m-d H:i:s") ,
						'fieldname'     =>  $fieldname,
						'url'         =>  $url,
						'thumb'   =>  $thumb     

						);

					$this->db->insert('assetfields', $arrayName);

					//get insert id and save to content
					$insert_id = $this->db->insert_id();

					

					//get the original
					$this->db->select($fieldname);
					$this->db->from('content');
					$this->db->where('entryid', $entryid);

					$query = $this->db->get();
					
					$orig = "";
					foreach ($query->result() as $row) 
					{
						$orig =  $row->$fieldname;
					}
					
					//append to comma delimited string
					$orig = $orig . "," .$insert_id;
					$orig = ltrim($orig,",");

					$object = array($fieldname => $orig );

					$this->db->where('entryid', $entryid);
					$this->db->update('content', $object);

				}
				else
				{
					//non image file types
					$url = base_url('assets/uploads') . "/" . $mytry['file_name'];
					$thumb = base_url('img/file.jpg');

					$arrayName = array(
						'entryid'     =>  $entryid, 
						'filename'    =>   $mytry['file_name'] ,
						'kind'        =>   $mytry['file_ext'] ,
						'width'       =>   '' ,
						'height'      =>   '' ,
						'size'        =>   $mytry['file_size'] ,
						'datecreated' =>   date("Y-m-d H:i:s") ,
						'fieldname'     =>  $fieldname,
						'url'         =>  $url,
						'thumb'   =>  $thumb     

						);

					$this->db->insert('assetfields', $arrayName);

					//get insert id and save to content
					$insert_id = $this->db->insert_id();

					

					//get the original
					$this->db->select($fieldname);
					$this->db->from('content');
					$this->db->where('entryid', $entryid);

					$query = $this->db->get();
					
					$orig = "";
					foreach ($query->result() as $row) 
					{
						$orig =  $row->$fieldname;
					}
					
					//append to comma delimited string
					$orig = $orig . "," .$insert_id;
					$orig = ltrim($orig,",");

					$object = array($fieldname => $orig );

					$this->db->where('entryid', $entryid);
					$this->db->update('content', $object);



				}


				
				


				

				$this->session->set_flashdata('type', '1');
				$this->session->set_flashdata('msg', '<strong>Success</strong> Image uploaded');
				
				redirect("admin/entries/render_section/$sectionid/$entryid", "refresh");
			}
		}

	}

}

/* End of file Asset_files.php */
/* Location: ./application/controllers/admin/Asset_files.php */