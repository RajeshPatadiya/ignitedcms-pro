<?php 

   /**
    *  @Description: The default view template for pages, products and users
    *       @Params: 
    *
    *  	 @returns: 
    */

 ?>

 <div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px;  min-height:800px; ">

 	 <div class="row" style="margin-left:30px; margin-right:30px;">
 	    <div class="col-sm-12">
 	        <?php if($this->session->flashdata('msg')) {?>
 	                    
 	            <?php if($this->session->flashdata('type') =='0') { ?>
 	        
 	            <div class="alert alert-danger">
 	        
 	            <?php } else {?>
 	            <div class="alert alert-success">
 	                <?php } ?>
 	                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
 	                </button> <i class="fa fa-ban-circle"></i>
 	                <?php echo $this->session->flashdata('msg');?>
 	            </div>
 	        <?php } ?>
 	    </div>
 	    
 	 </div>

 	 <!-- breadcrumb -->
 	 <!-- breadcrumb -->
 	    <div class="row" style="margin-left:30px; margin-right:30px;">
 	       <div class="col-sm-12">
 	         <!-- .breadcrumb -->
 	         <ul class="breadcrumb">
 	           <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo ('Dashboard'); ?></a></li>
 	           <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Field Builder');?></a></li>
 	           
 	         </ul>
 	               
 	         </div>
 	     </div> 
 	     <!-- end breadcrumb -->



	 <div class="row" style="margin-left:30px; margin-right:30px;">
	   <div class="col-sm-12">
	       <header class="panel-heading"><div class="inline font-bold">Fields</div>
          <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="bottom" data-content='Add and edit Custom Field types here! <br/><?php echo anchor('admin/help/fields', 'Help', 'attributs'); ?>' title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i> <strong></strong> 
                          </div>

         </header>
	       <section class="panel">
	           
	           <div class="panel-body">

	           	<div class="row">
                        <div class="col-sm-10">
                            
                          
                        </div>
                        <div class="col-sm-2">
                            <a href="<?php echo site_url("admin/field_builder/add_new"); ?>">
                                <button  type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
                                <i class="fa fa-plus"></i> <strong>Add Field</strong></button>
                            </a>
                        </div>
                    </div>

                    <div class="line"></div>



	           	<!-- search and sort -->
              <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/field_builder/search_posts_or_delete',$atts); ?>
	           	<div class="row" >
	           		<div class="col-sm-2">
  	           		<div class="btn  btn-white" data-toggle="popover" data-html="true" data-placement="top" data-content='
                     Are you sure? You can not can not get this back if you click yes ;)<br/><br/>
                     
                    <button type="submit" class="btn btn-purplet btn-block" name="sbm" value="delete" ><strong>Yes</strong></button>
                    

                    ' title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Warning!!!'>  
                      <strong>Delete Selected</strong> 
                    </div>
	           		
		           	</div>
		           	
		           	<div class="col-sm-8">
		           		<div class="input-group">
		           		  
		           		  		
	                      <input type="text" name="search_term" class="input-sm form-control" placeholder="Search">
	                      <span class="input-group-btn">
	                        <button class="btn btn-sm btn-white" type="submit" name="sbm" value="search"> <i class="fa fa-search"> </i></button>
	                      </span>
	                      
                    	</div>
		           	</div>
		           	
		           	<div class="col-sm-2">
		           		<div class="input-group-btn">
                            <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sort-amount-desc"> </i> <strong>Sort by</strong><span class="caret"></span></button>
                            <ul class="dropdown-menu pull-right">
                              <li><a href="#">Title</a></li>
                              <li><a href="#">Type</a></li>
                              <li><a href="#">Date Created</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Ascending</a></li>
                              <li><a href="#">Descending</a></li>
                            </ul>
                          </div>
		           	</div>
	           	
	           	</div>
	           	


	           	<div class="table-responsive" style="margin-top:20px;">
                  <table class="table table-striped b-t text-sm">
                    <thead>

                      <tr>
                        <th width="20" ><input type="checkbox"></th>
                        <th class="text-muted">Title</th>
                        <th width="500" class="text-muted">Type</th>
                        <th class="text-muted">Date Posted</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($query->result() as $row): ?>
                    		<?php $id = $row->id; ?>
                    		<tr>
		                        <td><input type="checkbox" name="chosen[]" value="<?php echo $id; ?>"></td>
		                        <td>
		                        	<a href="<?php echo site_url("admin/field_builder/update_field_view/$id"); ?>"><?php echo $row->name; ?></a>
		                        </td>
		                        <td> <?php echo $row->type; ?></td>
		                        <td><?php //echo my_pretty_date($row->blog_date); ?></td>
                      		</tr>
                    	<?php endforeach ?>

                     
                    </tbody>
                  </table>
                </div>
                <?php echo form_close(); ?>
	           </div>
	       </section>
	   </div>
	   
	 </div>
 	







 </div>