<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


 






 /**
  *  @Description: A better html entities handles £ sign
  *       @Params: $var
  *
  *    @returns: Escaped string containing pound signs
  */
if ( ! function_exists('my_html_escape'))
{
    function my_html_escape($var)
    {
       $tmp = htmlentities($var,ENT_QUOTES,"UTF-8");
       
       return $tmp; 

    }   
}
/**
  *  @Description: Pretty up the date format
  *       @Params: datestamp
  *
  *     @returns: pretty date
  */


if ( ! function_exists('my_pretty_date'))
{
    function my_pretty_date($var)
    {
       //use ci active record
       return date('j M Y g:i A',strtotime($var));

    }   
}


/**
  *  @Description: get username
  *       @Params: none
  *
  *     @returns: username or string "Profile" if none set
  */


if ( ! function_exists('my_username'))
{
    function my_username()
    {
        //check if session is set
        $CI =& get_instance();
        if($CI->session->userdata('userid') !== "FALSE")
        {
          $userid = $CI->session->userdata('userid');

          $CI =& get_instance();
          $CI->db->select('name');
          $CI->db->from('user');
          $CI->db->where('id', $userid);
          $CI->db->limit(1);

          $query = $CI->db->get();
          $name = "";
          foreach ($query->result() as $row) 
          {
            $name = $row->name;
          }
          return $name;
        }
        else{
          return "Profile";
        }
    }   
}




/**
  *  @Description: renders user dashboard depending on permissions
  *       @Params: none
  *
  *     @returns: 
  */


if ( ! function_exists('my_render_dashboard'))
{
    function my_render_dashboard()
    {
        //check if session is set
        $CI =& get_instance();

        //pretty up the output
        $CI->load->helper('inflector');

        $userid = $CI->session->userdata('userid');

        $CI->load->model('Stuff_permissions');
        $list = $CI->Stuff_permissions->get_permissions($userid);

        //echo $list;
        //strip the last comma
        $list = trim($list,",");

        $access = explode(",", $list);



        foreach ($access as $key) {
          //get the icon
          $icon = $CI->Stuff_permissions->get_icon($key);
          $name = $CI->Stuff_permissions->get_name($key);
          $file_path = base_url("img/dashboard") . "/$key.svg";

          // echo("<a href=". site_url("admin/$key").">
          //         <div class='col-sm-2 my-pad-top'>
          //              <img class='img-responsive my-center' src='$file_path' alt='image'>
          //              <div class='igs-label'>".($name)."</div>

          //         </div>
          //       </a>");


        }

        
    }   
}



/**
  *  @Description: get the friendly url from route
  *       @Params: string eg admin/test_twig/display/3/2
  *
  *     @returns: returns
  */
if ( ! function_exists('my_friendly_url'))
{
    function my_friendly_url($string)
    {
      $CI =& get_instance();
      $CI->db->select('route');
      $CI->db->from('routes');
      $CI->db->where('controller', $string);
      $CI->db->limit(1);

      $query = $CI->db->get();
      $url = "";
      foreach ($query->result() as $row) 
      {
        $url = $row->route;
      }
      return $url;

    }   
}


/**
  *  @Description: show the site title
  *       @Params: params
  *
  *     @returns: returns
  */
if ( ! function_exists('my_site_title'))
{
    function my_site_title()
    {
      $CI =& get_instance();
      $CI->db->select('site');
      $CI->db->from('site');
      $CI->db->where('id', '1');
      $CI->db->limit(1);

      $query = $CI->db->get();
      $site = "";
      foreach ($query->result() as $row) 
      {
        $site = $row->site;
      }
      return $site;

    }   
}

/**
  *  @Description: show the Group Permission name
  *       @Params: role id
  *
  *     @returns: returns
  */
if ( ! function_exists('my_role'))
{
    function my_role($id)
    {
      $CI =& get_instance();
      $CI->db->select('groupName');
      $CI->db->from('permission_groups');
      $CI->db->where('groupID', $id);
      $CI->db->limit(1);

      $query = $CI->db->get();
      $groupName = "";
      foreach ($query->result() as $row) 
      {
        $groupName = $row->groupName;
      }
      return $groupName;

    }   
}





/**
  *  @Description: gets the field name
  *       @Params: fieldid
  *
  *     @returns: returns
  */
if ( ! function_exists('my_field_name'))
{
    function my_field_name($id)
    {
      $CI =& get_instance();
      $CI->db->select('name');
      $CI->db->from('fields');
      $CI->db->where('id', $id);
      $CI->db->limit(1);

      $query = $CI->db->get();
      $name = "";
      foreach ($query->result() as $row) 
      {
        $name = $row->name;
      }
      return $name;

    }   
}


/**
  *  @Description: get the content
  *       @Params: params
  *
  *     @returns: returns
  */

if ( ! function_exists('my_multiple_title'))
{
    function my_multiple_title($id)
    {

         //use ci active record
      $CI =& get_instance();
      $CI->db->select('entrytitle');
      $CI->db->from('content');
      $CI->db->where('entryid', $id);

      $CI->db->limit(1);

      $query = $CI->db->get();

      $entrytitle = "";
      foreach ($query->result() as $row) 
      {
        $entrytitle = $row->entrytitle;
      }
      
      if(strlen($entrytitle) > 0)
      {
        return $entrytitle;
      }
      else
      {
        return "No Title";
      }
      
    }
}




 /**
  *  @Description: get the content
  *       @Params: params
  *
  *     @returns: returns
  */

if ( ! function_exists('my_field_content'))
{
    function my_field_content($entryid,$fieldname)
    {

         //use ci active record
      $CI =& get_instance();
      $CI->db->select($fieldname);
      $CI->db->from('content');
      $CI->db->where('entryid', $entryid);

      $CI->db->limit(1);

      $query = $CI->db->get();

      $content = "";
      foreach ($query->result() as $row) 
      {
        $content = $row->$fieldname;
      }
      return $content;
    }
}


if ( ! function_exists('my_section_name'))
{
    function my_section_name($sectionid)
    {

         //use ci active record
      $CI =& get_instance();
      $CI->db->select('name');
      $CI->db->from('section');
      $CI->db->where('id', $sectionid);

      $CI->db->limit(1);

      $query = $CI->db->get();

      $name = "";
      foreach ($query->result() as $row) 
      {
        $name = $row->name;
      }
      return $name;
    }
}


 /**
  *  @Description: get the checkbox field content
  *       @Params: fieldname, entryid
  *
  *     @returns: array
  */

if ( ! function_exists('my_checkbox'))
{
    function my_checkbox($fieldname,$entryid)
    {

         //use ci active record
      $CI =& get_instance();
      $CI->db->select($fieldname);
      $CI->db->from('content');
      $CI->db->where('entryid', $entryid);

      $CI->db->limit(1);

      $query = $CI->db->get();

      $content = "";
      foreach ($query->result() as $row) 
      {
        $content = $row->$fieldname;
      }
      $arr = explode(",", $content);
      return $arr;

    }
}


 /**
  *  @Description: checks to see if value is in array
  *       @Params: var, arr
  *
  *     @returns: true or false
  */

if ( ! function_exists('my_is_in'))
{
    function my_is_in($var,$arr)
    {
        $pass = 0;
        foreach ($arr as $key) 
        {
          if($var === $key)
          {
            $pass = 1;
          }
        }
        return $pass;
    }
}


 /**
  *  @Description: return the file url
  *       @Params: assetfieldid as comma delimited string
  *
  *     @returns: array of urls
  */
if ( ! function_exists('my_get_img_url'))
{
    function my_get_img_url($assetfieldid)
    {
        
        if(($assetfieldid === NULL)  or (strlen($assetfieldid) == 0))
        {

        }
        else
        {
            $arr = array();
            $ids = explode(",", $assetfieldid);
            $counter = 0;



            foreach ($ids as $key) 
            {
              
              $CI =& get_instance();
              $CI->db->select('*');
              $CI->db->from('assetfields');
              $CI->db->where('id', $key);
              $CI->db->limit(1);

              $query = $CI->db->get();

              $url = "";


              foreach ($query->result() as $row) 
              {
                $url = $row->thumb;
              }
              
              $b = array('url' => $url, 'id' => $key);

              $arr[$counter] = $b;
              $counter++;

            }
            return $arr;

        }
    }

}


 /**
  *  @Description: this checks if field is already used in section
  *       @Params: fieldid, sectionid
  *
  *     @returns: True or False
  */

if ( ! function_exists('my_field_used'))
{
    function my_field_used($fieldid,$sectionid)
    {
      $CI =& get_instance();
      $CI->db->select('fieldid');
      $CI->db->from('section_layout');
      $CI->db->where('fieldid', $fieldid);
      $CI->db->where('sectionid', $sectionid);
      $CI->db->limit(1);

      $query = $CI->db->get();
      
      if($query->num_rows() > 0)
      {
        return 1;
      }
      else
      {
        return 0;
      }

    }
}


if ( ! function_exists('my_field_show'))
{
    function my_field_show($fieldid,$entryid,$errors)
    {
       //use ci active record
      $CI =& get_instance();
      $CI->db->select('*');
      $CI->db->from('fields');
      $CI->db->where('id', $fieldid);
      $CI->db->limit(1);

      $query = $CI->db->get();
      $name = "";
      foreach ($query->result() as $row) 
      {
        if($row->type == "plain-text")
        {
          $content = my_html_escape(my_field_content($entryid,$row->name));

          echo "
          <div class='form-group'>
              <label>$row->name</label>
              <div class='igs-small'>$row->instructions</div>
              <input name='$row->name' 
              type='text'  
              class='form-control' 
              placeholder='Type here' 
              data-toggle='tooltip' 
              data-placement='top' 
              title='' 
              value='$content'>
          </div>";

          echo "<div class='errors'>$errors</div>";

        }

        if($row->type == "number")
        {
          $content = my_field_content($entryid,$row->name);
          echo "
          <div class='form-group'>
              <label>$row->name</label>
              <div class='igs-small'>$row->instructions</div>
              <input name='$row->name' 
              type='text'  
              class='form-control' 
              placeholder='Type here' 
              data-toggle='tooltip' 
              data-placement='top' 
              title='' value='$content'>
          </div>";

          echo "<div class='errors'>$errors</div>";

        }

        if($row->type == "drop-down")
        {
          $content = my_field_content($entryid,$row->name);

          $arr = explode(",", $row->opts);
          echo "
             <div class='form-group'>
                  <label>$row->name</label>
                  <div class='igs-small'>$row->instructions</div>
                     <select name='$row->name' class='form-control m-b'>";

                     foreach ($arr as $key) 
                     {
                        if($key === $content)
                        {
                          echo "<option value='$key' selected>$key</option>";
                        }
                        else
                        {
                          echo "<option value='$key'>$key</option>";
                        }
                     }
              echo " 
                  </select>
              </div>";
              echo "<div class='errors'>$errors</div>";
        }

        if($row->type == "check-box")
        {
          //get the actual content
          $t2 = my_checkbox($row->name,$entryid);
        

          $arr = explode(",", $row->opts);
          echo "
             <div class='form-group'>
                <label>$row->name</label>
                <div class='igs-small'>$row->instructions</div>
                  <input type='text' 
                    name='chk-$row->name' 
                    id='' value='' 
                    style='display:none;'/>";

                   foreach ($arr as $key) 
                   {
                     if(my_is_in($key,$t2))
                     {
                        echo "
                         <label>
                          <input type='checkbox' name='chk-$row->name[]' value='$key' checked> 
                        </label> $key<br/>";
                     }
                     else
                     {
                        echo "
                         <label>
                          <input type='checkbox' name='chk-$row->name[]' value='$key' > 
                        </label> $key<br/>";
                     }
                   }
              echo "</div>";
        }

        if($row->type == "multi-line")
        {
            $content = my_field_content($entryid,$row->name);
          echo "
          <div class='form-group'>
              <label>$row->name</label>
              <div class='igs-small'>$row->instructions</div>
               
                   <textarea name='$row->name'   class='form-control' rows='5'  placeholder='Type here' data-toggle='tooltip' data-placement='top'>$content</textarea>

          </div>";

          echo "<div class='errors'>$errors</div>";
        }

        if($row->type == "rich-text")
        {
            $content = my_field_content($entryid,$row->name);

            echo "
            <input type='text' 
              name='$row->name' 
              id='$row->name' 
              value='' 
              style='display:none;' />
            <div class='form-group'>
                <label>$row->name</label>   
                  <a href='#' class='t-edit' uid='$row->name'>Edit</a>
                  <div class='igs-small'>$row->instructions</div>
                  <div id='tmp-$row->name' 
                    class='rich' 
                    uid='$row->name'>
                    $content
                  </div>
            </div>";
            echo "<div class='errors'>$errors</div>";
        }

        if($row->type == "color")
        {
          $content = my_field_content($entryid,$row->name);
          echo "
          <div class='form-group'>
             <label>$row->name</label>
             <div class='igs-small'>$row->instructions</div>
             <input class='color' 
              name='$row->name' 
              type='text' 
              data-required='true'  
              class='form-control' 
              placeholder='#' 
              data-toggle='tooltip' 
              data-placement='top' 
              title='' 
              value='$content'>
          </div>";
          echo "<div class='errors'>$errors</div>";

        }

        if($row->type == "date")
        {
          $content = my_field_content($entryid,$row->name);
          echo "
          <div class='form-group'>

          <label>$row->name</label>
          <div class='igs-small'>$row->instructions</div>
              <input name='$row->name'  
              class='input-sm input-s datepicker-input form-control' 
              size='16' 
              type='text' 
              value='$content' 
              data-toggle='tooltip' 
              data-placement='right' 
              title='' 
              data-date-format='yyyy-mm-dd' 
              name='name' 
              data-original-title=''  
              readonly>
          </div>";
          echo "<div class='errors'>$errors</div>";
        }

        if($row->type =="file-upload")
        {
          
          //testing
           $content = my_field_content($entryid,$row->name);
          $ee = my_get_img_url($content);



          echo "
          <div class='clear'></div>
          <div class='form-group'>
            <label>$row->name</label>
                  <div class='igs-small'>$row->instructions</div>
                 ";

                  foreach ($ee as $key) 
                  {
                     $url = $key['url'];
                     $id = $key['id'];
                     $link = site_url("admin/entries/remove_asset/$id");

                      echo "<img class='img-responsive pull-left' 
                      src='$url' alt='image'  
                      style='border-radius:10px; margin-left:10px;' />
                        <a href='$link'>
                          <div class='btn btn-sm 
                            btn-danger btn-rounded 
                            pull-left remo' 
                            style='margin-left:10px;' uid='$id'>
                            <i class='fa fa-minus'></i>
                          </div>
                        </a>";
                    }
                 
                  echo "<div  class='btn btn-purplet btn-s-xs add-asset'  
                      uid='$row->name' style='margin-left:10px; margin-top:0px;'>
                      <strong>Add asset</strong>
                        <i class='fa fa-plus pull-left'></i>
                      </div>    
                  </div> 
                  <div class='clearfix'></div>
              <div class='errors'>$errors</div>";

        }

        if($row->type =="switch")
        {
          $content = my_field_content($entryid,$row->name);
          $checked = "";

          if($content == '1')
          {
            $checked = "checked";
          }

          echo "
          <div class='form-group'>
          <label>$row->name</label>
                  <div class='igs-small'>$row->instructions</div>
            <label class='switch'>
              <input type='hidden' value='0' name='$row->name'>
              <input type='checkbox' value='1' name='$row->name' $checked>
              <span></span>
            </label>
          </div>";
          echo "<div class='errors'>$errors</div>";
        }
      }
  }
}


        