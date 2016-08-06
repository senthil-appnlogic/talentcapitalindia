<?php $emp_code=$this->session->userdata('employee_code');
$emp_name=$this->session->userdata('username_admin');
$status = $this->session->flashdata('status');?>

<style>
    .headingLine{
        font-size:17px;
    }
</style>
<div class="content" id="content">
    <div class="row">
	<div class="col-12 ui-sortable">
	    <div data-sortable-id="form-stuff-5" class="panel panel-inverse">
		<div class="panel-heading">
		    <div class="panel-heading-btn">
			<a data-click="panel-expand" class="btn btn-xs btn-icon btn-circle btn-default" href="javascript:;"><i class="fa fa-expand"></i></a>
                        <a data-click="panel-reload" class="btn btn-xs btn-icon btn-circle btn-success" href="javascript:;"><i class="fa fa-repeat"></i></a>
                        <a data-click="panel-collapse" class="btn btn-xs btn-icon btn-circle btn-warning" href="javascript:;"><i class="fa fa-minus"></i></a>
                        <a data-click="panel-remove" class="btn btn-xs btn-icon btn-circle btn-danger" href="javascript:;"><i class="fa fa-times"></i></a>
                    </div>
		    <h4 class="panel-title">Internal Employee Form</h4>
		</div>
		<div class="panel-body">
		<?php if($status){?>
		<div id="alert" class="alert alert-success outer"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
		<?php } ?>
		
		    <form action="<?php echo site_url('internalemployee/intEmpAddUser'); ?>" class=""  id="form_validation" method="post" name="form_validation" enctype="multipart/form-data">
			<div class="col-md-6 col-md-offset-3">
			    <input class="form-control input-md" value="<?php echo $emp_name;?>" name="emp_name" type="hidden" placeholder="Name">
			    <div class="form-group">
                                <h2 class="headingLine" id="candidate">Candiate Details</h2>
                            </div>
                            <div class="form-group">
                              <label>Internal Employee Referral Code</label>
                                <input class="form-control input-md" value="<?php echo $emp_code;?>" name="emp_code" type="text" placeholder="Name" readonly="">

                            </div>
                            <div class="form-group">
                                <label>Candidate Email<span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="email" type="text" placeholder="Candidate Email" onchange="checkEmail();" id="email">
                            </div>
			    <div>
				<span id="email-status"></span>
			    </div>
			    <div class="form-group" style="padding-top: 15px;">
				<input type="submit" name="Save" value="Submit" class="btn btn-sm btn-success" id="test">
				<button type="button" onclick="window.history.back();" class="btn btn-sm btn-warning">cancel</button>
			    </div>
			</div>
		    </form>
		</div>
	    </div>
	</div>
    </div>
</div>
<script>
     function checkEmail(){
	
        var email=$("#email").val();
        $.ajax({
                type: 'post',
                url: '<?php echo site_url('internalemployee/check_email');?>',
                data: {email:email},
                success: function (response) {
		    console.log(response);
		    if (response=='true') {

			$("#email-status").append("<p style='color:red'>Email Already Exist</p>");
			$('#test').attr('disabled',true);
		    }else{
			$("#email-status").empty();
			$('#test').attr('disabled',false);
		    }
                }
               
            });
    }

</script>