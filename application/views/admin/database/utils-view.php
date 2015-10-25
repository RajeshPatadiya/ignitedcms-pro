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
 	    <div class="row" style="margin-left:30px; margin-right:30px;">
 	       <div class="col-sm-12">
 	         <!-- .breadcrumb -->
 	         <ul class="breadcrumb">
 	           <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo ('Dashboard'); ?></a></li>
 	           <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Database Utilities');?></a></li>
 	           
 	         </ul>
 	               
 	         </div>
 	     </div> 
 	     <!-- end breadcrumb -->

 	     <div class="row" style="margin-left:30px; margin-right:30px;">
 	       <div class="col-sm-12">
 	           <header class="panel-heading font-bold">Backup</header>
 	           <section class="panel">
 	               
 	               <div class="panel-body">
 	               	<?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/database/backup',$atts); ?>
 	               	
 	               	<button type="submit" class="pull-right btn btn-purplet btn-s-xs " ><strong>Backup Database</strong></button>
 	               	
 	               	<?php echo form_close(); ?>

 	               </div>
 	           </section>
 	       </div>
 	       
 	     </div>

</div>