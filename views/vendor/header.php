	
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->


<head>
	<meta charset="utf-8" />
	<title>Talent Capital </title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="<?php echo base_url();?>http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?php echo base_url();?>assetsAdmin/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assetsAdmin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assetsAdmin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assetsAdmin/css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assetsAdmin/css/style.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assetsAdmin/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assetsAdmin/css/theme/default.css" rel="stylesheet" id="theme" />
	
	<link href="<?php echo base_url();?>assetsAdmin/plugins/browse-button/filecss.css" rel="stylesheet" />
	
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?php echo base_url();?>assetsAdmin/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assetsAdmin/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assetsAdmin/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assetsAdmin/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<!--<link rel="stylesheet" href="<?php echo base_url();?>assetsAdmin/css/chosen.css">-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css">
	<link href="<?php echo base_url(); ?>assetsAdmin/bootstrap-datetimepicker2/css/bootstrap-datetimepicker.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assetsAdmin/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assetsAdmin/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" /> 
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	<!-- ================== BEGIN DATA-TABLE STYLE ================== -->
	
	<link href="<?php echo base_url(); ?>assetsAdmin/datatables/css/buttons.dataTables.min.css" rel="stylesheet" />
	  <link href="<?php echo base_url(); ?>assetsAdmin/plugins/bootstrap-validation/css/bootstrapValidator.css" rel="stylesheet" />
	<!-- ================== END DATA-TABLE STYLE ================== -->
	
	
	<link href="<?php echo base_url();?>assetsAdmin/plugins/DataTables/css/data-table.css" rel="stylesheet" />
	
	<link href="<?php echo base_url(); ?>assetsAdmin/plugins/LC-switch-master/lc_switch.css" rel="stylesheet" />
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url();?>assetsAdmin/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	
</head>
<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="<?php echo site_url('vendorlogin/dashboard');?>" class="navbar-brand"> <img width="95px" height="62px"   style="margin-top:-18px;" src="<?php echo base_url();?>assetsAdmin/images/logonew.png" alt="Talent Capital Admin"></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					
					
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url($this->session->userdata('vendorimage')); ?>" alt="" /> 
	<span class="hidden-xs"><?php $session_data=$this->session->userdata('vendorusername'); echo  $session_data?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<!--<li><a href="javascript:;">Edit Profile</a></li>-->
							<!--<li class="divider"></li>-->
							<?php $session_id=$this->session->userdata('vendor_id');?>
							<li><a href="<?php echo base_url('vendorlogin/logout'); ?>">Log Out</a></li>
							<li><a href="<?php echo base_url("talentcapitalctr/updateprofile/$session_id"); ?>">Edit Profile</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>


		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;">
							
							<img width="250" height="100" src="<?php echo base_url($this->session->userdata('vendorimage')); ?>" alt="" /></a>
						</div>
						<div class="info">
							Talent Capital
							<small>Hiring Partner</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					
					<li class="has-sub <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>">
						<a href="<?php echo site_url('vendorlogin/dashboard');?>">
						   <!-- <b class="caret pull-right"></b>-->
						 <!--   <i class="fa fa-laptop  text-warning"></i>-->
						    <span>Dashboard</span>
					    </a>
						<!--<ul class="sub-menu">
						    <li class="active"><a href="#">Dashboard</a></li>
						    
						</ul>-->
					</li>
					
					<li class="has-sub <?php if($this->uri->segment(2)=="vendor"){echo "active";}?>">
						<a href="<?php echo site_url('vendorlogin/vendor');?>">
						 <!--   <b class="caret pull-right"></b>-->
						    <i class="fa fa-graduation-cap  text-warning"></i>
						    <span>Candidate</span> 
						</a>
						<!--<ul class="sub-menu">
							<li><a href="">Vendor</a></li>
							
						</ul>-->
					</li>
					
					<li class="has-sub <?php if($this->uri->segment(2)=="tracklist"){echo "active";}?>">
						<a href="<?php echo site_url('vendorlogin/tracklist');?>">
						 <!--   <b class="caret pull-right"></b>-->
						    <i class="fa fa-exclamation-circle  text-warning"></i>
						    <span>Not Yet Approved Candidate</span> 
						</a>
						<!--<ul class="sub-menu">
							<li><a href="">Vendor</a></li>
							
						</ul>-->
					</li>
					
					
					
					
					
					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
	<div class="sidebar-bg"></div>
	
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
</div>

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url();?>assetsAdmin/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo base_url();?>assetsAdmin/crossbrowserjs/html5shiv.js"></script>
		<script src="<?php echo base_url();?>assetsAdmin/crossbrowserjs/respond.min.js"></script>
		<script src="<?php echo base_url();?>assetsAdmin/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url();?>assetsAdmin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url();?>assetsAdmin/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/flot/jquery.flot.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/flot/jquery.flot.time.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/js/dashboard.min.js"></script>
	<!-- ================== BEGIN DATA-TABLE JS ================== -->
	<script src="<?php echo base_url();?>assetsAdmin/plugins/DataTables/js/jquery.dataTables.js"></script>
	<!--<script src="<?php echo base_url();?>assetsAdmin/js/table-manage-default.demo.min.js"></script>-->
	<script src="<?php echo base_url();?>assetsAdmin/plugins/DataTables/js/dataTables.tableTools.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/js/table-manage-tabletools.demo.min.js"></script>
	<!-- ================== END DATA-TABLE JS ================== -->
	
	
	
	<script src="<?php echo base_url();?>assetsAdmin/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/datatables/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/datatables/js/jszip.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/datatables/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/datatables/js/vfs_fonts.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/datatables/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url(); ?>assetsAdmin/js/bootbox.min.js"></script>
	
	<!--=========================SWITCHERY JS ===========================-->
<!--	<script src="<?php //echo base_url(); ?>assetsAdmin/plugins/switchery/switchery.min.js"></script>
	<script src="<?php //echo base_url(); ?>assetsAdmin/js/form-slider-switcher.demo.min.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assetsAdmin/plugins/LC-switch-master/lc_switch.js"></script>
	<!--=========================SWITCHERY JS ===========================-->
	
	
	<script src="<?php echo base_url();?>assetsAdmin/js/apps.min.js"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/browse-button/filejs.js"></script>
	
	<!--<script src="<?php echo base_url();?>assetsAdmin/js/chosen.jquery.js" type="text/javascript"></script>-->
	<script src="<?php echo base_url();?>assets/js/chosen.jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/moment.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assetsAdmin/plugins/bootstrap-validation/js/bootstrapValidator.js"></script>
                            
	<script src="<?php echo base_url(); ?>assetsAdmin/bootstrap-datetimepicker2/js/moment-with-locales.js"></script>
	<script src="<?php echo base_url(); ?>assetsAdmin/bootstrap-datetimepicker2/js/bootstrap-datetimepicker.min.js"></script>    
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
		});
		
	</script>

