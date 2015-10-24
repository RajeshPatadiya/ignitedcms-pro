<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index()
	{
		
	}

	 /**
	  *  @Description: get all products by category from db
	  *       @Params: none
	  *
	  *  	 @returns: returns all products
	  */
	public function show_all()
	{

		$this->db->select('*');
		$this->db->from('products');
		
		$query = $this->db->get();
		
		$data['query'] = $query;
		
		

		//load the view
		//grab the menu send to view
		$this->load->model('Stuff_menu');
		$menu = $this->Stuff_menu->make_menu();

		//for iphones
		$small_menu = $this->Stuff_menu->make_small_menu();

		$data['menu'] = $menu;
		$data['small_menu'] = $small_menu;

		//load the view

		$this->load->view('custom/header');
		$this->load->view('custom/body',$data);
		$this->load->view('admin/products/product_page',$data);
		$this->load->view('custom/footer');


	}

	 /**
	  *  @Description: show the one product page
	  *       @Params: productid
	  *
	  *  	 @returns: returns
	  */
	public function product_details($id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id', $id);
		
		$this->db->limit(1);

		$query = $this->db->get();
		
		$data['query'] = $query;
		
		

		//load the view
		//grab the menu send to view
		$this->load->model('Stuff_menu');
		$menu = $this->Stuff_menu->make_menu();

		//for iphones
		$small_menu = $this->Stuff_menu->make_small_menu();

		$data['menu'] = $menu;
		$data['small_menu'] = $small_menu;

		
		//load the view
		$this->load->view('custom/header');
		$this->load->view('custom/body',$data);
		$this->load->view('admin/products/product_detail',$data);
		$this->load->view('custom/footer');

	}

}

/* End of file products.php */
/* Location: ./application/controllers/products.php */