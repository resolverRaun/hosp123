<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php 
    if($site_info){
            echo $site_info;
        }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= site_url('asset/css/responsive-accordion.css')?>">
    <script src="<?=site_url("asset/js/vendor/modernizr-2.6.2.min.js")?>"></script>
    <link rel="stylesheet" href="<?= site_url('asset/css/golfkeeper.css')?>">
    <link rel="stylesheet" href="<?= site_url('asset/css/jquery-ui-1.10.3.custom.min.css')?>">
    <link rel="stylesheet" href="<?= site_url('asset/css/golfReviewDesign.css')?>">
</head>

    
    <body class="front">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php $this->load->view('inc/body_header'); ?>
        
        <!--Start Front section of golfappkeeper -->
        <?php if($front){
                    echo $front;
            } ?>
        <!--End Front section of golfappkeeper -->

        <!--Start Golf app keeper slider section of golfappkeeper -->
          <?php if($slide){
                    echo $slide;
            } ?>
        <!--End Golf app keeper slider section of golfappkeeper -->

        <!--Start Golf app keeper welcome section of golfappkeeper -->
          <?php if($initial_content){
                    echo $initial_content;
            } ?>
        <!--End Golf app keeper welcome section of golfappkeeper -->

        <!--Start Feature(create, manage, share) section of golfappkeeper -->
          <?php if($feature){
                    echo $feature;
            } ?>
        <!--End Feature(create, manage, share) section of golfappkeeper -->
      
        <!--Start store and subscription section of golfappkeeper -->
          <?php if($store_subscription){
                    echo $store_subscription;
            } ?>
        <!--End store and subscription section of golfappkeeper -->
        
        <!--Start footer section of golfappkeeper --> 
          <?php $this->load->view('inc/footer'); ?>
        <!--End footer section of golfappkeeper -->
    
        <!--Start footer script for golfappkeeper -->
        <?php $this->load->view('inc/footer_script'); ?>
        <!--End footer script for golfappkeeper -->
        
        <!-- Start additional script and styles goes here --> 
        <?= $_scripts ?>
        <?= $_styles ?>
        <!-- End additional script and styles goes here --> 
    </body>
</html>