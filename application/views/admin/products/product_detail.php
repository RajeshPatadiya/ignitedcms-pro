<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:50px; max-width:1170px; min-height:800px;  ">
    <div class="row" style="margin-left:30px; margin-right:30px;">
       

        	
                 <?php foreach ($query->result() as $row): ?>

                 <?php $id = $row->id; ?>
                 
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
	                        <div class="text-muted really-small">  <strong>Dimensions</strong> <br/>
	                           Height: <?php echo $row->h; ?>mm,   
	                            Width: <?php echo $row->w; ?>mm,  
	                            Depth: <?php echo $row->d; ?>mm 
	                        </div>
	                    </div>
	                </div>
                 </div>

                 <!-- now do the tabs -->
                 <div class="col-sm-8">
                     <section class="panel">
                <header class="panel-heading bg-light">
                  <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#Product" data-toggle="tab">Product Description</a></li>
                    <li class=""><a href="#Drawing" data-toggle="tab">Drawing Specification</a></li>
                    <li class=""><a href="#Demo" data-toggle="tab">Demo</a></li>
                    
                  </ul>
                </header>
                <div class="panel-body">
                  <div class="tab-content" style="background-color:#fff;">
                    <div class="tab-pane active" id="Product"><?php echo $row->description; ?></div>
                    <div class="tab-pane" id="Drawing">
                      <?php $pdf = $row->spec; ?>
                      <a href="<?php echo base_url("img/uploads/$pdf"); ?>">Product Specification as PDF</a>
                      
                    </div>
                    <div class="tab-pane" id="Demo"><?php echo $row->demo; ?></div>
                    
                  </div>
                </div>
              </section>
                 </div>
                 


                 
                <?php endforeach;?>
	
        
    </div>

    <div class="row" style="margin-left:30px; margin-right:30px;">
    	<div class="col-sm-12">
    	    <header class="panel-heading font-bold">Related Products</header>
    	    <section class="panel">
    	        
    	        <div class="panel-body">
    	        	Related Products to go here!
    	        </div>
    	    </section>
    	</div>
    	
    </div>
    <div class="gap"></div>
</div>