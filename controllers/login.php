<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
 
    function login()
    {
	parent::__construct();
        $this->load->model('loginmodel');
	$this->load->model('talentModel');
        $this->load->model('internalempmodel','emp_model');
	$this->load->library('session');
	$this->load->helper('url');
	$this->load->helper('file');
	$this->load->helper('form');
	$this->load->helper('cookie');
	$this->load->helper('dompdf_helper');
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
	    $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
	    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
	    $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
	    $this->output->set_header('Pragma: no-cache');
    }
//==================================USER LOGIN INDEX PAGE STARTS ============================================================================
    function index(){
        
	$sessionData=$this->session->userdata('username_admin');

	if($sessionData=="")
	{
	    if($this->input->post('save')=='Sign me in')
	    {
		    $result=$this->loginmodel->checkLoginType();
		    //print_r($result);
		    //exit;
		    
		    if($result==0){
			$this->session->set_flashdata('authentication','Your Username and Password is Incorrect or Not Approved please check it');
			redirect(base_url()."login",'refresh');
		    }
		    else{
			$this->session->set_userdata('user_id',$result[0]['id']);
			$this->session->set_userdata('username_admin',$result[0]['user_name']);
			$this->session->set_userdata('userimage_admin',$result[0]['user_image']);
                        $this->session->set_userdata('user_email',$result[0]['email']);
                        $this->session->set_userdata('employee_code',$result[0]['intemp_code']);
                        $this->session->set_userdata('employee_role',$result[0]['role']);
                        $loginType = $result[0]['role'];
                        //print_r($loginType);
                        //exit;
                        if($loginType=='Admin'){
                            redirect("admin/dashboard");
                        }else{
                            redirect("internalemployee/dashboard");
                        }
		    }
	    }
	    else{
		$this->load->view('login/index');
	    }
	}
	else{
	    redirect("login/dashboard");
	}
    }
    
    function logout(){
	$this->session->unset_userdata('username_admin');
	unset($this->session->userdata);
	redirect(base_url()."login",'refresh');
    }
 //======================================USER LOGIN INDEX PAGE ENDS=====================================================================
 
 
//======================================DASHBOARD STARTS=====================================================================    
    function dashboard(){
	
	
	$session_data = $this->session->userdata('username_admin');
	$session_role = $this->session->userdata('employee_role');
	
	if($session_data!='')
	{
	    //echo $session_data=$this->session->userdata('username_admin');
	    //exit;
	    //$data['vendorCount']=$this->talentModel->vendorCount();
	    //$data['employeesCount']=$this->talentModel->employeesCount();
	    //$this->load->view('admin/header');	
	    //$this->load->view('admin/dashboard',$data);
	    if($session_role=='Admin'){
		redirect("admin/dashboard");
	    }else{
		redirect("internalemployee/dashboard");
	    }
	}
	else
	{
	    redirect(site_url("login"),'refresh');
	}
    }
//======================================DASHBOARD ENDS=====================================================================

    function forgotPassword(){
        if(isset($_POST['forgotsave']))
        {
            //print_r($_POST['forgotsave']);
            //exit;
            $result=$this->loginmodel->getPassword();
        }
        else{
            $this->load->view('login/forgotpassword');	    
        }
    }
    
    function resetPassword($fPassToken){
        if(isset($_POST['resetSave']))
        {
            $this->loginmodel->updatePassword($fPassToken);
        }
        else{
            $this->load->view('view/resetPassword');
        }	    
    }
}	
