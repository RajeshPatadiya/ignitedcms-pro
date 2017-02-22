<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;   ">

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
	          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('New Section');?></a></li>
	          
	        </ul>
	              
	        </div>
	    </div> 
	    <!-- end breadcrumb -->

	    <div class="row" style="margin-left:30px; margin-right:30px;">
	      <div class="col-sm-12">
	          <header class="panel-heading font-bold">New Section</header>

	          <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/sections/save_section/1',$atts); ?>
	          
	          <section class="panel">
	              
	              <div class="panel-body">
	              	<div class="form-group">
			          <label>Handle</label>
			          <div class="errors pull-left">*</div>
			           <div class="igs-small">The name of the section</div>
			          <input name="name" type="text"   class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="" value="<?php echo set_value('name'); ?>">

			          <div class='errors'><?php echo form_error('name'); ?></div>
			      </div>

					<div class="form-group">
    	        	    <label>Section Type</label>
    	        	    <div class="errors pull-left">*</div>
	      	        	<select name="sectiontype" class="form-control m-b">
	                          
	                          <option>Single</option>
	                          <option>Multiple</option>
	                          <option>Global</option>
	                        
	                     </select>
	                 </div>

			      <div class="form-group">
			          <label>Field Types</label>
			          <div class="errors pull-left">*</div>

			          <div class='errors'><?php echo form_error('dummy'); ?></div>
			           <div class="igs-small">Reorganise and remove the field types for this section</div>
			           <div class="small-gap"></div>

			           <input type="text" name="dummy" id="dummy" value="" style="display:none;" />

			           <ul id="sortable1" class="connectedSortable"> 

			           	 <?php foreach ($query->result() as $row): ?>

			           	 <?php $required = 0;
			           	 			  $class = "";
			           	 		  if($row->required == "1")
			           	 		  {
			           	 		  	$required = 1;
			           	 		  	$class = " required";
			           	 		  }

			           	 		 ?>

		                  <li class="ui-state-default <?php echo $class; ?>" uid="<?php echo $row->id; ?>" rid="<?php echo $required; ?>" id="<?php echo $row->id; ?>">
		                  	<?php echo $row->name; ?>
		                  
		                    <div class="fa fa-gear pull-right" 
		                      data-toggle="popover" data-html="true" 
		                      data-placement="top" 
		                      data-content='<div class="ot" xid="<?php echo $row->id; ?>">Yes</div><div class="not" xid="<?php echo $row->id; ?>">No</div>' 
		                      title="" 
		                      data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Make required'>   
		                    </div>
		                  </li>
		                  <?php endforeach ?>
                  
                		</ul>

                		<ul id="sortable2" class="connectedSortable"> 
		                 
                  
                		</ul>

			          	

			      </div>

			      <div class="clearfix"></div>
			      <div class="small-gap"></div>

			      <div class="form-group">
			          <button type="submit" class="btn btn-purplet btn-s-xs " id="bob" ><strong>Save</strong></button>
			          
			      </div>
			      <?php echo form_close(); ?>
	              </div>
	          </section>
	      </div>

	      
	      
	    </div>



</div>