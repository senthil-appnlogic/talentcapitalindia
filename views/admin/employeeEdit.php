<?php echo $path=$this->config->item('base_urlwebsite');?>
<style>
    .headingLine{
        font-size:17px;
    }
</style>
<?php
$status = $this->session->flashdata('status');
//print_r($employeeDetails);exit;
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
                            <form id="form_validation" action="<?php base_url('admin/employeeEdit/.$id');?>" enctype="multipart/form-data" method="POST" role="form">
                        <div class="col-md-6 col-md-offset-3">
                           
                            <div class="form-group">
                                <h2 class="headingLine" id="candidate">Candidate Details</h2>
                            </div>
                            <div class="form-group">
                              <label>Candidate Name</label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['candidate_name'];?>" name="candidate_name" type="text" placeholder="Name">
                            </div>
			    
			    <div class="form-group">
                              <label>Middle Name</label>
                                <input class="form-control input-md" value="<?php echo $employeeEdit[0]['middle_name'];?>" name="middle_name" type="text" placeholder="Middle Name">
                            </div>
			    <div class="form-group">
                              <label>Last Name</label>
                                <input class="form-control input-md" value="<?php echo $employeeEdit[0]['last_name'];?>" name="last_name" type="text" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label>Mobile Number <span style="color:#EB8B11">*</span></label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['mobile_number'];?>" name="mobile_number" type="text" placeholder="Number">
                            </div>
                            <div class="form-group">
                                <label>Email ID <span style="color:#EB8B11">*</span></label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['mail_id'];?>" name="mail_id" type="text" placeholder="Email">
                            </div>
                            <!--<div class="form-group">
                                <?php $skill=array('C','C++','Java','Dot Net','C#','PHP','Python','Perl','Ruby','Javascript','SQL')?>
                                <label>Skills <span style="color:#EB8B11">*</span></label>
                                <?php  $skillArray= explode(",",$employeeEdit[0]['skills']);?>
                                <select disabled multiple class="form-control chzn-select input-sm" name="skills[]">
                                    
                                <?php foreach( $skill as $row) {
                                    $selected="";
                                    if(in_array($row, $skillArray))
                                     $selected= "selected";					    
                                    ?>
                                    <option <?=$selected?>  value="<?php echo $row ?>" ><?php echo $row ?></option>
                                <?php }?>
                                </select>
                            </div>-->
			    <div class="form-group">
                                <label>Primary Skills <span style="color:#EB8B11">*</span></label>
                                <select multiple class="form-control chzn-select input-sm" onchange="primaryChange($(this))" name="skills[]" disabled>
				    <!--<option>C</option>
				    <option>C++</option>
				    <option>Java</option>
				    <option>Dot Net</option>
				    <option>C#</option>
				    <option>PHP</option>
				    <option>Python</option>
				    <option>Perl</option>
				    <option>Ruby</option>
				    <option>Javascript</option>
				    <option>SQL</option>
				    <option value="Others">Others</option>-->
				    <?php
					$employeeEdit[0]['skills'];
					foreach($skills as $row) {
					    $selected="";
					    if(in_array($row['skill'], explode(",",$employeeEdit[0]['skills'])))
					    $selected= "selected"; 
					?>
					<option <?=$selected?> value="<?php echo $row['skill']?>"><?php echo $row['skill']?></option>
				    <?php } ?>
				    <option value="Others">Others</option>
                                </select>
                            </div>
			    <div class="form-group primary hide">
                                <label>Other Skills<span style="color:#EB8B11">*</span></label>
                                <input class="form-control primaryName input-md" value="<?php echo $employeeEdit[0]['primary_other_skils'];?>" name="" type="text" placeholder="primary other skils" readonly>
                            </div>
			    <div class="form-group">
                                <label>Secondary Skills <span style="color:#EB8B11">*</span></label>
                                <select multiple class="form-control chzn-select input-sm" onchange="secondaryChange($(this))" name="SecondarySkills[]" disabled>
				    <!--<option>C</option>
				    <option>C++</option>
				    <option>Java</option>
				    <option>Dot Net</option>
				    <option>C#</option>
				    <option>PHP</option>
				    <option>Python</option>
				    <option>Perl</option>
				    <option>Ruby</option>
				    <option>Javascript</option>
				    <option>SQL</option>
				    <option  value="Others">Others</option>-->
				     <?php
					$employeeEdit[0]['SecondarySkills'];
					foreach($skills as $row) {
					    $selected="";
					    if(in_array($row['skill'], explode(",",$employeeEdit[0]['SecondarySkills'])))
					    $selected= "selected"; 
					?>
					<option <?=$selected?> value="<?php echo $row['skill']?>"><?php echo $row['skill']?></option>
				    <?php } ?>
				    <option value="Others">Others</option>
                                </select>
                            </div>
			    <div class="form-group secondary hide" >
                                <label>Other Skills<span style="color:#EB8B11">*</span></label>
                                <input class="form-control secondaryName input-md" value="<?php echo $employeeEdit[0]['secondary_other_skils'];?>" name="" type="text" placeholder="secondary other skils" readonly>
                            </div>
                                                       
                            <div class="">
                                <label>Total Experience</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                   <?php $years=array('1years','2years','3years','4years','5years','6years','7years','8years','9years','10years','11years','12years','13years','14years','15years','16years','17years','18years','19years','20years','21years') ?> 
                                  <select disabled name="total_exp_year" class="form-control">
				    <?php foreach($years as $year){?>
                                    <option value="<?php echo $year;?>" <?php if($employeeEdit[0]['total_exp_year']==$year) echo "selected"?>><?php echo $year;?></option>
                                  <?php }?>
				  </select>
                                </div>
                                 <div class="form-group col-md-4">
			    <?php $months=array('0months','1months','2months','3months','4months','5months','6months','7months','8months','9months','10months','11months') ?> 
                                  <select disabled name="total_exp_month" class="form-control">
                                    <?php foreach($months as $month){?>
                                    <option value="<?php echo $month;?>" <?php if($employeeEdit[0]['total_exp_month']==$month) echo "selected"?>><?php echo $month;?></option>
                                  <?php }?>
                                  </select>
                                </div>
                                 
                                 </div>
                            </div>
<!--
                            <div class="form-group">
                              <label>Revelant Exp</label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['relevant_exp'];?>" name="relevant_exp" type="text" placeholder="Revelant Exp">
                            </div>-->
			    
			    <div class="">
                                <label>Relevant Exp</label>
                                <div class="row">
                                <div class="form-group col-md-4">
				     <?php $years=array('1years','2years','3years','4years','5years','6years','7years','8years','9years','10years','11years','12years','13years','14years','15years','16years','17years','18years','19years','20years','21years') ?> 
                                  <select disabled name="relevant_exp_year" class="form-control">
				    <?php foreach($years as $years){?>
                                    <option value="<?php echo $years;?>" <?php if($employeeEdit[0]['relevant_exp_year']==$years) echo "selected"?>><?php echo $years;?></option>
                                  <?php }?>
				  </select>
                                </div>
                                 <div class="form-group col-md-4">
				    <?php $Relevantmonths=array('0months','1months','2months','3months','4months','5months','6months','7months','8months','9months','10months','11months') ?> 
                                  
                                   <select disabled name="relevant_exp_month" class="form-control">
                                    <?php foreach($Relevantmonths as $month){?>
                                    <option value="<?php echo $month;?>" <?php if($employeeEdit[0]['relevant_exp_month']==$month) echo "selected"?>><?php echo $month;?></option>
                                  <?php }?>
                                  </select>
                                  </select>
                                </div>
                                 </div>
                            </div>

                        
			     <div class="">
                                <label>Notice Period</label>
                                <div class="row">
				  <div class="form-group col-md-4">
				    <?php $noticePeriod=array('Immediate','7','15','30','60','90','90 & Above') ?> 
				    <select disabled name="notice_period" class="form-control">
				    <?php foreach($noticePeriod as $noticePeriod){?>
				       <option value="<?php echo $noticePeriod;?>" <?php if($employeeEdit[0]['notice_period']==$noticePeriod) echo "selected"?>><?php echo $noticePeriod;?></option>
                                    <?php }?>
				     </select>
				  </div>
				</div>
			    </div>
			    
                            <!--<div class="form-group">
                                <label>Current CTC <span style="color:#EB8B11">*</span></label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['current_ctc'];?>" name="current_ctc" type="text" placeholder="Current CTC">
                            </div>-->
			    
			    <div class="">
                                <label>Current CTC</label>
                                 <div class="row">
				  <div class="form-group col-md-4">
				    <?php $currentCTC=array('1','2','3','4','5','6','7','8','9','10','12','13','14','15','16','17','18','19','20') ?> 
				    <select disabled name="current_ctc_lakhs" class="form-control">
				    <?php foreach($currentCTC as $currentCTC){?>
				       <option value="<?php echo $currentCTC;?>" <?php if($employeeEdit[0]['current_ctc_lakhs']==$currentCTC) echo "selected"?>><?php echo $currentCTC;?></option>
                                    <?php }?>
				     </select>
				  </div>
				  <div class="form-group col-md-4">
				    <?php $currentCTCMonth=array('5','10','15','20','25','30','35','40','45','50','55','60','65','70','75','80','85','90','95') ?> 
				    <select disabled name="current_ctc_thousands" class="form-control">
				    <?php foreach($currentCTCMonth as $currentCTC){?>
				       <option value="<?php echo $currentCTC;?>" <?php if($employeeEdit[0]['current_ctc_thousands']==$currentCTC) echo "selected"?>><?php echo $currentCTC;?></option>
                                    <?php }?>
				     </select>
				  </div>
				  </div>
			    </div>
			    
			    <div class="">
                                <label>Expected CTC</label>
                                  <div class="row">
				  <div class="form-group col-md-4">
				    <?php $expCTC=array('1','2','3','4','5','6','7','8','9','10','12','13','14','15','16','17','18','19','20') ?> 
				    <select disabled name="expected_ctc_lakhs" class="form-control">
				    <?php foreach($expCTC as $expCTC){?>
				       <option value="<?php echo $expCTC;?>" <?php if($employeeEdit[0]['expected_ctc_lakhs']==$expCTC) echo "selected"?>><?php echo $expCTC;?></option>
                                    <?php }?>
				     </select>
				  </div>
				  <div class="form-group col-md-4">
				    <?php $expCTCMonth=array('5','10','15','20','25','30','35','40','45','50','55','60','65','70','75','80','85','90','95') ?> 
				    <select disabled name="expected_ctc_thousands" class="form-control">
				    <?php foreach($expCTCMonth as $expCTC){?>
				       <option value="<?php echo $expCTC;?>" <?php if($employeeEdit[0]['expected_ctc_thousands']==$expCTC) echo "selected"?>><?php echo $expCTC;?></option>
                                    <?php }?>
				     </select>
				  </div>
				  </div>
			    </div>
			    
                            <!--<div class="form-group">
                                <label>Expected CTC <span style="color:#EB8B11">*</span></label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['expected_ctc'];?>" name="expected_ctc" type="text" placeholder="Expected CTC">
                            </div>-->
			    
			    
                            <div class="">
                                <label>Date Of Birth</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                   <?php $day=array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31') ?> 
                                  <select disabled name="day" class="form-control">
				    <?php foreach($day as $day){?>
                                    <option value="<?php echo $day;?>" <?php if($employeeEdit[0]['day']==$day) echo "selected"?>><?php echo $day;?></option>
                                  <?php }?>
				  </select>
                                </div>
                                 <div class="form-group col-md-4">
			    <?php $month=array('January','February','March','April','May','June','July','August','September','October','November','December') ?> 
                                  <select disabled name="month" class="form-control">
                                    <?php foreach($month as $month){?>
                                    <option value="<?php echo $month;?>" <?php if($employeeEdit[0]['month']==$month) echo "selected"?>><?php echo $month;?></option>
                                  <?php }?>
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
				    <?php  $year=array('1960','1961','1962','1963','1964','1965','1966','1967','1968','1969','1970','1971','1972','1973','1974','1975','1976','1977','1978','1979','1980','1981','1982','1983','1984','1985','1986','1987','1988','1989','1990','1991','1992','1993','1994','1995','1996','1997','1997','1998','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016') ?> 
                                  <select disabled name="year" class="form-control">
                                    <option selected>Year</option>
                                    <?php foreach($year as $year){?>
                                    <option value="<?php echo $year;?>" <?php if($employeeEdit[0]['year']==$year) echo "selected"?>><?php echo $year;?></option>
                                  <?php }?>
                                  </select>
                                </div>
                                 </div>
                            </div>
                            
                            <div class="form-group">
                              <label>Pan Card Number <span style="color:#EB8B11">*</span></label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['pan_card_no'];?>" name="pan_card_no" type="text" placeholder="Please Enter Your Pan Card Number" style="text-transform: uppercase;">
                            </div>
                            <div class="form-group">
                              <img src="<?php echo $path.$employeeEdit[0]['pan_card_attach'];?>" class="img-resposive" width="300" height="200" id="PanImgPreview"> <input type="hidden" name="oldimage" value="<?php echo $employeeEdit[0]['pan_card_attach'] ?>">
                           </div>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-primary btn-file">
                                      Browse<input disabled readonly="" value="<?php echo site_url($employeeEdit[0]['pan_card_attach'])?>" type="file" name="pan_card_attach" id="PanPreview" onchange="panAttachment();">
                                  </span>
                              </span>
                              <input type="text" id="" value="<?php echo site_url($employeeEdit[0]['pan_card_attach'])?>" class="form-control" readonly >
                            </div>
                          </div>
                            
                            <div class="form-group">
                                <label>Language Known</label>
                                <?php $langList= explode(",",$employeeEdit[0]['language_known']);?>
                                <select disabled multiple class="form-control chzn-select input-sm" name="language_known[]">
				    <?php
					$employeeEdit[0]['language_known'];
					foreach($language as $row) {
					    $selected="";
					    if(in_array($row['language'], explode(",",$employeeEdit[0]['language_known'])))
					    $selected= "selected"; 
					?>
					<option <?=$selected?> value="<?php echo $row['language']?>"><?php echo $row['language']?></option>
				    <?php } ?>
                                </select>
                            </div>
			    
			    
                            <div class="form-group">
                                <label>Current Location</label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['current_location'];?>" name="current_location" type="text" placeholder="Current Location">
                            </div>
                            <div class="form-group">
                                <label>Perfered Location</label>
                                <!--<input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['preferred_location'];?>" name="preferred_location" type="text" placeholder="Perfered Location">-->
				<select multiple class="form-control chzn-select input-sm" name="preferred_location[]" id="Preferedloc" disabled>
				    <?php
				    $employeeEdit[0]['preferred_location'];
				    foreach($Location as $row) {
					$selected="";
					if(in_array($row['location'], explode(",",$employeeEdit[0]['preferred_location'])))
					$selected= "selected"; 
				    ?>
				    <option <?=$selected?> value="<?php echo $row['location']?>"><?php echo $row['location']?></option>
				    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Interview Timing</label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['interview_timing'];?>" name="interview_timing" id="datetimepicker1" type="text" placeholder="Interview Timing">
                            </div>
                           
			    <div class="">
                                <label>Educational Gap(in years)</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                   <?php $eduGap=array('0years','1years','2years','3years','4years','5years','6years','7years','8years','9years','10years','11years','12years','13years','14years','15years','16years','17years','18years','19years','20years','21years') ?> 
                                  <select disabled name="day" class="form-control">
				    <?php foreach($eduGap as $eduGap){?>
                                    <option value="<?php echo $eduGap;?>" <?php if($employeeEdit[0]['educational_gap_year']==$eduGap) echo "selected"?>><?php echo $eduGap;?></option>
                                  <?php }?>
				  </select>
                                </div>
                                 <div class="form-group col-md-4">
			         <?php $month=array('0months','1months','2months','3months','4months','5months','6months','7months','8months','9months','10months','11months') ?> 
                                  <select disabled name="educational_gap_month" class="form-control">
                                    <?php foreach($month as $month){?>
                                    <option value="<?php echo $month;?>" <?php if($employeeEdit[0]['educational_gap_month']==$month) echo "selected"?>><?php echo $month;?></option>
                                  <?php }?>
                                  </select>
                                </div>
                                
                                 </div>
                            </div>
			    
			    <div class="">
                                <label>Carrier Gap(in years)</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                   <?php $carrierGap=array('0years','1years','2years','3years','4years','5years','6years','7years','8years','9years','10years','11years','12years','13years','14years','15years','16years','17years','18years','19years','20years','21years') ?> 
                                  <select disabled name="day" class="form-control">
				    <?php foreach($carrierGap as $carrierGap){?>
                                    <option value="<?php echo $carrierGap;?>" <?php if($employeeEdit[0]['educational_gap_year']==$carrierGap) echo "selected"?>><?php echo $carrierGap;?></option>
                                  <?php }?>
				  </select>
                                </div>
                                 <div class="form-group col-md-4">
			    <?php $month=array('0months','1months','2months','3months','4months','5months','6months','7months','8months','9months','10months','11months') ?> 
                                  <select disabled name="educational_gap_month" class="form-control">
                                    <?php foreach($month as $month){?>
                                    <option value="<?php echo $month;?>" <?php if($employeeEdit[0]['educational_gap_month']==$month) echo "selected"?>><?php echo $month;?></option>
                                  <?php }?>
                                  </select>
                                </div>
                                
                                 </div>
                            </div>

			    
                            <div id="team" class="form-group">
                                <h2 class="headingLine" >Team Details</h2>
                            </div>
                           <!-- <div class="form-group">
                                <label>Number</label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['team_size_name'];?>" name="team_size_name" type="text" placeholder="Email">
                            </div>-->
			    <div class="form-group">
                                <label>Team Member Name</label>
				 <?//php $teamSize=array('1','2','3','4','5','6','7','8','9','10','12','13','14','15','16','17','18','19','20') ?> 
				<!--<select disabled name="team_size_name" class="form-control input-sm">
				  <?php foreach($teamSize as $teamSize){?>
				       <option value="<?php echo $teamSize;?>" <?php if($employeeEdit[0]['team_size_name']==$teamSize) echo "selected"?>><?php echo $teamSize;?></option>
                                    <?php }?>
				</select>-->
				<input readonly class="form-control input-md" name="team_size_name" value="<?php echo $employeeEdit[0]['team_size_name'];?>" type="text" placeholder="Team Member Name">
			    </div>
                            <div class="form-group">
                                <label>Contact Number <span style="color:#EB8B11">*</span> </label>
                                <input readonly class="form-control input-md" value="<?php echo $employeeEdit[0]['team_contact_no'];?>" name="team_contact_no" type="text" placeholder="Email">
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
                                  <th><label>File Upload</label></th>
                                 <!-- <th><button type="button" onclick="addMore();" class="btn-add btn btn-primary"><i class="fa fa-plus"></i></button></th>-->
                                </tr>   
                              </thead>
                              <tbody>
				
				<?php if(count($educationalDetails)>0) { foreach($educationalDetails as $row){?>
                                <tr class="odd" >
                                  <input type="hidden" value="" name="degree_Status[]">
				  <input type="hidden" value="<?php echo $row['head_id'];?>" name="headId">
                                  <td><input readonly type="hidden" name="degree_id[]" value="<?php echo $row['id']; ?>"> <input readonly placeholder="Degree" name="degree[]" id="degree" value="<?php echo $row['degree']; ?>" class="form-control input-md" type="text"></td>
                                  <td> <input readonly  placeholder="Specialisation" value="<?php echo $row['specialisation']; ?>" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input readonly value="<?php echo $row['edu_duration_from']; ?>" type="text" placeholder="" name="edu_duration_from[]" id="edu_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input readonly value="<?php echo $row['edu_duration_to']; ?>" type="text" placeholder="" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input readonly value="<?php echo $row['university']; ?>" placeholder="University" name="university[]" id="university" class="form-control input-md" type="text"></td>
                                  <td> <input readonly value="<?php echo $row['percentage']; ?>" placeholder="Percentage" name="percentage[]" id="percentage" class="form-control input-md" type="text"></td>
				  <td><button data-head_id="<?php echo $row['head_id']; ?>" data-id="<?php echo $row['id']; ?>" class="btn btn-md btn-primary student_files">click to view</button></td>
				  
				  
                                 <!-- <td><center><a href="<?php echo site_url('admin/educationDelete/'.$row['head_id'].'/'.$row['id'])?>" onclick="return confirm('Are you sure you want to delete?');"class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a></center></td>-->

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
                                  <!--<td><center><button type="button" onclick="removeButton($(this));" class="btn btn-remove btn-danger btn-xs removeButton"><i class="fa fa-trash"></i></button></center></td>-->
                                </tr>
                                 </tbody>
                            </table>
                        </div>
                        </div>
			
			<div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <h2 class="headingLine" id="employement">Employment Details</h2>
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
				  <th><label>File Upload</label></th>
                                  <!--<th><button type="button" onclick="addMore1();" class="btn-add btn btn-primary"><i class="fa fa-plus"></i></button></th>-->
                                </tr>
                              </thead>
                              <tbody>
				
				<?php foreach($employeeDetails as $row){ ?>
                                <tr class="odd1">
				    
                                  <input type="hidden" value="" name="Line_Status[]">
				    <input type="hidden" value="<?php echo $row['head_id'];?>" name="headId[]">
				    <td><input readonly type="hidden" name="line_id[]" value="<?php echo $row['id']; ?>"><input readonly value="<?php echo $row['client_comp']; ?>" placeholder="Client Company" name="client_comp[]" id="client_comp" class="form-control input-md" type="text" ></td>
				    <td> <input readonly value="<?php echo $row['payroll_comp']; ?>" placeholder="Payroll Company" name="payroll_comp[]" id="payroll_comp" class="form-control input-md" type="text" ></td>
				    <td> <input readonly value="<?php echo $row['designation']; ?>" placeholder="Designation Company" name="designation[]" class="form-control input-md" id="designation" type="text" ></td>
				    <td><span class='input-group date'><input readonly value="<?php echo $row['emp_duration_from']; ?>" type="text" placeholder="" name="emp_duration_from[]" id="emp_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				    <td><span class='input-group date'><input readonly value="<?php echo $row['emp_duration_to']; ?>" type="text" placeholder="" name="emp_duration_to[]" id="emp_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				    <td> <input readonly value="<?php echo $row['location']; ?>" placeholder="Location" name="location[]" id="location" class="form-control input-md" type="text"></td>
				    
				    <td><button id="employee_files" data-id="<?php echo $this->uri->segment(3); ?>" class="btn btn-md btn-primary employee_files">click to view</button></td>
				    
				    
				    
				    
				    
				    <!--<td><center><a href="<?php echo site_url('admin/employementDelete/'.$row['head_id'].'/'.$row['id'])?>" onclick="return confirm('Are you sure you want to delete?');"class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a></center></td>-->
                                </tr>
				
				<?php }?>
				
                                 <tr class="odd1 hide" id="optionTemplate1">
                                  <input type="hidden" value="" name="Line_Status[]">
				    <td> <input readonly placeholder="Client Company" id="client_comp" class="form-control input-md" type="text" ></td>
				    <td> <input readonly placeholder="Payroll Company" id="payroll_comp" class="form-control input-md" type="text" ></td>
				    <td> <input readonly placeholder="Designation Company" class="form-control input-md" id="designation" type="text" ></td>
				    <td><span class='input-group date'><input readonly type="text" placeholder="" id="emp_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				    <td><span class='input-group date'><input readonly type="text" placeholder="" id="emp_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				    <td> <input placeholder="Location" readonly id="location" class="form-control input-md" type="text"></td>
				   <!-- <td><center><button type="button" onclick="removeButton1($(this));" class="btn btn-remove btn-danger btn-xs removeButton"><i class="fa fa-trash"></i></button></center></td>-->
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        </div>
			 <!-- Modal content-->
			
		
                   <!-- <div class="col-md-10 col-md-offset-3" style="padding-bottom: 15px;">
                        <button type="button" onclick="window.history.back();" class="btn btn-sm btn-warning">cancel</button>
                    </div>-->
		    
		    <div class="col-md-6 col-md-offset-4" style="padding-bottom: 15px;">
		      <div class="row">
			<div class="col-md-4">
			    <button class="btn btn-md btn-primary resume_file input-sm" data-id="<?php echo $employeeEdit[0]['id']; ?>" value="<?php echo $employeeEdit[0]['resume'];?>">View Resume</button>
			</div>
			<div class="col-md-4">
			  <input type="submit" name="save" value="Submit" class="btn btn-sm btn-success">
			</div>
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

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title">View  Uploaded Files</h4>
	</div>
	<div class="modal-body">
	 <div class="row">
	 </div>
	 </div>
	</div>
	<!--<div class="modal-footer">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>-->
      </div>
  
    </div>

<script>
    $("#language").chosen();
    $("#Preferedloc").chosen();
    $('.employee_files').click(function(){
	//alert();
	var head_id=$(this).parents('.odd1').find('[name="headId[]"]').val();
	var line_id=$(this).parents('.odd1').find('[name="line_id[]"]').val();
	$.ajax({
	type: "POST",
	url:'<?=site_url('admin/employeeUploads');?>',
	data: {line_id:line_id,head_id:head_id},
	success: function(response){
	    $('#myModal').find('.row').html(response);
	    $('#myModal').modal('show');    
	}
        });
	//var $row = $('#employee_files').parents('.odd1');
	//console.log($row);
	// $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="degree[]"]'));
	// $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="specialisation[]"]'));
	// $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="edu_duration_from[]"]'));
	// $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="edu_duration_to[]"]'));
	// $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="university[]"]'));
	// $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="percentage[]"]'));
	// $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="reasonDesc[]"]'));
    });
	$('.student_files').click(function(){
	$id=$(this).attr('data-id');
	$head_id=$(this).attr('data-head_id');
	$.ajax({
	type: "POST",
	url:'<?=site_url('admin/studentUploads');?>',
	data: {id:$id,head_id:$head_id},
	success: function(response){
	    $('#myModal').find('.row').html(response);
	    $('#myModal').modal('show'); 
	}
        });
    });
    </script>

<script>
      
      
      $(document).ready(function() {
      setTimeout(function(){ $('#alert').remove();}, 5000);
        $(".chzn-select").chosen();
        $('.datepicker-dob').datetimepicker({
     format: 'DD-MMM-YYYY'
 });
      
      
    $('#form_validation').bootstrapValidator({
        
    framework: 'bootstrap',
                feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
    fields: {
        candidate_name:
		{
		    trigger:'blur',
		    validators:
		    {
			notEmpty:
			{
			    message: 'name is required'
			},
			regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The full name can consist of alphabetical characters and spaces only'
                    }
			
		    }
		},
		last_name:
		{
		    trigger:'blur',
		    validators:
		    {
			notEmpty:
			{
			    message: 'Last Name is required'
			},
			
			
		    }
		},
        mobile_number: {
            validators: {
		notEmpty:
			{
			    message: 'Mobile Number is required'
			},
			regexp: {
                        regexp: /^(\+\d{1,3}[- ]?)?\d{10}$/,
                        message: 'Mobile Number contains only 10 Digit Numbers'
                    }
			
                
            }
        },
        mail_id: {
            validators: {
		notEmpty:
			{
			    message: 'Email is required'
			},
			regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
            }
        },
	total_exp: {
            validators: {
		notEmpty:
			{
			    message: 'Total Experience is required'
			},
			regexp: {
                        regexp: /^(\+\d{1,3}[- ]?)?\d{2}$/,
                        message: 'Experience Should be contains Numbers only'
                    }
            }
        },
	relevant_exp: {
            validators: {
		notEmpty:
			{
			    message: 'Revelant Exp is required'
			},
            }
        },
	notice_period: {
            validators: {
		notEmpty:
			{
			    message: 'Notice Period is required'
			},
			regexp: {
                        regexp: /^(\+\d{1,3}[- ]?)?\d{2}$/,
                        message: 'Notice Period contains only  Numbers'
                    }
            }
        },
	current_ctc: {
            validators: {
		notEmpty:
			{
			    message: 'Current CTC proof is required'
			},
			regexp: {
                        regexp: /^(\+\d{1,3}[- ]?)?\d{6}$/,
                        message: 'Current CTC contains only  Numbers'
                    }
            }
        },
	expected_ctc: {
            validators: {
		notEmpty:
			{
			    message: 'Expected CTC is required'
			},
			regexp: {
                        regexp: /^(\+\d{1,3}[- ]?)?\d{6}$/,
                        message: 'Expected CTC contains only 10 Digit Numbers'
                    }
            }
        },
	day: {
            validators: {
		notEmpty:
			{
			    message: 'Day is required'
			},
            }
        },
	month: {
            validators: {
		notEmpty:
			{
			    message: 'Month is required'
			},
            }
        },
	year: {
            validators: {
		notEmpty:
			{
			    message: 'Year is required'
			},
            }
        },
	pan_card_no: {
            validators: {
		notEmpty:
			{
			    message: 'PAN Number is required'
			},
			regexp: {
                        regexp: /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/,
                        message: 'PAN Number contains only 10 Digit Numbers'
                    }
            }
        },
	
	current_location: {
            validators: {
		notEmpty:
			{
			    message: 'Current Location is required'
			},
            }
        },
	preferred_location: {
            validators: {
		notEmpty:
			{
			    message: 'Prefered Location is required'
			},
            }
        },
	interview_timing: {
            validators: {
		notEmpty:
			{
			    message: 'Interview Timing is required'
			},
            }
        },
	educational_gap_year: {
            validators: {
		notEmpty:
			{
			    message: 'Educational Gap is required'
			},
            }
        },
	career_gap_year: {
            validators: {
		notEmpty:
			{
			    message: 'Carreier Gap is required'
			},
            }
        },
	team_size_name: {
            validators: {
		notEmpty:
			{
			    message: 'Team Member name is required'
			},
                         regexp: {
			    regexp: /^[a-z\s]+$/i,
			    message: 'The Team Member name can consist of alphabetical characters and spaces only'
			}
            }
        },
	team_contact_no: {
            validators: {
		notEmpty:
			{
			    message: 'Team Contact Number is required'
			},
			regexp: {
                        regexp: /^(\+\d{1,3}[- ]?)?\d{10}$/,
                        message: 'Contact Number contains only 10 Digit Numbers'
                    }
            }
        },
//        'skills[]':
//		{
//		    message: 'Skills is not valid',
//		    trigger:'blur',
//		    
//		    validators:
//		    {
//			notEmpty:
//			{
//			    message: 'Skills is required and can\'t be empty'
//			}
//		    }
//		},
'skills[]': {
					validators: {
					
					notEmpty: {
						message: 'The Skill is required and can\'t be empty'
					},
					}
				},
				'primary_other_skils': {
                  
                   validators: {
                       notEmpty: {
                           message: 'The Primary other skills'
                       },
                   }
				},
				'secondary_other_skils': {
                  
                   validators: {
                       notEmpty: {
                           message: 'The secondary other skills'
                       },
                   }
               },
         'language_known[]':
		{
		    message: 'Language is not valid',
		    trigger:'blur',
		    
		    validators:
		    {
			notEmpty:
			{
			    message: 'Language is required and can\'t be empty'
			}
		    }
		},
        'client_comp[]':
		{
		    message: 'Client Company is not valid',
		    trigger:'blur',
		    group:'td',
		    validators:
		    {
			notEmpty:
			{
			    message: 'Client Company is required and can\'t be empty'
			}
		    }
		},
	'payroll_comp[]':
	{
	    message: 'Payroll is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'Payroll Company is required and can\'t be empty'
		}
	    }
	},
	'designation[]':
	{
	    message: 'Designation is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'Designation is required and can\'t be empty'
		}
	    }
	},
	'emp_duration_from[]':
	{
	    message: 'From Date is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'From Date is required and can\'t be empty'
		}
	    }
	},
	'emp_duration_to[]':
	{
	    message: 'Upto Date is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'Upto Date is required and can\'t be empty'
		}
	    }
	},
	'location[]':
	{
	    message: 'Location is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'Location is required and can\'t be empty'
		}
	    }
	},
	'degree[]':
	{
	    message: 'Degree is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'Degree is required and can\'t be empty'
		}
	    }
	},
	//'specialisation[]':
	//{
	//    message: 'Specialization is not valid',
	//    trigger:'blur',
	//    group:'td',
	//    validators:
	//    {
	//	notEmpty:
	//	{
	//	    message: 'Specialztion is required and can\'t be empty'
	//	}
	//    }
	//},
	'edu_duration_from[]':
	{
	    message: 'Education Duration From is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'Education Duration From is required and can\'t be empty'
		}
	    }
	},
	'edu_duration_to[]':
	{
	    message: 'Education Duration To is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'Education Duration To is required and can\'t be empty'
		}
	    }
	},
	'university[]':
	{
	    message: 'University is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'University is required and can\'t be empty'
		}
	    }
	},
	'percentage[]':
	{
	    message: 'Percentage is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'Percentage is required and can\'t be empty'
		},
		regexp: {
			  regexp: /^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$/,
			  message: 'Please Enter Valid Format'
			}
	    }
	},
	
    }
});
});
    
  function addMore() {
        var $template = $('#optionTemplate');
        $clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
	$clone.find('[name="degree_Status[]"]').val("addNewDegree");
        $clone.find('[id="degree"]').attr('name', 'degree[]');
        $clone.find('[id="specialisation"]').attr('name', 'specialisation[]');
        $clone.find('[id="edu_duration_from"]').attr('name', 'edu_duration_from[]');
        $clone.find('[id="edu_duration_to"]').attr('name', 'edu_duration_to[]');
        $clone.find('[id="university"]').attr('name', 'university[]');
        $clone.find('[id="percentage"]').attr('name', 'percentage[]');
        
	$name   = $clone.find('[name="degree[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
        
	$name   = $clone.find('[name="specialisation[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
        
	$name   = $clone.find('[name="edu_duration_from[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);        
        
        $name   = $clone.find('[name="edu_duration_to[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
        
        $name   = $clone.find('[name="university[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
        
        $name   = $clone.find('[name="percentage[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
        datepicker2();
    }
    function removeButton($this) {
        var $row = $this.parents('.odd');
        $row.remove(); 
    }
    function addMore1() {
        var $template = $('#optionTemplate1');
        $clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
	$clone.find('[name="Line_Status[]"]').val("addNew");
        $clone.find('[id="client_comp"]').attr('name', 'client_comp[]');        
        $clone.find('[id="payroll_comp"]').attr('name', 'payroll_comp[]');
        $clone.find('[id="designation"]').attr('name', 'designation[]');
        $clone.find('[id="emp_duration_from"]').attr('name', 'emp_duration_from[]');
        $clone.find('[id="emp_duration_to"]').attr('name', 'emp_duration_to[]');
        $clone.find('[id="location"]').attr('name', 'location[]');
        
	$name   = $clone.find('[name="client_comp[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
        
	$name   = $clone.find('[name="payroll_comp[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
        
	$name   = $clone.find('[name="designation[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);        
        
        $name   = $clone.find('[name="emp_duration_from[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
        
        $name   = $clone.find('[name="emp_duration_to[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
        
        $name   = $clone.find('[name="location[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);

        datepicker1();
    }
    function removeButton1($this) {
        var $row = $this.parents('.odd1');
        $row.remove(); 
    }    
    function panAttachment(){
        var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("PanPreview").files[0]);
	oFReader.onload = function (oFREvent) {
	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
	};
    }
    function datepicker1()
    {
	$('*#emp_duration_from').datetimepicker({
	    format: 'DD-MMM-YYYY'
	});
	$('*#emp_duration_to').datetimepicker({
	    format: 'DD-MMM-YYYY'
	}); 
    }
    function datepicker2()
    {
	$('*#edu_duration_from').datetimepicker({
	    format: 'DD-MMM-YYYY'
	});
	$('*#edu_duration_to').datetimepicker({
	    format: 'DD-MMM-YYYY'
	}); 
    }
    function primaryChange($this)
   {
	   
		var values=$this.val();
		if(values!=null)
		{
			var res = values.toString().split(",");
			if(jQuery.inArray("Others", res)!='-1')
			{
				$(".primary").removeClass("hide");
				$(".primaryName").attr("name","primary_other_skils");
				$('#form_validation').bootstrapValidator('addField', "primary_other_skils");
			
			}
			else
			{			
				
				$('#form_validation').bootstrapValidator('revalidateField',"primary_other_skils");
				$(".primaryName").removeAttr("name");
				$(".primary").addClass("hide");
			}
		}
		else
		{			
			$(".primaryName").removeAttr("name");
			//$('#form_validation').bootstrapValidator('removeField',"primary_other_skils");
			$(".primary").addClass("hide");
		}
		
   }
   function secondaryChange($this)
   {
		
		var values=$this.val();
		if(values!=null)
		{
			
			var res = values.toString().split(",");
			if(jQuery.inArray("Others", res)!='-1')
			{
				$(".secondary").removeClass("hide");
				$(".secondaryName").attr("name","secondary_other_skils");
				$('#form_validation').bootstrapValidator('addField', "secondary_other_skils");
			
			}
			else
			{
				$('#form_validation').bootstrapValidator('revalidateField', "secondary_other_skils");
				$(".secondaryName").removeAttr("name");
				$(".secondary").addClass("hide");
			}
		}
		else
		{			
			$(".secondaryName").removeAttr("name");
			//$('#form_validation').bootstrapValidator('removeField', "secondary_other_skils");
			$(".secondary").addClass("hide");
		}
		
   }
   
    var check_prim_other="<?php echo $employeeEdit[0]['skills'];?>";
    var res = check_prim_other.toString().split(",");
     if(jQuery.inArray("Others", res)!='-1')
    {
       $(".primary").removeClass("hide");
       $(".primaryName").attr("name","primary_other_skils");
    }
     var check_sec_other="<?php echo $employeeEdit[0]['SecondarySkills'];?>";
     var res = check_sec_other.toString().split(",");
     if(jQuery.inArray("Others", res)!='-1')
     {
       $(".secondary").removeClass("hide");
       $(".secondaryName").attr("name","secondary_other_skils");
    }
   
   
   //Modified 14-07-16
   
   $('.resume_file').click(function(){
	$id=$(this).attr('data-id');
	$.ajax({
	type: "POST",
	url:'<?=site_url('admin/resume_file');?>',
	data: {id:$id},
	success: function(response){
	    console.log(response);
	    $('#myModal').find('.row').html(response);
	    $('#myModal').modal('show'); 
	}
        });
    });
   
</script>