<?php
  if(!defined('BASEPATH')) exit('No direct script allowed');
  class Login_model extends CI_Model
  {
      function __construct()
      {
          parent::__construct();
      }//
      
  function useremailVerification($useremail)
  {
    $t="select * from ce_user where useremail='$useremail'";
    $q=$this->db->query($t);
    if($q->num_rows()>0)
    {
      return true;
    }
    else
    {
      return false;
    }   
  }

  function passwordVerification($useremail,$password)
  {
    $t="select * from ce_user where password='$password' and useremail='$useremail'";
    $q=$this->db->query($t);
    if($q->num_rows()>0)
    {
      return true;
    }
    else
    {
      return false;
    }   
  }
  
  function GetUser($useremail,$password)
  {
    $t="SELECT *,(SELECT usertype FROM ce_usertype WHERE position_id=ce_user.user_type_id) AS 'user_position', 
           (SELECT userlevel FROM ce_usertype WHERE position_id=ce_user.user_type_id) AS 'userlevel'
           FROM ce_user WHERE useremail='$useremail' AND password='$password'";
    $q=$this->db->query($t)->row();     
    return $q;          
  }

  function selectById($tablename,$compare_parameter1,$parameter1)
      {
          $this->db->select('*');
          $this->db->where($compare_parameter1,$parameter1);
          $this->db->limit(1);
          $query = $this->db->get($tablename);
          if($query->num_rows()>0)
          {
              // return $query->result();
              return $query->row_array();
          }
      }//

  function updateData($tablename,$compare_parameter1,$parameter1,$data)
      {
         $this->db->where($compare_parameter1,$parameter1);
         $this->db->update($tablename,$data);
         return true; 
      }//

}//end of class 
  
