<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class District_model extends CI_Model
  {
      function __construct()
      {
         parent::__construct();   
      }//
      
      function countSection()
      {
         $countRow = $this->db->count_all('district');
      return $countRow;    
      }//
      
      function getSection()
      {
          $this->db->select('*');
          $this->db->order_by('id','desc');
          $query = $this->db->get('district');
          
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//
      function create($data)
      {
          $this->db->insert('district',$data);
          return true;
      }//
            
      function edit($id,$data)
      {
         $this->db->where('id',$id);
         $this->db->update('district',$data);
         return true; 
      }//
      
      function deleteSection($id)
      {
          $this->db->where('id',$id);
          $this->db->delete('district');
          return true;
      }//
      function findAndDelete($id)
      {
          $this->db->select('id');
          $this->db->where('id',$id);
          $query = $this->db->get('district');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//
      
  }// end of class
