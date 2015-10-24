<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:50px; max-width:1170px; min-height:800px;  ">
    <div class="row" style="margin-left:30px; margin-right:30px;">
       

        	
                 <?php foreach ($query->result() as $row): ?>

                 <?php $id = $row->id; ?>
                 <a href="<?php echo site_url("admin/products/product_details/$id"); ?>">
                 <div class="col-sm-4">
	                <div class="post-item">
	                    <div class="post-media">
	                        <?php $my_image=$row->img; ?> <img src="<?php echo base_url("img/uploads/$my_image"); ?>" class="img-responsive my-center"> 
	                    </div>
	                    <div class="caption wrapper-lg">
	                        <h3 class="post-title red"><?php echo $row->name; ?></h3>
	                        <div class="post-sum">
	                            <p>
	                                <?php //echo ($row->content); ?>
	                            </p>
	                        </div>
	                        <div class="line line-lg"></div>
	                        <div class="text-muted"> <i class="fa fa-gear icon-muted"></i> <strong>Category</strong>
	                            <?php //echo $row->category; ?>
	                        </div>
	                    </div>
	                </div>
                 </div>
                 </a>
                <?php endforeach;?>
	
        
    </div>
    <div class="gap"></div>
</div>