<?php
class internalempmodel extends CI_Model {

    function checkEmpLogin()
    {
	$email = $this->input->post('email');
	$password = $this->input->post('password');
	$sql="SELECT * FROM login_auth where email='$email' AND password='$password' AND role='InternalEmployee'";
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
    
    function internalEmpDetails(){
	$Emp_Role = $this->session->userdata('employee_role');
	$Emp_code = $this->session->userdata('employee_code');
	$sql="SELECT *  FROM emp_candidate_details where login_types='$Emp_Role' AND vendor_code = '$Emp_code' ORDER BY cr_date DESC";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function getEduId()
    {
	$Emp_Role = $this->session->userdata('employee_role');
	$Emp_code = $this->session->userdata('employee_code');
	$sql="SELECT * FROM educational_details where login_types='$Emp_Role' AND vendor_code = '$Emp_code'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function mailToCandiate(){
	//$date = date('d-M-y');
	$session_username = $this->session->userdata('username_admin');
	$IntEmpCode = $this->input->post('emp_code');
	$IntEmpName = $this->input->post('emp_name');
	$email = $this->input->post('email');
	
	$this->mailToCandidate($email,$IntEmpCode,$IntEmpName,$session_username);
    }
    
    function mailToCandidate($email,$IntEmpCode,$IntEmpName,$session_username)
    {
	$body ="<html>
		    <head>
			<title>Welcome to Talent Capital</title>
		    </head>
		    <body>
			<h3>Dear Candidate</h3>
			<p>You are refered to register in Talent Capital India by <span >".$session_username."</span></p>
			<p>Please click below link to register with talent capital</p>
			<p>".base_url()."internalemployee/internalEmployeeLink/".$IntEmpCode."/".$email."</p>
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
		    'refer_code'=>$IntEmpCode,
		    'refer_name'=>$IntEmpName,
		    'check_mailid'=>'no',
		    //'cr_date'=>$session_username,
		);
	    $this->db->insert('emailtrack',$data);
	    $this->session->set_flashdata('status', 'Email has been sent to User Successfully');
	    redirect('internalemployee/internalEmployeeView');
	}else{
	    $this->session->set_flashdata('status', 'Email has not sent to User');
	    redirect('internalemployee/internalEmployeeView');
	}
    }
    
    function internalEmpCount(){
        $emp_code = $this->session->userdata('employee_code'); 
	$sql="SELECT COUNT(login_types) login_types FROM emp_candidate_details where login_types='InternalEmployee' AND vendor_code = '$emp_code'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    
    function Change_Candidate_status($candidate_id,$candidate_status)
    {
	$session_usermail = $this->session->userdata('user_email');
	$query = "SELECT mail_id, vendor_code  from emp_candidate_details where id='$candidate_id'";
	$result = $this->db->query($query, $return_object = TRUE)->result_array();
	$IntEmpCode = $result[0]['vendor_code'];
	$CandidateMail = $result[0]['mail_id'];
	//$queryNew = "SELECT email from login_auth where intemp_code='$IntEmpCode'";
	//$resultnew = $this->db->query($queryNew, $return_object = TRUE)->result_array();
	$this->mailToIntCandidate($CandidateMail,$candidate_status);
	$this->mailToIntEmp($session_usermail,$candidate_status);
	$sql="update emp_candidate_details set candidate_status='$candidate_status' where id='$candidate_id'";
	return $this->db->query($sql);
	//$sql="SELECT *  from vendor where id='$candidate_id'";
	//return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function mailToIntCandidate($CandidateMail,$candidate_status)
    {
	$body ="<html>
		    <head>
			<title>Welcome to Talent Capital</title>
		    </head>
		    <body>
			<h3>Dear Candidate</h3>
			<p>Your status <span >".$candidate_status."</span></p>
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
	$this->email->to($CandidateMail);// change it to yours
	$this->email->subject('Talent capital India - Please register with us');
	$this->email->message($body);
	if($this->email->send()){
	    $this->session->set_flashdata('status', 'Email has been sent to User Successfully');
	    //redirect('internalemployee/internalEmployeeView');
	}else{
	    $this->session->set_flashdata('status', 'Email has not sent to User');
	    //redirect('internalemployee/internalEmployeeView');
	}
    }
    
    function mailToIntEmp($session_usermail,$candidate_status)
    {
	$body ="<html>
		    <head>
			<title>Welcome to Talent Capital</title>
		    </head>
		    <body>
			<h3>Dear Candidate</h3>
			<p>Your status <span >".$candidate_status."</span></p>
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
	$this->email->to($session_usermail);// change it to yours
	$this->email->subject('Talent capital India - Please register with us');
	$this->email->message($body);
	if($this->email->send()){
	    $this->session->set_flashdata('status', 'Email has been sent to User Successfully');
	    //redirect('internalemployee/internalEmployeeView');
	}else{
	    $this->session->set_flashdata('status', 'Email has not sent to User');
	    //redirect('internalemployee/internalEmployeeView');
	}
    }
    function getIntEmpName($code){
	$sql="SELECT user_name FROM login_auth where intemp_code='$code'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
	
    function CheckEmail($email)
    {
	//$sql="SELECT * FROM vendor INNER JOIN emp_candidate_details WHERE email = '$email' OR mail_id = '$email'";
	$sql = "select * 
			from (
			    select email as email from emailtrack
			    union all
			    select email from login_auth
			    union all
			    select email from vendor
			    union all
			    select mail_id from emp_candidate_details
			) a
			where email = '$email'";
	
	return $result= $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function getCandidateDetails($id){
	
	$sql="SELECT *  FROM emp_candidate_details where id='$id'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
	
    }
    function getEmployeeDetails($id){
	
	$sql="SELECT *  FROM employement_details where head_id='$id'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();

    }
    function getEducationalDetails($id){
	
	$sql="SELECT *  FROM educational_details where head_id='$id'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
	
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
    
    function getuserDetailEdit($id){
    
     $sql="SELECT * FROM login_auth where id='$id'";
    
     return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function intEmpEditUser($id){
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
    
    function getEmailCheck($code){
	$sql="SELECT * FROM emp_candidate_details where vendor_code='$code'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function emailtracklist($session_code,$check_mail)
    {
	$sql="select * from emailtrack where refer_code='$session_code' and check_mailid='$check_mail' order by cr_date desc";
     	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
//    function getIntEmpName($code){
//	$sql="SELECT user_name FROM loginauth where intemp_code='$code'";
//	return $this->db->query($sql, $return_object = TRUE)->result_array();
//    }
    
}