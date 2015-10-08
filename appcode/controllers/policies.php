<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Policies extends CI_Controller
  {
      function __construct()
      {
          parent::__construct();
            
            $this->load->model('policies_model');
      }
      function index()
      {
          $this->_siteInfo();
          $this->_frontportion();
          $this->_policies();
          $this->template->render();
      }//$this->template->write('content',$heading);
      
      function _frontportion()
      {
          $this->template->write_view('front','policies/front_policies');
      }

      function _policies()
      {
          $policies_cat_id = 4;
          $data['policies_list']=$this->policies_model->getpolicieslists($policies_cat_id);
          $this->template->write_view('initial_content','policies/privacy_policy',$data);
      }

      function _siteInfo(){
        $this->load->model('home_model');
        $seopage_id = 5;
        $data['site_info']=$this->home_model->getSeoPageInfo($seopage_id);
        $this->template->write_view('site_info','inc/siteinfo',$data);
      }
  }
?>