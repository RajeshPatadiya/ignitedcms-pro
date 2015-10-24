<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:50px; max-width:1170px; min-height:500px;  ">
  <div class="row" style="margin-left:30px; margin-right:30px;">
  	<div class="col-sm-6">
  	    <header class="panel-heading font-bold">Contact Us</header>
  	    <section class="panel">
  	        
  	        <div class="panel-body">

  	        	<?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('contact/contact_form',$atts); ?>
  	        	
  	        	<div class="form-group">
  	        	    <label>Name</label>
  	        	    <input name="name" type="text" data-required="true" data-maxlength="20" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Your name" value="">
  	        	</div>

  	        	<div class="form-group">
  	        	    <label>Email</label>
  	        	    <input name="email" type="text" data-type="email"  data-required="true" data-maxlength="20" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Your email address" value="">
  	        	</div>

  	        	<div class="form-group">
  	        	    <label>Contact Number</label>
  	        	    <input name="contact" type="text" data-required="true" data-maxlength="20" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Contact Number" value="">
  	        	</div>

  	        	<div class="form-group">
  	        	    <label>Message</label>
  	        	    <textarea name="message"  id="inp-box" class="form-control" rows="5" data-maxlength="500" data-required="true" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Your message"></textarea>
  	        	
  	        	</div>
  	        	


  	        	<button type="submit" class="btn btn-purplet btn-s-xs " id=""><strong>ok</strong></button>
  	        	



  	        	<?php echo form_close(); ?>

  	        </div>
  	    </section>
  	</div>
  	
  </div>

  <div class="gap"></div>
</div>