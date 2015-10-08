<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Policies_model extends CI_Model{

    function __construct()
      {
          parent::__construct();
      }//


  function getpolicieslists($cat_id){
    $this->db->select('t1.page_title,t1.page_alias,t1.short_desc,t1.long_desc,t1.image,t2.cat_alias');
    $this->db->from('page as t1');
    $this->db->where('t1.state',1);
    $this->db->join('category as t2','t1.cat_id = t2.id','left');
    $this->db->where('t2.id',$cat_id);
    $this->db->order_by('t1.id','asc');
    $this->db->limit(6);
    $query = $this->db->get();
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

}//end of class

?>