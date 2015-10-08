<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Social_links extends MX_Controller
  { 
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_logged_in')== false)
          redirect(base_url());
        $this->load->model('social_links_model');
    }

    function index()
    { 
        $vdata = $this->social_links_model->getSocialLinks('social_links');
         if(is_array($vdata))
         {
             $data['list'] = $this->social_links_model->getSocialLinks('social_links');
             $data['error'] = '';
         }
         else 
         {
             $data['list'] = '';
             $data['error'] = "Sorry no record found.";
         }

        $data['heading'] = 'Social Links';
        $data['panel_title'] = 'Social Links Page';
        $this->admintemp->write_view('content','social_links_create',$data);
        $this->admintemp->render();
    }
    
    function create()
    {
         if(isset($_POST['save']))
         {
                $id = $this->input->post('id');
                 $data = array(
                 'facebook_link' => trim($this->input->post('facebook_link')),
                 'twitter_link' => trim($this->input->post('twitter_link')),
                 'googleplus_link' => trim($this->input->post('googleplus_link')),
                 'linkedin_link' => trim($this->input->post('linkedin_link')),
                 'android_store_link' => trim($this->input->post('android_store_link')),
                 'ios_store_link' => trim($this->input->post('ios_store_link')),
                 'mailchimp_api_key' => trim($this->input->post('mailchimp_api_key')),
                 'campaign_list_id' => trim($this->input->post('campaign_list_id')),
                 'youtube_video_link' => trim($this->input->post('youtube_video_link')),
                 'created_date' => date('y:m:d h:m:s'),
                 );
                 $dataIn = $this->crud_model->updateData('social_links','id',$id,$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','Social Links Saved Successfully');
                     Social_links::index();
                 }
                 else
                 {
                     $this->admintemp->write('error','An error occured while updating the social links.');
                     redirect('social_links');
                 }
         }
         else{
            Social_links::index();
         }
         
    } //end of create method 
   
  }//end of section class

