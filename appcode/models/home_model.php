<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model{

    function __construct()
      {
          parent::__construct();
      }

    function get_hex_value($color){
      $this->db->select('id');
      $this->db->from('teecolorset');
      $this->db->where('colorname',$color);
      $query = $this->db->get();
        if($query->num_rows()>0)
        {
          return $query->row_array();
        }
    }

    function insertData($tablename, $data)
      {
        $this->db->insert($tablename,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
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

  function getCourses($tablename){
          $this->db->select('course_id,course_name,address,holes,latitude,longitude');
          $query = $this->db->get($tablename);
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }

	function getTees($tablename,$course_id){
          $this->db->select('*');
          $this->db->where('course_id',$course_id);
          $query = $this->db->get($tablename);
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }

  function getSlide($slidecat_id){
          $this->db->select('*');
          $this->db->where('scat_id',$slidecat_id);
          $query = $this->db->get('slide');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }

  function getSinglePageInfo($singlepage_id){
          $this->db->select('*');
          $this->db->where('id',$singlepage_id);
          $query = $this->db->get('singlepage');
          if($query->num_rows()>0)
          {
              return $query->result();
          }
  }

  function getSocialLinks($sociallink_id){
    $this->db->select('*');
    $this->db->where('id',$sociallink_id);
    $query = $this->db->get('social_links');
    if($query->num_rows()>0)
    {
        return $query->row();
    }
  }

  function getSeoPageInfo($seopage_id){
    $this->db->select('*');
    $this->db->from('seopage');
    $this->db->where('id',$seopage_id);
    $query = $this->db->get();
      if($query->num_rows()>0)
      {
        return $query->row_array();
      }
  }

  /*New code for testing uploading of only club*/
      // function index(){
      //     require_once(APPPATH.'libraries/reader.php');
      //     ini_set('memory_limit', '-1');
      //     ini_set('max_execution_time', 0);
      //     set_time_limit(0);
      //     // $file=APPPATH.'libraries/test_int_full_database.xls';
      //     $file=APPPATH.'libraries/test_tees.xls';
      //     $connection = new Spreadsheet_Excel_Reader(); // our main object
      //     $connection->read($file);

      //     $startrow_tee = 2;
      //     $endrow_tee = 15000;
      //     echo '<pre>';
      //     for($i=$startrow_tee;$i<=$endrow_tee;$i++){ // we read row to row

      //           $data = array(
      //             'club_id' => (trim($connection->sheets[0]["cells"][$i][1])) ? trim($connection->sheets[0]["cells"][$i][1]) : 0, 
      //             'club_name' => (trim($connection->sheets[0]["cells"][$i][2])) ? trim($connection->sheets[0]["cells"][$i][2]) : 0, 
      //             'club_membership' => (trim($connection->sheets[0]["cells"][$i][3])) ? trim($connection->sheets[0]["cells"][$i][3]) : 0, 
      //             'number_of_holes' => (trim($connection->sheets[0]["cells"][$i][4])) ? trim($connection->sheets[0]["cells"][$i][4]) : 0, 
      //             'address' => (trim($connection->sheets[0]["cells"][$i][5])) ? trim($connection->sheets[0]["cells"][$i][5]) : 0, 
      //             'city' => (trim($connection->sheets[0]["cells"][$i][6])) ? trim($connection->sheets[0]["cells"][$i][6]) : 0,
      //             'state' => (trim($connection->sheets[0]["cells"][$i][7])) ? trim($connection->sheets[0]["cells"][$i][7]) : 0,
      //             'country' => (trim($connection->sheets[0]["cells"][$i][8])) ? trim($connection->sheets[0]["cells"][$i][8]) : 0,
      //             'postal_code' => (trim($connection->sheets[0]["cells"][$i][9])) ? trim($connection->sheets[0]["cells"][$i][9]) : 0,
      //             'phone' => (trim($connection->sheets[0]["cells"][$i][10])) ? trim($connection->sheets[0]["cells"][$i][10]) : 0,
      //             'fax' => (trim($connection->sheets[0]["cells"][$i][11])) ? trim($connection->sheets[0]["cells"][$i][11]) : 0,
      //             'website' => (trim($connection->sheets[0]["cells"][$i][12])) ? trim($connection->sheets[0]["cells"][$i][12]) : 0,
      //             'longitude' => (trim($connection->sheets[0]["cells"][$i][13])) ? trim($connection->sheets[0]["cells"][$i][13]) : 0,
      //             'latitude' => (trim($connection->sheets[0]["cells"][$i][14])) ? trim($connection->sheets[0]["cells"][$i][14]) : 0,
      //             'contact_name' => (trim($connection->sheets[0]["cells"][$i][15])) ? trim($connection->sheets[0]["cells"][$i][15]) : 0,
      //             'contact_title' => (trim($connection->sheets[0]["cells"][$i][16])) ? trim($connection->sheets[0]["cells"][$i][16]) : 0,
      //             'email_address' => (trim($connection->sheets[0]["cells"][$i][17])) ? trim($connection->sheets[0]["cells"][$i][17]) : 0,
      //             'driving_range' => (trim($connection->sheets[0]["cells"][$i][18])) ? trim($connection->sheets[0]["cells"][$i][18]) : 0,
      //             'putting_green' => (trim($connection->sheets[0]["cells"][$i][19])) ? trim($connection->sheets[0]["cells"][$i][19]) : 0,
      //             'chipping_green' => (trim($connection->sheets[0]["cells"][$i][20])) ? trim($connection->sheets[0]["cells"][$i][20]) : 0,
      //             'pratice_bunker' => (trim($connection->sheets[0]["cells"][$i][21])) ? trim($connection->sheets[0]["cells"][$i][21]) : 0,
      //             'motor_cart' => (trim($connection->sheets[0]["cells"][$i][22])) ? trim($connection->sheets[0]["cells"][$i][22]) : 0,
      //             'pull_cart' => (trim($connection->sheets[0]["cells"][$i][23])) ? trim($connection->sheets[0]["cells"][$i][23]) : 0,
      //             'golf_clubs_rental' => (trim($connection->sheets[0]["cells"][$i][25])) ? trim($connection->sheets[0]["cells"][$i][25]) : 0,
      //             'club_fitting' => (trim($connection->sheets[0]["cells"][$i][26])) ? trim($connection->sheets[0]["cells"][$i][26]) : 0,
      //             'pro_shop' => (trim($connection->sheets[0]["cells"][$i][25])) ? trim($connection->sheets[0]["cells"][$i][25]) : 0,
      //             'golf_lessons' => (trim($connection->sheets[0]["cells"][$i][27])) ? trim($connection->sheets[0]["cells"][$i][27]) : 0,
      //             'caddie_hire' => (trim($connection->sheets[0]["cells"][$i][28])) ? trim($connection->sheets[0]["cells"][$i][28]) : 0,
      //             'restaurant' => (trim($connection->sheets[0]["cells"][$i][29])) ? trim($connection->sheets[0]["cells"][$i][29]) : 0,
      //             'reception_hall' => (trim($connection->sheets[0]["cells"][$i][30])) ? trim($connection->sheets[0]["cells"][$i][30]) : 0,
      //             'changing_room' => (trim($connection->sheets[0]["cells"][$i][31])) ? trim($connection->sheets[0]["cells"][$i][31]) : 0,
      //             'lockers' => (trim($connection->sheets[0]["cells"][$i][32])) ? trim($connection->sheets[0]["cells"][$i][32]) : 0,
      //             'lodging_on_site' => (trim($connection->sheets[0]["cells"][$i][33])) ? trim($connection->sheets[0]["cells"][$i][33]) : 0,
                  
      //           );
      //           echo trim($connection->sheets[0]["cells"][$i][1]).'   --'.$i;
      //           echo '</br>';
      //           $this->home_model->insertData('tee_info',$data);
      //     }

      // }
      // 
      
      //   function index(){
      //     require_once(APPPATH.'libraries/reader.php');
      //     ini_set('memory_limit', '-1');
      //     ini_set('max_execution_time', 0);
      //     set_time_limit(0);
      //     // $file=APPPATH.'libraries/test_int_full_database.xls';
      //     $file=APPPATH.'libraries/test_tees.xls';
      //     $connection = new Spreadsheet_Excel_Reader(); // our main object
      //     $connection->read($file);

      //     $startrow_tee = 2;
      //     $endrow_tee = 17714;
      //     echo '<pre>';
      //     for($i=$startrow_tee;$i<=$endrow_tee;$i++){ // we read row to row

      //           $data = array(
      //             'course_id' => (trim($connection->sheets[0]["cells"][$i][1])) ? trim($connection->sheets[0]["cells"][$i][1]) : 0, 
      //             'club_id' => (trim($connection->sheets[0]["cells"][$i][2])) ? trim($connection->sheets[0]["cells"][$i][2]) : 0, 
      //             'course_name' => (trim($connection->sheets[0]["cells"][$i][3])) ? trim($connection->sheets[0]["cells"][$i][3]) : 0, 
      //             'holes' => (trim($connection->sheets[0]["cells"][$i][4])) ? trim($connection->sheets[0]["cells"][$i][4]) : 0, 
      //             'par' => (trim($connection->sheets[0]["cells"][$i][5])) ? trim($connection->sheets[0]["cells"][$i][5]) : 0, 
      //             'course_type' => (trim($connection->sheets[0]["cells"][$i][6])) ? trim($connection->sheets[0]["cells"][$i][6]) : 0, 
      //             'course_architect' => (trim($connection->sheets[0]["cells"][$i][7])) ? trim($connection->sheets[0]["cells"][$i][7]) : 0,
      //             'open_date' => (trim($connection->sheets[0]["cells"][$i][8])) ? trim($connection->sheets[0]["cells"][$i][8]) : 0,
      //             'guest_policy' => (trim($connection->sheets[0]["cells"][$i][9])) ? trim($connection->sheets[0]["cells"][$i][9]) : 0,
      //             'weekday_price' => (trim($connection->sheets[0]["cells"][$i][10])) ? trim($connection->sheets[0]["cells"][$i][10]) : 0,
      //             'weekend_price' => (trim($connection->sheets[0]["cells"][$i][11])) ? trim($connection->sheets[0]["cells"][$i][11]) : 0,
      //             'twilight_price' => (trim($connection->sheets[0]["cells"][$i][12])) ? trim($connection->sheets[0]["cells"][$i][12]) : 0,
      //             'fairway' => (trim($connection->sheets[0]["cells"][$i][13])) ? trim($connection->sheets[0]["cells"][$i][13]) : 0,
      //             'green' => (trim($connection->sheets[0]["cells"][$i][14])) ? trim($connection->sheets[0]["cells"][$i][14]) : 0,
      //             'currency' => (trim($connection->sheets[0]["cells"][$i][15])) ? trim($connection->sheets[0]["cells"][$i][15]) : 0,
      //             'address' => (trim($connection->sheets[0]["cells"][$i][16])) ? trim($connection->sheets[0]["cells"][$i][16]) : 0,
      //             'longitude' => (trim($connection->sheets[0]["cells"][$i][17])) ? trim($connection->sheets[0]["cells"][$i][17]) : 0,
      //             'latitude' => (trim($connection->sheets[0]["cells"][$i][18])) ? trim($connection->sheets[0]["cells"][$i][18]) : 0
      //           );
      //           echo trim($connection->sheets[0]["cells"][$i][1]).'   --'.$i;
      //           echo '</br>';
      //           $this->home_model->insertData('tee_info',$data);
      //     }

      // }
  
}//end of class

?>