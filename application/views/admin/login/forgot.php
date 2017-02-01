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

                     


                    
                    <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/login/reset_password',$atts); ?>
                    <img src="<?php echo base_url("img/ig.png"); ?>" class="img-responsive my-center" style="position:relative;">
                    <p class="h2">Send Reset</p>
                    
                        <div class="form-group">
                            <label>Username</label>
                            <input name="name" type="text" data-required="true" data-maxlength="20" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="">
                        </div>
                       
                   
                        
                         <button type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
                                 <i class="fa fa-envelope"></i> <strong>Send email</strong>
                         </button>
                         
                         

                         <a href=" <?php echo site_url("login"); ?>" class="pull-left">Return to Login?</a>

                         
                        
                       <?php echo form_close(); ?> 

                       
                </div>
            </section>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>