<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Slide extends MX_Controller
  {
    var $data_title; 
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_logged_in')== false)
          redirect(base_url());
        $this->load->model('slide_model');
        $this->load->helper('ckeditor');
        $this->data_title = array(
                'title_heading' => 'Slide',
                'title_sub_heading' => 'Slide list',        
            );
    }

    function index()
    { 
        $data_title = $this->data_title;
        $vdata = $this->crud_model->getSection('slide');
        $vdata_slidecat = $this->crud_model->getSection('slide_category');
        if(is_array($vdata))
          {
              $data['list'] = $vdata;
              $data['slidecat_list'] = $vdata_slidecat;
          }
        else
          {
              $data['list'] = array();
          }

        $this->admintemp->write_view('title','includes/title',$data_title);
        $this->admintemp->write_view('content','slide_view',$data);
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
            Slide::index();
        }
    }
    
    function create()
    {
         if(isset($_POST['save']))
         {
                 $title = trim($this->input->post('title'));
                 $alias = trim($this->input->post('alias'));
                 if($alias)
                 {
                     $alias = preg_replace('/\s+/','-',strtolower($alias));
                     $alias = preg_replace('/&/','-',$alias);
                     $alias = preg_replace('#/+#','-',$alias);
                     $alias = preg_replace('/---/','-',$alias);
                     $alias = preg_replace('/(\'|\(|\))/','',$alias);
                 }
                 else 
                 {
                     $alias = preg_replace('/\s+/','-',strtolower($title));
                     $alias = preg_replace('/&/','-',$alias);
                     $alias = preg_replace('#/+#','-',$alias);
                     $alias = preg_replace('/---/','-',$alias);
                     $alias = preg_replace('/(\'|\(|\))/','',$alias);
                 }
                 $data = array(
                 'title' => $title,
                 'alias' => strtolower($alias),
                 'state' => $this->input->post('state'),
                 'order' => trim($this->input->post('order')),
                 'width' => trim($this->input->post('width')),
                 'height' => trim($this->input->post('height')),
                 'alt_text' => trim($this->input->post('alt_text')),
                 'link' => trim($this->input->post('link')),
                 'image' => trim($this->input->post('image')),
                 'scat_id' => trim($this->input->post('scat_id')),
                 'created_date' => date('y:m:d h:m:s'),
                 'intro_desc'=>trim($this->input->post('intro_desc')),
                 );
                 $dataIn = $this->crud_model->insertData('slide',$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message',$title.' Saved Successfully');
                     redirect('slide');
                 }
                 else
                 {
                     $this->admintemp->write('error','An error occured while inserting the section.');
                     Slide::index();
                 }
         }
         else
         {
             Slide::_create();
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
        $data['panel_title'] = 'Create New Slide';
        $data['dropdownlist'] = $this->crud_model->getSection('slide_category');
        $this->admintemp->add_js('assets/js/file_browse.js');
        $this->admintemp->add_js('assets/js/custom-js/clone-textbox.js');
        $this->admintemp->write_view('content','slide_create',$data);
        $this->admintemp->render();
    }
    
    function edit()
    {
       if(isset($_POST['save']))
       {
                 $id = $this->input->post('id');
                 $title = trim($this->input->post('title'));
                 $alias = trim($this->input->post('alias'));
                 if($alias)
                 {
                     $alias = preg_replace('/\s+/','-',strtolower($alias));
                     $alias = preg_replace('/&/','-',$alias);
                     $alias = preg_replace('#/+#','-',$alias);
                     $alias = preg_replace('/---/','-',$alias);
                     $alias = preg_replace('/\'/','',$alias);
                 }
                 else 
                 {
                     $alias = preg_replace('/\s+/','-',strtolower($title));
                     $alias = preg_replace('/&/','-',$alias);
                     $alias = preg_replace('#/+#','-',$alias);
                     $alias = preg_replace('/---/','-',$alias);
                     $alias = preg_replace('/\'/','',$alias);
                 }
                 $data = array(
                 'title' => $title,
                 'alias' => strtolower($alias),
                 'state' => $this->input->post('state'),
                 'order' => trim($this->input->post('order')),
                 'width' => trim($this->input->post('width')),
                 'height' => trim($this->input->post('height')),
                 'alt_text' => trim($this->input->post('alt_text')),
                 'link' => trim($this->input->post('link')),
                 'image' => trim($this->input->post('image')),
                 'scat_id' => trim($this->input->post('scat_id')),
                 'created_date' => date('y:m:d h:m:s'),
                 'intro_desc'=>trim($this->input->post('intro_desc')),
                 );
                 $dataIn = $this->crud_model->updateData('slide','id',$id,$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','Edited Successfully');
                     redirect('slide');
                 }
                 else
                 {
                     $this->admintemp->write('message','Error occured while editing');
                     Slide::index();
                 }
       } 
       else
       {
          Slide::_edit();
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
        $vdata = $this->crud_model->selectById('slide','id',$this->uri->segment(3));
        if(is_array($vdata))
        {
           $data['list'] = $this->crud_model->selectById('slide','id',$this->uri->segment(3));
           $data['error'] = ''; 
        }
        else
        {
            $data['error']='Invalid entry to edit slide.';
        }
        $data['panel_title'] = 'Edit Slide';
        $data['dropdownlist'] = $this->crud_model->getSection('slide_category');
        $this->admintemp->write_view('content','slide_create',$data);
        $this->admintemp->add_js('assets/js/file_browse.js');
        $this->admintemp->add_js('assets/js/custom-js/clone-textbox.js');
        $this->admintemp->render();
    }
    
    function delete($id = null)
    {
        $vdata = $this->crud_model->selectById('slide','id',$id);
        if(is_array($vdata))
        {
            $deleteId = $this->crud_model->deleteById('slide','id',$vdata['id']);
            
            if($deleteId)
            {
                redirect('slide');
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
            redirect('slide/create');
        }
    }//
    
  }//end of section class

