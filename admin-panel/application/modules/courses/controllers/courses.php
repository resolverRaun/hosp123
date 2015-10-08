<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Courses extends MX_Controller
  {
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_logged_in')== false)
          redirect(base_url());
        $this->load->model('courses_model');
        $this->load->helper('ckeditor');
        $this->data_title = array(
                'title_heading' => 'Courses',
                'title_sub_heading' => 'Courses Lists',        
            );
    }

    function index()
    { 
        $data_title = $this->data_title;
        $vdata = $this->courses_model->getSection('courses');
        if(is_array($vdata))
          {
              $data['list'] = $vdata;
          }
        else
          {
              $data['list']=array();
          }

        $this->admintemp->write_view('title','includes/title',$data_title);
        $this->admintemp->write_view('content','courses_view',$data);
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
            Courses::index();
        }
    }
    
    function create()
    {
         if(isset($_POST['save']))
         {
                 $data = array(
                 'course_name' => trim($this->input->post('course_name')),
                 'graduation_type' => trim($this->input->post('graduation_type')),
                 'state' => $this->input->post('state'),
                 );
                 $dataIn = $this->courses_model->create($data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','Saved Successfully');
                     redirect('courses');                 
                 }
                 else
                 {
                     $this->admintemp->write('error','An error occured while inserting the tee color set.');
                     Courses::index();
                 }
         }
         else
         {
             Courses::_create();
         }
        
    } //end of create method 
    
    function _create()
    {
        $data['heading'] = 'Course';
        $data['panel_title'] = 'Add New Courses';
        $this->admintemp->write_view('content','courses_create',$data);
        $this->admintemp->render();
    }
    
    function edit()
    {
       if(isset($_POST['save']))
       {
                 $id = $this->input->post('id');
                 $data = array(
                 'course_name' => trim($this->input->post('course_name')),
                 'graduation_type' => trim($this->input->post('graduation_type')),
                 'state' => $this->input->post('state'),
                 );
                 $dataIn = $this->courses_model->edit($id,$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','Edited Successfully');
                     redirect('courses');
                 }
                 else
                 {
                     $this->admintemp->write('message','Error occured while editing');
                     Courses::index();
                 }
       } 
       else
       {
           Courses::_edit();
       }
        
    }
    
    function _edit()
    {
        $vdata = $this->crud_model->selectById('courses','id',$this->uri->segment(3));
        if(is_array($vdata))
        {
           $data['list'] = $this->crud_model->selectById('courses','id',$this->uri->segment(3));
           $data['error'] = ''; 
        }
        else
        {
            $data['error']='Invalid entry to edit courses.';
        }
        
        $data['heading'] = 'Courses';
        $data['panel_title'] = 'Edit Courses Information';
        $this->admintemp->write_view('content','courses_create',$data);
        $this->admintemp->render();
    }
    
    function delete($id = null)
    {
        $vdata = $this->courses_model->findAndDelete($id);
        if(is_array($vdata))
        {
            foreach($vdata as $p)
            {
                $deleteId = $this->courses_model->deleteSection($p->id);
            }
            if($deleteId)
            {
                redirect('courses');
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
            redirect('courses/create');
        }
    }//
    
  }//end of section class

