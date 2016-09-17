<style>
    .headingLine{
        font-size:17px;
    }
</style>
<div class="content" id="content">
			<!-- begin breadcrumb -->
			<!--<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">User</li>
				
			</ol>-->
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<!--<h1 class="page-header">User <small>details are here...</small></h1>-->
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
                            <h4 class="panel-title">Add User Form</h4>
                        </div>
                        <div class="panel-body">
                            <form id="form_validation" action="<?php echo base_url('admin/userAdd');?>"   enctype="multipart/form-data" role="form" method="post">
                                <div class="col-md-4 col-md-offset-3">
                                
                                    <div class="form-group">
                                        <h2 class="headingLine" id="candidate">Add User</h2>
                                    </div>
				    <div class="form-group">
                                        <label>Role</label>
                                        <select name="user_role" class="form-control selectpicker" onchange="clientView($(this));" data-style="btn-white">
					    <option selected disabled>Select Role</option>
					    <option value="Admin">Admin</option>
					    <option value="InternalEmployee">Internal Employee</option>
					</select>
				    </div>
				    <div class="form-group" id="client_all">
					<label>All Clients<span style="color:#EB8B11">*</span></label></br>
					<div class="row">
					  <div class="form-group col-md-2">
					      <input  class="lcs_check" id="switch_YN" type="checkbox">
					      <input type="hidden" id="Switch_Val" name="yesno" value="N" />
					  </div>
					</div>
				    </div>
				    <div class="form-group" id="client_role" style="width:100%">
                                        <label>Clients</label>
					<select multiple class="form-control chzn-select input-sm" name="client[]">
					    <option></option>
					    <?php
					    foreach ($clientsDetails as $row)
					    {?>
					    <option value="<?php echo $row['clientname']; ?>"><?php echo $row['clientname']; ?></option>
					    <?php } ?>
					    <!--<option value="<?php echo $str;?>">All</option>-->
					    <!--<option value="Any">All</option>-->
					</select>
				    </div>
				    <?php
					$clientname = array();
					foreach ($clientsDetails as $item) {
					    $clientname[] = $item['clientname'];
					}
					$str = implode("','", $clientname);
					$strng = "'".$str."'";
				    ?>
				    <input type="hidden" name="yesnoss" value="<?php echo $strng; ?>" />
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="username"  class="form-control input-md" type="text" placeholder="Name">
                                    </div>
				      <div class="form-group">
                                        <label>Email</label>
                                        <input name="email"  class="form-control input-md" type="text" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span style="color:#EB8B11">*</span> </label>
                                        <input name="password"  class="form-control input-md" type="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>conform Password <span style="color:#EB8B11">*</span> </label>
                                        <input name="confirmPassword" class="form-control input-md" type="password" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                       <img src="<?php echo base_url();?>assets/images/user_icon.jpg" class="img-resposive" width="256" height="256" id="PanImgPreview">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Browse<input type="file" name="user_image" id="PanPreview"  onchange="userAdd();">
                                                </span>
                                            </span>
                                            <input type="text" id="" value="" class="form-control" readonly >
                                        </div>
                                    </div>
                                  
                                  
                                    <div class="form-group col-md-offset-3">
                                        <input type="submit" name="Save" class="btn btn-success" value="Save">
                                        <button type="button" onclick="window.history.back();" class="btn btn-warning">cancel</button>
                                         <button type="reset" class="btn btn-danger">Reset</button>
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
    $(document).ready(function() {
        $(".chzn-select").chosen({});
	$('#form_validation').bootstrapValidator({
	    message: 'This value is not valid',
	    framework: 'bootstrap',
	    excluded: [':disabled'],
			feedbackIcons: {
			valid: 'fa fa-check',
			invalid: 'fa fa-times',
			validating: 'fa fa-refresh'
		    },
	    fields: {
		user_role:
			{
			    validators:
			    {
				notEmpty:
				{
				    message: 'Role is required'
				},
				
			    }
			},
		username:
			{
			    trigger:'blur',
			    validators:
			    {
				notEmpty:
				{
				    message: 'Username is required'
				},
				
			    }
			},
			email:
			{
			    trigger:'blur',
			    validators:
			    {
				notEmpty:
				{
				    message: 'Email is required'
				},
				remote:
				{
				    message: 'Email Already Existed',
				    url: '<?php echo base_url('admin/userCheck')?>',
				    type: 'POST'
				}
			    }
			},
		password: {
		    validators: {
			identical: {
			    field: 'confirmPassword',
			    message: 'The password and its confirm are not the same'
			}
		    }
		},
		confirmPassword: {
		    validators: {
			identical: {
			    field: 'password',
			    message: 'The password and its confirm are not the same'
			}
		    }
		}
	    }
	});
    });
    function userAdd(){
        var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("PanPreview").files[0]);
	oFReader.onload = function (oFREvent) {
	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
	};
    }
    
    function clientView($this){
	if ($this.val()=="Admin") {
	    $("#client_role").removeClass("hidden");
	    $("#client_all").removeClass("hidden");
	}else{
	    $("#client_role").addClass("hidden");
	    $("#client_all").addClass("hidden");
	}
	
    }
    
    $(document).ready(function(){
	$('.lcs_check').lc_switch('Y','N');
	$('.lcs_check').lc_switch();
	$('.lcs_wrap').delegate('#switch_YN', 'lcs-on', function() {
	  $('input[id="Switch_Val"]').val('Y');
	  $("#client_role").addClass("hidden");
	});
	$('.lcs_wrap').delegate('#switch_YN', 'lcs-off', function() {
	    $('input[id="Switch_Val"]').val('N');
	    $("#client_role").removeClass("hidden");
	});
    });
    
//    $(function(){
//	var check = $("#Switch_Val").val();
//	alert(check);
//	if (check == 'Y') {
//	    alert('ss');
//	}
//    });
    
    
//    function choosenSelect($this){
//	var ss = $this.val();
//	if (ss!="All") {
//	    alert();
//	    $('#dd').attr("disabled", true); 								
//	}
//    }
    
</script>