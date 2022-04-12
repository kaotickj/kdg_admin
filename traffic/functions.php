<?php

function remodelling(){
    echo '<h2>Remodelling...</h2> ';
    echo '<p>Now fuck off until its done!!!!</p> ';

   for($i = 0; $i < 18; $i++){
        echo '<p>&nbsp;</p>';
    }
}

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function u($string="") {
  return urlencode($string);
}

function raw_u($string="") {
  return rawurlencode($string);
}

function h($string="") {
  return htmlspecialchars($string);
}

function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please correct the following errors:";
    $output .= "<ul style=\"list-style-type:none;\">";
    foreach($errors as $error) {
      $output .= '<li><input style="color:#000;" class="center" type="text" value="'. h($error) . '" disabled /></li>';
    }
    $output .= "</ul>";
//    $output .= 'Your IP Address: '. $_SERVER['REMOTE_ADDR'] .' has been logged';
	$output .= "</div>";
  }
  return $output;
}

function get_and_clear_session_message() {
  if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
    $msg = $_SESSION['message'];
    unset($_SESSION['message']);
    return $msg;
  }
}

function display_session_message() {
  $msg = get_and_clear_session_message();
  if(!is_blank($msg)) {
    return '<div id="message" class="message">' . h($msg) . '</div>';
  }
}

function is_ip_authorized() {
	if ($_SERVER['REMOTE_ADDR'] != "68.59.206.241"){
		header('HTTP/1.0 404 Not Found');
		//header('Status: 404 Not Found');
		http_response_code(404);
		echo '<head><title>404: Not Found</title></head>';
		redirect_to(url_for('../404.php'));
	} else {
		return true;
	}
}

function secure_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
