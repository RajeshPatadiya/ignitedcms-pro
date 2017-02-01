<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;   ">
  <div class="row" style="margin-left:40px; margin-right:40px;">
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

	<!-- breadcrumb -->
	   <div class="row" style="margin-left:30px; margin-right:30px;">
	      <div class="col-sm-12">
	        <!-- .breadcrumb -->
	        <ul class="breadcrumb">
	          <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo "Dashboard"; ?></a></li>
	          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Help');?></a></li>
	          
	        </ul>
	              
	        </div>
	    </div> 
	    <!-- end breadcrumb -->

  <div class="row" style="margin-left:30px; margin-right:30px;">
  		<div class="col-sm-4">
  		    
  		    <section class="panel">
  		        
  		        <div class="panel-body">
  		        	<h3 class="">Documentation</h3>
  		        	<?php $this->load->view('admin/help/menu'); ?>
  		        </div>
  		    </section>
  		</div>
  		<div class="col-sm-8">
  		    
  		    <section class="panel">
  		        
  		        <div class="panel-body" style="padding:30px; ">
  		        	<h3 class="purplet text-bold">What Ignitedcrud Builder?</h3>
  		        	An automated crud builder for codeigniter <br/> <br/>

  		        	 	
  		        	

  		        </div>
  		    </section>
  		</div>
  		
  </div>
</div>
<div class="gap"></div>