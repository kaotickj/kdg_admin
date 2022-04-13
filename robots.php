<?php
	include 'config.php';
	$conn = new mysqli($servername, $username, $password);		
		if ($conn->connect_error) {
		die('' . $db_error .'');
	} 

	$bot_ip = $_SERVER['REMOTE_ADDR'];
	$usrAgnt = $_SERVER['HTTP_USER_AGENT'];
	$whereFrom = $_SERVER['REQUEST_URI'];
	$created = date(DATE_W3C);
	$remotehost = @getHostByAddr($visitor_ip);
	if(isset($_SERVER['HTTP_REFERER'])) {
		$referer = $_SERVER['HTTP_REFERER'];
	} else{
		$referer = 'Not Set';	
	}		
//  <============== Check if bot has been logged ==============>	
	mysqli_select_db($conn,$dbname);		
	$sql='SELECT `ip-addy` FROM `bot-logs` WHERE `ip-addy`="'.$bot_ip.'"'; 
	$rs = mysqli_query($conn, $sql);
	if (mysqli_num_rows($rs) > 0) { 
		if(! $rs ) {
			die('Could not get data: ' . mysql_error());
		}
		while($row = mysqli_fetch_assoc($rs)) { 	
					
			//Bot has already been logged. Do nothing and show robots.txt
			print file_get_contents("robots.txt");			
		}
	} else {
		// Log this bot ip and show robots.txt
		$sql= "INSERT INTO `bot-logs` (`ip-addy`, `logged-from`, `usr-agnt`, `created_date`, `referer`, `remotehost`) VALUES ('$bot_ip', '$whereFrom', '$usrAgnt', '$created', '$referer', '$remotehost')";

		if (mysqli_query($conn, $sql)) {
			print file_get_contents("robots.txt"); 	
		} 			
	}	
?>