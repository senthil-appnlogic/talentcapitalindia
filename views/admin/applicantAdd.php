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
                            <h4 class="panel-title">Applicant Form</h4>
                        </div>
                        <div class="panel-body">
			    <form action="<?php echo site_url('talentcontroller/applicantAdd'); ?>" class=""  id="form_validation" method="post" name="form_validation" enctype="multipart/form-data">
                            <!--<form id="form_validation" action="<?php base_url('talentcontroller/applicantAdd');?>"   enctype="multipart/form-data"  method="post">-->
                                    <div class="col-md-6 col-md-offset-3">
          
                                        <div class="form-group">
                                            <h2 class="headingLine" id="candidate">Direct Applicant</h2>
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control input-md" name="name" type="text" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number <span style="color:#EB8B11">*</span></label>
                                            <input class="form-control input-md" name="mobile_number" type="text" placeholder="Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Email <span style="color:#EB8B11">*</span></label>
                                            <input class="form-control input-md" name="email" type="text" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Skills <span style="color:#EB8B11">*</span></label>
                                            <select multiple class="form-control chzn-select input-sm" name="skill[]">
                                                <option>C</option>
                                                <option>C++</option>
                                                <option>Java</option>
                                                <option>Dot Net</option>
                                                <option>C#</option>
                                                <option>PHP</option>
                                                <option>Python</option>
                                                <option>Perl</option>
                                                <option>Ruby</option>
                                                <option>Javascript</option>
                                                <option>SQL</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-offset-3">
                                                <input type="submit" name="Save" value="Save" class="btn btn-sm btn-success">
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
    $(".chzn-select").chosen();
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
          'skill[]': {
      validators: {
   
   notEmpty: {
       message: 'The Skill is required and can\'t be empty'
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