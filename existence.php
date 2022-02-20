<?php
// require the website config file.
require_once('includes/config.php');


// if the parameters are valid return a response.
$index    = (isset($_POST['index'])    ? $_POST['index']    : false);
$username = (isset($_POST['username']) ? $_POST['username'] : false);
if ( isset(social_existence::$websites[$index]) && preg_match('/^([a-z0-9]{1,40})$/i', $username) ) {
   header('content-type: application/json');
   echo json_encode(social_existence::get_existence($index, $username));
}
?>