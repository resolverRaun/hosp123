<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_model extends CI_Model{

	// protected $collection_id = '5'; 
    function __construct()
      {
          parent::__construct();
      }

   function getFrontPortion(){
          $this->db->where('scat_id',1);
          $this->db->limit(1);
          $query = $this->db->get('slide');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }

  function getPageInfo($page_id){
          $this->db->where('id',$page_id);
          $query = $this->db->get('page');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }

	function getSinglePageInfo($singlepage_id){
          $this->db->where('id',$singlepage_id);
          $query = $this->db->get('singlepage');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }

  function getSocialLinks($sociallink_id){
    $this->db->select('youtube_video_link');
    $this->db->where('id',$sociallink_id);
    $query = $this->db->get('social_links');
    if($query->num_rows()>0)
    {
        return $query->row();
    }
  }


}//end of class

?>