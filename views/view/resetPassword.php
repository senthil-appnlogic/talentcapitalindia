<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Forget password</title>
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
                                    <form id="login-form" action="" method="post" role="form">
                                        <h4>Reset Password</h4>                       
                                        <div class="form-group">
                                            <input type="password" name="newPassword" tabindex="1" class="form-control" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirmPassword" tabindex="1" class="form-control" placeholder="Confirm Password">
                                        </div>                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="resetSave" id="forgot-login-submit" tabindex="4" class="form-control btn btn-login" value="Reset Password">
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