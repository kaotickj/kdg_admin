<?php
	include 'config.php';
			$conn = new mysqli($servername, $username, $password);		
				if ($conn->connect_error) {
				die('' . $db_error .'');
			} 
		
		$test = 'this is a test';		
		$visit_ip = $_SERVER['REMOTE_ADDR'];
		$file = '../.htaccess';
		$deny = 'deny from ' . $visit_ip;
		

//  <============== Check to see if visitor has viewed robots.txt and been logged as a bot ==============>	

	mysqli_select_db($conn,$dbname);		
			$sql='SELECT `ip-addy` FROM `bot-logs` WHERE `ip-addy`="'.$visit_ip.'"'; 
			$rs = mysqli_query($conn, $sql);
					if (mysqli_num_rows($rs) > 0) { 
			
    if(! $rs ) {
        die('Could not get data: ' . mysql_error());
   }

			while($row = mysqli_fetch_assoc($rs)) { 	
						
				//Block the ip for ignoring robots directives if it has been logged as a bot
				
				file_put_contents($file, $deny. "\n", FILE_APPEND | LOCK_EX); 					
			}

	
		} else {
			// Let this visitor through 
		}	
		
/*		


		$conn = new mysqli($servername, $username, $password, $dbname);
			$sql='select * from `bot-logs`'; 
			$query = mysqli_query($conn, $sql);

		if (mysqli_num_rows($query) > 0) { 

			while($row = mysqli_fetch_assoc($query)) { 
		
				if ($row['ip-addy']== $bot_ip) file_put_contents($file2, $deny. "\n", FILE_APPEND | LOCK_EX); 
		
		}





*/	

?>