<div class="row">
    <div class="mainvcontainer" style="background-image:url('<?php echo base_url('img/bg.jpg'); ?>'); backround-repeat: no-repeat; 
        background-size:100%; min-height:900px;">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <section class="panel" style="margin-top:90px;padding:50px; 
            
            border: 1px solid #ccc;
            border-radius: 10px;
            ">
                <div class="panel-body">

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

                     


                    
                    <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart("admin/login/update_password/$key",$atts); ?>
                    <img src="<?php echo base_url("img/ig.png"); ?>" class="img-responsive my-center" style="position:relative;">
                    <p class="h2">Reset Password</p>
                    
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" data-required="true" data-maxlength="50" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="password" value="">
                        </div>
                       
                   
                        
                         <button type="submit" class="btn btn-purplet btn-s-xs " style="margin-top:20px;"><strong>Save</strong></button>

                         
                        
                       <?php echo form_close(); ?> 

                       
                </div>
            </section>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>