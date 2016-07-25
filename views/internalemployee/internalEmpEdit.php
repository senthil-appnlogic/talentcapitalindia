<?php $path=$this->config->item('base_urlcapital');?>

<style>
    .headingLine{
        font-size:17px;
    }
    .capitalized{
	text-transform: capitalize;
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
                            
<form id="form_validation" method="post" action="<?php echo base_url('talentcapitalctr/updatelogin');?>" enctype="multipart/form-data" role="form">
                            <div class="col-md-6 col-md-offset-3">
                           
                            <div class="form-group">
                              <h2 class="headingLine" id="candidate">Candiate Details</h2>
                            </div>

                            <div class="form-group">
                              <label>Candidate Name <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md capitalized" value="<?php echo $inter_Edit[0]['candidate_name'];?>" name="candidate_name" type="text" placeholder="Name" readonly>
                                <input type="hidden" class="" value="<?php echo $inter_Edit[0]['id'];?>" name="hiddenId" >
				<input type="hidden" class="" value="<?php echo $inter_Edit[0]['vendor_code'];?>" name="vendor_code" >
                            </div>
			    
			    <div class="form-group">
				<label>Middle Name</label>
				<input class="form-control input-md capitalized" value="<?php echo $inter_Edit[0]['middle_name'];?>" name="middle_name" type="text" readonly>
                            </div>
			    <div class="form-group">
				<label>Last Name <span style="color:#EB8B11">*</span></label>
				<input class="form-control input-md capitalized" value="<?php echo $inter_Edit[0]['last_name'];?>" name="last_name" type="text" readonly>
                            </div>
                            
                            <div class="form-group">
                              <!--<label>Profile Picture</label>-->
                              <img width="300" height="200" id="ProImgPreview" class="img-resposive" src="<?php echo site_url($inter_Edit[0]['profile_pic']);?>" >
			      <input type="hidden" name="oldimage1" value="<?php echo $inter_Edit[0]['profile_pic']; ?>">
                            </div>
			    
                            <div class="form-group ">
                              <div class="input-group">
                                <span class="input-group-btn">
                                  <span class="btn btn-primary btn-file">
                                    Browse<input type="file" onchange="profilePic();" id="ProfileImgPreview" value="<?php echo $inter_Edit[0]['profile_pic'];?>" name="profile_pic">
                                  </span>
                                </span>
                                <input type="text" readonly="" class="form-control" value="<?php echo $inter_Edit[0]['profile_pic']?>" id="">
                              </div>
                            </div>                            

                            <div class="form-group">
                                <label>Mobile Number <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" value="<?php echo $inter_Edit[0]['mobile_number'];?>" name="mobile_number" type="text" placeholder="Number">
                            </div>
                            <div class="form-group">
                                <label>Email ID <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" value="<?php echo $inter_Edit[0]['mail_id'];?>" name="mail_id" type="text" readonly>
                            </div>
					
					
					<div class="form-group">
					    <?php $skill=array('C','C++','JAVA','Dot Net','C#','PHP','Python','Perl','Ruby','Javascript','SQL','Others')?>
					    <label>Primary Skills <span style="color:#EB8B11">*</span> </label>
					    <?php $skillList= explode(",",$inter_Edit[0]['skills']);?>
					    <select  multiple class="form-control chzn-select input-sm" name="skills[]" onchange="primaryChange($(this))" >
					       <?php  foreach( $skill as $row) {
						$selected="";
						if(in_array($row, $skillList))
						 $selected= "selected";					    
						?>
						<option <?=$selected?>  value="<?php  echo $row ?>" ><?php  echo $row ?></option>
					    <?php }?>
					    </select>
					</div>
					
							
                            <!--<div class="form-group">
                                <label>Primary Skills <span style="color:#EB8B11">*</span></label>
                                <select multiple class="form-control chzn-select input-sm" onchange="primaryChange($(this))" name="skills[]">
				  <option selected><?php echo $inter_Edit[0]['skills']?></option>
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
                            </div>-->
			    <div class="form-group primary hide">
                                <label>Other Skills<span style="color:#EB8B11">*</span></label>
                                <input class="form-control primaryName input-md" value="<?php echo $inter_Edit[0]['primary_other_skils'];?>" name="" type="text" placeholder="primary other skils">
				<input class="form-control secondaryName input-md" value="<?php echo $inter_Edit[0]['secondary_other_skils'];?>" name="old_prim_other" type="hidden" placeholder="secondary other skils">
                            </div>
			    
					<!--<div class="form-group">
					    <?php $skill=array('C','C++','JAVA','Dot Net','C#','PHP','Python','Perl','Ruby','Javascript','SQL','Others')?>
					    <label>Secondary Skills</label>
					    <?php $skillList= explode(",",$inter_Edit[0]['SecondarySkills']);?>
					    <select  multiple class="form-control chzn-select input-sm" name="SecondarySkills[]" onchange="secondaryChange($(this))">
					       <?php  foreach( $skill as $row) {
						$selected="";
						if(in_array($row, $skillList))
						 $selected= "selected";					    
						?>
						<option <?=$selected?>  value="<?php  echo $row ?>" ><?php  echo $row ?></option>
					    <?php }?>
					    </select>
					</div>-->
					<div class="form-group">
					    <label>Secondary Skills</label>
					    <input class="form-control input-md" value="<?php echo $inter_Edit[0]['SecondarySkills'];?>" name="SecondarySkills" type="text" readonly>
					</div>
			    
			    <!--<div class="form-group">
                                <label>Secondary Skills <span style="color:#EB8B11">*</span></label>
                                <select multiple class="form-control chzn-select input-sm" onchange="secondaryChange($(this))" name="SecondarySkills[]">
                                  <option selected><?php echo $inter_Edit[0]['SecondarySkills']?></option>
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
                            </div>-->
			    <div class="form-group secondary hide" >
                                <label>Other Skills<span style="color:#EB8B11">*</span></label>
                                <input class="form-control secondaryName input-md" value="<?php echo $inter_Edit[0]['secondary_other_skils'];?>" name="" type="text" placeholder="secondary other skils">
				<input class="form-control secondaryName input-md" value="<?php echo $inter_Edit[0]['secondary_other_skils'];?>" name="old_sec_other" type="hidden" placeholder="secondary other skils">
                            </div>
                              <div class="">
                                <label>Total Experience <span style="color:#EB8B11">*</span></label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="total_exp_year" class="form-control">
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
                                    <option value="11years">11 </option>
                                    <option value="12years">12 </option>
                                    <option value="13years">13 </option>
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
			    	<div class="">
                                <label>Revelant Exp <span style="color:#EB8B11">*</span></label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="relevant_exp_year" class="form-control">
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
                                <label>Notice Period <span style="color:#EB8B11">*</span></label>
                                <div class="row">
				  <div class="form-group col-md-4">
				    <select name="notice_period" class="form-control">
				      <option value="Immediate">Immediate</option>
					<option value="7">7 Days</option>
					<option value="15">15 Days</option>
					<option value="30">30 Days</option>
					<option value="45">45 Days</option>
					<option value="60">60 Days</option>
					
					<option value="90 Days & Above">90 Days & Above</option>
				     </select>
				  </div>
				</div>
			    </div>
			    			      <div class="">
                                <label>Current CTC <span style="color:#EB8B11">*</span></label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="current_ctc_lakhs" class="form-control">
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
                                  
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="current_ctc_thousands" class="form-control">
				    <option value="0">0 </option>
				    <option value="5">5 </option>
                                    <option value="10">10 </option>
                                    <option value="15">15 </option>
                                    <option value="20">20 </option>
                                    <option value="25">25 </option>
                                    <option value="30">30 </option>
                                    <option value="35">35 </option>
                                    <option value="40">40 </option>
                                    <option value="45">45 </option>
                                    <option value="50">50 </option>
                                    <option value="55">55 </option>
                                    <option value="60">60 </option>
				    <option value="65">65 </option>
                                    <option value="70">70 </option>
                                    <option value="75">75 </option>
                                    <option value="80">80 </option>
                                    <option value="85">85 </option>
                                    <option value="90">90 </option>
                                    <option value="95">95 </option>
                                  </select>
                                </div>
                                 </div>
                            </div>
			      <div class="">
                                <label>Expected CTC <span style="color:#EB8B11">*</span></label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="expected_ctc_lakhs" class="form-control">
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
                                  
                                  </select>
                                </div>
                                 <div class="form-group col-md-4">
                                  <select name="expected_ctc_thousands" class="form-control">
				    <option value="0">0 </option>
				    <option value="5">5 </option>
                                    <option value="10">10 </option>
                                    <option value="15">15 </option>
                                    <option value="20">20 </option>
                                    <option value="25">25 </option>
                                    <option value="30">30 </option>
                                    <option value="35">35 </option>
                                    <option value="40">40 </option>
                                    <option value="45">45 </option>
                                    <option value="50">50 </option>
                                    <option value="55">55 </option>
                                    <option value="60">60 </option>
				    <option value="65">65 </option>
                                    <option value="70">70 </option>
                                    <option value="75">75 </option>
                                    <option value="80">80 </option>
                                    <option value="85">85 </option>
                                    <option value="90">90 </option>
                                    <option value="95">95 </option>
                                  </select>
                                </div>
                                 </div>
                            </div>

                            <div class="">
                                <label>Date Of Birth <span style="color:#EB8B11">*</span></label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="day" class="form-control">
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
                                <input class="form-control input-md" name="pan_card_no" type="text" value="<?php echo $inter_Edit[0]['pan_card_no'];?>" style="text-transform: uppercase;">
                            </div>
                            <div class="form-group">
                              <img src="<?php echo site_url($inter_Edit[0]['pan_card_attach']);?>" class="img-resposive" width="300" height="200" id="PanImgPreview">
			      <input type="hidden" name="oldimage" value="<?php echo $inter_Edit[0]['pan_card_attach']; ?>">
                           </div>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-primary btn-file">
                                      Browse<input type="file" name="pan_card_attach" id="PanPreview" value="<?php echo $inter_Edit[0]['pan_card_attach']?>" onchange="panAttachment();">
                                  </span>
                              </span>
                              <input type="text" id="" class="form-control" value="<?php echo $inter_Edit[0]['pan_card_attach']?>" readonly>
                            </div>
                          </div>
                            
                            <!--<div class="form-group">
                                <label>Language Known</label>
                                <select multiple class="form-control chzn-select input-sm" name="language_known[]">
				  <option selected><?php echo $inter_Edit[0]['language_known']?></option>
				   <option value="English">English</option>
                                   <option value="Tamil">Tamil</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Malayalam">Malayalam</option>
                                     <option value="Kannadam">Kannadam</option>
                                    <option value="Hindi">Hindi</option>
                                </select>
                            </div>-->
			    
			    <!--<div class="form-group">
				<?php $lang=array('English','Tamil','Telugu','Malayalam','Kannadam','Hindi')?>
				<label>Language Known</label>
				<?php $langList= explode(",",$inter_Edit[0]['language_known']);?>
				<select  multiple class="form-control chzn-select input-sm" name="language_known[]">
				   <?php  foreach( $lang as $row) {
				    $selected="";
				    if(in_array($row, $langList))
				     $selected= "selected";					    
				    ?>
				    <option <?=$selected?>  value="<?php  echo $row ?>" ><?php  echo $row ?></option>
				<?php }?>
				</select>
			    </div>-->
			    
			    <div class="form-group">
                                <label>Language Known <span style="color:#EB8B11">*</span></label>
                                <select multiple class="form-control chzn-select input-sm" name="language_known[]" id="language" disabled="disabled">
					<!--<option value="<?php echo $inter_Edit[0]['language_known']; ?>" selected><?php echo $inter_Edit[0]['language_known']; ?></option>-->
				    <?php
				    $inter_Edit[0]['language_known'];
				    foreach($language as $row) {
					$selected="";
					if(in_array($row['language'], explode(",",$inter_Edit[0]['language_known'])))
					$selected= "selected"; 
				    ?>
				    <option <?=$selected?> value="<?php echo $row['language']?>"><?php echo $row['language']?></option>
				    <?php } ?>
                                </select>
                            </div>
			    
                            <div class="form-group">
                                <label>Current Location <span style="color:#EB8B11">*</span></label>
                                <!--<input class="form-control input-md" name="current_location" value="<?php echo $inter_Edit[0]['current_location'];?>" type="text" placeholder="Current Location">-->
				<select name="current_location" class="form-control">
				<?php foreach($Location as $rowC){ ?>
				    <option <?php if($rowC['location']==$inter_Edit[0]['current_location']){ echo "selected"; }else{ echo "disabled";}?> value="<?php echo $rowC['location'];?>" ><?php echo $rowC['location'];?></option>
				<?php } ?>
				</select>
                            </div>
                            <div class="form-group">
                                <label>Perfered Location</label>
                               <!-- <input class="form-control input-md" name="preferred_location" value="<?php echo $inter_Edit[0]['preferred_location'];?>" type="text" placeholder="Perfered Location">-->
			       <select multiple class="form-control chzn-select input-sm" name="preferred_location[]" id="Preferedloc" disabled="disabled">
				    <?php
				    $inter_Edit[0]['preferred_location'];
				    foreach($Location as $row) {
					$selected="";
					if(in_array($row['location'], explode(",",$inter_Edit[0]['preferred_location'])))
					$selected= "selected"; 
				    ?>
				    <option <?=$selected?> value="<?php echo $row['location']?>"><?php echo $row['location']?></option>
				    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Interview Timing <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md" name="interview_timing" value="<?php echo $inter_Edit[0]['interview_timing'];?>" id="datetimepicker1" type="text" placeholder="Interview Timing">
                            </div>
                            
			    			      <!--<div class="">
                                <label>Educational Gap(in years)</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="educational_gap_year" class="form-control">
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
                                  <select name="educational_gap_month" class="form-control">
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
			    			      <div class="">
                                <label>Carrier Gap(in years)</label>
                                <div class="row">
                                <div class="form-group col-md-4">
                                  <select name="career_gap_year" class="form-control">
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
                                  <select name="career_gap_month" class="form-control">
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
                            </div>-->
			    
			    <div class="">
				<div class="row">
				  <div class="form-group col-md-2">
				      <input  class="lcs_check" id="switch_YN" type="checkbox" <?php if($inter_Edit[0]['yesno']=="Y") echo "checked";?> disabled="disabled">
				      <input type="hidden" id="Switch_Val" name="yesno" value="<?php echo $inter_Edit[0]['yesno'];?>" />
				  </div>
				   <div class="form-group col-md-6">
					<input type="text" name="check_yn" id="checkingYN" class="form-control" value="<?php echo $inter_Edit[0]['check_yn'];?>" readonly>
				  </div>
				 </div>
			      </div>

                            <div id="team" class="form-group">
                                <h2 class="headingLine" >Team Details</h2>
                            </div>

			    <div class="form-group">
                                <label>Team Member Name <span style="color:#EB8B11">*</span></label>
                                <input class="form-control input-md capitalized" name="team_size_name" value="<?php echo $inter_Edit[0]['team_size_name'];?>" type="text" placeholder="Team Member Name">
                            </div>
			    <div class="form-group">
                                <label>Contact Number <span style="color:#EB8B11">*</span> </label>
                                <input class="form-control input-md" name="team_contact_no" value="<?php echo $inter_Edit[0]['team_contact_no'];?>" type="text" placeholder="Contact number">
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
				  <th><label>File Upload</label></th>
                                  <!--<th><button type="button" onclick="addMore();" class="btn-add btn btn-default"><i class="fa fa-plus"></i></button></th>-->
                                </tr>   
                              </thead>
                              <tbody>
				 <?php $count=-1; foreach($Geteducational as $row) { $count++; ?>
                                <tr class="odd countClass" >
				  <input id="AddValues" name="update_educ[]" class="form-control input-md" type="hidden" value="UPDATE">
                                  <td class="hidden"> <input placeholder="Degree" name="edu_lineid[]" value="<?php echo $row['id'];?>" id="degree" class="form-control input-md" type="hidden"></td>
				  <td> <input placeholder="Degree" name="degree[]" value="<?php echo $row['degree'];?>" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialization" value="<?php echo $row['specialisation'];?>" name="specialisation[]" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input value="<?php echo $row['edu_duration_from'];?>" type="text" name="edu_duration_from[]" id="edu_duration_from" class="form-control input-md    datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input value="<?php echo $row['edu_duration_to'];?>" type="text" name="edu_duration_to[]" id="edu_duration_to" class="form-control input-md  datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" value="<?php echo $row['university'];?>" name="university[]" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" value="<?php echo $row['percentage'];?>" name="percentage[]" class="form-control input-md" type="text"></td>
				  <!--<td> <textarea name="reasonDesc[]"  class="form-control input-md" id="reasonDesc" rows="1" readonly></textarea></td>-->
<!--                                  <td>-->
<!--				  <div class="form-group">-->
<!--				    <div class="input-group">-->
<!--				      <span class="input-group-btn">-->
<!--					  <span class="btn btn-primary btn-file">-->
<!--					      Browse<input type="file" name="file_student_upload[<?php echo $count; ?>][]" value="<?php echo $row['file_student_upload']?>" id="PanPreview" multiple disabled>-->
<!--					      <input type="hidden" name="file_student_upload_old[]" value="<?php echo $row['file_student_upload']; ?>">-->
<!--					  </span>-->
<!--				      </span>-->
<!--				      <input type="text" id="" class="form-control" value="<?php echo $row['file_student_upload']?>" readonly>-->
<!--				    </div>-->
<!--				  </div></td>-->

				    <td><button data-head_id="<?php echo $row['head_id']; ?>" data-id="<?php echo $row['id']; ?>" class="btn btn-md btn-primary student_files">click to view</button></td>
				  <!--<td><center><button type="button" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>-->
                                </tr>
				 <?php } ?>
                                 <tr class="odd hide countClass" id="optionTemplate">
				  
                                  <td>
				    
				    <input id="AddValues" name="update_educ[]" class="form-control input-md" type="hidden" value="">
				    <input placeholder="Degree" id="degree" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Specialisation" id="specialisation" class="form-control input-md" type="text"></td>
                                  <td><span class='input-group date'><input type="text" onblur="checkDurationMonth($(this));" id="edu_duration_from" class="form-control input-md  input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" id="edu_duration_to" class="form-control input-md  input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="University" id="university" class="form-control input-md" type="text"></td>
                                  <td> <input placeholder="Percentage" id="percentage" class="form-control input-md" type="text"></td>
                                  <td>
				  <div class="form-group">
				    <div class="input-group">
				      <span class="input-group-btn">
					  <span class="btn btn-primary btn-file">
					      Browse<input type="file"  id="file_student_upload" class="file_upload"  multiple>
					  </span>
				      </span>
				      <input type="text" id="" value="" class="form-control file_name" readonly >
				    </div>
				  </div></td>
				  <!--<td><center><button type="button" onclick="removeButton($(this));" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>-->
                                </tr>
			      </tbody>
                            </table>
                        </div>
                        </div>
			
			<div class="col-md-6">
                            <div class="form-group">
                                <h2 class="headingLine" id="employement">Employement Details <span style="color:#EB8B11">*</span></h2>
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
                                  <!--<th><button type="button" onclick="addMore1();" class="btn-add btn btn-default"><i class="fa fa-plus"></i></button></th>-->
                                </tr>
                              </thead>
                              <tbody>
				<?php  $count=-1; foreach($GetEmpl as $row) { $count++; ?>
                                <tr class="odd1 countClass1">
				  <input name="Add_more_line[]" value="add" class="form-control input-md" type="hidden">
				  <input name="update_emp[]" id="tests" class="form-control input-md" type="hidden" value="UPDATE">
				    <input type="hidden" value="<?php echo $row['head_id'];?>" name="headId[]">
				  <td class="hidden"> <input name="emp_lineid[]" value="<?php echo $row['id'];?>" class="form-control input-md" type="hidden"></td>
                                  <td> <input placeholder="Client Company" name="client_comp[]" value="<?php echo $row['client_comp'];?>" id="client_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Payroll Company" name="payroll_comp[]" value="<?php echo $row['payroll_comp'];?>" id="payroll_comp" class="form-control input-md" type="text" ></td>
                                  <td> <input placeholder="Designation Company" name="designation[]" value="<?php echo $row['designation'];?>" class="form-control input-md" id="designation" type="text" ></td>
                                  <td><span class='input-group date'><input type="text" placeholder="" value="<?php echo $row['emp_duration_from'];?>" name="emp_duration_from[]" id="emp_duration_from" class="form-control input-md table_input input-group datepicker-dob" ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
				  <td><span class='input-group date'><input type="text" placeholder="" value="<?php echo $row['emp_duration_to'];?>" name="emp_duration_to[]" id="emp_duration_to" class="form-control input-md table_input input-group datepicker-dob"  ><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span></span></td>
                                  <td> <input placeholder="Location" name="location[]" value="<?php echo $row['location'];?>" class="form-control input-md" type="text"></td>
				  <td> <textarea name="empReasonDesc[]" id="empReasonDesc" value="<?php echo $row['empReasonDesc'];?>" class="form-control input-md" rows="1" readonly></textarea></td>
				  
				  <td><button id="employee_files" data-id="<?php echo $this->uri->segment(3); ?>" class="btn btn-md btn-primary employee_files">click to view</button></td>
<!--                                  <td>-->
<!--				  <div class="form-group">-->
<!--				    <div class="input-group">-->
<!--				      <span class="input-group-btn">-->
<!--					  <span class="btn btn-primary btn-file">-->
<!--					      Browse<input type="file" name="file_employee_upload[<?php echo $count; ?>][]" id="file_employee_upload" value="<?php echo $row['file_employee_upload']?>" onchange="fileAttachment();" multiple disabled>-->
<!--					      <input type="hidden" name="file_employee_upload_old[]" value="<?php echo $row['file_employee_upload']; ?>">-->
<!--					  </span>-->
<!--				      </span>-->
<!--				      <input type="text" id="" class="form-control" value="<?php echo $row['file_employee_upload']?>" readonly >-->
<!--				    </div>-->
<!--				  </div></td>-->
<!--				  <td><center><button type="button" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>-->
                                </tr>
				<?php } ?>
				
				
                                 <tr class="odd1 hide countClass1" id="optionTemplate1">
				  <input name="update_emp[]" id="tests" class="form-control input-md" type="hidden" value="">
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
					      Browse<input type="file" id="file_employee_upload" multiple >
					  </span>
				      </span>
				      <input type="text" class="form-control" readonly>
				    </div>
				  </div></td>
				  <td><center><button type="button" onclick="removeButton1($(this));" class="btn btn-remove btn-default btn-sm removeButton"><i class="fa fa-minus"></i></button></center></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        </div>
			
			<div class="col-md-6">
			  <div class="row">
			    <div class="col-md-6">
			      <div class="form-group">
			    <label>Educational Gap</label>
			    <input class="form-control input-md countEduYr" name="educational_gap_year" value="<?php echo $inter_Edit[0]['educational_gap_year'];?>" type="text" placeholder="Educational Gap" readonly>
			  </div>
			  </div>
			  <div class="form-group">
			    <div class="col-md-6">
			    <label>Career Gap</label>
			    <input class="form-control input-md countYr" name="career_gap_year" value="<?php echo $inter_Edit[0]['career_gap_year'];?>" type="text" placeholder="Career Gap" readonly>
			  </div>
			    </div>
			  </div>
			</div>
			
                   <div class="col-md-6 col-md-offset-4" style="padding-bottom: 15px;">
                           <!-- <input type="submit" name="save" value="Update" class="btn btn-sm btn-success">-->
                      <!-- <button type="button" class="btn btn-sm btn-warning">cancel</button>-->
		      <button class="btn btn-md btn-primary resume_file input-sm" data-id="<?php echo $inter_Edit[0]['id']; ?>" value="<?php echo $inter_Edit[0]['resume'];?>">View Resume</button>
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

<script type="text/javascript">
  $("#language").chosen();
  $("#Preferedloc").chosen();
//$(function () {
//    $('.datepicker').datepicker({
//	format: 'dd-mm-yyyy'
//    });
//});
</script>
<script type="text/javascript">
  $("#language").chosen();
    $(function () {
        $('#datetimepicker1').datetimepicker();
	$('#datetimepicker1').val('<?php echo $inter_Edit[0]['interview_timing'];?>');
    });
</script>
<script>
    $(document).ready(function() {
	$("input").attr("disabled",true);
	$("select").attr("disabled",true);
	$(".chosen-choices").addClass('chosen-disabled');
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
			   
                total_exp: {
                    validators: {
                        notEmpty: {
                            message: 'The Total Exp is required and can\'t be empty'
                        },
                    }
                },
                relevant_exp: {
                    validators: {
                        notEmpty: {
                            message: 'The Revelant Exp is required and can\'t be empty'
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
                current_ctc: {
                    validators: {
                        notEmpty: {
                            message: 'The Current CTC is required and can\'t be empty'
                        },
                        
                    }
                },
                expected_ctc: {
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
                //pan_card_attach: {
                //    validators: {
                //        notEmpty: {
                //            message: 'The PAN Card is required and can\'t be empty'
                //        },
                //    }
                //},
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
			}
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
	$clone.find('[id="AddValues"]').val('INSERT');
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
	$clone.find('[id="tests"]').val('INSERT');
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


        datepicker1();
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
     function getSelectImage(){
	$("input[id='file_employee_upload']").change(function() {
	    var names = [];
	    for (var i = 0; i < $(this).get(0).files.length; ++i) {
	    names.push($(this).get(0).files[i].name);
	    }
	    var inputId=$(this).parents('.input-group-btn:first').next('input');
	    //filedata
	    //console.log(inputId);
	    //console.log(names.length);
	    if(names.length>1)
	    $(inputId).val(names.length+'files selected');
	    else
	    $(inputId).val(names);
	    //console.log(names);
	});
    }
    function getSelectImage1(){
	$("input[id='file_student_upload']").change(function() {
	    var names = [];
	    for (var i = 0; i < $(this).get(0).files.length; ++i) {
	    names.push($(this).get(0).files[i].name);
	    }
	    var inputId=$(this).parents('.input-group-btn:first').next('input');
	    //filedata
	    //console.log(inputId);
	    //console.log(names.length);
	    if(names.length>1)
	    $(inputId).val(names.length+' files selected');
	    else
	    $(inputId).val(names);
	    //console.log(names);
	});
    }
    
//    function fileAttachment(){
//        var oFReader = new FileReader();
//	oFReader.readAsDataURL(document.getElementById("file_employee_upload").files[0]);
//	oFReader.onload = function (oFREvent) {
//	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
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
//	oFReader.readAsDataURL(document.getElementById("PanPreview").files[0]);
//	oFReader.onload = function (oFREvent) {
//	    var data=document.getElementById("PanImgPreview").src = oFREvent.target.result;
//	};
//    }
//    function fileAttachment3(){
//        var oFReader = new FileReader();
//	oFReader.readAsDataURL(document.getElementById("PanPreview").files[0]);
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
    //$(document).ready(function() {
    //  //fileNameMapping();
    //});
//  function fileNameMapping(){
//    //alert('test');
//    $('#form_validation').on('change', '.file_upload', function() {
//     var $row=$(this).closest("tr");
//     //console.log($row);
//     var imgpath=$(this).val();
//     console.log(imgpath);
//      if (!imgpath==""){
//	  var img=this.files[0].size;
//	  var name=this.files[0].name;
//	  var imgsize=img/1024;
//	  //console.log(this.files);
//	  console.log(this.files[0]);
//	  imgsize=Math.round(imgsize);
//	  imgsize=imgsize;
//	  $row.find(".file_name").val(name);
//	// readURL(this);
//	}
//    });
//  }
 
 $(document).ready(function(){
    $("input").attr("disabled",true);
    $("select").attr("disabled",true);
    $(".chosen-choices").addClass('chosen-disabled');
  $('[name="relevant_exp_year"]').val('<?php echo $inter_Edit[0]['relevant_exp_year']?>');
  $('[name="total_exp_year"]').val('<?php echo $inter_Edit[0]['total_exp_year']?>');
  $('[name="total_exp_month"]').val('<?php echo $inter_Edit[0]['total_exp_month']?>');
  $('[name="relevant_exp_month"]').val('<?php echo $inter_Edit[0]['relevant_exp_month']?>');
  $('[name="notice_period"]').val('<?php echo $inter_Edit[0]['notice_period']?>');
  $('[name="current_ctc_lakhs"]').val('<?php echo $inter_Edit[0]['current_ctc_lakhs']?>');
  $('[name="current_ctc_thousands"]').val('<?php echo $inter_Edit[0]['current_ctc_thousands']?>');
  $('[name="expected_ctc_lakhs"]').val('<?php echo $inter_Edit[0]['expected_ctc_lakhs']?>');
  $('[name="expected_ctc_thousands"]').val('<?php echo $inter_Edit[0]['expected_ctc_thousands']?>');
  $('[name="day"]').val('<?php echo $inter_Edit[0]['day']?>');
  $('[name="month"]').val('<?php echo $inter_Edit[0]['month']?>');
  $('[name="year"]').val('<?php echo $inter_Edit[0]['year']?>');
  $('[name="career_gap_month"]').val('<?php echo $inter_Edit[0]['career_gap_month'];?>');
  $('[name="career_gap_year"]').val('<?php echo $inter_Edit[0]['career_gap_year'];?>');
  $('[name="educational_gap_month"]').val('<?php echo $inter_Edit[0]['educational_gap_month'];?>');
  $('[name="educational_gap_year"]').val('<?php echo $inter_Edit[0]['educational_gap_year'];?>');
 })
 
 
  //var res = values.toString().split(",");
  //if(jQuery.inArray("Others", res)!='-1')
 
 var check_prim_other="<?php echo $inter_Edit[0]['skills'];?>";
 var res = check_prim_other.toString().split(",");
  if(jQuery.inArray("Others", res)!='-1')
 {
    $(".primary").removeClass("hide");
    //$('[name="primary_other_skils"]').val('<?php echo $inter_Edit[0]['primary_other_skils'];?>');
    $(".primaryName").attr("name","primary_other_skils");
 }
  var check_sec_other="<?php echo $inter_Edit[0]['SecondarySkills'];?>";
  var res = check_sec_other.toString().split(",");
  if(jQuery.inArray("Others", res)!='-1')
  {
    $(".secondary").removeClass("hide");
    //$('[name="primary_other_skils"]').val('<?php echo $inter_Edit[0]['secondary_other_skils'];?>');
    $(".secondaryName").attr("name","secondary_other_skils");
 }
 
 
 // Created 14-07-16
 $('.employee_files').click(function(){
	var head_id=$(this).parents('.odd1').find('[name="headId[]"]').val();
	var line_id=$(this).parents('.odd1').find('[name="emp_lineid[]"]').val();
	$.ajax({
	type: "POST",
	url:'<?=site_url('admin/employeeUploads');?>',
	data: {line_id:line_id,head_id:head_id},
	success: function(response){
	    $('#myModal').find('.row').html(response);
	    $('#myModal').modal('show');    
	}
        });
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
    $('.resume_file').click(function(){
	$id=$(this).attr('data-id');
	$.ajax({
	type: "POST",
	url:'<?=site_url('admin/resume_file');?>',
	data: {id:$id},
	success: function(response){
	    $('#myModal').find('.row').html(response);
	    $('#myModal').modal('show'); 
	}
        });
    });
    
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
</script>
