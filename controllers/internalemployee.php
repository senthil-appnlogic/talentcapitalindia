<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class internalemployee extends CI_Controller {
 
    function internalemployee()
    {
	parent::__construct();
	$this->load->model('internalempmodel','emp_model');
	$this->load->model('talentcapitalmodel','tc_model');
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
	   'smtp_pass' => 'Tci@2016', // change it to yours
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
	$sessionData=$this->session->userdata('username_admin');

	if($sessionData=="")
	{

//	    if($this->input->post('save')=='Sign me in')
//	    {
//		    $result=$this->emp_model->checkEmpLogin();
//		    //print_r($result);
//		    //exit;
//		    
//		    if($result==0){
//			$this->session->set_flashdata('authentication','Your Username and Password is Incorrect please check it');
//			redirect(base_url()."admin",'refresh');
//		    }
//		    else{
//			$this->session->set_userdata('username_employee',$result[0]['user_name']);
//			$this->session->set_userdata('user_email',$result[0]['email']);
//                        $this->session->set_userdata('employee_role',$result[0]['role']);
//			$this->session->set_userdata('employee_code',$result[0]['intemp_code']);
//		     
//			redirect("internalemployee/dashboard");
//		    }
//
//	    }
//	    else{
//		$this->load->view('internalemployee/index');
//	    }
	}
	else{
	    redirect("internalemployee/dashboard");
	}
    }
    
    function logout(){
	$this->session->unset_userdata('username_admin');
	unset($this->session->userdata);
	redirect(base_url()."login",'refresh');
    }
    
    function dashboard(){
//        print_r('ddd');
//	exit;
        $session_data=$this->session->userdata('username_admin');
	if($session_data!=''){
	$this->load->view('internalemployee/header');
	$data['internalEmp_Code']=$this->emp_model->internalEmpCount();
	$this->load->view('internalemployee/dashboard',$data);
	}
	else{
	redirect('login');
	}
    }
    
    function internalEmployeeView()
    {
        $session_data=$this->session->userdata('username_admin');
	if(!empty($session_data))
        {
            $result['internalDetails']=$this->emp_model->internalEmpDetails();
	    //$result['eduId']=$this->emp_model->getEduId();
            $this->load->view('internalemployee/header');		
            $this->load->view('internalemployee/internalEmployeeView',$result);		    
        }
        else{
            redirect('internalemployee/dashboard');
        }
    }
    
    function intEmpAddUser(){
        $session_username = $this->session->userdata('username_admin');
	if($session_username){
	    if(isset($_POST['Save']))
	    {
		$this->emp_model->mailToCandiate();
	    }
	    else
	    {
		$data['ClientsDetails']=$this->emp_model->getClientsDetails();
		$this->load->view('internalemployee/header');
		$this->load->view('internalemployee/intEmpAdd',$data);
	    }
	}
	else
	{
	    redirect(site_url("internalemployee"),'refresh');
	}  
    }
    
    function internalEmpEdit($id){
	
	$session_data=$this->session->userdata('username_admin');
	$loginUser['inter_Edit']=$this->emp_model->getCandidateDetails($id);
	$loginUser['GetEmpl']=$this->emp_model->getEmployeeDetails($id);
	$loginUser['Geteducational']=$this->emp_model->getEducationalDetails($id);
	$loginUser['language']=$this->emp_model->getlanguageDetails();
	$loginUser['Location']=$this->emp_model->getLocation();
	$loginUser['skills']=$this->emp_model->getskillDetails();
	$this->load->view('internalemployee/header');
	$this->load->view('internalemployee/internalEmpEdit',$loginUser);
    }
    
    function internalEmployeeLink($code,$sample,$client){
	
	    $data['Vcode'] =  $code;
	    if(isset($_POST['save'])){
		$loginType = "InternalEmployee";
		$emailTrack = "yes";
		$this->tc_model->emailtracking($sample,$code,$emailTrack);
		$result=$this->tc_model->hiringPartnerLinkAdd($code,$loginType,$client);
		$this->session->set_flashdata('status', 'Your Information has been Succesfully regeistered to talent capital');
		redirect('talentcapitalctr/successMsg');		
	    }
	    else{
                //$data['IntEmpName']=$this->emp_model->getIntEmpName($code);
		
		$data['loginCheck']=$this->tc_model->getEmailCheckData($code,$sample);
		//print_r($data['loginCheck'][0]['check']);
		//exit;
		if($data['loginCheck'][0]['check_email']=="yes"){
		    redirect('talentcapitalctr/index');
		}
		else {
		    $data['intEmpName']=$this->emp_model->getIntEmpName($code);
		    $data['Location']=$this->tc_model->getLocation();
		    $data['skills']=$this->tc_model->getskillDetails();
		    $data['language']=$this->tc_model->getlanguageDetails();
		    $this->load->view('view/header');
		    $this->load->view('internalemployee/internalEmployeeLink',$data);
		    $this->load->view('internalemployee/footer');		
		}
	    }
	}
	
    function candidate_status()
    {
	//print_r($_POST);
	//exit;
        $session_username = $this->session->userdata('username_admin');
	$candidate_status = $this->input->post('candidate_status');
	$candidate_id =$this->input->post('candidate_id');
	
	$result=$this->emp_model->Change_Candidate_status($candidate_id,$candidate_status);
	
	echo json_encode(array('sccess'=>$candidate_status));
	//print_r($result);
	//exit;
    }
    
    function InternalEmpDelete($id,$logintype){
	$session_data = $this->session->userdata('username_admin');
	if(!empty($session_data))
	{
        $this->emp_model->InternalEmpDelete($id);
        $this->session->set_flashdata('status','A record deleted successfully');
        redirect("internalemployee/internalEmployeeView");
	}
	else{
	    
	    redirect(site_url('vendorlogin'));   
	}
    }
    
    function check_email()
    {
	$email=$this->input->post('email');
	if($email==""){
	    $email=$this->input->post('mail_id');
	}
	$data['test']=$this->emp_model->CheckEmail($email);
	$check=$data['test'][0]['email'];
	$check_id=$data['test'][0]['mail_id'];
	if($email==$check || $email==$check_id)
	{
	    //echo 'true';
	    echo json_encode(array('valid'=>'false'));
	}
	else {
	    //echo "false";
	    echo json_encode(array('valid'=>'true'));
	}
    }
    
    function intEmpEditUser($id){
	//$this->emp_model->intEmpEditUser();
	$session_data=$this->session->userdata('username_admin');
	if(!empty($session_data)){
	    if(isset($_POST['Update'])){
		
		$this->emp_model->intEmpEditUser($id);
		$this->session->set_flashdata('status','A old record updated successfully');
		redirect("internalemployee/dashboard");
	    }
	    $data['userEdit']=$this->emp_model->getuserDetailEdit($id);
	    //print_r($data['userEdits']);exit;
	 
	    $this->load->view('internalemployee/header');
	    $this->load->view('internalemployee/intEmpEditUser',$data);
	}
	else{
	    redirect(site_url('admin'));
	}
    }
    
    function tracklist(){
	$session_code = $this->session->userdata('employee_code');
	//print_r($session_data);
	//exit;
	$check_mail = 'no';
	$result['emailtrack']=$this->emp_model->emailtracklist($session_code,$check_mail);
	//print_r($result['emailtrack']);
	//exit;
	$this->load->view('internalemployee/header');
	$this->load->view('internalemployee/tracklist',$result);
    }


}	
