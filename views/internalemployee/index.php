<?php
$authentication = $this->session->flashdata('authentication');
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.6/admin/html/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Mar 2015 08:13:57 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Talent Capital Admin | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="<?php base_url();?>http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="<?php base_url();?>assetsAdmin/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php base_url();?>assetsAdmin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php base_url();?>assetsAdmin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php base_url();?>assetsAdmin/css/animate.min.css" rel="stylesheet" />
	<link href="<?php base_url();?>assetsAdmin/css/style.min.css" rel="stylesheet" />
	<link href="<?php base_url();?>assetsAdmin/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php base_url();?>assetsAdmin/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image"><img src="<?php base_url();?>assetsAdmin/images/login-bg/bg-9.jpg" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated flipInX">
            <!-- begin brand -->
              <?php if($authentication) {?>
			    <div id="alert" class="alert alert-danger outer"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $authentication; ?></div>
			    <?php } ?>
            
            <div class="login-header">
                <div class="brand">
		<img src="<?php base_url();?>assetsAdmin/images/logonew.png" width="100" height="50">	
                     
                   <center> <small>Internal Employee User Login</small></center>
                </div>
              <!--  <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>-->
            </div>
            <!-- end brand -->
            <div class="login-content">
                <form action="" method="POST" class="margin-bottom-0">		
                    <div class="form-group m-b-20">
                        <input type="text" name="email" class="form-control input-lg" placeholder="User name" />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" />
                    </div>
                    <div class="checkbox m-b-20">
                        <label>
                            <input type="checkbox" /> Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
                        <input type="submit" name="save" class="btn btn-success btn-block btn-lg" value="Sign me in">
                    </div>
                    <div class="m-t-20">
                       <!-- Not a member yet? Click <a href="#">here</a> to register.-->
                    </div>
                </form>
            </div>
        </div>
        <!-- end login -->
        
    
        
        <!-- begin theme-panel -->
        <!-- end theme-panel -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php base_url();?>assetsAdmin/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?php base_url();?>assetsAdmin/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php base_url();?>assetsAdmin/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php base_url();?>assetsAdmin/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php base_url();?>assetsAdmin/crossbrowserjs/html5shiv.js"></script>
		<script src="<?php base_url();?>assetsAdmin/crossbrowserjs/respond.min.js"></script>
		<script src="<?php base_url();?>assetsAdmin/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php base_url();?>assetsAdmin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php base_url();?>assetsAdmin/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php base_url();?>assetsAdmin/js/login-v2.demo.min.js"></script>
	<script src="<?php base_url();?>assetsAdmin/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
		setTimeout(function(){ $('#alert').remove();}, 5000);
			App.init();
			LoginV2.init();
		});
	</script>
</body>


</html>

