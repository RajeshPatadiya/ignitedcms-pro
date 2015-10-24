<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:900px;  ">
    <!-- breadcrumb -->
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <!-- .breadcrumb -->
            <ul class="breadcrumb">
                <li>
                  <a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo ('Dashboard'); ?></a>
                </li>
                <li class='active'>
                  <a href="#"><i class="fa fa-list-ul"></i> <?php echo('Menu');?></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end breadcrumb -->
    <div class="row" style="margin-left:40px; margin-right:40px;">
        <div id="err-msg" class="alert alert-success pm-hidden">
            <button type="button" class="close" data-dismiss="alert">
              <i class="fa fa-times"></i> 
            </button> <i class="fa fa-ban-circle"></i>
            <?php echo( 'Saved...');?> 
        </div>
    </div>

    <div class="row" style="margin-left:30px; margin-right:30px;">
      <div class="col-sm-12">
          <header class="panel-heading ">
            <strong>Save menu settings</strong>
              <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="bottom" data-content="Dynamically restructure your menu using drag and drop facility." title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i> <strong></strong> 
              </div>
          </header>
          <section class="panel">
              
              <div class="panel-body">
                <button type="submit" class="pull-right btn btn-purplet btn-s-xs " id="savetodatabase">
                   <strong>Save</strong>
                </button>
              </div>
          </section>
      </div>
      
    </div>

    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-6">
            <div class="dd" id="nestable3">
                <ol class="dd-list" id="start">
                    <?php echo $html; ?> 
                </ol>
            </div>
        </div>
        <div class="col-sm-6">
            <header class="panel-heading">
              

            </header>
            <section class="panel">
                <div class="panel-body">
                    

                    <div class="panel-group m-b" id="accordion2">
                        <div class="panel">
                          <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                              <strong>Pages</strong>
                            </a>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                            
                            
                            <div class="panel-body text-sm">
                                
                                  <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('admin/menu/add_page_to_menu',$atts); ?>
                                  <!-- loop through all the pages -->
                                  <?php foreach ($query2->result() as $row): ?>
                                    <label>
                      
                                    <input type="checkbox" name="<?php echo $row->id; ?>" /> 
                                    <?php echo $row->name; ?>
                                    </label> <br/>
                                  
                                  <?php endforeach; ?>


                                  <button type="submit" class="pull-right btn btn-purplet btn-s-xs " ><strong>Add pages to menu</strong></button>
                                  
                                  <?php echo form_close(); ?>

                                  <!-- 
                                  <button type="submit" class="btn btn-white btn-s-xs " id="pullfromdatabase">
                                    <i class="fa fa-refresh"></i> Remove and add all pages?
                                  </button>-->
                                   
                                   
                                
                                <div class="my-results"></div> 
                                
                            </div>
                          </div>
                        </div>
                        <div class="panel">
                          <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                              <strong>Links</strong> (Not yet implemented in 1.0)
                            </a>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body text-sm">
                                <div class="form-group">
                                    <label>Url</label>
                                    <input name="url" type="text" data-required="true" data-maxlength="100" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="url" value="http://">
                                </div>
                                <div class="form-group">
                                    <label>Link Text</label>
                                    <input name="linktext" type="text" data-required="true" data-maxlength="50" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Link Text" value="">
                                </div>
                                <button type="submit" class="pull-right btn btn-purplet btn-s-xs " ><strong>Add to menu</strong></button>
                                
                            </div>
                          </div>
                        </div>  
                    </div>




                </div>
            </section>
        </div>
    </div>
    <div class="gap"></div>
</div>
<!--end pm container -->