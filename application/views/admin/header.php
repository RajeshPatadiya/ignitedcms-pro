<!DOCTYPE html>
<html lang="en" class=" js no-touch no-android chrome no-firefox no-iemobile no-ie no-ie10 no-ios">

<head>
    <meta charset="utf-8">
    <title>Crud Builder</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style>
        .file-input-wrapper {
            overflow: hidden;
            position: relative;
            cursor: pointer;
            z-index: 1;
        }
        .file-input-wrapper input[type=file],
        .file-input-wrapper input[type=file]:focus,
        .file-input-wrapper input[type=file]:hover {
            position: absolute;
            top: 0;
            left: 0;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
            z-index: 99;
            outline: 0;
        }
        .file-input-name {
            margin-left: 8px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/bootstrap.css" type="text/css">

    


    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/animate.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/font.css" type="text/css" cache="false">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/js/fuelux/fuelux.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/js/datatables/datatables.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/js/datepicker/datepicker.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/js/nestable/nestable.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/plugin.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/app.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/superfish.css" media="screen">

    <!-- growl -->
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/jquery.growl/stylesheets/jquery.growl.css" media="screen">
    

     <!-- responsive lightbox -->
   <link rel="stylesheet" type="text/css" href="<?php echo (base_url())?>Responsive-Lightbox/jquery.lightbox.css">
    <link rel="stylesheet" href="<?php echo (base_url())?>Responsive-Lightbox/demo/demo.css">

    <!--[if lt IE 9]>
    <script src="<?php echo (base_url()."resources")?>/js/ie/respond.min.js" cache="false"></script>
    <script src="<?php echo (base_url()."resources")?>/js/ie/html5.js" cache="false"></script>
    <script src="<?php echo (base_url()."resources")?>/js/ie/fix.js" cache="false"></script>
  <![endif]-->
    <style type="text/css">

      


        /*for the datatable pagination*/
        .paginate_disabled_previous{

            margin-top: 5px;
            padding: 5px;
            color: #ffffff;
            border-radius: 2px;
            background-color: #289df2;
            border:  1px solid;
            border-color: rgb(13, 116, 185);
            font-weight: bold;
            font-size: 12px;
            cursor: pointer;

        }

        .paginate_disabled_next{
            margin-top: 5px;
            margin-left: 5px;
            padding: 5px;
            color: #ffffff;
            border-radius: 2px;
            background-color: #289df2;
            border:  1px solid;
            border-color: rgb(13, 116, 185);
            font-weight: bold;
            font-size: 12px;
            cursor: pointer;
        }


        /*overwrite table headers*/

        .table > tbody + 
        tbody {
             border-top: 0px solid #ddd; 
        }


        .table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td {
          padding: 4px;
          line-height: 25px;
          vertical-align: top;
          border-top: 1px solid #ddd;


        }

        .panel .table-striped > thead th {
          background: -webkit-linear-gradient(#fff, #f4faff);
            background: linear-gradient(#fff, #f4faff);
          border-right: 1px solid #ddd;
          color: #999;
        }






        /*end*/


        /*light green shading*/
        .m-lg
        {
            background-color: #dbf2db;
            padding:2px;

        }

        .t-s{
            font-size: 12px;
            line-height: 20px;
        }

        /*small right padding*/
        .m-r{

            margin-right: 5px;
        }

        /*small left padding*/
        .m-l{

            margin-left: 50px;
        }

        .m-t{
            margin-top: 30px;
        }


        /*overwrite table styles*/
        .text-sm{
            font-size: 14px;
            font-weight: bold;
            color: #666;

        }

        /*overright form control text size*/
        .form-control{
            font-size: 16px;
        }


       .datepicker{
            z-index: 1100;
        }

        .text-bold{
            font-weight: bold;
        }
 

        /*draw top left and bottom border for tabs*/

        .m-borders{
            border-left:  solid 2px #cacaca;
            border-right:  solid 2px #cacaca;
            border-bottom: solid 2px #cacaca;

        }


        .m-lb{

            background-color: #f6f9fc;
        }



        /*for teh spec on the artwork page*/
       .m-slide{



       }

       /*the actual prod description*/
       .m-slide-show{

        margin-top: 20px;
        background-color: #edf1f7;
        padding:10px;
        border-radius: 5px;
        font-size: 15px;
        /*color: rgb(13, 116, 185);*/

         color: #333;
        border: dashed 1px rgb(13, 116, 185);



       }


       /*the actual prod description*/
       .m-slide-show-2{

        margin-top: 20px;
        background-color: #edf1f7;
        padding:10px;
        border-radius: 5px;
        font-size: 15px;
        /*color: rgb(13, 116, 185);*/

         color: #333;
        border: dashed 1px rgb(13, 116, 185);



       }

       /*the actual prod description*/
       .m-slide-show-3{

        margin-top: 20px;
        background-color: #edf1f7;
        padding:10px;
        border-radius: 5px;
        font-size: 15px;
        /*color: rgb(13, 116, 185);*/

         color: #333;
        border: dashed 1px rgb(13, 116, 185);


       }



       /*the actual prod description*/
       .m-slide-show-4{

        margin-top: 20px;
        background-color: #edf1f7;
        padding:10px;
        border-radius: 5px;
        font-size: 15px;
        /*color: rgb(13, 116, 185);*/

         color: #333;
        border: dashed 1px rgb(13, 116, 185);



       }




       .quantity-b{
        background-color: #dce4f0;
        padding:10px;
        border-radius: 10px;
        
       /* color:#2895F1;*/


       }

       .fancy-btn
       {
            /*color: #fff !important;*/
            color: #007ee5 !important;;
            border-color: #007ee5;
            background-color: #fff;
            background: -webkit-linear-gradient(#fff, #f4faff);
            background: linear-gradient(#fff, #f4faff);



       }

       /*the edit supplier box*/
       #edit-suppliers{
        margin-top: 5px;
        padding: 5px;
        color: #ffffff;
        border-radius: 2px;
        background-color: #5dcff3;
        border:  1px solid;
        border-color: rgb(13, 116, 185);
        font-weight: bold;

       }


       #var-opts{

       
        padding: 30px;
        color: #ffffff;
        border-radius: 2px;
        background-color: rgb(1, 138, 223);
        border:  1px solid;
        border-color: rgb(13, 116, 185);
        min-height: 400px;





       }

       /*push the text down on artwork management*/
       .push-down{

         padding-top: 50px;

       }


       /*for the indesign icons on artwork history*/
       .smal{
        width: 90px;
         display:inline;

       }


       /*for the username*/
       .menu-options{

          cursor: pointer;
       }

       
        pre{
            
            color: #4486b8;
            font-size: 14px;
            background-color: #eef9fc;
        }

        /*small label text*/
        .igs-small{
            color: #47525d;
            font-size: 12px;
            line-height: 20px;
            
            

        }


        /*the suppliers style box*/
       .sup-box{

        background-color: #edf1f7;
        padding:10px;
        border-radius: 5px;
        min-height: 300px;
        color:#333;
        border: solid 1px rgb(13, 116, 185);


       }

       .sup-contacts{

        background-color: #edf1f7;
        padding:10px;
        border-radius: 5px;
        min-height: 100px;
        color:#333;
        border: solid 1px rgb(13, 116, 185);
        font-size: 16px;


       }
        


        .igs-label
        {
            text-align: center;
            font-weight: bold;
        }

        .breadcrumb{
           /* -webkit-box-shadow: 4px 6px 11px -2px rgba(136,157,189,1);
            -moz-box-shadow: 4px 6px 11px -2px rgba(136,157,189,1);
            box-shadow: 4px 6px 11px -2px rgba(136,157,189,1);*/
            border-color: #cacaca;
            font-weight: bold;
        }

        .top-bar{

            /*for the menu bar*/

            margin-left:auto; 
            margin-right:auto; 
            margin-top:30px; 
            max-width:1170px; 
            background-color:#fff; 
            padding:10px;
            padding-top: 20px; 
            border-radius:2px;
            border: solid 1px #ccc;

           /* -webkit-box-shadow: 4px 34px 74px -42px rgba(102,102,107,0.54);
            -moz-box-shadow: 4px 34px 74px -42px rgba(102,102,107,0.54);
            box-shadow: 4px 34px 74px -42px rgba(102,102,107,0.54);*/
        }

        .btn-info {
            color: #fff !important;
             background-color: rgb(1, 138, 223);
             border-color: rgb(13, 116, 185);
        }

        .btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .open .dropdown-toggle.btn-info {
            color: #fff;
           background-color: rgb(1, 138, 223);
             border-color: rgb(13, 116, 185);
        }


        /*For the big icons on dashboard*/
        .big{
            font-size: 30px;
            
        }

        .big-red{
            font-size: 30px;
            color:#f55b5e;
            
        }

        .big-green{
            font-size: 30px;
            color:#4caf50;
        }

        .my-pad{
            padding:20px;
        }

        .my-pad-top{

            padding:20px;
        }

        .my-blk{
            
            padding:10px;
            max-width: 200px;

            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
        }
        .my-info{
            /*display:inline-block;*/
            margin-left: 10px;
            font-weight: bold;
        }
        
        .my-center {
            margin-left: auto;
            margin-right: auto;

        }
        #tidy {
            max-width: 1080px;
            margin: 0 auto;
        }

        .small-gap{
            margin-top: 10px;
        }
        .gap {
            margin-top: 50px;
        }

        .large-gap{
            margin-top:150px;
        }
        body {
            /*old #dee5ea;*/
            background-color: #e4eaf2;
            font-family:  'Open Sans',sans-serif;
            font-size: 16px;
            line-height: 25px;
            color: #222;
            -webkit-font-smoothing: antialiased;
            /* Fix for webkit rendering */
        }

        .panel
        {
            -webkit-box-shadow: 4px 34px 74px -42px rgba(102,102,107,0.54);
            -moz-box-shadow: 4px 34px 74px -42px rgba(102,102,107,0.54);
            box-shadow: 4px 34px 74px -42px rgba(102,102,107,0.54);

            border-color: #cacaca;
        }

        .panel-heading{
            border-top:  1px solid #cacaca;
            border-left: 1px solid #cacaca;
            border-right:1px solid #cacaca;
            
        }
        

        .shorttag {
            /*display:none;*/
        }
        .pm-footer {
            background-color: #fff;
            min-height: 400px;
            bottom: 0px;
        }
        .footer-brand {
            color: #666;

        }
        .phone-number-bar {
            position: relative;
            min-height: 30px;
            font-size: 16px;
            background-color: #333;
        }
        .phone-number {
            position: relative;
            margin: 0 auto;
            max-width: 1170px;
        }
        .num {
            float: right;
            position: relative;
            padding-top: 5px;
            padding-right: 5px;
            color: #fff;
        }
        .social-media {
            margin-top: 5px;
        }
        .tab-content {
            background-color: #e4eaf2;
        }
        .pmf-container {
            position: relative;
            max-width: 1270px;
        }
        .pm-header {
            min-height: 150px;
            background-color: #B384A3;
            border-bottom: 1px solid #ccc;
        }
        .pm-btext {
            font-family: 'open sans';
            /*font-family: 'MuseoSans-500', sans-serif;*/
            color: #fff;
        }
        .logo {
            float: left;
            position: relative;
            
        }
        .logo-text {
            position: relative;
            top: 30px;
            margin-left: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        .head-outer {
            position: relative;
            background-color: #fff;
            /*box-shadow: 0 4px 4px rgba(0, 0, 0, .11);*/
            min-height: 90px;
            z-index: 999;

            -webkit-box-shadow: 4px 6px 11px -2px rgba(136,157,189,1);
            -moz-box-shadow: 4px 6px 11px -2px rgba(136,157,189,1);
            box-shadow: 4px 6px 11px -2px rgba(136,157,189,1);



        }
        .head {
            height: 80px;
            background-color: #fff;
            color: #333;
            max-width: 180px;
        }
        a {
            color: #2895F1;
            /*text-decoration: underline;*/
        }
        /*for the login button on menu*/
        a.stop:hover {
            background-color: rgb(1, 138, 223);
        }



        .red{
            color:#811607;
        }


        .purplet {
            /*color: #bc8dbe; */
            color: rgb(1, 138, 223);
        }
        .bg-purplet {
            background-color: rgb(1, 138, 223);
            color:#ffffff;
        }
        /*
        .Rounded_Rectangle_1 {
          border-width: 1px;
          border-color: rgb(13, 116, 185);
          border-style: solid;
          border-radius: 2px;
          background-color: rgb(1, 138, 223);
          position: absolute;
          left: 216px;
          top: 39px;
          width: 136px;
          height: 34px;
          z-index: 4;
        }*/


        /*style the tabs as white*/
        .m-white{

            background-color: #fff;
        }


        .btn-purplet {
            color: #fff !important;
            background-color: rgb(1, 138, 223);
             border-color: rgb(13, 116, 185);
        }

        .btn-black{
            color: #fff !important;
            background-color: #363636;
            border-color: #363636;
            
        }
        /*page builder styles*/
        .handle {
            display: inline;
            float: left;
            cursor: move;
        }
        .grow {
            display: inline;
            width: 20px;
            height: 20px;
            float: left;
            text-align: center;
            color: #666;
            cursor: pointer;
        }
        .shrink {
            display: inline;
            width: 20px;
            height: 20px;
            float: left;
            text-align: center;
            color: #666;
            cursor: pointer;
        }
        .remove {
            display: inline;
            width: 20px;
            height: 20px;
            float: right;
            text-align: center;
            color: #333;
            cursor: pointer;
        }
        #sortable {
            /*background-color: #cccccc;
            margin-left: 20px;*/
        }
        .clearfix {
            clear: both;
            font-size: 1px;
        }
        .text {
            display: inline;
            float: left;
            color: #ffffff;
        }


        #wrap .popover {
             width: 600px;
            }

        .popover{
            min-width: 150px;
          /* min-width: 500px;*/
         
        }
        .popover-title{
            color:#333;
        }
        .popover-content{
            color:#333;

        }
        .pm-hidden{
            display:none;
        }
        .datepicker td.active, .datepicker td.active:hover, .datepicker td.active:hover.active, .datepicker td.active.active {
            background-color: rgb(1, 138, 223);

        }

        .switch input:checked + span {
            background-color: rgb(1, 138, 223);
        }

        .list-group-item {
            background-color: #E6E6E6;
        }
        /*For the draggable section types*/
        #my-sort{
            cursor: pointer;
        }

        /*For the portlets */

         #sortable1 {
            border: 2px dashed #E0604E;
            width: 220px;
            min-height: 80px;
            list-style-type: none;
            margin: 0;
            padding: 5px 0 0 0;
            float: left;
            border-radius: 5px;
            margin-right: 10px;
          }

          #sortable2 {
            border: 2px dashed rgb(1, 138, 223);
            width: 220px;
            min-height: 80px;
            list-style-type: none;
            margin: 0;
            padding: 5px 0 0 0;
            float: left;
            border-radius: 5px;
            margin-right: 10px;

          }
          #sortable1 li, #sortable2 li {
            margin: 0 5px 5px 5px;
            padding: 10px;
            border:1px solid #999;
            font-size: 12px;
            font-weight: bold;
            width: 200px;
            border-radius: 5px;
            cursor: pointer;
          }

          .m-required{
            background-color: rgb(1, 138, 223);

          }

        .errors{
            color: #E0604E;
            font-size: 12px;
        }
        

        .green-block
        {
            background-color: #eee;
            border-top: 1px solid #C5C5C5;
            border-left: 1px solid #C5C5C5;
            border-right:1px solid #C5C5C5;
            min-height: 50px;
            cursor: pointer;

        }
        /*highlights chosen block*/
        .highlight
        {
            background-color: #DCEAE9;
        }

        .green-block-title{
            position: relative;
            margin-top: 10px;
            margin-left: 10px;
            color: #999;
            font-size: 12px;
            line-height: 20px;

        }

       
        
    </style>
</head>

<body style="" screen_capture_injected="true">
    <section class="hbox stretch">
   