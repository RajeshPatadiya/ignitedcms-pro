<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:900px;  ">
	<div class="row" style="margin-left:30px; margin-right:30px;">
		<div class="col-sm-12">
		    <header class="panel-heading font-bold">Dashboard</header>
		    <section class="panel">
		        

		        <div class="panel-body">
		        	
		        	<div class="row " >
		        		
		        		<?php echo my_render_dashboard(); ?>

		        		
		        		<?php  $file_path = base_url("img/dashboard") . "/help.svg"; ?>

		        		<a href="<?php echo site_url('admin/help'); ?>">
			        		<div class="col-sm-2 my-pad-top">
			        			<img class='img-responsive my-center' src='<?php echo $file_path; ?>' alt='image'>
			        				 <div class="igs-label">Help</div>

			        			
			        		</div>
		        		</a>
		        		
		        		
		        	
		        	
		        </div>
		    </section>
		</div>
		
	</div>



</div>