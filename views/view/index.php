<!DOCTYPE html>
   <style>
     .img{
     background-color:#dd4b39;
     border-radius:15%;
     padding:13px;
    }
    .imgfb{
     background-color:#3b5998;
     border-radius:15%;
     padding:13px;
    }
    .imgfb{
     background-color:#3b5998;
     border-radius:15%;
     padding:13px;
    }
    .imglink{
     background-color:#007bb6;
     border-radius:15%;
     padding:13px;
    }
    .imgpin{
     background-color:#cb2027;
     border-radius:15%;
     padding:13px;
    }
    .imgtwit{
     background-color:#00aced;
     border-radius:15%;
     padding:13px;
    }
    .imgemail{
     background-color:#aaa;
     border-radius:15%;
     padding:13px;
    }
    .imgmore{
     background-color:#0039a1;
     border-radius:15%;
     padding:13px;
    }
    .capitalized{
      text-transform: capitalize;
    }

   </style> 
    
<html lang="en">
    <head>
        <title>Talent India</title>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="images/favicon.ico" type="image/gif"> 
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
                <link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css">
                <link rel="stylesheet" href="<?php echo base_url();?>assets/css/form.css">
                <link href="<?php echo base_url(); ?>assets/bootstrap-validation/css/bootstrapValidator.css" rel="stylesheet" />
                <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
                <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
                <script src="<?php echo base_url();?>assets/js/chosen.jquery.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/bootstrap-validation/js/bootstrapValidator.js"></script>
    </head>
    <style>
/*    .alert-danger {
        background-color: rgba(0, 0, 0, 0.1);
        border-color: #ef4040;
        color: #fff;
    }     */
.form-control-feedback{
    top: 15px !important;
}
#register-form{
    border-radius: 6px;
    padding: 20px;
    box-shadow: 0px 0px 1px 1px #c0c0c0;
}
    </style>
    <div style="margin-top:12%;position: fixed;margin-left:96%;">
        <a href="#"><img src="<?php echo base_url(); ?>assets/images/googleplus-white-60.png" class="img" style="width:50px;height:50px;"/></a><br>
        <a href="#"><img src="<?php echo base_url(); ?>assets/images/linkedin-white-60.png" class="imglink" style="width:50px;height:50px;"/></a><br>
        <a href="#"><img src="<?php echo base_url(); ?>assets/images/facebook-white-60.png" class="imgfb" style="width:50px;height:50px;"/></a><br>
        <a href="#"><img src="<?php echo base_url(); ?>assets/images/pinterest-white-60.png" class="imgpin" style="width:50px;height:50px;"/></a><br>
        <a href="#"><img src="<?php echo base_url(); ?>assets/images/twitter-white-60.png" class="imgtwit" style="width:50px;height:50px;"/></a><br>
        <a href="#"><img src="<?php echo base_url(); ?>assets/images/email-white-60.png" class="imgemail" style="width:50px;height:50px;"/></a><br>
        <!--<a href="#"><img src="<?php echo base_url(); ?>assets/images/sumomepro-white-60.png" class="imgmore" style="width:50px;height:50px;"/></a><br>-->
     
    </div>
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
                        <a class="navbar-brand sizeChange" href="<?php echo base_url(); ?>talentcapitalctr/index"><img  style="width:100px" src="<?php echo base_url();?>assets/images/logo.png" alt="logo"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-right">
                        <ul class="nav navbar-nav menuChnage">
<!--			    <li>-->
<!--                                <a href="<?php echo site_url('talentcapitalctr/applicantRegister');?>"><span style="color: #000; font-weight: normal!important; ">Direct Applicant</span></a>-->
<!--                            </li>			    -->
                            <li>
                                <a href="<?php echo site_url('talentcapitalctr/index');?>"><span style="color: #000; font-weight: normal!important; ">Home</span></a>
                            </li>
                            <!--<li>
                                <a href="#"><span style="color: #000;font-weight: normal!important;">About</span></a>
                            </li>
                            <li>
                                <a href="#"><span style="color: #000; font-weight: normal!important;">Service</span></a>
                            </li>-->                        
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
	<?php
	    //$status=$this->session->flashdata('status');
	    //if($status) {
	?>
	    <!--<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>-->
	<?php //} ?>
        <!--<div class="fullWidth">
            <img src="<?php echo base_url();?>assets/images/10.jpg" alt="banner" style="" class="img-responsive">                
        </div>-->
        
        <div style="margin-top: 75px;"></div>
        <div class="container">
  
            
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6" style="border-right: 1px solid #ccc;">
                                    <a href="#" class="active" id="login-form-link">Login</a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="#" id="register-form-link">Register</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="" method="post" role="form" style="display: block;">
                                        <div class="form-group">
					    <?php
					    
					    if($user=='hiringPartner')
					    {
						?>
						<select name="login_types" class="form-control input-lg">
						    <option value="vendor">Hiring Partner</option>                                 
						</select>
						<?php
					    }
					    else
					    {
					    ?>
						<select name="login_types" class="form-control input-lg">
						    <option disabled="" selected value="0">User Type</option>
						    <option value="vendor">Hiring Partner</option>
						    <option value="directemploye">Direct Applicant</option>
						    <!--<option value="directApp">Direct Applicant</option>-->
						   <!-- <option value="internalEmp">Internal Employee</option>        -->                                        
						</select>
					    <?php
					    }
					    ?>
                                        </div>                                           
                                        <div class="form-group">
                                            <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="save" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Sign me in">
                                                </div>
                                            </div>
                                        </div>
					<div class="form-group">
					    <center>
					    <a href="<?php echo site_url('talentcapitalctr/forgotPassword');?>">Forgot Your Password ?</a>
					    </center>
					</div>
                                    </form>
                                    <form id="register-form" action="<?php echo site_url('talentcapitalctr/index');?>" method="post" role="form" style="display: none;">
                                        <div class="form-group">
                                            <select name="login_types" class="form-control input-lg">
                                                <option disabled="" selected value="0">User Type</option>
                                                <option value="vendor">Hiring Partner</option>
                                                <option value="directApp">Direct Applicant</option>
                                                <!--<option value="internalEmp">Internal Employee</option>                   -->                             
                                            </select>
                                        </div>                                    
                                        <div class="form-group">
                                            <input type="text" name="name" id="username" tabindex="1" class="form-control capitalized" placeholder="Username" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="mobile_number" id="mobile_number" tabindex="1" class="form-control" placeholder="Mobile No" value="">
                                        </div>                                        
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="save" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                                </div>
                                            </div>
                                        </div>
					
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom: 25px;"></div> 

    <script>
    $(function() {
        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
            });        
    });            
        
        
    
    $(document).ready(function() {
	
        $('#login-form').bootstrapValidator({
            message: 'This value is not valid',
            excluded: [':disabled'],
            feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                login_types: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select User Type'
                        },
                    }
                },
		email:{
		     trigger: "blur",
		    validators: {
			regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The Email is not a valid email address'
                        },			
			notEmpty: {
			    message: 'The  Email is required and can\'t be empty'
			}
		    }
		},
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and can\'t be empty'
                        }
                    }
                }
            }
        });
	
	
	$('#register-form').bootstrapValidator({
            message: 'This value is not valid',
            excluded: [':disabled'],
            feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
		login_types: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select User Type'
                        },
                    }
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The name is required and can\'t be empty'
                        },
                    }
                },
		email: {
		     trigger: "blur",
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
			    regexp: /^(\+\d{1,3}[- ]?)?\d{10}$/,
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

$("img").mousedown(function(){
    return false;
});
    </script>