<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class User_model extends CI_Model
  {
      function __construct()
      {
         parent::__construct();   
      }//
      
      function getUsertypeSection($tablename)
      {
          $this->db->select('*');
          $this->db->where('position_id !=',1);
          $query = $this->db->get($tablename);
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//

      function getUsertypeSectionByPositionId($tablename,$position_id)
      {
          $this->db->select('*');
          $this->db->where('position_id',$position_id);
          $query = $this->db->get($tablename);
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//

      function getUserSectionByUsertype($tablename,$user_type_id)
      {
          $this->db->select('*');
          $this->db->order_by('id','desc');
          $this->db->where('user_type_id',$user_type_id);
          $query = $this->db->get($tablename);
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//
       
  }// end of class
