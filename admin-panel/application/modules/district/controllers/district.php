<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class District extends MX_Controller
  {
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_logged_in')== false)
          redirect(base_url());
        $this->load->model('district_model');
        $this->load->helper('ckeditor');
        $this->data_title = array(
                'title_heading' => 'District',
                'title_sub_heading' => 'District Lists',        
            );
    }

    function index()
    { 
        $data_title = $this->data_title;
        $vdata = $this->district_model->getSection('district');
        if(is_array($vdata))
          {
              $data['list'] = $vdata;
          }
        else
          {
              $data['list']=array();
          }

        $this->admintemp->write_view('title','includes/title',$data_title);
        $this->admintemp->write_view('content','district_view',$data);
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
            District::index();
        }
    }
    
    function create()
    {
         if(isset($_POST['save']))
         {
                 $data = array(
                 'district_name' => trim($this->input->post('district_name')),
                 'state' => $this->input->post('state'),
                 );
                 $dataIn = $this->district_model->create($data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','Saved Successfully');
                     redirect('district');                 
                 }
                 else
                 {
                     $this->admintemp->write('error','An error occured while inserting the tee color set.');
                     District::index();
                 }
         }
         else
         {
             District::_create();
         }
        
    } //end of create method 
    
    function _create()
    {
        $data['heading'] = 'District';
        $data['panel_title'] = 'Add New Districts';
        $this->admintemp->write_view('content','district_create',$data);
        $this->admintemp->render();
    }
    
    function edit()
    {
       if(isset($_POST['save']))
       {
                 $id = $this->input->post('id');
                 $data = array(
                 'district_name' => trim($this->input->post('district_name')),
                 'state' => $this->input->post('state'),
                 );
                 $dataIn = $this->district_model->edit($id,$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','Edited Successfully');
                     redirect('district');
                 }
                 else
                 {
                     $this->admintemp->write('message','Error occured while editing');
                     District::index();
                 }
       } 
       else
       {
           District::_edit();
       }
        
    }
    
    function _edit()
    {
        $vdata = $this->crud_model->selectById('district','id',$this->uri->segment(3));
        if(is_array($vdata))
        {
           $data['list'] = $this->crud_model->selectById('district','id',$this->uri->segment(3));
           $data['error'] = ''; 
        }
        else
        {
            $data['error']='Invalid entry to edit district.';
        }
        
        $data['heading'] = 'District';
        $data['panel_title'] = 'Edit District Information';
        $this->admintemp->write_view('content','district_create',$data);
        $this->admintemp->render();
    }
    
    function delete($id = null)
    {
        $vdata = $this->district_model->findAndDelete($id);
        if(is_array($vdata))
        {
            foreach($vdata as $p)
            {
                $deleteId = $this->district_model->deleteSection($p->id);
            }
            if($deleteId)
            {
                redirect('district');
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
            redirect('district/create');
        }
    }//
    
  }//end of section class

