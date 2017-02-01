<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;  ">
   <div class="row" style="margin-left:30px; margin-right:30px;">
       <div class="col-sm-12">
           <header class="panel-heading font-bold">Table <?php echo $table; ?>
           	<div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Column Logic" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> 
              	 </div>
           </header>
           <section class="panel">
               
               <div class="panel-body">


                <form  action="<?php echo site_url("crud/crud_generator/process_conds/$table"); ?>" method="post" enctype="multipart/form-data">
                 

               	<?php foreach ($fields as $key) : ?>

               	   <div class="sup-contacts m-t" >

               		<?php echo $key->name; ?>


               		<select name="<?php echo $key->name; ?>" class="form-control">
               		   <option value="0">Please select</option>
               		                              
               		    <option value="pmtext"> Plain Text</option>
               		     <option value="pmtextbox"> Text Box</option>
               		      <option value="pmdate"> Date</option>
               		       <option value="pmtext"> Number</option>
               		        
               		    
               		</select>

               		<div class="form-group">
               		    <label>Helper Instructions</label>
               		    <div class="igs-small"></div>
               		    <input name="<?php echo $key->name; ?>-helper" type="text"  class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top"  value="">
               		</div>
               		
               		<label><input type="checkbox" name="<?php echo $key->name ?>-check" value="1" /> Required?</label>


               		<br/>
               		</div>


               <?php endforeach; ?>
               		
               	<button type="submit" class="btn btn-purplet btn-s-xs pull-right m-t" id="">
               		    <i class="fa fa-check"></i> <strong>Save and process information</strong>
               	</button>
               	
                </form>
               	

               </div>
           </section>
       </div>
       
   </div>
</div>