<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Courses_model extends CI_Model
  {
      function __construct()
      {
         parent::__construct();   
      }//
      
      function countSection()
      {
         $countRow = $this->db->count_all('courses');
      return $countRow;    
      }//
      
      function getSection()
      {
          $this->db->select('*');
          $this->db->order_by('id','desc');
          $query = $this->db->get('courses');
          
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//
      
      function create($data)
      {
          $this->db->insert('courses',$data);
          return true;
      }//
            
      function edit($id,$data)
      {
         $this->db->where('id',$id);
         $this->db->update('courses',$data);
         return true; 
      }//
      
      function deleteSection($id)
      {
          $this->db->where('id',$id);
          $this->db->delete('courses');
          return true;
      }//
      function findAndDelete($id)
      {
          $this->db->select('id');
          $this->db->where('id',$id);
          $query = $this->db->get('courses');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//
      
  }// end of class
