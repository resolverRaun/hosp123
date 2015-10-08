<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Contact_model extends CI_Model
  {
      function __construct()
      {
         parent::__construct();   
      }//
      
      function getContact()
      {
          $this->db->select('*');
          $this->db->limit(1);
          $query = $this->db->get('contact');
          if($query->num_rows()>0)
          {
              return $query->row_array();
          }
      }//

       
      
  }// end of class
