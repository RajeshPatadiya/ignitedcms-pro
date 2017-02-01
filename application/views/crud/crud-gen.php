<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;  ">
   <div class="row" style="margin-left:30px; margin-right:30px;">
       <div class="col-sm-12">
           <header class="panel-heading font-bold">Crud gen get talbes
           	<div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Select a table" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> 
              	 </div>
           </header>
           <section class="panel">
               
               <div class="panel-body">
               	<form  action="<?php echo site_url('crud/crud_generator/get_fields'); ?>" method="post" enctype="multipart/form-data">

               	<select name="name" class="form-control">

               	   
               	   		
               	   <option value="0">Please select</option>
               	     
               	     <?php foreach ($tables as $field) : ?>
               	    	<option value="<?php echo $field; ?>"> <?php echo $field; ?></option>

               			<?php endforeach; ?>
               	    
               	</select>
               	
               	<button type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
               		    <i class="fa fa-check"></i> <strong>Select</strong>
               	</button>
               	</form>
               	



               </div>
           </section>
       </div>
       
   </div>
</div>