          
                    <?php $this->load->view('admin/footer-map'); ?>
                </section>        
            </section> 
        </section>
    </section>
    <!-- /.vbox -->
  </section>
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
  

  


 <script type="text/javascript">
   
    $(document).ready(function (event) {

      var tmp = "<?php echo $protocol; ?>";
      
      if (tmp == "smtp")
      {
        $('.pm-protocols').show();
      }

      $('#roles').val("<?php echo $protocol; ?>");

     
    $('#roles').change(function(){
        if($('#roles').val() == 'smtp') {
            $('.pm-protocols').slideDown();
            $('#proto').val("smtp");
        } else {
            $('.pm-protocols').slideUp(); 
            $('#proto').val("phpmail");
        } 
    });
        
    });
</script>
</body>
</html>
