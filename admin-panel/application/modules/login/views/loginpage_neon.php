<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="Laborator.co" />
    
    <title>Neon | Login</title>

  <link rel="stylesheet" href="<?= site_url('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')?>" id="style-resource-1">
  <link rel="stylesheet" href="<?= site_url('assets/css/font-icons/entypo/css/entypo.css')?>"  id="style-resource-2">
  <link rel="stylesheet" href="<?= site_url('assets/css/font-icons/entypo/css/animation.css')?>" id="style-resource-3">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
  <link rel="stylesheet" href="<?= site_url('assets/css/neon.css')?>" id="style-resource-5">
  <link rel="stylesheet" href="<?= site_url('assets/css/custom.css')?>"  id="style-resource-6">

  <script src="<?= site_url('assets/js/jquery-1.10.2.min.js')?>"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <!-- TS1387507135: Neon - Responsive Admin Template created by Laborator -->
</head>
<body class="page-body login-page login-form-fall">

<div class="login-container">
    
    <div class="login-header login-caret">
        
        <div class="login-content">
            
            <a href="#" class="logo">
                <img src="<?php echo site_url('assets/images/logo.png')?>" alt="" />
            </a>
            
            <p class="description">Dear user, log in to access the admin area!</p>
            
            <!-- progress bar indicator -->
            <div class="login-progressbar-indicator">
                <h3>43%</h3>
                <span>logging in...</span>
            </div>
        </div>
        
    </div>
    
    <div class="login-progressbar">
        <div></div>
    </div>
    
    <div class="login-form">
        
        <div class="login-content">
            
            <form method="post" role="form"  action="login/verifyLogin">
                
                <div class="form-group">
                    
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        
                        <input type="text" class="form-control" name="useremail" id="useremail" placeholder="useremail" autocomplete="off" />
                    </div>
                    
                </div>
                
                <div class="form-group">
                    
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                    </div>
                
                </div>
                
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-block btn-login">
                        Login In
                        <i class="entypo-login"></i>
                    </button>
                </div>
                
            </form>
            
            
            <div class="login-bottom-links">
                
                <a href="#" class="link">Forgot your password?</a>

                <br />
                
                <a href="#">ToS</a>  - <a href="#">Privacy Policy</a>
                
            </div>
            
        </div>
        
    </div>
    
</div>

  <script src="<?= site_url('assets/js/gsap/main-gsap.js" id="script-resource-1')?>"></script>
  <script src="<?= site_url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')?>" id="script-resource-2"></script>
  <script src="<?= site_url('assets/js/bootstrap.min.js')?>" id="script-resource-3"></script>
  <script src="<?= site_url('assets/js/joinable.js')?>" id="script-resource-4"></script>
  <script src="<?= site_url('assets/js/resizeable.js')?>" id="script-resource-5"></script>
  <script src="<?= site_url('assets/js/neon-api.js')?>" id="script-resource-6"></script>
  <script src="<?= site_url('assets/js/jquery.validate.min.js')?>" id="script-resource-7"></script>
  <!--script src="<?= site_url('assets/js/neon-login.js')?>" id="script-resource-8"></script-->
  <script src="<?= site_url('assets/js/neon-custom.js')?>" id="script-resource-9"></script>
  <script src="<?= site_url('assets/js/neon-demo.js')?>" id="script-resource-10"></script>
    
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
    
</body>
</html>