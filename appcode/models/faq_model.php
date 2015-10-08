<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq_model extends CI_Model{

	// protected $collection_id = '5'; 
    function __construct()
      {
          parent::__construct();
      }//

   function getFrontPortion(){
          $this->db->where('scat_id',1);
          $this->db->limit(1);
          $query = $this->db->get('slide');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }//

  function getPageInfo($page_id){
          $this->db->where('id',$page_id);
          $query = $this->db->get('page');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }//

  function getSinglePageInfo($singlepage_id){
          $this->db->where('id',$singlepage_id);
          $query = $this->db->get('singlepage');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }//
  
  function getcatinfo($catpage_id){
          $this->db->where('id',$catpage_id);
          $query = $this->db->get('category');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }//

  function getfaqlists($cat_id){
    $this->db->select('t1.page_title,t1.page_alias,t1.short_desc,t1.long_desc,t1.image,t2.cat_alias');
    $this->db->from('page as t1');
    $this->db->where('t1.state',1);
    $this->db->join('category as t2','t1.cat_id = t2.id','left');
    $this->db->where('t2.id',$cat_id);
    $this->db->order_by('t1.id','desc');
    $this->db->limit(5);
    $query = $this->db->get();
    if($query->num_rows()>0)
    {
        return $query->result();
    }
  }//

}//end of class

?>