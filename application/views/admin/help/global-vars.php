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
  		        	<h3 class="purplet">Global Variables</h3>
                    IgnitedCMS comes with a few global variables which you will find useful. You can access this on any page in your templates. They are: <br/> <br/>
 <pre><?php echo trim(my_html_escape('
<?= $base_url ?>
')); ?>
</pre> Returns the site's base url, useful when including your own css and js files in a separate directory. <br/><br/>

<pre><?php echo trim(my_html_escape('
<?= session_id ?>
')); ?>
</pre>  Returns the session id useful when you want to use sessions for example, in an online shop.<br/><br/>

<pre><?php echo trim(my_html_escape('
<?= site_name ?>
')); ?> </pre> Returns the site name.<br/><br/>

<pre><?php echo trim(my_html_escape('
<?= menu ?>
')); ?> </pre> Echos the menu as an unordered list.


      

                    

                    

  		        </div>
  		    </section>
  		</div>
  		
  </div>
</div>
<div class="gap"></div>