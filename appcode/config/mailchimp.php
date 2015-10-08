<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Super-simple, minimum abstraction MailChimp API v2 wrapper
 * 
 * @author Drew McLellan <drew.mclellan@gmail.com> modified by Ben Bowler <ben.bowler@vice.com>
 * @version 1.0
 */

/**
 * api_key       
 * api_endpoint            
 */

require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();
$db->select('mailchimp_api_key,campaign_list_id');
$db->where('id',1);
$query = $db->get('social_links');
$result = $query->row_array();

$config['api_key'] = $result['mailchimp_api_key'];
$config['golfkeeper_list_id'] = $result['campaign_list_id'];
