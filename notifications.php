<?php
require_once('initialize.php');
require_login();
?>

<?php
	mysqli_select_db($conn,$dbname);
		$sql='SELECT * FROM `bot-logs` WHERE `seen` = 0 ORDER BY `id` DESC';
		$rs = mysqli_query($conn, $sql);
		$count=0;

	if (mysqli_num_rows($rs) > 0) {
		if(! $rs ) {
			die('Could not get data: ' . mysql_error());
		}
		echo '<h2>K S.W.A.T. Security Notices:</h2>';
		$blocks = file_get_contents("../kblocker/vault/counter.dat");

        echo '<table style="color:#fff;background:#000;font-weight:600; border: 1px solid #fff; margin:10px auto;width:100%;" class="db_table">';
			echo '
            <tr>
                <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">&nbsp;</th>
                <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Notice</th>
                <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Manage</th>
            </tr>
            <tr>';
				echo '
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><img src="/admin/Images/exclamation-mark.png"></td>
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><em>K S.W.A.T. Has Blocked: '.$blocks.' threats. </em></td>
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><a href="../kblocker/vault/killed_log.php" target="_blank" class="btn btn-primary btn-sm text-center btn-center"> View </a></td>';
			echo '</tr>';

		while($row = mysqli_fetch_assoc($rs)) {
			$count = $count + 1;
		}
			echo '<tr>';
				echo '
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><img src="/admin/Images/exclamation-mark.png"></td>
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><em>You have new Blocked Activity From: '.$count.' bots. </em></td>
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><a href="index.php?page=viewBots" class="btn btn-primary btn-sm text-center btn-center"> View </a></td>';
			echo '</tr>';


		} else {

			echo '<tr>';
			echo '
            <td style="font-weight: bold;font-family: arial;padding:10px;"><img src="/admin/Images/tick.png"></td>
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><em>You have no new bot Activity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></td>
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><a href="index.php?page=viewBots" class="btn btn-primary btn-sm text-center btn-center"> View </a></td>';
			echo '</tr>';
        }
	mysqli_select_db($conn,$dbname);
			$sql='SELECT * FROM `haxxors` WHERE `seen` = 0 ORDER BY `id` DESC';
			$rs = mysqli_query($conn, $sql);
					if (mysqli_num_rows($rs) > 0) {

    if(! $rs ) {
        die('Could not get data: ' . mysql_error());
   }

   $count=0;
   $blocked = 0;
 //  echo '<br><br><em>Security Threat Activity Monitoring. Recent security threat activity is shown below.<br><br></em> ';

			while($row = mysqli_fetch_assoc($rs)) {
		if ($row[ip_addy] != $last_entry) {
		$count = $count + 1;
		$blocked = $blocked + 1;

		$last_entry = $row['ip_addy'];
		}
			}
			echo '<tr>';
				echo '
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><img src="/admin/Images/exclamation-mark.png"></td>
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><em>You have new Security Threat Activity From<br>'.$count.' wannabe hackers.</em></td>
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><a href="index.php?page=viewHaxxors" class="btn btn-primary btn-sm text-center btn-center"> View </a></td>';
			echo '</tr>';
		}
		else {
			echo '<tr>';
			echo '
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><img src="/admin/Images/tick.png"></td>
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><em>You have no new Security Threat Activity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></td>
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><a href="index.php?page=viewHaxxors" class="btn btn-primary btn-sm text-center btn-center"> View </a></td>';
			echo '</tr>';
		}



	mysqli_select_db($conn,$dbname);
			$sql='SELECT * FROM `user_contact` WHERE `active` = 0 ORDER BY `id` DESC';
			$rs = mysqli_query($conn, $sql);
					if (mysqli_num_rows($rs) > 0) {

    if(! $rs ) {
        die('Could not get data: ' . mysql_error());
   }
//				echo '<h2><a name="notices">Kaos CMS User Contact Notices:</a></h2>';

$count=0;
//				echo '<em>Contact Form Submissions.<br><br></em> ';
			while($row = mysqli_fetch_assoc($rs)) {

		$count = $count + 1;
			}
			echo '<tr>';
				echo '
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><img src="/admin/Images/exclamation-mark.png"></td>
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><em>You have new Contact Form Submissions From<br>'.$count.' user(s).</td>
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><a href="index.php?page=viewComments" class="btn btn-primary btn-sm text-center btn-center"> View </a></td>';
			echo '</tr>';
		}
		else {
			echo '<tr>';
			echo '
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><img src="/admin/Images/tick.png"></td>
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><em>You have no unread Contact Form Submissions</em></td>
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><a href="index.php?page=viewBots" class="btn btn-primary btn-sm text-center btn-center"> View </a></td>';
			echo '</tr>';
		}

//		echo '<br><em>Quote Requests.<br><br></em> ';
		mysqli_select_db($conn,$dbname);
			$sql='SELECT * FROM `quote-request` WHERE `active` = 0 ORDER BY `id` DESC';
			$rs = mysqli_query($conn, $sql);
					if (mysqli_num_rows($rs) > 0) {

    if(! $rs ) {
        die('Could not get data: ' . mysql_error());
   }

$count=0;
		while($row = mysqli_fetch_assoc($rs)) {
    		$count = $count + 1;
        }
			echo '<tr>';
				echo '
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><img src="/admin/Images/exclamation-mark.png"></td>
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><em>You have new Quote Requests From '.$count.' user(s).</em></td>
                <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><a href="index.php?page=viewBots" class="btn btn-primary btn-sm text-center btn-center"> View </a></td>';
			echo '</tr>';
		}
		else {
			echo '<tr>';
			echo '
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><img src="/admin/Images/tick.png"></td>
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><em>You have no unread Quote Requests &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></td>
            <td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;"><a href="index.php?page=viewHaxxors" class="btn btn-primary btn-sm text-center btn-center"> View </a></td>';
			echo '</tr>';
		}
			echo '</table>';

    echo '<p>&nbsp;</p>';
?>
