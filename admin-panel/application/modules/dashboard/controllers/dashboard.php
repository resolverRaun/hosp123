<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Dashboard extends MX_Controller
  {
      function __construct()
      {
          parent::__construct();
          if($this->session->userdata('is_logged_in')== false)
          redirect(base_url());
          $this->load->model('dashboard_model');
      }
      function index()
      {
        $data['heading'] = 'Dashboard page yet to be done';
        $this->admintemp->write_view('content','dashboard_view',$data);
        $this->admintemp->render();
      }
  }#end of class

