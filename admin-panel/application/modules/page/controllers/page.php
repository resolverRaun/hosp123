<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Page extends MX_Controller
  {
    var $data_title; 
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_logged_in')== false)
          redirect(base_url());
        $this->load->model('page_model');
        $this->load->helper('ckeditor');
        $this->data_title = array(
                'title_heading' => 'Page',
                'title_sub_heading' => 'Page list',        
            );
    }

    function index()
    { 
        $data_title = $this->data_title;
        $vdata = $this->crud_model->getSection('page');
        $vdatacat = $this->crud_model->getSection('category');
        if(is_array($vdata))
          {
              $data['list'] = $vdata;
              $data['cat_list'] = $vdatacat;
          }
        else
          {
             $data['list'] = array();
          }

        $this->admintemp->write_view('title','includes/title',$data_title);
        $this->admintemp->write_view('content','page_view',$data);
        $this->admintemp->render();
    }

    function faq()
    { 
        $data_title = array(
                'title_heading' => 'FAQ',
            );
        $vdata = $this->page_model->getFaqPage('page',2);
        $vdatacat = $this->crud_model->getSection('category');
        if(is_array($vdata))
          {
              $data['list'] = $vdata;
              $data['cat_list'] = $vdatacat;
          }
        else
          {
             $data['list'] = array();
          }

        $this->admintemp->write_view('title','includes/title',$data_title);
        $this->admintemp->write_view('content','page_view',$data);
        $this->admintemp->render();
    }

    function terms()
    { 
        $data_title = array(
                'title_heading' => 'Terms & Conditions',
            );
        $vdata = $this->page_model->getFaqPage('page',3);
        $vdatacat = $this->crud_model->getSection('category');
        if(is_array($vdata))
          {
              $data['list'] = $vdata;
              $data['cat_list'] = $vdatacat;
          }
        else
          {
             $data['list'] = array();
          }

        $this->admintemp->write_view('title','includes/title',$data_title);
        $this->admintemp->write_view('content','page_view',$data);
        $this->admintemp->render();
    }

    function policies()
    { 
        $data_title = array(
                'title_heading' => 'Policies',
            );
        $vdata = $this->page_model->getFaqPage('page',4);
        $vdatacat = $this->crud_model->getSection('category');
        if(is_array($vdata))
          {
              $data['list'] = $vdata;
              $data['cat_list'] = $vdatacat;
          }
        else
          {
             $data['list'] = array();
          }

        $this->admintemp->write_view('title','includes/title',$data_title);
        $this->admintemp->write_view('content','page_view',$data);
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
            page::index();
        }
    }
    
    function create()
    {
         if(isset($_POST['save']))
         {
                 $title = trim($this->input->post('page_title'));
                 $alias = trim($this->input->post('page_alias'));
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
                 'page_title' => $title,
                 'page_alias' => strtolower($alias),
                 'state' => $this->input->post('state'),
                 'feature' => $this->input->post('feature'),
                 'order' => trim($this->input->post('order')),
                 'image' => trim($this->input->post('image')),
                 'cat_id' => trim($this->input->post('cat_id')),
                 'created_date' => date('y:m:d h:m:s'),
                 'site_title' => trim($this->input->post('site_title')),
                 'metadesc'=>trim($this->input->post('metadesc')),
                 'metakey'=>trim($this->input->post('metakey')),
                 'long_desc'=>trim($this->input->post('long_desc')),
                 'short_desc'=>trim($this->input->post('short_desc')),
                 );
                 $dataIn = $this->crud_model->insertData('page',$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message',$title.' Saved Successfully');
                     if($this->input->post('cat_id')==2){
                        $redi = 'faq';
                     }elseif($this->input->post('cat_id')==3){
                        $redi = 'terms';
                     }elseif($this->input->post('cat_id')==4){
                        $redi = 'policies';
                     }else{
                        $redi = 'faq';
                     }
                     redirect('page/'.$redi);
                 }
                 else
                 {
                     $this->admintemp->write('error','An error occured while inserting the page.');
                     page::index();
                 }
         }
         else
         {
             page::_create();
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
        $data['heading'] = 'Page';
        $data['panel_title'] = 'Create New Page';
        $data['dropdownlist'] = $this->crud_model->getSection('category');
        $this->admintemp->add_js('assets/js/file_browse.js');
        $this->admintemp->add_js('assets/js/custom-js/clone-textbox.js');
        $this->admintemp->write_view('content','page_create',$data);
        $this->admintemp->render();
    }
    
    function edit()
    {
       if(isset($_POST['save']))
       {
                 $id = $this->input->post('id');
                 $title = trim($this->input->post('page_title'));
                 $alias = trim($this->input->post('page_alias'));
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
                 'page_title' => $title,
                 'page_alias' => strtolower($alias),
                 'state' => $this->input->post('state'),
                 'feature' => $this->input->post('feature'),
                 'order' => trim($this->input->post('order')),
                 'image' => trim($this->input->post('image')),
                 'cat_id' => trim($this->input->post('cat_id')),
                 'modified_date' => date('y:m:d h:m:s'),
                 'site_title' => trim($this->input->post('site_title')),
                 'metadesc'=>trim($this->input->post('metadesc')),
                 'metakey'=>trim($this->input->post('metakey')),
                 'long_desc'=>trim($this->input->post('long_desc')),
                 'short_desc'=>trim($this->input->post('short_desc')),
                 );
                 $dataIn = $this->crud_model->updateData('page','id',$id,$data);
                 if($dataIn)
                 {
                     $this->admintemp->write('message','Edited Successfully');
                     if($this->input->post('cat_id')==2){
                        $redi = 'faq';
                     }elseif($this->input->post('cat_id')==3){
                        $redi = 'terms';
                     }elseif($this->input->post('cat_id')==4){
                        $redi = 'policies';
                     }else{
                        $redi = 'faq';
                     }
                     redirect('page/'.$redi);
                 }
                 else
                 {
                     $this->admintemp->write('message','Error occured while editing');
                     page::index();
                 }
       } 
       else
       {
           page::_edit();
       }
        
    }
    
    function _edit()
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
        $vdata = $this->crud_model->selectById('page','id',$this->uri->segment(3));
        if(is_array($vdata))
        {
           $data['list'] = $this->crud_model->selectById('page','id',$this->uri->segment(3));
           $data['error'] = ''; 
        }
        else
        {
            $data['error']='Invalid entery to edit adminpage.';
        }
        $data['heading'] = 'Page';
        $data['panel_title'] = 'Edit Page';
        $data['dropdownlist'] = $this->crud_model->getSection('category');
        $this->admintemp->write_view('content','page_create',$data);
        $this->admintemp->add_js('assets/js/file_browse.js');
        $this->admintemp->add_js('assets/js/custom-js/clone-textbox.js');
        $this->admintemp->render();
    }
    
    function delete($id = null)
    {
        $vdata = $this->crud_model->selectById('page','id',$id);
        if(is_array($vdata))
        {
            if($vdata['cat_id']==2){
                $redi = 'faq';
             }elseif($vdata['cat_id']==3){
                $redi = 'terms';
             }elseif($vdata['cat_id']==4){
                $redi = 'policies';
             }else{
                $redi = 'faq';
             }
            $deleteId = $this->crud_model->deleteById('page','id',$vdata['id']);

            if($deleteId)
            {
                redirect('page/'.$redi);
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
            redirect('page/create');
        }
    }//
    
  }//end of section class

