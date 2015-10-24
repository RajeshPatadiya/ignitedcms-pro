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
	          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Email Settings');?></a></li>
	          
	        </ul>
	              
	        </div>
	    </div> 
	    <!-- end breadcrumb -->

	    <!-- add email test options -->
	<div class="row" style="margin-left:30px; margin-right:30px;">
		<div class="col-sm-12"> 
		    <header class="panel-heading ">
                <div class="inline font-bold">Email Settings</div>
                <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="bottom" data-content="Supported Email protocols are <strong>smtp</strong>, find out your smtp settings from your email provider, example uses google mail." title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i> <strong></strong> 
                </div>
            </header>
		    <section class="panel">
		        <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/email/save_email_settings',$atts); ?>
		        
		        <?php foreach($query2->result() as $row): ?>
		        <div class="panel-body">

		        	<div class="form-group">
	        		    <label>System Email Address</label>
	        		    <div class="igs-small">The email address IgnitedCMS will use when sending email</div>
	        		    <input name="smtp_user" type="text" data-type="email" data-required="true" data-maxlength="100" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="" value="<?php echo $row->smtp_user; ?>">
		        	</div>

					<div class="form-group">
      	        	    <label>Protocol Currently using <?php echo $row->protocol; ?></label>
      	        	    <div class="igs-small">The Email Protocol used</div>
	      	        	<select name="roles" class="form-control m-b" id="roles">
	                         
	                          
	                          <option value="phpmail">PHP Mail</option>
	                          <option value="smtp">SMTP</option>
	                          
	                     </select>
	                 </div>

	                 <div class="pm-protocols" style="display:none;">
			        	<div class="form-group" style="display:none;">
			        	    <label>Protocol </label>
			        	    <input name="protocol" id="proto" type="text"  data-maxlength="20" class="form-control" placeholder="smtp" data-toggle="tooltip" data-placement="top" title="Protocol" >
			        	</div>
			        	<div class="form-group">
			        	    <label>Smtp Host</label>
			        	    <input name="smtp_host" type="text"  data-maxlength="200" class="form-control" placeholder="ssl://smtp.googlemail.com" data-toggle="tooltip" data-placement="top" title="smtp host" value="<?php echo $row->smtp_host; ?>">
			        	</div>
			        	<div class="form-group">
			        	    <label>Smtp Port</label>
			        	    <input name="smtp_port" type="text"  data-maxlength="20" class="form-control" placeholder="465" data-toggle="tooltip" data-placement="top" title="port" value="<?php echo $row->smtp_port; ?>">
			        	</div>
			        	
			        	<div class="form-group">
			        	    <label>Password</label>
			        	    <input name="smtp_pass" type="text"  data-maxlength="100" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Password" value="">
			        	</div>
		        	</div>

		        	<button type="submit" class="btn btn-purplet btn-s-xs " id=""><strong>Save</strong></button>
		        	
		        	<?php echo form_close(); ?>

		        	<a href=" <?php echo site_url('admin/email/test_email'); ?>">
		        		<div  class="btn btn-white btn-s-xs " ><strong>Test</strong></div>
		        	</a>
		        	
		        <?php endforeach; ?>

		        </div>
		    </section>
		</div>
	</div>
	<div class="gap"></div>
</div>