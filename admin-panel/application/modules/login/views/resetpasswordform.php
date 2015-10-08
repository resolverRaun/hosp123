<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Golfkeeper Admin Panel" />
    <meta name="author" content="Laborator.co" />
    
    <title>Golfkeeper | Login</title>

  <link rel="stylesheet" href="<?= site_url('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')?>" id="style-resource-1">
  <link rel="stylesheet" href="<?= site_url('assets/css/font-icons/entypo/css/entypo.css')?>"  id="style-resource-2">
  <link rel="stylesheet" href="<?= site_url('assets/css/font-icons/entypo/css/animation.css')?>" id="style-resource-3">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
  <link rel="stylesheet" href="<?= site_url('assets/css/neon.css')?>" id="style-resource-5">
  <link rel="stylesheet" href="<?= site_url('assets/css/custom.css')?>"  id="style-resource-6">

  <script src="<?= site_url('assets/js/jquery-1.10.2.min.js')?>"></script>

</head>
<body class="page-body login-page login-form-fall">

<div class="login-container">
    
    <div class="login-header login-caret">
        
        <div class="login-content">
            
            <a href="#" class="logo">
                <img src="<?php echo site_url('assets/images/view9-logo.png')?>" alt="" />
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

          <?php if(isset($error_message)) : ?>
            <div class="alert alert-danger">
              <?php echo $error_message; ?>
            </div>
          <?php endif; ?>

          <?php if(isset($success_message)) : ?>
            <div class="alert alert-success">
              <?php echo $success_message; ?>
            </div>
          <?php endif; ?>
            
            <form method="post" role="form" class="validate" action="<?php echo base_url(); ?>login/resetPassword">
                <div class="form-group">
                    
                    <span>Enter your new password.</span>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        <input type="hidden" class="form-control" name="token" value="<?php echo $token; ?>">
                        <input type="password" class="form-control" name="reset_password" id="reset_password" data-validate="required" data-message-required="Please enter password for reset" placeholder="reset password" autocomplete="off" />
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <button type="submit" name="btnResetNewPassword" class="btn btn-primary btn-block btn-login">
                        Reset Password
                        <!-- <i class="entypo-login"></i> -->
                    </button>
                </div>
                
            </form>
            
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
  <script src="<?= site_url('assets/js/neon-login.js')?>" id="script-resource-8"></script>
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