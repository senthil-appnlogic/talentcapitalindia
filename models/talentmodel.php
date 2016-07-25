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
	$sql="SELECT * FROM login_auth ORDER BY cr_date DESC";
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
	    $date = date('d/M/y h:ia');
	    if($role=="Admin"){
		$data = array(
		'role'=>$role,
		'user_name'=>$this->input->post('username'),
		'password'=>$this->input->post('password'),
		'email'=>$this->input->post('email'),
		'user_image'=>$filePath,
		'status'=>'Y',
		'cr_date'=>$date,
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
		'cr_date'=>$date,
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
	$sql="select * from vendor where login_types= 'vendor' order by cr_date desc";
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
   
  
    function employeeDetails()
    {
	
//	$sql="SELECT * FROM emp_candidate_details order by id desc";
//     	return $this->db->query($sql, $return_object = TRUE)->result_array();

	$sql="SELECT ed.id, ed.degree, ed.specialisation, ed.edu_duration_from, ed.edu_duration_to, ed.university, ed.percentage, ed.reason_desc, emp.client_comp, emp.payroll_comp, emp.designation, emp.emp_duration_from, emp.emp_duration_to, emp.location, emp.reason_desc, emc.vendor_code, emc.candidate_name, emc.mobile_number, emc.mail_id, emc.skills, emc.primary_other_skils, emc.SecondarySkills, emc.secondary_other_skils, emc.total_exp_year, emc.total_exp_month, emc.relevant_exp_year,emc.relevant_exp_month, emc.notice_period, emc.current_ctc_lakhs, emc.current_ctc_thousands, emc.expected_ctc_lakhs,emc.expected_ctc_thousands, emc.day, emc.month, emc.year, emc.pan_card_no, emc.pan_card_attach, emc.language_known, emc.current_location, emc.preferred_location, emc.interview_timing, emc.profile_pic, emc.educational_gap_year, emc.career_gap_year, emc.team_size_name, emc.team_contact_no, emc.email_random_code, emc.password, emc.password_token, emc.cr_date, emc.login_types
		FROM educational_details ed
		INNER JOIN employement_details emp ON emp.head_id = ed.head_id
		INNER JOIN emp_candidate_details emc ON emc.id = emp.head_id order by emc.cr_date DESC";

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
    

    function getCandidateDetails($Id){
	$sql="SELECT * FROM emp_candidate_details where id='$Id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function getEmployeeDetails($Id){
	$sql="SELECT * FROM employement_details where head_id='$Id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function getEducationalDetails($Id){
	$sql="SELECT * FROM educational_details where head_id='$Id'";
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

    function employeeDelete($Id){
	$this->db->where("id",$Id);
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
	$email = $this->input->post('email');
	$this->mailToCandidate($email,$vendorCode);
    }
    
    function mailToCandidate($email,$vendorCode)
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
    
}