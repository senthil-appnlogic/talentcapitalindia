<style>
    .headingLine{
        font-size:17px;
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
                            <h4 class="panel-title">Employee Form</h4>
                        </div>
                        <div class="panel-body">
			    <form action="<?php echo site_url('talentcontroller/employeeAdd'); ?>" class=""  id="form_validation" method="post" name="form_validation" enctype="multipart/form-data">
                           
                        <div class="col-md-6 col-md-offset-3">
                           
                            <div class="form-group">
                                <h2 class="headingLine" id="candidate">Candidate Details</h2>
                            </div>
                            <div class="form-group">
                              <label>Candidate Name</label>
                                <input class="form-control input-md" name="candidate_name" type="text" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Mobile Number <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="mobile_number" type="text" placeholder="Number">
                            </div>
                            <div class="form-group">
                                <label>Email ID <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="mail_id" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Skills <span style="color:#EB8B11">*</span></label>
                                <select multiple class="form-control chzn-select input-sm" name="skills[]">
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
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Total Exp</label>
                                <input class="form-control input-md" name="total_exp" type="text" placeholder="Total Exp">
                            </div>                            
                            
                            <div class="form-group">
                              <label>Relevant Exp</label>
                                <input class="form-control input-md" name="relevant_exp" type="text" placeholder="Relevant Exp">
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
                                <label>Languages Known</label>
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
                                <label>Career Gap(in years)</label>
                                <input class="form-control input-md" name="career_gap_year" type="text" placeholder="Career Gap">
                            </div>
                            <div id="team" class="form-group">
                                <h2 class="headingLine" >Team Size</h2>
                            </div>
                            <div class="form-group">
                                <label>Number</label>
                                <input class="form-control input-md" name="team_size_name" type="text" placeholder="Please Enter Your Team Members In Numbers">
                            </div>
                            <div class="form-group">
                                <label>Contact Number <span style="color:#EB8B11">*</span> </label>
                                <input class="form-control input-md" name="team_contact_no" type="text" placeholder="Contact Number">
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
                                  <th><button type="button" onclick="addMore1();" class="btn-add btn btn-primary"><i class="fa fa-plus"></i></button></th>
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
                                  <td><center><button type="button" class="btn btn-remove btn-danger btn-sm removeButton"><i class="fa fa-trash"></i></button></center></td>
                                </tr>
                                 <tr class="odd1 hide" id="optionTemplate1">
                                  <td> <input placeholder="Client Company" id="client_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Payroll Company" id="payroll_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Designation Company" class="form-control input-md" id="designation" type="text" ></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" id="emp_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder=""  id="emp_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="Location" id="location" class="form-control input-md" type="text"></td>
                                  <td><center><button type="button" onclick="removeButton1($(this));" class="btn btn-remove btn-danger btn-sm removeButton"><i class="fa fa-trash"></i></button></center></td>
                                </tr>
				  </tbody>
			      </table>
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
                                  <th><label>Specialization</label></th>
                                  <th><label>Duration From</label></th>
                                  <th><label>Duration To</label></th>
                                  <th><label>University</label></th>
                                  <th><label>Percentage</label></th>
                                  <th><button type="button" onclick="addMore();" class="btn-add btn btn-primary"><i class="fa fa-plus"></i></button></th>
                                </tr>   
                              </thead>
                              <tbody>
                                <tr class="odd" >
                                  <td> <input placeholder="Degree" name="degree[]" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialisation" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" name="edu_duration_from[]" id="edu_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder="" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" name="university[]" id="university" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" name="percentage[]" id="percentage" class="form-control input-md" type="text"></td>
                                  <td><center><button type="button" class="btn btn-remove btn-danger btn-sm removeButton"><i class="fa fa-trash"></i></button></center></td>
                                </tr>
                                 <tr class="odd hide" id="optionTemplate">
                                  <td> <input placeholder="Degree" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialisation" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" id="edu_duration_from" class="form-control input-sm table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder="" id="edu_duration_to" class="form-control input-sm table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" id="university" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" id="percentage" class="form-control input-md" type="text"></td>
                                  <td><center><button type="button" onclick="removeButton($(this));" class="btn btn-remove btn-danger btn-sm removeButton"><i class="fa fa-trash"></i></button></center></td>
                                </tr>
                               
                             
                              </tbody>
                            </table>
                        </div>
                        </div>
			 <div class="col-md-10 col-md-offset-3" style="padding-bottom: 15px;">
                            <input type="submit" name="Save" value="Submit" class="btn btn-sm btn-success">
                        <button type="button" onclick="window.history.back();" class="btn btn-warning">cancel</button>
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
    $(".chzn-select").chosen();
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
			    message: 'Relevant Exp is required'
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
                        regexp: /^(\+\d{1,3}[- ]?)?\d{10}$/,
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
			    message: 'Team Size is required'
			},
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
           'skills[]': {
      validators: {
	   
	   notEmpty: {
	       message: 'The Skill is required and can\'t be empty'
	   },
      }
  },
           'language_known[]': {
      validators: {
   
   notEmpty: {
       message: 'The Language is required and can\'t be empty'
   },
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
	'specialisation[]':
	{
	    message: 'Specialization is not valid',
	    trigger:'blur',
	    group:'td',
	    validators:
	    {
		notEmpty:
		{
		    message: 'Specialztion is required and can\'t be empty'
		}
	    }
	},
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
		}
	    }
	},
	
    }
});
      
        
        
        //datepicker();
        $('.datepicker-dob').datetimepicker({
	    format: 'DD-MMM-YYYY'
	});  
   function addMore() {
        var $template = $('#optionTemplate')
        $clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
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
        var $template = $('#optionTemplate1')
        $clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
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
</script>