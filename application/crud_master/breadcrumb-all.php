<!-- breadcrumb -->
   <div class="row" style="margin-left:30px; margin-right:30px;">
      <div class="col-sm-12">
        <!-- .breadcrumb -->
        <ul class="breadcrumb">
          <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> Dashboard </a></li>
          <li class='active'><a href="<?php echo site_url('admin/{{table}}'); ?>"><i class="fa fa-list-ul"></i> <?php echo $this->uri->segment(2, 0); ?></a></li>
          
        </ul>
              
        </div>
    </div> 
    <!-- end breadcrumb -->