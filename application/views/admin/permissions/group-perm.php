<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:800px;  ">
	
	<!-- flash data -->
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
	          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Permissions');?></a></li>
	          
	        </ul>
	              
	        </div>
	    </div> 
	    <!-- end breadcrumb -->
	    
	    <div class="row" style="margin-left:30px; margin-right:30px;">
	   <div class="col-sm-12">
	       <header class="panel-heading"><div class="inline font-bold">User Group Permissions</div>
	       	<div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="bottom" data-content="Create different Roles so users are limited to different aspects of the admin panel" title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Info'> <i class="fa fa-question"></i> <strong></strong> 
	       	                </div>

	       </header>
	       <section class="panel">
	           
	           <div class="panel-body">

	           	<div class="row">
                        <div class="col-sm-10">
                            
                          
                        </div>
                        <div class="col-sm-2">
                            <a href="<?php echo site_url("admin/permissions/new_group_view"); ?>">
                                <button  type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
                                <i class="fa fa-plus"></i> <strong>New Group</strong></button>
                            </a>
                        </div>
                    </div>

                    <div class="line"></div>


               
	           	
	           	


	           	<div class="table-responsive" style="margin-top:20px;">
                  <table class="table table-striped b-t text-sm" id="example">
                    <thead>

                      <tr>
                        <th width="100" class="text-muted"> Id</th>
                        <th class="text-muted">Name</th>
                        <th width="200" class="text-muted">Handle</th>
                        <th class="text-muted">Delete</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($query->result() as $row): ?>
                    		<?php $id = $row->groupID; ?>
                    		<tr>
		                        <td><?php echo $id; ?></td>
		                        <td><a href="<?php echo site_url("admin/permissions/update_permission_view/$id"); ?>"><?php echo $row->groupName; ?></a></td>
		                        <td>...</td>
		                        <td><?php echo anchor("admin/permissions/search_permissions_or_delete/$id", 'Delete', 'attributs'); ?></td>
                      		</tr>
                    	<?php endforeach ?>

                     
                    </tbody>
                  </table>
                </div>
                
	           </div>
	       </section>
	   </div>
	   
	 </div>
        


</div>	