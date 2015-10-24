<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stuff_blog extends CI_Model {

	public function insert_blog_post()
	{
		 $data2 = array(
               'title' => 'hey',
               'content' => 'some shizzle',
               'userid'  => '1',
               'blog_date'  => date("Y-m-d H:i:s")
                
            );
      $this->db->insert('blog', $data2); 
	}

	/**
	 * @Description: get blog posts
	 * @params     : params
	 * @returns    : array
	 */

	public function get_blog_posts()
	{
		$this->db->select('*');
	    $this->db->from('blog');
	    $this->db->where('userid', '1');
	    $this->db->order_by('blog_date', 'desc');

    	$query = $this->db->get();
    	return $query;
		
	}

}

/* End of file stuff_blog.php */
/* Location: ./application/models/stuff_blog.php */ 