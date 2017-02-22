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
  		        	<h3 class="purplet">Installing</h3>
                We figure if you're reading this you've already installed. But here are a few tips for
                installation. <br/><br/>

                IgnitedCMS Pro is a one click install, with little or no configuration your end. And we pride ourselves
                on our installer. No need for composer or any other dependencies. It really is a thing of beauty. <br/><br/>

                There are a few steps. <br/><br/>
                <ul class="">
                  <li>Download the latest version from github</li>
                  <li>Extract the file and <strong>rename to ignitedcms-pro</strong> </li>
                  <li>Put this folder in your localhost environment</li>
                  <li>Point your web browser to http://localhost/ignitedcms-pro</li>
                  <li>And simply enter in your database credentials</li>
                </ul>

                <br/>
                <strong>Windows Users (God help you ;-)</strong> <br/><br/>
                Windows users, using xamp should be good to go. <br/><br/>

                <strong>Mac Users</strong> <br/><br/>
                Mac users same as Windows users. You shouldn't need to worry about the port being 8888. <br/>  <br/>
              <strong>Linux Users</strong> <br/><br/>
              First you need to give the full folder 777 permissions. This can be done by going into the terminal and typing: <br/><br/>
              <pre><?php echo trim(my_html_escape('
chmod 777 -R ignitedcms-pro
')); ?>
</pre> <br/> Then continue the install as normal. (Obviously on a production environment you will want to make sure the folder isn't given full 777 permissions. But we'll leave that to you.)
  		        </div>
  		    </section>
  		</div>
  		
  </div>
</div>
<div class="gap"></div>