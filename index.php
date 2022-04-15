<?php
	require_once './admin/initialize.php';
    require './admin/config.php';
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die('' . $db_error .'');
	}
	mysqli_select_db($conn,$dbname);
	$sql='SELECT `status`  FROM `offline` WHERE `id` = "1"';
	$rs = mysqli_query($conn, $sql);
	if (mysqli_num_rows($rs) > 0) {
		if(! $rs ) {
			die('Could not get data: ' . mysql_error());
		}
		while($row = mysqli_fetch_assoc($rs)) {
			$offline = $row['status'];
		}
	}
    if ($ip != "0.0.0.0"){
		if ($offline == '0') {
			die (include 'offline.php');
		}
		else {
			require_once './admin/initialize.php';
			include 'head.php';
			include 'body.php';
			include 'footer.php';
		}
	}
?>