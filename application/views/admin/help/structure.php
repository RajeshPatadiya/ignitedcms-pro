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
  		        	<h3 class="purplet">Folder Structure</h3>
                At first glance the sheer number of files and folder can seem daunting, but don't
                worry, there are only two real places you will be spending most of your time inside.
                The template directory which is under: <br/><br/>
                <pre><?php echo trim(my_html_escape('
application > views > custom
')); ?>
</pre> 
                and possibly the custom controller directory which is under: <br/><br>
                <pre><?php echo trim(my_html_escape('
application > controllers > custom
')); ?>
</pre>  
          <br/>This is where you might write your own custom controllers to communicate with a new table in the database.
          
  		        	<br/><br/>
                The place where all your uploads are stored is contained within the folder: <br/><br/>
                <pre><?php echo trim(my_html_escape('
assets > uploads
')); ?>
</pre>  <br/>You shouln't need to touch any other files, as the ignitedCMS engine does everything else :D

  		        </div>
  		    </section>
  		</div>
  		
  </div>
</div>
<div class="gap"></div>