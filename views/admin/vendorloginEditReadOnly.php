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
                            <h4 class="panel-title">Vendor Form</h4>
                        </div>
                        <div class="panel-body">
                            <form id="form_validation" action=""   enctype="multipart/form-data" role="form" method="post">
                                <div class="col-md-6 col-md-offset-3">
                                
                                    <div class="form-group">
                                        <h2 class="headingLine" id="candidate">Vendor</h2>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="username" readonly value="<?php echo $vendorloginEditRow[0]['name']?>"  class="form-control input-md" type="text" placeholder="Vendor Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number <span style="color:#EB8B11">*</span> </label>
                                        <input name="mobileno" readonly  value="<?php echo $vendorloginEditRow[0]['mobile_number']?>"  class="form-control input-md" type="text" placeholder="Number">
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span style="color:#EB8B11">*</span> </label>
                                        <input name="email" readonly value="<?php echo $vendorloginEditRow[0]['email']?>" class="form-control input-md" type="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Pan Attach (Proof)  <span style="color:#EB8B11">*</span> </label>
                                         <input name="vendor_pancard_no" readonly value="<?php echo $vendorloginEditRow[0]['pan_attach_no']?>" class="form-control input-md" type="text" placeholder="Please enter your 10-digit Pan card number">
                                    </div>
                                    <div class="form-group">
                                       <img src="<?php echo site_url($vendorloginEditRow[0]['pan_attach_copy'])?>" class="img-resposive" width="300" height="200" id="PanImgPreview">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Browse<input type="file" disabled= name="vendor_pancard_image" id="PanPreview">
                                                </span>
                                            </span>
                                            <input readonly type="text" id="" value="<?php echo site_url($vendorloginEditRow[0]['pan_attach_copy'])?>" class="form-control" readonly >
                                        </div>
                                    </div>
				     <div class="form-group">
                                        <label>Address (Attach Proof) <span style="color:#EB8B11">*</span> </label>
                                        <textarea readonly id="comment" class="form-control"  name="address_text" rows="5"><?php echo $vendorloginEditRow[0]['address_text']?></textarea>
                                    </div>
                                    <div class="form-group">					
                                       <img src="<?php echo site_url($vendorloginEditRow[0]['pan_attach_copy'])?>" class="img-resposive" width="300" height="200" id="PanImgPreview">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Browse<input type="file" disabled= name="vendor_pancard_image" id="PanPreview">
                                                </span>
                                            </span>
                                            <input readonly type="text" id="" value="<?php echo site_url($vendorloginEditRow[0]['pan_attach_copy'])?>" class="form-control" readonly >
                                        </div>
                                    </div>
                                    <div class="form-group">
					<label>Bank A/c Details (Attach cancelled cheque) <span style="color:#EB8B11">*</span> </label>
                                       <img src="<?php echo site_url($vendorloginEditRow[0]['pan_attach_copy'])?>" class="img-resposive" width="300" height="200" id="PanImgPreview">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Browse<input type="file" disabled= name="vendor_pancard_image" id="PanPreview">
                                                </span>
                                            </span>
                                            <input readonly type="text" id="" value="<?php echo site_url($vendorloginEditRow[0]['bank_attach_cheque'])?>" class="form-control" readonly >
                                        </div>
                                    </div>				    
                                </div>
                            </form>
                             <div class="col-md-10 col-md-offset-3" style="padding-bottom: 15px;">
				<button type="button" onclick="window.history.back();" class="btn btn-warning">cancel</button>
			    </div> 

                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
		</div>
