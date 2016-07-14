<style>
    .headingLine{
        font-size:17px;
    }
</style>
<div class="content" id="content">
			
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-12 ui-sortable">
                    <!-- begin panel -->
                    <div data-sortable-id="form-stuff-5" class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a data-click="panel-expand" class="btn btn-xs btn-icon btn-circle btn-default" href="javascript:;"><i class="fa fa-expand"></i></a>
                                <a data-click="panel-reload" class="btn btn-xs btn-icon btn-circle btn-success" href="javascript:;"><i class="fa fa-repeat"></i></a>
                                <a data-click="panel-collapse" class="btn btn-xs btn-icon btn-circle btn-warning" href="javascript:;"><i class="fa fa-minus"></i></a>
                                <a data-click="panel-remove" class="btn btn-xs btn-icon btn-circle btn-danger" href="javascript:;"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Hiring Partner Form</h4>
                        </div>
                        <div class="panel-body">
                            <form id="form_validation" action="<?php base_url('admin/hiringPartnerAdd');?>"   enctype="multipart/form-data" role="form" method="post">
                                <div class="col-md-6 col-md-offset-3">
                                
                                    <div class="form-group">
                                        <h2 class="headingLine" id="candidate">Hiring Partner</h2>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="username"  class="form-control input-md" type="text" placeholder="Vendor Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number <span style="color:#EB8B11">*</span> </label>
                                        <input name="mobileno"  class="form-control input-md" type="text" placeholder="Number">
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span style="color:#EB8B11">*</span> </label>
                                        <input name="email" class="form-control input-md" type="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Pan Attach (Proof) <span style="color:#EB8B11">*</span> </label>
                                         <input name="vendor_pancard_no" class="form-control input-md" type="text" placeholder="Please enter your 10-digit Pan card number">
                                    </div>
                                    <div class="form-group">
                                       <img src="<?php echo base_url();?>assets/images/sample.jpg" class="img-resposive" width="300" height="200" id="PanImgPreview">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Browse<input type="file" name="vendor_pancard_image" id="PanPreview"  onchange="panAttachment();">
                                                </span>
                                            </span>
                                            <input type="text" id="" value="" class="form-control" readonly >
                                        </div>
                                    </div>
				     <div class="form-group">
                                        <label>Location <span style="color:#EB8B11">*</span> </label>
                                         <input name="location" class="form-control input-md" type="text" placeholder="location">
                                    </div>
				    
                                    <div class="form-group col-md-offset-3">
                                        <input type="submit" name="Save" class="btn btn-success" value="Save">
                                        <button type="button" onclick="window.history.back();" class="btn btn-warning">cancel</button>
				    </div>            
                                </div>
                            </form>
                            

                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
		</div>
<script>
    $('#form_validation').bootstrapValidator({
        
    framework: 'bootstrap',
                feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
    fields: {
            username:
		{
		    trigger:'blur',
		    validators:
		    {
			notEmpty:
			{
			    message: 'name is required'
			},
			regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The full name can consist of alphabetical characters and spaces only'
                    }
			
		    }
		},
        mobileno: {
            validators: {
		notEmpty:
			{
			    message: 'Mobile Number is required'
			},
			regexp: {
                        regexp: /^(\+\d{1,3}[- ]?)?\d{10}$/,
                        message: 'Mobile Number contains only 10 Digit Numbers'
                    }
			
                
            }
        },
        email: {
            validators: {
		notEmpty:
			{
			    message: 'email is required'
			},
			regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
            }
        },
	vendor_pancard_no: {
            validators: {
		notEmpty:
			{
			    message: 'pan attach no is required'
			},
			regexp: {
                        regexp: /^(\+\d{1,3}[- ]?)?\d{10}$/,
                        message: 'PAN Number contains only 10 Digit Numbers'
                    }
            }
        },
	vendor_pancard_image: {
            validators: {
		notEmpty:
			{
			    message: 'pan attach   is required'
			},
			
            }
        },
	
	
    
	
	
    }
});
    function panAttachment(){
        var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("PanPreview").files[0]);
	oFReader.onload = function (oFREvent) {
	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
	};
    }
       
</script>