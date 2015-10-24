<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px;  min-height:800px;">
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
	          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Site Settings');?></a></li>
	          
	        </ul>
	              
	        </div>
	    </div> 
	    <!-- end breadcrumb -->


	<div class="row" style="margin-left:30px; margin-right:30px;">
	<div class="col-sm-12">
	    <header class="panel-heading ">
	    	<div class="inline font-bold">Site Settings</div>
	    	<div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="bottom" data-content="Customise your site, from font settings to menu theme colors and logo!" title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i> <strong></strong> 
	    	                </div>
	    </header>
	    <section class="panel">
	        <?php foreach($query->result() as $row): ?>
	        <div class="panel-body">
	        	<?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/site_settings/save_site_settings',$atts); ?>
	        	
	        	<div class="form-group">
	        	    <label>Site name</label>
	        	    <input name="site" type="text" data-required="true" data-maxlength="50" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Site name" value="<?php echo $row->site; ?>">
	        	</div>

	        	<div class="form-group">
	        	    <label>Site Color in hex code</label> (For hyperlinks and menu hover colors) <br/>
	        	    <input class="color" name="color" type="text" data-required="true" data-maxlength="10" class="form-control" placeholder="#" data-toggle="tooltip" data-placement="top" title="" value="<?php echo $row->color; ?>">
	        	</div>


	        	


	        	<div class="form-group">
	        	    <label>Site Body Font</label> (E.g Raleway or Open Sans)
	        	    <input name="font" type="text" data-required="true" data-maxlength="50" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Body font" value="<?php echo $row->font; ?>">
	        	</div>

	        	<div class="form-group">
	        	    <label>Footer Color</label> <br/>
	        	    <input class="color" name="footercolor" type="text" data-required="true" data-maxlength="20" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="" value="<?php echo $row->footercolor; ?>">
	        	</div>

	        	<div class="form-group">
	        	    <label>Footer font color</label> <br/>
	        	    <input class="color" name="footerfontcolor" type="text" data-required="true" data-maxlength="20" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="" value="<?php echo $row->footerfontcolor; ?>">
	        	</div>


	        	<div class="form-group">
	        	    <label>Footer 1</label>
	        	    <textarea name="footer1"  id="inp-box" class="form-control" rows="5" data-maxlength="1000"  placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Footer 1"><?php echo $row->footer1; ?></textarea>
	        	
	        	</div>
	        	<div class="form-group">
	        	    <label>Footer 2</label>
	        	    <textarea name="footer2"  id="inp-box" class="form-control" rows="5" data-maxlength="1000"  placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Footer 1"><?php echo $row->footer2; ?></textarea>
	        	
	        	</div>
	        	<div class="form-group">
	        	    <label>Footer 3</label>
	        	    <textarea name="footer3"  id="inp-box" class="form-control" rows="5" data-maxlength="1000"  placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Footer 1"><?php echo $row->footer3; ?></textarea>
	        	
	        	</div>
	        	
	        	
	        	
	        	



	        	<div class="form-group">
                             
                    <label class="control-label">Upload Site Logo:</label> 

                    <div class="btn btn-sm btn-rounded  btn-info" data-toggle="popover" data-html="true" data-placement="right" 
                              data-content='<?php echo img("img/uploads/$row->logo"); ?>' title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Existing Logo'> <i class="fa fa-question"></i> 
                      </div>

                    <input type="file" name="userfile" size="20" data-toggle="tooltip" data-placement="bottom" title="Please make sure your Site logo is 200px wide" />
                  </div>
                
                <button type="submit" class="btn btn-purplet btn-s-xs " id=""><strong>Save</strong></button>
                <?php echo form_close(); ?>
            <?php endforeach; ?>
	        </div>
	    </section>
	</div>
	</div>

	
	<div class="gap"></div>

</div>