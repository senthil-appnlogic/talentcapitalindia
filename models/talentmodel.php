<?php
date_default_timezone_set("Asia/Calcutta");
class talentModel extends CI_Model {

    function checkAdminLogin()
    {
	$email = $this->input->post('email');
	$password = $this->input->post('password');
	$sql="SELECT * FROM login_auth where email='$email' AND password='$password' AND status='Y'";
	$query = $this->db->query($sql, $return_object = TRUE);
	//print_r($query->num_rows);
	//exit;
	if($query->num_rows > 0){
	    return $query->result_array();
	}
	else
	{
	    return false;
	}
    }
    
    //1.USER VIEW STARTS
    function userDetails(){
	$sql="SELECT id,user_name,email,password,user_image,status,role,intemp_code,password_token,date_format(cr_date, '%e-%b-%y') as 'cr_date1' FROM login_auth ORDER BY cr_date DESC";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    //add
    function addUser(){
	
	    $sql = "SELECT tcie_number FROM tci_code";
	    $codeTcie = $this->db->query($sql, $return_object = TRUE)->result_array();
	    $tcie = $codeTcie[0]['tcie_number'];
	    $tcieCode='TCIE'.$tcie;
	    $IntEmpCode=$tcieCode;
	
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
                  
            $this->load->library('upload', $config);
            $this->upload->do_upload('user_image');
            $data = $this->upload->data();
            $filePath=$folderPath.$data['file_name'];
	    $role=$this->input->post('user_role');
	    //$date = date('d-M-y');
	    if($role=="Admin"){
		$data = array(
		'role'=>$role,
		'user_name'=>$this->input->post('username'),
		'password'=>$this->input->post('password'),
		'email'=>$this->input->post('email'),
		'user_image'=>$filePath,
		'status'=>'Y',
		//'cr_date'=>$date,
		);
	    }else{
		$data = array(
		'role'=>$role,
		'user_name'=>$this->input->post('username'),
		'password'=>$this->input->post('password'),
		'email'=>$this->input->post('email'),
		'user_image'=>$filePath,
		'intemp_code'=>$IntEmpCode,
		'status'=>'Y',
		//'cr_date'=>$date,
		);
	    }
	      //echo "<pre>";
	      //print_r($data);exit;
	    $this->db->insert("login_auth",$data);
	    $IntEmpTcie = substr($IntEmpCode,4);
	    $newCode = $IntEmpTcie + 1;
	    $this->tcieUpdate($IntEmpTcie,$newCode);
	    
    }

    function tcieUpdate($IntEmpTcie,$newCode)
    {
	$this->db->where('tcie_number', $IntEmpTcie);
	$data= array(
	    'tcie_number'=>$newCode,
	);
	$select = $this->db->update('tci_code',$data);
    }
    
    function getuserDetails($id){
    
     $sql="SELECT * FROM login_auth where id='$id'";
     return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
     function editUser($id){
      $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
                   
            $this->load->library('upload', $config);
            $this->upload->do_upload('user_image');
            $data = $this->upload->data();
            $filePath=$folderPath.$data['file_name'];
             if($_FILES['user_image']['name']=="")
		{
			$filePath=$this->input->post('oldimage');
		}
	$data = array(
	    'user_name'=>$this->input->post('username'),
	    'password'=>$this->input->post('password'),
	    'email'=>$this->input->post('email'),
	    'user_image'=>$filePath,
	    );
	      
	   $this->db->where("id",$id);
	    $this->db->update("login_auth",$data);
     
     
     }
    
    //UserDelete
    function userDelete($id){
	$this->db->where("id",$id);
	$this->db->delete("login_auth");
    }
    
    
    //already user exits
    function ajaxUserView($email)
        {
        $sql="SELECT * FROM login_auth where email='$email'";
        $result=$this->db->query($sql)->result();
	return count($result);
        }
	//admin profile edit
	
	    function getuserDetailEdit($id){
    
     $sql="SELECT * FROM login_auth where user_name='$id'";
    
     return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function adminEdit($id){
	$folderPath = $config['upload_path'] = 'upload/';
	$config['allowed_types'] = 'gif|jpg|png|pdf';
	       
	$this->load->library('upload', $config);
	$this->upload->do_upload('user_image');
	$data = $this->upload->data();
	$filePath=$folderPath.$data['file_name'];
	 if($_FILES['user_image']['name']=="")
	    {
		$filePath=$this->input->post('oldimage');
	    }
	$data = array(
	'user_name'=>$this->input->post('username'),
	'password'=>$this->input->post('password'),
	'email'=>$this->input->post('email'),
	'user_image'=>$filePath,
	);
	  
       $this->db->where("user_name",$id);
	$this->db->update("login_auth",$data);
	//print_r($sql);exit;
     
    }
    
    
    
    
    
    
    
    //USER VIEW ENDS
    
    
    
    function vendorDetails()
    {
	//date_format(cr_date, '%e-%b-%y') as 'cr_date'
	$sql="select id,email_random_code,password,password_token,vendor_code,name,mobile_number,email,pan_attach_no,pan_attach_copy,address_attach_proof,address_text,bank_attach_cheque,status,profile_pic,login_types,check_email,date_format(cr_date, '%e-%b-%y') as 'cr_date1' from vendor where login_types= 'vendor' order by cr_date desc";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function emailtracklist($vendor_code,$check_mail)
    {
	$sql="select * from emailtrack where refer_code='$vendor_code' and check_mailid='$check_mail' order by cr_date desc";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function emailTrack($check_mail)
    {
	$sql="select id,email,refer_code,refer_name,check_mailid,date_format(cr_date, '%e-%b-%y') as 'cr_date1' from emailtrack where check_mailid='$check_mail' order by cr_date desc";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function getVendorReferal()
    {
	$vendorcode=$this->session->userdata('vendorcode');
	$sql="SELECT * FROM vendor where vendor_code='$vendorcode'";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function vendorPrintDetails($sys_head_id)
    {
	$sql="SELECT * FROM vendor where id='$sys_head_id'";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function applicantPrintDetails($sys_head_id)
    {
	$sql="SELECT * FROM applicant where id='$sys_head_id'";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function employeeHeadPrintDetails($sys_head_id)
    {
	$sql="SELECT * FROM emp_candidate_details where id='$sys_head_id'";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function employeeCandidatePrintDetails($sys_head_id)
    {
	$sql="SELECT * FROM educational_details where id='$sys_head_id'";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function employeePrintDetails($sys_head_id)
    {
	$sql="SELECT * FROM employement_details where id='$sys_head_id'";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    
    function vendorAdd(){
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
                 
            $this->load->library('upload', $config);
            $this->upload->do_upload('vendor_pancard_image');
            $data = $this->upload->data();
            $filePath=$folderPath.$data['file_name'];
	
	$data= array(
	   
	    'username'=>$this->input->post('username'),
	    'mobileno'=>$this->input->post('mobileno'),
	    'email'=>$this->input->post('email'),
	    'vendor_pancard_no'=>$this->input->post('vendor_pancard_no'),
	    'vendor_pancard_image'=>$filePath,
	    'location'=>$this->input->post('location'),
	);
	
	 $this->db->insert('register_users',$data);
    }
    
    function vendorEdit($id){
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
                 
            $this->load->library('upload', $config);
            $this->upload->do_upload('vendor_pancard_image');
            $data = $this->upload->data();
            $filePath=$folderPath.$data['file_name'];
	    
	    if($_FILES['vendor_pancard_image']['name']=="")
	    {
		    $filePath=$this->input->post('oldimage');
	    }
			  
            
                 
	$data = array(
		'username'=>$this->input->post('username'),
		'mobileno'=>$this->input->post('mobileno'),
		'email'=>$this->input->post('email'),
		//'vendor_pancard_no'=>$this->input->post('vendor_pancard_no'),
		//'vendor_pancard_image'=>$filePath,
		//'location'=>$this->input->post('location'),
	       );
		    $this->db->where("id",$id);
		    $this->db->update("	",$data);
    }
    function getVendorDetails($id){
	$sql="SELECT * FROM vendor where id='$id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
   function hiringPartnerDelete($id){
    $this->db->where("id",$id);
    $this->db->delete("vendor");
   }
   
    function getEmployeeCrdate(){
	$sql = "SELECT DATE_FORMAT((cr_date),'%e-%b-%y' ) from emp_candidate_details";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
  
    function employeeDetails()
    {
	
//	$sql="SELECT * FROM emp_candidate_details order by id desc";
//     	return $this->db->query($sql, $return_object = TRUE)->result_array();

	//$sql="SELECT ed.id, ed.degree, ed.specialisation, ed.edu_duration_from, ed.edu_duration_to, ed.university, ed.percentage, ed.reason_desc, emp.client_comp, emp.payroll_comp, emp.designation, emp.emp_duration_from, emp.emp_duration_to, emp.location, emp.reason_desc, emc.vendor_code, emc.candidate_name, emc.mobile_number, emc.mail_id, emc.skills, emc.primary_other_skils, emc.SecondarySkills, emc.secondary_other_skils, emc.total_exp_year, emc.total_exp_month, emc.relevant_exp_year,emc.relevant_exp_month, emc.notice_period, emc.current_ctc_lakhs, emc.current_ctc_thousands, emc.expected_ctc_lakhs,emc.expected_ctc_thousands, emc.day, emc.month, emc.year, emc.pan_card_no, emc.pan_card_attach, emc.language_known, emc.current_location, emc.preferred_location, emc.interview_timing, emc.profile_pic, emc.educational_gap_year, emc.career_gap_year, emc.team_size_name, emc.team_contact_no, emc.email_random_code, emc.password, emc.password_token, emc.cr_date, emc.login_types, emc.referrer_name
	//	FROM educational_details ed
	//	INNER JOIN employement_details emp ON emp.head_id = ed.head_id
	//	INNER JOIN emp_candidate_details emc ON emc.id = emp.head_id order by emc.cr_date DESC";
	
	
	$sql="select emp_candidate_details.id,emp_candidate_details.vendor_code, emp_candidate_details.candidate_name, emp_candidate_details.mobile_number, emp_candidate_details.mail_id, emp_candidate_details.skills, emp_candidate_details.primary_other_skils, emp_candidate_details.SecondarySkills, emp_candidate_details.secondary_other_skils, emp_candidate_details.total_exp_year, emp_candidate_details.total_exp_month, emp_candidate_details.relevant_exp_year, emp_candidate_details.relevant_exp_month, emp_candidate_details.notice_period, emp_candidate_details.current_ctc_lakhs, emp_candidate_details.current_ctc_thousands, emp_candidate_details.expected_ctc_lakhs, emp_candidate_details.expected_ctc_thousands, emp_candidate_details.day, emp_candidate_details.month, emp_candidate_details.year, emp_candidate_details.pan_card_no, emp_candidate_details.pan_card_attach, emp_candidate_details.language_known, emp_candidate_details.current_location, emp_candidate_details.preferred_location, emp_candidate_details.interview_timing, emp_candidate_details.profile_pic, emp_candidate_details.educational_gap_year, emp_candidate_details.career_gap_year, emp_candidate_details.team_size_name, emp_candidate_details.team_contact_no, emp_candidate_details.email_random_code, emp_candidate_details.password, emp_candidate_details.password_token, date_format(cr_date, '%e-%b-%y') as 'cr_date1', emp_candidate_details.login_types, emp_candidate_details.referrer_name,emp_candidate_details.client,
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
		 ) as p
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
		 ) as s
		   ON emp_candidate_details.id=s.head_id
		
		GROUP BY emp_candidate_details.id
		ORDER BY emp_candidate_details.cr_date DESC";

	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    
    function employeeAdd()
        {
            $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('pan_card_attach');
            $data = $this->upload->data();
            $filePath=$folderPath.$data['file_name'];
     
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';     
            $this->load->library('upload', $config);
            $this->upload->do_upload('profile_pic');
            $data = $this->upload->data();
            $profilePic=$folderPath.$data['file_name'];
            
            $data= array(
//                'candidate_name'=>$this->input->post('candidate_name'),
//                'mobile_number'=>$this->input->post('mobile_number'),
//                'mail_id'=>$this->input->post('mail_id'),
//                'skills'=>implode(",",$this->input->post('skills')),
//                'total_exp_year'=>$this->input->post('total_exp_year'),
//		'total_exp_month'=>$this->input->post('total_exp_month'),
//                'relevant_exp'=>$this->input->post('relevant_exp'),
//                'notice_period'=>$this->input->post('notice_period'),
//                'current_ctc'=>$this->input->post('current_ctc'),
//                'expected_ctc'=>$this->input->post('expected_ctc'),
//                'day'=>$this->input->post('day'),
//                'month'=>$this->input->post('month'),
//                'year'=>$this->input->post('year'),
//                'pan_card_no'=>$this->input->post('pan_card_no'),
//                'pan_card_attach'=>$filePath,
//                'language_known'=>implode(",",$this->input->post('language_known')),
//                'current_location'=>$this->input->post('current_location'),
//                'preferred_location'=>$this->input->post('preferred_location'),
//                'interview_timing'=>$this->input->post('interview_timing'),
//                'educational_gap_year'=>$this->input->post('educational_gap_year'),
//                'career_gap_year'=>$this->input->post('career_gap_year'),
//                'team_size_name'=>$this->input->post('team_size_name'),
//                'team_contact_no'=>$this->input->post('team_contact_no'),
//		'profile_pic'=>$profilePic
                'candidate_name'=>$this->input->post('candidate_name'),
		'middle_name'=>$this->input->post('middle_name'),
		'last_name'=>$this->input->post('last_name'),
                'mobile_number'=>$this->input->post('mobile_number'),
		'password'=>$this->input->post('confirm_password'),
                'mail_id'=>$this->input->post('mail_id'),
                'skills'=>implode(",",$this->input->post('skills')),
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

            );
            $select = $this->db->insert('emp_candidate_details',$data);
            $getHeadId=$this->db->insert_id($select);
            
            $clientCnt = count($this->input->post('client_comp'));
            for($i=0; $i<$clientCnt; $i++)
            {
                if($_POST['client_comp'][$i]!=''){
                    $data= array(
                        'head_id'=>$getHeadId,
                        'client_comp'=>$_POST['client_comp'][$i],
                        'payroll_comp'=>$_POST['payroll_comp'][$i],
                        'designation'=>$_POST['designation'][$i],
                        'emp_duration_from'=>$_POST['emp_duration_from'][$i],
                        'emp_duration_to'=>$_POST['emp_duration_to'][$i],
                        'location'=>$_POST['location'][$i],
                    );
                    $this->db->insert('employement_details',$data);                    
                }
            }
            
            $degreeCnt = count($this->input->post('degree'));
            for($j=0; $j<$degreeCnt; $j++)
            {
                if($_POST['degree'][$j]!=''){
                    $data= array(
                        'head_id'=>$getHeadId,
                        'degree'=>$_POST['degree'][$j],
                        'specialisation'=>$_POST['specialisation'][$j],
                        'edu_duration_from'=>$_POST['edu_duration_from'][$j],
                        'edu_duration_to'=>$_POST['edu_duration_to'][$j],
                        'university'=>$_POST['university'][$j],
                        'percentage'=>$_POST['percentage'][$j],
                    );
                    $this->db->insert('educational_details',$data);                                
                }
            }
           
        }
    function getCandidateId($id){
	$sql="SELECT head_id FROM educational_details where id='$id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    

    function getCandidateDetails($id){
	$sql="SELECT * FROM emp_candidate_details where id='$id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function getEmployeeDetails($id){
	$sql="SELECT * FROM employement_details where head_id='$id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function getEducationalDetails($id){
	$sql="SELECT * FROM educational_details where head_id='$id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
	
    function employeeEdit($id){
	    $folderPath = $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
                
            $this->load->library('upload', $config);
            $this->upload->do_upload('pan_card_attach');
            $data = $this->upload->data();
            $filePath=$folderPath.$data['file_name'];
            
              if($_FILES['pan_card_attach']['name']=="")
		{
			$filePath=$this->input->post('oldimage');
		}
	$primary=$this->input->post('primary_other_skils');
	    $secondary=$this->input->post('secondary_other_skils');
	    //echo $test;exit;

	    if($primary==null)
	    {
		$primary="NULL";
	    }
	    else {
		$primary=$this->input->post('primary_other_skils');
	    }
	    
	    if($secondary==null)
	    {
	       $secondary='NULL';
	    }
	    else {
		$secondary=$this->input->post('secondary_other_skils');
	    }
	    if($this->input->post('SecondarySkills')=="")
		    {
                        $data= array(
                           'candidate_name'=>$this->input->post('candidate_name'),
                           'mobile_number'=>$this->input->post('mobile_number'),
                           'mail_id'=>$this->input->post('mail_id'),
                           'skills'=>implode(",",$this->input->post('skills')),
                           'primary_other_skils'=>$primary,
                           'total_exp_year'=>$this->input->post('total_exp_year'),
                           'total_exp_month'=>$this->input->post('total_exp_month'),
                           'relevant_exp'=>$this->input->post('relevant_exp'),
                           'notice_period'=>$this->input->post('notice_period'),
                           'current_ctc'=>$this->input->post('current_ctc'),
                           'expected_ctc'=>$this->input->post('expected_ctc'),
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
                           'career_gap_year'=>$this->input->post('career_gap_year'),
                           'team_size_name'=>$this->input->post('team_size_name'),
                           'team_contact_no'=>$this->input->post('team_contact_no'),
                           'profile_pic'=>$profilePic
                        );
                                   
                    }
                    else
                        {
                            $data= array(
                                'candidate_name'=>$this->input->post('candidate_name'),
                                'mobile_number'=>$this->input->post('mobile_number'),
                                'mail_id'=>$this->input->post('mail_id'),
                                'skills'=>implode(",",$this->input->post('skills')),
                                'primary_other_skils'=>$primary,
                                'SecondarySkills'=>$this->input->post('SecondarySkills'),
                                'secondary_other_skils'=>$secondary,
                                'total_exp_year'=>$this->input->post('total_exp_year'),
                                'total_exp_month'=>$this->input->post('total_exp_month'),
                                'relevant_exp'=>$this->input->post('relevant_exp'),
                                'notice_period'=>$this->input->post('notice_period'),
                                'current_ctc'=>$this->input->post('current_ctc'),
                                'expected_ctc'=>$this->input->post('expected_ctc'),
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
                                'career_gap_year'=>$this->input->post('career_gap_year'),
                                'team_size_name'=>$this->input->post('team_size_name'),
                                'team_contact_no'=>$this->input->post('team_contact_no'),
                                'profile_pic'=>$profilePic
                             );
                        }
	    $this->db->where("id",$id);
	    $this->db->update("emp_candidate_details",$data);
		    
		    
	    $clientCnt = count($this->input->post('client_comp'));
	    //print_r($clientCnt);exit;
            for($i=0; $i<$clientCnt; $i++)
            {
                if($_POST['Line_Status'][$i]=='addNew'){
		    $this->addEmpoyeeLines($i);
		}else{
		    $this->updateEmpoyeeLines($i);
		}
            }/*exit;*/
	    
	    //exit;
	    
	    $degreeCnt = count($this->input->post('degree'));
            for($j=0; $j<$degreeCnt; $j++)
            {
                if($_POST['degree_Status'][$j]=='addNewDegree'){
		    $this->addEducationLines($j);
		}else{
		    $this->updateEducationLines($j);
                }
            }/*exit;*/
           
    }
    
    function updateEmpoyeeLines($i){
	$data= array(
	    'client_comp'=>$_POST['client_comp'][$i],
	    'payroll_comp'=>$_POST['payroll_comp'][$i],
	    'designation'=>$_POST['designation'][$i],
	    'emp_duration_from'=>$_POST['emp_duration_from'][$i],
	    'emp_duration_to'=>$_POST['emp_duration_to'][$i],
	    'location'=>$_POST['location'][$i],
	);
	$this->db->where('id',$_POST['line_id'][$i]);
	$result = $this->db->update('employement_details',$data);
    }
    
    function addEmpoyeeLines($i){
	$data= array(
	    'head_id'=>$_POST['headId'],
	    'client_comp'=>$_POST['client_comp'][$i],
	    'payroll_comp'=>$_POST['payroll_comp'][$i],
	    'designation'=>$_POST['designation'][$i],
	    'emp_duration_from'=>$_POST['emp_duration_from'][$i],
	    'emp_duration_to'=>$_POST['emp_duration_to'][$i],
	    'location'=>$_POST['location'][$i],
	);
	$this->db->insert('employement_details',$data);  
    }
    
    function addEducationLines($j){
	$data= array(
	    'head_id'=>$_POST['headId'],
	    'degree'=>$_POST['degree'][$j],
	    'specialisation'=>$_POST['specialisation'][$j],
	    'edu_duration_from'=>$_POST['edu_duration_from'][$j],
	    'edu_duration_to'=>$_POST['edu_duration_to'][$j],
	    'university'=>$_POST['university'][$j],
	    'percentage'=>$_POST['percentage'][$j],
	);
	$this->db->insert('educational_details',$data);
    }
    
    function updateEducationLines($j){
	$data= array(
	    'degree'=>$_POST['degree'][$j],
	    'specialisation'=>$_POST['specialisation'][$j],
	    'edu_duration_from'=>$_POST['edu_duration_from'][$j],
	    'edu_duration_to'=>$_POST['edu_duration_to'][$j],
	    'university'=>$_POST['university'][$j],
	    'percentage'=>$_POST['percentage'][$j],
	);
	$this->db->where("id",$_POST['degree_id'][$j]);
	$result= $this->db->update('educational_details',$data);  
    }

    function employeeDelete($id){
	$this->db->where("id",$id);
	$this->db->delete("emp_candidate_details");
    } 
   
   function employementDelete($id)
    {
	$this->db->where("id",$id);
	$this->db->delete("employement_details");
    }
    
    function educationDelete($id)
    {
	$this->db->where("id",$id);
	$this->db->delete("educational_details");
    }
    
    function applicantDetails()
    {
	
	$sql="SELECT * FROM applicant order by id desc";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
     function applicantAdd(){
	   
	$data = array(
		'name'=>$this->input->post('name'),
                'mobile_number'=>$this->input->post('mobile_number'),
                'email'=>$this->input->post('email'),
                'skill'=>implode(",",$this->input->post('skill')),
	       );
		  
		    $this->db->insert("applicant",$data);
		    //redirect("admin/applicant");   
	
    }
    
    function applicantEdit($id){
	$data = array(
		'name'=>$this->input->post('name'),
                'mobile_number'=>$this->input->post('mobile_number'),
                'email'=>$this->input->post('email'),
                'skill'=>implode(",",$this->input->post('skill')),
	       );
	$this->db->where("id",$id);
	$this->db->update("applicant",$data);
	
    }
     function getapplicantDetails($id){
	 $sql="SELECT * FROM applicant where id='$id'";
	 //print_r($sql);
	 //exit;
            return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function applicantDelete($id)
    {
	$this->db->where("id",$id);
	$this->db->delete("applicant");
	
    }
    
    function registerUser(){
	$sql="SELECT * FROM register_users order by id desc";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function candidateCount(){
	$vendorId=$this->session->userdata('vendor_code');
	$sql="SELECT COUNT(vendor_code) vendor_code FROM vendor where vendor_code='$vendorId'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function vendorCount(){
	$sql="SELECT COUNT(*) as vendorCount FROM vendor";
	 return $this->db->query($sql, $return_object = TRUE)->result_array();
	
    }
    function employeesCount(){
	$sql="SELECT COUNT(*) as employeesCount FROM emp_candidate_details";
	 return $this->db->query($sql, $return_object = TRUE)->result_array();
	
    }
    
    
    function sendCredentialToUser(){
	$userEmail = $_POST['userEmail'];
	$userName = $_POST['userName'];
	$statusYN = $_POST['statusYN'];
	$this->db->where('email', $userEmail);
	$data = array(
	    'status' => $statusYN
	);
	$this->db->update('vendor', $data);
	$this->db->affected_rows();
	if($statusYN=="Y")
	    $this->emailSending($userEmail,$userName,$statusYN);
	
    }

    function sendUserCredential(){
	$userEmail = $_POST['userEmail'];
	$userName = $_POST['userName'];
	$statusYN = $_POST['statusYN'];
	$this->db->where('email', $userEmail);
	$data = array(
	    'status' => $statusYN
	);
	$this->db->update('login_auth', $data);
	$this->db->affected_rows();
	if($statusYN=="Y"){
	    $this->emailSuccessSending($userEmail,$userName,$statusYN);
	}else if($statusYN=="N"){
	    $this->emailFailedSending($userEmail,$userName,$statusYN);
	}
	
    }

    function emailSuccessSending($userEmail,$userName,$statusYN)
    {
	$body ="<html>
		    <head>
			<title>Welcome to Talent Capital</title>
		    </head>
		    <body>
			<h4>Dear $userName,</h4>
			<p>You are successfully activated in TalentCapital Portal</p>
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
	$this->email->to($userEmail);// change it to yours
	$this->email->subject('Talent Capital India - activation Mail');
	$this->email->message($body);
	
	if($this->email->send()){
	    if($statusYN=="Y"){
		$this->session->set_flashdata('status', 'User Admin has been approved successfully');
	    }
	}else{
	    $this->session->set_flashdata('status', 'User Admin has not approved');	
	}
    }
    
    function emailFailedSending($userEmail,$userName,$statusYN){
	$body ="<html>
		    <head>
			<title>Welcome to Talent Capital</title>
		    </head>
		    <body>
			<h4>Dear $userName,</h4>
			<p>You are Rejected in TalentCapital Portal</p>

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
	$this->email->to($userEmail);// change it to yours
	$this->email->subject('Talent Capital India - activation Mail');
	$this->email->message($body);
	
	if($this->email->send()){
	    if($statusYN=="N"){
		$this->session->set_flashdata('status', 'User Admin has been Rejected successfully');
	    }
	}else{
	    $this->session->set_flashdata('status', 'User Admin has not approved');	
	}
    }
    
    function emailSending($userEmail,$userName,$statusYN)
    {
	$body ="<html>
		    <head>
			<title>Welcome to Talent Capital</title>
		    </head>
		    <body>
			<h4>Dear $userName,</h4>
			<p>You are successfully activated as hiring partner in TalentCapital Portal, Please click below link to manage your applicants</p>
			<p> <a href='".base_url()."vendorlogin/index/hiringPartner' >Click Here</a> </p>
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
	$this->email->to($userEmail);// change it to yours
	$this->email->subject('Talent Capital India - activation Mail');
	$this->email->message($body);
	
if($this->email->send()){
	    if($statusYN=="Y"){
		$this->session->set_flashdata('status', 'Hiring Partner has been approved successfully');
	    }
	    else{
		$this->session->set_flashdata('status', 'Hiring Partner has been Rejected successfully');
	    }
	    
	}else{
	    $this->session->set_flashdata('status', 'Hiring Partner has not approved');	
	}
    }

    //Vendor Login functionality starts
    
    function checkVendorLogin(){
	$user_id = $this->input->post('username');
	$password = $this->input->post('password');
	$sql="SELECT * FROM register_users where username='$user_id' AND password='$password'";
	$query = $this->db->query($sql, $return_object = TRUE);
	if($query->num_rows > 0){
	    return $query->result_array();
	}
	else
	{
	    return false;
	}
    }
    
    function vendorloginEdit($id){
	$sql="SELECT * FROM vendor where id='$id'";
	return $this->db->query($sql)->result_array();
    }
    
    function mailToCandiate(){
	$vendorCode = $this->input->post('vendor_code');
	$vendorname = $this->input->post('vendor_name');
	$email = $this->input->post('email');
	$this->mailToCandidate($email,$vendorCode,$vendorname);
    }
    
    function mailToCandidate($email,$vendorCode,$vendorname)
    {
	$body ="<html>
		    <head>
			<title>Welcome to Talent Capital</title>
		    </head>
		    <body>
			<h1>Dear Candidate</h1>
			<p>Please register with talent capital with below link.</p>
			<p>".base_url()."talentcapitalctr/candidateLogin/".$vendorCode."</p>
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
	    $this->session->set_flashdata('status', 'Email has been sent to User Successfully');
	    redirect('admin/vendorAddUser');
	}else{
	    $this->session->set_flashdata('status', 'Email has not sent to User');
	    redirect('admin/vendorAddUser');
	}
    }    
    //Vendor Login functionality Ends
    
    function addLocation(){
	
	$data = array(
	    'location'=>$this->input->post('location'),
	); 
	    $this->db->insert("location",$data);
    }
    function locationDetails(){
	 $sql="SELECT * FROM location";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function locationDelete($id){
	$this->db->where("id",$id);
	$this->db->delete("location");
    }
  
    function addSkills(){
	$data = array(
	    'skill'=>$this->input->post('skill'),
	); 
	    $this->db->insert("skill",$data);
    }
    function skillDetails(){
	 $sql="SELECT * FROM skill";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function skillDelete($id){
	$this->db->where("id",$id);
	$this->db->delete("skill");
    }
  
    function addLanguage(){
	$data = array(
	    'language'=>$this->input->post('language'),
	); 
	    $this->db->insert("language",$data);
    }
    function languageDetails(){
	 $sql="SELECT * FROM language";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function languageDelete($id){
	$this->db->where("id",$id);
	$this->db->delete("language");
    }

    function studentUploads(){
	$id=$_POST['id'];
	$head_id=$_POST['head_id'];
	$sql="SELECT * FROM educational_details where head_id='$head_id' and id='$id'";
	return $query=$this->db->query($sql)->result_array();
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
    
    function employeeUploads(){
	$id=$_POST['line_id'];
	$head_id=$_POST['head_id'];
	$sql="SELECT * FROM employement_details where id='$id' and head_id='$head_id'";
	return $query=$this->db->query($sql)->result_array();
    }
    
//    function studentUploads(){
//	$id=$_POST['id'];
//	$head_id=$_POST['head_id'];
//	$sql="SELECT * FROM educational_details where head_id='$head_id' and id='$id'";
//	return $query=$this->db->query($sql)->result_array();
//    }
    function resume_file($id){
	$sql="SELECT * FROM emp_candidate_details where id='$id'";
	return $query=$this->db->query($sql)->result_array();
    }
    
    function emailTrackDelete($id){
	$this->db->where("id",$id);
	$this->db->delete("emailtrack");
    }
    
}