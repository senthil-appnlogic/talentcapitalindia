<body>

	
		
		<!-- begin #sidebar -->
		
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard<small>  details are here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>TOTAL EMPLOYEES</h4>
							<p><?php  echo $employeesCount[0]['employeesCount']; ?></p>	
						</div>
						<div class="stats-link">
							<a href="<?php echo site_url('admin/candidateDashboard');?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-purple">
						<div class="stats-icon"><i class="fa fa-user"></i></div>
						<div class="stats-info">
							<h4>TOTAL ADMIN</h4>
							<p><?php  echo $adminCount[0]['adminCount']; ?></p>	
						</div>
						<div class="stats-link">
							<a href="<?php echo site_url('admin/adminUserView');?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-black">
						<div class="stats-icon"><i class="fa fa-user-plus"></i></div>
						<div class="stats-info">
							<h4>TOTAL INTERNAL EMPLOYEES</h4>
							<p><?php  echo $intempCount[0]['intempCount']; ?></p>	
						</div>
						<div class="stats-link">
							<a href="<?php echo site_url('admin/intempUserView');?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-green">
						<div class="stats-icon"><i class="fa fa-desktop"></i></div>
						<div class="stats-info">
							<h4>TOTAL HIRING PARTNER</h4>
							
							<p><?php  echo $vendorCount[0]['vendorCount']; ?></p>	
						</div>
						<div class="stats-link">
							<a href="<?php echo site_url('admin/hiringPartner');?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-desktop"></i></div>
						<div class="stats-info">
							<h4>TOTAL EMAIL TRACKING</h4>
							
							<p><?php  echo $emailTrackingCount[0]['emailTrackingCount']; ?></p>	
						</div>
						<div class="stats-link">
							<a href="<?php echo site_url('admin/emailTrack');?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-desktop"></i></div>
						<div class="stats-info">
							<h4>DIRECT APPLICANT EMAIL TRACKING</h4>
							
							<p><?php  echo $directAppEmailTrackingCount[0]['directAppEmailmailTrackingCount']; ?></p>	
						</div>
						<div class="stats-link">
							<a href="<?php echo site_url('admin/directAppEmailTrack');?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<!--<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-purple">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>TOTAL DIRECT APPLICANTS</h4>
							<p><?php  echo $applicantsCount[0]['applicantsCount']; ?></p>	
						</div>
						<div class="stats-link">
							<a href="<?php echo site_url('admin/applicant');?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>-->
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<!--<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-clock-o"></i></div>
						<div class="stats-info">
							<h4>AVG TIME ON SITE</h4>
							<p>00:12:23</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>-->
				<!-- end col-3 -->
			</div>
			<!-- end row -->
			<!-- begin row -->
			<!-- end row -->
		</div>
		<!-- end #content -->
	
		
		<!-- begin scroll to top btn -->
		
		<!-- end scroll to top btn -->
	
	<!-- end page container -->
	
	
	
</body>
