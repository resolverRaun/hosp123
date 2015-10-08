<?php
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class Logout extends MX_Controller
  {
      function __construct()
      {
          parent::__construct();
          if($this->session->userdata('is_logged_in')== false)
          redirect(base_url());
          
      }
      function index()
      {
          $this->session->unset_userdata('username');
          $this->session->unset_userdata('is_logged_in');
          $this->session->sess_destroy();
          redirect(base_url(),'refresh');
      }
  }
 
