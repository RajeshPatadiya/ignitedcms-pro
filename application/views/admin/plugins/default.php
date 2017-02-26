<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px; ">
    
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
                  <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo "Dashboard"; ?></a></li>
                  <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Plugins');?></a></li>
                  
                </ul>
                      
                </div>
            </div> 
            <!-- end breadcrumb -->

         <div class="row" style="margin-left:30px; margin-right:30px;">
            <div class="col-sm-12">
                <header class="panel-heading "><strong>Install a new Plugin</strong>
                    <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="bottom" data-content="Where you can upload a zip file from ignited crud builder" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> 
                        </div>
                </header>
                <section class="panel">
                    
                    <div class="panel-body">

                        <form action="<?php echo site_url("admin/plugins/do_upload"); ?>" method="post" enctype="multipart/form-data">
                            <div class="igs-small">Please pick a plugin zip file (the filename must not contain any spaces and user alphanumeric letters)</div>
                            <?php echo form_upload( 'userfile'); ?>
                            <button type="submit" class="btn btn-purplet btn-s-xs pull-right" id=""> <i class="fa fa-check"></i> <strong>Upload</strong> </button>

                            <div class="errors"><?php echo form_error('userfile'); ?></div>
                        </form>


                    </div>
                </section>
            </div>
            
         </div>

          <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <header class="panel-heading font-bold">All Plugins
                <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="All plug" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> </div>
            </header>
            <section class="panel">
                <div class="panel-body">

                     <div class="row">
                        <div class="col-sm-10">
                             
                          
                        </div>
                        <div class="col-sm-2">
                            
                        </div>
                    </div>
                    <div class="line"></div>
                    
                    <div class="table-responsive" style="margin-top:0px;">
                        <table class="table table-striped b-t text-sm" id="example">
                            <thead>

                                <tr>
                                    
                                    <th class="" width="">name</th>
<th class="" width="">install</th>
<th class="" width="">status</th>
<th class="" width="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query->result() as $key): ?>
                                <tr>
                                   
                                    <td><?php echo $key->name ?></td>
<td><?php echo $key->install ?></td>
<td><?php echo $key->status ?></td>

                                    <td>
                                        
                                        <?php echo anchor( "admin/plugins/delete_plug/$key->id", 'Delete'); ?> 
                                    </td>
                                </tr>
                                <?php endforeach; ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>


        
    
</div>