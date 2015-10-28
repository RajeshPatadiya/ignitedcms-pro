<div class="row">
     <div class="mainvcontainer" style="background-image:url('<?php echo base_url('img/bg.jpg'); ?>'); backround-repeat: no-repeat; 
        background-size:100%; min-height:1190px;">
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
                        <div class="errors pull-left">*</div>
                        <div class="igs-small">Sever Details e.g localhost</div>
                        <input name="hostname" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="localhost">
                        <div class="errors"> <?php echo form_error('hostname'); ?>  </div>
                    </div>
                    <div class="form-group">
                        <label>MySQL Admin name</label>
                        <div class="errors pull-left">*</div>
                        <div class="igs-small">Eg. root</div>
                        <input name="username" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="root">
                        <div class="errors"> <?php echo form_error('username'); ?>  </div>
                    </div>
                    <div class="form-group">
                        <label>MySQL Admin Password</label>
                        <div class="igs-small">Enter your mysql Admin password Eg. root</div>
                        <input name="password" type="password"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="root">
                    </div>
                    <div class="form-group">
                        <label>Database Name
                        </label>
                        <div class="errors pull-left">*</div>
                        <div class="btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="right" data-content="Please ensure your database name is valid" title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i>  <strong></strong></div>

                        <input name="database" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="ignitedcmspro">
                        <div class="errors"> <?php echo form_error('database'); ?>  </div>
                    </div>
                    <div class="form-group">
                        <label>Table prefix</label>
                        <div class="errors pull-left">*</div>
                        <div class="igs-small">This will be the prefix all your tables have, don not forget the underscore</div>
                        <input name="prefix" type="text"   class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="IGS_">
                        <div class="errors"> <?php echo form_error('prefix'); ?>  </div>
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