<div class="row">
    <div class="mainvcontainer" style="background-image:url('<?php echo base_url('img/bg.jpg'); ?>'); backround-repeat: no-repeat; 
        background-size:100%; min-height:900px;">
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


                    
                    <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/login/validate_login',$atts); ?>
                    <img src="<?php echo base_url("img/ig.png"); ?>" class="img-responsive my-center" style="position:relative;">
                    <p class="h2">Login</p>
                    
                        <div class="form-group">
                            <label>Username</label>
                            <input name="name" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="admin">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="">
                        </div>
                   
                        
                         <button type="submit" class="btn btn-purplet btn-s-xs " style="margin-top:20px;"><strong>OK</strong></button>

                         <a class="pull-right" href="<?php echo site_url('admin/login/forgot_password_view'); ?>">Forgot Password?</a>
                        
                       <?php echo form_close(); ?> 

                       
                </div>
            </section>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>