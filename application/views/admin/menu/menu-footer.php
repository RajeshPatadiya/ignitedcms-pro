          
    <?php $this->load->view('admin/footer-map'); ?>
    </section>        
  </section> 
  
  </section>
    </section>
    <!-- /.vbox -->
  </section>
  <!-- jquery -->
  <script src="<?php echo(base_url()."resources") ?>/js/jquery.min.js" type="text/javascript"></script>
  <!-- Bootstrap -->
  <script src="<?php echo(base_url()."resources") ?>/js/bootstrap.js" type="text/javascript"></script>

  <!-- jqueryui -->
    <script src="<?php echo(base_url()."resources") ?>/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
  <!-- app -->
  <script src="<?php echo(base_url()."resources") ?>/js/app.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/app.plugin.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/app.data.js" type="text/javascript"></script>
  <!-- fuelux -->
  <script src="<?php echo(base_url()."resources") ?>/js/fuelux/fuelux.js" type="text/javascript"></script>
 
  <!-- Sortable -->
  <script src="<?php echo(base_url()."resources") ?>/js/sortable/jquery.sortable.js"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/nestable/jquery.nestable.js" cache="false"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/nestable/demo.js" cache="false"></script>


  <script type="text/javascript">
 
  
  $(document).ready(function(event) 
  {
   

        var holder = "";

       

        $('#savetodatabase').click(function(event){
       
          var data1 = $('#start').html();
 
          $.ajax({
              type: "POST",
              url: "<?php echo site_url('admin/menu/save_to_database'); ?>",
              data: ({'data1':data1}),
              dataType: "html",
              
              success: function(result) {

                  $('#err-msg').fadeIn("slow").fadeOut("slow");

              }
            });

        });

       

        

         /*important need to use on for dynamic dom!!!*/
         $('#start').on('click', '#remove', function (event) {

            var holder_val = $(this).attr('u_id');
           
            $('#'+holder_val).remove();
        });
         
        
  
  });

  </script>

