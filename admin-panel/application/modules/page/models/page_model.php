<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Page_model extends CI_Model
  {
      function __construct()
      {
         parent::__construct();   
      }//
      
      function getFaqPage($tablename,$faq_cat_id)
      {
          $this->db->select('*');
          $this->db->order_by('id','desc');
          $this->db->where('cat_id',$faq_cat_id);
          $query = $this->db->get($tablename);
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }// 
      
  }// end of class
