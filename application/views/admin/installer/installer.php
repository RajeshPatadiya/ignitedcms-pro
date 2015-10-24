<div class="row">
    <div class="mainvcontainer" style="background-image:url(' <?php echo base_url('img/bg.jpg'); ?> '); min-height:980px;">
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

                    <img src="<?php echo base_url("img/ig.png"); ?>" class="img-responsive my-center" style="position:relative;">
                    <p class="h2">Installation</p>
                    <?php $atts = array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/installer/write_file',$atts); ?>
                    <div class="form-group">All right champ, please type your database details here!</div>
                    <div class="form-group">
                        <label>Server Name</label>
                        <input name="hostname" type="text" data-required="true" data-maxlength="100" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Sever Details e.g localhost" value="localhost">
                    </div>
                    <div class="form-group">
                        <label>MySQL Admin name</label>
                        <input name="username" type="text" data-required="true" data-maxlength="100" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="E.g root" value="root">
                    </div>
                    <div class="form-group">
                        <label>MySQL Admin Password</label>
                        <input name="password" type="password" data-required="true" data-maxlength="100" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="E.g root" value="root">
                    </div>
                    <div class="form-group">
                        <label>Database Name*
                        </label>
                        <div class="btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="right" data-content="Please ensure your database name has no spaces or numbers! Gracias" title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i>  <strong></strong></div>

                        <input name="database" type="text" data-required="true" data-maxlength="100" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="database name" value="ignitedcmspro">
                    </div>
                    <div class="form-group">
                        <label>Table prefix</label>
                        <input name="prefix" type="text" data-required="true" data-maxlength="5" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="prefix" value="IGS_">
                    </div>
                    <button type="submit" class="btn btn-purplet btn-s-xs " id=""><strong>Save</strong></button>
                    <?php echo form_close(); ?>

                     <br/>
                       <!-- <div class="form-group">
                           <label>*Database name requirements</label>
                           <br/>
                           Please ensure your database name <strong>only</strong> contains letters.
                           Gracias.
                       </div> -->
                </div>
            </section>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>