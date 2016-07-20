<?php $path=$this->config->item('base_urlcapital');?>

<style>
    .headingLine{
        font-size:17px;
    }
</style>
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
                            <h4 class="panel-title">Employee Form</h4>
                        </div>
                        <div class="panel-body">
                        <?php if($status)
			{?>
			    <div id="alert" class="alert alert-success outer"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
			    <?php
			} ?>
                            <form id="form_validation" action="<?php base_url('vendorlogin/vendoredit/.$id');?>" enctype="multipart/form-data" method="POST" role="form">
                        <div class="col-md-6 col-md-offset-3">
                           
                            <div class="form-group">
                                <h2 class="headingLine" id="candidate">Candiate Details</h2>
                            </div>
                            <div class="form-group">
                              <label>Candidate Name</label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['candidate_name'];?>" name="candidate_name" type="text" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Mobile Number <span style="color:#EB8B11">*</span></label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['mobile_number'];?>" name="mobile_number" type="text" placeholder="Number">
                            </div>
                            <div class="form-group">
                                <label>Email ID <span style="color:#EB8B11">*</span></label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['mail_id'];?>" name="mail_id" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <?php $skill=array('C','C++','Java','Dot Net','C#','PHP','Python','Perl','Ruby','Javascript','SQL')?>
                                <label>Skills <span style="color:#EB8B11">*</span></label>
                                <?php  $skillArray= explode(",",$candidateDetails[0]['skills']);?>
                                <select disabled multiple class="form-control chzn-select input-sm" name="skills[]">
                                    
                                <?php foreach( $skill as $row) {
                                    $selected="";
                                    if(in_array($row, $skillArray))
                                     $selected= "selected";					    
                                    ?>
                                    <option <?=$selected?>  value="<?php echo $row ?>" ><?php echo $row ?></option>
                                <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Total Exp</label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['total_exp'];?>" name="total_exp" type="text" placeholder="Total Exp">
                            </div>                            
                            
                            <div class="form-group">
                              <label>Revelant Exp</label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['relevant_exp'];?>" name="relevant_exp" type="text" placeholder="Revelant Exp">
                            </div>
                            <div class="form-group">
                                <label>Notice Period</label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['notice_period'];?>" name="notice_period" type="text" placeholder="Notice Period">
                            </div>
                            <div class="form-group">
                                <label>Current CTC <span style="color:#EB8B11">*</span></label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['current_ctc'];?>" name="current_ctc" type="text" placeholder="Current CTC">
                            </div>
                            <div class="form-group">
                                <label>Expected CTC <span style="color:#EB8B11">*</span></label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['expected_ctc'];?>" name="expected_ctc" type="text" placeholder="Expected CTC">
                            </div>
                            <div class="">
                                <label>Date Of Birth</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                   <?php $day=array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31') ?> 
                                  <select disabled name="day" class="form-control">
				    <?php foreach($day as $day){?>
                                    <option value="<?php echo $day;?>" <?php if($candidateDetails[0]['day']==$day) echo "selected"?>><?php echo $day;?></option>
                                  <?php }?>
				  </select>
                                </div>
                                 <div class="form-group col-md-4">
			    <?php $month=array('January','February','March','April','May','June','July','August','September','October','November','December') ?> 
                                  <select disabled name="month" class="form-control">
                                    <?php foreach($month as $month){?>
                                    <option value="<?php echo $month;?>" <?php if($candidateDetails[0]['month']==$month) echo "selected"?>><?php echo $month;?></option>
                                  <?php }?>
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
				    <?php $year=array('1960','1961','1962','1963','1964','1965','1966','1967','1968','1969','1970','1971','1972','1973','1974','1975','1976','1977','1978','1979','1980','1981','1982','1983','1984','1985','1986','1987','1988','1989','1990','1991','1992','1993','1994','1995','1996','1997','1997','1998','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016') ?> 
                                  <select disabled name="year" class="form-control">
                                    <option selected>Year</option>
                                    <?php foreach($year as $year){?>
                                    <option value="<?php echo $year;?>" <?php if($candidateDetails[0]['year']==$year) echo "selected"?>><?php echo $year;?></option>
                                  <?php }?>
                                  </select>
                                </div>
                                 </div>
                            </div>
                            
                            <div class="form-group">
                              <label>Pan Card Number <span style="color:#EB8B11">*</span></label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['pan_card_no'];?>" name="pan_card_no" type="text" placeholder="Please Enter Your Pan Card Number">
                            </div>
                            <div class="form-group">
                              <img src="<?php echo $path.$candidateDetails[0]['pan_card_attach'];?>" class="img-resposive" width="300" height="200" id="PanImgPreview"> <input type="hidden" name="oldimage" value="<?php echo $candidateDetails[0]['pan_card_attach'] ?>">
                           </div>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-primary btn-file">
                                      Browse<input disabled readonly="" value="<?php echo site_url($candidateDetails[0]['pan_card_attach'])?>" type="file" name="pan_card_attach" id="PanPreview" onchange="panAttachment();">
                                  </span>
                              </span>
                              <input type="text" id="" value="<?php echo site_url($candidateDetails[0]['pan_card_attach'])?>" class="form-control" readonly >
                            </div>
                          </div>
                            
                            <div class="form-group">
                                <?php $lang=array('English','Tamil','Telugu','Malayalam','Kannadam','Hindi')?>
                                <label>Language Known</label>
                                <?php $langList= explode(",",$candidateDetails[0]['language_known']);?>
                                <select disabled multiple class="form-control chzn-select input-sm" name="language_known[]">
                                   <?php  foreach( $lang as $row) {
                                    $selected="";
                                    if(in_array($row, $langList))
                                     $selected= "selected";					    
                                    ?>
                                    <option <?=$selected?>  value="<?php  echo $row ?>" ><?php  echo $row ?></option>
                                <?php }?>
                                </select>
                            </div>
			    
			    
                            <div class="form-group">
                                <label>Current Location</label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['current_location'];?>" name="current_location" type="text" placeholder="Current Location">
                            </div>
                            <div class="form-group">
                                <label>Perfered Location</label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['preferred_location'];?>" name="preferred_location" type="text" placeholder="Perfered Location">
                            </div>
                            <div class="form-group">
                              <label>Interview Timing</label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['interview_timing'];?>" name="interview_timing" id="datetimepicker1" type="text" placeholder="Interview Timing">
                            </div>
                            <div class="form-group">
                                <label>Educational Gap(in years)</label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['educational_gap_year'];?>" name="educational_gap_year" type="text" placeholder="Educational Gap(in years)">
                            </div>
                            <div class="form-group">
                                <label>Carrier Gap(in years)</label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['career_gap_year'];?>" name="career_gap_year" type="text" placeholder="Email">
                            </div>
                            <div id="team" class="form-group">
                                <h2 class="headingLine" >Team Details</h2>
                            </div>
                            <div class="form-group">
                                <label>Number</label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['team_size_name'];?>" name="team_size_name" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Contact Number <span style="color:#EB8B11">*</span> </label>
                                <input readonly class="form-control input-md" value="<?php echo $candidateDetails[0]['team_contact_no'];?>" name="team_contact_no" type="text" placeholder="Email">
                            </div>
                        </div>
                              
                            <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <h2 class="headingLine" id="education" >Educational Details <span style="color:#EB8B11">*</span></h2>
                            </div>                                                         
                        </div>
                        <div class="col-md-10 col-md-offset-2">

                        <div class="table-responsive"> 
                          <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th><label>Degree</label></th>
                                  <th><label>Specialisation</label></th>
                                  <th><label>Duration From</label></th>
                                  <th><label>Duration To</label></th>
                                  <th><label>University</label></th>
                                  <th><label>Percentage</label></th>
                                <!--  <th><button type="button" onclick="addMore();" class="btn-add btn btn-primary"><i class="fa fa-plus"></i></button></th>-->
                                </tr>   
                              </thead>
                              <tbody>
				
				<?php if(count($educationalDetails)>0) { foreach($educationalDetails as $row){?>
                                <tr class="odd" >
                                  <input type="hidden" value="" name="degree_Status[]">
				  <input type="hidden" value="<?php echo $row['head_id'];?>" name="headId">
                                  <td><input  type="hidden" name="degree_id[]" value="<?php echo $row['id']; ?>"> <input readonly placeholder="Degree" name="degree[]" id="degree" value="<?php echo $row['degree']; ?>" class="form-control input-md" type="text"></td>
                                  <td> <input readonly placeholder="Specialisation" value="<?php echo $row['specialisation']; ?>" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input readonly value="<?php echo $row['edu_duration_from']; ?>" type="text" placeholder="" name="edu_duration_from[]" id="edu_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input readonly value="<?php echo $row['edu_duration_to']; ?>" type="text" placeholder="" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input readonly value="<?php echo $row['university']; ?>" placeholder="University" name="university[]" id="university" class="form-control input-md" type="text"></td>
                                  <td> <input readonly value="<?php echo $row['percentage']; ?>" placeholder="Percentage" name="percentage[]" id="percentage" class="form-control input-md" type="text"></td>
                                 <!-- <td><center><a href="<?php echo site_url('talentcontroller/educationDelete/'.$row['head_id'].'/'.$row['id'])?>" onclick="return confirm('Are you sure you want to delete?');"class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a></center></td>-->
                                </tr>
				
				<?php } }?>
				
				
                                 <tr class="odd hide" id="optionTemplate">
                                  <input type="hidden" value="" name="degree_Status[]">
                                  <td> <input readonly placeholder="Degree" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input readonly placeholder="Specialisation" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input readonly type="text" placeholder="" id="edu_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input readonly type="text" placeholder="" id="edu_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input readonly placeholder="University" id="university" class="form-control input-md" type="text"></td>
                                  <td> <input readonly placeholder="Percentage" id="percentage" class="form-control input-md" type="text"></td>
                                <!--  <td><center><button type="button" onclick="removeButton($(this));" class="btn btn-remove btn-danger btn-xs removeButton"><i class="fa fa-trash"></i></button></center></td>-->
                                </tr>
                                 </tbody>
                            </table>
                        </div>
                        </div>
			
			 <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <h2 class="headingLine" id="employement">Employement Details</h2>
                            </div>                                                             
                            </div>
                        <div class="col-md-10 col-md-offset-2">                            
                            <div class="table-responsive"> 
                          <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th><label>Client Company</label></th>
                                  <th><label>Payroll Company</label></th>
                                  <th><label>Desig Company</label></th>
                                  <th><label>Duration From</label></th>
                                  <th><label>Duration To</label></th>
                                  <th><label>Location</label></th>
                            <!--      <th><button type="button" onclick="addMore1();" class="btn-add btn btn-primary"><i class="fa fa-plus"></i></button></th>-->
                                </tr>
                              </thead>
                              <tbody>
				
				<?php foreach($employeeDetails as $row){ ?>
                                <tr class="odd1">
				    
                                  <input type="hidden" value="" name="Line_Status[]">
				    <input type="hidden" value="<?php echo $row['head_id'];?>" name="headId">
				    <td><input type="hidden" name="line_id[]" value="<?php echo $row['id']; ?>"><input readonly value="<?php echo $row['client_comp']; ?>" placeholder="Client Company" name="client_comp[]" id="client_comp" class="form-control input-md" type="text" ></td>
				    <td> <input readonly value="<?php echo $row['payroll_comp']; ?>" placeholder="Payroll Company" name="payroll_comp[]" id="payroll_comp" class="form-control input-md" type="text" ></td>
				    <td> <input readonly value="<?php echo $row['designation']; ?>" placeholder="Designation Company" name="designation[]" class="form-control input-md" id="designation" type="text" ></td>
				    <td><span class='input-group date'><input readonly value="<?php echo $row['emp_duration_from']; ?>" type="text" placeholder="" name="emp_duration_from[]" id="emp_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				    <td><span class='input-group date'><input readonly value="<?php echo $row['emp_duration_to']; ?>" type="text" placeholder="" name="emp_duration_to[]" id="emp_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				    <td> <input readonly value="<?php echo $row['location']; ?>" placeholder="Location" name="location[]" id="location" class="form-control input-md" type="text"></td>
				    <!--<td><center><a href="<?php echo site_url('talentcontroller/employementDelete/'.$row['head_id'].'/'.$row['id'])?>" onclick="return confirm('Are you sure you want to delete?');"class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a></center></td>-->
                                </tr>
				
				<?php }?>
				
                                 <tr class="odd1 hide" id="optionTemplate1">
                                  <input type="hidden" value="" name="Line_Status[]">
				    <td> <input readonly placeholder="Client Company" id="client_comp" class="form-control input-md" type="text" ></td>
				    <td> <input readonly placeholder="Payroll Company" id="payroll_comp" class="form-control input-md" type="text" ></td>
				    <td> <input readonly placeholder="Designation Company" class="form-control input-md" id="designation" type="text" ></td>
				    <td><span class='input-group date'><input readonly type="text" placeholder="" id="emp_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				    <td><span class='input-group date'><input readonly type="text" placeholder="" id="emp_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				    <td> <input readonly placeholder="Location" id="location" class="form-control input-md" type="text"></td>
				    <!--<td><center><button type="button" onclick="removeButton1($(this));" class="btn btn-remove btn-danger btn-xs removeButton"><i class="fa fa-trash"></i></button></center></td>-->
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        </div>
			
                    <div class="col-md-10 col-md-offset-3" style="padding-bottom: 15px;">
                       <!--     <input type="submit" name="Update" value="Update" class="btn btn-sm btn-success">-->
                        <button type="button" onclick="window.history.back();" class="btn btn-sm btn-warning">cancel</button>
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
      setTimeout(function(){ $('#alert').remove();}, 5000);
        $(".chzn-select").chosen();
 //       $('.datepicker-dob').datetimepicker({
 //    format: 'DD-MMM-YYYY'
 //});

});
    
   
</script>