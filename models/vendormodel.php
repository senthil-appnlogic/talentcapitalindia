<?php
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
	$sql="SELECT ed.id, ed.degree, ed.specialisation, ed.edu_duration_from, ed.edu_duration_to, ed.university, ed.percentage, ed.reason_desc, emp.client_comp, emp.payroll_comp, emp.designation, emp.emp_duration_from, emp.emp_duration_to, emp.location, emp.reason_desc, emc.vendor_code, emc.candidate_name, emc.mobile_number, emc.mail_id, emc.skills, emc.primary_other_skils, emc.SecondarySkills, emc.secondary_other_skils, emc.total_exp_year, emc.total_exp_month, emc.relevant_exp_year, emc.relevant_exp_month, emc.notice_period, emc.current_ctc_lakhs, emc.current_ctc_thousands, emc.expected_ctc_lakhs, emc.expected_ctc_thousands, emc.day, emc.month, emc.year, emc.pan_card_no, emc.pan_card_attach, emc.language_known, emc.current_location, emc.preferred_location, emc.interview_timing, emc.profile_pic, emc.educational_gap_year, emc.career_gap_year, emc.team_size_name, emc.team_contact_no, emc.email_random_code, emc.password, emc.password_token,emc.cr_date, emc.login_types
		FROM educational_details ed
		INNER JOIN employement_details emp ON emp.head_id = ed.head_id
		INNER JOIN emp_candidate_details emc ON emc.id = emp.head_id WHERE vendor_code = '$vendor_code' order by emc.cr_date desc";

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
	$session_username = $this->session->userdata('vendorusername');
	$vendorCode = $this->input->post('vendor_code');
	$email = $this->input->post('email');
	
	$this->mailToCandidate($email,$vendorCode,$session_username);
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
    
    
    function mailToCandidate($email,$vendorCode,$session_username)
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
}