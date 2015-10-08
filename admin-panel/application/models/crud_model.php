<?php
  if(!defined('BASEPATH')) exit('direct access invalid');
  class Crud_model extends CI_Model
  {
      function __construct()
      {
         parent::__construct();   
      }//

      //Start creating CRUD Model for all
      
      function insertData($tablename, $data)
      {
        $this->db->insert($tablename,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;  
      }

      function getSection($tablename)
      {
          $this->db->select('*');
          $this->db->order_by('id','desc');
          $query = $this->db->get($tablename);
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//

      function deleteById($tablename,$compare_parameter1,$parameter1)
      {
          $this->db->where($compare_parameter1,$parameter1);
          $this->db->delete($tablename);
          return true;
      }//

      function updateData($tablename,$compare_parameter1,$parameter1,$data)
      {
         $this->db->where($compare_parameter1,$parameter1);
         $this->db->update($tablename,$data);
         return true; 
      }//

      function selectById($tablename,$compare_parameter1,$parameter1)
      {
          $this->db->select('*');
          $this->db->where($compare_parameter1,$parameter1);
          $this->db->limit(1);
          $query = $this->db->get($tablename);
          if($query->num_rows()>0)
          {
              return $query->row_array();
          }
      }//

      function selectByIdAll($tablename,$compare_parameter1,$parameter1)
      {
          $this->db->select('*');
          $this->db->where($compare_parameter1,$parameter1);
          $this->db->limit(1);
          $query = $this->db->get($tablename);
          if($query->num_rows()>0)
          {
              return $query->result_array();
          }
      }//

       function getSectionMe($tablename,$limit,$offset,$sWhere=null)
      {
          $sql = "SELECT * FROM ce_seopage ";
          if($sWhere != null){
            $sql.= $sWhere;
          }
          $sql.= 'ORDER BY id desc limit '.$limit.' offset '.$offset;
          $query = $this->db->query($sql);
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//

      function getSearchResultCounts($tablename,$sWhere=null)
      {
          $sql = "SELECT * FROM ce_seopage ";
          if($sWhere != null){
            $sql.= $sWhere;
          }
          $sql.= 'ORDER BY id desc ';
          $query = $this->db->query($sql);
          if($query->num_rows()>0)
          {
              return $query->result();
          }
      }//

      //End Creating CRUD Model for all
  
      
  }// end of class
