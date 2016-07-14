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
			     <p>
				<a class="btn btn-primary btn-sm " href="<?php echo site_url('internalemployee/intEmpAddUser')?>"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add Candidate</span></a>
			    </p>
				<div class="table-responsive" style="border: none">
					<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					  <thead>
						<tr>
						    <th data-class="expand">Name</th>
						    <th data-hide="phone,tablet">Mobile Number</th>
						    <th data-hide="phone,tablet">Email</th>
						    <th data-hide="phone,tablet">Skills</th>
						    <th data-hide="phone,tablet">Pan Number</th>
						    <th>Location</th>
						    <th data-hide="phone,tablet">Candidate Status</th>
						    <th>Action</th>
						    
						</tr>
					    </thead>
					    <tbody>
						<?php if(count($internalDetails) > 0){ foreach($internalDetails as $row)   { ?>
					       
						<tr class="oddClass even gradeC">
						    
						    <td id="USER_NAME" style="cursor:pointer;" class="clickable-row" data-href='<?php echo site_url('internalemployee/internalEmpEdit/'.$row['id'])?>'><u><?php echo $row['candidate_name']; ?></u></td>					    
						    <td><?php echo $row['mobile_number']; ?></td>
						    <td id="EMAIL"><?php echo $row['mail_id']; ?></td>
						    <td><?php echo $row['skills']; ?></td>				    
						    <td><?php echo $row['pan_card_no']; ?></td>
						    <td><?php echo $row['current_location']; ?></td>					     
						    <td><button onclick="shoingModal(<?php echo $row['id']; ?>)" id="Cand_status_<?php echo $row['id']; ?>" class="btn btn-danger btn-md"><?php echo $row['candidate_status']; ?></button></td>
						    <td>
						    <a href="<?php echo site_url('internalemployee/internalEmpEdit/'.$row['id'])?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a>
						    <a id="delete_box" href="<?php echo site_url('internalemployee/InternalEmpDelete/'.$row['id'])?>"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
						    <a  href="#" data-toggle="modal" data-target="#printPreview"  class="btn btn-primary btn-xs" onclick="printVendorDetails('<?php echo $row['id'];?>')"><i class="fa fa-file-pdf-o fa-2x"></i> </a>
						    </td>
						</tr>
					    <?php }}?>
					    </tbody>
					</table>
		    
				</div>
				<!--PDF STARTS-->
				<div class="modal fade" id="printPreview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog modal-lg">
					<div class="modal-content">
					    <form  id="category-form" class="smart-form" >
						<div class="modal-header" style="border-bottom: 1px solid #e5e5e5; min-height: 16.4286px; padding: 15px;">   
						    <b><img alt="" data-id="login-cover-image" height="50px" width="100px" src="http://localhost/talentCapitalAdmin/assets/images/logo.png"></b>
						    <button aria-hidden="true" data-dismiss="modal" class="close" type="button onClick="onClickHandler(this)"><i class="fa  fa-times-circle "></i></button>
						    			
						</div>
						<div class="model-body">
						    <iframe class="responsiveiframe table-responsive" width="900px" id="previewiframe" height="1000px"></iframe>
						</div>
					    </form>
					    <input type="hidden" id="emailSystemId">
					</div>
				    </div>
				</div>

				<!--PDF ENDS-->
				<!-- CANDIDATE STATUS STARTS -->
				<div id="myModal" class="modal fade" role="dialog">
				    <div class="modal-dialog">
				      <!-- Modal content-->
					<div class="modal-content">
					    <div class="modal-header">
					      <button type="button" class="close" data-dismiss="modal">&times;</button>
					      <h4 class="modal-title">Change Candidate Status</h4>
					    </div>
					    <div class="modal-body">
						
						    <p>Please select the Option</p>
						    <div class="form-group">
							<label>Status</label>
							<select  class="form-control  input-sm" id="candidate_status"  name="candidate_status">
							    <option value="ShortListed">Short Listed</option>
							    <option value="Rejected">Rejected</option>
							    <option value="ScheduleTelephonic">Schedule for Telephonic</option>
							    <option value="ScheduleFace">Schedule for Face to Face</option>
							    <option value="Selected">Selected</option>
							    <option value="Joined">Joined</option>
							    <option value="RejectTelephonic">Rejected for Telephonic</option>
							    <option value="RejectFace">Rejected for Face to Face</option>
							</select>
						    </div>
						    <input type="hidden"  value="" name="candidate_id" id="candidate_id">
						    <div>
							 <button type="button" data-dismiss="modal" onclick="candidate_status()" class="btn btn-success" data-dismiss="modal">Submit</button>    
						    </div>
					    </div>
					    <!--<div class="modal-footer">
					  <button type="button" class="btn btn-default" >Close</button>
					</div>-->
				      </div>
				  
				    </div>
				</div>
				<!-- CANDIDATE STATUS ENDS-->
				

                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
		</div>
	<script>
	  
	 
	$('#form_validation').on('click', '#delete_box', function(e) {
		
	e.preventDefault();
	
         var link = $(this).attr('href');
	 bootbox.confirm("Are you sure you want to delete?", function(confirmed) {   
               if (confirmed) {
                     window.location.href = link;     
                }    
            });
	});
	
	
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
		    //'pdfHtml5'
		    
		]
	    } );
	    
	} );
	
	
	function shoingModal(id){
	   // alert(id);
	    $('#myModal').modal({show:true});
	    $("#candidate_id").val(id);
	    
	}
	function candidate_status()
	{
	    var candidate_status=$("#candidate_status").val();
	    var candidate_id=$("#candidate_id").val();
	    
	    $.ajax({
		type: "POST",
		url: "<?=site_url('internalemployee/candidate_status')?>",
		dataType:"json",
		data:{candidate_status:candidate_status,candidate_id:candidate_id} ,                    
		success: function (json) {
		    
		    if (json.sccess=="ShortListed") {
			$("#Cand_status_"+candidate_id).text("Short Listed");
		    }
		    if (json.sccess=="Rejected") {
			$("#Cand_status_"+candidate_id).text("Rejected");
		    }
		    if (json.sccess=="ScheduleTelephonic") {
			$("#Cand_status_"+candidate_id).text("Schedule for Telephonic");
		    }
		    if (json.sccess=="ScheduleFace") {
			$("#Cand_status_"+candidate_id).text("Schedule for Face to Face");
		    }
		    if (json.sccess=="Selected") {
			$("#Cand_status_"+candidate_id).text("Selected");
		    }
		    if (json.sccess=="Joined") {
			$("#Cand_status_"+candidate_id).text("Joined");
		    }
		    if (json.sccess=="RejectTelephonic") {
			$("#Cand_status_"+candidate_id).text("Rejected for Telephonic");
		    }
		    if (json.sccess=="RejectFace") {
			$("#Cand_status_"+candidate_id).text("Rejected for Face to Face");
		    }
		    
		    console.log(json)
		   
		},
	    });
	    
	    
	    
	    
	}
	
		 
		function printVendorDetails(systemId)
		
		{
		    var data = "vendorlogin/vendorPrint/"+systemId;
		    var preview = "<?php echo site_url()?>"+data;
		    $('#previewiframe').attr('src',preview);
		    var dataURL = "vendorlogin/vendorPrint/"+systemId;
		   
		   
		}
	        
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
		    bootbox.confirm("Are you sure you want to Aprove?", function(confirmed) {
			if(confirmed){
			    var userEmail = $row.find('[id="EMAIL"]').text();
			    var userName = $row.find('[id="USER_NAME"]').text();
			    var emailRandomCode = $row.find('[id="emailRandomCode"]').val();
			    $.ajax({
				type: "POST",
				url: "<?=site_url('talentcontroller/sendCredential')?>",
				dataType:"json",
				data:{userEmail:userEmail,userName:userName,emailRandomCode:emailRandomCode} ,                    
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