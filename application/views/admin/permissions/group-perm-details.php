<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:800px; ">
	
	<!-- flash data -->
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
	   <div class="row" style="margin-left:30px; margin-right:30px;">
	      <div class="col-sm-12">
	        <!-- .breadcrumb -->
	        <ul class="breadcrumb">
	          <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo ('Dashboard'); ?></a></li>
	          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Set Permissions to Group');?></a></li>
	          
	        </ul>
	              
	        </div>
	    </div> 
	    <!-- end breadcrumb -->

	    <div class="row" style="margin-left:30px; margin-right:30px;">
	    	<div class="col-sm-12">
	    	    <header class="panel-heading font-bold">Set the Permissions to your group</header>
	    	    <section class="panel">
	    	        
	    	        <div class="panel-body">
	    	        	<?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/permissions/save_permission_group',$atts); ?>
	    	        	
	    	        	<div class="form-group">
	    	        	    <label>Group Name</label>
	    	        	    <div class="errors pull-left">*</div>
	    	        	    <input name="groupName" type="text"   class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="<?php echo set_value('groupName'); ?>">
	    	        	    <div class="errors"> <?php echo form_error('groupName'); ?>  </div>
	    	        	</div>

	    	        	<div class="line"></div>


	    	        	<label>Permissions </label> 
	    	        	<div class="igs-small">Pick what things they will see in their dashboard</div>

	    	        	<br/>

	    	        	<!-- dump the permissions table -->
	    	        	<?php foreach ($query->result() as $row): ?>

	    	        		<label><input type="checkbox" name=" <?php echo $row->permissionID; ?>" value="" /></label>
	    	        		
	    	        	 	<?php echo humanize($row->permission);
	    	        	 		  echo br();
	    	        	 	 ?>



	    	        	<?php endforeach ?>

	    	        	<button type="submit" class="pull-right btn btn-purplet btn-s-xs " ><strong>Save</strong></button>
	    	        	<?php echo form_close(); ?>
	    	        </div>
	    	    </section>
	    	</div>
	    	
	    </div>



</div>