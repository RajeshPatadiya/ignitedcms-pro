<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:900px;  ">
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <header class="panel-heading font-bold">Dashboard</header>
            <div class="panel">
                <div class="panel-body">
                    <div class="row my-pad">
                        <?php echo my_render_dashboard(); ?>
                        <a href="<?php echo site_url('admin/help'); ?>">
                            <div class="col-sm-4 my-pad-top">
                                <div class="my-blk">
                                    <i class="fa fa-question big"></i>
                                    <div class="my-info">Help</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>