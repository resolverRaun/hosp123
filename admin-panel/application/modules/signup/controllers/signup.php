<?php
  if(! defined('BASEPATH')) exit("Direct script invalid");
  class Signup extends MX_Controller
  {
      function __construct()
      {
          parent::__construct();
          if($this->session->userdata('is_loged_in') == True)
          redirect('dasboard');
          $this->clear_cache();
          // $this->load->library('form_validation');
          $this->load->model('signup_model');
      }
      
      function index()
      {
        if(isset($_POST['register']))
        {     
          $data['firstname']=trim($this->input->post('firstname'));
          $data['lastname']=trim($this->input->post('lastname'));
          $data['username']=trim($this->input->post('username'));
          $data['useremail']=trim($this->input->post('useremail'));
          $user_password=trim($this->input->post('password'));
          $salt="bU-View9*-ixFaNzatj";
          $user_password.=$salt;
          $data['password']=sha1($user_password);
          $data['state']=1;
          $data['user_type_id']=3;
          $data['created_date'] =date('y:m:d h:m:s');
          $unique_username = $this->checkUniqueUsername($data['username']);
          $unique_useremail = $this->checkUniqueEmail($data['useremail']);
          if($unique_username){
              $data_error['error_message'] = "This username has been already used";
              $this->load->view('view_signup',$data_error);
          }
          elseif($unique_useremail)
          {
              $data_error['error_message'] = "This useremail has been already used"; 
              $this->load->view('view_signup',$data_error);
          }
          else
          {
            $this->signup_model->insertData('user',$data);
            $data_success['success_message'] = "User registered successfully"; 
            $this->load->view('view_signup',$data_success);
          }
        } 
          $this->load->view('view_signup');
      }//

      function checkUniqueUsername($username)
      {
          $username_unique = $this->signup_model->checkById('user','username',$username);
          return $username_unique;
      }    

      function checkUniqueEmail($useremail)
      {
          $useremail_unique = $this->signup_model->checkById('user','useremail',$useremail);
          return $useremail_unique;
      }
      
      function clear_cache()
      {
          $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
          $this->output->set_header("Pragma: no-cache");
      }
      
  }//
  
