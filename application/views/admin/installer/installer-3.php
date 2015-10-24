<div class="row">
    <div class="mainvcontainer" style="background-image:url('<?php echo base_url('img/bg.jpg'); ?>'); min-height:900px;">
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
                        <input name="site" type="text" data-required="true" data-maxlength="40" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Site title" value="">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" data-type="email" data-required="true" data-maxlength="100" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Email address" value="">
                    </div>

                   <div class="form-group pull-in">
                          <div class="col-sm-6">
                            <label>Enter admin password *</label>
                            <input type="password" name="password1" class="form-control" data-required="true" data-minlength="6" id="pwd">   
                          </div>
                          <div class="col-sm-6">
                            <label>Confirm admin password</label>
                            <input type="password" name="password2" class="form-control" data-equalto="#pwd" data-required="true" data-minlength="6">      
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