<style>
  @media only screen and (max-width: 746px) {
  .mobilesize{
   margin: 10px;
   }
}
.button {
  display: inline-block;
  padding: 8px 12px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #E57C10;
  border: none;
  border-radius: 3px;
  box-shadow: 3px 4px 4px 2px  #999;
}

.button:hover {background-color: #E57C10;text-decoration: none;color:#fff}

.button:active {
  background-color: #E57C10;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

.has-feedback .form-control {
    padding-right: 0px;
}
.capitalized{
  text-transform: capitalize;
}

@media only screen and (max-width: 768px) {
  .datepicker-dob {
      width: 95px !important;
  }
  .datepicker-dob1 {
      width: 95px !important;
  }
}

</style>
<div  class="container" style="padding-top: 80px;">
    <center>
        <a class="button mobilesize" href="#candidate">Candidate Details</a>&nbsp;&nbsp;
	<a class="button mobilesize" href="#team">Team Details</a>&nbsp;&nbsp;
        <a class="button mobilesize" href="#education">Educational Details</a>&nbsp;&nbsp;
        <a class="button mobilesize" href="#employement">Employment Details</a>&nbsp;&nbsp;
    </center>
        </div>
            <div  class="container" style="padding-top: 15px;">
              <?php $status=$this->session->flashdata('status');?>
		    <?php if($status) { ?>
                    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
		    <?php } ?>
                          <form id="form_validation" method="post" action="" enctype="multipart/form-data" role="form">
                            <div class="col-md-6 col-md-offset-3">
			    <input type="hidden" name="checking" value="yes">
                            <div class="form-group">
                              <h2 class="headingLine" id="candidate">Candidate Details</h2>
                            </div>

                            <div class="form-group">
                              <label>Candidate Name <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md capitalized" value="<?php echo $getApplicantDetails[0]['candidate_name'];?>" name="candidate_name" type="text" placeholder="Name" readonly>
                                <input type="hidden" class="" value="<?php echo $getApplicantDetails[0]['id'];?>" name="hiddenId" >
                            </div>
                            <div class="form-group">
                              <label>Middle Name <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md capitalized"  name="middle_name" type="text" placeholder="Middle Name">
                            </div>
                            <div class="form-group">
                              <label>Last Name <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md capitalized"  name="last_name" type="text" placeholder="Last Name">
                            </div>			    
                            
                            <div class="form-group">
                              <label>Profile Picture</label>
                              <img width="200" height="200" id="ProImgPreview" class="img-resposive" src="<?php echo base_url();?>assets/images/profile.png">
                            </div>
                            <div class="form-group ">
                              <div class="input-group">
                                <span class="input-group-btn">
                                  <span class="btn btn-primary btn-file">
                                    Browse<input type="file" onchange="profilePic();" id="ProfileImgPreview" name="profile_pic">
                                  </span>
                                </span>
                                <input type="text" readonly="" class="form-control" value="" id="">
                              </div>
                            </div>                            

                            <div class="form-group">
                                <label>Mobile Number <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" value="<?php echo $getApplicantDetails[0]['mobile_number'];?>" name="mobile_number" type="text" placeholder="Number" readonly>
                            </div>
                            <div class="form-group">
                                <label>Email ID <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" value="<?php echo $getApplicantDetails[0]['mail_id'];?>" name="mail_id" type="text" placeholder="Email" readonly>
                            </div>
							
                            <div class="form-group">
                                <label>Primary Skills <span style="color:#EB8B11">*</span></label>
				<select multiple class="form-control chzn-select input-sm" onchange="primaryChange($(this))" name="skills[]">
				  <option></option>
				  <?php
				  foreach ($skills as $row)
				  {?>
				  <option value="<?php echo $row['skill']; ?>"><?php echo $row['skill']; ?></option>
				  <?php } ?>
				</select>
                               <!-- <select multiple class="form-control chzn-select input-sm" onchange="primaryChange($(this))" name="skills[]">
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
                                </select>-->
                            </div>
			    <div class="form-group primary hide">
                                <label>Other Skills<span style="color:#EB8B11">*</span></label>
                                <input class="form-control primaryName input-md" value="<?php echo $getApplicantDetails[0]['primary_other_skils'];?>" name="" type="text" placeholder="primary other skils">
                            </div>
			    <div class="form-group">
                                <label>Secondary Skills <span style="color:#EB8B11">*</span></label>
				
				
                                <!--<select multiple class="form-control chzn-select input-sm" onchange="secondaryChange($(this))" name="SecondarySkills[]">
				  <option></option>
				  <?php
				  foreach ($skills as $row)
				  {?>
				  <option value="<?php echo $row['skill']; ?>"><?php echo $row['skill']; ?></option>
				  <?php } ?>
				</select>-->
				<input class="form-control input-md"  name="SecondarySkills" type="text" placeholder="Secondary Skills">
                                
                            </div>
			    <div class="form-group secondary hide" >
                                <label>Other Skills<span style="color:#EB8B11">*</span></label>
                                <input class="form-control secondaryName input-md" value="<?php echo $getApplicantDetails[0]['secondary_other_skils'];?>" name="" type="text" placeholder="secondary other skils">
                            </div>
                              <div class="">
                                <label>Total Experience <span style="color:#EB8B11">*</span></label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="total_exp_year" class="form-control selectpicker" data-size="10">
                                    <option disabled selected hidden>In Years</option>
                                    <option value="0">0 </option>
				    <option value="1">1 </option>
                                    <option value="2">2 </option>
                                    <option value="3">3 </option>
                                    <option value="4">4 </option>
                                    <option value="5">5 </option>
                                    <option value="6">6 </option>
                                    <option value="7">7 </option>
                                    <option value="8">8 </option>
                                    <option value="9">9 </option>
                                    <option value="10">10 </option>
                                    <option value="11">11 </option>
                                    <option value="12">12 </option>
                                    <option value="12">13 </option>
                                    <option value="14">14 </option>
                                    <option value="15">15 </option>
                                    <option value="16">16 </option>
                                    <option value="17">17 </option>
                                    <option value="18">18 </option>
                                    <option value="19">19 </option>
                                    <option value="20">20 </option>
                                    <option value="21">21 </option>
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="total_exp_month" class="form-control selectpicker" data-size="10">
                                    <option disabled selected hidden>In Months</option>
				    <option value="0">0 </option>
                                    <option value="1">1 </option>
                                    <option value="2">2 </option>
                                    <option value="3">3 </option>
                                    <option value="4">4 </option>
                                    <option value="5">5 </option>
                                    <option value="6">6 </option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10 </option>
                                    <option value="11">11 </option>
                                  </select>
                                </div>
                                 </div>
                            </div>
                          
                            
                            <!--<div class="form-group">
                              <label>Relevant Exp</label>
                                <input class="form-control input-md" name="relevant_exp" type="text" placeholder="Relevant Exp">
                            </div>-->
			    	<div class="">
                                <label>Relevant Exp <span style="color:#EB8B11">*</span></label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="relevant_exp_year" class="form-control selectpicker" data-size="10">
                                     <option disabled selected hidden>In Year</option>
				     <option value="0">0 </option>
                                    <option value="1">1 </option>
                                    <option value="2">2 </option>
                                    <option value="3">3 </option>
                                    <option value="4">4 </option>
                                    <option value="5">5 </option>
                                    <option value="6">6 </option>
                                    <option value="7">7</option>
                                    <option value="8">8 </option>
                                    <option value="9">9 </option>
                                    <option value="10">10 </option>
                                    <option value="11">11 </option>
                                    <option value="12">12 </option>
                                    <option value="12">13 </option>
                                    <option value="14">14 </option>
                                    <option value="15">15 </option>
                                    <option value="16">16 </option>
                                    <option value="17">17 </option>
                                    <option value="18">18 </option>
                                    <option value="19">19 </option>
                                    <option value="20">20 </option>
                                    <option value="21">21 </option>
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="relevant_exp_month" class="form-control selectpicker" data-size="10">
                                    <option disabled selected hidden>In Months</option>
				    <option value="0">0 </option>
                                    <option value="1">1 </option>
                                    <option value="2">2 </option>
                                    <option value="3">3 </option>
                                    <option value="4">4 </option>
                                    <option value="5">5 </option>
                                    <option value="6">6 </option>
                                    <option value="7">7</option>
                                    <option value="8">8 </option>
                                    <option value="9">9 </option>
                                    <option value="10">10 </option>
                                    <option value="11">11 </option>
                                  </select>
                                </div>
                                 </div>
                            </div>

                            <div class="">
                                <label>Notice Period <span style="color:#EB8B11">*</span></label>
                                <div class="row">
				  <div class="form-group col-md-4">
				    <select name="notice_period" class="form-control selectpicker" onchange="getServingPeriod($(this));" data-size="10">
				       <option disabled selected hidden>Select</option>
                                        <option value="Immediate">Immediate</option>
					<option value="7">7 Days</option>
					<option value="15">15 Days</option>
					<option value="30">30 Days</option>
					<option value="45">45 Days</option>
					<option value="60">60 Days</option>
					<option value="90 Days & Above">90 Days & Above</option>
					<option value="ServingPeriod">Serving Period</option>
				     </select>
				  </div>
				</div>
			    </div>
			    
			    <div class="form-group serveP hide">
                              <label>Serving Period End Date</label>
                                <span class='input-group date'><input type="text" name="serving_period" id="serving_period" class="form-control input-md  datepicker-dob"><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span>
                            </div>
			    
                            <!--<div class="form-group">
                                <label>Current CTC <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="current_ctc" type="text" placeholder="Current CTC">
                            </div>-->
			      <div class="">
                                <label>Current CTC <span style="color:#EB8B11">*</span></label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="current_ctc_lakhs" class="form-control selectpicker" data-size="10">
                                     <option disabled selected hidden>In Lakhs</option>
				     <option value="0">0 </option>
                                    <option value="1">1 </option>
                                    <option value="2">2 </option>
                                    <option value="3">3 </option>
                                    <option value="4">4 </option>
                                    <option value="5">5 </option>
                                    <option value="6">6 </option>
                                    <option value="7">7 </option>
                                    <option value="8">8 </option>
                                    <option value="9">9 </option>
                                     <option value="10">10 </option>
                                    <option value="11">11 </option>
                                     <option value="12">12 </option>
                                    <option value="13">13 </option>
                                    <option value="14">14 </option>
                                     <option value="15">15 </option>
                                     <option value="16">16 </option>
                                     <option value="17">17 </option>
                                     <option value="18">18 </option>
                                     <option value="19">19 </option>
                                     <option value="20">20</option>                                  
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="current_ctc_thousands" class="form-control selectpicker" data-size="10">
                                    <option disabled selected hidden>In Thousands</option>
				    <option value="00">0 </option>
                                    <option value="05">5 </option>
                                    <option value="10">10 </option>
                                    <option value="15">15</option>
                                    <option value="20">20 </option>
				    <option value="25">25 </option>
                                    <option value="30">30</option>
                                    <option value="35">35 </option>
				    <option value="40">40 </option>
                                    <option value="45">45</option>
                                    <option value="50">50 </option>
				    <option value="55">55 </option>
                                    <option value="60">60</option>
                                    <option value="65">65 </option>
				    <option value="70">70 </option>
                                    <option value="75">75</option>
                                    <option value="80">80 </option>
				    <option value="85">85 </option>
                                    <option value="90">90</option>
                                    <option value="95">95 </option>
                                   
                                  </select>
                                </div>
                                 </div>
                            </div>
                            <!--<div class="form-group">
                                <label>Expected CTC <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="expected_ctc" type="text" placeholder="Expected CTC">
                            </div>-->
			      <div class="">
                                <label>Expected CTC <span style="color:#EB8B11">*</span></label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="expected_ctc_lakhs" class="form-control selectpicker" data-size="10">
                                     <option disabled selected hidden>In Lakhs</option>
				     <option value="0">0 </option>
                                    <option value="1">1 </option>
                                    <option value="2">2 </option>
                                    <option value="3">3 </option>
                                    <option value="4">4 </option>
                                    <option value="5">5 </option>
                                    <option value="6">6 </option>
                                    <option value="7">7 </option>
                                    <option value="8">8 </option>
                                    <option value="9">9 </option>
                                     <option value="10">10 </option>
                                    <option value="11">11 </option>
                                     <option value="12">12 </option>
                                    <option value="13">13 </option>
                                    <option value="14">14 </option>
                                     <option value="15">15 </option>
                                     <option value="16">16 </option>
                                     <option value="17">17 </option>
                                     <option value="18">18 </option>
                                     <option value="19">19 </option>
                                     <option value="20">20 </option>
                             
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="expected_ctc_thousands" class="form-control selectpicker" data-size="10">
                                    <option disabled selected hidden>In Thousands</option>
				      <option value="00">0 </option>
				      <option value="05">5 </option>
                                    <option value="10">10 </option>
                                    <option value="15">15</option>
                                    <option value="20">20 </option>
				    <option value="25">25 </option>
                                    <option value="30">30</option>
                                    <option value="35">35 </option>
				    <option value="40">40 </option>
                                    <option value="45">45</option>
                                    <option value="50">50 </option>
				    <option value="55">55 </option>
                                    <option value="60">60</option>
                                    <option value="65">65 </option>
				    <option value="70">70 </option>
                                    <option value="75">75</option>
                                    <option value="80">80 </option>
				    <option value="85">85 </option>
                                    <option value="90">90</option>
                                    <option value="95">95 </option>
                                  </select>
                                </div>
                                 </div>
                            </div>

                            <div class="">
                                <label>Date Of Birth <span style="color:#EB8B11">*</span></label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="day" class="form-control selectpicker" data-size="10">
                                     <option disabled selected hidden>Day</option>
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
                                  <select name="month" class="form-control selectpicker" data-size="10">
                                    <option disabled selected hidden>Month</option>
                                    <option  value="Jan">January</option>
                                    <option value="Feb">February</option>
                                    <option value="Mar">March</option>
                                    <option value="Apr">April</option>
                                    <option value="May">May</option>
                                    <option value="Jun">June</option>
                                    <option value="Jul">July</option>
                                    <option value="Aug">August</option>
                                    <option value="Sep">September</option>
                                    <option value="Oct">October</option>
                                    <option value="Nov">November</option>
                                    <option  value="Dec">December</option>
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="year" class="form-control selectpicker" data-size="10">
                                    <option disabled selected hidden>Year</option>
                                    <option value="60">1960</option>
                                    <option value="61">1961</option>
                                    <option value="62">1962</option>
                                    <option value="63">1963</option>
                                    <option value="64">1964</option>
                                    <option value="65">1965</option>
                                    <option value="66">1966</option>
                                    <option value="67">1967</option>
                                    <option value="68">1968</option>
                                    <option value="69">1969</option>
                                    <option value="70">1970</option>
                                    <option value="71">1971</option>
                                    <option value="72">1972</option>
                                    <option value="73">1973</option>
                                    <option value="74">1974</option>
                                    <option value="75">1975</option>
                                    <option value="76">1976</option>
                                    <option value="77">1977</option>
                                    <option value="78">1978</option>
                                    <option value="79">1979</option>
                                    <option value="80">1980</option>
                                    <option value="81">1981</option>
                                    <option value="82">1982</option>
                                    <option value="83">1983</option>
                                    <option value="84">1984</option>
                                    <option value="85">1985</option>
                                    <option value="86">1986</option>
                                    <option value="87">1987</option>
                                    <option value="88">1988</option>
                                    <option value="89">1989</option>
                                    <option value="90">1990</option>
                                    <option value="91">1991</option>
                                    <option value="92">1992</option>
                                    <option value="93">1993</option>
                                    <option value="94">1994</option>
                                    <option value="95">1995</option>
                                    <option value="96">1996</option>
                                    <option value="97">1997</option>
                                    <option value="98">1998</option>
                                    <option value="99">1999</option>
				    <option value="00">2000</option>
                                    <option value="01">2001</option>
                                    <option value="02">2002</option>
                                    <option value="03">2003</option>
                                    <option value="04">2004</option>
                                    <option value="05">2005</option>
                                    <option value="06">2006</option>
                                    <option value="07">2007</option>
                                    <option value="08">2008</option>
                                    <option value="09">2009</option>
                                    <option value="10">2010</option>
                                    <option value="11">2011</option>
                                    <option value="12">2012</option>
                                    <option value="13">2013</option>
                                    <option value="14">2014</option>
                                    <option value="15">2015</option>
                                    <option value="16">2016</option>

                                  </select>
                                </div>
                                 </div>
                            </div>
                            
                            <div class="form-group">
                              <label>Pan Card Number <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="pan_card_no" type="text" placeholder="Please Enter Your Pan Card Number" style="text-transform: uppercase;">
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
                                <label>Languages Known <span style="color:#EB8B11">*</span></label>
				 <select name="language_known[]" class="form-control" multiple id="language">
				  <option></option>
				  <?php
				  foreach ($language as $row)
				  {?>
				  <option value="<?php echo $row['language']; ?>"><?php echo $row['language']; ?></option>
				  <?php } ?>
				</select>
                               <!-- <select multiple class="form-control chzn-select input-sm" name="language_known[]">
                                   <option value="English">English</option>
                                   <option value="Tamil">Tamil</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Malayalam">Malayalam</option>
                                     <option value="Kannadam">Kannadam</option>
                                    <option value="Hindi">Hindi</option>
                                </select>-->
                            </div>
                            <div class="form-group">
                                <label>Current Location <span style="color:#EB8B11">*</span></label>
                                <!--<input class="form-control input-md" name="current_location" type="text" placeholder="Current Location">-->
				 <select name="current_location" class="form-control selectpicker" data-size="10" data-live-search="true">
				  <option disabled selected hidden>Please Select Current Location</option>
				  <?php
				  foreach ($Location as $row)
				  {?>
				  <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
				  <?php } ?>
				</select>
                            </div>
                            <div class="form-group">
                                <label>Perfered Location </label>
                                <!--<input class="form-control input-md" name="preferred_location" type="text" placeholder="Perfered Location">-->
				 <select name="preferred_location[]" class="form-control" multiple id="Preferedloc">
				  <option disabled selected hidden></option>
				  <?php
				  foreach ($Location as $row)
				  {?>
				  <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
				  <?php } ?>
				</select>
                            </div>
                            <div class="form-group">
                              <label>Interview Timing <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md notAllowType" name="interview_timing" id="datetimepicker1" type="text" placeholder="Interview Timing">
                            </div>
                            <!--<div class="form-group">
                                <label>Educational Gap(in years)</label>
                                <input class="form-control input-md" name="educational_gap_year" type="text" placeholder="Educational Gap(in years)">
                            </div>-->
<!--			    			      <div class="">-->
<!--                                <label>Educational Gap(in years)</label>-->
<!--                                <div class="row">-->
<!--                                <div class="form-group col-md-4">-->
<!--                                  <select name="educational_gap_year" class="form-control">-->
<!--                                     <option disabled selected hidden>In Year</option>-->
<!--				    <option value="0years">0 </option>-->
<!--                                    <option value="1years">1 </option>-->
<!--                                    <option value="2years">2 </option>-->
<!--                                    <option value="3years">3 </option>-->
<!--                                    <option value="4years">4 </option>-->
<!--                                    <option value="5years">5 </option>-->
<!--                                    <option value="6years">6 </option>-->
<!--                                    <option value="7years">7 </option>-->
<!--                                    <option value="8years">8 </option>-->
<!--                                    <option value="9years">9 </option>-->
<!--                                    <option value="10years">10 </option>-->
<!--                              -->
<!--                                  </select>-->
<!--                                </div>-->
<!--                                 <div class="form-group col-md-4">-->
<!--                                  <select name="educational_gap_month" class="form-control">-->
<!--                                    <option disabled selected hidden>In Months</option>-->
<!--				    <option value="0months">0 </option>-->
<!--                                    <option value="1months">1 </option>-->
<!--                                    <option value="2months">2 </option>-->
<!--                                    <option value="3months">3 </option>-->
<!--                                    <option value="4months">4 </option>-->
<!--                                    <option value="5months">5 </option>-->
<!--                                    <option value="6months">6 </option>-->
<!--                                    <option value="7months">7 </option>-->
<!--                                    <option value="8months">8 </option>-->
<!--                                    <option value="9months">9 </option>-->
<!--                                    <option value="10months">10 </option>-->
<!--                                    <option value="11months">11 </option>-->
<!--                                  </select>-->
<!--                                </div>-->
<!--                                 </div>-->
<!--                            </div>-->
<!--			      <div class="">-->
<!--                                <label>Career Gap(in years)</label>-->
<!--                                <div class="row">-->
<!--                                <div class="form-group col-md-4">-->
<!--                                  <select name="career_gap_year" class="form-control">-->
<!--                                     <option disabled selected hidden>In Year</option>-->
<!--				    <option value="0years">0 </option>-->
<!--                                    <option value="1years">1 </option>-->
<!--                                    <option value="2years">2 </option>-->
<!--                                    <option value="3years">3 </option>-->
<!--                                    <option value="4years">4 </option>-->
<!--                                    <option value="5years">5 </option>-->
<!--                                    <option value="6years">6 </option>-->
<!--                                    <option value="7years">7 </option>-->
<!--                                    <option value="8years">8 </option>-->
<!--                                    <option value="9years">9 </option>-->
<!--                                    <option value="10years">10 </option>-->
<!--                                   -->
<!--                                  </select>-->
<!--                                </div>-->
<!--                                 <div class="form-group col-md-4">-->
<!--                                  <select name="career_gap_month" class="form-control">-->
<!--                                    <option disabled selected hidden>In Months</option>-->
<!--				    <option value="0months">0 </option>-->
<!--                                    <option value="1months">1 </option>-->
<!--                                    <option value="2months">2 </option>-->
<!--                                    <option value="3months">3 </option>-->
<!--                                    <option value="4months">4 </option>-->
<!--                                    <option value="5months">5 </option>-->
<!--                                    <option value="6months">6 </option>-->
<!--                                    <option value="7months">7</option>-->
<!--                                    <option value="8months">8 </option>-->
<!--                                    <option value="9months">9 </option>-->
<!--                                    <option value="10months">10 </option>-->
<!--                                    <option value="11months">11 </option>-->
<!--                                  </select>-->
<!--                                </div>-->
<!--                                 </div>-->
<!--                            </div>-->


<div class="">
                                <div class="row">
				  <div class="form-group col-md-2">
				      <input  class="lcs_check" id="switch_YN" type="checkbox">
				      <input type="hidden" id="Switch_Val" name="yesno" value="N" />
				  </div>
				   <div class="form-group col-md-6">
					<input type="text" name="check_yn" id="checkingYN" class="form-control">
				  </div>
                                 </div>
			      </div>
                            <div id="team" class="form-group">
                                <h2 class="headingLine" >Team Details</h2>
                            </div>
<!--                            <div class="form-group">
                                <label>Number</label>
				<select class="form-control input-sm" name="team_size_name">
				  <option value="1">1</option>
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
				  <option value="13">13</option>
				  <option value="14">14</option>
				  <option value="15">15</option>
				  <option value="16">16</option>
				  <option value="17">17</option>
				  <option value="18">18</option>
				  <option value="19">19</option>
				  <option value="20">20</option>
				</select>
                                
                            </div>-->
			    <div class="form-group">
                                <label>Team Member Name <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md capitalized" name="team_size_name" type="text" placeholder="Team Member Name">
                            </div>
			    <div class="form-group">
                                <label>Contact Number <span style="color:#EB8B11">*</span> </label>
                                <input class="form-control input-md" name="team_contact_no" type="text" placeholder="Contact number">
                            </div>
                        </div>
    
                                                <div class="col-md-6">
                            <div class="form-group">
                                <h2 class="headingLine" id="education" >Educational Details <span style="color:#EB8B11">*</span></h2>
                            </div>                                                         
                        </div>
                            
                        <div class="col-md-12">

                            <div class=""> 
                          <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th><label>Degree</label></th>
                                  <th><label>Specialization</label></th>
                                  <th><label>Duration From</label></th>
                                  <th><label>Duration To</label></th>
                                  <th><label>University</label></th>
                                  <th><label>Percentage</label></th>
				  <th><label>Reason Description</label></th>
                                  <!--<th><button type="button" onclick="addMore();" class="btn-add btn btn-default"><i class="fa fa-plus"></i></button></th>-->
                                </tr>   
                              </thead>
                              <tbody>
                                <tr class="odd countClass" >
				 
                                  <td><input placeholder="SSLC" name="degree[]" id="degree" class="form-control input-md" value="SSC" type="text"></td>
                                  <td> <input placeholder="Specialisation" name="specialisation[]" id="specialisation" value="Maths" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" name="edu_duration_from[]" id="edu_duration_from" class="form-control input-md datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-md  datepicker-dob trig"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" name="university[]" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" name="percentage[]" class="form-control input-md" type="text"></td>
				  <!--<td> <textarea name="reasonDesc[]"  class="form-control input-md" id="reasonDesc" rows="1" readonly></textarea></td>-->
				  
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input type="file" multiple="multiple" name="file_student_upload[0][]" id="PanPreview" >
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly>
				    </div>
				  </div></td>
				   
				  <!--<td><center><button type="button" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>-->
                                </tr>
				<tr class="countClass">
				  <td> <!--<input placeholder="HSC/Diploma" name="degree[]" id="degree" class="form-control input-md" type="text">-->
				      <select name="degree[]" id="degree" class="form-control selectpicker" data-size="10">
					<option disabled selected hidden>HSC/Diploma</option>
					<option value="HSC">HSC</option>
					<option value="Diploma">Diploma</option>
				      </select>
				  </td>
                                  <td> <input placeholder="Specialisation" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" name="edu_duration_from[]" onblur="checkDurationMonth();" id="edu_duration_from" class="form-control input-md datepicker-dob sec" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-md  datepicker-dob trig"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" name="university[]" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" name="percentage[]" class="form-control input-md" type="text"></td>
				 <!-- <td> <textarea name="reasonDesc[]"  class="form-control input-md" id="reasonDesc" rows="1" readonly></textarea></td>-->
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input  type="file" multiple="multiple" name="file_student_upload[1][]" id="file_student_upload">
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly >
				    </div>
				  </div></td>
				  
				</tr>
				<tr class="countClass">
				<td> <input placeholder="UG Degree" name="degree[]" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialisation" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" name="edu_duration_from[]" onblur="checkDurationMonth();" id="edu_duration_from" class="form-control input-md datepicker-dob third" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-md  datepicker-dob trig"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" name="university[]" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" name="percentage[]" class="form-control input-md" type="text"></td>
				 <!-- <td> <textarea name="reasonDesc[]"  class="form-control input-md" id="reasonDesc" rows="1" readonly></textarea></td>-->
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input  type="file" multiple="multiple" name="file_student_upload[2][]" id="file_student_upload">
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly >
				    </div>
				  </div></td>
				</tr>
				
				
				
<!--                                 <tr class="odd hide countClass" id="optionTemplate">-->
<!--                                  <td> <input placeholder="PG Degree" id="degree" class="form-control input-md" type="text"></td>-->
<!--                                  <td> <input placeholder="Specialisation" id="specialisation" class="form-control input-md" type="text"></td>-->
<!--                                  <td><span class='input-group date'><input type="text" onblur="checkDurationMonth($(this));" id="edu_duration_from" class="form-control input-md  input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>-->
<!--				  <td><span class='input-group date'><input type="text" id="edu_duration_to" class="form-control input-md  input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>-->
<!--                                  <td> <input placeholder="University" id="university" class="form-control input-md" type="text"></td>-->
<!--                                  <td> <input placeholder="Percentage" id="percentage" class="form-control input-md" type="text"></td>-->
<!--				  <!--<td> <textarea id="reasonDesc"  class="form-control input-md" rows="1" readonly></textarea></td>-->
<!--                                  <td>-->
<!--			  <div class="form-group">-->
<!--				    <div class="input-group">-->
<!--				      <span class="input-group-btn">-->
<!--					  <span class="btn btn-primary btn-file">-->
<!--					      Browse<input type="file"  id="file_student_upload" class="file_upload" onchange="fileAttachment1();" multiple>-->
<!--					  </span>-->
<!--				      </span>-->
<!--				      <input type="text" id="" value="" class="form-control file_name" readonly >-->
<!--				    </div>-->
<!--				    -->
<!--				  </div></td>-->
<!--				  <td><center><button type="button" onclick="removeButton($(this));" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>-->
<!--                                </tr>-->

			      <tr class="countClass">
				<td> <input placeholder="UG Degree" name="degree[]" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialisation" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" name="edu_duration_from[]" onblur="checkDurationMonth();" id="edu_duration_from" class="form-control input-md datepicker-dob fourth" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-md  datepicker-dob trig1"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" name="university[]" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" name="percentage[]" class="form-control input-md" type="text"></td>
				 <!-- <td> <textarea name="reasonDesc[]"  class="form-control input-md" id="reasonDesc" rows="1" readonly></textarea></td>-->
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input  type="file" multiple="multiple" name="file_student_upload[3][]" id="file_student_upload">
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly >
				    </div>
				  </div></td>
				</tr>
			      </tbody>
                            </table>
			  <!--<input placeholder="Educational_Gap_Year" size="55px" class="form-control input-md countEduYr" id="educational_gap_year2" type="hidden" >-->
			  <input id="secdate" value="" class="form-control input-md" type="hidden">
			  <input id="thirddate" value="" class="form-control input-md" type="hidden">
			  <input id="fourthdate" value="" class="form-control input-md" type="hidden">
                        </div>
                        </div>
			
			<div class="col-md-6">
                            <div class="form-group">
                                <h2 class="headingLine" id="employement">Employment Details <span style="color:#EB8B11">*</span></h2>
                            </div>                                                             
                            </div>

                        <div class="col-md-12">                            
                            <div class=""> 
                          <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th><label>Client Company</label></th>
                                  <th><label>Payroll Company</label></th>
                                  <th><label>Designation</label></th>
                                  <th><label>Duration From</label></th>
                                  <th><label>Duration To</label></th>
                                  <th><label>Location</label></th>
				  <th><label>Reason Description</label></th>
				  <th><label>File Upload</label></th>
                                  <th><button type="button" onclick="addMore1();" class="btn-add btn btn-default"><i class="fa fa-plus"></i></button></th>
				  <th><input type="hidden" name="employer_still" value="" id="numCnt"></th>
                                </tr>
                              </thead>
                              <tbody id="appenCnt">
                                <tr class="odd1 countClass1">
                                  <td> <input placeholder="Client Company" name="client_comp[]" id="client_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Payroll Company" name="payroll_comp[]" id="payroll_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Designation Company" name="designation[]" class="form-control input-md" id="designation" type="text" ></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" name="emp_duration_from[]" size="35" id="emp_duration_from" onblur="checkBeforeEmpDuration($(this));" class="form-control input-md table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder="" name="emp_duration_to[]" size="35" id="emp_duration_to" onblur="checkEndEmpDuration($(this));" class="form-control input-md table_input input-group datepicker-dob1 endVal"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="Location" name="location[]" class="form-control input-md" type="text"></td>
				  <td> <textarea name="empReasonDesc[]" id="empReasonDesc" class="form-control input-md" rows="1" disabled></textarea></td>
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input type="file" name="file_employee_upload[0][]" multiple="multiple" id="file_employee_upload" >
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly >
				    </div>
				  </div></td>
				  <td><center><!--<button type="button" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button>--></center></td>
                                </tr>
				
				 <tr class="odd1 countClass1">
                                  <td> <input placeholder="Client Company" name="client_comp[]" id="client_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Payroll Company" name="payroll_comp[]" id="payroll_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Designation Company" name="designation[]" class="form-control input-md" id="designation" type="text" ></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" name="emp_duration_from[]" size="35" id="emp_duration_from" onblur="checkEmpDurationMonth();" class="form-control input-md table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder="" name="emp_duration_to[]" size="35" id="emp_duration_to" onblur="checkEndEmpDuration($(this));" class="form-control input-md table_input input-group datepicker-dob1 endVal"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="Location" name="location[]" class="form-control input-md" type="text"></td>
				  <td> <textarea name="empReasonDesc[]" id="empReasonDesc" class="form-control input-md" rows="1" disabled></textarea></td>
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input type="file" name="file_employee_upload[1][]" multiple="multiple" id="file_employee_upload" >
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly >
				    </div>
				  </div></td>
				  <td><center><!--<button type="button" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button>--></center></td>
                                </tr>
				 
				  <tr class="odd1 countClass1">
                                  <td> <input placeholder="Client Company" name="client_comp[]" id="client_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Payroll Company" name="payroll_comp[]" id="payroll_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Designation Company" name="designation[]" class="form-control input-md" id="designation" type="text" ></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" name="emp_duration_from[]" size="35" id="emp_duration_from" onblur="checkEmpDurationMonth();" class="form-control input-md table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder="" name="emp_duration_to[]" size="35" id="emp_duration_to" onblur="checkEndEmpDuration($(this));" class="form-control input-md table_input input-group datepicker-dob1 endVal"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="Location" name="location[]" class="form-control input-md" type="text"></td>
				  <td> <textarea name="empReasonDesc[]" id="empReasonDesc" class="form-control input-md" rows="1" disabled></textarea></td>
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input type="file" name="file_employee_upload[2][]" multiple="multiple" id="file_employee_upload" >
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly >
				    </div>
				  </div></td>
				  <td><center><!--<button type="button" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button>--></center></td>
                                </tr>
				
                                 <tr class="odd1 hide countClass1" id="optionTemplate1">
                                  <td> <input placeholder="Client Company" id="client_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Payroll Company" id="payroll_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Designation Company" class="form-control input-md" id="designation" type="text" ></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" size="35" onblur="checkEmpDurationMonth();" id="emp_duration_from" class="form-control input-md table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder="" size="35" onblur="checkEndEmpDuration($(this));" id="emp_duration_to" class="form-control input-md table_input input-group datepicker-dob1 endVal"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="Location" id="location" class="form-control input-md" type="text"></td>
				  <td> <textarea id="empReasonDesc" class="form-control input-md" rows="1" readonly></textarea></td>
                                  
				  <!--<div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input type="file" multiple="multiple" id="file_employee_upload" name="file_employee_upload[0][]" >
					      Browse<input type="file" name="file_employee_upload1[]"  id="file_employee_upload" >
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control file_name" readonly>
				    </div>
				  </div></td>-->
				  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary addClassData btn-file ">
					      Browse<input type="file" multiple="multiple" id="file_employee_upload" >
					  </span>
				      </span>
				      <input type="text" id="filedata[]" value="" class="form-control" readonly >
				    </div>
				  </div>
				  </td>
				  <td><center><button type="button" onclick="removeButton1($(this));" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>
                                </tr>
                               
                              </tbody>
                            </table>
			  <input id="beforeVal" value="0" type="hidden" >
			  <input id="todayVal" value="0" type="hidden" >
			  <input id="employeeVal" value="0" type="hidden" >
			  <input id="present" type="hidden" value="<?php echo date('d-M-Y'); ?>">
                        </div>
                        </div>
			
			<div class="col-md-6">
			  <div class="row">
			    <!--<div class="col-md-6">
			  <div class="form-group">
			    <label>Career Gap in Before Employement</label>
			    <input class="form-control input-md countEmpBeforeYr" name="" type="text" placeholder="Team Member Name">
			  </div>
			  </div>-->
			  
			    <div class="col-md-6">
			      <div class="form-group">
			    <label>Educational Gap</label>
			    <input class="form-control input-md countEduYr" name="educational_gap_year" type="text" placeholder="Educational Gap" readonly>
			  </div>
			  </div>
			  <div class="form-group">
			    <div class="col-md-6">
			    <label>Career Gap</label>
			    <input class="form-control input-md countYr" name="career_gap_year" type="text" placeholder="Career Gap" readonly>
			  </div>
			    </div>
			  </div>
			</div>
			
                   <!--<div class="col-md-6 col-md-offset-4" style="padding-bottom: 15px;">
                            <input type="submit" name="save" value="Submit" class="btn btn-sm btn-success">
                    </div>-->
		    
		    <div class="col-md-6 col-md-offset-4" style="padding-bottom: 15px;">
		      <div class="row">
			<div class="col-md-4">
			  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Resume<input type="file" name="resume_upload" id="resume_upload"  multiple="multiple">
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly >
				    </div>
				  </div>
			</div>
			<div class="col-md-4">
			  <input type="submit" name="save" value="Submit" class="btn btn-sm btn-success">
			</div>
		      </div>
                    </div>
                            
                        </form>

        </div>
        <!-- Zozo Tabs End-->
   
<script type="text/javascript">
   $("#Preferedloc").chosen();
   $("#language").chosen();

//$(function () {
//    $('.datepicker').datepicker({
//	format: 'dd-mm-yyyy'
//    });
//});
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({format:'DD-MMM-YYYY hh:mm A'});
    });
</script>
<script>
    $(document).ready(function() {
      
      $('.notAllowType').keypress(function(event) {event.preventDefault();});
      
        $(".chzn-select").chosen();
        
        
        //datepicker();
        $('.datepicker-dob').datetimepicker({
	    format: 'DD-MMM-YYYY'
	});
	$('.datepicker-dob1').datetimepicker({
	    format: 'DD-MMM-YYYY',
	    showTodayButton:true,
	});
        datepicker1();
        datepicker2();
        $('#form_validation').bootstrapValidator({
            message: 'This value is not valid',
            excluded: [':disabled'],
            feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                candidate_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Name is required and can\'t be empty'
                        },
                         regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The full Name can consist of alphabetical characters and spaces only'
                    }
                    }
                },
		last_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Last Name is required and can\'t be empty'
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
                        message: 'Please Enter Valid Mobile number'
                    }
                    }
                },
                mail_id: {
		  validators: {
		    regexp: {
		      regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
		      message: 'The Email is not a valid email address'
                        },
			notEmpty: {
			  message: 'The  Email is required and can\'t be empty'
			  },
					//remote:{
					//    message: 'The Email is Already Exist',
					//    url: '<?php  echo site_url('talentcapitalctr/CheckEmailExist')?>',
					//    type: 'POST'
					//}
			      }
                },                
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
			   
                total_exp_year: {
                    validators: {
                        notEmpty: {
                            message: 'The Total Exp is required and can\'t be empty'
                        },
                    }
                },
		total_exp_month: {
                    validators: {
                        notEmpty: {
                            message: 'The Total Exp is required and can\'t be empty'
                        },
                    }
                },
                relevant_exp_year: {
                    validators: {
                        notEmpty: {
                            message: 'The Relevant Exp is required and can\'t be empty'
                        },
                    }
                },
		relevant_exp_month: {
                    validators: {
                        notEmpty: {
                            message: 'The Relevant Exp is required and can\'t be empty'
                        },
                    }
                },
                notice_period: {
                    validators: {
                        notEmpty: {
                            message: 'The Notice Peroid number is required and can\'t be empty'
                        },
                    }
                },
                current_ctc_lakhs: {
                    validators: {
                        notEmpty: {
                            message: 'The Current CTC is required and can\'t be empty'
                        },
                        
                    }
                },
		current_ctc_thousands: {
                    validators: {
                        notEmpty: {
                            message: 'The Current CTC is required and can\'t be empty'
                        },
                        
                    }
                },
                expected_ctc_lakhs: {
                    validators: {
                        notEmpty: {
                            message: 'The Expected CTC is required and can\'t be empty'
                        },
                    }
                },
		expected_ctc_thousands: {
                    validators: {
                        notEmpty: {
                            message: 'The Expected CTC is required and can\'t be empty'
                        },
                    }
                },
                day: {
                    validators: {
                        notEmpty: {
                            message: 'The Day  is required and can\'t be empty'
                        },
                    }
                },
                month: {
                    validators: {
                        notEmpty: {
                            message: 'The Month  is required and can\'t be empty'
                        },
                    }
                },
                year: {
                    validators: {
                        notEmpty: {
                            message: 'The Year  is required and can\'t be empty'
                        },
                    }
                },
                pan_card_no: {
                    validators: {
		    notEmpty: {
			message: 'The pan number is required and can\'t be empty'
		    },
		    regexp: {
                        regexp: /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/,
                       
                    },
		    stringLength: {
                        max: 10,
                        message: 'PAN Number contains only 10 Digit Numbers and CAPITAL Characters'
                    }
		   
		}
                    
                },
                pan_card_attach: {
                    validators: {
                        notEmpty: {
                            message: 'The PAN Card is required and can\'t be empty'
                        },
                    }
                },
                'language_known[]': {
                    validators: {
                        notEmpty: {
                            message: 'The Language Known number is required and can\'t be empty'
                        },
                    }
                },
                current_location: {
                    validators: {
                        notEmpty: {
                            message: 'The Current Location is required and can\'t be empty'
                        },
                    //    regexp: {
                    //    regexp: /^[a-z\s]+$/i,
                    //    message: 'The Current Location can consist of alphabetical characters and spaces only'
                    //}
                    }
                },
                'preferred_location[]': {
                    validators: {
                        notEmpty: {
                            message: 'The Prefered Location is required and can\'t be empty'
                        }
                    }
                },
                interview_timing: {
		  trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The Interview Timing is required and can\'t be empty'
                        },
                    }
                },
                //educational_gap_year: {
                //    validators: {
                //        notEmpty: {
                //            message: 'The educational GAP is required and can\'t be empty'
                //        },
                //    }
                //},
                //career_gap_year: {
                //    validators: {
                //        notEmpty: {
                //            message: 'The Carrer GAP is required and can\'t be empty'
                //        },
                //    }
                //},
                team_size_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Team Member name is required and can\'t be empty'
                        },
                         regexp: {
			    regexp: /^[a-z\s]+$/i,
			    message: 'The Team Member name can consist of alphabetical characters and spaces only'
			}
                    }
                },
                team_contact_no: {
                    validators: {
                        notEmpty: {
                            message: 'The email number is required and can\'t be empty'
                        },
                        regexp: {
                        regexp: /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/,
                        message: 'Contact Number contains only 10 Digit Numbers'
                    }
                    }
                },
                'client_comp[]': {
                    group: 'td',
                    validators: {
                        notEmpty: {
                            message: 'The Client Company is required and can\'t be empty'
                        },
                    }
                },                
                'payroll_comp[]': {
                    group: 'td',
                    validators: {
                        notEmpty: {
                            message: 'The Payroll Company is required and can\'t be empty'
                        },
                    }
                },
                'designation[]': {
                    group: 'td',
                    validators: {
                        notEmpty: {
                            message: 'The Desigantion is required and can\'t be empty'
                        },
                    }
                },
                'emp_duration_from[]': {
                    group: 'td',
                    trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The Emp Duration From is required and can\'t be empty'
                        },
                    }
                },
                'emp_duration_to[]': {
                    group: 'td',
                    trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The Emp Duration To is required and can\'t be empty'
                        },
                    }
                },
                'location[]': {
                    group: 'td',
                    validators: {
                        notEmpty: {
                            message: 'The Location is required and can\'t be empty'
                        },
                    }
                },
                'degree[]': {
                    group: 'td',
		    //trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The Degree is required and can\'t be empty'
                        },
                    }
                },                
                //'specialisation[]': {
                //    group: 'td',
                //    validators: {
                //        notEmpty: {
                //            message: 'The Specialzation is required and can\'t be empty'
                //        },
                //    }
                //},
                'edu_duration_from[]': {
                    group: 'td',
                    //trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The Edu Durtation From is required and can\'t be empty'
                        },
                    }
                },
                'edu_duration_to[]': {
                    group: 'td',
                    //trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The Edu Duration To is required and can\'t be empty'
                        },
                    }
                },
                'university[]': {
                    group: 'td',
                    validators: {
                        notEmpty: {
                            message: 'The University is required and can\'t be empty'
                        },
                    }
                },
                'percentage[]': {
                    group: 'td',
                    validators: {
                        notEmpty: {
                            message: 'The Percentage is required and can\'t be empty'
                        },
			regexp: {
			  regexp: /^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$/,
			  message: 'Please Enter Valid Format'
			},
                    }
                },
		'file_employee_upload[0][]': {
                validators: {
                    notEmpty: {
                        message: 'Please select files'
                    },
	          }
		},
				
				


//		'reasonDesc[]': {
//                    group: 'td',
//                    validators: {
//                        notEmpty: {
//                            message: 'The Percentage is required and can\'t be empty'
//                        },
//                    }
//                },
//		'empReasonDesc[]': {
//                    group: 'td',
//                    validators: {
//                        notEmpty: {
//                            message: 'The Percentage is required and can\'t be empty'
//                        },
//                    }
//                },
            }
        });        
    });
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
   
  function checkDurationMonth() {
    var sum = 0;
    $('.countClass').each(function(){
      var first = $(this).find('[name="edu_duration_to[]"]').val();
      if (first=="") {
	first = $(this).next('tr.countClass').find("[name='edu_duration_from[]']").val();
      }
      var secon = $(this).next('tr.countClass').find("[name='edu_duration_from[]']").val();
      var prevRowNewVal = moment.parseZone(first, 'DD MMM YYYY').format();
      var thisNewValue = moment.parseZone(secon, 'DD MMM YYYY').format();
      if (prevRowNewVal=='Invalid date') {
	prevRowNewVal=0;
      }
      var a = moment(prevRowNewVal,'YYYY/MM/DD');
      var b = moment(thisNewValue,'YYYY/MM/DD');
      var diffDays = b.diff(a, 'days');
      if (diffDays >= 180) {
	sum+=diffDays;
      }
    });
    var call = countingCareerdays(sum);
  }
  
  function countingCareerdays(sum) {
    var y = 365;
    var y2 = 30;
    var remainder = sum % y;
    var casio = remainder % y2;
    year = (sum - remainder) / y;
    month = (remainder - casio) / y2;
    //var result = + year +" Year " + month + " Month " + casio + " Day" ;
    var result = + year +"Year " + month + "Month ";
    $('.countEduYr').val(result);
  }
  
  function checkEmpDurationMonth() {
    var sum = 0;
    $('.countClass1').each(function(){
      var first = $(this).find('[name="emp_duration_to[]"]').val();
      if (first=="") {
	first = $(this).next('tr.countClass1').find("[name='emp_duration_from[]']").val();
      }
     
      var secon = $(this).next('tr.countClass1').find("[name='emp_duration_from[]']").val();
      
      var prevRowNewVal = moment.parseZone(first, 'DD MMM YYYY').format();
      var thisNewValue = moment.parseZone(secon, 'DD MMM YYYY').format();
      if (prevRowNewVal=='Invalid date') {
	prevRowNewVal=0;
      }
      var a = moment(prevRowNewVal,'YYYY/MM/DD');
      var b = moment(thisNewValue,'YYYY/MM/DD');
      var diffDays = b.diff(a, 'days');
      //alert(diffDays);
      if (diffDays >= 1) {
	sum+=diffDays;
      }
      
      if (diffDays >= 60) {
	$(this).find('[id="empReasonDesc"]').prop("readonly", false);
      }else{
	$(this).find('[id="empReasonDesc"]').prop("readonly", true);
      }
    });
    $('#employeeVal').val(sum);
    var call = countingdays(sum,'employee');
  }
  
  function checkEndEmpDuration($this){
    $('.countClass1:visible').each(function(){
      
        var dd = $('.endVal').filter(function() { return this.value != ''; }).last().val();
	//var ss = $(this).prev('tr:first').find('td [name="emp_duration_to[]"]').val();
	 var today = new Date();
	 //var prevRowEmpNewVal = moment.parseZone(todayVal, 'DD MMM YYYY').format();
	 var cc = today.toLocaleFormat('%d-%b-%Y');
	 
	 var prevRowEmpNewVal = moment.parseZone(dd, 'DD MMM YYYY').format();
	 var thisNewEmpValue = moment.parseZone(cc, 'DD MMM YYYY').format();
	
	 var a = moment(prevRowEmpNewVal,'YYYY/MM/DD');
	 var b = moment(thisNewEmpValue,'YYYY/MM/DD');
	 var diffDays = b.diff(a, 'days');
	 console.log(diffDays);
	 //alert(diffDays);
	var sum = diffDays;
	$('#todayVal').val(sum);
	var call = countingdays(sum,'overall');
    })
  }
  
  function checkBeforeEmpDuration($this) {
    var $row = $this.parents('.odd1');
    var prevEmpRowVal = $(".countClass:visible:last").find("[name='edu_duration_to[]']").val();
    if (prevEmpRowVal=="") {
      var prevEmpRowVal = $(".countClass:visible:nth-last-child(2)").find("[name='edu_duration_to[]']").val();
    }
    
    var thisEmpValue = $this.val();
    
    if (prevEmpRowVal=="") {
      var prevEmpRowVal = thisEmpValue;
    }
    
    var prevRowEmpNewVal = moment.parseZone(prevEmpRowVal, 'DD MMM YYYY').format();
    var thisNewEmpValue = moment.parseZone(thisEmpValue, 'DD MMM YYYY').format();
    
    var a = moment(prevRowEmpNewVal,'YYYY/MM/DD');
    var b = moment(thisNewEmpValue,'YYYY/MM/DD');
    var diffDays = b.diff(a, 'days');
    if (diffDays >= 1) {
    var sum = diffDays;
    $('#beforeVal').val(sum);
     var call = countingdays(sum,'before');
    }
    if (diffDays >= 60) {
      $row.find('[id="empReasonDesc"]').prop("readonly", false);
    }else{
      $row.find('[id="empReasonDesc"]').prop("readonly", true);
    }
     
  }
  
  function countingdays(sum,sum1) {
    var beforeVal = $('#beforeVal').val();
    var todayVal = $('#todayVal').val();
    var employeeVal = $('#employeeVal').val();
    //if (sum1 == 'employee' && beforeVal != '' || sum1 == 'overall') {
    //sum = parseInt(beforeVal) +  parseInt(todayVal) + parseInt(employeeVal);
    //}
    
    if (beforeVal=='') {
      var beforeVal = 0;
      sum = parseInt(beforeVal) +  parseInt(todayVal) + parseInt(employeeVal);
    }else {
      sum = parseInt(beforeVal) +  parseInt(todayVal) + parseInt(employeeVal);
    }
    
    var y = 365;
    var y2 = 30;
    var remainder = sum % y;
    var casio = remainder % y2;
    year = (sum - remainder) / y;
    month = (remainder - casio) / y2;
    
    //var result = + year +" Year " + month + " Month " + casio + " Day" ;
    var result = + year +"Year " + month + "Month ";
     $('.countYr').val(result);
  }
  
  $(document).ready(function() {

    $(".trig").blur( function () {
       $("#emp_duration_from").trigger('blur');
       $("#emp_duration_to").trigger('blur');
    });
    $(".trig1").blur( function () {
       $("#emp_duration_from").trigger('blur');
       $("#emp_duration_to").trigger('blur');
    });

  });
    
    function addMore() {
      $Counter = $('.countClass').length-2;
      $Counter +=1;
      //alert($Counter);
      if ($Counter==4) {
	//alert("yes");
      }
      else {
        var $template = $('#optionTemplate')
        $clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
        $clone.find('[id="degree"]').attr('name', 'degree[]');
        $clone.find('[id="specialisation"]').attr('name', 'specialisation[]');
        $clone.find('[id="edu_duration_from"]').attr('name', 'edu_duration_from[]');
        $clone.find('[id="edu_duration_to"]').attr('name', 'edu_duration_to[]');
        $clone.find('[id="university"]').attr('name', 'university[]');
        $clone.find('[id="percentage"]').attr('name', 'percentage[]');
	$clone.find('[id="reasonDesc"]').attr('name', 'reasonDesc[]');
	$clone.find('[id="file_student_upload"]').attr('name', 'file_student_upload['+$Counter+'][]');
	getSelectImage1();
	
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
	
	$name   = $clone.find('[name="reasonDesc[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
	
	$name   = $clone.find('[name="file_student_upload[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
        datepicker2();
      }
    }
    function removeButton($this) {
        var $row = $this.parents('.odd');
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="degree[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="specialisation[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="edu_duration_from[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="edu_duration_to[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="university[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="percentage[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="reasonDesc[]"]'));
        $row.remove(); 
    }
    
    function addMore1() {
      $Counter = $('.countClass1').length-2;
      $Counter +=1;
        var $template = $('#optionTemplate1')
        $clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
        $clone.find('[id="client_comp"]').attr('name', 'client_comp[]');        
        $clone.find('[id="payroll_comp"]').attr('name', 'payroll_comp[]');
        $clone.find('[id="designation"]').attr('name', 'designation[]');
        $clone.find('[id="emp_duration_from"]').attr('name', 'emp_duration_from[]');
        $clone.find('[id="emp_duration_to"]').attr('name', 'emp_duration_to[]');
        $clone.find('[id="location"]').attr('name', 'location[]');
	$clone.find('[id="empReasonDesc"]').attr('name', 'empReasonDesc[]');
	$clone.find('[id="file_employee_upload"]').attr('name', 'file_employee_upload['+$Counter+'][]');
	//$clone.find('[id="filedata"]').attr('name', 'filedata['+$Counter+'][]');
        getSelectImage();
	$name   = $clone.find('[name="client_comp[]"]');
	$('#form_validation').bootstrapValidator('removeField', $name);
        
	$name   = $clone.find('[name="payroll_comp[]"]');
	$('#form_validation').bootstrapValidator('removeField', $name);
        
	$name   = $clone.find('[name="designation[]"]');
	$('#form_validation').bootstrapValidator('removeField', $name);        
        
        $name   = $clone.find('[name="emp_duration_from[]"]');
	$('#form_validation').bootstrapValidator('removeField', $name);
        
        $name   = $clone.find('[name="emp_duration_to[]"]');
	$('#form_validation').bootstrapValidator('removeField', $name);
        
        $name   = $clone.find('[name="location[]"]');
	$('#form_validation').bootstrapValidator('removeField', $name);
	
	$name   = $clone.find('[name="empReasonDesc[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
	
	$name   = $clone.find('[name="file_employee_upload[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
	
	//getting appended row count
	var result=$('#appenCnt tr').length-1;
	$("#numCnt").val(result-3);
	
        datepicker1();
    }
    function getSelectImage(){
	$("input[id='file_employee_upload']").change(function() {
	    var names = [];
	    for (var i = 0; i < $(this).get(0).files.length; ++i) {
	    names.push($(this).get(0).files[i].name);
	    }
	    var inputId=$(this).parents('.input-group-btn:first').next('input');
	 
	    if(names.length>1)
	    $(inputId).val(names.length+' files selected');
	    else
	    $(inputId).val(names);
	    
	});
    }
    
        function getSelectImage1(){
	$("input[id='file_student_upload']").change(function() {
	    var names = [];
	    for (var i = 0; i < $(this).get(0).files.length; ++i) {
	    names.push($(this).get(0).files[i].name);
	    }
	    var inputId=$(this).parents('.input-group-btn:first').next('input');
	   
	    if(names.length>1)
	    $(inputId).val(names.length+' files selected');
	    else
	    $(inputId).val(names);
	 
	});
    }
    
    function removeButton1($this) {
        var $row = $this.parents('.odd1');
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="client_comp[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="payroll_comp[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="designation[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="emp_duration_from[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="emp_duration_to[]"]'));
	 $('#form_validation').bootstrapValidator('removeField', $row.find('input[name="location[]"]'));
        $row.remove();
	
	//getting appended row count
	var rowCount=$('#appenCnt tr').length-1;
	$("#numCnt").val(rowCount-3);
    }    
    function panAttachment(){
        var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("PanPreview").files[0]);
	oFReader.onload = function (oFREvent) {
	  var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
	};
    }
    
//    function fileAttachment(){
//        var oFReader = new FileReader();
//	oFReader.readAsDataURL(document.getElementById("file_employee_upload").files[0]);
//	oFReader.onload = function (oFREvent) {
//	  var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
//	};
//    }
    
//    function fileAttachment1(){
//        var oFReader = new FileReader();
//	oFReader.readAsDataURL(document.getElementById("file_student_upload").files[0]);
//	oFReader.onload = function (oFREvent) {
//	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
//	};
//    }
//    function fileAttachment2(){
//        var oFReader = new FileReader();
//	oFReader.readAsDataURL(document.getElementById("file_student_upload").files[0]);
//	oFReader.onload = function (oFREvent) {
//	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
//	};
//    }
//    function fileAttachment3(){
//        var oFReader = new FileReader();
//	oFReader.readAsDataURL(document.getElementById("file_student_upload").files[0]);
//	oFReader.onload = function (oFREvent) {
//	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
//	};
//    }
    

          function profilePic(){
	  var oFReader = new FileReader();
	  oFReader.readAsDataURL(document.getElementById("ProfileImgPreview").files[0]);
	  oFReader.onload = function (oFREvent) {
	       var data=document.getElementById("ProImgPreview").src = oFREvent.target.result;
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
    $(document).ready(function() {
   //fileNameMapping();
 });
// function fileNameMapping(){
//  //alert('test');
//  $('#form_validation').on('change', '.file_upload', function() {
//   var $row=$(this).closest("tr");  
//   var imgpath=$(this).val();
//   //console.log(imgpath);
//   
//   if (!imgpath==""){
//	var img=this.files[0].size;
//	var name=this.files[0].name;
//	//console.log(name);
//	var imgsize=img/1024;
//	//console.log(this.files);
//	//console.log(this.files[0]);
//	imgsize=Math.round(imgsize);
//	imgsize=imgsize;
//	$row.find(".file_name").val(name);
//      // readURL(this);
//      }
//    });
// }


$(document).ready(function(){
      $('.lcs_check').lc_switch('Y','N');
      $('.lcs_check').lc_switch();
      $('.lcs_wrap').delegate('#switch_YN', 'lcs-on', function() {
	$('input[id="Switch_Val"]').val('Y');
	$("#checkingYN").hide();
      });
      $('.lcs_wrap').delegate('#switch_YN', 'lcs-off', function() {
	  $('input[id="Switch_Val"]').val('N');
	  $("#checkingYN").show();
      });
  });
 
 $(function(){
	var check = $("#Switch_Val").val();
	if (check == 'N') {
	    $("#switch_YN").trigger('click');
	}
	$name1=$('[name="degree[]"]:last');
	$edu_duration_from=$('[name="edu_duration_from[]"]:last');
	$edu_duration_to=$('[name="edu_duration_to[]"]:last');
	$university=$('[name="university[]"]:last');
	$percentage=$('[name="percentage[]"]:last');
    $('#form_validation').bootstrapValidator('removeField', $name1);
    $('#form_validation').bootstrapValidator('removeField', $edu_duration_from);
    $('#form_validation').bootstrapValidator('removeField', $edu_duration_to);
    $('#form_validation').bootstrapValidator('removeField', $university);
    $('#form_validation').bootstrapValidator('removeField', $percentage);
    
    $('[name="degree[]"]:last').removeAttr("data-bv-field");
    $('[name="edu_duration_to[]"]:last').removeAttr("data-bv-field");
    $('[name="edu_duration_from[]"]:last').removeAttr("data-bv-field");
    $('[name="university[]"]:last').removeAttr("data-bv-field");
    $('[name="percentage[]"]:last').removeAttr("data-bv-field");
    })
 
 
 $(function(){
	var check = $("#Switch_Val").val();
	if (check == 'N') {
	    $("#switch_YN").trigger('click');
	}
	$Company_name=$('[name="client_comp[]"]:last');
	$payroll_comp=$('[name="payroll_comp[]"]:last');
	$Designation=$('[name="designation[]"]:last');
	$edu_duration_from=$('[name="emp_duration_from[]"]:last');
	$edu_duration_to=$('[name="emp_duration_to[]"]:last');
	$Location=$('[name="location[]"]:last');
	
	$Company_name1=$(".countClass1:visible:nth-last-child(3)").find('[name="client_comp[]"]');
	$payroll_comp1=$(".countClass1:visible:nth-last-child(3)").find('[name="payroll_comp[]"]');
	$Designation1=$(".countClass1:visible:nth-last-child(3)").find('[name="designation[]"]');
	$edu_duration_from1=$(".countClass1:visible:nth-last-child(3)").find('[name="emp_duration_from[]"]');
	$edu_duration_to1=$(".countClass1:visible:nth-last-child(3)").find('[name="emp_duration_to[]"]');
	$Location1=$(".countClass1:visible:nth-last-child(3)").find('[name="location[]"]');
	
    $('#form_validation').bootstrapValidator('removeField', $Company_name);
    $('#form_validation').bootstrapValidator('removeField', $payroll_comp);
    $('#form_validation').bootstrapValidator('removeField', $Designation);
    $('#form_validation').bootstrapValidator('removeField', $edu_duration_from);
    $('#form_validation').bootstrapValidator('removeField', $edu_duration_to);
    $('#form_validation').bootstrapValidator('removeField', $Location);
    
    $('#form_validation').bootstrapValidator('removeField', $Company_name1);
    $('#form_validation').bootstrapValidator('removeField', $payroll_comp1);
    $('#form_validation').bootstrapValidator('removeField', $Designation1);
    $('#form_validation').bootstrapValidator('removeField', $edu_duration_from1);
    $('#form_validation').bootstrapValidator('removeField', $edu_duration_to1);
    $('#form_validation').bootstrapValidator('removeField', $Location1);
    
    $('[name="client_comp[]"]:last').removeAttr("data-bv-field");
    $('[name="payroll_comp[]"]:last').removeAttr("data-bv-field");
    $('[name="designation[]"]:last').removeAttr("data-bv-field");
    $('[name="emp_duration_from[]"]:last').removeAttr("data-bv-field");
    $('[name="emp_duration_to[]"]:last').removeAttr("data-bv-field");
     $('[name="location[]"]:last').removeAttr("data-bv-field");
     
      $(".countClass1:visible:nth-last-child(3)").find('[name="client_comp[]"]').removeAttr("data-bv-field");
    $(".countClass1:visible:nth-last-child(3)").find('[name="payroll_comp[]"]').removeAttr("data-bv-field");
    $(".countClass1:visible:nth-last-child(3)").find('[name="designation[]"]').removeAttr("data-bv-field");
   $(".countClass1:visible:nth-last-child(3)").find('[name="emp_duration_from[]"]').removeAttr("data-bv-field");
    $(".countClass1:visible:nth-last-child(3)").find('[name="emp_duration_to[]"]').removeAttr("data-bv-field");
    $(".countClass1:visible:nth-last-child(3)").find('[name="location[]"]').removeAttr("data-bv-field");
    })
 
  function getServingPeriod($this){
    var CurrentVal = $this.val();
    if (CurrentVal == 'ServingPeriod') {
      $('.serveP').removeClass('hide');
    }else{
      $('.serveP').addClass('hide');
    }
  }
  
  function getPresentVal($this){
    var CurrDate = $('#present').val();
    $this.parents('.input-group').find('input').val(CurrDate);
    $this.parents('.has-feedback').find('.datepicker-dob1').trigger('blur');    
  }
    
</script>

