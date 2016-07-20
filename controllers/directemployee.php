<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class directemployee extends CI_Controller {
 
    function directemployee()
    {
	parent::__construct();
	$this->load->model('directempmodel');
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
	   'smtp_pass' => '09062016', // change it to yours
	   'mailtype' => 'html',
	   'smtp_crypto'=>'ssl',
	   'charset' => 'iso-8859-1',
	   'wordwrap' => TRUE
	);
	$this->load->library('email', $config);
	$this->load->helper('string');	
    }
//==================================USER LOGIN INDEX PAGE STARTS ============================================================================
    function index()
    {
	
        $result = $this->directempmodel->CheckLoginType();
	
	if($result==0){
	    $error=$this->session->set_flashdata('error, invalid username and password');
	    redirect(base_url()."talentcapitalctr");
	}
	else{
	    $this->session->set_userdata('directempname',$result[0]['candidate_name']);
	    $this->session->set_userdata('directempemail',$result[0]['mail_id']);
	    $this->session->set_userdata('directempid',$result[0]['id']);
	    $this->session->set_userdata('profile_pic',$result[0]['profile_pic']);
	    redirect('directemployee/dashboard');
	}
    }
    
    function logout(){
	$this->session->unset_userdata('directempname');
	unset($this->session->userdata);
	redirect(base_url()."view/index",'refresh');
    }
    
    function dashboard(){
        
        $session_data=$this->session->userdata('directempname');
	if($session_data!=''){
	    $loginUser['inter_Edit']=$this->directempmodel->candidateCount();
	    //echo "<pre>";
	    //print_r($loginUser['inter_Edit'][0]['vendor_code']);
	    //exit;
            
            $this->load->view('view/headernew');
            //$this->load->view('view/footer');
	    $this->load->view('view/dashboard',$loginUser);
	}
	else{
	redirect('talentcapitalctr');
	}
    }
    
    function dashboardedit(){
        
        $session_data=$this->session->userdata('directempname');
	if($session_data!=''){
	    $loginUser['inter_Edit']=$this->directempmodel->GetEmp_cand_details();
	    //echo "<pre>";
	    //print_r($loginUser['inter_Edit']);
	    //exit;
            $loginUser['GetEmpl']=$this->directempmodel->GetEmpl_details();
	    //echo "<pre>";
	    //print_r($loginUser['GetEmpl']);
	    //exit;
            $loginUser['Geteducational']=$this->directempmodel->Geteducational_details();
	    $loginUser['language']=$this->directempmodel->getlanguageDetails();
	    $loginUser['Location']=$this->directempmodel->getLocation();
	    $loginUser['skills']=$this->directempmodel->getskillDetails();
	    //echo "<pre>";
	    //print_r($data['language']);
	    //exit;
            //$this->load->view('view/header');
	    $this->load->view('view/headernew');
            //$this->load->view('view/footer');
            $this->load->view('view/internalEmployee _Edit',$loginUser);
	}
	else{
	redirect('talentcapitalctr');
	}
    }
    
//    function directempview(){
//	$this->load->view('view/header');
//	$this->load->view('view/internalEmployee _Edit');
//    }

}	
