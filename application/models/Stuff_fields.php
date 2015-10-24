<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stuff_fields extends CI_Model {

	public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
            {
            	 $this->load->dbforge();
            }
           
    }

	 /**
	  *  @Description: if form validated add new field into db
	  *       @Params: $opts is a json array
	  *
	  *  	 @returns: returns
	  */


    //
    //   To do add json string for check boxes and drop downs 
	//   and possibly blocks when you figure this out!
	//
	//
	//
	//

	public function add_new_field($handle,$type,$opts,$instructions,$maxchars,$limitamount,$formvalidation,$min,$max)
	{


		


		//now dynamically add columns to the content table
		//for the twig templating engine to easily reference!

		if ($type == "plain-text")
		{
			$xd = "max_length[".$maxchars."]";

			$fields = array(
        
		        $handle => array(
		        'type' => 'VARCHAR',
		        'constraint' =>  $maxchars
        		),
        	);

        	$object = array(
			'name' => $handle, 
			'type' => $type, 
			 
			'instructions' => $instructions,
			'maxchars' => $maxchars,
			'formvalidation' => $xd
			);

			$this->db->insert('fields', $object);

   			$this->dbforge->add_column('content', $fields);


		}

		if ($type == "number")
		{
			$xd = "integer|greater_than[".$min."]|less_than[".$max."]";

			$fields = array(
        
		        $handle => array(
		        'type' => 'INT'
		        
        		),
        	);

        	$object = array(
			'name' => $handle, 
			'type' => $type, 
			
			'instructions' => $instructions,
			'maxchars' => $maxchars,
			'formvalidation' => $xd
			);

			$this->db->insert('fields', $object);

   			$this->dbforge->add_column('content', $fields);


		}

		if ($type == "drop-down")
		{

			$fields = array(
        
		        $handle => array(
			        'type' => 'TEXT',
	                'null' => TRUE,
        		),
        	);

        	$object = array(
			'name' => $handle, 
			'type' => $type, 
			'opts' => $opts,
			'instructions' => $instructions,
			'maxchars' => $maxchars,
			'formvalidation' => 'min_length[1]'
			
			);

			$this->db->insert('fields', $object);

   			$this->dbforge->add_column('content', $fields);


		}

		if ($type == "check-box")
		{

			$fields = array(
        
		        $handle => array(
			        'type' => 'TEXT',
	                'null' => TRUE,
        		),
        	);

        	$object = array(
			'name' => $handle, 
			'type' => $type, 
			'opts' => $opts,
			'instructions' => $instructions,
			'maxchars' => $maxchars,
			'formvalidation' => 'min_length[1]'
			
			);

			$this->db->insert('fields', $object);

   			$this->dbforge->add_column('content', $fields);


		}



		if($type == "rich-text")
		{
			$fields = array(
        
		        $handle => array(
			        'type' => 'TEXT',
	                'null' => TRUE,
        		),
        	);

        	$object = array(
			'name' => $handle, 
			'type' => $type, 
			
			'instructions' => $instructions,
			'maxchars' => $maxchars,
			'formvalidation' => 'min_length[1]'
			
			);

			$this->db->insert('fields', $object);

   			$this->dbforge->add_column('content', $fields);

		}

		if($type == "switch")
		{
			$fields = array(
        
		        $handle => array(
			        'type' => 'TEXT',
	                'null' => TRUE,
        		),
        	);

        	$object = array(
			'name' => $handle, 
			'type' => $type, 
			
			'instructions' => $instructions,
			'maxchars' => $maxchars,
			'formvalidation' => 'min_length[1]'
			
			);

			$this->db->insert('fields', $object);

   			$this->dbforge->add_column('content', $fields);

		}

		if($type == "color")
		{
			$fields = array(
        
		        $handle => array(
		        'type' => 'VARCHAR',
		        'constraint' =>  100,
        		),
        	);

        	$object = array(
			'name' => $handle, 
			'type' => $type, 
			 
			'instructions' => $instructions,
			'maxchars' => $maxchars,
			'formvalidation' => 'min_length[1]'
			
			);

			$this->db->insert('fields', $object);

   			$this->dbforge->add_column('content', $fields);

			
		}

		if($type == "date")
		{
			$fields = array(
        
		        $handle => array(
		          'type' =>  'DATE'
        		),
        	);

        	$object = array(
			'name' => $handle, 
			'type' => $type, 
			 
			'instructions' => $instructions,
			'maxchars' => $maxchars,
			'formvalidation' => 'min_length[1]'
			
			);

			$this->db->insert('fields', $object);

   			$this->dbforge->add_column('content', $fields);
			
		}
		if($type == "file-upload")
		{
			$fields = array(
        
		        $handle => array(
		        'type' => 'VARCHAR',
		        'constraint' =>  500,
        		),
        	);

        	$object = array(
			'name' => $handle, 
			'type' => $type, 
			'limitamount' => $limitamount,
			'instructions' => $instructions,
			'maxchars' => $maxchars,
			'formvalidation' => $formvalidation
			);

			$this->db->insert('fields', $object);

   			$this->dbforge->add_column('content', $fields);

			
		}

	}

	 /**
	  *  @Description: to do dynamically remove columns from content table!
	  *       @Params: fieldid
	  *
	  *  	 @returns: returns
	  */
	public function remove_field($fieldid)
	{
		
		//get the column name
		$this->db->select('name');
		$this->db->from('fields');
		$this->db->where('id', $fieldid);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$column_name = "";
		foreach ($query->result() as $row) 
		{
			$column_name = $row->name;
		}
		

		$this->dbforge->drop_column('content',$column_name);

	}




}

/* End of file Stuff_fields.php */
/* Location: ./application/models/Stuff_fields.php */