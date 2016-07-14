<div class="container" style="padding-top: 80px;padding-bottom: 40px;">
    <?php $status=$this->session->flashdata('status');?>
		    <?php if($status) { ?>
                    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
		    <?php } ?>
    <form id="form_validation" method="post" action="<?php echo site_url('talentcapitalctr/directApplicant');?>" enctype="multipart/form-data" role="form">
        <div class="col-md-6 col-md-offset-3">
          
            <div class="form-group">
                <h2 class="headingLine" id="candidate">Direct Applicant</h2>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control input-md" name="name" type="text" placeholder="Name">
            </div>
	     
		
		
            <div class="form-group">
                <label>Mobile Number <span style="color:#EB8B11">*</span></label>
                <input class="form-control input-md" name="mobile_number" type="text" placeholder="Number">
            </div>
            <div class="form-group">
                <label>Email <span style="color:#EB8B11">*</span></label>
                <input class="form-control input-md" name="email" type="text" placeholder="Email">
            </div>
            <!--<div class="form-group">-->
            <!--    <label>Skills <span style="color:#EB8B11">*</span></label>-->
            <!--    <select multiple class="form-control chzn-select input-sm" name="skill[]">-->
            <!--        <option>C</option>-->
            <!--        <option>C++</option>-->
            <!--        <option>Java</option>-->
            <!--        <option>Dot Net</option>-->
            <!--        <option>C#</option>-->
            <!--        <option>PHP</option>-->
            <!--        <option>Python</option>-->
            <!--        <option>Perl</option>-->
            <!--        <option>Ruby</option>-->
            <!--        <option>Javascript</option>-->
            <!--        <option>SQL</option>-->
            <!--    </select>-->
            <!--</div>-->
	    
	    <div class="form-group">
                                <label>Primary Skills <span style="color:#EB8B11">*</span></label>
                                <select multiple class="form-control chzn-select input-sm" onchange="primaryChange($(this))" name="skills[]">
                                  <option>C</option>
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
								  <option value="Others">Others</option>
                                </select>
                            </div>
							 <div class="form-group primary hide">
                                <label>Other Skills<span style="color:#EB8B11">*</span></label>
                                <input class="form-control primaryName input-md" value="<?php //echo $getApplicantDetails[0]['primary_other_skils'];?>" name="" type="text" placeholder="primary other skils">
                            </div>
							<div class="form-group">
                                <label>Secondary Skills <span style="color:#EB8B11">*</span></label>
                                <select multiple class="form-control chzn-select input-sm" onchange="secondaryChange($(this))" name="SecondarySkills[]">
                                  <option>C</option>
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
								  <option  value="Others">Others</option>
                                </select>
                            </div>
							<div class="form-group secondary hide" >
                                <label>Other Skills<span style="color:#EB8B11">*</span></label>
                                <input class="form-control secondaryName input-md" value="<?php echo $getApplicantDetails[0]['secondary_other_skils'];?>" name="" type="text" placeholder="secondary other skils">
                            </div>
	    
	    <!--<div class="form-group">
                                <label>Total Exp</label>
                                <input class="form-control input-md" name="total_exp" type="text" placeholder="Total Exp">
                            </div>                            
                            
                            <div class="form-group">
                              <label>Revelant Exp</label>
                                <input class="form-control input-md" name="relevant_exp" type="text" placeholder="Revelant Exp">
                            </div>
                            <div class="form-group">
                                <label>Notice Period</label>
                                <input class="form-control input-md" name="notice_period" type="text" placeholder="Notice Period">
                            </div>
                            <div class="form-group">
                                <label>Current CTC <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="current_ctc" type="text" placeholder="Current CTC">
                            </div>
                            <div class="form-group">
                                <label>Expected CTC <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="expected_ctc" type="text" placeholder="Expected CTC">
                            </div>
                            <div class="">
                                <label>Date Of Birth</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="day" class="form-control">
                                     <option selected>Day</option>
                                    <option  value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="12">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option  value="31">31</option>
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="month" class="form-control">
                                    <option selected>Month</option>
                                    <option  value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option  value="December">December</option>
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="year" class="form-control">
                                    <option selected>Year</option>
                                    <option  value="1960">1960</option>
                                    <option value="1961">1961</option>
                                    <option value="1962">1962</option>
                                    <option value="1963">1963</option>
                                    <option value="1964">1964</option>
                                    <option value="1965">1965</option>
                                    <option value="1966">1966</option>
                                    <option value="1967">1967</option>
                                    <option value="1968">1968</option>
                                    <option value="1969">1969</option>
                                    <option value="1970">1970</option>
                                    <option value="1971">1971</option>
                                    <option value="1972">1972</option>
                                    <option value="1973">1973</option>
                                    <option value="1974">1974</option>
                                    <option value="1975">1975</option>
                                    <option value="1976">1976</option>
                                    <option value="1977">1977</option>
                                    <option value="1978">1978</option>
                                    <option value="1979">1979</option>
                                    <option value="1980">1980</option>
                                    <option value="1981">1981</option>
                                    <option value="1982">1982</option>
                                    <option value="1983">1983</option>
                                    <option value="1984">1984</option>
                                    <option value="1985">1985</option>
                                    <option value="1986">1986</option>
                                    <option value="1987">1987</option>

                                    <option value="1988">1988</option>
                                    <option value="1989">1989</option>
                                    <option value="1990">1990</option>
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>
                                    <option value="1997">1997</option>
                                    <option value="1998">1998</option>
                                    <option value="1999">1999</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>

                                    <option  value="2011">2011</option>
                                  </select>
                                </div>
                                 </div>
                            </div>
                            
                            <div class="form-group">
                              <label>Pan Card Number <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="pan_card_no" type="text" placeholder="Please Enter Your Pan Card Number">
                            </div>
                            <div class="form-group">
                              <img src="<?php echo base_url();?>assets/images/sample.jpg" class="img-resposive" width="300" height="200" id="PanImgPreview">
                           </div>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-primary btn-file">
                                      Browse<input type="file" name="pan_card_attach" id="PanPreview" onchange="panAttachment();">
                                  </span>
                              </span>
                              <input type="text" id="" value="" class="form-control" readonly >
                            </div>
                          </div>
                            
                            <div class="form-group">
                                <label>Language Known</label>
                                <select multiple class="form-control chzn-select input-sm" name="language_known[]">
                                   <option value="English">English</option>
                                   <option value="Tamil">Tamil</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Malayalam">Malayalam</option>
                                     <option value="Kannadam">Kannadam</option>
                                    <option value="Hindi">Hindi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Current Location</label>
                                <input class="form-control input-md" name="current_location" type="text" placeholder="Current Location">
                            </div>
                            <div class="form-group">
                                <label>Perfered Location</label>
                                <input class="form-control input-md" name="preferred_location" type="text" placeholder="Perfered Location">
                            </div>
                            <div class="form-group">
                              <label>Interview Timing</label>
                                <input class="form-control input-md" name="interview_timing" id="datetimepicker1" type="text" placeholder="Interview Timing">
                            </div>
                            <div class="form-group">
                                <label>Educational Gap(in years)</label>
                                <input class="form-control input-md" name="educational_gap_year" type="text" placeholder="Educational Gap(in years)">
                            </div>
                            <div class="form-group">
                                <label>Carrier Gap(in years)</label>
                                <input class="form-control input-md" name="career_gap_year" type="text" placeholder="Email">
                            </div>
                            <div id="team" class="form-group">
                                <h2 class="headingLine" >Team Size</h2>
                            </div>
                            <div class="form-group">
                                <label>Number</label>
                                <input class="form-control input-md" name="team_size_name" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Contact Number <span style="color:#EB8B11">*</span> </label>
                                <input class="form-control input-md" name="team_contact_no" type="text" placeholder="Email">
                            </div>
			       
			</div>
	
			 <div class="col-md-3" style="padding-top:20px">
			    <div class="form-group">
				<label>Profile Picture</label>
				<img src="<?php echo base_url();?>assets/images/profile.png" class="img-resposive" width="200" height="200" id="ProfileImgPreview">
			    </div>
			    <div class="form-group ">
				<div class="input-group">
				    <span class="input-group-btn">
					<span class="btn btn-primary btn-file">
					    Browse<input type="file" name="profile_pic" id="ProfilePreview" onchange="profileAttachment();">
					    </span>
					</span>
				    <input type="text" id="" value="" class="form-control" readonly >
					</div>
			    </div>
			 </div>   
			<div class="col-md-10 col-md-offset-2">                            
                            <div class=""> 
                          <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th><label>Client Company</label></th>
                                  <th><label>Payroll Company</label></th>
                                  <th><label>Desig Company</label></th>
                                  <th><label>Duration From</label></th>
                                  <th><label>Duration To</label></th>
                                  <th><label>Location</label></th>
                                  <th><button type="button" onclick="addMore1();" class="btn-add btn btn-default"><i class="fa fa-plus"></i></button></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="odd1">
                                  <td> <input placeholder="Client Company" name="client_comp[]" id="client_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Payroll Company" name="payroll_comp[]" id="payroll_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Designation Company" name="designation[]" class="form-control input-md" id="designation" type="text" ></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" name="emp_duration_from[]" id="emp_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder="" name="emp_duration_to[]" id="emp_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="Location" name="location[]" class="form-control input-md" type="text"></td>
                                  <td><center><button type="button" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>
                                </tr>
                                 <tr class="odd1 hide" id="optionTemplate1">
                                  <td> <input placeholder="Client Company" id="client_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Payroll Company" id="payroll_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Designation Company" class="form-control input-md" id="designation" type="text" ></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" id="emp_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder=""id="emp_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="Location" id="location" class="form-control input-md" type="text"></td>
                                  <td><center><button type="button" onclick="removeButton1($(this));" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>
                                </tr>
                               
			      </tbody>
                            </table>
                        </div>
                        </div>                            

			<div class="col-md-10 col-md-offset-2">
			 <div class=""> 
                          <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th><label>Degree</label></th>
                                  <th><label>Specialisation</label></th>
                                  <th><label>Duration From</label></th>
                                  <th><label>Duration To</label></th>
                                  <th><label>University</label></th>
                                  <th><label>Percentage</label></th>
                                  <th><button type="button" onclick="addMore();" class="btn-add btn btn-default"><i class="fa fa-plus"></i></button></th>
                                </tr>   
                              </thead>
                              <tbody>
                                <tr class="odd" >
                                  <td> <input placeholder="Degree" name="degree[]" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialisation" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" name="edu_duration_from[]" id="edu_duration_from" class="form-control input-sm    datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-sm  datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" name="university[]" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" name="percentage[]" class="form-control input-md" type="text"></td>
                                  <td><center><button type="button" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>
                                </tr>
                                 <tr class="odd hide" id="optionTemplate">
                                  <td> <input placeholder="Degree" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialisation" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" onblur="checkDurationMonth($(this));" id="edu_duration_from" class="form-control input-sm  input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" id="edu_duration_to" class="form-control input-sm  input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" id="university" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" id="percentage" class="form-control input-md" type="text"></td>
                                  <td><center><button type="button" onclick="removeButton($(this));" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>
                                </tr>
                               
                             
                              </tbody>
                            </table>
                        </div>-->
			 
			 <div class="form-group col-md-offset-3">
		    <input type="submit" name="save" value="Submit" class="btn btn-sm btn-success">
		<button type="button" class="btn btn-sm btn-warning">cancel</button>
            </div> 
			 
                        </div>
	   
	    
	    
	    
	    
                        
       
    </form>    
</div>
<script>
    $(document).ready(function() {
        $(".chzn-select").chosen();
        $('#form_validation').bootstrapValidator({
            message: 'This value is not valid',
            excluded: [':disabled'],
            feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The name is required and can\'t be empty'
                        },
			regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The full name can consist of alphabetical characters and spaces only'
                    }
                    }
                },
                mobile_number: {
                    validators: {
                        notEmpty: {
                            message: 'The mobile number is required and can\'t be empty'
                        },
			regexp: {
                        regexp: /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/,
                        message: 'Mobile Number contains only 10 Digit Numbers'
                    }
                    }
                },
                team_contact_no: {
                    validators: {
                        notEmpty: {
                            message: 'The mobile number is required and can\'t be empty'
                        },
			regexp: {
                        regexp: /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/,
                        message: 'Mobile Number contains only 10 Digit Numbers'
                    }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email number is required and can\'t be empty'
                        },
			regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                },                
		//'skill[]': {
		//    validators: {
		//	
		//	notEmpty: {
		//	    message: 'The Skill is required and can\'t be empty'
		//	},
		//    }
		//},
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
            }
        });        
    });
    
    function panAttachment(){
        var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("PanPreview").files[0]);
	oFReader.onload = function (oFREvent) {
	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
	};
    }function profileAttachment(){
        var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("ProfilePreview").files[0]);
	oFReader.onload = function (oFREvent) {
	    var data=document.getElementById("ProfileImgPreview").src = oFREvent.target.result;
	};
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
				$(".primaryName").removeAttr("name");
				$('#form_validation').bootstrapValidator('removeField',"primary_other_skils");
				$(".primary").addClass("hide");
			}
		}
		else
		{			
			$(".primaryName").removeAttr("name");
			$('#form_validation').bootstrapValidator('removeField',"primary_other_skils");
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
				$(".secondaryName").removeAttr("name");
				$('#form_validation').bootstrapValidator('removeField', "secondary_other_skils");
				$(".secondary").addClass("hide");
			}
		}
		else
		{			
			$(".secondaryName").removeAttr("name");
			$('#form_validation').bootstrapValidator('removeField', "secondary_other_skils");
			$(".secondary").addClass("hide");
		}
		
   }

</script>