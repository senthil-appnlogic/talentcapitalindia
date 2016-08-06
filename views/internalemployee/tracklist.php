    <?php
//$session_data=$this->session->userdata('login_type');
//exit;


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
                            <h4 class="panel-title">Internal Employee</h4>
                        </div>
                        <div class="panel-body" id="form_validation">
                        <?php if($status)
			{?>
			    <div id="alert" class="alert alert-success outer"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
			    <?php
			} ?>
			    <!-- <p>
				<a class="btn btn-primary btn-sm " href="<?php echo site_url('internalemployee/intEmpAddUser')?>"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add Candidate</span></a>
			    </p>-->
				<div class="table-responsive" style="border: none">
					<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					  <thead>
						<tr>
						    <th data-class="phone,tablet">Created Date</th>
						    <th data-class="expand">Email</th>
						</tr>
					    </thead>
					    <tbody>
						<?php if(count($emailtrack) > 0){ foreach($emailtrack as $row)   { ?>
					       
						<tr class="oddClass even gradeC">
						    <td><?php echo $row['cr_date']; ?></td>
						    <td><?php echo $row['email']; ?></td>					    
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
$(document).ready(function() {
	    $('#data-table').DataTable( {
		dom: 'Bfrtip',
		"ordering":false,
		buttons: [
		    //'copyHtml5',
		    'excelHtml5',
		    //'csvHtml5',
		    //'pdfHtml5'
		    
		]
	    } );
	    
	} );
</script>
