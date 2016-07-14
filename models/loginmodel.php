<?php
class loginmodel extends CI_Model {
    
    function checkLoginType()
    {
	$email = $this->input->post('email');
	$password = $this->input->post('password');
        $logintype = $this->input->post('login_type');
	$sql="SELECT * FROM login_auth where email='$email' AND password='$password' AND role='$logintype' AND status='Y'";
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
    
    function getPassword()
    {
        $email = $this->input->post('forgotpassword');
        //$loginType = $this->input->post('login_types');
        
        $passwordToken = random_string('alnum', 14);	    
        $sql="SELECT email FROM login_auth where email='$email'";
        $result=$this->db->query($sql, $return_object = TRUE)->result_array();	
        if($result[0]!=0){
            $this->db->where('email', $email);
            $data = array(
                'password_token'=>$passwordToken,
            );
            $this->db->update('login_auth', $data);		
        }
        $result = $this->db->affected_rows();

        if($result==0){
            $this->session->set_flashdata('error', 'Your entered email is incorrect please enter a valid email');
            redirect('talentcapitalctr/forgotPassword');		
        }else{
            $this->sendForgetPassword($email,$passwordToken);
        }
    }
        
    function sendForgetPassword($email,$fPassToken){
        $body ="<html>
                    <head>
                        <title>Welcome to Talent Capital</title>
                    </head>
                    <body>
                        <h1>Talent Capital Forget Password Reset Confirmation</h1>
                        <h4>You requested that your password be reset. please visit the link below to get new password</h4>
                        <p>".base_url()."login/resetPassword/".$fPassToken."</p>
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
        $this->email->subject('Talent Capital Forget Password Recover');
        $this->email->message($body);
        if($this->email->send()){
            $this->session->set_flashdata('error', 'Your forget password has been sent to your email, please check it');
            redirect('login/forgotPassword');
        }else{
            $this->session->set_flashdata('error', 'Your email is not sent');
            redirect('login/forgotPassword');		
        }	    
    }
    
    function updatePassword($fPassToken){
        $this->db->where('password_token', $fPassToken);
        $data = array(
            'password'=>$this->input->post('confirmPassword'),
            'password_token'=>'',
        );
        //echo "<pre>";print_r($data);exit;
        $this->db->update('login_auth', $data);
        $result = $this->db->affected_rows();
        if($result==0)
        {
            $this->session->set_flashdata('error', 'Your forget password not updated properly');
            redirect(site_url('login'),'refresh');			    
        }
        else{
            $this->session->set_flashdata('error', 'Your forget password has been reset successfully');
            redirect(site_url('login'),'refresh');	
        }	    
    }
    
    
}