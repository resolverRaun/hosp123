<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Seo extends MX_Controller
  {
    var $data_title; 
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_logged_in')== false)
        redirect(base_url());
        $this->load->model('seo_model');
        $this->data_title = array(
                'title_heading' => 'SEO',
                'title_sub_heading' => 'SEO Page list',        
            );
    }

    function index()
    { 
        $data_title = $this->data_title;
        $vdata = $this->crud_model->getSection('seopage');
        if(is_array($vdata))
          {
              $data['list'] = $vdata;
          }
        else
          {
              $data['list']=array();
          }

        $this->admintemp->write_view('title','includes/title',$data_title);
        $this->admintemp->write_view('content','seo_view',$data);
        $this->admintemp->render();
    }

    function save(){
        if(isset($_POST['save'])){
            $id = $this->input->post('id');
            if($id){
                $this->edit();
            }    
            else{
                $this->create();
            }
        }
        else{
            Seo::index();
        }
    }
    
    function create()
    {
         if(isset($_POST['save']))
         {
                 $data = array(
                 'page_title' => trim($this->input->post('page_title')),
                 'site_title' => trim($this->input->post('site_title')),
                 'metadesc'=>trim($this->input->post('metadesc')),
                 'metakey'=>trim($this->input->post('metakey')),
                 'created_date' => date('y:m:d h:m:s'),
                 'state' => 1,
                 );
                 $dataIn = $this->crud_model->insertData('seopage',$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message',' Saved Successfully');
                     redirect('seo');
                 }
                 else
                 {
                     $this->admintemp->write('error','An error occured while inserting the SEO page.');
                     Seo::index();
                 }
         }
         else
         {
             Seo::_create();
         }
        
    } //end of create method 
    
    function _create()
    {
        $data['heading'] = 'SEO Page';
        $data['panel_title'] = 'Create New Page SEO';
        $this->admintemp->write_view('content','seo_create',$data);
        $this->admintemp->render();
    }
    
    function edit()
    {
       if(isset($_POST['save']))
       {
                 $id = $this->input->post('id');
                  $data = array(
                 'page_title' => trim($this->input->post('page_title')),
                 'site_title' => trim($this->input->post('site_title')),
                 'metadesc'=>trim($this->input->post('metadesc')),
                 'metakey'=>trim($this->input->post('metakey')),
                 'created_date' => date('y:m:d h:m:s'),
                 'state' => 1,
                 );
                 $dataIn = $this->crud_model->updateData('seopage','id',$id,$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','Edited Successfully');
                     redirect('seo');
                 }
                 else
                 {
                     $this->admintemp->write('message','Error occured while editing');
                     Seo::index();
                 }
       } 
       else
       {
           Seo::_edit();
       }
        
    }
    
    function _edit()
    {
        $vdata = $this->crud_model->selectById('seopage','id',$this->uri->segment(3));
        if(is_array($vdata))
        {
           $data['list'] = $this->crud_model->selectById('seopage','id',$this->uri->segment(3));
           $data['error'] = ''; 
        }
        else
        {
            $data['error']='Invalid entery to edit SEO page.';
        }
        $data['heading'] = 'SEO PAGE';
        $data['panel_title'] = 'Edit SEO PAGE';
        $this->admintemp->write_view('content','seo_create',$data);
        $this->admintemp->render();
    }
    
    function delete($id = null)
    {
        $vdata = $this->crud_model->selectById('seopage','id',$id);
        if(is_array($vdata))
        {
            $deleteId = $this->crud_model->deleteById('seopage','id',$vdata['id']);
            
            if($deleteId)
            {
                redirect('seo');
            }
        }
        else
        {
            $message = "Invalid deletion occured.";
            echo '<script type="text/javascript">'; 
            echo 'alert("'.$message.'");'; 
            echo 'window.history.back();';
            echo '</script>';
        }
        
        
    }
    
    function handler()
    {
        if(isset($_POST['add_new']))
        {
            redirect('seo/create');
        }
    }//
    
  }//end of section class

