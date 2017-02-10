<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;   ">
  <div class="row" style="margin-left:40px; margin-right:40px;">
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

	<!-- breadcrumb -->
	   <div class="row" style="margin-left:30px; margin-right:30px;">
	      <div class="col-sm-12">
	        <!-- .breadcrumb -->
	        <ul class="breadcrumb">
	          <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo "Dashboard"; ?></a></li>
	          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Help');?></a></li>
	          
	        </ul>
	              
	        </div>
	    </div> 
	    <!-- end breadcrumb -->

  <div class="row" style="margin-left:30px; margin-right:30px;">
  		<div class="col-sm-4">
  		    
  		    <section class="panel">
  		        
  		        <div class="panel-body">
  		        	<h3 class="">Documentation</h3>
  		        	<?php $this->load->view('admin/help/menu'); ?>
  		        </div>
  		    </section>
  		</div>
  		<div class="col-sm-8">
  		    
  		    <section class="panel">
  		        
  		        <div class="panel-body" style="padding:30px; font-size:15px; line-height:24px;">
  		        	<h3 class="purplet">Templating</h3>
                Once you familiarise yourself with the concepts of fields, sections and entries you
                can start writing your own front end templates. At the heart of the ignitedcms engine is
                a simplified php template engine. A front end way of getting data out and dumping it to your views.

                <br/><br/>
                There are only a few rules. You must include a _layout.php and _footer.php file which lives in the root of
                the views folder.  You 
                can of course customise this to your own style and even include external css and js files.
                But you MUST not rename or delete this file. It is the heart, if you like, of the main engine.


                As soon a you create a section, the name of your section will form the php name. For example,if you created a section called home, you need to create a php file called home.php inside your custom folder. <br/><br/>

                Your section template <strong>MUST</strong> contain a file called _layout.php template and a footer file called _footer.php both placed at the <strong>root</strong> of the views folder. Typically the header will call all the css styles and the footer will contain the javascript files. <br/><br>
                <pre><?php echo trim(my_html_escape('
<?php $this->load->view("_layout"); ?>
<?php $this->load->view("_footer"); ?>')); ?>
</pre> 

                Let's say you have a text field in your section called title. <br/><br/>

                To output this in home.php all you would do is write <br/><br/>

                <pre><?php echo trim(my_html_escape('
<?= $title ?>
')); ?>
</pre> 
  		      <br/>And this will dump the content of that field into the home template. Pretty nifty!
              But if this all seems like too much manual work, relax, all you have to do is click the 
              boiler plate generator link when you are inside your template and the ignitedCMS engine will
              manually create the file and subdirectory if necessary. <br/><br/>

              It really doesn't get any easier than this!

  		        </div>
  		    </section>
  		</div>
  		
  </div>
</div>
<div class="gap"></div>

