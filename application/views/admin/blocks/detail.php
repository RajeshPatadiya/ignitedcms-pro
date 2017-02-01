
<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;  ">
    
    <!-- breadcrumb -->
       <div class="row" style="margin-left:30px; margin-right:30px;">
          <div class="col-sm-12">
            <!-- .breadcrumb -->
            <ul class="breadcrumb">
              <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo ('Dashboard'); ?></a></li>
              <li class='active'><a href="<?php echo site_url('admin/field_builder'); ?>"><i class="fa fa-list-ul"></i> <?php echo('Field Builder');?></a></li>
              <li> <a href="#">Blocks</a> </li>
              
            </ul>
                  
            </div>
        </div> 
        <!-- end breadcrumb -->

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

    <div class="row" style="margin-left:30px; margin-right:30px;">

        <div class="col-sm-4">
            <header class="panel-heading font-bold">Blocks</header>
            <section class="panel">

                <div class="panel-body">
                 
        
                    
                      <div class="pertain">
                         
                      </div>
                    
                   
                   

                    <div class="form-group" style="margin-top:10px;">
                       <div  class="btn btn-purplet btn-s-xs" id="block-add" ><strong>Add new field</strong></div>
                       
                    </div>
                </div>
            </section>
        </div>
         
         <?php  echo form_open_multipart('admin/blocks/validate'); ?>
         <div class="col-sm-8">
             <header class="panel-heading font-bold">Block Name</header>
             <section class="panel">
                 
                 <div class="panel-body">
                  <div class="form-group">
                      <label>Block Name</label>
                      <input name="block-name" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="">
                  </div>
                 </div>
             </section>
         </div>
         
        <div class="tepid">
         
          
            
               

            
       
        </div>
        <button type="submit" class="btn btn-purplet btn-s-xs"><strong>Save</strong></button>
               
          
        <?php echo form_close(); ?>
    </div>
</div>