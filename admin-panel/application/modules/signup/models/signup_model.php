<?php
  if(!defined('BASEPATH')) exit('No direct script allowed');
  class Signup_model extends CI_Model
  {
      function __construct()
      {
          parent::__construct();
      }//
      
  function insertData($tablename, $data)
  {
    $this->db->insert($tablename,$data);
    return true;  
  }

   function checkById($tablename,$compare_parameter1,$parameter1)
    {
        $this->db->select('*');
        $this->db->where($compare_parameter1,$parameter1);
        $query = $this->db->get($tablename);
        if($query->num_rows()>0)
        {
            return true;
        }
    }//

  }//end of class 
  
