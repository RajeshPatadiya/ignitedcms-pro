<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:800px; ">
	
	<!-- breadcrumb -->
	   <div class="row" style="margin-left:30px; margin-right:30px;">
	      <div class="col-sm-12">
	        <!-- .breadcrumb -->
	        <ul class="breadcrumb">
	          <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo "Dashboard"; ?></a></li>
	          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Add Category');?></a></li>
	          
	        </ul>
	              
	        </div>
	    </div> 
	    <!-- end breadcrumb -->
	<div class="row" style="margin-left:30px; margin-right:30px;">
		<div class="col-sm-12">
		    <header class="panel-heading font-bold">Add a Category</header>
		    <section class="panel">
		        
		        <div class="panel-body">
		        	<?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/categories/add_cat',$atts); ?>
		        	
		        	<div class="form-group">
		        	    <label>Category Name</label>
		        	    <input name="cat_name" type="text" data-required="true" data-maxlength="20" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Page name" value="">
		        	</div>
		        	<button type="submit" class="btn btn-purplet btn-s-xs " id=""><strong>Save</strong></button>
		        	

		        	<?php echo form_close(); ?>
		        </div>
		    </section>
		</div>
		
	</div>


</div>