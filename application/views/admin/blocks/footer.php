          
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
  
  <!-- wysiwyg -->
  <script src="<?php echo(base_url()."resources") ?>/js/wysiwyg/jquery.hotkeys.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/wysiwyg/bootstrap-wysiwyg.js" type="text/javascript" ></script>
  <script src="<?php echo(base_url()."resources") ?>/js/wysiwyg/demo.js" type="text/javascript"></script>
  <!-- markdown -->

  


 <script type="text/javascript">
   
    $(document).ready(function (event) {

      //important to use on for dynamic builder
      $('.pertain').on('click', '.green-block', function (event) {
      
        $(".green-block").removeClass("highlight");
        $(this).addClass('highlight');
      });

      $("#block-add").click(function (event) {



        data = '<div class="green-block"> <div class="green-block-title">(blank)</div> </div>';
        $('.pertain').append(data);

       
         $.ajax({
                    url: '<?php echo site_url("admin/blocks/rich"); ?>',
                    type: 'post',
                    data: {richText:'richText'},
                  
                    success: function (data) {
                        $('.tepid').append(data);

                    }
                });

        
      });

      var counter = "<?php echo $counter; ?>"

      

      // dropbox
      $('#add-block').click(function (event) {
            counter++;
            data = '<div class="form-group"><input name="opts-name'+counter+'" type="text"  data-maxlength="200" class="form-control" placeholder="Type option here" data-toggle="tooltip" data-placement="top" title="" value=""></div>';
              $('#my-content').append(data);
                 
        });

      // checkbox
      $('#add-block2').click(function (event) {
              counter++;
              data = '<div class="form-group"><input name="opts-name'+counter+'" type="text"  data-maxlength="200" class="form-control" placeholder="Type option here" data-toggle="tooltip" data-placement="top" title="" value=""></div>';

              $('#my-content2').append(data);
                 
        });

      var tmp = "<?php echo $type; ?>";
      var tmp2 = ".pm-" + tmp;
      
      
      $('#type').val(tmp);
     

      $(tmp2).show();
            

      $('.tepid').on('change', '#type', function (event) {
      
        if($('#type').val() == 'plain-text') {
            $('.pm-plain-text').slideDown();
            
        } else {
            $('.pm-plain-text').slideUp(); 
            
        } 
        if($('#type').val() == 'file-upload') {
            $('.pm-file-upload').slideDown();
            
        } else {
            $('.pm-file-upload').slideUp(); 
            
        } 

        if($('#type').val() == 'number') {
            $('.pm-number').slideDown();
            
        } else {
            $('.pm-number').slideUp(); 
            
        } 

        if($('#type').val() == 'drop-down') {
            $('.pm-drop-down').slideDown();
            counter = 0;
            
        } else {
            $('.pm-drop-down').slideUp(); 

            $('#my-content').empty();
            $('#my-content2').empty();
            
        }

         if($('#type').val() == 'check-box') {
            $('.pm-check-box').slideDown();
            counter = 0;
            
        } else {
            $('.pm-check-box').slideUp(); 

            $('#my-content2').empty();
            $('#my-content').empty();
        }  

    });
        
    });
</script>
</body>
</html>