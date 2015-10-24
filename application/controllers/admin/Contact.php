<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		
	}

	

	 /**
	  *  @Description: load the view files
	  *       @Params: none
	  *
	  *  	 @returns: none
	  */
	public function contact_form_view()
	{
		//grab the menu send to view
		$this->load->model('Stuff_menu');
		$menu = $this->Stuff_menu->make_menu();

		//for iphones
		$small_menu = $this->Stuff_menu->make_small_menu();

		$data['menu'] = $menu;
		$data['small_menu'] = $small_menu;

		//$data['content'] = do_shortcode($shorttag);

		$this->load->view('sitepreview/header');
		$this->load->view('sitepreview/body',$data);
		$this->load->view('contact/contact_form',$data);
		$this->load->view('sitepreview/footer');

	}

	 /**
	  *  @Description: code to actually send, validation is here
	  *       @Params: _POST, name, email, message,contact
	  *
	  *  	 @returns: nothing
	  */
	public function contact_form()
	{

		$this->load->model('Stuff_email');

		$name    = $this->input->post('name');
		$email   = $this->input->post('email');
		$contact = $this->input->post('contact');
		$message = $this->input->post('message');

		$form_message = "<strong>Name:</strong>$name<br/><strong>Email:</strong>$email<br/><strong>Contact No:</strong>$contact<br/><br/><strong>Message:</strong>$message";



		$this->Stuff_email->my_email('yourname@yourdomain.com','To','Message Recieved on contact form',$form_message);

		redirect("shortcodes/preview_page/1","refresh");


	}

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */