<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:800px; ">
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
	          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Asset Management');?></a></li>
	          
	        </ul>
	              
	        </div>
	    </div> 
	    <!-- end breadcrumb -->
	


    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <header class="panel-heading ">
                <div class="inline font-bold">Asset Managment</div>
                <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="bottom" data-content="Here you can upload your images and then add them to your pages. You can <strong>only</strong> add images for the time being." title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i> <strong></strong> 
                </div>
            </header>
            <section class="panel">
                <div class="panel-body"> 
                	<div class="gallery" style="position:relative;">

                		

                		<div class="table-responsive">
		                  <table class="table b-t text-sm">
		                    <thead>
		                      <tr>
		                        
		                      </tr>
		                    </thead>
		                    <tbody>
		                      
		                      	<?php 
		                      		 $count = -1; 
			                       	 foreach ($query->result() as $row): 
			                       	 $count = $count + 1; 
			                       	 if($count % 6 == 0) {
			                     ?>
				                 </tr>
				                 <tr>
		                       	<?php } ?>

		                      
		                        	<td style="vertical-align:middle; position:relative; background-color:#f3f3f3;"> <img class="img-responsive" src="<?php echo base_url("img/uploads/$row->name"); ?>" alt="image" />

		                        	<div class="box" >
			                        	<label >
			                        		<input type="checkbox" name="" value="" style="position:absolute; bottom:0px;"/>
			                        	</label>
		                        	</div>
		                        	</td>

		                        	
		                          <?php endforeach; ?>

		                    </tbody>
		                  </table>
                		</div>
                		<!-- end table div -->
	
                	</div>
                	<div class="clearfix"></div>

                	<?php $atts = array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/assets/do_upload',$atts); ?>
                	
                	<!-- do the upload -->
                	<div class="form-group">
                              
                        <label >Upload Image:</label>
                        
                        
                        <input type="file" name="userfile" size="20" data-toggle="tooltip" data-placement="right" title="Please make sure your image is in the suitable format"/>
                      
                    </div>
                    <button type="submit" class="btn btn-purplet btn-s-xs " id=""><strong>OK</strong></button>
                    <?php echo form_close(); ?>
                </div>
            </section>
        </div>
    </div>
</div>