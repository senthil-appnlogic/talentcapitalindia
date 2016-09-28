<?php
$status = $this->session->flashdata('status');
?>
<style>
  tfoot {
      display: table-header-group !important;
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
                            <h4 class="panel-title">Employee View</h4>
                        </div>
                        <div class="panel-body" id="form_validation">
                        <?php if($status)
			{?>
			    <div id="alert" class="alert alert-success outer"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
			    <?php
			} ?>
				<!--<p>
				   <a class="btn btn-primary btn-sm " href="<?php echo site_url('admin/employeeAdd')?>"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add Employee</span></a>
				 </p>-->
                            	<div class="table-responsive" style="border: none">
					<table id="data-table" class="table table-bordered display dataTable" cellspacing="0" width="100%">
					  <thead>
						<tr>
						    <th>S.No</th>
						    <th data-class="expand">Created Date</th>
						    <th data-class="expand">Client</th>
						    <th data-class="expand">Name</th>
						    <th data-hide="phone,tablet">Mobile Number</th>
						    <th data-hide="phone,tablet">Email</th>
						    <th data-hide="phone,tablet">Primary Skills</th>
						    <!--<th data-hide="phone,tablet">Primary Other Skills</th>-->
						    <th data-hide="phone,tablet">Secondary Skills</th>
						    <!--<th data-hide="phone,tablet">Secondary Other Skills</th>-->
						    <th data-hide="phone,tablet">Total Experience In years</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Total Experience Month</th>-->
						    <th data-hide="phone,tablet">Relevant Experience In years</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Relevant Experience Month</th>-->
						    <th data-hide="phone,tablet">Notice Period</th>
						    <th data-hide="phone,tablet">C_CTC in lacs</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Current CTC in Thousands</th>-->
						    <th data-hide="phone,tablet">E_CTC in lacs</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Expected CTC in Thousands</th>-->
						    <th data-hide="phone,tablet">DOB</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Month </th>
						    <th rowspan="2" data-hide="phone,tablet">Year</th>-->
						    <th data-hide="phone,tablet">Pancard Number</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Attach Pancard </th>-->
						    <th data-hide="phone,tablet">Languages Known</th>
						    <th data-hide="phone,tablet">Current Location</th>
						    <th data-hide="phone,tablet">Preferred Location</th>
						    <th data-hide="phone,tablet">Interview Timing</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Profile Pic</th>-->
						    <th data-hide="phone,tablet">SSC</th>
						    <th data-hide="phone,tablet">Specialisation</th>
						    <th data-hide="phone,tablet">Duration From</th>
						    <th data-hide="phone,tablet">Duration To</th>
						    <th data-hide="phone,tablet">University</th>
						    <th data-hide="phone,tablet">Percentage</th>
						    
						    <th data-hide="phone,tablet">HSC/Diploma</th>
						    <th data-hide="phone,tablet">Specialisation</th>
						    <th data-hide="phone,tablet">Duration From</th>
						    <th data-hide="phone,tablet">Duration To</th>
						    <th data-hide="phone,tablet">University</th>
						    <th data-hide="phone,tablet">Percentage</th>
						    
						    <th data-hide="phone,tablet">Graduation</th>
						    <th data-hide="phone,tablet">Specialisation</th>
						    <th data-hide="phone,tablet">Duration From</th>
						    <th data-hide="phone,tablet">Duration To</th>
						    <th data-hide="phone,tablet">University</th>
						    <th data-hide="phone,tablet">Percentage</th>
						    
						    <th data-hide="phone,tablet">Post Graduation</th>
						    <th data-hide="phone,tablet">Specialisation</th>
						    <th data-hide="phone,tablet">Duration From</th>
						    <th data-hide="phone,tablet">Duration To</th>
						    <th data-hide="phone,tablet">University</th>
						    <th data-hide="phone,tablet">Percentage</th>
						    
						    <!--<th data-hide="phone,tablet">Reason_desc</th>-->
						    
						    <th data-hide="phone,tablet">E1_Client Company</th>
						    <th data-hide="phone,tablet">E1_Payroll Company</th>
						    <th data-hide="phone,tablet">E1_Designation</th>
						    <th data-hide="phone,tablet">E1_Duration From</th>
						    <th data-hide="phone,tablet">E1_Duration To</th>
						    <th data-hide="phone,tablet">E1_Location</th>
						    
						    <th data-hide="phone,tablet">E2_Client Company</th>
						    <th data-hide="phone,tablet">E2_Payroll Company</th>
						    <th data-hide="phone,tablet">E2_Designation</th>
						    <th data-hide="phone,tablet">E2_Duration From</th>
						    <th data-hide="phone,tablet">E2_Duration To</th>
						    <th data-hide="phone,tablet">E2_Location</th>
						    
						    <th data-hide="phone,tablet">E3_Client Company</th>
						    <th data-hide="phone,tablet">E3_Payroll Company</th>
						    <th data-hide="phone,tablet">E3_Designation</th>
						    <th data-hide="phone,tablet">E3_Duration From</th>
						    <th data-hide="phone,tablet">E3_Duration To</th>
						    <th data-hide="phone,tablet">E3_Location</th>
						    <th data-hide="phone,tablet">Emp_still</th>
						    <th data-hide="phone,tablet">Educational Gap in Years</th>
						    <th data-hide="phone,tablet">Career Gap in Years</th>
						    
						    <!--<th rowspan="2" data-hide="phone,tablet">Team Member Name</th>
						    <th rowspan="2" data-hide="phone,tablet">Team Contact No</th>
						    <th rowspan="2" data-hide="phone,tablet">Email Random Code</th>
						    <th rowspan="2" data-hide="phone,tablet">Password</th>
						    <th rowspan="2" data-hide="phone,tablet">Password Token</th>
						    <th rowspan="2" data-hide="phone,tablet">Login Types</th>-->
						    
						    <!--<th data-hide="phone,tablet">Team_size_name</th>
						    <th data-hide="phone,tablet">Team_contact_no</th>-->
						   <!-- <th colspan="6">SSC</th>
						    <th colspan="6">HSC/Diploma</th>
						    <th colspan="6">UnderGraduate</th>
						    <th colspan="6">PostGraduate</th>
						    
						    <th colspan="6">Employment Details1</th>
						    <th colspan="6">Employment Details2</th>
						    <th colspan="6">Employment Details3</th>-->
						    
						    <th data-hide="phone,tablet">Billing</th>
						    <th data-hide="phone,tablet">Referred By</th>
						    <!--<th data-hide="phone,tablet">Referrer Name</th>-->
						    
						   <!-- <th>Location</th>-->
						    <th >Action</th>
						</tr>
					    </thead>
					  <tfoot>
						<tr>
						    <th>S.No</th>
						    <th data-class="expand">Created Date</th>
						    <th data-class="expand">Client</th>
						    <th data-class="expand">Name</th>
						    <th data-hide="phone,tablet">Mobile Number</th>
						    <th data-hide="phone,tablet">Email</th>
						    <th data-hide="phone,tablet">Primary Skills</th>
						    <!--<th data-hide="phone,tablet">Primary Other Skills</th>-->
						    <th data-hide="phone,tablet">Secondary Skills</th>
						    <!--<th data-hide="phone,tablet">Secondary Other Skills</th>-->
						    <th data-hide="phone,tablet">Total Experience In years</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Total Experience Month</th>-->
						    <th data-hide="phone,tablet">Relevant Experience In years</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Relevant Experience Month</th>-->
						    <th data-hide="phone,tablet">Notice Period</th>
						    <th data-hide="phone,tablet">C_CTC in lacs</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Current CTC in Thousands</th>-->
						    <th data-hide="phone,tablet">E_CTC in lacs</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Expected CTC in Thousands</th>-->
						    <th data-hide="phone,tablet">DOB</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Month </th>
						    <th rowspan="2" data-hide="phone,tablet">Year</th>-->
						    <th data-hide="phone,tablet">Pancard Number</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Attach Pancard </th>-->
						    <th data-hide="phone,tablet">Languages Known</th>
						    <th data-hide="phone,tablet">Current Location</th>
						    <th data-hide="phone,tablet">Preferred Location</th>
						    <th data-hide="phone,tablet">Interview Timing</th>
						    <!--<th rowspan="2" data-hide="phone,tablet">Profile Pic</th>-->
						    <th data-hide="phone,tablet">SSC</th>
						    <th data-hide="phone,tablet">Specialisation</th>
						    <th data-hide="phone,tablet">Duration From</th>
						    <th data-hide="phone,tablet">Duration To</th>
						    <th data-hide="phone,tablet">University</th>
						    <th data-hide="phone,tablet">Percentage</th>
						    
						    <th data-hide="phone,tablet">HSC/Diploma</th>
						    <th data-hide="phone,tablet">Specialisation</th>
						    <th data-hide="phone,tablet">Duration From</th>
						    <th data-hide="phone,tablet">Duration To</th>
						    <th data-hide="phone,tablet">University</th>
						    <th data-hide="phone,tablet">Percentage</th>
						    
						    <th data-hide="phone,tablet">Graduation</th>
						    <th data-hide="phone,tablet">Specialisation</th>
						    <th data-hide="phone,tablet">Duration From</th>
						    <th data-hide="phone,tablet">Duration To</th>
						    <th data-hide="phone,tablet">University</th>
						    <th data-hide="phone,tablet">Percentage</th>
						    
						    <th data-hide="phone,tablet">Post Graduation</th>
						    <th data-hide="phone,tablet">Specialisation</th>
						    <th data-hide="phone,tablet">Duration From</th>
						    <th data-hide="phone,tablet">Duration To</th>
						    <th data-hide="phone,tablet">University</th>
						    <th data-hide="phone,tablet">Percentage</th>
						    
						    <!--<th data-hide="phone,tablet">Reason_desc</th>-->
						    
						    <th data-hide="phone,tablet">E1_Client Company</th>
						    <th data-hide="phone,tablet">E1_Payroll Company</th>
						    <th data-hide="phone,tablet">E1_Designation</th>
						    <th data-hide="phone,tablet">E1_Duration From</th>
						    <th data-hide="phone,tablet">E1_Duration To</th>
						    <th data-hide="phone,tablet">E1_Location</th>
						    
						    <th data-hide="phone,tablet">E2_Client Company</th>
						    <th data-hide="phone,tablet">E2_Payroll Company</th>
						    <th data-hide="phone,tablet">E2_Designation</th>
						    <th data-hide="phone,tablet">E2_Duration From</th>
						    <th data-hide="phone,tablet">E2_Duration To</th>
						    <th data-hide="phone,tablet">E2_Location</th>
						    
						    <th data-hide="phone,tablet">E3_Client Company</th>
						    <th data-hide="phone,tablet">E3_Payroll Company</th>
						    <th data-hide="phone,tablet">E3_Designation</th>
						    <th data-hide="phone,tablet">E3_Duration From</th>
						    <th data-hide="phone,tablet">E3_Duration To</th>
						    <th data-hide="phone,tablet">E3_Location</th>
						    <th data-hide="phone,tablet">Emp_still</th>
						    <th data-hide="phone,tablet">Educational Gap in Years</th>
						    <th data-hide="phone,tablet">Career Gap in Years</th>
						    
						    <!--<th rowspan="2" data-hide="phone,tablet">Team Member Name</th>
						    <th rowspan="2" data-hide="phone,tablet">Team Contact No</th>
						    <th rowspan="2" data-hide="phone,tablet">Email Random Code</th>
						    <th rowspan="2" data-hide="phone,tablet">Password</th>
						    <th rowspan="2" data-hide="phone,tablet">Password Token</th>
						    <th rowspan="2" data-hide="phone,tablet">Login Types</th>-->
						    
						    <!--<th data-hide="phone,tablet">Team_size_name</th>
						    <th data-hide="phone,tablet">Team_contact_no</th>-->
						   <!-- <th colspan="6">SSC</th>
						    <th colspan="6">HSC/Diploma</th>
						    <th colspan="6">UnderGraduate</th>
						    <th colspan="6">PostGraduate</th>
						    
						    <th colspan="6">Employment Details1</th>
						    <th colspan="6">Employment Details2</th>
						    <th colspan="6">Employment Details3</th>-->
						    
						    <th data-hide="phone,tablet">Billing</th>
						    <th data-hide="phone,tablet">Referred By</th>
						    <!--<th data-hide="phone,tablet">Referrer Name</th>-->
						    
						   <!-- <th>Location</th>-->
						    <th >Action</th>
						</tr>
					    </tfoot>
					    <tbody>
						<?php if(count($employeeDetails) > 0)
							     { foreach($employeeDetails as $row) {  ?>
					       
						<tr class="billingRow">
						    <!--<td style="cursor:pointer;" class="clickable-row" data-href='<?php echo site_url('admin/employeeEditView/'.$row['id'])?>'><u><?php echo $row['candidate_name']; ?></u></td>				    
						    <td ><?php echo $row['mobile_number']; ?></td>
						    <td ><?php echo $row['mail_id']; ?></td>
						    <td ><?php echo $row['skills']; ?></td>				    
						    <td><?php echo $row['total_exp_year']; ?></td>
						    <td><?php echo $row['current_location']; ?></td>
						    <td><?php if($row['vendor_code']=="0"){ echo "Direct"; }else{ echo $row['vendor_code']; } ?></td>
						    <td>
							<a href="<?php echo site_url('admin/employeeEdit/'.$row['id'])?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a>
						       <a  id="delete_box" href="<?php echo site_url('admin/employeeDelete/'.$row['id'])?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> </a>
						   <a  href="#" data-toggle="modal" data-target="#printPreview"  class="btn btn-primary btn-xs" onclick="printEmployeeDetails('<?php echo $row['id'];?>')"><i class="fa fa-file-pdf-o fa-2x"></i> </a>
						    </td>-->
						    <td></td>
						    <td><?php echo $row['cr_date1']; ?></td>
						    <td><?php echo $row['client']; ?></td>
						    <td style="cursor:pointer;" class="clickable-row" data-href='<?php echo site_url('admin/employeeEditView/'.$row['id'])?>'><u><?php echo $row['candidate_name']; ?></u></td>					    
						    <td><?php echo $row['mobile_number']; ?></td>
						    <td ><?php echo $row['mail_id']; ?></td>
						    <td><?php echo $row['skills']; ?></td>
						    <!--<td><?php echo $row['primary_other_skils']; ?></td>-->
						    <td><?php echo $row['SecondarySkills']; ?></td>
						    <!--<td><?php echo $row['secondary_other_skils']; ?></td>-->
						    <td><?php echo $row['total_exp_year'];?>.<?php echo $row['total_exp_month']; ?></td>
						    <!--<td><?php echo $row['total_exp_month']; ?></td>-->
						    <td><?php echo $row['relevant_exp_year']; ?>.<?php echo $row['relevant_exp_month']; ?></td>
						    <!--<td></td>-->
						    <td><?php echo $row['notice_period']; ?></td>
						    <td><?php echo $row['current_ctc_lakhs']; ?>.<?php echo $row['current_ctc_thousands']; ?></td>
						    <!--<td><?php echo $row['current_ctc_thousands']; ?></td>-->
						    <td class="exp_lakhs"><?php echo $row['expected_ctc_lakhs']; ?>.<?php echo $row['expected_ctc_thousands']; ?></td>
						    <!--<td class="exp_thsnd"><?php echo $row['expected_ctc_thousands']; ?></td>-->
						    <td><?php echo $row['day']; ?>-<?php echo $row['month']; ?>-<?php echo $row['year']; ?></td>
						    <!--<td><?php echo $row['month']; ?></td>
						    <td><?php echo $row['year']; ?></td>-->
						    <td><?php echo $row['pan_card_no']; ?></td>
						    <!--<td><img src="<?php echo site_url($row['pan_card_attach']);?>" width="50" height="50"></td>-->
						    <td><?php echo $row['language_known']; ?></td>
						    <td><?php echo $row['current_location']; ?></td>
						    <td><?php echo $row['preferred_location']; ?></td>
						    <td><?php echo $row['interview_timing']; ?></td>
						    <!--<td><img src="<?php echo site_url($row['profile_pic']); ?>" width="50" height="50"></td>-->
						    
						    <!--<td><?php echo $row['team_size_name']; ?></td>
						    <td><?php echo $row['team_contact_no']; ?></td>
						    <td><?php echo $row['email_random_code']; ?></td>
						    <td><?php echo $row['password']; ?></td>
						    <td><?php echo $row['password_token']; ?></td>
						    <td><?php echo $row['login_types']; ?></td>-->
						    <!--<td><?php echo $row['current_location']; ?></td>-->
						    
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
						    <!--<td><?php echo $row['reason_desc']; ?></td>-->
						    <td><?php echo $row['employer_still']; ?></td>
						    <td><?php echo $row['educational_gap_year']; ?></td>
						    <td><?php echo $row['career_gap_year']; ?></td>
						    
						    <td><input type="text" name="billing" id="billing" class="billing" onchange="billingcalculation($(this))"></td>
						    <td><?php if($row['vendor_code']=="0"){ echo "Direct"; }else{ echo $row['vendor_code'].' / '.$row['referrer_name']; } ?></td>
						    <!--<td><?php if($row['vendor_code']=="0"){ echo "DirectEmp"; }else{ echo $row['referrer_name']; } ?></td>-->
						    <td>
							<a href="<?php echo site_url('admin/employeeEdit/'.$row['id'])?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a>
						       <a  id="delete_box" href="<?php echo site_url('admin/employeeDelete/'.$row['id'])?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> </a>
						  <!-- <a  href="#" data-toggle="modal" data-target="#printPreview"  class="btn btn-primary btn-xs" onclick="printEmployeeDetails('<?php echo $row['id'];?>')"><i class="fa fa-file-pdf-o fa-2x"></i> </a>-->
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
	</script>
	<script>
	//    $(document).ready(function() {
	//	    App.init();
	//	    TableManageTableTools.init();
	//    });
	    
	$(document).ready(function() {
	    
	    //$('#data-table tfoot tr').insertAfter($('#data-table thead tr'));
	    
	    $('#data-table tfoot th').each( function () {
		var title = $(this).text();
		$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );
	    
	    setTimeout(function(){ $('#alert').remove();}, 5000);
	    var t = $('#data-table').DataTable( {
		dom: 'Bfrtip',
		"pageLength": 100,
		"scrollX": 100,
		"scrollY": 350,
		"ordering":false,
		"columnDefs": [ {
		    "searchable": false,
		    "orderable": false,
		    "targets": 0
		} ],
		"order": [[ 1, 'asc' ]],
		buttons: [
		    //'copyHtml5',
		    //'excelHtml5',
		    //'csvHtml5',
		    //'pdfHtml5'
		    ,
		    {
                    extend: 'excel',
                    text: 'excel all'
                },
                {
                    extend: 'excel',
                    text: 'excel selected',
                    exportOptions: {
                        modifier: {
                            selected: true
                        }
                    }
                }
		],
		select:true,
		
	    } );
	    
	    t.on( 'order.dt search.dt', function () {
		t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		    cell.innerHTML = i+1;
		} );
	    } ).draw();
	    
	    t.columns().every( function () {
		var that = this;
		$( 'input', this.footer() ).on( 'keyup change', function () {
		    if ( that.search() !== this.value ) {
			that
			    .search( this.value )
			    .draw();
		    }
		} );
	    } );
	    
	    t.column(2).every( function () {
		var column = this;
		var select = $('<select><option value=""></option></select>')
		  .appendTo($(column.footer()).empty())
		  .on('change', function() {
		    var val = $.fn.dataTable.util.escapeRegex(
		      $(this).val()
		    );
		    column
		      .search(val ? '^' + val + '$' : '', true, false)
		      .draw();
		  });
	    
		column.data().unique().sort().each(function(d, j) {
		  select.append('<option value="' + d + '">' + d + '</option>')
		});
	    });
	    
	    t.column(16).every( function () {
		var column = this;
		var select = $('<select><option value=""></option></select>')
		  .appendTo($(column.footer()).empty())
		  .on('change', function() {
		    var val = $.fn.dataTable.util.escapeRegex(
		      $(this).val()
		    );
		    column
		      .search(val ? '^' + val + '$' : '', true, false)
		      .draw();
		  });
	    
		column.data().unique().sort().each(function(d, j) {
		  select.append('<option value="' + d + '">' + d + '</option>')
		});
	    });
	    
	    t.columnFilter({
		sPlaceHolder: "head:after",
	    });
	    
	} );
	function printEmployeeDetails(systemId)
		
	{
	    var data = "admin/employeePrint/"+systemId;
	    var preview = "<?php echo site_url()?>"+data;
	    $('#previewiframe').attr('src',preview);
	    var dataURL = "admin/employeePrint/"+systemId;
	   
	   
	}
	    $(document).ready(function($) {
	    $(".clickable-row").click(function() {
	     window.document.location = $(this).data("href");
	    });
	});
		    
	    $(document).ready(function($) {
	    $(".clickable-row").click(function() {
	     window.document.location = $(this).data("href");
	    });
	});
	    
	    function billingcalculation($this) {
		var cur_val=$this.val();
		var lakhs=0;
		var thousd=0;
		var expCtc = $this.parents('.billingRow').find('.exp_lakhs').text();
		var expCtcVal = expCtc.split('.');
		var Lacks = expCtcVal[0];
		var Thousand = expCtcVal[1];
		lakhs=parseInt(Lacks+"00000");
		thousd=parseInt(Thousand+"000");
		if (!lakhs && !thousd) {
		    lakhs=parseInt(Lacks+"00000");
		    thousd=parseInt(Thousand+"000");   
		}
		var total=lakhs+thousd;
		var totalexp = total/12;
		var difference= cur_val-totalexp;
		var checking = Math.abs(difference);
		if (checking>25000) {
		    $this.parents('.billingRow').find('.billing').val("20000");
		}else if (checking<10000) {
		    $this.parents('.billingRow').find('.billing').val("0");
		}
		else {
		    var checkVal=checking*0.8;
		    var check = Math.round(checkVal);
		    $this.parents('.billingRow').find('.billing').val(check);
		}
	    }
	    
	</script>