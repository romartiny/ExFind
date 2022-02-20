<?php
// paths
define('PATH_ABSOLUTE', dirname(__FILE__) . '/../');
define('PATH_INCLUDES', PATH_ABSOLUTE . 'includes/');


// class & array 
require_once(PATH_INCLUDES . 'social.existence.class.php');


// settings
$website['version']  = '3.1';
$website['url']      = social_existence::website_url();
$website['current']  = social_existence::current_url();
$website['statuses'] = social_existence::$statuses;
$website['count']    = count(social_existence::$websites);
$website['count2']   = floor($website['count'] / 5) * 5;
?>