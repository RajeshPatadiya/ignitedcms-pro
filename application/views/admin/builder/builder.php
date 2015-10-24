
<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:900px;  ">

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
                <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo ('Dashboard'); ?></a></li>
                <li><a href="<?php echo site_url('admin/pages'); ?>"><i class="fa fa-list-ul"></i> <?php echo $this->uri->segment(1, 0); ?></a></li>
                <li class='active'><a href="#"><i class="fa fa-book"></i> <?php echo(my_page_name($this->uri->segment(4, 0)));?></a></li>
                
              </ul>
                    
              </div>
          </div> 
          <!-- end breadcrumb -->
    
    <!-- page options, add controller, make blog -->
    <div class="row" style="margin-left:30px; margin-right:30px;">
    <div class="col-sm-12">
        
        <section class="panel">
            <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart("admin/pages/save_page_options/$id",$atts); ?>
            
            <div class="panel-body">

               <!-- <label><input type="checkbox" name="controller" value="" id="cust-controller" class="b-box" <?php echo $ck1; ?>    /> Custom controller?
               </label> 
               <div class="btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="right" 
                         data-content='For advanced developer controllers tick this box and add your own controllers and view files <?php echo anchor('login/logout', 'Read More', 'attributs'); ?>' title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Help'> <i class="fa fa-question"></i>  
                </div>
               <br/>

               <div class="form-group"  id="path" >
                   <label>Controller</label>
                   <input name="path" type="text"  data-maxlength="500" class="form-control" placeholder="E.g your_controller_name/your_method" data-toggle="tooltip" data-placement="top" title="" value="<?php echo $path; ?>" >
               </div> -->

               <label><input type="checkbox" name="blog" value="" class="b-box" <?php echo $ck2; ?>/> Make this page the blog?
               </label>
               <br/>
               <button type="submit" class="btn btn-purplet btn-s-xs pull-right" ><strong>Save</strong></button>
               
               <?php echo form_close(); ?>
            </div>
        </section>
    </div>
    
    




    </div>

    <!-- rich text box -->
    <div class="row" style="margin-left:30px; margin-right:30px; display:none;" id="my-rich-text">
        <div class="col-sm-12">

            <header class="panel-heading ">
                <div class="inline font-bold">Rich text</div>
                <div class="close btn" id="rich-close">&times;</div>
            </header>
            
            <section class="panel">
                
                <div class="panel-body">
                  <div class="form-group"> 
                             
                               <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">  
                                
                                
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

                              <div id="add-rich">Add</div>
                </div>
            </section>
        </div>
        
                  
    </div>


    <!-- end page options -->

    <div class="row" style="margin-left:30px; margin-right:30px; display:none;" id="assets" >
        <div class="col-sm-12">
            <header class="panel-heading ">
                <div class="inline font-bold">Asset Managment</div>
                <div class="close btn" id="asset-close">&times;</div>
            </header>
            <section class="panel">
                <div class="panel-body"> 
                    <div class="gallery" style="position:relative;">

                        

                        <div class="table-responsive">
                          <table class="table b-t text-sm">
                            <thead>
                              <tr>
                                
                              </tr>
                            </thead>
                            <tbody>
                              
                                <?php 
                                     $count = -1; 
                                     foreach ($query2->result() as $row): 
                                     $count = $count + 1; 
                                     if($count % 6 == 0) {
                                 ?>
                                 </tr>
                                 <tr>
                                <?php } ?>

                              
                                    <td style="vertical-align:middle; position:relative; background-color:#f3f3f3;"> <img class="img-responsive" src="<?php echo base_url("img/uploads/$row->name"); ?>" alt="image" />

                                    <div class="box" >
                                      <div class="ig-click" id="<?php echo $row->id; ?>" style="cursor:pointer;">
                                        add
                                      </div>
                                        <!-- <label >
                                            <input type="checkbox" name="" value="<?php echo $row->id; ?>" style="position:absolute; bottom:0px;"/>
                                        </label> -->
                                    </div>
                                    </td>

                                    
                                  <?php endforeach; ?>

                            </tbody>
                          </table>
                        </div>
                        <!-- end table div -->
    
                    </div>
                    <div class="clearfix"></div>


                    <!-- asset upload form -->
                    <?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart("admin/assets/do_upload_builder/$id",$atts); ?>
                    <div class="form-group">
                        <label >Upload Image:</label>
                        
                        
                        <input type="file" name="userfile" size="20" data-toggle="tooltip" data-placement="right" title="Please make sure your image is in the suitable format"/>
                        <br/>
                        <button type="submit" class="btn btn-purplet btn-s-xs " id=""><strong>OK</strong></button>
                    <?php echo form_close(); ?>
                      
                    </div>

                   
                   
                </div>
            </section>
        </div>
    </div>

<div class="row" style="margin-left:30px; margin-right:30px;" >

    <div class="col-sm-12">
         <div class="btn-group">
            <button type="submit" class="btn btn-white btn-s-xs " id="add-block">Add Block</button>
            <button type="submit" class="btn btn-white btn-s-xs " id="rrr">Add Rich Text</button>
       
            <button type="submit" class="btn btn-white btn-s-xs " id="add-image">Add Image</button>

            <button type="submit" class="btn btn-white btn-s-xs " id="add-slider">Add Slider Block</button>

            <button type="submit" class="btn btn-white btn-s-xs " id="add-code">Add code Block</button>
        </div>
        
        <div class="panel-body">
          <a target="_blank" href=" <?php echo site_url("site_preview/preview_page/$id"); ?>">Preview Page</a>
           
        </div>
    </div>


    <div id="sortable">

    	<?php echo $content; ?>
 
        
    </div>

<div class="clearfix"></div>
</div>
<div class="row" style="margin-left:30px; margin-right:30px;">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-purplet btn-s-xs " id="save-db"><strong>Save All</strong></button>
    </div>
</div>
<div class="gap"></div>



</div>

