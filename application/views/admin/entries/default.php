<?php 

   /**
    *  @Description: The default view template for pages, products and users
    *       @Params: 
    *
    *  	 @returns: 
    */

 ?>

 <div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px;  min-height:800px; ">

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
 	 <!-- breadcrumb -->
 	    <div class="row" style="margin-left:30px; margin-right:30px;">
 	       <div class="col-sm-12">
 	         <!-- .breadcrumb -->
 	         <ul class="breadcrumb">
 	           <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo ('Dashboard'); ?></a></li>
 	           <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Entries');?></a></li>
 	           
 	         </ul>
 	               
 	         </div>
 	     </div> 
 	     <!-- end breadcrumb -->

 	     <div class="row" style="margin-left:30px; margin-right:30px;">
 	       <div class="col-sm-12">
 	           <header class="panel-heading font-bold">Types</header>
 	           <section class="panel">
 	               
 	               <div class="panel-body">
 	               	<div class="col-sm-4 my-pad-top">
                    <div class="my-blk">
                       <i class="fa fa-file big purplet"></i>
                       <div class="my-info ">Singles</div>
                       <br/><br/>
                       <?php foreach ($query->result() as $row): ?>
                       <?php $sectionid = $row->sectionid;
                              $id = $row->eid;

                         ?>
                     	 <a href="<?php echo site_url("admin/entries/render_section/$sectionid/$id"); ?>"><?php echo $row->name; ?></a> <br/>
                     <?php endforeach; ?>
                    </div>
                     
                  </div>
                  <div class="col-sm-4 my-pad-top">
                    <div class="my-blk">
                       <i class="fa fa-copy big purplet"></i>
                       <div class="my-info">Multiples</div>
                       <br/><br/>
                       <?php foreach ($query2->result() as $row): ?>
                     	<a href="<?php echo site_url("admin/entries/show_multiple_view/$row->id"); ?>"><?php echo $row->name; ?></a> <br/>
                     <?php endforeach; ?>

                    </div>
                    
                     
                  </div>
                  <div class="col-sm-4 my-pad-top">
                    <div class="my-blk">
                       <i class="fa fa-globe big purplet"></i>
                       <div class="my-info ">Globals</div>
                       <br/><br/>
                       <?php foreach ($query3->result() as $row): ?>
                       <?php $sectionid = $row->sectionid;
                              $id = $row->eid;

                         ?>
                       <a href="<?php echo site_url("admin/entries/render_section/$sectionid/$id"); ?>"><?php echo $row->name; ?></a> <br/>
                     <?php endforeach; ?>
                    </div>
                     
                  </div>
                  



 	               </div>
 	           </section>
 	       </div>
 	       
 	     </div>

	 
 	







 </div>