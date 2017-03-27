          
                        <?php $this->load->view('admin/footer-map'); ?>
                    </div>        
                </div> 
            </div>
        </div>
    </div>
    <!-- /.vbox -->
  </div>
  <!-- jquery -->
  <script src="<?php echo(base_url()."resources") ?>/js/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
  <!-- Bootstrap -->
  <script src="<?php echo(base_url()."resources") ?>/js/bootstrap.js" type="text/javascript"></script>
  <!-- app -->
  <script src="<?php echo(base_url()."resources") ?>/js/app.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/app.plugin.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/app.data.js" type="text/javascript"></script>
  <!-- fuelux -->
  <script src="<?php echo(base_url()."resources") ?>/js/fuelux/fuelux.js" type="text/javascript"></script>
  <!-- datepicker -->
  <script src="<?php echo(base_url()."resources") ?>/js/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- combodate -->
  <script src="<?php echo(base_url()."resources") ?>/js/libs/moment.min.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/combodate/combodate.js" type="text/javascript"></script>

  <!-- parsley -->
  <script src="<?php echo(base_url()."resources") ?>/js/parsley/parsley.min.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/parsley/parsley.extend.js" type="text/javascript"></script>

  
  <script src="<?php echo(base_url()."resources") ?>/js/jscolor/jscolor.js" type="text/javascript"></script>
  
  <!-- datatables -->
  <script src="<?php echo(base_url()."resources") ?>/js/datatables/jquery.dataTables.min.js" type="text/javascript"></script>

   <!-- smart menus -->
   <script src="<?php echo(base_url()."resources") ?>/js/jquery.smartmenus.js"></script>


 <script type="text/javascript">
   
     $(document).ready(function (event) {

      // SmartMenus init
$(function() {
  $('#main-menu').smartmenus({
    mainMenuSubOffsetX: -1,
    subMenusSubOffsetX: 10,
    subMenusSubOffsetY: 0
  });
});

// SmartMenus mobile menu toggle button
$(function() {
  var $mainMenuState = $('#main-menu-state');
  if ($mainMenuState.length) {
    // animate mobile menu
    $mainMenuState.change(function(e) {
      var $menu = $('#main-menu');
      if (this.checked) {
        $menu.hide().slideDown(250, function() { $menu.css('display', ''); });
      } else {
        $menu.show().slideUp(250, function() { $menu.css('display', ''); });
      }
    });
    // hide mobile menu beforeunload
    $(window).bind('beforeunload unload', function() {
      if ($mainMenuState[0].checked) {
        $mainMenuState[0].click();
      }
    });
  }
});

$('#example').dataTable( {
      
    });

         
        
    });
</script>
</body>
</html>
