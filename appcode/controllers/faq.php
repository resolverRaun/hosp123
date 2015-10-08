<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Faq extends CI_Controller
  {
      function __construct()
      {
          parent::__construct();
            
            $this->load->model('faq_model');
      }
      function index()
      {
          $this->_siteInfo();
          $this->_frontportion();
          $this->_faq_questions();
          $this->template->render();
      }//$this->template->write('content',$heading);
      
      function _frontportion()
      {
          $data['front_image']=$this->faq_model->getFrontPortion();
          $this->template->write_view('front','faq/front_faq',$data);
      }

      function _faq_questions()
      {
          $faq_cat_id = 2;
          $data['faqs_list']=$this->faq_model->getfaqlists($faq_cat_id);
          $this->template->write_view('front','faq/questions',$data);
      }

      function _siteInfo(){
        $this->load->model('home_model');
        $seopage_id = 3;
        $data['site_info']=$this->home_model->getSeoPageInfo($seopage_id);
        $this->template->write_view('site_info','inc/siteinfo',$data);
      }
  }
?>
  