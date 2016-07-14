<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Talent India</title>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="images/favicon.ico" type="image/gif"> 
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
                <link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css">
                <link rel="stylesheet" href="<?php echo base_url();?>assets/css/formzxx.css">
		 <link rel="stylesheet" href="<?php echo base_url();?>assets/browse-button/filecss.css">
		 
		 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/social.css">
		 
                <link href="<?php echo base_url(); ?>assets/bootstrap-validation/css/bootstrapValidator.css" rel="stylesheet" />
                <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
                <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
                <script src="<?php echo base_url();?>assets/js/chosen.jquery.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/bootstrap-validation/js/bootstrapValidator.js"></script>
		<script src="<?php echo base_url();?>assets/browse-button/filejs.js"></script>
		
    </head>
    <style>
/*    .alert-danger {
        background-color: rgba(0, 0, 0, 0.1);
        border-color: #ef4040;
        color: #fff;
    }     */
.form-control-feedback{
    top: 10px !important;
}

#register-form{
    border-radius: 6px;
    padding: 20px;
    box-shadow: 0px 0px 1px 1px #c0c0c0;
}

    </style>
    
    <body>
        <div class="header">
            <nav class="navbar navbar-default navbar-fixed-top aws-nav-header">
                <div class="container menuPad">
                    <div class="navbar-header">
                        <button class="navbar-toggle collapsed" aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand sizeChange" href="<?php echo base_url(); ?>talentcapitalctr/index">
			<img src="<?php echo base_url();?>assets/images/logo.png" style="width: 100px;" alt="logo">
			</a>
                    </div>
		    
		    
		    
                    <div id="navbar" class="navbar-collapse collapse navbar-right">
                        <ul class="nav navbar-nav menuChnage">
			    <li class="active">
                                <a href="#"><span style="color: #000; font-weight: normal!important; ">Careers</span></a>
                            </li>			    
                            <li>
                                <a href="#"><span style="color: #000; font-weight: normal!important; ">Home</span></a>
                            </li>
                            <li>
                                <a href="#"><span style="color: #000;font-weight: normal!important;">About</span></a>
                            </li>
                            <li>
                                <a href="#"><span style="color: #000; font-weight: normal!important;">Service</span></a>
                            </li>                        
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
	
	<!--FLOATING NONE SOCIAL BAR STARTS-->
	    <div class="ssk-sticky ssk-left ssk-center ssk-lg">
		<a class="ssk ssk-facebook" href="#"><img height="26" width="28" src="<?php echo base_url();?>assets/images/facebook.png"> </a>
		<a class="ssk ssk-twitter" href="#"><img width="28" src="<?php echo base_url();?>assets/images/twitter.png"> </a>
		<a class="ssk ssk-google-plus" href="#"><img width="28" src="<?php echo base_url();?>assets/images/google-plus.png"> </a>
		<a class="ssk ssk-linkedin" href="#"><img width="28" src="<?php echo base_url();?>assets/images/linkedin.png"> </a>
	       
	    </div>
	<!--FLOATING NONE SOCIAL BAR ENDS-->
	
        <div class="fullWidth">
            <img src="<?php echo base_url();?>assets/images/10.jpg" alt="banner" style="" class="img-responsive">                
        </div>
        
        <div style="margin-top: 25px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php $status=$this->session->flashdata('error');?>
		    <?php if($status) { ?>
                    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
		    <?php } ?>
                </div>
            </div>            
            
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
		    <div class="form-group">
			<h2 style="text-align: center;color: #ff4646;font-family: -moz-fixed;">Register</h2>
		    </div>
		    <form id="register-form" action="" enctype="multipart/form-data" method="post" role="form">
			<div class="form-group">
			    <select name="login_types" id="login_type" class="form-control">
				<option disabled="" selected value="0">Logins Type</option>
				<option value="vendor">Vendor</option>
				<option value="internalEmp">Internal Employee</option>                                    
			    </select>
			</div>
			<div class="form-group">
			    <input type="text" name="name" id="name" class="form-control" placeholder="Username" value="">
			</div>
			<div class="form-group">
			    <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" value="">
			</div>
			<div class="form-group">
			    <input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile No" value="">
			</div>
			<div class="form-group">
			    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
			</div>
			<div class="form-group">
			    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
			</div>
			<div class="form-group" style="text-align: center;">
			    <input type="submit" name="save"  class="btn btn-success" value="Register Now">
			</div>
			<div class="form-group">
			    <center>
			    <a href="<?php echo site_url('talentcapitalctr/forgetPassword');?>">Forget Your Password</a>
			    </center>
			</div>
		    </form>
		</div>
	    </div>
        <div style="margin-bottom: 25px;"></div> 

<script type="text/javascript">
    //$(function() {
    //    $('#login-form-link').click(function(e) {
    //        $("#login-form").delay(100).fadeIn(100);
    //        $("#register-form").fadeOut(100);
    //        $('#register-form-link').removeClass('active');
    //        $(this).addClass('active');
    //        e.preventDefault();
    //    });
    //    $('#register-form-link').click(function(e) {
    //        $("#register-form").delay(100).fadeIn(100);
    //        $("#login-form").fadeOut(100);
    //        $('#login-form-link').removeClass('active');
    //        $(this).addClass('active');
    //        e.preventDefault();
    //    });        
    //});
    //


    $(document).ready(function() {
        $('#register-form').bootstrapValidator({
            message: 'This value is not valid',
            excluded: [':disabled'],
            feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The name is required and can\'t be empty'
                        },
                    }
                },
		email: {
		    validators: {
			regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The Email is not a valid email address'
                        },			
			notEmpty: {
			    message: 'The  Email is required and can\'t be empty'
			},
			remote:{
			    message: 'The Email is Already Exist',
			    url: '<?php  echo site_url('talentcapitalctr/CheckEmailExist')?>',
			    type: 'POST'
			}
		    }
		},          
                mobile_number: {
                    validators: {
			regexp: {
			    regexp: /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/,
			    message: 'Mobile Number contains only 10 Digit Numbers'
			},			
                        notEmpty: {
                            message: 'The Mobile number is required and can\'t be empty'
                        },
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and can\'t be empty'
                        },
                        //identical: {
                        //    field: 'confirm_password',
                        //    message: 'The password and its confirm are not the same'
                        //}                        
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message: 'The email number is required and can\'t be empty'
                        },                        
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                }
            }
        });        
    });
</script>