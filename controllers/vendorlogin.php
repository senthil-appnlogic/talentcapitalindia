<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vendorlogin extends CI_Controller {
 
    function vendorlogin()
    {
	parent::__construct();
	$this->load->model('vendormodel');
	$this->load->library('session');
	$this->load->helper('url');
	$this->load->helper('file');
	$this->load->helper('form');
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$config = Array(
	 
	   'protocol' => 'smtp',
	   'smtp_host' => 'mbox.s214.sureserver.com',
	   'smtp_port' => 465,
	   'smtp_user' => 'donotreply@talentcapitalindia.com', // change it to yours
	   'smtp_pass' => 'Tci@2014', // change it to yours
	   'mailtype' => 'html',
	   'smtp_crypto'=>'ssl',
	   'charset' => 'iso-8859-1',
	   'wordwrap' => TRUE
	);
	$this->load->library('email', $config);
	$this->load->helper('string');	
    }
//==================================USER LOGIN INDEX PAGE STARTS ============================================================================
    function index(){
	$result=$this->vendormodel->checkVendorLogin();
	if($result==0){
	    $error=$this->session->set_flashdata('error, invalid username and password');
	    redirect(base_url()."talentcapitalctr");
	}
	else{
	    $this->session->set_userdata('vendoruseremail',$result[0]['email']);
	    $this->session->set_userdata('vendorusername',$result[0]['name']);
	    $this->session->set_userdata('vendor_code',$result[0]['vendor_code']);
	    $this->session->set_userdata('vendorimage',$result[0]['profile_pic']);
	    $this->session->set_userdata('vendor_id',$result[0]['id']);
	    redirect('vendorlogin/dashboard');
	}
    }
    
    function dashboard(){
	$session_data=$this->session->userdata('vendorusername');
	if($session_data){
	$this->load->view('vendor/header');
	$data['vendor_code']=$this->vendormodel->candidateCount();
	$this->load->view('vendor/dashboard',$data);
	}
	else{
	redirect('vendorlogin/index');
	}
    }
    
    function vendor(){
	$session_data=$this->session->userdata('vendorusername');
	if(!empty($session_data))
	{
	    $this->load->view('vendor/header');
	    $data['vendorDetails']=$this->vendormodel->vendorDetails();
	    $this->load->view('vendor/vendor',$data);
	}
	else{
	redirect('vendorlogin/index');
	}
    }
    function vendorAddUser(){
	$session_username = $this->session->userdata('vendorusername');
	if($session_username){
	    if(isset($_POST['Save']))
	    {
		$this->vendormodel->mailToCandiate();
	    }
	    else
	    {
		$data['ClientsDetails']=$this->vendormodel->getClientsDetails();
		$this->load->view('vendor/header');
		$this->load->view('vendor/vendorAddUser',$data);
	    }
	}
	else
	{
	    redirect(site_url("vendorlogin"),'refresh');
	} 
    }    
    
    function vendorEdit($id){
	$session_data=$this->session->userdata('vendorusername');
        $res=$this->vendormodel->getCandidateId($id);
	$newId = $res[0]['head_id'];
	$loginUser['inter_Edit']=$this->vendormodel->getCandidateDetails($newId);
	$loginUser['GetEmpl']=$this->vendormodel->getEmployeeDetails($newId);
	$loginUser['Geteducational']=$this->vendormodel->getEducationalDetails($newId);
	$loginUser['language']=$this->vendormodel->getlanguageDetails();
	$loginUser['Location']=$this->vendormodel->getLocation();
	$loginUser['skills']=$this->vendormodel->getskillDetails();
	$this->load->view('vendor/header');
	$this->load->view('vendor/vendorEdit',$loginUser);
    }
    
    function vendorEditView($id){
	$session_data=$this->session->userdata('vendorusername');
        $res=$this->vendormodel->getCandidateId($id);
	$newId = $res[0]['head_id'];
	$loginUser['inter_Edit']=$this->vendormodel->getCandidateDetails($newId);
	$loginUser['GetEmpl']=$this->vendormodel->getEmployeeDetails($newId);
	$loginUser['Geteducational']=$this->vendormodel->getEducationalDetails($newId);
	$loginUser['language']=$this->vendormodel->getlanguageDetails();
	$loginUser['Location']=$this->vendormodel->getLocation();
	$loginUser['skills']=$this->vendormodel->getskillDetails();
	$this->load->view('vendor/header');
	$this->load->view('vendor/vendorEdit',$loginUser);
    }
    //vendor edit
    
    function vendorDelete($id){
	$session_data = $this->session->userdata('vendorusername');
	if(!empty($session_data))
	{
        $this->vendormodel->vendorDelete($id);
        $this->session->set_flashdata('status','A record deleted successfully');
        redirect("vendorlogin/vendor");
	}
	else{
	    
	    redirect(site_url('vendorlogin'));   
	}
    }
    
    function tracklist(){
	$session_code = $this->session->userdata('vendor_code');
	$check_mail = 'no';
	$result['emailtrack']=$this->vendormodel->emailtracklist($session_code,$check_mail);
	$this->load->view('vendor/header');
	$this->load->view('vendor/tracklist',$result);
    }
    
 function adminVendorEdit($id){
	$session_data=$this->session->userdata('vendor_code');
	if(!empty($session_data)){
	    if(isset($_POST['Update'])){
		
		$this->vendormodel->adminVendorEdit($id);
		$this->session->set_flashdata('status','Profile details updated successfully');
		redirect("vendorlogin/vendor");
	    }
	    $data['vendorEdit']=$this->vendormodel->getvendorDetailEdit($id);
	    $this->load->view('vendor/header');
	    $this->load->view('vendor/adminVendorEdit',$data);
	}
	else{
	    redirect(site_url('vendorlogin'));
	}
    }
    
     //PDF STARTS
    public function vendorPrint($sys_head_id)
	{
		$this->load->helper('dompdf_helper');
		$data['vendorPrintDetails']=$this->vendormodel->vendorPrintDetails($sys_head_id);
		$html = $this->load->view('vendor/printDocs/vendor', $data, true);
		pdf_create($html,$stream=TRUE,'portrait');
	}
    
    //PDF ENDS 
    
//    function mailToCandiate(){
//	$session_data = $this->session->userdata('vendorusername');
//	if($session_data){
//	    $this->vendormodel->mailToCandiate();
//	}
//	else
//	{
//	    redirect(site_url("vendorlogin"),'refresh');
//	} 
//    }    
    
    function logout(){
	$this->session->unset_userdata('vendorusername');
	unset($this->session->userdata);
	redirect(base_url()."view/index",'refresh');
    }
 //======================================USER LOGIN INDEX PAGE ENDS=====================================================================
    
    function check_email()
    {
	$email=$this->input->post('email');
	if($email==""){
	    $email=$this->input->post('mail_id');
	}
	$data['test']=$this->vendormodel->CheckEmail($email);
	$check=$data['test'][0]['email'];
	$check_id=$data['test'][0]['mail_id'];
	if($email==$check || $email==$check_id)
	{
	    echo 'true';
	}
	else {
	    echo "false";
	}
    } 
    
}	
