<?php
$protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';

// sets the full address
$url = $protocol . $_SERVER['HTTP_HOST'];
$url1 = explode("/", $_SERVER['REQUEST_URI']);
?>
<div class="sidebar-menu">
  
  <header class="logo-env">
    <!-- logo -->
    <div class="logo">
      <a href="<?php
echo base_url(); ?>">
        <img src="<?php echo site_url('assets/images/view9-logo.png') ?>" alt="" />
      </a>
    </div>
    
        <!-- logo collapse icon -->
    <div class="sidebar-collapse">
      <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
        <i class="entypo-menu"></i>
      </a>
    </div>
            
    
    <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
    <div class="sidebar-mobile-menu visible-xs">
      <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
        <i class="entypo-menu"></i>
      </a>
    </div>
  </header>

  
      <ul id="main-menu" class="">
<!-- Start View9 Game Section Menu -->

  <li>
    <a href="#"><i class="entypo-layout"></i><span>Manage App</span></a>
    <ul>
      <li>
        <a href="<?php echo base_url(); ?>golfscorecard"><span>Golf Courses</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>user/golfusers"><span>Golf Users</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>teecolorset"><span>Tee Color</span></a>
      </li>
    </ul>
  </li>



  <li>
    <a href="#"><i class="entypo-layout"></i><span>Manage Website</span></a>
    <ul>
      <li>
        <a href="<?php echo base_url(); ?>user"><span>Website Users</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>slide"><span>Front Page Images (Slider &amp; Banner)</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>singlepage"><span>Front &amp; About Page Sections</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>page/faq"><span>FAQ's</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>page/terms"><span>Terms &amp; Conditions</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>page/policies"><span>Policies</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>seo"><span>SEO</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>social_links"><span>Social Links</span></a>
      </li>
    </ul>
  </li>

 </li>
</ul>
</div>
<!-- End view9 admin navigation part  --> 
