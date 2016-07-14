<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Forgot password</title>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/form.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
            <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    </head>
    <body>        
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
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="#" id="register-form-link">Change Password</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="<?php echo site_url("login/forgotPassword")?>" method="post" role="form">
                                
                                        <h4>Please Enter Your Email</h4>
                                        <div class="form-group">
                                            <input type="text" name="forgotpassword" id="forgotpassword" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="forgotsave" id="forgot-login-submit" tabindex="4" class="form-control btn btn-login" value="Continue">
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