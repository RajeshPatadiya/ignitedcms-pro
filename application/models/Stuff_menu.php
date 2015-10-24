<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stuff_menu extends CI_Model {

	
	 /**
	  *  @Description: save the pure html from menu with all classes
	  *       @Params: html
	  *
	  *  	 @returns: none
	  */
	public function save_menu($html)
	{
		//best way to strip the button tags and everything between
		$doc = new DOMDocument();
		$doc->loadHTML($html);
		$xpath = new DOMXPath($doc);
		foreach ($xpath->query('//button') as $node) {
		    $node->parentNode->removeChild($node);
		}
		$html2 = $doc->saveHTML();

        //strip the other tags button tags
        $html3 = strip_tags($html2, '<ol><li><div><i><button>');

		$object = array('html' => $html3 );

        //echo $html3;

		$this->db->update('menu', $object);
		$this->db->where('id', '1');

	}

	public function save_parent_child($html)
	{


		//best way to strip the button tags and everything between
		$doc = new DOMDocument();
		$doc->loadHTML($html);
		$xpath = new DOMXPath($doc);
		foreach ($xpath->query('//button') as $node) 
		{
		    $node->parentNode->removeChild($node);
		}
		$html2 = $doc->saveHTML();

		//remove class and ids from li and ol tags
		$domd = new DOMDocument();
		libxml_use_internal_errors(true);
		$domd->loadHTML($html2);
		libxml_use_internal_errors(false);

		$domx = new DOMXPath($domd);
		$items = $domx->query("//li");

		$olitems = $domx->query("//ol");

		foreach($items as $item)
		{
		  $item->removeAttribute("id");
		  $item->removeAttribute("class");
		}

		foreach($olitems as $item) 
		{
		  $item->removeAttribute("id");
		  $item->removeAttribute("class");
		}

		$html3 = $domd->saveHTML();

		//add | delimiters between name and url
		$html3 = str_replace('</div>', '|</div>', $html3);

		//remove white space between tags
		//important for proper array building
		$html4 = strip_tags($html3, '<ol><li>');
		$html5 = preg_replace('~>\s+<~', '><', $html4);
		$html5 = "<ol>" . $html5 . "</ol>";

		
		$flat_array = $this->ul_to_array($html5);

		$this->build_array($flat_array);
		
		
	}

	 /**
	  *  @Description: build the parent child from array
	  *       @Params: array
	  *
	  *  	 @returns: none
	  */
	public function build_array($flat_array)
	{
		//first clear the table
		$this->db->empty_table('menu2');

		$test = array();

		$my_counter = 0;
		foreach ($flat_array as $key) 
		{
			$test[$my_counter]['level'] = $key['level'];


			//FIRST REMOVE NEWLINES
			$string = trim(preg_replace('/\s+/', ' ', $key['value']));

			//IMPORTANT TO TRIM THE PIPE SYMBOL
			$test[$my_counter]['value'] = trim($string,"|");
			$test[$my_counter]['id'] = $my_counter;
			$my_counter++;
			
		}

		$arr_items = count($test);
		//echo $arr_items;
		for ($i=$arr_items - 1; $i >= 0 ; $i--) { 
			$id = $test[$i]['id'];
			$father = $this->get_parent_id($test,$i);
			$innerhtml = $test[$i]['value'];
			//echo br();

			echo $id . " " . $father . " " . $innerhtml;
			echo br();

			if(strlen(trim($father))==0)
			{
				$father = 'null';
			}
			$object = array('id' => $id , 
							'father' => $father,
							'tag' => 'tag',
						 	'innerhtml' => $innerhtml);

			$this->db->insert('menu2', $object);
		}	

	}

	 /**
	  *  @Description: loop up to get the parent id
	  *       @Params: array
	  *
	  *  	 @returns: parent id
	  */
	public function get_parent_id($test,$offset)
	{
		$current_level = $test[$offset]['level'];
		$arr_items = count($test);
		//echo $arr_items;
		for ($i=$offset; $i >= 0 ; $i--) { 
			if($test[$i]['level']<$current_level)
			{
				//return the parent id
				return $test[$i]['id'];
				break;
			}	
		}
	}


	 /**
	  *  @Description: loop through the list and build array
	  *       @Params: html li source
	  *
	  *  	 @returns: array
	  */
	public function find_ul_or_li($source)
	{
	    $result = false;

	    $pos_ul = strpos($source, '<ol>');
	    $pos_li = strpos($source, '<li>');
	    $pos_cul = strpos($source, '</ol>');
	    $pos_cli = strpos($source, '</li>');

	    if ($pos_ul === false)
	        $pos_ul = PHP_INT_MAX;

	    if ($pos_li === false)
	        $pos_li = PHP_INT_MAX;

	    if ($pos_cul === false)
	        $pos_cul = PHP_INT_MAX;

	    if ($pos_cli === false)
	        $pos_cli = PHP_INT_MAX;

	    if ($pos_ul < min($pos_li, $pos_cul, $pos_cli))
	        $result = array ('token' => 'ol', 'pos' => $pos_ul);
	    else if ($pos_li < min($pos_ul, $pos_cul, $pos_cli))
	        $result = array ('token' => 'li', 'pos' => $pos_li);
	    else if ($pos_cul < min($pos_ul, $pos_li, $pos_cli))
	        $result = array ('token' => 'cul', 'pos' => $pos_cul);
	    else if ($pos_cli < min($pos_ul, $pos_li, $pos_cul))
	        $result = array ('token' => 'cli', 'pos' => $pos_cli);

	    return $result;
	}

	public function ul_to_array($source)
	{
	    $done = false;
	    $result = array ();
	    $level = -1;
	    $previous_token = '';

	    while (!$done)
	    {
	        $pos_result = $this->find_ul_or_li($source);
	        if (!$pos_result)
	        {
	            $done = true;
	            continue;
	        }

	        if ($pos_result['token'] == 'ol')
	        {
	            if ($previous_token == 'li')
	            {
	                $value = substr($source, 0, $pos_result['pos']);
	                //$value = trim($value,"|");
	                $result[] = array ('level' => $level, 'value' => $value);
	            }

	            $level++;
	            $source = substr($source, $pos_result['pos'] + 4);
	            $previous_token = 'ol';
	        }
	        else if ($pos_result['token'] == 'li')
	        {
	            $source = substr($source, $pos_result['pos'] + 4);
	            $previous_token = 'li';
	        }
	        else if ($pos_result['token'] == 'cul')
	        {
	            $level--;
	            $source = substr($source, $pos_result['pos'] + 5);
	            $previous_token = 'cul';
	        }
	        else if ($pos_result['token'] == 'cli')
	        {
	            $value = substr($source, 0, $pos_result['pos']);
	            if ($value != '')
	                $result[] = array ('level' => $level, 'value' => $value);

	            $source = substr($source, $pos_result['pos'] + 5);
	            $previous_token = 'cli';
	        }
	    }

	    return $result;
	}


	 /**
	  *  @Description: makes the menu
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function make_menu()
	{

		$this->db->select('*');
		$this->db->from('menu2');
		$this->db->order_by('id', 'asc');

		$query = $this->db->get();


		$menu2 = ('<div class="menu" ><div id="results">');

		//convert query result to an array
		$query_array = $query->result_array();

		$menu3 = ('</div></div>');

		$brap =  $this->make_tree($query_array,"null");	
        
        //to remove the menu bug
		//remove first <ul> and replace with <ul class="sf-menu">
		$brap =  preg_replace('/<ul>/', '<ul class="sf-menu">', $brap, 1);


        $menu4 = $menu2 . $brap . $menu3;

        return $menu4;

	}

	 /**
	  *  @Description: make the menu for iphones
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function make_small_menu()
	{
		$this->db->select('innerhtml');
		$this->db->from('menu2');
		$this->db->order_by('id', 'asc');

		$query = $this->db->get();
		
		$string = "";
		foreach ($query->result() as $row) 
		{
			 $string = $string . $this->small_split($row->innerhtml);
		}

		return $string;

	}


	/**
	  *  @Description: make the tree from db result
	  *       @Params: db select
	  *
	  *  	 @returns: html tree
	  */
	public function  make_tree( $a, $level) 
	{
	   $r = '' ;
	   foreach ( $a as $i ) 
	   {
	       if ($i['father'] == $level ) 
	       {
	          $r = $r . "<li>" . $this->split($i['innerhtml']) .  $this->make_tree( $a, $i['id'] ) . "</li>";

	       }
	   }
	     //avoid empty leafs
  		 return ($r==''?'':"<ul>". $r . "</ul>");
  	}

  	 /**
  	  *  @Description: split the name and the url
  	  *       @Params: string   name| url
  	  *
  	  *  	 @returns: <a href='url'> name </a>
  	  */

  	 public function split($element)
  	 {

  	 	$array = explode("|", $element);
  	 	$id = trim($array[1]);
  	 	//store site url

  	 	//check to see if it is using codeigniter custom controller

  	 	$t_url = $this->get_url($id);
  	 	$tmp_url = site_url($t_url);

  	 	return "<a href='$tmp_url'> $array[0]</a>";

  	 }

  	  /**
  	   *  @Description: split for iphone menu
  	   *       @Params: name |  url
  	   *
  	   *  	 @returns: returns
  	   */
  	 public function small_split($element)
  	 {
  	 	$array = explode("|", $element);
  	 	$id = trim($array[1]);
  	 	//store site url


  	 	//check to see if it is using codeigniter custom controller


  	 	$t_url = $this->get_url($id);
  	 	$tmp_url = site_url($t_url);

  	 	return "<option value='$tmp_url'>$array[0]</option>";
  	 	

  	 }

  	  /**
  	   *  @Description: returns the site url
  	   *       @Params: pageid
  	   *
  	   *  	 @returns: url
  	   */
  	 public function get_url($pageid)
  	 {
  	 	$this->db->select('*');
  	 	$this->db->from('pages');
  	 	$this->db->where('id', $pageid);
  	 	$this->db->limit(1);

  	 	$query = $this->db->get();
  	 	
  	 	$controller = 0;
  	 	$url = "";
  	 	foreach ($query->result() as $row) 
  	 	{
  	 		$controller = $row->controller;
  	 		$url = $row->path;

  	 	}

  	 	if($controller == 0)
  	 	{
  	 		return "site_preview/preview_page/$pageid";
  	 	}
  	 	else{
  	 		return "$url";
  	 	}
  	 	


  	 }


	

}

/* End of file stuff_menu.php */
/* Location: ./application/models/stuff_menu.php */