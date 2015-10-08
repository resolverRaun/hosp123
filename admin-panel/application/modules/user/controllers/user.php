<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class User extends MX_Controller
  {
    var $data_title; 
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_logged_in')== false)
          redirect(base_url());
        $this->load->model('user_model');
        $this->load->helper('ckeditor');
        $this->data_title = array(
                'title_heading' => 'User',
            );
    }

    function index()
    { 
        $data_title = $this->data_title;
        $vdata = $this->user_model->getUserSectionByUsertype('user',2);
        $vdatausertype = $this->user_model->getUsertypeSectionByPositionId('usertype',2);
        if(is_array($vdata))
          {
              $data['list'] = $vdata;
              $data['usertype_list'] = $vdatausertype;
          }
        else
          {
              $data['list']=array();
          }

        $this->admintemp->write_view('title','includes/title',$data_title);
        $this->admintemp->write_view('content','user_view',$data);
        $this->admintemp->render();
    }

    function golfusers(){
        $data_title = $this->data_title;
        $vdata = $this->user_model->getUserSectionByUsertype('user',3);/*Golfapp users type id is 3*/
        $vdatausertype = $this->user_model->getUsertypeSectionByPositionId('usertype',3);
        if(is_array($vdata))
          {
              $data['list'] = $vdata;
              $data['usertype_list'] = $vdatausertype;
          }
        else
          {
              $data['list']=array();
          }

        $this->admintemp->write_view('title','includes/title',$data_title);
        $this->admintemp->write_view('content','user_view',$data);
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
            User::index();
        }
    }
    
    function create()
    {
         if(isset($_POST['save']))
         {
                 $user_password=trim($this->input->post('password'));
                 $salt="bU-View9*-ixFaNzatj";
                 $user_password.=$salt;
                 $user_password=sha1($user_password);
                 $data = array(
                 'fullname' => trim($this->input->post('fullname')),
                 'password' => $user_password,
                 'useremail' => trim($this->input->post('useremail')),
                 'state' => trim($this->input->post('state')),
                 'user_type_id' => trim($this->input->post('user_type_id')),
                 'created_date' => date('Y-m-d h:m:s'),
                 'changed_date' => date('Y-m-d h:m:s'),
                 );
                 $dataIn = $this->crud_model->insertData('user',$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','User Saved Successfully');
                     if($this->input->post('user_type_id') == 3){
                         redirect('user/golfusers');
                     }else{
                         redirect('user');
                     }
                 }
                 else
                 {
                     $this->admintemp->write('error','An error occured while inserting the section.');
                     User::index();
                 }
         }
         else
         {
             User::_create();
         }
        
    } //end of create method 
    
    function _create()
    {
        //ckeditor 2
        
        $data['ckeditor_2'] = array(
        
            //ID of the textarea that will be replaced
            'id'     =>     'content_2',
            'path'    =>    'js/ckeditor',
        
            //Optionnal values
            'config' => array(
                'width'     =>     "100%",    //Setting a custom width
                'height'     =>     '20%',    //Setting a custom height
                'toolbar'     =>     array(        //Setting a custom toolbar
                    array('Bold', 'Italic'),
                    array('Underline', 'Strike', 'FontSize'),
                    array('Smiley'),
                    '/'
                )
            ),
        
            //Replacing styles from the "Styles tool"
            'styles' => array(
            
                //Creating a new style named "style 1"
                'style 3' => array (
                    'name'         =>     'Green Title',
                    'element'     =>     'h3',
                    'styles' => array(
                        'color'             =>     'Green',
                        'font-weight'         =>     'bold'
                    )
                )
                                
            )
        );
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
        $data['heading'] = 'User';
        $data['panel_title'] = 'Create New User';
        $data['usertype_list'] = $this->user_model->getUsertypeSection('usertype');
        $this->admintemp->add_js('assets/js/file_browse.js');
        $this->admintemp->add_js('assets/js/custom-js/clone-textbox.js');
        $this->admintemp->write_view('content','user_create',$data);
        $this->admintemp->render();
    }
    
    function edit()
    {
       if(isset($_POST['save']))
       {
                 $id=$this->input->post('id');
                 $data = array(
                 'fullname' => trim($this->input->post('fullname')),
                 'useremail' => trim($this->input->post('useremail')),
                 'state' => trim($this->input->post('state')),
                 'user_type_id' => trim($this->input->post('user_type_id')),
                 'changed_date' => date('Y-m-d h:m:s'),
                 );
                 $dataIn = $this->crud_model->updateData('user','id',$id,$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','Edited Successfully');
                     if($this->input->post('user_type_id') == 3){
                         redirect('user/golfusers');
                     }else{
                         redirect('user');
                     }
                 }
                 else
                 {
                     $this->admintemp->write('message','Error occured while editing');
                     User::index();
                 }
       } 
       else
       {
           User::_edit();
       }
        
    }
    
    function _edit()
    {
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
        $vdata = $this->crud_model->selectById('user','id',$this->uri->segment(3));
        if(is_array($vdata))
        {
           $data['list'] = $this->crud_model->selectById('user','id',$this->uri->segment(3));
           $data['error'] = ''; 
        }
        else
        {
            $data['error']='Invalid entery to edit adminpage.';
        }
        $data['heading'] = 'User';
        $data['panel_title'] = 'Edit User';
        $data['usertype_list'] = $this->user_model->getUsertypeSection('usertype');
        $this->admintemp->write_view('content','user_create',$data);
        $this->admintemp->add_js('assets/js/file_browse.js');
        $this->admintemp->add_js('assets/js/custom-js/clone-textbox.js');
        $this->admintemp->render();
    }
    
    function delete($id = null)
    {
        $vdata = $this->crud_model->selectById('user','id',$id);
        if(is_array($vdata))
        {
            if($vdata['user_type_id']==3){
                $redi = 'golfusers';
             }else{
                $redi = '';
             }

            $deleteId = $this->crud_model->deleteById('user','id',$vdata['id']);
                        
            if($deleteId)
            {
                redirect('user/'.$redi);
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
            redirect('user/create');
        }
    }//
    
  }//end of section class

