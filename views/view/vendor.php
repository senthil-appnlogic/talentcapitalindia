<style>
     .container.tab-pane{
	  display: none;
     }
     .container.tab-pane.active{
	  display: block;
     }
</style>

<div class="container" style="padding-top: 80px;padding-bottom: 40px;">
     <?php $status=$this->session->flashdata('status');?>
     <?php if($status) { ?>
     <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
     <?php } ?>
    <form id="form_validation" method="post" action="" enctype="multipart/form-data" role="form">
        <div class="col-md-6 col-md-offset-3">        
            <div class="form-group">
                <h2 class="headingLine" id="candidate">Hiring Partner</h2>
            </div>
	    <input type="hidden" name="checking" value="yes">
	    <div class="form-group">
                <label>Your Code</label>
                <input class="form-control input-md" name="vendor_code" value="<?php echo $getVendorDetails[0]['vendor_code']?>" type="text" readonly>
            </div>	    
            <div class="form-group">
                <label>Name</label>
                <input class="form-control input-md" data-toggle="tooltip" value="<?php echo $getVendorDetails[0]['name']?>" data-trigger="manual" data-title="Caps lock is on"  name="name" type="text" placeholder="Name" readonly>
            </div>
	    
            <div class="form-group">
                <label>Mobile Number <span style="color:#EB8B11">*</span> </label>
                <input class="form-control input-md" value="<?php echo $getVendorDetails[0]['mobile_number']?>" name="mobile_number" type="text" placeholder="Number" readonly>
            </div>
            <div class="form-group">
                <label>Email <span style="color:#EB8B11">*</span> </label>
                <input class="form-control input-md" type="text" value="<?php echo $getVendorDetails[0]['email']?>" name="email" readonly>
            </div>
            <div class="form-group">
                <label>Pan Attach (Proof) <span style="color:#EB8B11">*</span> </label>
		 <input class="form-control input-md" type="text" name="pan_attach_no" placeholder="Please enter your 10-digit Pan card number" style="text-transform: uppercase;">
	    </div>
	    <div class="form-group">
               <img src="<?php echo base_url();?>assets/images/sample.jpg" class="img-resposive" width="300" height="200" id="PanImgPreview">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file">
                            Browse<input type="file" id="PanPreview" name="pan_attach_copy"  onchange="panAttachment();">
                        </span>
                    </span>
                    <input type="text" id="" value="" class="form-control" readonly >
                </div>
            </div>
            <!--<div class="form-group">
                <label>Address (Attach Proof)</label>
                <textarea class="form-control" rows="5" name="address_text" id="comment" placeholder="Please Enter Your Address"></textarea><br>
                <img src="<?php echo base_url();?>assets/images/user-15.jpg" class="img-resposive" width="300" height="200"  id="AddressImgPreview">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file">
                            Browse<input type="file" id="AddressPreview" name="address_attach_proof" onchange="addressAttachment();">
                        </span>
                    </span>
                    <input type="text" id="" value="" class="form-control" readonly >
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
                            Browse<input type="file" id="BankPreview" name="bank_attach_cheque" onchange="bankAttachment();">
                        </span>
                    </span>
                    <input type="text" id="" value="" class="form-control" readonly >
                </div>
            </div>-->
            <div class="form-group col-md-offset-3">
		    <input type="submit" name="save" value="Submit" class="btn btn-sm btn-success">
		<button type="button" class="btn btn-sm btn-warning">cancel</button>
            </div>            
        </div>
	 <div class="col-md-3" style="padding-top:20px">
	    <div class="form-group">
		<label>Profile Picture</label>
		<img src="<?php echo base_url();?>assets/images/profile.png" class="img-resposive" width="200" height="200" id="ProImgPreview">
	    </div>
	    <div class="form-group ">
		<div class="input-group">
		    <span class="input-group-btn">
			<span class="btn btn-primary btn-file">
			    Browse<input type="file" name="profile_pic" id="ProfileImgPreview" onchange="profilePic();">
			    </span>
			</span>
		    <input type="text" id="" value="" class="form-control" readonly >
			</div>
	    </div>
			 </div>  
    </form>
</div>

<script>
    $('#form_validation').bootstrapValidator({
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
		    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The full name can consist of alphabetical characters and spaces only'
                    }
		}
	    },
	    mobile_number: {
		validators: {
		    notEmpty: {
			message: 'The mobile number is required and can\'t be empty'
		    },
		    regexp: {
                        regexp: /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/,
                        message: 'Mobile Number contains only 10 Digit Numbers'
                    }
		}
	    },
	    email: {
		validators: {
		    notEmpty: {
			message: 'The email number is required and can\'t be empty'
		    },
		    regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
		}
	    },
	    pan_attach_no: {
		validators: {
		    notEmpty: {
			message: 'The pan number is required and can\'t be empty'
		    },
		    regexp: {
                        regexp: /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/,
                       
                    },
		    stringLength: {
                        max: 10,
                        message: 'PAN Number contains only 10 Digit Numbers and CAPITAL Characters'
                    }
		   
		}
	    },
	//    pan_attach_copy: {
	//	validators: {
	//	    notEmpty: {
	//		message: 'The pan attach is required and can\'t be empty'
	//	    },
	//	}
	//    },
	    address_text: {
		validators: {
		    notEmpty: {
			message: 'The address is required and can\'t be empty'
		    },
		}
	    },
	//    address_attach_proof: {
	//	validators: {
	//	    notEmpty: {
	//		message: 'The address attach is required and can\'t be empty'
	//	    },
	//	}
	//    },
	//    bank_attach_cheque: {
	//	validators: {
	//	    notEmpty: {
	//		message: 'The bank Attach is required and can\'t be empty'
	//	    },
	//	}
	//    },	    	    
	}
    });
     $('[type=text]').keypress(function(e) {
       var $name = $(this),
	   tooltipVisible = $('.tooltip').is(':visible'),
	   s = String.fromCharCode(e.which);
       
       //Check if capslock is on. No easy way to test for this
       //Tests if letter is upper case and the shift key is NOT pressed.
       if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
	 if (!tooltipVisible)
	     $name.tooltip('show');
       } else {
	 if (tooltipVisible)
	     $name.tooltip('hide');
       }
       
       //Hide the tooltip when moving away from the password field
       $name.blur(function(e) {
	 $name.tooltip('hide');
       });
     });

          function profilePic(){
	  var oFReader = new FileReader();
	  oFReader.readAsDataURL(document.getElementById("ProfileImgPreview").files[0]);
	  oFReader.onload = function (oFREvent) {
	       var data=document.getElementById("ProImgPreview").src = oFREvent.target.result;
	};
     }      
    
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