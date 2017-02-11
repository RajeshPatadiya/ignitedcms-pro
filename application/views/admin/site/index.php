<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;  ">
   
  <!-- breadcrumb -->
  <div class="row" style="margin-left:30px; margin-right:30px;">
 	       <div class="col-sm-12">
 	         <!-- .breadcrumb -->
 	         <ul class="breadcrumb">
 	           <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo ('Dashboard'); ?></a></li>
 	           <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Site Settings');?></a></li>
 	           
 	         </ul>
 	               
 	         </div>
 	     </div> 




   <div class="row" style="margin-left:30px; margin-right:30px;">
      <div class="col-sm-12">
          <header class="panel-heading font-bold">Site Settings
          	<div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Site Settings" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> 
             	 </div>
          </header>
          <section class="panel">
              
          	  <form  action="<?php echo site_url("admin/site_settings/save_home"); ?>" method="post" enctype="multipart/form-data">
          	  	
          	  

              <div class="panel-body">

              	<div class="form-group">
                    <div class="errors pull-left">*</div>
              	    <label>Site Home page</label>
              	    <div class="igs-small">The name (section) for the site main page, this will be the first page your visitors see when they go to your site, this field is case sensitive.</div>
              	   

                    <select name="default_page" class="form-control">
                      
                        <?php foreach ($query->result() as $row): ?>

                          <option value="<?= $row->name; ?>"> <?= $row->name; ?></option>
                        <?php endforeach; ?>
                        
                    </select>
                    


              	</div>

              	<button type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
              		    <i class="fa fa-check"></i> <strong>save</strong>
              	</button>
              	
              	</form>



              </div>
          </section>
      </div>
      
   </div>
</div>