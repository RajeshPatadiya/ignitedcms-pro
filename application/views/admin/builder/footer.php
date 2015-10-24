          
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
 
  <!-- parsley -->
  <script src="<?php echo(base_url()."resources") ?>/js/parsley/parsley.min.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/parsley/parsley.extend.js" type="text/javascript"></script>

  <!-- wysiwyg -->
  <script src="<?php echo(base_url()."resources") ?>/js/wysiwyg/jquery.hotkeys.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/wysiwyg/bootstrap-wysiwyg.js" type="text/javascript" ></script>
  <script src="<?php echo(base_url()."resources") ?>/js/wysiwyg/demo.js" type="text/javascript"></script>
  <!-- markdown -->
  


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


        $('#r-add').click(function (event) {
            alert($('#editor').html());
        });

        $('#rrr').click(function (event) {
           $('#my-rich-text').slideDown();
        });

        $('#rich-close').click(function (event) {
           $('#my-rich-text').slideUp();
        });

        /*save to the shorttag div image*/
        $('#sortable').on("click", '.pp-img', function (event) {
            var tmp = $(this).attr("mid");
            var tmp2 = $(this).attr("mpath");
            var tmp3 = ($('#' + tmp).attr('mwidth'));
            var tmp4 = "[col foo='" + tmp3 + "'][img src='"+tmp2+"'][/col]";
            
            $('#shorttag-' + tmp).text(tmp4);
        });

        

         /*save to the shorttag div text*/
        $('#sortable').on("click", '.pp-text', function (event) {
            var tmp = $(this).attr("mid");
            var tmp2 = ($('#inp-' + tmp).val());
            var tmp3 = ($('#' + tmp).attr('mwidth'));
            var tmp4 = "[col foo='" + tmp3 + "']" + tmp2 + "[/col]";
            $('#shorttag-' + tmp).html(tmp4);
        });

        $('#sortable').on("mousemove", '.move', function (event) {
            $("#sortable").sortable({
                handle: $('.handle'),
                tolerance: 'pointer',
                placeholder: 'placeholder',
                update: function () {
                    var content = $(this).text();
                    //alert(content);
                },
                //the function below dynamically changes the 
                //width of the placeholder depending on which
                //item is being dragged
                start: function (e, ui) {
                    ui.placeholder.width(ui.item.width());
                }
            }).disableSelection();
        });
        $('#sortable').on("click", '.remove', function (event) {
            var id = $(this).parent("header").parent("div").attr("id");
            $('#' + id).remove();
        });
        $('#sortable').on("click", '.shrink', function (event) {
            var id = $(this).parent("header").parent("div").attr("id");
            var my_width = $(this).parent("header").parent("div").attr("mwidth");
            var tmp = parseInt(my_width);
            //check to make sure max columns
            //is not exceeded
            if (tmp > 2) {
                tmp = tmp - 1;
                var f = "col-sm-" + tmp.toString();
                $('#' + id).attr("class", f);
                $('#' + id).attr("mwidth", tmp);
            }

            




        });
        $('#sortable').on("click", '.grow', function (event) {
            var id = $(this).parent("header").parent("div").attr("id");
            var my_width = $(this).parent("header").parent("div").attr("mwidth");
            var tmp = parseInt(my_width);
            //alert(tmp+1);
            //check to make sure max columns
            //is not exceeded
            if (tmp < 12) {
                tmp = tmp + 1;
                var f = "col-sm-" + tmp.toString();
                $('#' + id).attr("class", f);
                $('#' + id).attr("mwidth", tmp);
            }

            

        });
        $('#add-rich').click(function (event) {

            var richText = "";
            richText = cleanHTML($('#editor').html());

            

            $.ajax({
                    url: '<?php echo site_url("admin/shortcodes/rich"); ?>',
                    type: 'post',
                    data: {richText:richText},
                    success: function (data) {
                        $('#sortable').append(data);
                    }
                });
        });

         $('#add-block').click(function (event) {
            $.ajax({
                    url: '<?php echo site_url("admin/shortcodes/box"); ?>',
                    type: 'post',
                    data: {},
                    success: function (data) {
                        $('#sortable').append(data);
                    }
                });
        });

        $('#add-slider').click(function (event) {
            $.ajax({
                    url: '<?php echo site_url("admin/shortcodes/slider"); ?>',
                    type: 'post',
                    data: {},
                    success: function (data) {
                        $('#sortable').append(data);
                    }
                });
        });

        $('#add-image').click(function (event) {

            $('#assets').slideDown();

        });

        $('#add-code').click(function (event) {
            $.ajax({
                    url: '<?php echo site_url("admin/shortcodes/code"); ?>',
                    type: 'post',
                    data: {},
                    success: function (data) {
                        $('#sortable').append(data);
                    }
                });
        });

        $('.ig-click').click(function (event) {

            $('#assets').slideUp();
            var id = $(this).attr('id');

            $.ajax({
                    url: '<?php echo site_url("admin/shortcodes/image"); ?>',
                    type: 'post',
                    data: {id:id},
                    success: function (data) {
                        $('#sortable').append(data);
                    }
                });
        });



        $('#insert').click(function (event) {
           $('#assets').slideUp();
        });

         $('#asset-close').click(function (event) {
           $('#assets').slideUp();
        });

         $('#cust-controller').click(function (event) {
           $('#path').toggle();
        });

         /*make checkboxes behave like radio control
         $(".b-box").click(function() {
            selectedBox = this.id;

            $(".b-box").each(function() {
                if ( this.id == selectedBox )
                {
                    this.checked = true;
                }
                else
                {
                    this.checked = false;
                };        
            });
        }); */   


        $('#save-db').click(function (event) {
            
            /*loop through all the shorttags and save*/
            var tag = "";
            $(".shorttag").each(function () {
                tag = tag + $(this).html();
            });
            var content = $('#sortable').html();
            var shorttag = tag;
            $.ajax({
                url: '<?php echo site_url("admin/shortcodes/save_to_database"); ?>',
                type: 'post',
                data: {
                    content: content,
                    shorttag: shorttag,
                    pageid: '<?php echo $id; ?>'
                },
                success: function (data) {
                    alert('done');
                }
            });
        });
    });
</script>

</body>
</html>
