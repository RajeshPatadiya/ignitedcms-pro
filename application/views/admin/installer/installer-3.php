<div class="row">
    <div class="mainvcontainer" style="background-image:url('<?php echo base_url('img/bg.jpg'); ?>'); backround-repeat: no-repeat; 
        background-size:100%; min-height:990px;">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <section class="panel" style="margin-top:90px;padding:50px; 
            box-shadow: 4px 12px 85px rgba(0,0,0,.9);
            border: 1px solid #ccc;
            border-radius: 10px;
            ">
                <div class="panel-body">
                   <?php if (isset($errors)) {?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
                        </button> <i class="fa fa-ban-circle"></i><strong>Oh Dear!</strong> 
                        <?php echo $errors; ?>
                    </div>
                    <?php } ?>
                  
                    <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/login/validate_details',$atts); ?>
                    
                    <p class="h2">Information Needed</p>
                    
                    <div class="form-group">
                        <label>Site Title</label>
                        <div class="errors pull-left">*</div>
                        <input name="site" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="<?php echo set_value('site'); ?>">
                        <div class="errors"> <?php echo form_error('site'); ?>  </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="errors pull-left">*</div>
                        <div class="igs-small">This needs to be a valid email account that your have access to</div>
                        <input name="email" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="<?php echo set_value('email'); ?>">
                        <div class="errors"> <?php echo form_error('email'); ?>  </div>
                    </div>

                   <div class="form-group pull-in">
                          <div class="col-sm-6">
                            <label>Enter admin password</label>
                            <div class="errors pull-left">*</div>
                            <input type="password" name="password1" class="form-control"  id="pwd" value="<?php echo set_value('password1'); ?>"> 
                            <div class="errors"> <?php echo form_error('password1'); ?>  </div>  
                          </div>
                          <div class="col-sm-6">
                            <label>Confirm admin password</label>
                            <div class="errors pull-left">*</div> 
                            <input type="password" name="password2" class="form-control" value="<?php echo set_value('password2'); ?>" >
                            <div class="errors"> <?php echo form_error('password2'); ?>  </div>      
                          </div>   
                        </div>
                        
                         <button type="submit" class="btn btn-purplet btn-s-xs " style="margin-top:20px;"><strong>OK</strong></button>
                        
                       <?php echo form_close(); ?> 

                       <br/>
                       <div class="form-group">
                           <label>*Password requirements</label>
                           <div class="btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="right" data-content="Please ensure your password is at least 6 characters long and has at
                            least one number. Your username will be <strong>admin</strong> 
                            and you will have <strong>full</strong> access to all areas! Lucky you." title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i>  <strong></strong></div>

                            
                          </div>
                          
                           
                       </div>
                   
                   
                </div>
            </section>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>