<?php
	$page = $_GET['page'];
	$ip = $_GET['ip'];
	include 'config.php';
		$conn = new mysqli($servername, $username, $password);		
		if ($conn->connect_error) {
			die('' . $db_error .'');
		}
	switch($page) {
		case 'block';
		$ip = $_GET['ip'];
		$file = '../.htaccess';
		$deny = 'deny from '.$ip. ' ##Self identified bot';
			file_put_contents($file, $deny. "\n", FILE_APPEND | LOCK_EX);
			echo 'Traffic from '.$ip.' is blocked.';	
		break;
		
	}		

	mysqli_select_db($conn,$dbname);		
		$sql='SELECT `ip-addy` FROM `bot-logs` WHERE `ip-addy`="'.$ip.'"'; 
		$rs = mysqli_query($conn, $sql);
			if (mysqli_num_rows($rs) > 0) { 
				if(! $rs ) {
					die('Could not get data: ' . mysql_error());
			   }
				while($row = mysqli_fetch_assoc($rs)) { 	
					echo 'This visitor is a bot. <a href="?page=block&ip='.$ip.'"><button>Block</button></a>';
				}
			} else {
				echo 'Not a bot. <a href="?page=block&ip='.$ip.'"><button>Block</button></a> (Only do this if you are sure this is a potentially harmful bot)';
			}
?>