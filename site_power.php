<?php
require_once('initialize.php');
require_login();
require 'config.php';			
			$conn = new mysqli($servername, $username, $password);
				if ($conn->connect_error) {
					die('<div id="db_error">' . $db_error .'</div>');
				} 
				
				if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
				mysqli_select_db($conn,$dbname);
				
$status = $_POST['offline'];

if ($status == "on"){
	$status = "1";
} 
if ($status == "") {
	$status = "0";
}
	
$sql= "UPDATE `offline` SET `status` = '$status' WHERE `id` = '1'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = 'Site Status Updated ';
	redirect_to(url_for('index.php?page=security'));
	}
else {
    echo "Error: " . $sql . "<br>"; // . mysqli_error($conn);
}			

?>