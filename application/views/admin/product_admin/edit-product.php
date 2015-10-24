<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px;  ">
<!-- breadcrumb -->
   <div class="row" style="margin-left:30px; margin-right:30px;">
      <div class="col-sm-12">
       
        <ul class="breadcrumb">
          <li><a href="<?php echo site_url('admin/product_admin'); ?>"><i class="fa fa-home"></i> <?php echo 'Products'; ?></a></li>
          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Edit Product');?></a></li>
          
        </ul>
              
        </div>
    </div> 
    <!-- end breadcrumb -->


<div class="row" style="margin-left:30px; margin-right:30px;">
  <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading font-bold"><h3><?php echo('Edit Product') ?></h3></header>
              <div class="panel-body">
                        <?php $mystyle = array('style' => 'color:#b07db1; font-weight:bold; ' ); ?>

                      
                      <div class="clearfix"></div>
                      <div style="margin-top:30px;"></div>

                        <!-- important make sure class is form-horizontal -->
                        <form  method="post" action="<?php echo site_url("admin/product_admin/actual_edit_product/$id"); ?>"class="form-horizontal" id="product_form" data-validate="parsley" accept-charset="utf-8" enctype="multipart/form-data">
                          
                          <?php foreach ($query->result() as $row) { ?>
                          

                          <div class="panel-body"> 

                            <div class="form-group"> 
                              <label class="col-sm-2 control-label">Name:</label> 
                               <div class="col-sm-10"> 
                                <input type="text" name="name" id="name" class="form-control"  data-required="true" placeholder="" value="<?php echo $row->name; ?>"> 
                               </div> 
                            </div>

                            <!-- dummy text for ajax form upload -->
                            <div class="form-group" style="display:none;">
                                <label>dummy</label>
                                <input name="dummy" id="dummy" type="text" data-required="true" data-maxlength="6" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="tooltip" value="dummy">
                            </div>

                            
                            
                            <!-- rich text editor -->
                             <div class="form-group"> 
                              <label class="col-sm-2 control-label">Product Description:</label> 
                              <div class="col-sm-10"> <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">  
                                
                                
                                  <div class="btn-group"> 
                                    <a class="btn btn-white btn-sm btn-info" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>  
                                    <a class="btn btn-white btn-sm" data-edit="italic" title="" data-original-title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a> 
                                      <a class="btn btn-white btn-sm" data-edit="strikethrough" title="" data-original-title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                           <a class="btn btn-white btn-sm" data-edit="underline" title="" data-original-title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a> 
                                  </div>
                                  <div class="btn-group"> <a class="btn btn-white btn-sm" data-edit="insertunorderedlist" title="" data-original-title="Bullet list"><i class="fa fa-list-ul"></i></a> 
                                   <a class="btn btn-white btn-sm" data-edit="insertorderedlist" title="" data-original-title="Number list"><i class="fa fa-list-ol"></i></a> 
                                      </div>
                                  <div class="btn-group"> <a class="btn btn-white btn-sm btn-info" data-edit="justifyleft" title="" data-original-title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a> 
                                      <a class="btn btn-white btn-sm" data-edit="justifycenter" title="" data-original-title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i>
                                      </a> <a class="btn btn-white btn-sm" data-edit="justifyright" title="" data-original-title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a> 
                                      <a class="btn btn-white btn-sm" data-edit="justifyfull" title="" data-original-title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i>
                                      </a>
                                  </div>
                                  <div class="btn-group"> <a class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Hyperlink"><i class="fa fa-link"></i></a> 
                                      <div class="dropdown-menu">
                                          <div class="input-group m-l-xs m-r-xs">
                                              <input class="form-control input-sm" placeholder="URL" type="text" data-edit="createLink">
                                              <div class="input-group-btn">
                                                  <button class="btn btn-white btn-sm" type="button">Add</button>
                                              </div>
                                          </div>
                                      </div> <a class="btn btn-white btn-sm" data-edit="unlink" title="" data-original-title="Remove Hyperlink"><i class="fa fa-cut"></i></a> 
                                  </div>
                                  <div class="btn-group"> <a class="btn btn-white btn-sm" data-edit="undo" title="" data-original-title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>  <a class="btn btn-white btn-sm" data-edit="redo" title="" data-original-title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a> 
                                  </div>
                                  </div>
                                  <div id="editor" class="form-control" style="overflow:scroll;height:250px;max-height:250px" contenteditable="true"> <?php echo $row->description;?> </div>
                                </div>
                              </div> 

                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Height:</label> 
                                  <div class="col-sm-10"> 
                                  <input name="h" type="text" data-required="true" data-maxlength="10" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Height in mm" value="<?php echo $row->h; ?>">
                                </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Width:</label> 
                               <div class="col-sm-10"> 
                                  <input name="w" type="text" data-required="true" data-maxlength="10" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Width in mm" value="<?php echo $row->w; ?>">
                                </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Depth:</label> 
                               <div class="col-sm-10"> 
                                  <input name="d" type="text" data-required="true" data-maxlength="10" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Depth in mm" value="<?php echo $row->d; ?>">
                                </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Youtube link (if applicable):</label> 
                               <div class="col-sm-10"> 
                                  <input name="demo" type="text"  data-maxlength="100" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Youtube link" value="<?php echo $row->demo; ?>">
                                </div>
                              </div>

                              <?php } ?>
                            
                              <!-- show all product categories -->
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Product Categories:</label> 
                               <div class="col-sm-10"> 
                         
                                   <?php foreach ($sd as $key => $value): ?>
                                      <label><input type="checkbox" name="cat-<?php echo $value['id']; ?>"  <?php echo $value['checked']; ?>/></label>
                                       
                                       <?php echo $value['cat_name']; ?>
                                       
                                   <?php endforeach; ?>


                                </div>
                              </div>

                            
                            <div class="form-group"> <div class="col-sm-4 col-sm-offset-2">  <button type="submit" id="create-topic"class="btn btn-purplet">
                              <strong>Edit</strong></button> </div> </div>

                          </div>
                      </form>
                        
                        <a href="<?php echo site_url("admin/product_admin/delete_product/$id"); ?>">
                        <button type="submit" class="btn btn-purplet btn-s-xs pull-right " id="">
                          <strong>Delete</strong></button>
                          </a>
                                                                                

                        <div class="clearfix"></div>
                        
   
                  </div>
            </section>
      </div>
</div>
</div>