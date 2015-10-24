<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:50px; max-width:1170px;  ">



  <div class="row" style="margin-left:30px; margin-right:30px;">
     <?php if($this->session->flashdata('msg')) {?>
                 
         <?php if($this->session->flashdata('type') =='0') { ?>
     
         <div class="animated fadeOut alert alert-danger">
     
         <?php } else {?>
         <div class="animated fadeOut alert alert-success">
             <?php } ?>
             <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
             </button> <i class="fa fa-ban-circle"></i>
             <?php echo $this->session->flashdata('msg');?>
         </div>
     <?php } ?>
  </div>

    <?php $mystyle=array( 'style'=> 'color:#b07db1; font-weight:bold; ' ); ?>
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-lg-12">
            <div class="blog-post">
                <?php foreach ($blogs->result() as $row): ?>
                <div class="post-item">
                    <div class="post-media">
                        <?php $my_image=$row->picture; ?> <img src="<?php echo base_url("img/uploads/$my_image"); ?>" class="img-responsive my-center"> 
                    </div>
                    <div class="caption wrapper-lg">
                        <h3 class="post-title purplet"><?php echo $row->title; ?></h3>
                        <div class="post-sum">
                            <p>
                                <?php echo ($row->content); ?>
                            </p>
                        </div>
                        <div class="line line-lg"></div>
                        <div class="text-muted"> <i class="fa fa-user icon-muted"></i> by
                            <?php echo 'Admin';?> <i class="fa fa-clock-o icon-muted"></i>
                            <?php echo(my_pretty_date($row->blog_date)); ?> 
                        </div>
                    </div>
                </div>
                <div class="gap"></div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>