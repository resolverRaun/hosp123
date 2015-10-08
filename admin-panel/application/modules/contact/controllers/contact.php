<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Contact extends MX_Controller
  { 
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_logged_in')== false)
          redirect(base_url());
        $this->load->model('contact_model');
        $this->load->helper('ckeditor');
    }

    function index()
    { 
        $vdata = $this->contact_model->getContact('Contact');
         if(is_array($vdata))
         {
             $data['list'] = $this->contact_model->getContact('Contact');
             $data['error'] = '';
         }
         else 
         {
             $data['list'] = '';
             $data['error'] = "Sorry no record found.";
         }

       $data['ckeditor'] = array(
        
            //ID of the textarea that will be replaced
            'id'     =>     'content',
            'path'    =>    'js/ckeditor',
        
            //Optionnal values
            'config' => array(
                'toolbar'     =>     "Full",     //Using the Full toolbar
                'width'     =>     "100%",    //Setting a custom width
                'height'     =>     '250px',    //Setting a custom height
               ),
        
            //Replacing styles from the "Styles tool"
            'styles' => array(
             //Creating a new style named "style 1"
             'style 1' => array (
                    'name'         =>     'Blue Title',
                    'element'     =>     'h2',
                    'styles' => array(
                        'color'             =>     'Blue',
                        'font-weight'         =>     'bold'
                    )
                ),
                
                //Creating a new style named "style 2"
                'style 2' => array (
                    'name'         =>     'Red Title',
                    'element'     =>     'h2',
                    'styles' => array(
                        'color'             =>     'Red',
                        'font-weight'         =>     'bold',
                        'text-decoration'    =>     'underline'
                    )
                )                
            )
        );
        $data['heading'] = 'Contact Us';
        $data['panel_title'] = 'Contact Page';
        $this->admintemp->write_view('content','contact_create',$data);
        $this->admintemp->render();
    }
    
    function create()
    {
         if(isset($_POST['save']))
         {
                $id = $this->input->post('id');
                 
                 $data = array(
                 'company_name' => trim($this->input->post('company_name')),
                 'about_company' => trim($this->input->post('about_company')),
                 'first_name' => trim($this->input->post('first_name')),
                 'middle_name' => trim($this->input->post('middle_name')),
                 'last_name' => trim($this->input->post('last_name')),
                 'permanent_address' => trim($this->input->post('permanent_address')),
                 'temprory_address' => trim($this->input->post('temprory_address')),
                 'telephone' => trim($this->input->post('telephone')),
                 'mobile' => trim($this->input->post('mobile')),
                 'fax' => trim($this->input->post('fax')),
                 'zipcode' => trim($this->input->post('zipcode')),
                 'country' => trim($this->input->post('country')),
                 'email1' => trim($this->input->post('email1')),
                 'email2' => trim($this->input->post('email2')),
                 'state' => trim($this->input->post('state')),
                 'c_state' => trim($this->input->post('c_state')),
                 'state' => trim($this->input->post('state')),
                 'created_date' => date('y:m:d h:m:s'),
                 );
                 $dataIn = $this->crud_model->updateData('contact','id',$id,$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','Contact Saved Successfully');
                     redirect('contact');
                 }
                 else
                 {
                     $this->admintemp->write('error','An error occured while inserting the section.');
                     Contact::index();
                 }
         }
         else{
            Contact::index();
         }
         
    } //end of create method 
   
  }//end of section class

