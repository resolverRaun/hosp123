<?php

if(!function_exists('create_breadcrumb')){
function create_breadcrumb(){
  $ci = &get_instance();
  $i=1;
  $uri = $ci->uri->segment($i);
  $link = '<ol class="breadcrumb bc-3">';
  $link.= '<li><a href="'.base_url().'">';
  $link.= 'Home </a></li>';
  while($uri != ''){
    $prep_link = '';
  for($j=1; $j<=$i;$j++){
    $prep_link .= $ci->uri->segment($j).'/';
  }


  if($ci->uri->segment($i+1) == ''){
    if(!is_numeric($ci->uri->segment($i)) && ($ci->uri->segment($i) != 'index') ){
      $formatted_link = str_replace("_", " ", $ci->uri->segment($i));
      $formatted_link = ucwords($formatted_link);
        $link.='<li><a href="'.site_url($prep_link).'">';
        $link.=$formatted_link.'</a></li> ';
    }
  }
  else{
      $check_uri = $ci->uri->segment($i);
    if($check_uri == 'edit'){
      $link.='<li><a href="">';
      $formatted_link = ucwords($ci->uri->segment($i));
      $link.=$formatted_link.'</a></li> ';
    }
    else{
        $link.='<li><a href="'.site_url($prep_link).'">';
        $formatted_link = str_replace("_", " ", $ci->uri->segment($i));
        $formatted_link = ucwords($formatted_link);
        $link.=$formatted_link.'</a></li>';
    }
  }
 
  $i++;
  $uri = $ci->uri->segment($i);
  }
    $link .= '</ol>';
    return $link;
  }
}

?>
