<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Golf Admin Panel" />
  <meta name="author" content="Laborator.co" />
  
  <title>Golfkeeper | Dashboard</title>

  <link rel="stylesheet" href="<?= site_url('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')?>" id="style-resource-1">
  <link rel="stylesheet" href="<?= site_url('assets/css/font-icons/entypo/css/entypo.css')?>"  id="style-resource-2">
  <link rel="stylesheet" href="<?= site_url('assets/css/font-icons/entypo/css/animation.css')?>" id="style-resource-3">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
  <link rel="stylesheet" href="<?= site_url('assets/css/neon.css')?>" id="style-resource-5">
  <link rel="stylesheet" href="<?= site_url('assets/css/custom.css')?>"  id="style-resource-6">
  <link rel="stylesheet" href="<?= site_url('assets/css/latlong.css')?>"  id="style-resource-7">
  <link rel="stylesheet" href="<?= site_url('assets/css/jquery-gmaps-latlon-picker.css')?>"  id="style-resource-8">
   <link rel="stylesheet" href="<?= site_url('assets/js/alertify/alertify.min.css')?>"  id="style-resource-8">
  <link rel="stylesheet" href="<?= site_url('assets/js/alertify/themes/default.min.css')?>"  id="style-resource-8">

  <script src="<?= site_url('assets/js/jquery-1.10.2.min.js')?>"></script>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

</head>
<body class="page-body  page-fade">

<div class="page-container">  
  <? $this->load->view('includes/sub_nav')?>
<div class="main-content">
   <? $this->load->view('includes/upper_nav')?>
<!-- changes should be done from here -->
    <? $this->load->view('includes/breadcrumb') ?> 
    <?php if($title){
        echo $title;
    } ?>
      
    <?php if($message){ ?>
        <div class="col-md-12">
            <div class="alert alert-block alert-success">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 class="element-invisible">
             <strong>Success !</strong> <?php echo $message; ?><h4></div>
        </div>
    <?php   } ?>

    <?php if($error){ ?>
        <div class="col-md-12">
            <div class="alert alert-block alert-danger">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 class="element-invisible">
             <strong>Error !</strong> <?php echo $error; ?><h4></div>
        </div>

    <?php   } ?>

<!-- Start view9 basic form -->
    <?php if($content){
      echo $content;
    } ?>
<!-- End view9 basic form -->

<!-- Footer -->
<footer class="main">
    
  &copy; 2014 <strong>Golfkeeper</strong> Admin Panel by <a href="<?php echo base_url(); ?>" target="_blank">View 9</a>
  
</footer> 
</div>

  <link rel="stylesheet" href="<?= site_url('assets/js/select2/select2-bootstrap.css')?>"  id="style-resource-1">
  <link rel="stylesheet" href="<?= site_url('assets/js/select2/select2.css')?>"  id="style-resource-2">

  <script src="<?= site_url('assets/js/gsap/main-gsap.js')?>" id="script-resource-1"></script>
  <script src="<?= site_url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')?>" id="script-resource-2"></script>
  <script src="<?= site_url('assets/js/bootstrap.min.js')?>" id="script-resource-3"></script>
  <script src="<?= site_url('assets/js/jquery.validate.min.js')?>" id="script-resource-4"></script>
  <script src="<?= site_url('assets/js/joinable.js')?>" id="script-resource-4"></script>
  <script src="<?= site_url('assets/js/resizeable.js')?>" id="script-resource-5"></script>
  <script src="<?= site_url('assets/js/neon-api.js')?>" id="script-resource-6"></script>

  <script src="<?= site_url('assets/js/jquery.dataTables.min.js')?>" id="script-resource-14"></script>
  <script src="<?= site_url('assets/js/dataTables.bootstrap.js')?>" id="script-resource-18"></script>
  <script src="<?= site_url('assets/js/jquery.dataTables.columnFilter.js')?>" id="script-resource-27"></script>
  <script src="<?= site_url('assets/js/select2/select2.min.js')?>" id="script-resource-19"></script>
  <script src="<?= site_url('assets/js/neon-custom.js')?>" id="script-resource-16"></script>
  <script src="<?= site_url('assets/js/neon-demo.js')?>" id="script-resource-17"></script>
  <script src="<?= site_url('assets/js/jquery-gmaps-latlon-picker.js')?>" id="script-resource-20"></script>
  <script src="<?= site_url('assets/js/jquery.inputmask.bundle.min.js')?>" id="script-resource-22"></script>
  <script src="<?= site_url('assets/js/selectboxit/jquery.selectBoxIt.min.js')?>" id="script-resource-23"></script>
  <script src="<?= site_url('assets/js/bootstrap-switch.min.js')?>" id="script-resource-24"></script>
  <script src="<?= site_url('assets/js/jquery.table.addrow.js')?>" id="script-resource-25"></script>
  <script src="<?= site_url('assets/js/fileinput.js')?>" id="script-resource-26"></script>
  <script src="<?= site_url('assets/js/alertify/alertify.min.js')?>" id="script-resource-28"></script>
  <script src="<?= site_url('assets/js/custom-js/custom-misc.js')?>" id="script-resource-29"></script>

  
  <?= $_scripts ?>
  <?= $_styles ?>
  <script>
      $(function(){
          //select ajax call to load tee color
        $("#tot_holes").change(function(){  
          
          $.ajax({
                   url:'<?php echo base_url();?>golfscorecard/getTeeColor',
                   cache:false,
                   success: function(data)
                   {
                      colorlist = JSON.parse(data);
                      $.each( colorlist, function( index, value ) {
                          $('.teecolor').append('<option value="'+ value.colorcode+'">'+ value.colorname +'</option>');
                      });
                   }
                });
        });
          //select ajax call to load tee color
      });
   </script>


  <script type="text/javascript">
    
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-28991003-3']);
    _gaq.push(['_setDomainName', 'laborator.co']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']);
    
    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
  <style>
  #table-textinput-teename,#table-textinput-teecolor {
    width:160px;
  }
  .hole_marker_distance_class,#table-textinput-sloperating,#table-textinput-courserating{
    width: 50px;
  }
  .par_class{
    width: 40px;
  }
  .handicap_class{
    width: 80px;
  }
  </style>


  
</body>
</html>