<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:900px;  ">
    

    <!-- breadcrumb -->
       <div class="row" style="margin-left:30px; margin-right:30px;">
          <div class="col-sm-12">
            <!-- .breadcrumb -->
            <ul class="breadcrumb">
              <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> <?php echo ('Dashboard'); ?></a></li>
              <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('name');?></a></li>
              
            </ul>
                  
            </div>
        </div> 
        <!-- end breadcrumb -->


    <div class="row" style="margin-left:30px; margin-right:30px;">
     
       <div class="col-sm-12">
           <header class="panel-heading font-bold">Design your field Layout</header>
        
           <section class="panel">
               
               <div class="panel-body">
                <ul id="sortable1" class="connectedSortable"> 
                  <li class="ui-state-default">
                    walk
                  
                    <div class="fa fa-gear pull-right" 
                      data-toggle="popover" data-html="true" 
                      data-placement="top" 
                      data-content='<?php echo anchor('login/logout', 'Yes'); echo nbs(30); echo anchor('login/logout', 'No', 'attributs');?>' 
                      title="" 
                      data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Make required'>   
                    </div>
                  </li>
                  
                </ul>
                 
                

               </div>
           </section>
       </div>

        <div class="col-sm-12">
           <header class="panel-heading font-bold">All available fields (not in use)</header>
           <section class="panel">
               
               <div class="panel-body">
                <div class="form-group">
                 
                <ul id="sortable2" class="connectedSortable"> 
                  <li class="ui-state-highlight">
                    <div class="pull-right" ><i class="fa fa-gear"></i></div>talk
                  </li>
                  <li class="ui-state-highlight">
                    <div class="pull-right" ><i class="fa fa-gear"></i></div>balk
                  </li>
                  
                </ul>
              </div>

                <div class="clearfix"></div>
                <div class="small-gap"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-purplet btn-s-xs " id=""><strong>Save</strong> </button>
                
                </div>
                

               </div>
           </section>
       </div>
       
    </div>

</div>