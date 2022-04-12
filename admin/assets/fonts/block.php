<?php	
	$visit_ip = $_SERVER['REMOTE_ADDR'];
	$file = '../.htaccess';
	$deny = 'deny from ' . $visit_ip;	
	
		//Block the ip for attempting to access system files
		file_put_contents($file, $deny. "\n", FILE_APPEND | LOCK_EX); 					

?>