<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//similar to matrix todo

class Stuff_blocks extends CI_Model {

	public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        {
        	 $this->load->dbforge();
        }
           
    }






	 /**
	  *  @Description: Accept post vars and inserts to database
	  *       @Params: _POST
	  *
	  *  	 @returns: returns
	  */
	public function add_block_fields($formValues)
	{
		$counter = 1;

        $name          = "";  
		$instructions  = "";
		$type          = "";
		$opts          = "";
		$maxchars      = "";
		$filetypes     = "";
		$limit         = "";
		$min           = "";
		$max           = "";



		foreach($formValues as $key => $value) 
		{
			//ignore the first post var
			if($key == "block-name")
			{
				//do nothing
			}
			else
			{
				//echo $key;

				
				if($counter % 8 === 0)
				{
					
					$this->load->model('Stuff_fields');
					$this->Stuff_fields->add_new_field($name,$type,$opts,$instructions,$maxchars,$limitamount,$filetypes,$min,$max);

					echo br();
					//reset counter
					$counter = 1;

				}
				else
				{
					$chunks = explode("|", $key);
					$tmp = $chunks[0];

					if($tmp === 'name')
					{
						$name = $value;
					}
					if($tmp === 'instructions')
					{
						$instructions = $value;
					}
					if($tmp === 'type')
					{
						$type = $value;
					}
					if($tmp === 'opts-name')
					{
						$opts = $value;
					}
					if($tmp === 'maxchars')
					{
						$maxchars = $value;
					}
					if($tmp === 'filetypes')
					{
						$filetypes = $value;
					}
					if($tmp === 'limit')
					{
						$limit = $value;
					}
					if($tmp === 'min')
					{
						$min = $value;
					}
					if($tmp === 'max')
					{
						$max = $value;
					}
					

					$counter++;
				}

				
			}	
		}
	}

}

/* End of file Stuff_blocks.php */
/* Location: ./application/models/Stuff_blocks.php */