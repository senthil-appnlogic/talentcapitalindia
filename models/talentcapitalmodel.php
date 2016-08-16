<?php
    date_default_timezone_set("Asia/Calcutta");
    class talentcapitalmodel extends CI_Model
    {
	
        function __construct()
        {
            parent::__construct();
        }
	
	public function vendorStatusCheck($uniqueCode)
        {
            $this->db->where('email_random_code', $uniqueCode);
            $data = array(
                'active_status' => 'Y'
            );
            $this->db->update('register_users', $data);
            return $this->db->affected_rows();
        }
	
	function applicantEmailCheck($uniqueCode){
	    $this->db->where('email_random_code', $uniqueCode);
            $data = array(
                'active_status' => 'Y'
            );
            $this->db->update('register_users', $data);
            return $this->db->affected_rows();
	}
        
	function getPassword()
        {
            $email = $this->input->post('forgotpassword');
	    $passwordToken = random_string('alnum', 14);	    
	    $sql = "SELECT email FROM vendor WHERE email = '$email'";
	    $result=$this->db->query($sql, $return_object = TRUE)->result_array();
	    $vendorEmail = $result[0]['email'];
	    
	    $sql = "SELECT mail_id FROM emp_candidate_details WHERE mail_id = '$email'";
	    $result1=$this->db->query($sql, $return_object = TRUE)->result_array();
	    $CandidateEmail = $result1[0]['mail_id'];
	    
	    if($vendorEmail){
		$this->db->where('email', $email);
		$data = array(
		    'password_token'=>$passwordToken,
		);
		$this->db->update('vendor', $data);
	    }
	    
	    if($CandidateEmail){
		$this->db->where('mail_id', $email);
		$data = array(
		    'password_token'=>$passwordToken,
		);
		$this->db->update('emp_candidate_details', $data);
	    }
	    if($vendorEmail != "" || $CandidateEmail != ""){
		$this->sendForgetPassword($email,$passwordToken);	
	    }else{
		$this->session->set_flashdata('error', 'Your entered email is incorrect please enter a valid email');
		redirect('talentcapitalctr/forgotPassword');		
	    }
        }
	
	function sendForgetPassword($email,$fPassToken){
            $body .="<html>
                        <head>
                            <title>Welcome to Talent Capital</title>
                        </head>
                        <body>
                            <h1>Talent Capital Forget Password Reset Confirmation</h1>
                            <h4>You requested that your password be reset. please visit the link below to get new password</h4>
			    <p>".base_url()."talentcapitalctr/resetPassword/".$fPassToken."</p>
			    <br>
			    <p>Regards,</p>
			    <p>Talent capital Portal,</p>
			    <p>To contact the Talent Capital India Team, click the link below:</p>
			    <p>https://www.talentcapitalindia.com/support</p>
			    <img src='http://appimagine.com/talentcapital/assets/images/logo.png' style='width:100px'>
                        </body>
                    </html>";
            $this->email->set_newline("\r\n");
            $this->email->from('donotreply@talentcapitalindia.com'); // change it to yours
            $this->email->to($email);// change it to yours
            $this->email->subject('Talent Capital Forget Password Recover');
            $this->email->message($body);
            if($this->email->send()){
		$this->session->set_flashdata('error', 'Your forget password has been sent to your email, please check it');
		redirect('talentcapitalctr/forgotPassword');
            }else{
		$this->session->set_flashdata('error', 'Your email is not sent');
		redirect('talentcapitalctr/forgotPassword');		
            }	    
	}
	
	function updatePassword($fPassToken){
	    
	    $sql = "SELECT password_token FROM vendor WHERE password_token = '$fPassToken'";
	    $result=$this->db->query($sql, $return_object = TRUE)->result_array();
	    $vendorEmail = $result[0]['password_token'];
	    
	    $sql = "SELECT password_token FROM emp_candidate_details WHERE password_token = '$fPassToken'";
	    $result1=$this->db->query($sql, $return_object = TRUE)->result_array();
	    $CandidateEmail = $result1[0]['password_token'];
	    
	    if($vendorEmail){
		$this->db->where('password_token', $fPassToken);
		$data = array(
		    'password'=>$this->input->post('confirmPassword'),
		    'password_token'=>'',
		);
		$this->db->update('vendor', $data);
	    }
	    
	    if($CandidateEmail){
		$this->db->where('password_token', $fPassToken);
		$data = array(
		    'password'=>$this->input->post('confirmPassword'),
		    'password_token'=>'',
		);
		$this->db->update('emp_candidate_details', $data);
	    }
	    if($vendorEmail != "" || $CandidateEmail != "")
	    {
		$this->session->set_flashdata('error', 'Your forget password not updated properly');
		redirect(site_url(),'refresh');			    
	    }
	    else
	    {
		$this->session->set_flashdata('error', 'Your forget password has been reset successfully');
		redirect(site_url(),'refresh');	
	    }	    
	}

        function vendorAdd(){
	    
	    
	    /*$Uname = substr($this->input->post('name'), 0, 4);
	    $MobilNo = substr($this->input->post('mobile_number'), -4);
	    $vendorCode=$Uname.$MobilNo;*/
	    
	    $sql = "SELECT tci_number FROM tci_code";
	    $codeTci = $this->db->query($sql, $return_object = TRUE)->result_array();
	    $tci = $codeTci[0]['tci_number'];
	    $tciCode='TCI'.$tci;
	    $vendorCode=$tciCode;
	    
	    $ramdomString = random_string('alnum', 16);
	    
            $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';            
            $this->load->library('upload', $config);
            $this->upload->do_upload('pan_attach_copy');
            $data1 = $this->upload->data();
            $filePath1=$folderPath.$data1['file_name'];
            $this->upload->do_upload('address_attach_proof');
            $data2 = $this->upload->data();
            $filePath2=$folderPath.$data2['file_name'];
            $this->upload->do_upload('bank_attach_cheque');
            $data3 = $this->upload->data();              
            $filePath3=$folderPath.$data3['file_name'];
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('profile_pic');
            $data = $this->upload->data();
            $profilePic=$folderPath.$data['file_name'];
            $Uname = $this->input->post('name');
	    $email = $this->input->post('email');
	    //$date = date('d-M-y');
            $data= array(
                'name'=>$Uname,
		'email_random_code'=>$ramdomString,	
		'password'=>$this->input->post('confirm_password'),
		'password_token'=>'',
		'vendor_code'=>$vendorCode,
                'mobile_number'=>$this->input->post('mobile_number'),
                'email'=>$email,
                'pan_attach_no'=>$this->input->post('pan_attach_no'),
                'pan_attach_copy'=>$filePath1,
                //'address_attach_proof'=>$filePath2,
                //'address_text'=>$this->input->post('address_text'),
		'status'=>'Y',
                //'bank_attach_cheque'=>$filePath3,
		'profile_pic'=>$profilePic,
		'login_types'=>$this->input->post('login_types'),
            );

	    $this->db->insert('vendor',$data);
	    //print_r($Uname);
	    //exit;
	    $vendorTci = substr($vendorCode,3);
	    $newCode = $vendorTci + 1;
	    $this->tciUpdate($vendorTci,$newCode);
	    $this->emailToVendor($Uname,$ramdomString,$email);
        }
        
        function tciUpdate($vendorTci,$newCode)
	{
	    $this->db->where('tci_number', $vendorTci);
	    $data= array(
                'tci_number'=>$newCode,
	    );
	    $select = $this->db->update('tci_code',$data);
	}
	
	function getVendorRegister($uniqueCode){

	    $sql="SELECT * FROM vendor where email_random_code='$uniqueCode' order by id DESC";
	    return $this->db->query($sql, $return_object = TRUE)->result_array();	    
	}
	
	function getApplicantRegister($uniqueCode){
	    $sql="SELECT * FROM emp_candidate_details where email_random_code='$uniqueCode'";
	    return $this->db->query($sql, $return_object = TRUE)->result_array();	    	    
	}
	
        public function emailToVendor($Uname,$ramdomString,$email)
        {
            $body ="<html>
                        <head>
                            <title>Welcome to Talent Capital</title>
                        </head>
                        <body>
                            <h4>Dear $Uname</h4>
			    <p>You are one step away from completing your registration to the Talent capital Portal.</p>
			    <p>To complete the process and active your login, please click the link below:</p>
                            <a href=".base_url()."talentcapitalctr/vendorRegister/".$ramdomString.">".base_url()."talentcapitalctr/vendorRegister/".$ramdomString."</a>
			    <p>You may also copy and paste the link into your browser to complete the process.</p>
			    <p>Thank you again, and welcome to the Talent capital Portal.</p>
			    <br>
			    <p>Regards,</p>
			    <p>Talent capital Portal,</p>
			    <p>To contact the Talent Capital India Team, click the link below:</p>
			    <p>https://www.talentcapitalindia.com/support</p>
			    <img src='http://appimagine.com/talentcapital/assets/images/logo.png' style='width:100px'>
                        </body>
                    </html>";
            $this->email->set_newline("\r\n");
            $this->email->from('donotreply@talentcapitalindia.com'); // change it to yours
            $this->email->to($email);// change it to yours
            $this->email->subject('Talent Capital India - Hiring Partner Profile Link');
            $this->email->message($body);
	    $this->email->send();
//            if($this->email->send()){
//		$this->session->set_flashdata('status', 'You are Successfully Registered with Talent Capital, Please check your Email to Proceed');
//		redirect('talentcapitalctr/successMsg');
//	    }else{
//		$this->session->set_flashdata('status', 'Your email is not sent');
//		redirect('talentcapitalctr/index');  
//            }
        }
	
	function updateVendorRegister($uniqueCode){
            $this->db->where('email_random_code', $uniqueCode);
	    
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';            
            $this->load->library('upload', $config);
            $this->upload->do_upload('pan_attach_copy');
            $data1 = $this->upload->data();
            $filePath1=$folderPath.$data1['file_name'];
            $this->upload->do_upload('address_attach_proof');
            $data2 = $this->upload->data();
            $filePath2=$folderPath.$data2['file_name'];
            $this->upload->do_upload('bank_attach_cheque');
            $data3 = $this->upload->data();              
            $filePath3=$folderPath.$data3['file_name'];
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('profile_pic');
            $data = $this->upload->data();
            $profilePic=$folderPath.$data['file_name'];
            //$date = date('d-M-y');
            $data= array(
                'name'=>$this->input->post('name'),
                'mobile_number'=>$this->input->post('mobile_number'),
                'pan_attach_no'=>$this->input->post('pan_attach_no'),
                'pan_attach_copy'=>$filePath1,
                //'address_attach_proof'=>$filePath2,
                //'address_text'=>$this->input->post('address_text'),
                //'bank_attach_cheque'=>$filePath3,
		'check_email'=>$this->input->post('checking'),
		'profile_pic'=>$profilePic,
		//'cr_date'=>$date,
            );
	    //print_r($data);exit;
	    $this->db->update('vendor', $data);
            $result = $this->db->affected_rows();
	    if($result==0)
	    {
		$this->session->set_flashdata('status', 'Your information is not updated');
		redirect('talentcapitalctr/successMsg');  
	    }
	    else{
		$Partneremail=$this->input->post('email');
		$Partnername=$this->input->post('name');
		$Partnervendor_code=$this->input->post('vendor_code');
		$AdminEmail= "senthilmp7@gmail.com";
		$this->SendSuccessMessageToAdminAndPartner($Partneremail,$Partnername,$Partnervendor_code,$AdminEmail);
		$this->session->set_flashdata('status', 'Your information has been successfully register');
		redirect('talentcapitalctr/successMsg');  
	    }
	}
	
	public function SendSuccessMessageToAdminAndPartner($Partneremail,$Partnername,$Partnervendor_code,$AdminEmail)
        {
	    $body ="<html>
                        <head>
                            <title>Welcome to Talent Capital</title>
                        </head>
                        <body>
                            <h4>Dear ".$Partnername."</h4>
                            <p>Thank for registering with us as our hiring partner</p>
                            <p>Please wait for your account activation email</p>
			    <br><br>
			    <p>Regards,</p>
			    <p>Talent capital Portal,</p>
			    <p>To contact the Talent Capital India Team, click the link below:</p>
			    <p>https://www.talentcapitalindia.com/support</p>
			    <img src='http://appimagine.com/talentcapital/assets/images/logo.png' style='width:100px'>
                        </body>
                    </html>";
            $this->email->set_newline("\r\n");
            $this->email->from('donotreply@talentcapitalindia.com'); // change it to yours
            $this->email->to($Partneremail);// change it to yours
            $this->email->subject('Talent Capital India - Profile Updates Acknowledgement');
            $this->email->message($body);
            if($this->email->send()){
		//$this->session->set_flashdata('status', 'Your information has been successfully regeister');
		//redirect('talentcapitalctr/successMsg');  
	    }
	    
            $bodyAdmin ="<html>
                        <head>
                            <title>Welcome to Talent Capital</title>
                        </head>
                        <body>
                            <h4>Dear Talent Capital Admin,</h4>
                            <p>Please login into administration panel, verifiy and activate our new hiring partner</p>
			    <p style='font-style:bold'>Hiring Partner Name: ".$Partnername."</p>
			    <p style='font-style:bold'>Hiring Partner Email: ".$Partneremail."</p>
			    <p style='font-style:bold'>Hiring Partner Code: ".$Partnervendor_code."</p><br>
			    <a href=".base_url()."login style='font-style:bold'>click here to go the admin page</a>
			    <br>
			    <p>Regards,</p>
			    <p>Talent capital Portal,</p>
			    <p>To contact the Talent Capital India Team, click the link below:</p>
			    <p>https://www.talentcapitalindia.com/support</p>
			    <img src='http://appimagine.com/talentcapital/assets/images/logo.png' style='width:100px'>
                        </body>
                    </html>";
            $this->email->set_newline("\r\n");
            $this->email->from('donotreply@talentcapitalindia.com'); // change it to yours
            $this->email->to($AdminEmail);// change it to yours
            $this->email->subject('Talent Capital India - Request for new hiring partner login activation');
            $this->email->message($bodyAdmin);
            if($this->email->send()){
		$this->session->set_flashdata('status', 'Your information has been successfully register');
		redirect('talentcapitalctr/successMsg');  
	    }else{
		$this->session->set_flashdata('error', 'Your email is not sent');
		redirect('talentcapitalctr/index');  
            }
        }	
	
	
	
	function internalEmployeeAdd(){
	    $ramdomString = random_string('alnum', 12);
	    $data= array(
                'candidate_name'=>$this->input->post('name'),
                'mobile_number'=>$this->input->post('mobile_number'),
                'mail_id'=>$this->input->post('email'),
                'password'=>$this->input->post('confirm_password'),
                'login_types'=>$this->input->post('login_types'),
		'email_random_code'=>$ramdomString,
            );
            $this->db->insert('emp_candidate_details',$data);
	    $this->emailToApplicant($ramdomString);
	}
	
	public function emailToApplicant($ramdomString)
        {
            $email = $this->input->post('email');
	    $userName = $this->input->post('name');
		 $body ="<html>
                        <head>
                            <title>Welcome to Talent Capital</title>
                        </head>
                        <body>
                            <h4>Dear $userName</h4>
			    <p>You are one step away from completing your registration to the Talent capital Portal.</p>
			    <p>To complete the registration process, please click the link below:</p>
                            <a href=".base_url()."talentcapitalctr/applicantRegister/".$ramdomString.">".base_url()."talentcapitalctr/applicantRegister/".$ramdomString."</a>
			    <p>You may also copy and paste the link into your browser to complete the process.</p>
			    <p>Thank you again, and welcome to the Talent capital Portal.</p>
			    <br>
			    <p>Regards,</p>
			    <p>Talent capital Portal,</p>
			    <p>To contact the Talent Capital India Team, click the link below:</p>
			    <p>https://www.talentcapitalindia.com/support</p>
			    <img src='http://appimagine.com/talentcapital/assets/images/logo.png' style='width:100px'>
                        </body>
                    </html>";
            $this->email->set_newline("\r\n");
            $this->email->from('donotreply@talentcapitalindia.com'); // change it to yours
            $this->email->to($email);// change it to yours
            $this->email->subject('Talent Capital India - Registration Success');
            $this->email->message($body);
           if($this->email->send()){
	//	$this->session->set_flashdata('status', 'Please verify your email');
	//	redirect('talentcapitalctr/index');
	//    }else{
	//	$this->session->set_flashdata('error', 'Your email is not sent');
	//	redirect('talentcapitalctr/index');  
           }
        }	

	function updateApplicantRegister($uniqueCode)
        {
	//    echo "<pre>";
	//	//print_r($_POST);
	//	print_r($_FILES);
	//	exit;
	    $this->db->where('email_random_code', $uniqueCode);
	    
            $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('pan_card_attach');
            $data = $this->upload->data();
            $filePath=$folderPath.$data['file_name'];
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('profile_pic');
            $data = $this->upload->data();
            $profilePic=$folderPath.$data['file_name'];
	    $primary=$this->input->post('primary_other_skils');
	    $secondary=$this->input->post('secondary_other_skils');
	    //echo $test;exit;
            $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png|doc|pdf|docx';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('resume_upload');
            $data = $this->upload->data();
            $resume=$folderPath.$data['file_name'];
	    //$date = date('d-M-y');
            $data= array(
		'vendor_code'=>$this->input->post('vendor_code'),
		'referrer_name'=>$this->input->post('ref_name'),
                'candidate_name'=>$this->input->post('candidate_name'),
		'middle_name'=>$this->input->post('middle_name'),
		'last_name'=>$this->input->post('last_name'),
                'mobile_number'=>$this->input->post('mobile_number'),
                
                //'mail_id'=>$this->input->post('mail_id'),
                'skills'=>implode(",",$this->input->post('skills')),
                'primary_other_skils'=>$this->input->post('primary_other_skils'),
		'SecondarySkills'=>$this->input->post('SecondarySkills'),
		'secondary_other_skils'=>$this->input->post('secondary_other_skils'),
                'total_exp_year'=>$this->input->post('total_exp_year'),
		'total_exp_month'=>$this->input->post('total_exp_month'),
                'relevant_exp_year'=>$this->input->post('relevant_exp_year'),
		'relevant_exp_month'=>$this->input->post('relevant_exp_month'),
                'notice_period'=>$this->input->post('notice_period'),
                
		
		
		'current_ctc_lakhs'=>$this->input->post('current_ctc_lakhs'),
		'current_ctc_thousands'=>$this->input->post('current_ctc_thousands'),
		'expected_ctc_lakhs'=>$this->input->post('expected_ctc_lakhs'),
                'expected_ctc_thousands'=>$this->input->post('expected_ctc_thousands'),
		
		
                'day'=>$this->input->post('day'),
                'month'=>$this->input->post('month'),
                'year'=>$this->input->post('year'),
                'pan_card_no'=>$this->input->post('pan_card_no'),
                'pan_card_attach'=>$filePath,
                'language_known'=>implode(",",$this->input->post('language_known')),
                'current_location'=>$this->input->post('current_location'),
                'preferred_location'=>implode(",",$this->input->post('preferred_location')),
                'interview_timing'=>$this->input->post('interview_timing'),
		
		
               'educational_gap_year'=>$this->input->post('educational_gap_year'),
	       'educational_gap_month'=>$this->input->post('educational_gap_month'),
		'career_gap_year'=>$this->input->post('career_gap_year'),
		'career_gap_month'=>$this->input->post('career_gap_month'),
                'team_size_name'=>$this->input->post('team_size_name'),
                'team_contact_no'=>$this->input->post('team_contact_no'),
		'profile_pic'=>$profilePic,
		'resume'=>$resume,
		'check_email'=>$this->input->post('checking'),
		'check_yn'=>$this->input->post('check_yn'),
		'yesno'=>$this->input->post('yesno'),
		//'cr_date'=>$date
		//'up_date'=>$this->input->post('up_date')
            );
	    
            $select = $this->db->update('emp_candidate_details',$data);
            $clientCnt = count($this->input->post('client_comp'));
	    //print_r($_FILES);
	    //exit;
	    $files=$_FILES;
	    for($i=0; $i<$clientCnt; $i++)
            {
		$dataStore="";
		$fileCount=count($files['file_employee_upload']['name'][$i]);
		
		
		for($j=0; $j<$fileCount; $j++)
		{
		    //echo $fileCount;
		    $_FILES['file_employee_upload']['name']= $files['file_employee_upload']['name'][$i][$j];
		    $_FILES['file_employee_upload']['type']= $files['file_employee_upload']['type'][$i][$j];
		    $_FILES['file_employee_upload']['tmp_name'] = $files['file_employee_upload']['tmp_name'][$i][$j];
		    $_FILES['file_employee_upload']['error']= $files['file_employee_upload']['error'][$i][$j];
		    $_FILES['file_employee_upload']['size']= $files['file_employee_upload']['size'][$i][$j];
		    //$config['upload_path'] = 'upload/';
		    $config['allowed_types'] = '*';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config);
		    $this->upload->do_upload('file_employee_upload');
		    $file_data=$this->upload->data();
		    $file_name=$file_data['file_name'];
		    $file_size=$file_data['file_size'];
		    $file_size=$file_size/1024;//for KB
		    $folderPath = $config['upload_path'] = 'upload/';
		    $target_file = $folderPath.$file_name;
		    //print_r($target_file);
		    if($j==0){
			$dataStore=$target_file;
		    }else{
			$dataStore=$dataStore.','.$target_file;
		    }
		    
		}
		$data= array(
		    'head_id'=>$this->input->post('hiddenId'),
		    'client_comp'=>$_POST['client_comp'][$i],
		    'payroll_comp'=>$_POST['payroll_comp'][$i],
		    'designation'=>$_POST['designation'][$i],
		    'emp_duration_from'=>$_POST['emp_duration_from'][$i],
		    'emp_duration_to'=>$_POST['emp_duration_to'][$i],
		    'location'=>$_POST['location'][$i],
		    'reason_desc'=>$_POST['empReasonDesc'][$i],
		    'file_employee_upload'=>$dataStore,
		);
		//echo "<pre>";
		//print_r($data);
		
		$this->db->insert('employement_details',$data);                    
            }
	    //exit;
            $degreeCnt = count($this->input->post('degree'));
	    $files=$_FILES;
            for($k=0; $k<$degreeCnt; $k++)
            {
		$dataStore="";
		$fileCount=count($files['file_student_upload']['name'][$k]);
		for($j=0; $j<$fileCount; $j++)
		{
		    $_FILES['file_student_upload']['name']= $files['file_student_upload']['name'][$k][$j];
		    $_FILES['file_student_upload']['type']= $files['file_student_upload']['type'][$k][$j];
		    $_FILES['file_student_upload']['tmp_name'] = $files['file_student_upload']['tmp_name'][$k][$j];
		    $_FILES['file_student_upload']['error']= $files['file_student_upload']['error'][$k][$j];
		    $_FILES['file_student_upload']['size']= $files['file_student_upload']['size'][$k][$j];
		    //$config['upload_path'] = 'upload/';
		    $config['allowed_types'] = '*';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config);
		    $this->upload->do_upload('file_student_upload');
		    $file_data=$this->upload->data();
		    $file_name=$file_data['file_name'];
		    $file_size=$file_data['file_size'];
		    $file_size=$file_size/1024;//for KB
		    $folderPath = $config['upload_path'] = 'upload/';
		    $target_file =$folderPath . $file_name;
		    if($j==0){
			$dataStore=$target_file;
		    }else{
			$dataStore=$dataStore.','.$target_file;
		    }
		}
		$data1= array(
		    'head_id'=>$this->input->post('hiddenId'),
		    'degree'=>$_POST['degree'][$k],
		    'specialisation'=>$_POST['specialisation'][$k],
		    'edu_duration_from'=>$_POST['edu_duration_from'][$k],
		    'edu_duration_to'=>$_POST['edu_duration_to'][$k],
		    'university'=>$_POST['university'][$k],
		    'percentage'=>$_POST['percentage'][$k],
		    'reason_desc'=>$_POST['reasonDesc'][$k],
		    'file_student_upload'=>$dataStore
		);
		//echo "<pre>";
		//print_r($data1);
		//exit;
		$this->db->insert('educational_details',$data1);                                            
            }
	    //exit;
	    
	    
        }
	
    function emailtracking($sample,$code,$emailTrack)
    {
	$data= array(
	    'email'=>$sample,
	    'refer_code'=>$code,
	    'check_mailid'=>$emailTrack,
	);
	//echo "<pre>";
	//print_r($data);
	$this->db->where('email', $sample);
	$this->db->update('emailtrack',$data);
    }

    function hiringPartnerLinkAdd($code,$loginType,$client)
        {
	    
	    //echo "<pre>";
	    //print_r($client);
	    //echo "</pre>";
	    //exit;
	    
	    $ramdomString = random_string('alnum', 13);
            $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('pan_card_attach');
            $data = $this->upload->data();
            $filePath=$folderPath.$data['file_name'];
	    
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('profile_pic');
            $data = $this->upload->data();
            $profilePic=$folderPath.$data['file_name'];
	    
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png|doc|pdf|docx';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('resume_upload');
            $data = $this->upload->data();
            $resume=$folderPath.$data['file_name'];
            //$date = date('d-M-y');
            $data= array(
		'vendor_code'=>$code,
		'referrer_name'=>$this->input->post('ref_name'),
                'candidate_name'=>$this->input->post('candidate_name'),
		'middle_name'=>$this->input->post('middle_name'),
		'last_name'=>$this->input->post('last_name'),
                'mobile_number'=>$this->input->post('mobile_number'),
		'password'=>$this->input->post('confirm_password'),
                'mail_id'=>$this->input->post('mail_id'),
                'skills'=>implode(",",$this->input->post('skills')),
                'primary_other_skils'=>$this->input->post('primary_other_skils'),
		'SecondarySkills'=>$this->input->post('SecondarySkills'),
		'secondary_other_skils'=>$this->input->post('secondary_other_skils'),
                'total_exp_year'=>$this->input->post('total_exp_year'),
		'total_exp_month'=>$this->input->post('total_exp_month'),
		'profile_pic'=>$profilePic,
		'relevant_exp_year'=>$this->input->post('relevant_exp_year'),
		'relevant_exp_month'=>$this->input->post('relevant_exp_month'),
		'notice_period'=>$this->input->post('notice_period'),
		'current_ctc_lakhs'=>$this->input->post('current_ctc_lakhs'),
		'current_ctc_thousands'=>$this->input->post('current_ctc_thousands'),
		'expected_ctc_lakhs'=>$this->input->post('expected_ctc_lakhs'),
                'expected_ctc_thousands'=>$this->input->post('expected_ctc_thousands'),
                'day'=>$this->input->post('day'),
                'month'=>$this->input->post('month'),
                'year'=>$this->input->post('year'),
                'pan_card_no'=>$this->input->post('pan_card_no'),
                'pan_card_attach'=>$filePath,
                'language_known'=>implode(",",$this->input->post('language_known')),
                'current_location'=>$this->input->post('current_location'),
                'preferred_location'=>implode(",",$this->input->post('preferred_location')),
                'interview_timing'=>$this->input->post('interview_timing'),
                'educational_gap_year'=>$this->input->post('educational_gap_year'),
		'educational_gap_month'=>$this->input->post('educational_gap_month'),
                'career_gap_year'=>$this->input->post('career_gap_year'),
		'career_gap_month'=>$this->input->post('career_gap_month'),
                'team_size_name'=>$this->input->post('team_size_name'),
                'team_contact_no'=>$this->input->post('team_contact_no'),
		'email_random_code'=>$ramdomString,
		'login_types'=>$loginType,
		'candidate_status'=>'Shortlisted',
		'resume'=>$resume,
		'check_email'=>$this->input->post('checking'),
		'check_yn'=>$this->input->post('check_yn'),
		'yesno'=>$this->input->post('yesno'),
		'client'=>$client,
		//'cr_date'=>$date
		//'up_date'=>$this->input->post('up_date')
            );
	    //echo "<pre>";
	    //print_r($data);
	    //echo "</pre>";
	    //exit;
            $select = $this->db->insert('emp_candidate_details',$data);
            $getHeadId=$this->db->insert_id($select);
            
         $clientCnt = count($this->input->post('client_comp'));
	 
	  //echo "<pre>";
	  //print_r($_FILES);
	  //echo "</pre>";
	  //exit;
	  
            $files=$_FILES;
	    for($i=0; $i<$clientCnt; $i++)
            {
		$dataStore="";
		$fileCount=count($files['file_employee_upload']['name'][$i]);
		
		//$fileCount1=count($_FILES['file_employee_upload']['name']);
		//$fileCount2=count($_FILES['file_employee_upload']['name']);
		//print_r($fileCount);echo "<br>";
		//print_r($fileCount1);echo "<br>";
		//print_r($fileCount2);echo "<br>";
		
		for($j=0; $j<$fileCount; $j++)
		{
		    $_FILES['file_employee_upload']['name']= $files['file_employee_upload']['name'][$i][$j];
		    $_FILES['file_employee_upload']['type']= $files['file_employee_upload']['type'][$i][$j];
		    $_FILES['file_employee_upload']['tmp_name'] = $files['file_employee_upload']['tmp_name'][$i][$j];
		    $_FILES['file_employee_upload']['error']= $files['file_employee_upload']['error'][$i][$j];
		    $_FILES['file_employee_upload']['size']= $files['file_employee_upload']['size'][$i][$j];
		    //$config['upload_path'] = 'upload/';
		    $config['allowed_types'] = '*';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config);
		    $this->upload->do_upload('file_employee_upload');
		    $file_data=$this->upload->data();
		    $file_name=$file_data['file_name'];
		    $file_size=$file_data['file_size'];
		    $file_size=$file_size/1024;//for KB
		    $folderPath = $config['upload_path'] = 'upload/';
		    $target_file =$folderPath . $file_name;
		    
		    if($j==0){
			$dataStore=$target_file;
		    }else{
			$dataStore=$dataStore.','.$target_file;
		    }
		    
		}
		$data= array(
		    'head_id'=>$getHeadId,
		    'client_comp'=>$_POST['client_comp'][$i],
		    'payroll_comp'=>$_POST['payroll_comp'][$i],
		    'designation'=>$_POST['designation'][$i],
		    'emp_duration_from'=>$_POST['emp_duration_from'][$i],
		    'emp_duration_to'=>$_POST['emp_duration_to'][$i],
		    'location'=>$_POST['location'][$i],
		    'reason_desc'=>$_POST['empReasonDesc'][$i],
		    'file_employee_upload'=>$dataStore,
		);
		//echo "<pre>";
		//print_r($data);
		$this->db->insert('employement_details',$data);                    
            }
            
            $degreeCnt = count($this->input->post('degree'));
	     //$files=$_FILES;
            $files=$_FILES;
            for($k=0; $k<$degreeCnt; $k++)
            {
		
		$dataStore="";
		$fileCount=count($files['file_student_upload']['name'][$k]);
		for($j=0; $j<$fileCount; $j++)
		{
		    $_FILES['file_student_upload']['name']= $files['file_student_upload']['name'][$k][$j];
		    $_FILES['file_student_upload']['type']= $files['file_student_upload']['type'][$k][$j];
		    $_FILES['file_student_upload']['tmp_name'] = $files['file_student_upload']['tmp_name'][$k][$j];
		    $_FILES['file_student_upload']['error']= $files['file_student_upload']['error'][$k][$j];
		    $_FILES['file_student_upload']['size']= $files['file_student_upload']['size'][$k][$j];
		    //$config['upload_path'] = 'upload/';
		    $config['allowed_types'] = '*';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config);
		    $this->upload->do_upload('file_student_upload');
		    $file_data=$this->upload->data();
		    $file_name=$file_data['file_name'];
		    $file_size=$file_data['file_size'];
		    $file_size=$file_size/1024;//for KB
		    $folderPath = $config['upload_path'] = 'upload/';
		    $target_file =$folderPath . $file_name;
		    if($j==0){
			$dataStore=$target_file;
		    }else{
			$dataStore=$dataStore.','.$target_file;
		    }
		    
		}
		$data1= array(
		    'head_id'=>$getHeadId,
		    'degree'=>$_POST['degree'][$k],
		    'specialisation'=>$_POST['specialisation'][$k],
		    'edu_duration_from'=>$_POST['edu_duration_from'][$k],
		    'edu_duration_to'=>$_POST['edu_duration_to'][$k],
		    'university'=>$_POST['university'][$k],
		    'percentage'=>$_POST['percentage'][$k],
		    'reason_desc'=>$_POST['reasonDesc'][$k],
		    'file_student_upload'=>$dataStore
		);
		$this->db->insert('educational_details',$data1);                                            
            }
	//exit;
            
	    $this->emailToApplicantAndVendor($code);
	    
        }
	
	public function emailToApplicantAndVendor($code)
        {
            $email = $this->input->post('mail_id');
	    $userName = $this->input->post('candidate_name');
            $body ="<html>
                        <head>
                            <title>Welcome to Talent Capital</title>
                        </head>
                        <body>
                            <h4>Dear ".$userName."</h4>
                            <p>Your profile has been updated.</p>
                            <p>Thank for registering with us.</p>
			    <br>
			    <p>Regards,</p>
			    <p>Talent capital Portal,</p>
			    <p>To contact the Talent Capital India Team, click the link below:</p>
			    <p>https://www.talentcapitalindia.com/support</p>
			    <img src='http://appimagine.com/talentcapital/assets/images/logo.png' style='width:100px'>
                        </body>
                    </html>";
            $this->email->set_newline("\r\n");
            $this->email->from('donotreply@talentcapitalindia.com'); // change it to yours
            $this->email->to($email);// change it to yours
            $this->email->subject('Talent Capital India - Profile Updates Acknowledgement');
            $this->email->message($body);
            if($this->email->send()){
		//$this->session->set_flashdata('status', 'Please verify your email ');
		//redirect('talentcapitalctr/index');
	    }else{
		//$this->session->set_flashdata('error', 'Your email is not sent');
		//redirect('talentcapitalctr/index');  
            }
	    
	    $sql="SELECT * FROM vendor where vendor_code='$code'";
	    $return= $this->db->query($sql, $return_object = TRUE)->result_array();	    	
	    $VendorEmail=$return[0]['email'];
	    $VendorName=$return[0]['name'];
	    
	    $bodyVendor ="<html>
                        <head>
                            <title>Welcome to Talent Capital</title>
                        </head>
                        <body>
                            <h4>Dear ".$VendorName."</h4>
                            <p>Your reffered candidate has been updated Successfully</p>
			    <p style='font-style:bold'>Candidate Name: ".$userName."</p>
			    <p style='font-style:bold'>Candidate Email: ".$email."</p>
			    <br>
			    <p>Regards,</p>
			    <p>Talent capital Portal,</p>
			    <p>To contact the Talent Capital India Team, click the link below:</p>
			    <p>https://www.talentcapitalindia.com/support</p>
			    <img src='http://appimagine.com/talentcapital/assets/images/logo.png' style='width:100px'>
                        </body>
                    </html>";
            $this->email->set_newline("\r\n");
            $this->email->from('donotreply@talentcapitalindia.com'); // change it to yours
            $this->email->to($VendorEmail);// change it to yours
            $this->email->subject('Talent Capital India - Profile Updates Acknowledgement');
            $this->email->message($bodyVendor);
            if($this->email->send()){
		$this->session->set_flashdata('status', 'Please verify your email ');
		redirect('talentcapitalctr/index');
	    }else{
		$this->session->set_flashdata('error', 'Your email is not sent');
		redirect('talentcapitalctr/index');  
            }
	    
	    
        }
	
	function getVendorName($code){
	    $sql="SELECT name FROM vendor where vendor_code='$code'";
	    return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
	
	function getEmailCheck($code){
	    $sql="SELECT * FROM emp_candidate_details where vendor_code='$code'";
	    return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
	
	function getEmailCheckData($code,$checkmail){
	    $sql="SELECT check_email FROM emp_candidate_details where vendor_code='$code' and mail_id='$checkmail' ";
	    return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
        
        function getLocation(){
	    $sql="SELECT location FROM location";
	    return $this->db->query($sql, $return_object = TRUE)->result_array();
	}

	function updatelogindata($id)
	{
	    //echo "<pre>";print_r($_FILES);exit;
	    //$this->db->where('email_random_code', $uniqueCode);
            $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('pan_card_attach');
            $data = $this->upload->data();
            $filePath=$folderPath.$data['file_name'];
	    if($_FILES['pan_card_attach']['name']=="")
	    {
	     $filePath=$this->input->post('oldimage');
	    }	    
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('profile_pic');
            $data = $this->upload->data();
            $profilePic=$folderPath.$data['file_name'];
	    if($_FILES['profile_pic']['name']=="")
	    {
	     $profilePic=$this->input->post('oldimage1');
	    }
		$primary=$this->input->post('primary_other_skils');
		$secondary=$this->input->post('secondary_other_skils');
		//echo $test;exit;
    
		if($primary==null)
		{
		    //$primary="NULL";
		    $primary=$this->input->post('old_prim_other');
		}
		else {
		    $primary=$this->input->post('primary_other_skils');
		}
		
		if($secondary==null)
		{
		   //$secondary='NULL';
		   $secondary=$this->input->post('old_sec_other');
		}
		else {
		    $secondary=$this->input->post('secondary_other_skils');
		}
		
		    $folderPath = $config['upload_path'] = 'upload/';
		    $config['allowed_types'] = 'gif|jpg|png|doc|pdf|docx';     
		    $this->load->library('upload', $config);
		    $this->upload->do_upload('resume_upload');
		    $data = $this->upload->data();
		    $resume=$folderPath.$data['file_name'];
		    if($_FILES['resume_upload']['name']=="")
		    {
		     $resume=$this->input->post('old_resume');
		    }
		    $vendor_code=$this->input->post('vendor_code');
		    $ref_name=$this->input->post('ref_name');
		    $candidate_name=$this->input->post('candidate_name');
		    $mobile_number=$this->input->post('mobile_number');
		    
		    $skills=implode(",",$this->input->post('skills'));
		    $primary_other_skils=$primary;
		    $SecondarySkills=$this->input->post('SecondarySkills');
		    $secondary_other_skils=$secondary;
		    $total_exp_year=$this->input->post('total_exp_year');
		    $total_exp_month=$this->input->post('total_exp_month');
		    $relevant_exp_year=$this->input->post('relevant_exp_year');
		    $relevant_exp_month=$this->input->post('relevant_exp_month');
		    $notice_period=$this->input->post('notice_period');
		    $current_ctc_lakhs=$this->input->post('current_ctc_lakhs');
		    $current_ctc_thousands=$this->input->post('current_ctc_thousands');
		    $expected_ctc_lakhs=$this->input->post('expected_ctc_lakhs');
		    $expected_ctc_thousands=$this->input->post('expected_ctc_thousands');
		    $day=$this->input->post('day');
		    $month=$this->input->post('month');
		    $year=$this->input->post('year');
		    $pan_card_no=$this->input->post('pan_card_no');
		    $pan_card_attach=$filePath;
		    $language_known=implode(",",$this->input->post('language_known'));
		    $current_location=$this->input->post('current_location');
		    $preferred_location=implode(",",$this->input->post('preferred_location'));
		    $interview_timing=$this->input->post('interview_timing');
		    $educational_gap_year=$this->input->post('educational_gap_year');
		    $educational_gap_month=$this->input->post('educational_gap_month');
		    $career_gap_year=$this->input->post('career_gap_year');
		    $career_gap_month=$this->input->post('career_gap_month');
		    $team_size_name=$this->input->post('team_size_name');
		    $team_contact_no=$this->input->post('team_contact_no');
		    $profile_pic=$profilePic;
		    $Check_YN=$this->input->post('check_yn');
		    $yesno=$this->input->post('yesno');
		    //$date = date('d-M-y');
		    //$uptodate=$this->input->post('up_date');
		    //echo $resume;exit;
		    $sql=mysql_query("UPDATE emp_candidate_details SET 	vendor_code='$vendor_code',referrer_name='$ref_name',candidate_name='$candidate_name',mobile_number='$mobile_number',skills='$skills',primary_other_skils='$primary_other_skils',secondary_other_skils='$secondary_other_skils',
				     SecondarySkills='$SecondarySkills',total_exp_year='$total_exp_year',total_exp_month='$total_exp_month',current_ctc_thousands='$current_ctc_thousands',expected_ctc_thousands='$expected_ctc_thousands',relevant_exp_year='$relevant_exp_year',
				     relevant_exp_month='$relevant_exp_month',notice_period='$notice_period',current_ctc_lakhs='$current_ctc_lakhs',expected_ctc_lakhs='$expected_ctc_lakhs',day='$day',month='$month',year='$year',
				     pan_card_no='$pan_card_no',pan_card_attach='$pan_card_attach',language_known='$language_known',current_location='$current_location',preferred_location='$preferred_location',interview_timing='$interview_timing',profile_pic='$profile_pic',
				     educational_gap_year='$educational_gap_year',
				     educational_gap_month='$educational_gap_month',
				     career_gap_year='$career_gap_year',
				     career_gap_month='$career_gap_month',
				     team_size_name='$team_size_name',
				     team_contact_no='$team_contact_no',
				     resume='$resume',
				     check_yn='$Check_YN',
				     yesno='$yesno'
				     
				     where id='$id'");
		    //echo $sql;exit;
		    $select = mysql_query($sql);

            $clientCnt = count($this->input->post('client_comp'));
	    $files=$_FILES;	    
            for($i=0; $i<$clientCnt; $i++)
            {
		$dataStore="";
		if($_POST['update_emp'][$i]=='UPDATE')
		{
		    //$counter = count($_POST['emp_lineid']);
		    $fileCount=count($files['file_employee_upload']['name'][$i]);
		    for($j=0; $j<$fileCount; $j++)
		    {
			
			$line_id=$_POST['emp_lineid'][$i];
			$_FILES['file_employee_upload']['name']= $files['file_employee_upload']['name'][$i][$j];
			$_FILES['file_employee_upload']['type']= $files['file_employee_upload']['type'][$i][$j];
			$_FILES['file_employee_upload']['tmp_name'] = $files['file_employee_upload']['tmp_name'][$i][$j];
			$_FILES['file_employee_upload']['error']= $files['file_employee_upload']['error'][$i][$j];
			$_FILES['file_employee_upload']['size']= $files['file_employee_upload']['size'][$i][$j];
			//$config['upload_path'] = 'upload/';
			$config['allowed_types'] = '*';	   
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('file_employee_upload');
			$file_data=$this->upload->data();
			$file_name=$file_data['file_name'];
			$file_size=$file_data['file_size'];
			$file_size=$file_size/1024;//for KB
			$folderPath = $config['upload_path'] = 'upload/';
			$target_file = $folderPath.$file_name;
			if($j==0){
			    $dataStore=$target_file;
			}else{
			    $dataStore=$dataStore.','.$target_file;
			}
			 //echo $target_file;exit;
			if($_FILES['file_employee_upload']['name']=="")
			{
			    $dataStore=$_POST['file_employee_upload_old'][$i][$j];
			}
		    }
		     //echo $target_file;exit;
		    $data= array(
			'client_comp'=>$_POST['client_comp'][$i],
			'payroll_comp'=>$_POST['payroll_comp'][$i],
			'designation'=>$_POST['designation'][$i],
			'emp_duration_from'=>$_POST['emp_duration_from'][$i],
			'emp_duration_to'=>$_POST['emp_duration_to'][$i],
			'location'=>$_POST['location'][$i],
			'reason_desc'=>$_POST['empReasonDesc'][$i],
			'file_employee_upload'=>$dataStore,
		    );
		    //echo "<pre>";
		    //print_r($data);
		    $this->db->where('id', $line_id);
		    $this->db->update('employement_details',$data);
		}
		
		else if($_POST['update_emp'][$i]=='INSERT') {
		//    print_r($files['file_employee_upload']['name'][$i]);
		//exit;
		    $fileCount=count($files['file_employee_upload']['name'][$i]);
		    
		    for($j=0; $j<$fileCount; $j++)
		    {
			//$line_id=$_POST['emp_lineid'][$i];
			$_FILES['file_employee_upload']['name']= $files['file_employee_upload']['name'][$i][$j];
			$_FILES['file_employee_upload']['type']= $files['file_employee_upload']['type'][$i][$j];
			$_FILES['file_employee_upload']['tmp_name'] = $files['file_employee_upload']['tmp_name'][$i][$j];
			$_FILES['file_employee_upload']['error']= $files['file_employee_upload']['error'][$i][$j];
			$_FILES['file_employee_upload']['size']= $files['file_employee_upload']['size'][$i][$j];
			//$config['upload_path'] = 'upload/';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('file_employee_upload');
			$file_data=$this->upload->data();
			$file_name=$file_data['file_name'];
			$file_size=$file_data['file_size'];
			$file_size=$file_size/1024;//for KB
			$folderPath = $config['upload_path'] = 'upload/';
			$target_file =$folderPath.$file_name;
			if($j==0){
			    $dataStore=$target_file;
			}else{
			    $dataStore=$dataStore.','.$target_file;
			}
		    }
		    
		    $data1= array(
			'head_id'=>$this->input->post('hiddenId'),
			'client_comp'=>$_POST['client_comp'][$i],
			'payroll_comp'=>$_POST['payroll_comp'][$i],
			'designation'=>$_POST['designation'][$i],
			'emp_duration_from'=>$_POST['emp_duration_from'][$i],
			'emp_duration_to'=>$_POST['emp_duration_to'][$i],
			'location'=>$_POST['location'][$i],
			'reason_desc'=>$_POST['empReasonDesc'][$i],
			'file_employee_upload'=>$dataStore,
		    );
		    
		    $this->db->insert('employement_details',$data1);
		}
		
            }
            $degreeCnt = count($this->input->post('degree'));
	    
	    $files=$_FILES;
            for($j=0; $j<$degreeCnt; $j++)
            {
		
		$dataStore="";
		
		    //$counter = count($_POST['edu_lineid']);
		    //print_r($_POST['edu_lineid'][$j]);
		    //exit;
		    $fileCount=count($files['file_student_upload']['name'][$j]);
		    
		    for($k=0; $k<$fileCount; $k++)
		    {
			$line_id=$_POST['edu_lineid'][$j];
			//print_r($line_id);
		    
			$_FILES['file_student_upload']['name']= $files['file_student_upload']['name'][$j][$k];
			$_FILES['file_student_upload']['type']= $files['file_student_upload']['type'][$j][$k];
			$_FILES['file_student_upload']['tmp_name'] = $files['file_student_upload']['tmp_name'][$j][$k];
			$_FILES['file_student_upload']['error']= $files['file_student_upload']['error'][$j][$k];
			$_FILES['file_student_upload']['size']= $files['file_student_upload']['size'][$j][$k];
			//$config['upload_path'] = 'upload/';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('file_student_upload');
			$file_data=$this->upload->data();
			$file_name=$file_data['file_name'];
			$file_size=$file_data['file_size'];
			$file_size=$file_size/1024;//for KB
			$folderPath = $config['upload_path'] = 'upload/';
			$target_file =$folderPath.$file_name;
			//print_r($target_file);
			if($k==0){
			    $dataStore=$target_file;
			}else{
			    $dataStore=$dataStore.','.$target_file;
			}
			
			if($_FILES['file_student_upload']['name']=="")
			{
			    $dataStore=$_POST['file_student_upload_old'][$j][$k];
			}
		    }
		    $data= array(
			'degree'=>$_POST['degree'][$j],
			'specialisation'=>$_POST['specialisation'][$j],
			'edu_duration_from'=>$_POST['edu_duration_from'][$j],
			'edu_duration_to'=>$_POST['edu_duration_to'][$j],
			'university'=>$_POST['university'][$j],
			'percentage'=>$_POST['percentage'][$j],
			'reason_desc'=>$_POST['reasonDesc'][$j],
			'file_student_upload'=>$dataStore,
		    );
		    //echo "<pre>";
		    //print_r($data);
		   
		    $this->db->where('id', $line_id);
		    $this->db->update('educational_details',$data);
		
            }
	    
        }

       function CheckLoginType($email,$pwd)
       {
          $sql="SELECT * FROM emp_candidate_details where mail_id='$email' and password='$pwd'";
          return $result= $this->db->query($sql, $return_object = TRUE)->result_array();
       }
       function GetEmpl_details($emp_id)
       {
         $sql="SELECT * FROM employement_details where head_id='$emp_id'";
         return $this->db->query($sql, $return_object = TRUE)->result_array();
       }
       function Geteducational_details($emp_id)
       {
         $sql="SELECT * FROM educational_details where head_id='$emp_id'";
         return $this->db->query($sql, $return_object = TRUE)->result_array();
       }
       
       function getskillDetails(){
	    $sql="SELECT * FROM skill";
	    return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
	function getlanguageDetails(){
	    $sql="SELECT * FROM language";
	    return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
	
	function updateprofile($id){
	    $sql="SELECT * FROM vendor where id='$id' order by id DESC";
	    return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
	
	function updateedit_profile($id){
	    
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';            
            $this->load->library('upload', $config);
            $this->upload->do_upload('pan_attach_copy');
            $data1 = $this->upload->data();
            $filePath1=$folderPath.$data1['file_name'];
            $this->upload->do_upload('address_attach_proof');
            $data2 = $this->upload->data();
            $filePath2=$folderPath.$data2['file_name'];
            $this->upload->do_upload('bank_attach_cheque');
            $data3 = $this->upload->data();              
            $filePath3=$folderPath.$data3['file_name'];
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('profile_pic');
            $data = $this->upload->data();
            $profilePic=$folderPath.$data['file_name'];
	    if($_FILES['profile_pic']['name']=="")
	    {
		$profilePic=$this->input->post('profile_oldimage');
	    }
	    if($_FILES['bank_attach_cheque']['name']=="")
	    {
		$filePath3=$this->input->post('bank_oldimage');
	    }
	    if($_FILES['address_attach_proof']['name']=="")
	    {
		$filePath2=$this->input->post('address_oldimage');
	    }
	    if($_FILES['pan_attach_copy']['name']=="")
	    {
		$filePath1=$this->input->post('pan_oldimage');
	    }
            
            $data= array(
                'name'=>$this->input->post('name'),
                'mobile_number'=>$this->input->post('mobile_number'),
                'pan_attach_no'=>$this->input->post('pan_attach_no'),
                'pan_attach_copy'=>$filePath1,
                'address_attach_proof'=>$filePath2,
                'address_text'=>$this->input->post('address_text'),
                'bank_attach_cheque'=>$filePath3,
		'profile_pic'=>$profilePic,
            );
	    //echo "<pre>";
	    //print_r($data);exit;
	    $this->db->where('id', $id);
	    $this->db->update('vendor', $data);
	    redirect('vendorlogin/dashboard');
	}

    }
?>