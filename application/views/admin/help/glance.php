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
  		        
  		        <div class="panel-body" style="padding:30px; font-size:15px; line-height:24px;">
  		        	<h3 class="purplet">In a glance</h3>
  		        	At the heart of the ignited CMS engine are three core concepts. Fields, sections and entries. Think
  		        	of Fields as being the input values in your backend, such as text fields, file uploads etc. Sections
  		        	are where you organise the layout and choose if they are singles such as the home page, or multiples
  		        	such as news items in a blog or products in a shop. Entries, is where you actually input your data.

  		        	<br/><br/> Really that's all there is to it. 
  		        	

  		        </div>
  		    </section>
  		</div>
  		
  </div>
</div>
<div class="gap"></div>