<style>
    .headingLine{
        font-size:17px;
    }
</style>
<div class="content" id="content">
			<!-- begin breadcrumb -->
			
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			
			<!-- end page-header -->
            <!-- end row -->
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
                            <h4 class="panel-title">Vendor Form</h4>
                        </div>
                        <div class="panel-body">
                            <form id="form_validation" action="<?php base_url('talentcontroller/vendorAdd');?>"   enctype="multipart/form-data" role="form" method="post">
                                <div class="col-md-6 col-md-offset-3">
                                
                                    <div class="form-group">
                                        <h2 class="headingLine" id="candidate">Vendor (Candidate Referal Page)</h2>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name"  class="form-control input-md" type="text" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number <span style="color:#EB8B11">*</span> </label>
                                        <input name="mobile_number"  class="form-control input-md" type="text" placeholder="Number">
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span style="color:#EB8B11">*</span> </label>
                                        <input name="email" class="form-control input-md" type="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Pan Attach (Proof) <span style="color:#EB8B11">*</span> </label>
                                         <input name="pan_attach_no" class="form-control input-md" type="text" placeholder="Please enter your 10-digit Pan card number">
                                    </div>
                                    <div class="form-group">
                                       <img src="<?php echo base_url();?>assets/images/sample.jpg" class="img-resposive" width="300" height="200" id="PanImgPreview">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Browse<input type="file" name="panAttachCopy" id="PanPreview"  onchange="panAttachment();">
                                                </span>
                                            </span>
                                            <input type="text" id="" value="" class="form-control" readonly >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address (Attach Proof)</label>
                                        <textarea class="form-control" name="address_text" rows="5" id="comment" placeholder="Please Enter Your Address"></textarea><br>
                                        <img src="<?php echo base_url();?>assets/images/user-15.jpg" class="img-resposive" width="300" height="200"  id="AddressImgPreview">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Browse<input name="address_attach_proof" type="file"  id="AddressPreview"  onchange="addressAttachment();">
                                                </span>
                                            </span>
                                            <input type="text"  id="" value="" class="form-control" readonly >
                                        </div>
                                    </div>            
                                    <div class="form-group">
                                        <label>Bank A/c Details (Attach cancelled cheque) <span style="color:#EB8B11">*</span></label>
                                            <img src="<?php echo base_url();?>assets/images/user-15.jpg" width="300" height="200"  class="img-resposive" id="BankImgPreview">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Browse<input type="file" name="bank_attach_cheque" id="BankPreview" onchange="bankAttachment();">
                                                </span>
                                            </span>
                                            <input type="text" id="" value="" class="form-control" readonly >
                                        </div>
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
        name:
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
        mobile_number: {
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
	pan_attach_no: {
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
	
	address_text: {
            validators: {
		notEmpty:
			{
			    message: 'address text is required'
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
    function bankAttachment(){
        var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("BankPreview").files[0]);
	oFReader.onload = function (oFREvent) {
	    var data=document.getElementById("BankImgPreview").src = oFREvent.target.result;
	};
    }
    function addressAttachment(){
        var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("AddressPreview").files[0]);
	oFReader.onload = function (oFREvent) {
	    var data=document.getElementById("AddressImgPreview").src = oFREvent.target.result;
	};
    }    
</script>