<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:50px; max-width:1170px; min-height:500px; ">

	<div class="row" style="margin-left:30px; margin-right:30px;">
	  <div class="col-sm-12">
	      <header class="panel-heading font-bold">Upload Product spec (PDF)</header>
	      <section class="panel">
	          <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart("admin/product_admin/upload_spec/$id",$atts); ?>
	          
	          <div class="panel-body">
	          	<div class="form-group">
                              
                    <label class="col-sm-2 control-label">Upload Product spec:</label>
                    
                    <input type="file" name="userfile" size="20" data-toggle="tooltip" data-placement="bottom" title="" />
                  
                </div>
                	<div class="form-group">
                <button type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
                	<strong>Upload</strong></button>
                </div>
                <?php echo form_close(); ?>

	          </div>
	      </section>
	  </div>
	  
	</div>


</div>