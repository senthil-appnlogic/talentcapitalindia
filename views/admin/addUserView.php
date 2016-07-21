<?php
$status = $this->session->flashdata('status');
?>
<div class="content" id="content">
			<!-- begin breadcrumb -->
			<!--<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Vendor</li>
				
			</ol>-->
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<!--<h1 class="page-header">user <small>details are here...</small></h1>-->
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
                            <h4 class="panel-title">User Form</h4>
                        </div>
                        <div class="panel-body" id="form_validation">
                        <?php if($status)
			{?>
			    <div id="alert" class="alert alert-success outer"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
			    <?php
			} ?>
			     <p>
				<a class="btn btn-primary btn-sm " href="<?php echo site_url('admin/userAdd')?>"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add</span></a>
			    </p>
				<div class="table-responsive" style="border: none">
					<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					  <thead>
						<tr>
						    <th data-class="expand">Created Date</th>
						    <th data-class="expand">Name</th>
						    <th data-hide="phone,tablet">Email</th>
						    <th>Profile pic</th>
						    <th>InternalEmp Code</th>
						    <th>Approved Y/N</th>
						    <th>Role</th>
						    <th>Action</th>
						</tr>
						
					    </thead>
					    <tbody>
						<?php if(count($userDetails) > 0)
							     { foreach($userDetails as $row) {  ?>
					       
						<tr class="oddClass even gradeC" >
						    <td id=""><?php echo $row['cr_date']; ?></td>
						    <td id="USER_NAME" style="cursor:pointer;" class="clickable-row" data-href='<?php echo site_url('admin/addUserEditView/'.$row['id'])?>'><u><?php echo $row['user_name']; ?></u></td>					    
						    <td id="EMAIL"><?php echo $row['email']; ?></td>
						    <td><img src="<?php echo site_url($row['user_image']);?>" class="img-resposive" width="70" height="70" id="PanImgPreview"></td>
						    <td><?php echo $row['intemp_code']; ?></td>
						    <td><input type="checkbox" <?php if($row['status']=='Y'){ echo 'checked';}?> class="lcs_check" id="approvedYN"></td>
						    <td><?php echo $row['role']; ?></td>
						    <td>
						    <a href="<?php echo site_url('admin/editUser/'.$row['id'])?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a>
						    <a onlclick="userDelete();" href="<?php echo site_url('admin/userDelete/'.$row['id'])?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a></td>
						</tr>
					    <?php }}?>
					    </tbody>
					</table>
		    
				</div>

                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
		</div>
	<script>
	function userDelete(){
	$('#form_validation').on('click', '#delete_box', function(e) {
		//alert("test");
	e.preventDefault();

         var link = $(this).attr('href');
	 bootbox.confirm("Are you sure you want to delete?", function(confirmed) {   
               if (confirmed) {
                     window.location.href = link;     
                }    
            });
	});
	}
	
	    
	$(document).ready(function() {
	    switcherRefresh();
	 setTimeout(function(){ $('#alert').remove();}, 5000);
	    $('#data-table').DataTable( {
		dom: 'Bfrtip',
		"ordering":false,
		buttons: [
		    //'copyHtml5',
		    'excelHtml5',
		    //'csvHtml5',
		    'pdfHtml5'
		]
	    } );
	} );
		    
	    $(document).ready(function($) {
	    $(".clickable-row").click(function() {
	     window.document.location = $(this).data("href");
	    });
	});
	</script>
	
	<script type="text/javascript">
	function switcherRefresh()
	{
	    $('.lcs_check').lc_switch('Y','N');
	    $('.lcs_check').lc_switch();
	    $('.lcs_wrap').delegate('#approvedYN', 'lcs-statuschange',function() {
		if($(this).is(":checked")){
		    var $row = $(this).parents('.oddClass');
		    bootbox.confirm("Are you sure you want to Approve?", function(confirmed) {
			if(confirmed){
			    var statusYN = 'Y';
			    var userEmail = $row.find('[id="EMAIL"]').text();
			    var userName = $row.find('[id="USER_NAME"]').text();
			    $.ajax({
				type: "POST",
				url: "<?=site_url('admin/sendUserCredential')?>",
				dataType:"json",
				data:{userEmail:userEmail,userName:userName,statusYN:statusYN} ,                    
				success: function (json) {
				    window.location.reload();
				},
			    });
			}
		    });				
		}
		else{
		    var $row = $(this).parents('.oddClass');
		    bootbox.confirm("Are you sure you want to Reject?", function(confirmed) {
			if(confirmed){
			    var statusYN = 'N';
			    var userEmail = $row.find('[id="EMAIL"]').text();
			    alert(userEmail);
			    var userName = $row.find('[id="USER_NAME"]').text();
			    alert(userName);
			    $.ajax({
				type: "POST",
				url: "<?=site_url('admin/sendUserCredential')?>",
				dataType:"json",
				data:{userEmail:userEmail,userName:userName,statusYN:statusYN} ,                    
				success: function (json) {
				    window.location.reload();
				},
			    });
			}
		    });		    
		}
	    });	
	}
    </script>
	
	