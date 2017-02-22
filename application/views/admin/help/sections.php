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
  		        	<h3 class="purplet">Sections</h3>
                Sections is another concept you have to understand. Essentially all they do is contain your created fields.
                Simply drag and drop the fields you require into your section and make them required if necessary.

                <br/><br/>
                <strong>Types</strong> <br/>
                Sections have three main types, singles, which are individual pages, multiples which can be like posts or products and globals - as the name suggests these can be accessed on any page in your templates and are useful for setting your site's main look and feel.

                <br/><br/>
                <strong>Singles and Multiples</strong> <br/>
                The main difference between a single and a multiple section type is that a multiple section type must have a folder with the section name and MUST contain a php file called _entry.php. This will act as the detail page, for example if you imagine your browsing a blog and you click on one post it goes into the detail view. <br/><br/>

                <pre><?php echo trim(my_html_escape('
-- blog(Folder)
---- _entry.php(File)
---- index.php(File)
')); ?>
</pre>   

                <br/><br/>
                If you are unsure of the folder and file layout of a multiple, simply click the boiler plate template generator and it will generate the folder structure and files in your view file. Then you can simply inspect them with your favourite text editor (we recommend either sublime or atom) and edit these files.

                <br/><br/>
                When you create a new 'Multiple' section you can loop through all the entries in the index.php file by using the following syntax.<br/><br/>
<pre><?php echo trim(my_html_escape('
<?php foreach ($multiples["blog"] as $key) : ?>
    <a href="<?= $key["url"] ?>"><?= $key["title"] ?></a> <br/>
  <?php endforeach; ?>
')); ?>
</pre>   


                <br/><br/>
                <strong>Globals</strong> <br/>
                Globals are very similar to singles, in that you create the fields and section as you would normally, the only difference is you store the content by clicking on the global (world) icon in your dashboard. 

                <br/><br/>
                Accessing global content in your template files is slightly different. Instead of doing : <br/>
<pre><?php echo trim(my_html_escape('
<?= fieldHandle ?>
')); ?>
</pre>   <br/>You would do: <br/>
<pre><?php echo trim(my_html_escape('
<?= $globalName["fieldHandle"] ?>
')); ?>
</pre>   
<br/> To access global assets simply do
<pre><?php echo trim(my_html_escape('
<?= $globalName["fieldHandle"] ?>
')); ?>
</pre>   


<br/> The beauty about globals is that they can be accessed on <strong>ANY</strong> page in your template.



  		        </div>
  		    </section>
  		</div>
  		
  </div>
</div>
<div class="gap"></div>