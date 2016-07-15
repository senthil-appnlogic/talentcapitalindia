<?php
$CandMail = $this->uri->segment(4);
?>
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

</style>
<div  class="container" style="padding-top: 80px;">
    <center>
        <a class="button mobilesize" href="#candidate">Candidate Details</a>&nbsp;&nbsp;
	<a class="button mobilesize" href="#team">Team size</a>&nbsp;&nbsp;
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
                           
                            <div class="form-group">
                              <h2 class="headingLine" id="candidate">Candidate Details</h2>
                            </div>
                            
                            <div class="form-group">
                              <label>Hiring Partner Code</label>
                                <input class="form-control input-md" value="<?php echo $Vcode;?>" name="vendor_code" type="text" placeholder="code" readonly="">
                            </div>
                            
                            <div class="form-group">
                              <label>Hiring Partner Name</label>
                                <input class="form-control input-md" value="<?php echo $vendorName[0]['name'];?>" readonly  name="" type="text" placeholder="Name">
                            </div>
			     <div class="form-group">
                              <label>First Name</label>
                                <input class="form-control input-md" name="candidate_name" type="text" placeholder="First Name">
                            </div>
			    <div class="form-group">
                              <label>Middle Name</label>
                                <input class="form-control input-md" name="middle_name" type="text" placeholder="Middle Name">
                            </div>
			    <div class="form-group">
                              <label>Last Name</label>
                                <input class="form-control input-md" name="last_name" type="text" placeholder="Last Name">
                            </div>

			    <div class="form-group">
                              <label>Password</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
			    
			    <div class="form-group">
                              <label>Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
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
                                <input class="form-control input-md" value="<?php echo $getApplicantDetails[0]['mobile_number'];?>" name="mobile_number" type="text" placeholder="Number" >
                            </div>
                            <div class="form-group">
                                <label>Email ID <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" value="<?php echo $CandMail;?>" name="mail_id" type="text" placeholder="Email" readonly>
                            </div>
                            <!--<div class="form-group">-->
                            <!--    <label>Skills <span style="color:#EB8B11">*</span></label>-->
                            <!--    <select multiple class="form-control chzn-select input-sm" name="skills[]">-->
                            <!--      <option>C</option>-->
                            <!--      <option>C++</option>-->
                            <!--      <option>Java</option>-->
                            <!--      <option>Dot Net</option>-->
                            <!--      <option>C#</option>-->
                            <!--      <option>PHP</option>-->
                            <!--      <option>Python</option>-->
                            <!--      <option>Perl</option>-->
                            <!--      <option>Ruby</option>-->
                            <!--      <option>Javascript</option>-->
                            <!--      <option>SQL</option>-->
                            <!--    </select>-->
                            <!--</div>-->
                            
			    
			     
			    <div class="form-group">
                                <label>Primary Skills <span style="color:#EB8B11">*</span></label>
                                <select multiple class="form-control chzn-select input-sm" onchange="primaryChange($(this))" name="skills[]">
                                  <option></option>
				  <?php
				  foreach ($skills as $row)
				  {?>
				  <option value="<?php echo $row['skill']; ?>"><?php echo $row['skill']; ?></option>
				  <?php } ?>
				  <option value="Others">Others</option>
                                </select>
                            </div>
			      <div class="form-group primary hide">
                                <label>Other Skills<span style="color:#EB8B11">*</span></label>
                                <input class="form-control primaryName input-md" value="<?php echo $getApplicantDetails[0]['primary_other_skils'];?>" name="" type="text" placeholder="primary other skils">
                              </div>
			      <div class="form-group">
                                <label>Secondary Skills <span style="color:#EB8B11">*</span></label>
                                <select multiple class="form-control chzn-select input-sm" onchange="secondaryChange($(this))" name="SecondarySkills[]">
                                  <option></option>
				  <?php
				  foreach ($skills as $row)
				  {?>
				  <option value="<?php echo $row['skill']; ?>"><?php echo $row['skill']; ?></option>
				  <?php } ?>
				  <option value="Others">Others</option>
                                </select>
                            </div>
			      <div class="form-group secondary hide" >
                                <label>Other Skills<span style="color:#EB8B11">*</span></label>
                                <input class="form-control secondaryName input-md" value="<?php echo $getApplicantDetails[0]['secondary_other_skils'];?>" name="" type="text" placeholder="secondary other skils">
                            </div>
			      <div class="">
                                <label>Total Experience</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="total_exp_year" class="form-control">
                                     <option disabled selected hidden>In Years</option>
                                    <option value="1years">1 </option>
                                    <option value="2years">2 </option>
                                    <option value="3years">3 </option>
                                    <option value="4years">4 </option>
                                    <option value="5years">5 </option>
                                    <option value="6years">6 </option>
                                    <option value="7years">7 </option>
                                    <option value="8years">8 </option>
                                    <option value="9years">9 </option>
                                    <option value="10years">10 </option>
                                    <option value="11years">11 </option>
                                    <option value="12years">12 </option>
                                    <option value="12years">13 </option>
                                    <option value="14years">14 </option>
                                    <option value="15years">15 </option>
                                    <option value="16years">16 </option>
                                    <option value="17years">17 </option>
                                    <option value="18years">18 </option>
                                    <option value="19years">19 </option>
                                    <option value="20years">20 </option>
                                    <option value="21years">21 </option>
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="total_exp_month" class="form-control">
                                    <option disabled selected hidden>In Months</option>
				    <option value="0months">0 </option>
                                    <option value="1months">1 </option>
                                    <option value="2months">2 </option>
                                    <option value="3months">3 </option>
                                    <option value="4months">4 </option>
                                    <option value="5months">5 </option>
                                    <option value="6months">6 </option>
                                    <option value="7months">7 </option>
                                    <option value="8months">8 </option>
                                    <option value="9months">9 </option>
                                    <option value="10months">10 </option>
                                    <option value="11months">11 </option>
                                  </select>
                                </div>
                                 </div>
                            </div>

                            <!--<div class="form-group">
                              <label>Relevant Exp</label>
                                <input class="form-control input-md" name="relevant_exp" type="text" placeholder="Relevant Exp">
                            </div>-->
			    
			      <div class="">
                                <label>Relevant Exp</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="relevant_exp_year" class="form-control">
                                     <option disabled selected hidden>In Years</option>
                                    <option value="1years">1 </option>
                                    <option value="2years">2 </option>
                                    <option value="3years">3 </option>
                                    <option value="4years">4 </option>
                                    <option value="5years">5 </option>
                                    <option value="6years">6 </option>
                                    <option value="7years">7 </option>
                                    <option value="8years">8 </option>
                                    <option value="9years">9 </option>
                                    <option value="10years">10 </option>
                                    <option value="11years">11 </option>
                                    <option value="12years">12 </option>
                                    <option value="12years">13 </option>
                                    <option value="14years">14 </option>
                                    <option value="15years">15 </option>
                                    <option value="16years">16 </option>
                                    <option value="17years">17 </option>
                                    <option value="18years">18 </option>
                                    <option value="19years">19 </option>
                                    <option value="20years">20 </option>
                                    <option value="21years">21 </option>
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="relevant_exp_month" class="form-control">
                                    <option disabled selected hidden>In Months</option>
				    <option value="0months">0 </option>
                                    <option value="1months">1 </option>
                                    <option value="2months">2 </option>
                                    <option value="3months">3 </option>
                                    <option value="4months">4 </option>
                                    <option value="5months">5 </option>
                                    <option value="6months">6 </option>
                                    <option value="7months">7</option>
                                    <option value="8months">8 </option>
                                    <option value="9months">9 </option>
                                    <option value="10months">10 </option>
                                    <option value="11months">11 </option>
                                  </select>
                                </div>
                                 </div>
                            </div>

                           
			    <div class="">
                                <label>Notice Period</label>
                                
				  <div class="form-group">
				    <select name="notice_period" class="form-control">
				       <option disabled selected hidden>Select</option>
				       <option value="Immediate">Immediate</option>
					<option value="7">7 Days</option>
					<option value="15">15 Days</option>
					<option value="30">30 Days</option>
					<option value="45">45 Days</option>
					<option value="60">60 Days</option>
					<option value="90++">90 Days & Above</option>
				     </select>
				  </div>
				
			    </div>
			    
			    
			    
                          <!--  <div class="form-group">
                                <label>Current CTC <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="current_ctc" type="text" placeholder="Current CTC">
                            </div>-->
			      <div class="">
                                <label>Current CTC</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="current_ctc_lakhs" class="form-control">
                                     <option disabled selected hidden>In Lakhs</option>
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
                                  <select name="current_ctc_thousands" class="form-control">
                                    <option disabled selected hidden>In Thousands</option>
				    <option value="5">5 </option>
                                    <option value="10">10 </option>
                                    <option value="15">15 </option>
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

                           <!-- <div class="form-group">
                                <label>Expected CTC <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="expected_ctc" type="text" placeholder="Expected CTC">
                            </div>-->
			    
			     <!--<div class="form-group">
			      <label>Expected CTC</label>
				    <select name="expected_ctc" class="form-control">
				      <option selected>Expected CTC</option>
				      <option value="100000">100000-200000</option>
				      <option value="200000">200000-300000</option>
				      <option value="300000">300000-400000</option>
				      <option value="400000">400000-500000</option>
				      <option value="500000">500000-600000</option>
				      <option value="600000">600000-700000</option>
				      <option value="700000">700000-800000</option>
				      <option value="800000">800000 Above</option>
				     </select>
			      </div>-->
			      <div class="">
                                <label>Expected CTC</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="expected_ctc_lakhs" class="form-control">
                                     <option disabled selected hidden>In Lakhs</option>
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
                                  <select name="expected_ctc_thousands" class="form-control">
                                    <option disabled selected hidden>In Thousands</option>
				    <option value="5">5 </option>
                                    <option value="10">10 </option>
                                    <option value="15">15 </option>
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
                                <label>Date Of Birth</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="day" class="form-control">
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
                                  <select name="month" class="form-control">
                                    <option disabled selected hidden>Month</option>
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
                                    <option disabled selected hidden>Year</option>
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
                                <label>Language Known</label>
                                <select multiple class="form-control chzn-select input-sm" name="language_known[]" id="language">
                                    <?php
					foreach ($language as $row)
					{?>
					<option value="<?php echo $row['language']; ?>"><?php echo $row['language']; ?></option>
				    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Current Location</label>
                                <!--<input class="form-control input-md" name="current_location" type="text" placeholder="Current Location">-->
                                <select name="current_location" class="form-control">
				  <option disabled selected hidden>Please Select Current Location</option>
				  <?php
				  foreach ($Location as $row)
				  {?>
				  <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
				  <?php } ?>
				</select>
                            </div>
                            <div class="form-group">
                                <label>Perfered Location</label>
                                <!--<input class="form-control input-md" name="preferred_location" type="text" placeholder="Perfered Location">-->
                                <select multiple name="preferred_location[]" class="form-control" id="Preferedloc">
				  <option></option>
				  <?php
				  foreach ($Location as $row)
				  {?>
				  <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
				  <?php } ?>
				</select>
                            </div>
                            <div class="form-group">
                              <label>Interview Timing</label>
                                <input class="form-control input-md" name="interview_timing" id="datetimepicker1" type="text" placeholder="Interview Timing">
                            </div>
                            <!--<div class="form-group">
                                <label>Educational Gap(in years)</label>
                                <input class="form-control input-md" name="educational_gap_year" type="text" placeholder="Educational Gap(in years)">
                            </div>-->
			      <div class="">
                                <label>Educational Gap(in years)</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="educational_gap_year" class="form-control">
                                     <option disabled selected hidden>In Years</option>
				    <option value="0years">0 </option>
                                    <option value="1years">1 </option>
                                    <option value="2years">2 </option>
                                    <option value="3years">3 </option>
                                    <option value="4years">4 </option>
                                    <option value="5years">5 </option>
                                    <option value="6years">6 </option>
                                    <option value="7years">7 </option>
                                    <option value="8years">8 </option>
                                    <option value="9years">9 </option>
                                    <option value="10years">10 </option>
                                    
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="educational_gap_month" class="form-control">
                                    <option disabled selected hidden>In Months</option>
				    <option value="0months">0 </option>
                                    <option value="1months">1 </option>
                                    <option value="2months">2 </option>
                                    <option value="3months">3 </option>
                                    <option value="4months">4 </option>
                                    <option value="5months">5 </option>
                                    <option value="6months">6 </option>
                                    <option value="7months">7 </option>
                                    <option value="8months">8 </option>
                                    <option value="9months">9 </option>
                                    <option value="10months">10 </option>
                                    <option value="11months">11 </option>
                                  </select>
                                </div>
                                 </div>
                            </div>

                            <!--<div class="form-group">
                                <label>Career Gap(in years)</label>
                                <input class="form-control input-md" name="career_gap_year" type="text" placeholder="Year">
                            </div>-->
			      <div class="">
                                <label>Career Gap(in years)</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="career_gap_year" class="form-control">
                                     <option disabled selected hidden>In Years</option>
				    <option value="0years">0 </option>
                                    <option value="1years">1 </option>
                                    <option value="2years">2 </option>
                                    <option value="3years">3 </option>
                                    <option value="4years">4 </option>
                                    <option value="5years">5 </option>
                                    <option value="6years">6 </option>
                                    <option value="7years">7 </option>
                                    <option value="8years">8 </option>
                                    <option value="9years">9 </option>
                                    <option value="10years">10 </option>
                                   
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="career_gap_month" class="form-control">
                                    <option disabled selected hidden>In Months</option>
				    <option value="0months">0 </option>
                                    <option value="1months">1 </option>
                                    <option value="2months">2 </option>
                                    <option value="3months">3 </option>
                                    <option value="4months">4 </option>
                                    <option value="5months">5 </option>
                                    <option value="6months">6 </option>
                                    <option value="7months">7</option>
                                    <option value="8months">8 </option>
                                    <option value="9months">9 </option>
                                    <option value="10months">10 </option>
                                    <option value="11months">11 </option>
                                  </select>
                                </div>
                                 </div>
                            </div>

                            <div id="team" class="form-group">
                                <h2 class="headingLine" >Team Details</h2>
                            </div>
                            <div class="form-group">
                                <label>Team Member Name</label>
                                <input class="form-control input-md" name="team_size_name" type="text" placeholder="Team Member Name">
                            </div>
			      

                            <div class="form-group">
                                <label>Contact Number <span style="color:#EB8B11">*</span> </label>
                                <input class="form-control input-md" name="team_contact_no" type="text" placeholder="Contact Number">
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
                                  <th><label>Education</label></th>
                                  <th><label>Specialization</label></th>
                                  <th><label>Duration From</label></th>
                                  <th><label>Duration To</label></th>
                                  <th><label>University</label></th>
                                  <th><label>Percentage</label></th>
				  <!--<th><label>Reason Description</label></th>-->
				  <th><label>File Upload</label></th>
                                  <th><button type="button" onclick="addMore();" class="btn-add btn btn-default"><i class="fa fa-plus"></i></button></th>
                                </tr>   
                              </thead>
                              <tbody>
                                <tr class="odd countClass" >
                                  <td> <input placeholder="SSLC" name="degree[]" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialization" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" name="edu_duration_from[]" id="edu_duration_from" class="form-control input-md    datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-md  datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" name="university[]" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" name="percentage[]" class="form-control input-md" type="text"></td>
				  <!--<td> <textarea name="reasonDesc[]"  class="form-control input-md" id="reasonDesc" rows="1" readonly></textarea></td>-->
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input type="file" multiple="multiple" name="file_student_upload[0][]" id="PanPreview">
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly>
				    </div>
				  </div></td>
				  <!--<td><center><button type="button" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>-->
                                </tr>
				<tr class="countClass">
				  <td> <input placeholder="HSC/Diploma" name="degree[]" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialisation" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" name="edu_duration_from[]" id="edu_duration_from" class="form-control input-md    datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-md  datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" name="university[]" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" name="percentage[]" class="form-control input-md" type="text"></td>
				 <!-- <td> <textarea name="reasonDesc[]"  class="form-control input-md" id="reasonDesc" rows="1" readonly></textarea></td>-->
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input  type="file" multiple="multiple" class="file_upload"  name="file_student_upload[1][]" id="file_student_upload">
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control file_name" readonly >
				    </div>
				  </div></td>
				  
				</tr>
				<tr class="countClass">
				<td> <input placeholder="UG Degree" name="degree[]" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialisation" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" name="edu_duration_from[]" id="edu_duration_from" class="form-control input-md    datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-md  datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" name="university[]" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" name="percentage[]" class="form-control input-md" type="text"></td>
				 <!-- <td> <textarea name="reasonDesc[]"  class="form-control input-md" id="reasonDesc" rows="1" readonly></textarea></td>-->
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input  type="file" class="file_upload" multiple="multiple" name="file_student_upload[2][]" id="file_student_upload">
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control file_name" readonly >
				    </div>
				  </div></td></tr>
                                 <tr class="odd hide countClass" id="optionTemplate">
                                  <td> <input placeholder="PG Degree" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialisation" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" onblur="checkDurationMonth($(this));" id="edu_duration_from" class="form-control input-md  input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" id="edu_duration_to" class="form-control input-md  input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" id="university" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" id="percentage" class="form-control input-md" type="text"></td>
				  <!--<td> <textarea id="reasonDesc"  class="form-control input-md" rows="1" readonly></textarea></td>-->
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input type="file"  id="file_student_upload" onchange="" multiple="multiple">
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly >
				    </div>
				  </div></td>
				  <td><center><button type="button" onclick="removeButton($(this));" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>
                                </tr>
				
                              </tbody>
                            </table>
                        </div>
                        </div>
			
			<div class="col-md-6">
                            <div class="form-group">
                                <h2 class="headingLine" id="employement">Employment Details</h2>
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
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="odd1 countClass1">
                                  <td> <input placeholder="Client Company" name="client_comp[]" id="client_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Payroll Company" name="payroll_comp[]" id="payroll_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Designation Company" name="designation[]" class="form-control input-md" id="designation" type="text" ></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" name="emp_duration_from[]" id="emp_duration_from" class="form-control input-md table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder="" name="emp_duration_to[]" id="emp_duration_to" class="form-control input-md table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="Location" name="location[]" class="form-control input-md" type="text"></td>
				  <td> <textarea name="empReasonDesc[]" id="empReasonDesc" class="form-control input-md" rows="1" readonly></textarea></td>
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
				  <td><center><button type="button" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>
                                </tr>
				
                                 <tr class="odd1 hide countClass1" id="optionTemplate1">
                                  <td> <input placeholder="Client Company" id="client_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Payroll Company" id="payroll_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Designation Company" class="form-control input-md" id="designation" type="text" ></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" onblur="checkEmpDurationMonth($(this));" id="emp_duration_from" class="form-control input-md table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder=""id="emp_duration_to" class="form-control input-md table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="Location" id="location" class="form-control input-md" type="text"></td>
				  <td> <textarea id="empReasonDesc" class="form-control input-md" rows="1" readonly></textarea></td>
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input type="file" multiple="multiple" id="file_employee_upload" >
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control" readonly >
				    </div>
				  </div></td>
				  <td><center><button type="button" onclick="removeButton1($(this));" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>
                                </tr>
                               
                             
                              </tbody>
                            </table>
                        </div>
                        </div>
			
                    <div class="col-md-6 col-md-offset-4" style="padding-bottom: 15px;">
		      <div class="row">
			<div class="col-md-4">
			  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input type="file" name="resume_upload" id="resume_upload"  multiple="multiple">
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
        $('#datetimepicker1').datetimepicker();
    });
</script>
<script>
    $(document).ready(function() {
        $(".chzn-select").chosen();
        
        
        //datepicker();
        $('.datepicker-dob').datetimepicker({
	    format: 'DD-MMM-YYYY'
	    
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
                            message: 'The name is required and can\'t be empty'
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
                        notEmpty: {
                            message: 'The mobile number is required and can\'t be empty'
                        },
                        regexp: {
                        regexp: /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/,
                        message: 'Mobile Number contains only 10 Digit Numbers'
                    }
                    }
                },
		 password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and can\'t be empty'
                        },
                        //identical: {
                        //    field: 'confirm_password',
                        //    message: 'The password and its confirm are not the same'
                        //}                        
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message: 'The email number is required and can\'t be empty'
                        },                        
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
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
			remote:{
			    message: 'The Email is Already Exist',
			    url: '<?php  echo site_url('talentcapitalctr/CheckEmailExist')?>',
			    type: 'POST'
			}
		    }
                },                
		//'skills[]': {
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
                preferred_location: {
                    validators: {
                        notEmpty: {
                            message: 'The Prefered Location is required and can\'t be empty'
                        },
                        regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The  Perfered Location can consist of alphabetical characters and spaces only'
                    }
                    }
                },
                interview_timing: {
                    validators: {
                        notEmpty: {
                            message: 'The Interview Timing is required and can\'t be empty'
                        },
                    }
                },
                educational_gap_year: {
                    validators: {
                        notEmpty: {
                            message: 'The educational GAP is required and can\'t be empty'
                        },
                    }
                },
                career_gap_year: {
                    validators: {
                        notEmpty: {
                            message: 'The Carrer GAP is required and can\'t be empty'
                        },
                    }
                },
                team_size_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Team Member name is required and can\'t be empty'
                        },
                         regexp: {
			    regexp: /^[a-z\s]+$/i,
			    message: 'Team Member name can consist of alphabetical characters and spaces only'
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
                    trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The Edu Durtation From is required and can\'t be empty'
                        },
                    }
                },
                'edu_duration_to[]': {
                    group: 'td',
                    trigger:'blur',
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
		//	integer: {
		//	  message: 'The value is not an integer'
		//      },
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
  function checkDurationMonth($this) {
    
    var $row = $this.parents('.odd');
    var prevRowVal = $this.closest('tr').prev('tr').find('[id="edu_duration_to"]').val();
    var thisValue = $this.val();
    //console.log(prevRowVal);
    //console.log(thisValue);
    var prevRowNewVal = moment.parseZone(prevRowVal, 'DD MMM YYYY').format();
    var thisNewValue = moment.parseZone(thisValue, 'DD MMM YYYY').format();
    
    var a = moment(prevRowNewVal,'YYYY/MM/DD');
    var b = moment(thisNewValue,'YYYY/MM/DD');
    var diffDays = b.diff(a, 'days');
    
    if (diffDays >= 60) {
      $row.find('[id="reasonDesc"]').prop("readonly", false);
    }else{
      $row.find('[id="reasonDesc"]').prop("readonly", true);
    }
  }
  
  function checkEmpDurationMonth($this) {
    
    var $row = $this.parents('.odd1');
    var prevEmpRowVal = $this.closest('tr').prev('tr').find('[id="emp_duration_from"]').val();
    var thisEmpValue = $this.val();
    //console.log(prevRowVal);
    //console.log(thisValue);
    var prevRowEmpNewVal = moment.parseZone(prevEmpRowVal, 'DD MMM YYYY').format();
    var thisNewEmpValue = moment.parseZone(thisEmpValue, 'DD MMM YYYY').format();
    
    var a = moment(prevRowEmpNewVal,'YYYY/MM/DD');
    var b = moment(thisNewEmpValue,'YYYY/MM/DD');
    var diffDays = b.diff(a, 'days');
    
    if (diffDays >= 60) {
      $row.find('[id="empReasonDesc"]').prop("readonly", false);
    }else{
      $row.find('[id="empReasonDesc"]').prop("readonly", true);
    }
  }
    
    function addMore() {
      $Counter = $('.countClass').length-2;
      $Counter +=1;
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
	
//	$name   = $clone.find('[name="file_employee_upload[]"]');
//	$('#form_validation').bootstrapValidator('addField', $name);
        //fileNameMapping();
	datepicker2();
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
	 getSelectImage();
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
	
	$name   = $clone.find('[name="empReasonDesc[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
	
	$name   = $clone.find('[name="file_employee_upload[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);

        //
	//fileNameMapping();
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
    }    
    function panAttachment(){
        var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("PanPreview").files[0]);
	oFReader.onload = function (oFREvent) {
	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
	};
    }
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
	    format:'DD-MMM-YYYY'
	    
	});
	$('*#edu_duration_to').datetimepicker({
	    format:'DD-MMM-YYYY'
	   
	}); 
    }
    
 //$(document).ready(function() {
 //  //fileNameMapping();
 //});
// function fileNameMapping(){
//  //alert('test');
//  $('#form_validation').on('change', '.file_upload', function() {
//   var $row=$(this).closest("tr");  
//   var imgpath=$(this).val();
//   console.log(imgpath);
//   
//   if (!imgpath==""){
//	var img=this.files[0].size;
//	var name=this.files[0].name;
//	var imgsize=img/1024;
//	console.log(this.files);
//	console.log(this.files[0]);
//	imgsize=Math.round(imgsize);
//	imgsize=imgsize;
//	$row.find(".file_name").val(name);
//      // readURL(this);
//      }
//    });
// }
</script>
