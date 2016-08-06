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
                            <h4 class="panel-title">Vendor Form</h4>
                        </div>
                        <div class="panel-body" id="form_validation">
                        <?php if($status)
			{?>
			    <div id="alert" class="alert alert-success outer"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
			    <?php
			} ?>
			     <p>
				<a class="btn btn-primary btn-sm " href="<?php echo site_url('vendorlogin/vendorAddUser')?>"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add Candidate</span></a>
			    </p>
				<div class="table-responsive" style="border: none">
					<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					  <thead>
						<tr>
						    <th rowspan="2" data-class="expand">Created Date</th>
						    <th rowspan="2" data-class="expand">Name</th>
						    <th rowspan="2" data-hide="phone,tablet">Mobile Number</th>
						    <th rowspan="2" data-hide="phone,tablet">Email</th>
						    <th rowspan="2" data-hide="phone,tablet">skills</th>
						    <!--<th data-hide="phone,tablet">Primary other Skills</th>-->
						    <th rowspan="2" data-hide="phone,tablet">Secondary skills</th>
						    <!--<th data-hide="phone,tablet">Secondary other Skills</th>-->
						    <th rowspan="2" data-hide="phone,tablet">Total experience</th>
						    <th rowspan="2" data-hide="phone,tablet">Total experience Month</th>
						    <th rowspan="2" data-hide="phone,tablet">Relevent experience</th>
						    
						    <th rowspan="2" data-hide="phone,tablet">Relevent Experience Month</th>
						    <th rowspan="2" data-hide="phone,tablet">Current CTC in Lacks</th>
						    <th rowspan="2" data-hide="phone,tablet">Current CTC in Thousands</th>
						    <th rowspan="2" data-hide="phone,tablet">Expected CTC in Lacks</th>
						    <th rowspan="2" data-hide="phone,tablet">Expected CTC in Thousands</th>
						    
						    <th rowspan="2" data-hide="phone,tablet">Notice Period</th>
						    <!--<th data-hide="phone,tablet">Current ctc</th>-->
						    <!--<th data-hide="phone,tablet">Expected ctc</th>-->
						    <th rowspan="2" data-hide="phone,tablet">Day</th>
						    <th rowspan="2" data-hide="phone,tablet">Month </th>
						    <th rowspan="2" data-hide="phone,tablet">Year</th>
						    <th rowspan="2" data-hide="phone,tablet">Pancard No</th>
						    <th rowspan="2" data-hide="phone,tablet">Pancard Attach</th>
						    <th rowspan="2" data-hide="phone,tablet">Language_known</th>
						    <th rowspan="2" data-hide="phone,tablet">Current_location</th>
						    <th rowspan="2" data-hide="phone,tablet">Preferred_location</th>
						    <th rowspan="2" data-hide="phone,tablet">Interview_timing</th>
						    <th rowspan="2" data-hide="phone,tablet">Profile_pic</th>
						    <th rowspan="2" data-hide="phone,tablet">Educational_gap_year</th>
						    <th rowspan="2" data-hide="phone,tablet">Career_gap_year</th>
						    <th rowspan="2" data-hide="phone,tablet">Team_size_name</th>
						    <th rowspan="2" data-hide="phone,tablet">Team_contact_no</th>
						    <th rowspan="2" data-hide="phone,tablet">Email_random_code</th>
						    <th rowspan="2" data-hide="phone,tablet">Password</th>
						    <th rowspan="2" data-hide="phone,tablet">Password_token</th>
						    <th rowspan="2" data-hide="phone,tablet">Login_types</th>
						    
						    <!--<th data-hide="phone,tablet">Team_size_name</th>
						    <th data-hide="phone,tablet">Team_contact_no</th>-->
						    
						    <th colspan="6">SSLC</th>
						    <th colspan="6">HSC/Diploma</th>
						    <th colspan="6">UnderGraduate</th>
						    <th colspan="6">PostGraduate</th>
						    
						    <th colspan="6">Employment Details1</th>
						    <th colspan="6">Employment Details2</th>
						    <th colspan="6">Employment Details3</th>
						    
						    <!--<th data-hide="phone,tablet">Client Company</th>
						    <th data-hide="phone,tablet">Payroll Company</th>
						    <th data-hide="phone,tablet">Designation</th>
						    <th data-hide="phone,tablet">Emp_duration_from</th>
						    <th data-hide="phone,tablet">Emp_duration_to</th>
						    <th data-hide="phone,tablet">location</th>-->
						    <!--<th data-hide="phone,tablet">Reason_desc</th>-->
						    
						    
						    <!--<th data-hide="phone,tablet">Degree</th>
						    <th data-hide="phone,tablet">Specialisation</th>
						    <th data-hide="phone,tablet">Edu_duration_from</th>
						    <th data-hide="phone,tablet">Edu_duration_to</th>
						    <th data-hide="phone,tablet">University</th>
						    <th data-hide="phone,tablet">Percentage</th>
						    <th data-hide="phone,tablet">Reason_desc</th>-->
						   <!-- <th>Location</th>-->
						    <th rowspan="2" >Action</th>
						    
						</tr>
						<tr>
						    <th data-hide="phone,tablet">SSLCDegree</th>
						    <th data-hide="phone,tablet">SSLCSpecialization</th>
						    <th data-hide="phone,tablet">SSLCEdu_Duration_From</th>
						    <th data-hide="phone,tablet">SSLCEdu_Duration_To</th>
						    <th data-hide="phone,tablet">SSLCUniversity</th>
						    <th data-hide="phone,tablet">SSLCPercentage</th>
						    
						    <th data-hide="phone,tablet">HSCDegree</th>
						    <th data-hide="phone,tablet">HSCSpecialization</th>
						    <th data-hide="phone,tablet">HSCEdu_Duration_From</th>
						    <th data-hide="phone,tablet">HSCEdu_Duration_To</th>
						    <th data-hide="phone,tablet">HSCUniversity</th>
						    <th data-hide="phone,tablet">HSCPercentage</th>
						    
						    <th data-hide="phone,tablet">UGDegree</th>
						    <th data-hide="phone,tablet">UGSpecialization</th>
						    <th data-hide="phone,tablet">UGEdu_Duration_From</th>
						    <th data-hide="phone,tablet">UGEdu_Duration_To</th>
						    <th data-hide="phone,tablet">UGUniversity</th>
						    <th data-hide="phone,tablet">UGPercentage</th>
						    
						    <th data-hide="phone,tablet">PGDegree</th>
						    <th data-hide="phone,tablet">PGSpecialization</th>
						    <th data-hide="phone,tablet">PGEdu_Duration_From</th>
						    <th data-hide="phone,tablet">PGEdu_Duration_To</th>
						    <th data-hide="phone,tablet">PGUniversity</th>
						    <th data-hide="phone,tablet">PGPercentage</th>
						    
						    <!--<th data-hide="phone,tablet">Reason_desc</th>-->
						    
						    <th data-hide="phone,tablet">FirstClient Company</th>
						    <th data-hide="phone,tablet">FirstPayroll Company</th>
						    <th data-hide="phone,tablet">FirstDesignation</th>
						    <th data-hide="phone,tablet">FirstEmp_Duration_From</th>
						    <th data-hide="phone,tablet">FirstEmp_Duration_To</th>
						    <th data-hide="phone,tablet">FirstLocation</th>
						    
						    <th data-hide="phone,tablet">SecondClient Company</th>
						    <th data-hide="phone,tablet">SecondPayroll Company</th>
						    <th data-hide="phone,tablet">SecondDesignation</th>
						    <th data-hide="phone,tablet">SecondEmp_Duration_From</th>
						    <th data-hide="phone,tablet">SecondEmp_Duration_To</th>
						    <th data-hide="phone,tablet">SecondLocation</th>
						    
						    <th data-hide="phone,tablet">ThirdClient Company</th>
						    <th data-hide="phone,tablet">ThirdPayroll Company</th>
						    <th data-hide="phone,tablet">ThirdDesignation</th>
						    <th data-hide="phone,tablet">ThirdEmp_Duration_From</th>
						    <th data-hide="phone,tablet">ThirdEmp_Duration_To</th>
						    <th data-hide="phone,tablet">ThirdLocation</th>
						    <!--<th data-hide="phone,tablet">Reason_desc</th>-->
						</tr>
					    </thead>
					    <tbody>
						<?php if(count($vendorDetails) > 0){ foreach($vendorDetails as $row)   {?>
					       
						<tr class="oddClass even gradeC">
						    <td><?php echo $row['cr_date']; ?></td>
						    <td id="USER_NAME" style="cursor:pointer;" class="clickable-row" data-href='<?php echo site_url('vendorlogin/vendorEditView/'.$row['id'])?>'><u><?php echo $row['candidate_name']; ?></u></td>					    
						    <td><?php echo $row['mobile_number']; ?></td>
						    <td id="EMAIL"><?php echo $row['mail_id']; ?></td>
						    <td><?php echo $row['skills']; ?></td>
						    <!--<td><?php echo $row['primary_other_skils']; ?></td>-->
						    <td><?php echo $row['SecondarySkills']; ?></td>
						    <!--<td><?php echo $row['secondary_other_skils']; ?></td>-->
						    <td><?php echo $row['total_exp_year']; ?></td>
						    <td><?php echo $row['total_exp_month']; ?></td>
						    <td><?php echo $row['relevant_exp_year']; ?></td>
						    
						    <td><?php echo $row['relevant_exp_month']; ?></td>
						    <td><?php echo $row['current_ctc_lakhs']; ?></td>
						    <td><?php echo $row['current_ctc_thousands']; ?></td>
						    <td><?php echo $row['expected_ctc_lakhs']; ?></td>
						    <td><?php echo $row['expected_ctc_thousands']; ?></td>
						    
						    <td><?php echo $row['notice_period']; ?></td>
						    <!--<td><?php echo $row['current_ctc']; ?></td>-->
						    <!--<td><?php echo $row['expected_ctc']; ?></td>-->
						    <td><?php echo $row['day']; ?></td>
						    <td><?php echo $row['month']; ?></td>
						    <td><?php echo $row['year']; ?></td>
						    <td><?php echo $row['pan_card_no']; ?></td>
						    <td><img src="<?php echo site_url($row['pan_card_attach']);?>" width="50" height="50"></td>
						    <td><?php echo $row['language_known']; ?></td>
						    <td><?php echo $row['current_location']; ?></td>
						    <td><?php echo $row['preferred_location']; ?></td>
						    <td><?php echo $row['interview_timing']; ?></td>
						    <td><img src="<?php echo site_url($row['profile_pic']); ?>" width="50" height="50"></td>
						    <td><?php echo $row['educational_gap_year']; ?></td>
						    <td><?php echo $row['career_gap_year']; ?></td>
						    <td><?php echo $row['team_size_name']; ?></td>
						    <td><?php echo $row['team_contact_no']; ?></td>
						    <td><?php echo $row['email_random_code']; ?></td>
						    <td><?php echo $row['password']; ?></td>
						    <td><?php echo $row['password_token']; ?></td>
						    <td><?php echo $row['login_types']; ?></td>
						    <!--<td><?php echo $row['current_location']; ?></td>-->
						    
						    <!--<td><?php echo $row['client_comp']; ?></td>
						    <td><?php echo $row['payroll_comp']; ?></td>
						    <td><?php echo $row['designation']; ?></td>
						    <td><?php echo $row['emp_duration_from']; ?></td>
						    <td><?php echo $row['emp_duration_to']; ?></td>
						    <td><?php echo $row['location']; ?></td>-->
						    <!--<td><?php echo $row['reason_desc']; ?></td>-->
						    
						    
						    <!--<td><?php echo $row['degree']; ?></td>
						    <td><?php echo $row['specialisation']; ?></td>
						    <td><?php echo $row['edu_duration_from']; ?></td>
						    <td><?php echo $row['edu_duration_to']; ?></td>
						    <td><?php echo $row['university']; ?></td>
						    <td><?php echo $row['percentage']; ?></td>
						    <td><?php echo $row['reason_desc']; ?></td>-->
						    <td><?php echo $row['SSLCDegree']; ?></td>
						    <td><?php echo $row['SSLCSpecialization']; ?></td>
						    <td><?php echo $row['SSLCFromDuration']; ?></td>
						    <td><?php echo $row['SSLCToDuration']; ?></td>
						    <td><?php echo $row['SSLCUniversity']; ?></td>
						    <td><?php echo $row['SSLCPercentage']; ?></td>
						    
						    <td><?php echo $row['HSCDegree']; ?></td>
						    <td><?php echo $row['HSCSpecialization']; ?></td>
						    <td><?php echo $row['HSCFromDuration']; ?></td>
						    <td><?php echo $row['HSCToDuration']; ?></td>
						    <td><?php echo $row['HSCUniversity']; ?></td>
						    <td><?php echo $row['HSCPercentage']; ?></td>
						    
						    <td><?php echo $row['UGDegree']; ?></td>
						    <td><?php echo $row['UGSpecialization']; ?></td>
						    <td><?php echo $row['UGFromDuration']; ?></td>
						    <td><?php echo $row['UGToDuration']; ?></td>
						    <td><?php echo $row['UGUniversity']; ?></td>
						    <td><?php echo $row['UGPercentage']; ?></td>
						    
						    <td><?php echo $row['PGDegree']; ?></td>
						    <td><?php echo $row['PGSpecialization']; ?></td>
						    <td><?php echo $row['PGFromDuration']; ?></td>
						    <td><?php echo $row['PGToDuration']; ?></td>
						    <td><?php echo $row['PGUniversity']; ?></td>
						    <td><?php echo $row['PGPercentage']; ?></td>
						    
						    <!--<td><?php echo $row['reason_desc']; ?></td>-->
						    
						    <td><?php echo $row['FirstClientCompany']; ?></td>
						    <td><?php echo $row['FirstPayrollCompany']; ?></td>
						    <td><?php echo $row['FirstDesignation']; ?></td>
						    <td><?php echo $row['FirstFromDuration']; ?></td>
						    <td><?php echo $row['FirstToDuration']; ?></td>
						    <td><?php echo $row['FirstLocation']; ?></td>
						    
						    <td><?php echo $row['SecondClientCompany']; ?></td>
						    <td><?php echo $row['SecondPayrollCompany']; ?></td>
						    <td><?php echo $row['SecondDesignation']; ?></td>
						    <td><?php echo $row['SecondFromDuration']; ?></td>
						    <td><?php echo $row['SecondToDuration']; ?></td>
						    <td><?php echo $row['SecondLocation']; ?></td>
						    
						    <td><?php echo $row['ThirdClientCompany']; ?></td>
						    <td><?php echo $row['ThirdPayrollCompany']; ?></td>
						    <td><?php echo $row['ThirdDesignation']; ?></td>
						    <td><?php echo $row['ThirdFromDuration']; ?></td>
						    <td><?php echo $row['ThirdToDuration']; ?></td>
						    <td><?php echo $row['ThirdLocation']; ?></td>
						    
						   
						   
						    <td>
						    
						    <a href="<?php echo site_url('vendorlogin/vendorEdit/'.$row['id'])?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a>
						    <!--<a id="delete_box" href="<?php echo site_url('vendorlogin/vendorDelete/'.$row['id'])?>"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>-->
						    <!--<a  href="#" data-toggle="modal" data-target="#printPreview"  class="btn btn-primary btn-xs" onclick="printVendorDetails('<?php echo $row['id'];?>')"><i class="fa fa-file-pdf-o fa-2x"></i> </a>-->
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
		"pageLength": 100,
		"scrollX": 100,
		"scrollY": 350,
		"ordering":false,
		buttons: [
		    //'copyHtml5',
		    'excelHtml5',
		    //'csvHtml5',
		    //'pdfHtml5'
		    
		]
	    } );
	    
	} );
	
	
		 
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