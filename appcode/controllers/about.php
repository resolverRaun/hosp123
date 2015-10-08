<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class About extends CI_Controller
  {
      function __construct()
      {
          parent::__construct();
            
            $this->load->model('about_model');
      }
      function index()
      {
          $this->_siteInfo();
          $this->_frontportion();
          $this->_welcomeGolfkeeperApp();
          $this->_feature();
          $this->template->add_js('asset/js/custom-js/remove_add_class.js');
          $this->template->render();
      }//$this->template->write('content',$heading);
      
      function _frontportion()
      {
          $data['front_image']=$this->about_model->getFrontPortion();
          $this->template->write_view('front','about/front_about',$data);
      }

      function _welcomeGolfkeeperApp()
      {
          $welcome_golfapp_pageid = 1;
          $using_webapp_pageid = 2;
          $scoial_links_id = 1;
          $data['welcome_app']=$this->about_model->getSinglePageInfo($welcome_golfapp_pageid);
          $data['links']=$this->about_model->getSocialLinks($scoial_links_id);
          $data['using_app']=$this->about_model->getSinglePageInfo($using_webapp_pageid);
          $this->template->write_view('initial_content','about/welcome_video',$data);
      }

      function _feature()
      {
          $createpage_id = 3;
          $managepage_id =4;
          $sharepage_id = 5;
          $data['create']=$this->about_model->getSinglePageInfo($createpage_id);
          $data['manage']=$this->about_model->getSinglePageInfo($managepage_id);
          $data['share']=$this->about_model->getSinglePageInfo($sharepage_id);
          $this->template->write_view('feature','feature/golfapp_features',$data);
      }

      function _siteInfo(){
        $this->load->model('home_model');
        $seopage_id = 2;
        $data['site_info']=$this->home_model->getSeoPageInfo($seopage_id);
        $this->template->write_view('site_info','inc/siteinfo',$data);
      }

      
  }
  

