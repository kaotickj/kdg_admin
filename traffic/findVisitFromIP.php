<?php
require 'config.php';
    $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    $page = $_GET['page'];

    echo '<h2>Find Visit from IP :</h2><p><form action="" method="post"><input name="ip" placeholder="IP Address"/><button type="submit">Search</button></form></p>';


        $ip = $_POST['ip'];
        mysqli_select_db($conn,$dbname);
		$sql = "select * from visitor_ips where `ip_addy` = '$ip'";
        $rs = mysqli_query($conn,$sql);
			if (mysqli_num_rows($rs) > 0) {		
				$count =0;
	//			echo'<p> Query: ' .$sql. '</p>';
				while($row = mysqli_fetch_assoc($rs)) {
					$count = $count + 1;
				//	$ip = $row['ip_addy'];
					$id = $row['id'];
					$page = $row['logged-from'];
					echo '
					<table>
						<tr>
							<td>IP Address: '.$ip.'</td>
							<td>Page Viewed: '.$page.'</td>
							<td><a href="viewSingleVisit.php?id='.$id.'">[ View Visit ]</a></td>
						</tr>
					</table>';
				}
				echo 'Total Visits from this IP: '.$count;
			}	

?>

