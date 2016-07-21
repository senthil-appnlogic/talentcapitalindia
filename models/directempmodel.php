<?php
class directempmodel extends CI_Model {

    function CheckLoginType()
    {
	$user_id = $this->input->post('email');
	$password = $this->input->post('password');
	$sql="SELECT * FROM emp_candidate_details where mail_id='$user_id' and password='$password'";
	$query = $this->db->query($sql, $return_object = TRUE);
	
	if($query->num_rows > 0){
	    return $query->result_array();
	}
	else
	{
	    return false;
	}
    }
    function GetEmp_cand_details()
    {
	$user_Id=$this->session->userdata('directempid');
	//print_r($user_Id);
	//exit;
	$sql="SELECT * FROM emp_candidate_details where id='$user_Id'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function GetEmpl_details()
    {
	$user_Id=$this->session->userdata('directempid');
	$sql="SELECT * FROM employement_details where head_id='$user_Id'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function Geteducational_details()
    {
	$user_Id=$this->session->userdata('directempid');
	$sql="SELECT * FROM educational_details where head_id='$user_Id'";
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
    function candidateCount(){
	$vendor_code = $this->session->userdata('vendor_code'); 
	$sql="SELECT COUNT(vendor_code) vendor_code FROM emp_candidate_details where vendor_code='$vendor_code'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
}