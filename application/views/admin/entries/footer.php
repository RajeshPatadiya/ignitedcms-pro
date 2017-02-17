          
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

   <!-- Sortable -->
  <script src="<?php echo(base_url()."resources") ?>/js/sortable/jquery.sortable.js"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/nestable/jquery.nestable.js" cache="false"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/nestable/demo.js" cache="false"></script>

  


 <script type="text/javascript">

    // removes MS Office generated guff
    function cleanHTML(input) {
      // 1. remove line breaks / Mso classes
      var stringStripper = /(\n|\r| class=(")?Mso[a-zA-Z]+(")?)/g; 
      var output = input.replace(stringStripper, ' ');
      // 2. strip Word generated HTML comments
      var commentSripper = new RegExp('<!--(.*?)-->','g');
      var output = output.replace(commentSripper, '');
      var tagStripper = new RegExp('<(/)*(meta|link|span|\\?xml:|st1:|o:|font)(.*?)>','gi');
      // 3. remove tags leave content if any
      output = output.replace(tagStripper, '');
      // 4. Remove everything in between and including tags '<style(.)style(.)>'
      var badTags = ['style', 'script','applet','embed','noframes','noscript'];
      
      for (var i=0; i< badTags.length; i++) {
        tagStripper = new RegExp('<'+badTags[i]+'.*?'+badTags[i]+'(.*?)>', 'gi');
        output = output.replace(tagStripper, '');
      }
      // 5. remove attributes ' style="..."'
      var badAttributes = ['style', 'start'];
      for (var i=0; i< badAttributes.length; i++) {
        var attributeStripper = new RegExp(' ' + badAttributes[i] + '="(.*?)"','gi');
        output = output.replace(attributeStripper, '');
      }
      return output;
    }
   
    $(document).ready(function (event) {

      var gLob = "";

      $('.t-edit').click(function (event) {
           $('#r-editor').slideDown();
           var handle = $(this).attr("uid");
           var conc = "#" + "tmp-" + handle;

           gLob = conc;

            $('#editor').html($(gLob).html());
        });

      $('#r-edit').click(function (event) {
         var kTmp =  $('#editor').html().trim();
         $(gLob).html(kTmp);

         $('#r-editor').slideUp();
      });
      
       $('#rich-close').click(function (event) {
         

         $('#r-editor').slideUp();
      });



      $("#save").click(function (event) {

        $( ".rich" ).each(function( index ) {



          var handle = $(this).attr("uid");
          var conc = "#" + handle;

          $(conc).val(cleanHTML($(this).html()));
         
        
        });

      });

      // upload from lib
      $(".add-asset").click(function (event) {
         $('#hidden-upload').slideDown();

         
         var handle = $(this).attr("uid");
         
         
       

         $("#fieldname").val(handle);
         $("#fieldname2").val(handle);

      });

      $('#a-close').click(function (event) {
         

         $('#hidden-upload').slideUp();
      });

      // new upload
      $(".m-asset-new").click(function (event) {
         $('#hidden-upload2').slideDown();

         
         var handle = $(this).attr("uid");
         
         
       

         $("#fieldname").val(handle);
         $("#fieldname2").val(handle);

      });

      $('#m-close').click(function (event) {
         

         $('#hidden-upload2').slideUp();
      });

      

      $(".remo").click(function (event) {
         var tmp_id = $(this).attr("uid");
         var kit = $('#im-im').val();

         var fit = kit.replace(tmp_id,'');
         alert(fit);
      });

     

     
        
    });
</script>
</body>
</html>