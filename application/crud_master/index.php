<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;  ">

    <?php $this->load->view('{{table}}/breadcrumb-all'); ?>
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <header class="panel-heading font-bold">All {{table}}
                <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="All {{table}}" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> </div>
            </header>
            <section class="panel">
                <div class="panel-body">

                     <div class="row">
                        <div class="col-sm-10">
                            
                          
                        </div>
                        <div class="col-sm-2">
                            <a href="<?php echo site_url('admin/{{table}}/new_{{table}}_view'); ?>">
                                <button type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
                                <i class="fa fa-plus"></i> <strong>New {{table}}</strong></button>
                            </a>
                        </div>
                    </div>
                    <div class="line"></div>
                    
                    <div class="table-responsive" style="margin-top:0px;">
                        <table class="table table-striped b-t text-sm" id="example">
                            <thead>
                                <tr>
                                    {{header}}
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query->result() as $key): ?>
                                <tr>
                                    {{table_content}}
                                    <td>
                                        <?php echo anchor( "admin/{{table}}/edit_{{table}}_view/$key->id", 'Edit'); ?>
                                        <?php echo anchor( "admin/{{table}}/delete_{{table}}/$key->id", 'Delete'); ?> </td>
                                </tr>
                                <?php endforeach; ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

