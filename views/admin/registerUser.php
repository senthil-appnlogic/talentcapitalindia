<?php
$status = $this->session->flashdata('status');
?>
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
                            <h4 class="panel-title">Register Users</h4>
                        </div>
                        <div class="panel-body" id="form_validation">
                        <?php if($status)
			{?>
			    <div id="alert" class="alert alert-success outer"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
			    <?php
			} ?>
			   <!--  <p>
				<a class="btn btn-primary btn-sm " href="<?php// echo site_url('admin/vendorAdd')?>"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add Vendor</span></a>
			    </p>-->
				<div class="table-responsive" style="border: none">
									<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					  <thead>
						<tr>
						    <th data-class="expand">Login Type</th>
						    <th data-hide="phone,tablet">Username</th>
						    <th data-hide="phone,tablet">Email</th>
						    <th data-hide="phone,tablet">Approved Status</th>
						    <th data-hide="phone,tablet">Mobile Number</th>
						    
						</tr>
					    </thead>
					    <tbody>
						<?php if(count($registerUser) > 0)
							     { foreach($registerUser as $row) {  ?>
					       
						<tr class="even gradeC">
						    			    
						    <td><?php echo $row['login_type']; ?></td>
						    <td><?php echo $row['username']; ?></td>
						    <td><?php echo $row['email']; ?></td>				    
						    <td><?php echo $row['active_status']; ?></td>				    
						    <td><?php echo $row['mobileno'];?></td>
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
	
//	$('#form_validation').on('click', '#delete_box', function(e) {
//		
//	e.preventDefault();
//	
//         var link = $(this).attr('href');
//	 bootbox.confirm("Are you sure you want to delete?", function(confirmed) {   
//               if (confirmed) {
//                     window.location.href = link;     
//                }    
//            });
//	});
//	
	
	    
	$(document).ready(function() {
	 setTimeout(function(){ $('#alert').remove();}, 5000);
	    $('#data-table').DataTable( {
		dom: 'Bfrtip',
		buttons: [
		    //'copyHtml5',
		    //'excelHtml5',
		    //'csvHtml5',
		    //'pdfHtml5'
		]
	    } );
	} );
		    
	    $(document).ready(function($) {
	    $(".clickable-row").click(function() {
	     window.document.location = $(this).data("href");
	    });
	});
	</script>
	
	