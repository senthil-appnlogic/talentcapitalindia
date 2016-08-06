<?php
date_default_timezone_set("Asia/Calcutta");
class vendormodel extends CI_Model {


    
    function checkVendorLogin()
    {
	
	$user_id = $this->input->post('email');
	$password = $this->input->post('password');
	$sql="SELECT * FROM vendor where email='$user_id' AND password='$password' and status='Y'";
	$query = $this->db->query($sql, $return_object = TRUE);
	
	if($query->num_rows > 0){
	    return $query->result_array();
	}
	else
	{
	    return false;
	}
    }
   
    function candidateCount(){
	$vendor_code = $this->session->userdata('vendor_code'); 
	$sql="SELECT COUNT(vendor_code) vendor_code FROM emp_candidate_details where vendor_code='$vendor_code'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
	
    
    
    }
    
    function vendorDetails(){
	$vendor_code = $this->session->userdata('vendor_code'); 
	//$sql="SELECT *  FROM emp_candidate_details where vendor_code='$vendor_code'";
	//$sql="SELECT ed.id, ed.degree, ed.specialisation, ed.edu_duration_from, ed.edu_duration_to, ed.university, ed.percentage, ed.reason_desc, emp.client_comp, emp.payroll_comp, emp.designation, emp.emp_duration_from, emp.emp_duration_to, emp.location, emp.reason_desc, emc.vendor_code, emc.candidate_name, emc.mobile_number, emc.mail_id, emc.skills, emc.primary_other_skils, emc.SecondarySkills, emc.secondary_other_skils, emc.total_exp_year, emc.total_exp_month, emc.relevant_exp_year, emc.relevant_exp_month, emc.notice_period, emc.current_ctc_lakhs, emc.current_ctc_thousands, emc.expected_ctc_lakhs, emc.expected_ctc_thousands, emc.day, emc.month, emc.year, emc.pan_card_no, emc.pan_card_attach, emc.language_known, emc.current_location, emc.preferred_location, emc.interview_timing, emc.profile_pic, emc.educational_gap_year, emc.career_gap_year, emc.team_size_name, emc.team_contact_no, emc.email_random_code, emc.password, emc.password_token,emc.cr_date, emc.login_types
	//	FROM educational_details ed
	//	INNER JOIN employement_details emp ON emp.head_id = ed.head_id
	//	INNER JOIN emp_candidate_details emc ON emc.id = emp.head_id WHERE vendor_code = '$vendor_code' order by emc.cr_date desc";
	
	$sql="select emp_candidate_details.id,emp_candidate_details.vendor_code, emp_candidate_details.candidate_name, emp_candidate_details.mobile_number, emp_candidate_details.mail_id, emp_candidate_details.skills, emp_candidate_details.primary_other_skils, emp_candidate_details.SecondarySkills, emp_candidate_details.secondary_other_skils, emp_candidate_details.total_exp_year, emp_candidate_details.total_exp_month, emp_candidate_details.relevant_exp_year, emp_candidate_details.relevant_exp_month, emp_candidate_details.notice_period, emp_candidate_details.current_ctc_lakhs, emp_candidate_details.current_ctc_thousands, emp_candidate_details.expected_ctc_lakhs, emp_candidate_details.expected_ctc_thousands, emp_candidate_details.day, emp_candidate_details.month, emp_candidate_details.year, emp_candidate_details.pan_card_no, emp_candidate_details.pan_card_attach, emp_candidate_details.language_known, emp_candidate_details.current_location, emp_candidate_details.preferred_location, emp_candidate_details.interview_timing, emp_candidate_details.profile_pic, emp_candidate_details.educational_gap_year, emp_candidate_details.career_gap_year, emp_candidate_details.team_size_name, emp_candidate_details.team_contact_no, emp_candidate_details.email_random_code, emp_candidate_details.password, emp_candidate_details.password_token, emp_candidate_details.cr_date, emp_candidate_details.login_types, emp_candidate_details.referrer_name,
		MAX(CASE WHEN p.RowNum=1 THEN p.degree END) as SSLCDegree,
		MAX(CASE WHEN p.RowNum=1 THEN p.specialisation END) as SSLCSpecialization,
		MAX(CASE WHEN p.RowNum=1 THEN p.edu_duration_from END) as SSLCFromDuration,
		MAX(CASE WHEN p.RowNum=1 THEN p.edu_duration_to END) as SSLCToDuration,
		MAX(CASE WHEN p.RowNum=1 THEN p.university END) as SSLCUniversity,
		MAX(CASE WHEN p.RowNum=1 THEN p.percentage END) as SSLCPercentage,
		MAX(CASE WHEN p.RowNum=2 THEN p.degree END) as HSCDegree,
		MAX(CASE WHEN p.RowNum=2 THEN p.specialisation END) as HSCSpecialization,
		MAX(CASE WHEN p.RowNum=2 THEN p.edu_duration_from END) as HSCFromDuration,
		MAX(CASE WHEN p.RowNum=2 THEN p.edu_duration_to END) as HSCToDuration,
		MAX(CASE WHEN p.RowNum=2 THEN p.university END) as HSCUniversity,
		MAX(CASE WHEN p.RowNum=2 THEN p.percentage END) as HSCPercentage,
		MAX(CASE WHEN p.RowNum=3 THEN p.degree END) as UGDegree,
		MAX(CASE WHEN p.RowNum=3 THEN p.specialisation END) as UGSpecialization,
		MAX(CASE WHEN p.RowNum=3 THEN p.edu_duration_from END) as UGFromDuration,
		MAX(CASE WHEN p.RowNum=3 THEN p.edu_duration_to END) as UGToDuration,
		MAX(CASE WHEN p.RowNum=3 THEN p.university END) as UGUniversity,
		MAX(CASE WHEN p.RowNum=3 THEN p.percentage END) as UGPercentage,
		MAX(CASE WHEN p.RowNum=4 THEN p.degree END) as PGDegree,
		MAX(CASE WHEN p.RowNum=4 THEN p.specialisation END) as PGSpecialization,
		MAX(CASE WHEN p.RowNum=4 THEN p.edu_duration_from END) as PGFromDuration,
		MAX(CASE WHEN p.RowNum=4 THEN p.edu_duration_to END) as PGToDuration,
		MAX(CASE WHEN p.RowNum=4 THEN p.university END) as PGUniversity,
		MAX(CASE WHEN p.RowNum=4 THEN p.percentage END) as PGPercentage,
		MAX(CASE WHEN s.RowNum6=1 THEN s.client_comp END) as FirstClientCompany,
		MAX(CASE WHEN s.RowNum7=1 THEN s.payroll_comp END) as FirstPayrollCompany,
		MAX(CASE WHEN s.RowNum8=1 THEN s.designation END) as FirstDesignation,
		MAX(CASE WHEN s.RowNum9=1 THEN s.emp_duration_from END) as FirstFromDuration,
		MAX(CASE WHEN s.RowNum10=1 THEN s.emp_duration_to END) as FirstToDuration,
		MAX(CASE WHEN s.RowNum11=1 THEN s.location END) as FirstLocation,
		MAX(CASE WHEN s.RowNum6=2 THEN s.client_comp END) as SecondClientCompany,
		MAX(CASE WHEN s.RowNum7=2 THEN s.payroll_comp END) as SecondPayrollCompany,
		MAX(CASE WHEN s.RowNum8=2 THEN s.designation END) as SecondDesignation,
		MAX(CASE WHEN s.RowNum9=2 THEN s.emp_duration_from END) as SecondFromDuration,
		MAX(CASE WHEN s.RowNum10=2 THEN s.emp_duration_to END) as SecondToDuration,
		MAX(CASE WHEN s.RowNum11=2 THEN s.location END) as SecondLocation,
		MAX(CASE WHEN s.RowNum6=3 THEN s.client_comp END) as ThirdClientCompany,
		MAX(CASE WHEN s.RowNum7=3 THEN s.payroll_comp END) as ThirdPayrollCompany,
		MAX(CASE WHEN s.RowNum8=3 THEN s.designation END) as ThirdDesignation,
		MAX(CASE WHEN s.RowNum9=3 THEN s.emp_duration_from END) as ThirdFromDuration,
		MAX(CASE WHEN s.RowNum10=3 THEN s.emp_duration_to END) as ThirdToDuration,
		MAX(CASE WHEN s.RowNum11=3 THEN s.location END) as ThirdLocation
	
		FROM emp_candidate_details
		INNER JOIN
		(
		  SELECT educational_details.*,
		       if(@head_id<>head_id,@rn:=0,@rn),
			if(@head_id<>head_id,@rn1:=0,@rn1),
			if(@head_id<>head_id,@rn2:=0,@rn2),
			if(@head_id<>head_id,@rn3:=0,@rn3),
			if(@head_id<>head_id,@rn4:=0,@rn4),
			if(@head_id<>head_id,@rn5:=0,@rn5),
			@head_id:=head_id,
			@rn:=@rn+1 as RowNum,
			@rn1:=@rn1+1 as RowNum1,
			@rn2:=@rn2+1 as RowNum2,
			@rn3:=@rn3+1 as RowNum3,
			@rn4:=@rn4+1 as RowNum4,
			@rn5:=@rn5+1 as RowNum5
		
		  FROM educational_details, (Select @rn:=0,@head_id:=0) as t
		  ORDER BY head_id,id
		 ) as P
		   ON emp_candidate_details.id=p.head_id
		
		INNER JOIN
		(
		  SELECT employement_details.*,
		       if(@head_id<>head_id,@rn6:=0,@rn6),
			if(@head_id<>head_id,@rn7:=0,@rn7),
			if(@head_id<>head_id,@rn8:=0,@rn8),
			if(@head_id<>head_id,@rn9:=0,@rn9),
			if(@head_id<>head_id,@rn10:=0,@rn10),
			if(@head_id<>head_id,@rn11:=0,@rn11),
			@head_id:=head_id,
			@rn6:=@rn6+1 as RowNum6,
			@rn7:=@rn7+1 as RowNum7,
			@rn8:=@rn8+1 as RowNum8,
			@rn9:=@rn9+1 as RowNum9,
			@rn10:=@rn10+1 as RowNum10,
			@rn11:=@rn11+1 as RowNum11
		
		  FROM employement_details, (Select @rn:=0,@head_id:=0) as u
		  ORDER BY head_id,id
		 ) as S
		   ON emp_candidate_details.id=s.head_id WHERE vendor_code = '$vendor_code'
		
		GROUP BY emp_candidate_details.id";

	return $this->db->query($sql, $return_object = TRUE)->result_array();
	
    
    
    }
    function vendorPrintDetails($sys_head_id)
    {
	$sql="SELECT * FROM emp_candidate_details where id='$sys_head_id'";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function getCandidateId($id){
	$sql="SELECT head_id FROM educational_details where id='$id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function getCandidateDetails($newId){
	
	$sql="SELECT *  FROM emp_candidate_details where id='$newId'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
	
    }
    function getEmployeeDetails($newId){
	
	$sql="SELECT *  FROM employement_details where head_id='$newId'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();

    }
    function getEducationalDetails($newId){
	
	$sql="SELECT *  FROM educational_details where head_id='$newId'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
	
    }
    //Vendor Login functionality Ends
    function mailToCandiate(){
	$date = date('d-M-y H:i');
	$session_username = $this->session->userdata('vendorusername');
	$vendorCode = $this->input->post('vendor_code');
	$vendorname = $this->input->post('vendor_name');
	$email = $this->input->post('email');
	$this->mailToCandidate($email,$vendorCode,$vendorname,$session_username,$date);
    }
    function vendorDelete($id){

	 $this->db->where("id",$id);
         $this->db->delete("educational_details");
    }
    
    //vendor edit
     function getvendorDetailEdit($id){
    
	$sql="SELECT vendor_code,name,mobile_number,email,profile_pic FROM vendor where vendor_code='$id'";
       
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function adminVendorEdit($id){
	$folderPath = $config['upload_path'] = 'upload/';
	$config['allowed_types'] = 'gif|jpg|png|pdf';
	$this->load->library('upload', $config);
	$this->upload->do_upload('profile_pic');
	$data = $this->upload->data();
	$filePath=$folderPath.$data['file_name'];
	if($_FILES['profile_pic']['name']=="")
	    {
		$filePath=$this->input->post('oldimage');
	    }
	$data = array(
	    'name'=>$this->input->post('name'),
	    'mobile_number'=>$this->input->post('mobile_number'),
	    'email'=>$this->input->post('email'),
	    'profile_pic'=>$filePath,
	);
	
        $this->db->where("vendor_code",$id);
	$this->db->update("vendor",$data);

    }
    
    
    function mailToCandidate($email,$vendorCode,$vendorname,$session_username,$date)
    {
	$body ="<html>
		    <head>
			<title>Welcome to Talent Capital</title>
		    </head>
		    <body>
			<h3>Dear Candidate</h3>
			<p>You are refered to register in Talent Capital India by <span >".$session_username."</span></p>
			<p>Please click below link to register with talent capital</p>
			<p>".base_url()."talentcapitalctr/hiringPartnerLink/".$vendorCode."/".$email."</p>
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
	$this->email->subject('Talent capital India - Please register with us');
	$this->email->message($body);
	if($this->email->send()){
	    
	    $data= array(
		    'email'=>$email,
		    'refer_code'=>$vendorCode,
		    'refer_name'=>$vendorname,
		    'check_mailid'=>'no',
		    'cr_date'=>$date,
		);
	    $this->db->insert('emailtrack',$data);
	    $this->session->set_flashdata('status', 'Email has been sent to User Successfully');
	    redirect('vendorlogin/vendorAddUser');
	}else{
	    $this->session->set_flashdata('status', 'Email has not sent to User');
	    redirect('vendorlogin/vendorAddUser');
	}
    }
    
    function CheckEmail($email)
    {
	$sql="SELECT * FROM vendor INNER JOIN emp_candidate_details WHERE email = '$email' OR mail_id = '$email'";
	
	return $result= $this->db->query($sql, $return_object = TRUE)->result_array();
    }

    function getlanguageDetails()
    {
	$sql="SELECT * FROM language";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function getskillDetails(){
	$sql="SELECT * FROM skill";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function getLocation(){
	$sql="SELECT location FROM location";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function emailtracklist($session_code,$check_mail)
    {
	$sql="select * from emailtrack where refer_code='$session_code' and check_mailid='$check_mail' order by cr_date desc";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
}