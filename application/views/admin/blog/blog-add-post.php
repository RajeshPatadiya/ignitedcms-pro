<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px;  ">
<!-- breadcrumb -->
   <div class="row" style="margin-left:30px; margin-right:30px;">
      <div class="col-sm-12">
       
        <ul class="breadcrumb">
          <li><a href="<?php echo site_url('admin/blog'); ?>"><i class="fa fa-home"></i> <?php echo $this->uri->segment(2, 0); ?></a></li>
          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Add blog');?></a></li>
          
        </ul>
              
        </div>
    </div> 
    <!-- end breadcrumb -->


<div class="row" style="margin-left:30px; margin-right:30px;">
  <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading font-bold"><h3><?php echo('Add blog post') ?></h3></header>
              <div class="panel-body">
                        <?php $mystyle = array('style' => 'color:#b07db1; font-weight:bold; ' ); ?>

                      
                      <div class="clearfix"></div>
                      <div style="margin-top:30px;"></div>

                        <!-- important make sure class is form-horizontal -->
                        <form  method="post" action="<?php echo site_url('admin/blog/actual_insert_blog_post'); ?>"class="form-horizontal" id="blog_form" data-validate="parsley" accept-charset="utf-8" enctype="multipart/form-data">
                          <div class="panel-body"> 

                            <div class="form-group"> 
                              <label class="col-sm-2 control-label">Post Title:</label> 
                               <div class="col-sm-10"> 
                                <input type="text" name="topicname" id="topicname" class="form-control"  data-required="true" placeholder=""> 
                               </div> 
                            </div>

                            <!-- dummy text for ajax form upload -->
                            <div class="form-group" style="display:none;">
                                <label>dummy</label>
                                <input name="dummy" id="dummy" type="text" data-required="true" data-maxlength="6" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="tooltip" value="dummy">
                            </div>

                            <div class="form-group">
                              
                                <label class="col-sm-2 control-label">Upload blog picture:</label>
                                <div class="col-sm-10">
                                <?php //echo br(2); ?>
                                <input type="file" name="userfile" size="20" data-toggle="tooltip" data-placement="bottom" title="Please make sure your blog picture is 960px wide" />
                              </div>
                            </div>
                            
                            <!-- rich text editor -->
                             <div class="form-group"> 
                              <label class="col-sm-2 control-label">Blog post:</label> 
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
                                  <div id="editor" class="form-control" style="overflow:scroll;height:250px;max-height:250px" contenteditable="true"> <?php //echo $content; ?> </div>
                                </div>
                              </div> 


                            

                            
                            <div class="form-group"> <div class="col-sm-4 col-sm-offset-2">  <button type="submit" id="create-topic"class="btn btn-purplet"><strong>Add</strong></button> </div> </div>

                          </div>
                      </form>
                            

                        <div class="clearfix"></div>
                        
   
                  </div>
            </section>
      </div>
</div>
</div>
<div class="gap"></div>