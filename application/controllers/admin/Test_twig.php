<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_twig extends CI_Controller {

	//check if user has access

	public function index()
	{

	}

	 /**
	  *  @Description: Special function to auto generate the twig syntax and file
	  *       @Params: sectionid,entryid
	  *
	  *  	 @returns: nothing
	  */
	public function gen_template($sectionid,$entryid)
	{
		$this->load->model('Stuff_template_generator');
		$this->Stuff_template_generator->create_template($sectionid,$entryid);
	}



	 /**
	  *  @Description: Displays the template file
	  *       @Params: entryid, sectionid
	  *
	  *  	 @returns: view
	  */
	public function display($entryid,$sectionid)
	{
		$this->db->select('*');
		$this->db->from('content');
		$this->db->where('entryid', $entryid);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$query =  $query->result_array();

		
		 $arrTmp = array();
		 foreach ($query as $b  ) {
		 	$arrTmp = $b;
		 }

		 //store all these in the entry array
		 foreach ($arrTmp as $key => $value) {
		 	$data['entry'][$key] = $value;
		 }

		

		


		//Pass all the global vars to view
		$this->load->model('Stuff_globals');

		$x = $this->Stuff_globals->dump_globals();

		foreach ($x as $key => $value) {
			$data[$key] = $value;
		}



		

		//pass all the assets to view
		$this->load->model('Stuff_template_generator');
		$data['assets'] = $this->Stuff_template_generator->get_all_assets($entryid);

		

		if($this->Stuff_template_generator->is_multiple($sectionid))
		{

			//get section name
			$this->load->library('twig');
			$secion_name = $this->Stuff_template_generator->get_section_name($sectionid);


			//twig template go backwards, so you call the child first and the parent 
			//get to access the same variables passed into it!

			//in short, always call the child template!!
			
			// Load our Twig template
			$this->twig->parse("custom/$secion_name/_entry.html", $data);
		}
		else
		{
			//is Single type
			$this->load->library('twig');
			$secion_name = $this->Stuff_template_generator->get_section_name($sectionid);

			
			//twig template go backwards, so you call the child first and the parent 
			//get to access the same variables passed into it!

			//in short, always call the child template!!
			
			// Load our Twig template
			$this->twig->parse("custom/$secion_name.html", $data);
		}
	}

}

/* End of file Test_twig.php */
/* Location: ./application/controllers/admin/Test_twig.php */