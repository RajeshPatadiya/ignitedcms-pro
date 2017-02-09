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
  		        	<h3 class="purplet">Fields</h3>
                Fields are a pretty simple concept. These are your inputs in the backend. <br/><br/>

                IgnitedCMS Pro ships with a large variety of fields types which includes: <br/><br/>
                <ul >
                  <li>Plain text</li>
                  <li>Rich text</li>
                  <li>Date</li>
                  <li>Number</li>
                  <li>File upload</li>
                  <li>Drop Downs</li>
                  <li>Check boxes</li>
                  <li>Switches</li>
                </ul>

                They are pretty easy to use, just make sure each field handle is unique and simply select
                what options you want to make available to your end user. For example, on the file upload
                field you can restrict what files the user can upload. <br/><br/>

                <strong>Plain text</strong> <br/> 
                  <pre><?php echo trim(my_html_escape('
<?= $fieldHandle ?>
')); ?>
</pre> 
                  <br/><strong>Rich text</strong> <br/> 
                  <pre><?php echo trim(my_html_escape('
<?= $fieldHandle ?>
')); ?>
</pre> 
                  <br/><strong>Date</strong> <br/> 
                  <pre><?php echo trim(my_html_escape('
<?= $fieldHandle ?>
')); ?>
</pre> 
                  <br/><strong>Number</strong> <br/> 
                  <pre><?php echo trim(my_html_escape('
<?= $fieldHandle ?>
')); ?>
</pre> 
                  <br/><strong>File Upload (E.g images)</strong> <br/> 
                  <pre><?php echo trim(my_html_escape('
<?= $fieldHandle ?>
')); ?>
</pre> 
                  <br/><strong>Drop Downs</strong> <br/> 
                  <pre><?php echo trim(my_html_escape('
<?= $fieldHandle ?>
')); ?>
</pre> 

  		        </div>
  		    </section>
  		</div>
  		
  </div>
</div>
<div class="gap"></div>