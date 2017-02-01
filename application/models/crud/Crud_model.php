<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {




	 /**
	  *  @Description: generate all the view files
	  *       @Params: table name, form_array giving field name information, type, helper instructions and required status!
	  *
	  *  	 @returns: returns
	  */
	 public function generate_view($table,$form_array)
	 {

	 	//first create a directory with the name of the table
   		$view_path  = APPPATH . "/views/$table";
   		mkdir($view_path);

	 	//////////////////////////////////////////index file
   		$string = read_file(APPPATH .'/crud_master/index.php');
   		
   		$string = str_replace("{{table}}", $table, $string);

   		$gen_headers = $this->gen_headers($table);
   		$string = str_replace("{{header}}", $gen_headers, $string);

   		$gen_con = $this->gen_table_content($table);
   		$string = str_replace("{{table_content}}", $gen_con, $string);

   		if ( ! write_file(APPPATH . "/views/$table/index.php", $string))
		{
		    echo 'Unable to write the file, check you have right permissions';
		}
		else
		{
		    //echo 'File written!';
		}

      
		$string = read_file(APPPATH .'/crud_master/new.php');
		$string = str_replace("{{table}}", $table, $string);

		$gen_fields = $this->gen_fields($table,$form_array);
		$string = str_replace("{{fields}}", $gen_fields, $string);


		if ( ! write_file(APPPATH . "/views/$table/new.php", $string))
		{
		    echo 'Unable to write the file, check you have right permissions';
		}
		else
		{
		    //echo 'File written!';
		}
	 	

	 	//////////////////////////////////////////////////////////edit file
		$string = read_file(APPPATH .'/crud_master/edit.php');
		$string = str_replace("{{table}}", $table, $string);

		$gen_fields2 = $this->gen_fields2($table,$form_array);
		$string = str_replace("{{fields}}", $gen_fields2, $string);


		if ( ! write_file(APPPATH . "/views/$table/edit.php", $string))
		{
		    echo 'Unable to write the file, check you have right permissions';
		}
		else
		{
		    //echo 'File written!';
		}




	 	////////////////////////////////////////////////////////////////////////breadcrumb all
	 	$string = read_file(APPPATH .'/crud_master/breadcrumb-all.php');
   		
   		$string = str_replace("{{table}}", $table, $string);

   		if ( ! write_file(APPPATH . "/views/$table/breadcrumb-all.php", $string))
		{
		    echo 'Unable to write the file, check you have right permissions';
		}
		else
		{
		    //echo 'File written!';
		}

	 	////////////////////////////////////////////////////////////////////////breadcrumb edit
	 	$string = read_file(APPPATH .'/crud_master/breadcrumb-edit.php');
   		
   		$string = str_replace("{{table}}", $table, $string);

   		if ( ! write_file(APPPATH . "/views/$table/breadcrumb-edit.php", $string))
		{
		    echo 'Unable to write the file, check you have right permissions';
		}
		else
		{
		    //echo 'File written!';
		}

	 	////////////////////////////////////////////////////////////////////////breadcrumb new
	 	$string = read_file(APPPATH .'/crud_master/breadcrumb-new.php');
   		
   		$string = str_replace("{{table}}", $table, $string);

   		if ( ! write_file(APPPATH . "/views/$table/breadcrumb-new.php", $string))
		{
		    echo 'Unable to write the file, check you have right permissions';
		}
		else
		{
		    //echo 'File written!';
		}


	 }


	 //generate the text boxes, dates etc... to be expanded
	 public function gen_fields($table,$form_array)
	 {
	 	
	 	$fields = $this->db->field_data($table);

		$count = 0;
		
		$arg_string = "";

		

		foreach ($fields as $key) 
		{
			if($key->name == "id")
			{
				//ignore
			}
			else
			{

				//fucntion to check match and then get name,type,helper,required

	 			$string = $this->get_info($key->name,$form_array);

				$arg_string = $arg_string . $string ."\n";
			}
			
			
		}

		
		return $arg_string;



	 }

	  //generate the text boxes, dates etc... to be expanded FOR EDIT
	 public function gen_fields2($table,$form_array)
	 {

	 	$fields = $this->db->field_data($table);
		
		
		$arg_string = "";
	

		foreach ($fields as $key) 
		{
			if($key->name == "id")
			{
				//ignore
			}
			else
			{

				//fucntion to check match and then get name,type,helper,required

				$string = $this->get_info2($key->name,$form_array);

				$arg_string = $arg_string . $string ."\n";
			}
			
		}

		return $arg_string;

	 }




	  /**
	   *  @Description: Get the info for the type of field 
	   *       @Params: $fieldname, $form_array
	   *
	   *  	 @returns: string
	   */
	 public function get_info($fieldname,$form_array)
	 {
	 	 //loop through and get the field type!!

	 	//initialise string
	 	$string = "";

	 	$count = 0;

	 	for ($i = 0; $i < count($form_array) ; $i++) 
	 	{ 
	 		if($form_array[$i]['name'] == $fieldname)
	 		{
	 			if($form_array[$i]['type'] == 'pmtext')
	 			{
	 				$string = read_file(APPPATH .'/crud_master/pmtext.php');
	 				$string = str_replace("{{val}}", $fieldname, $string);

	 				//do the helper text
	 				$string = str_replace("{{helper}}", $form_array[$i]['helper'] , $string);

	 				//do the required
	 				if($form_array[$i]['required'] == '1')
	 				{
	 					$string = str_replace("{{required}}", "<div class='errors inline'>*This field is required</div> " , $string);
	 				}
	 				else{
	 					$string = str_replace("{{required}}", " " , $string);
	 				}

	 			}

	 			if($form_array[$i]['type'] == 'pmtextbox')
	 			{
	 				$string = read_file(APPPATH .'/crud_master/pmtextbox.php');
	 				$string = str_replace("{{val}}", $fieldname, $string);

	 				//do the helper text
	 				$string = str_replace("{{helper}}", $form_array[$i]['helper'] , $string);

	 				//do the required
	 				if($form_array[$i]['required'] == '1')
	 				{
	 					$string = str_replace("{{required}}", "<div class='errors inline'>*This field is required</div>" , $string);
	 				}
	 				else{
	 					$string = str_replace("{{required}}", " " , $string);
	 				}
	 			}

	 			if($form_array[$i]['type'] == 'pmdate')
	 			{
	 				$string = read_file(APPPATH .'/crud_master/pmdate.php');
	 				$string = str_replace("{{val}}", $fieldname, $string);

	 				//do the helper text
	 				$string = str_replace("{{helper}}", $form_array[$i]['helper'] , $string);

	 				//do the required
	 				if($form_array[$i]['required'] == '1')
	 				{
	 					$string = str_replace("{{required}}", "<div class='errors inline'>*This field is required</div>" , $string);
	 				}
	 				else{
	 					$string = str_replace("{{required}}", " " , $string);
	 				}
	 			}

	 		}
	 	}

	 	//may not work because of scope
	 	return $string;
	 }


	   /**
	   *  @Description: Get the info for the type of field ONLY for the EDIT field
	   *       @Params: $fieldname, $form_array
	   *
	   *  	 @returns: string
	   */
	 public function get_info2($fieldname,$form_array)
	 {
	 	 //loop through and get the field type!!

	 	//initialise string
	 	$string = "";

	 	$count = 0;

	 	for ($i = 0; $i < count($form_array) ; $i++) 
	 	{ 
	 		if($form_array[$i]['name'] == $fieldname)
	 		{
	 			if($form_array[$i]['type'] == 'pmtext')
	 			{
	 				$string = read_file(APPPATH .'/crud_master/pmtext_edit.php');
	 				$string = str_replace("{{val}}", $fieldname, $string);

	 				//do the helper text
	 				$string = str_replace("{{helper}}", $form_array[$i]['helper'] , $string);

	 				//do the required
	 				if($form_array[$i]['required'] == '1')
	 				{
	 					$string = str_replace("{{required}}", "<div class='errors inline'>*This field is required</div> " , $string);
	 				}
	 				else{
	 					$string = str_replace("{{required}}", " " , $string);
	 				}

	 			}

	 			if($form_array[$i]['type'] == 'pmtextbox')
	 			{
	 				$string = read_file(APPPATH .'/crud_master/pmtextbox_edit.php');
	 				$string = str_replace("{{val}}", $fieldname, $string);

	 				//do the helper text
	 				$string = str_replace("{{helper}}", $form_array[$i]['helper'] , $string);

	 				//do the required
	 				if($form_array[$i]['required'] == '1')
	 				{
	 					$string = str_replace("{{required}}", "<div class='errors inline'>*This field is required</div>" , $string);
	 				}
	 				else{
	 					$string = str_replace("{{required}}", " " , $string);
	 				}
	 			}

	 			if($form_array[$i]['type'] == 'pmdate')
	 			{
	 				$string = read_file(APPPATH .'/crud_master/pmdate_edit.php');
	 				$string = str_replace("{{val}}", $fieldname, $string);

	 				//do the helper text
	 				$string = str_replace("{{helper}}", $form_array[$i]['helper'] , $string);

	 				//do the required
	 				if($form_array[$i]['required'] == '1')
	 				{
	 					$string = str_replace("{{required}}", "<div class='errors inline'>*This field is required</div>" , $string);
	 				}
	 				else{
	 					$string = str_replace("{{required}}", " " , $string);
	 				}
	 			}

	 		}
	 	}

	 	//may not work because of scope
	 	return $string;
	 }



	 //generate the table headers
	 public function gen_headers($table)
	 {
	 	$fields = $this->db->field_data($table);

		$count = 0;
		
		$arg_string = "";

		

		foreach ($fields as $key) 
		{
			if($key->name == "id")
			{
				//ignore
			}
			else
			{
				$arg_string = $arg_string . "<th class=\"text-muted\" width=\"\">$key->name</th>" ."\n";
			}
			
			
		}

		//important get rid of the last trailing comma
		$arg_string = $arg_string . "<th class=\"text-muted\" width=\"\">Action</th>";
		return $arg_string;


	 }


	 //generate table content
	 public function gen_table_content($table)
	 {
	 	$fields = $this->db->field_data($table);

		
		
		$arg_string = "";

		

		foreach ($fields as $key) 
		{
			if($key->name == "id")
			{
				//ignore
			}
			else
			{
				$arg_string = $arg_string . "<td><?php echo \$key->$key->name ?></td>" ."\n";
			}
			
			
		}

		
		return $arg_string;


	 }



	 /**
	  *  @Description: generate teh controller logic stick under admin folder
	  *       @Params: table name, form array
	  *
	  *  	 @returns: returns
	  */
	public function generate_controller($table, $form_array)
	{

	   $controller_path = APPPATH . "/controllers/admin/";


	   //read the master controller file
   		$string = read_file(APPPATH .'/crud_master/master_controller.txt');

   		//do a string replace on table
   		$string = str_replace("{{table}}", $table, $string);

   		//do a string replace on the args
   		$gen_args = $this->gen_args($table);
   		$string = str_replace("{{args}}", $gen_args, $string);

   		//generate the post cond
   		$gen_post = $this->gen_post($table);
   		$string = str_replace("{{post}}", $gen_post, $string);


   		//now generate the validation rules starting with only required first!!!
   		//loop through all the field data

	 	$fields = $this->db->field_data($table);
		
		
		$arg_string = "";
	

		foreach ($fields as $key) 
		{
			if($key->name == "id")
			{
				//ignore
			}
			else
			{

				//fucntion to check match and then get name,type,helper,required

				$string2 = $this->generate_validation($key->name,$form_array);

				$arg_string = $arg_string . $string2 ."\n";
			}
			
		}

		$string = str_replace("{{validation}}", $arg_string, $string);

		//end the loop



   		$tmp = ucfirst($table);
   		$tmp = $tmp . ".php";

   		if ( ! write_file("./application/controllers/admin/$tmp", $string))
		{
		    echo 'Unable to write the file, check you have right permissions';
		}
		else
		{
		    //echo 'File written!';
		}


	}




	 /**
	  *  @Description: dynamically generate the validation for the new and edit controller
	  *       @Params: field name, form data
	  *
	  *  	 @returns: string (for replacing)
	  */

	public function generate_validation($fieldname,$form_array)
	{

		 //loop through and get the field type!!

	 	//initialise string
	 	$string = "";

	 	$count = 0;

	 	for ($i = 0; $i < count($form_array) ; $i++) 
	 	{ 
	 		if($form_array[$i]['name'] == $fieldname)
	 		{
	 			if($form_array[$i]['type'] == 'pmtext')
	 			{
	 				
	 					 				//do the required
	 				if($form_array[$i]['required'] == '1')
	 				{
	 					$tmp = "\$this->form_validation->set_rules('$fieldname', '$fieldname', 'required');";
	 					$string = $string . $tmp;
	 				}
	 				else{
	 					//do nothing
	 				}

	 			}

	 			if($form_array[$i]['type'] == 'pmtextbox')
	 			{
	 				

	 				//do the required
	 				if($form_array[$i]['required'] == '1')
	 				{
	 					$tmp = "\$this->form_validation->set_rules('$fieldname', '$fieldname', 'required');";
	 					$string = $string . $tmp;
	 				}
	 				else{
	 					//do nothing
	 				}
	 			}

	 			if($form_array[$i]['type'] == 'pmdate')
	 			{
	 				
	 				//do the required
	 				if($form_array[$i]['required'] == '1')
	 				{
	 					$tmp = "\$this->form_validation->set_rules('$fieldname', '$fieldname', 'required');";
	 					$string = $string . $tmp;
	 				}
	 				else{
	 					//do nothing
	 				}
	 			}

	 		}
	 	}

	 	//may not work because of scope
	 	return $string;


	}




    /**
     *  @Description: generate the model file for the selected table quick and dirty test!
     *       @Params: params
     *
     *  	 @returns: returns
     */
   public function generate_model($table)
   {

   	 	//first create a directory with the name of the table
   		$model_path  = APPPATH . "/models/$table";
   		mkdir($model_path);


   		//read the master model file
   		$string = read_file(APPPATH .'/crud_master/model_master.txt');
   		
   		//do a string replace on table
   		$string = str_replace("{{table}}", $table, $string);



   		//do a string replace on the args
   		$gen_args = $this->gen_args($table);
   		$string = str_replace("{{args}}", $gen_args, $string);


   		//do a string replace on the array
   		$gen_array = $this->gen_array($table);
   		$string = str_replace("{{array}}", $gen_array, $string);



   		$tmp = ucfirst($table);
   		$tmp = $tmp . "_model.php";

   		if ( ! write_file("./application/models/$table/$tmp", $string))
		{
		    echo 'Unable to write the file, check you have right permissions';
		}
		else
		{
		    //echo 'File written!';
		}

   }


    /**
     *  @Description: generate the string for the args
     *       @Params: table name
     *
     *  	 @returns: returns
     */
   public function gen_args($table)
   {
   		$fields = $this->db->field_data($table);

		$count = 0;
		
		$arg_string = "";

		foreach ($fields as $key) 
		{
			if($key->name == "id")
			{
				//ignore
			}
			else
			{
				$arg_string = $arg_string . "\$" .$key->name . ",";
			}
			
			
		}

		//important get rid of the last trailing comma
		$arg_string = trim($arg_string,",");
		return $arg_string;


   }



    /**
     *  @Description: generate the string for the array
     *       @Params: table name
     *
     *  	 @returns: returns
     */
   public function gen_array($table)
   {
   		$fields = $this->db->field_data($table);

		$count = 0;
		
		$array_string = "";

		foreach ($fields as $key) 
		{
			if($key->name == "id")
			{
				//ignore
			}
			else
			{
				$array_string = $array_string . "'$key->name'" . "=>" . "\$" . $key->name . ",";
			}
			
			
		}

		//important get rid of the last trailing comma
		$array_string = trim($array_string,",");
		return $array_string;



   }	



    /**
     *  @Description: generate the post array
     *       @Params: table
     *
     *  	 @returns: returns
     */
   public function gen_post($table)
   {

   		$fields = $this->db->field_data($table);

		$count = 0;
		
		$post_string = "";

		foreach ($fields as $key) 
		{
			if($key->name == "id")
			{
				//ignore
			}
			else
			{
				$post_string = $post_string . "\$" . $key->name . "=\$this->input->post('" . $key->name . "');" ."\n" ;
			}
			
			
		}

		
		return $post_string;


   }


}

/* End of file Crud_model.php */
/* Location: ./application/models/crud/Crud_model.php */