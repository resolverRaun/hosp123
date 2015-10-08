<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Section_model extends CI_Model
  {
      function __construct()
      {
         parent::__construct();   
      }//
      
      function countSection()
      {
         $countRow = $this->db->count_all('section');
      return $countRow;    
      }//
      
      // function getSection($limit,$start)
      // {
      //     $this->db->select('id,sec_title,state,order,created_date,modified_date');
      //     $this->db->order_by('id','desc');
      //     $this->db->limit($limit,$start);
      //     $query = $this->db->get('section');
          
      //     if($query->num_rows()>0)
      //     {
      //         return $query->result();
      //     }
      // }//

      function getSection()
      {
          $this->db->select('id,sec_title,state,order,created_date,modified_date');
          $this->db->order_by('id','desc');
          // $this->db->limit($limit,$start);
          $query = $this->db->get('section');
          
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//
      function create($data)
      {
          $this->db->insert('section',$data);
          return true;
      }//
      
      function getById($id)
      {
          $this->db->select('id,sec_title,alias,state,order,metakey,metadesc,site_title,desc');
          $this->db->where('id',$id);
          $this->db->limit(1);
          $query = $this->db->get('section');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//
      
      function edit($id,$data)
      {
         $this->db->where('id',$id);
         $this->db->update('section',$data);
         return true; 
      }//
      
      function deleteSection($id)
      {
          $this->db->where('id',$id);
          $this->db->delete('section');
          return true;
      }//
      function findAndDelete($id)
      {
          $this->db->select('id');
          $this->db->where('id',$id);
          $query = $this->db->get('section');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//
      
      function order()
      {
          $this->db->select('id,sec_title,order');
          $this->db->order_by('order','asc');
          $query = $this->db->get('section');
          if($query->num_rows()>0)
          {
          return $query->result();
          }
      }//
      
      function updateorderSection($id,$data)
         {
           $this->db->where('id',$id);
           $this->db->update('section',$data);
           return true;
         }//
         
      function publishSection($id,$data)
      {
           $this->db->where('id',$id);
           $this->db->update('section',$data);
           return true;
      }   
      
  }// end of class
