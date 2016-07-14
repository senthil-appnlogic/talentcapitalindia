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
                            <h4 class="panel-title">Edit User Form</h4>
                        </div>
                        <div class="panel-body">
                            <form id="form_validation" action="<?php base_url('vendorlogin/adminVendorEdit/.$id');?>"   enctype="multipart/form-data" role="form" method="post">
                                <div class="col-md-4 col-md-offset-3">
                                
                                    <div class="form-group">
                                        <h2 class="headingLine" id="candidate">Edit User</h2>
                                    </div>
				     <div class="form-group">
                                        <label>Vendor Code</label>
                                        <input value="<?php echo $vendorEdit[0]['vendor_code']?>" name="name"  class="form-control input-md" type="text" placeholder="code" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input value="<?php echo $vendorEdit[0]['name']?>" name="name"  class="form-control input-md" type="text" placeholder="Name">
                                    </div>
				    <div class="form-group">
                                        <label>Email</label>
                                        <input readonly="" value="<?php echo $vendorEdit[0]['email'] ?>" name="email"  class="form-control input-md" type="text" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile <span style="color:#EB8B11">*</span> </label>
                                        <input name="mobile_number" value="<?php echo $vendorEdit[0]['mobile_number'] ?>"  class="form-control input-md" type="text" placeholder="Phone Number">
                                    </div>

                                    <div class="form-group">
                                       <img src="<?php echo site_url($vendorEdit[0]['profile_pic'])?>" class="img-resposive" width="256" height="256" id="PanImgPreview"><input type="hidden" name="oldimage" value="<?php echo $vendorEdit[0]['profile_pic'] ?>"
                                    </div>
                                    <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                            Browse<input readonly=="" value="<?php echo site_url($vendorEdit[0]['profile_pic'])?>" type="file" name="profile_pic" id="PanPreview"  onchange="vendorAdd();">
                                            </span>
                                        </span>
                                        <input type="text" id="" value="<?php echo site_url($vendorEdit[0]['profile_pic'])?>" class="form-control" readonly >
                                        </div>
                                    </div>
                                  
                                    <div class="form-group col-md-offset-3">
                                        <input type="submit" name="Update" class="btn btn-success" value="Update">
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
    

    function vendorAdd(){
        var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("PanPreview").files[0]);
	oFReader.onload = function (oFREvent) {
	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
	};
    }
    
</script>