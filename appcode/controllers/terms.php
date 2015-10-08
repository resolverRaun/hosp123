<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Terms extends CI_Controller
  {
      function __construct()
      {
          parent::__construct();
            
            $this->load->model('terms_model');
      }
      function index()
      {
          $this->_siteInfo();
          $this->_frontportion();
          $this->_termsConditions();
          $this->template->render();
      }//$this->template->write('content',$heading);
      
      function _frontportion()
      {
          $this->template->write_view('front','terms/front_terms');
      }

      function _termsConditions()
      {
          $terms_cat_id = 3;
          $data['terms_list']=$this->terms_model->gettermslists($terms_cat_id);
          $this->template->write_view('initial_content','terms/terms_condition',$data);
      }

      function _siteInfo(){
        $this->load->model('home_model');
        $seopage_id = 4;
        $data['site_info']=$this->home_model->getSeoPageInfo($seopage_id);
        $this->template->write_view('site_info','inc/siteinfo',$data);
      }
  }
?>