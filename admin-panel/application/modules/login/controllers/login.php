<?php
  if(! defined('BASEPATH')) exit("Direct script invalid");
  class Login extends MX_Controller
  {
      function __construct()
      {
          parent::__construct();
          if($this->session->userdata('is_logged_in') == True)
          redirect('dashboard');
          $this->load->library('form_validation');
          $this->load->model('login_model');
      }
      
      function index()
      {
          $this->load->view('view_login');
      }//

      function verifyLogin()
      {
        if(isset($_POST['login']))
        {    
          $user_email=trim($this->input->post('useremail'));
          $user_password=trim($this->input->post('password'));
          $user_email=mysql_real_escape_string($user_email);
          $user_password=mysql_real_escape_string($user_password);
          $salt="bU-View9*-ixFaNzatj";
          $user_password.=$salt;
          $user_password=sha1($user_password);
          $verified_useremail=$this->login_model->useremailVerification($user_email);
          $verified_password=$this->login_model->passwordVerification($user_email,$user_password);
          if($verified_useremail==1 && $verified_password==1 )
          {
            $userdata=$this->login_model->GetUser($user_email,$user_password);
            $user_id=$userdata->id;
            $user_email=$userdata->useremail;
            $user_level=$userdata->userlevel;
            $user_position=$userdata->user_position;

            $this->session->set_userdata(array(
            'is_logged_in' =>true,
            'userid'=>$user_id,
            'useremail'=>$user_email,
            'userposition'=>$user_position,
            'userlevel'=>$user_level
            ));
            redirect('dashboard');
          }
          else{
            $data['error_message'] = "Email or password is invalid"; 
            $this->load->view('view_login',$data);
          }

        }
      }//

      function forgetPassword(){
        $this->load->view('forgetpassword');
        if(isset($_POST['btnForgetPassword'])){
          $forgetten_email = $this->input->post('forget_email');
          $userinfo = $this->login_model->selectById('user','useremail',$forgetten_email);
          if($userinfo){
            $email_feedback = $this->sendEmailToForgetPassword($forgetten_email,$userinfo['id']);
            if($email_feedback){
                $data['success_message'] = "Email Sent Successfully";
                $this->session->set_flashdata($data);
                redirect('login/forgetPassword');
            }
            else{
                $data['error_message'] = "problem with sending email";
                $this->session->set_flashdata($data);
                redirect('login/forgetPassword');
            }
          }
          else{
            $data['error_message'] = "Useremail provided doesnot exists";
            $this->session->set_flashdata($data);
            redirect('login/forgetPassword');
          }
        }
      }//

      public function resetPassword($token=null){
          $this->load->model('login_model');
          if(isset($_POST['btnResetNewPassword'])){
            $token=$this->input->post('token');
            $data_userinfo_from_token = $this->login_model->selectById('user','access_token',$token);
            if($data_userinfo_from_token){
              $reset_password = $this->input->post('reset_password');
              $salt="bU-View9*-ixFaNzatj";
              $reset_password.=$salt;
              $reset_password = sha1($reset_password);
              $data['password']=$reset_password;
              $data['access_token']='';
              $this->login_model->updateData('user','id',$data_userinfo_from_token['id'],$data);
              
              redirect(base_url());
            }
            else{
              $data['error_message'] = "Token Mismatched or Expired";
              $this->session->set_flashdata($data);
              redirect('login/resetPassword');
            }
          }
          $data['token']=$token;
          $this->load->view('resetpasswordform',$data);
      }//

      function sendEmailToForgetPassword($forgetten_email,$user_id){
         
            $this->load->library('email');
            $config = Array
              (
                'mailtype'  => 'html', 
                'wordwrap'=>TRUE
              );
            $token = $this->tokenGenerator();
            $data['access_token'] = $token;
            $link = base_url().'login/resetPassword/'.$token;
            $email_body='<p>Dear Golf App Member,<br> Please click the below link reseting your password. </p>';
            $email_body.="<table>";
            $email_body.='<tr><td> link : <a href="'.$link.'">Click Me For Reset Password</a></td></tr>';
            $email_body.='</table>';
            $email_body.="<p>Thank you.<br><br>Regards,<br>Golf Application Admin : Password Automization Form </p>";
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from('golfapp@mail.com');
            $this->email->to($forgetten_email);
            $this->email->subject('Reseting User Password');
            $this->email->message($email_body);
            if($this->email->send())
            {
              $this->login_model->updateData('user','id',$user_id,$data);
              return true;
            }
            else{
              return false;
            }
      }//

      public function tokenGenerator(){
        return md5(uniqid(mt_rand(), true));
      }//
      
  }//
  
