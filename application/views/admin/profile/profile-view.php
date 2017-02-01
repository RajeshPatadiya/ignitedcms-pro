<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px; ">
	
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
		          <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo "Dashboard"; ?></a></li>
		          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('My Profile');?></a></li>
		          
		        </ul>
		              
		        </div>
		    </div> 
		    <!-- end breadcrumb -->

		    <div class="row" style="margin-left:30px; margin-right:30px;">
		    	<div class="col-sm-12">
		    		<?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/profile/save_profile',$atts); ?>
		    		
				    <header class="panel-heading"> <div class="inline font-bold">Profile</div>
				    	<div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="bottom" data-content="Fill in your profile details here." title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i> <strong></strong> 
				    	                </div>

				    </header>
				    <section class="panel">
				        
				        <?php foreach ($query->result() as $row) { ?>
				        	
				       
				        <div class="panel-body">
				        	<div class="form-group">
				        	    <label>Full Name</label>
				        	    <div class="igs-small">Please enter your full name here</div>
				        	    <input name="fullname" type="text"   class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="<?php echo $row->fullname; ?>">
				        	</div>
				        	<div class="form-group">
				        	    <label>Email</label>
				        	    <div class="igs-small">Enter a valid email address that you currently have access to</div>
				        	    <input name="email" type="text"    class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="<?php echo $row->email; ?>" readonly>
				        	</div>
				        	<div class='errors'><?php echo form_error('email'); ?></div>

				        	<div class="form-group">
				        	    <label>Change Password? </label> <div class="igs-small">(Leave blank if you don't wish to change)</div>
				        	    <input name="password" type="password"  data-maxlength="200" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="">
				        	</div>
				        	<div class='errors'><?php echo $this->session->flashdata('msg2'); ?></div>
				        	<button type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
				        		    <i class="fa fa-check"></i> <strong>Update</strong>
				        	</button>
				        	
				        	

				        	<?php } ?>
				        	
				        	<?php echo form_close(); ?>

				        </div>
				    </section>
				</div>
		    </div>

		    <div class="row" style="margin-left:30px; margin-right:30px;">
		        <div class="col-sm-12">
		            <header class="panel-heading font-bold">Contact Details
		            	<div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Contact details this information is mainly used by Dealers" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> 
		               	 </div>
		            </header>
		            <section class="panel">
		                
		                <div class="panel-body">

		                	<div class="form-group">
		                	    <label>Tel Number</label>
		                	    <div class="igs-small">Daytime Telephone number</div>
		                	    <input name="name" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="">
		                	</div>

		                	<div class="form-group">
		                	    <label>Mobile</label>
		                	    <div class="igs-small">Mobile Number</div>
		                	    <input name="name" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="">
		                	</div>

		                	<div class="form-group">
		                	    <label>Delivery Address</label>
		                	    <div class="igs-small">The address we will send the Dealer merchandise to</div>
		                	    <textarea name="name"  id="inp-box" class="form-control" rows="5"  placeholder="Type here" data-toggle="tooltip" data-placement="top">245 Station Road 
Wythall 
United Kingdom 
B47 6ET</textarea>
		                	
		                	</div>

		                	<button type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
		                		    <i class="fa fa-check"></i> <strong>Save</strong>
		                	</button>
		                	
		                	
		                	
		                	



		                </div>
		            </section>
		        </div>
		        
		    </div>
		
		
	
</div>

<div class="gap"></div>