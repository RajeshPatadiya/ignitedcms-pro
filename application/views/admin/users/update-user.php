<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px;  min-height:800px; ">
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
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo('Dashboard'); ?></a></li>
            <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Update User');?></a></li>
            
          </ul>
                
          </div>
      </div> 
      <!-- end breadcrumb -->

      <div class="row" style="margin-left:30px; margin-right:30px;">
      	<div class="col-sm-12">
      	    <header class="panel-heading font-bold">Update User settings</header>
      	    <section class="panel">
      	        <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart("admin/users/update_user/$userid",$atts); ?>
      	        
      	        <div class="panel-body">
      	        	
                  <?php foreach ($query->result() as $row): ?>
                    
                  

      	        	<div class="form-group">
      	        	    <label>Role</label> 
                      <div class="errors pull-left">*</div>
      	        	    <div class=" btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="right" data-content="Assign the user privileges. What they have <strong>access</strong> to in their dashboard." title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i> <strong></strong> 
      	        	                    </div>

	      	        	<select name="roles" class="form-control m-b" style="margin-top:10px;">

	                          <option value="0">Please select</option>
	                          
	                          <?php foreach ($query2->result() as $row): ?>
	                          	<option value="<?php echo $row->groupID; ?>"> <?php echo $row->groupName; ?></option>
	                          	
	                          <?php endforeach ?>
	                          
	                     </select>
	                 </div>
                   <?php endforeach ?>
	                 			

      	        	<label>
      	        		<input type="checkbox" name="" value="" />
      	        	</label> Require password reset on first login?
      	        	<br/>

      	        	<button type="submit" class="pull-right btn btn-purplet btn-s-xs " ><strong>Update</strong></button>
      	        	
      	        	<?php echo form_close(); ?>


      	        </div>
      	    </section>
      	</div>
      	
      </div>

      <div class="row" style="margin-left:30px; margin-right:30px;">
           
          <div class="col-sm-6">

          </div>

           <div class="col-sm-6">
               <header class="panel-heading font-bold">User Details
                 <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Any information with this user" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> 
                     </div>
               </header>
               <section class="panel">
                   
                   <div class="panel-body">

                     <h3 class="purplet">Internal User Details</h3>

                      <div class="form-group">
                          <label>Department</label>
                          <div class="igs-small"></div>
                          <input name="name" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="Purchasing">
                      </div>

                      <div class="form-group">
                          <label>Full Name</label>
                          <div class="igs-small"></div>
                          <input name="name" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="">
                      </div>

                      <div class="form-group">
                          <label>Email</label>
                          <div class="igs-small"></div>
                          <input name="name" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="">
                      </div>

                      <div class="form-group">
                          <label>Permissions</label>
                          <div class="igs-small">What Icons the user has access to on the system</div>
                          <input name="name" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="Manager">
                      </div>

                      <button type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
                            <i class="fa fa-check"></i> <strong>save</strong>
                      </button>
                      
                      


                   </div>
               </section>
           </div>
           
      </div>



</div>

<div class="gap"></div>