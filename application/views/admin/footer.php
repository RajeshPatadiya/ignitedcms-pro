          
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
  

  <!-- datatables -->
  <script src="<?php echo(base_url()."resources") ?>/js/datatables/jquery.dataTables.min.js" type="text/javascript"></script>


  <!-- lightbox -->
  <script src="<?php echo(base_url()) ?>Responsive-Lightbox/jquery.lightbox.js"></script>


  <!-- growl -->
  <script src="<?php echo(base_url()."resources") ?>/jquery.growl/javascripts/jquery.growl.js" type="text/javascript"></script>


 <script type="text/javascript">
   
    $(document).ready(function (event) 
    {

      // this needs to be dynamically generated

      <?php if($this->session->flashdata('msg')) {?>
                  
          <?php if($this->session->flashdata('type') =='0') { ?>
              
              $.growl.error({ message: "<?php echo $this->session->flashdata('msg');?>" });
          
          <?php } ?>

          <?php if($this->session->flashdata('type') =='1') { ?>
              
              $.growl.notice({ message: "<?php echo $this->session->flashdata('msg');?>" });
          
          <?php } ?>
      <?php } ?>


          
        
    });


   $('#example').DataTable();


       /*do the gallery*/
    $(function() 
    {
      $('.gallery a').lightbox(); 
    });



  


</script>
</body>
</html>
