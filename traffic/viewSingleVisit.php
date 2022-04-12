<?php
        $id = $_GET['id'];
require 'config.php';
        echo '<!doctype html>';
        echo '<head lang="en">';
        echo '<title>KDG Web Design Traffic Report</title>';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
        echo '<meta name="no-email-collection" content="http://kaoticka.com/categories/legal/pages/tos">';
        echo '<link rel="stylesheet" type="text/css" href="https://thecovenstead.org/css/default.css" media="all">';
        echo '<link rel="stylesheet" type="text/css" href="https://thecovenstead.org/css/menu.css" media="all">';
        echo '</head>';
        echo '<body>';

        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql="select * from `visitor_ips` where `id`=$id";

        $query = mysqli_query($conn, $sql);

 					if (mysqli_num_rows($query) > 0) {

                while($row = mysqli_fetch_assoc($query)) {

if ($row['seen'] == 1) $seen = "Yes";
if ($row['seen'] == 0) $seen = "No";

if ($row['is-blocked'] == 1) $blocked = "IP is Blocked";
if ($row['is-blocked'] == 0) $blocked = "IP is not Blocked";

if ($row['is-blocked'] == 1) $reason = "Malicious Activity";
if ($row['is-blocked'] == 0) $reason = "N/A";

if ($row['logged-from'] == "") $row['logged-from'] = "/";

$usr_agnt = $row['usr-agnt'];
$ref = $row['referer'];
$host = $row['remotehost'];
?>
<section id="main_body">
	<article>
		<div>
        <h2>Single Visit Details</h2>
		<?php 
		echo '<table>	
				<tr>
					<td> <p>Whois Lookup:</p></td>
					<td><a href="https://www.whois.com/whois/'.$row['ip_addy'].'" target="_blank"><button>WhoIs Check</button></a></td>
                </tr>
				<tr>
					<td> <p>Project Honeypot Lookup:</p></td>
					<td><a href="https://www.projecthoneypot.org/ip_'.$row['ip_addy'].'" target="_blank"><button>P.H. Check</button></a></td>
                </tr>
				<tr>
					<td><p>Bot Logs Lookup:</p></td>
					<td><a href="bot_check.php?ip='.$row['ip_addy'].'" target="_blank"><button>Bot Check</button></a></td>
				</tr>
			</table>';
			
?>		

                        <table>
                <tr>
                        <td><p>Record Id</p></td>
                        <td><input class="textbox_med" style="color:#fff;" disabled name="id" type="text" value="<?php echo ''.$row['id'].'';?>"></td>
                        <td>&nbsp;&nbsp;<a href="traffic.php"><button type="button">Go Back</button></a></td>
                </tr>

                <tr>
                        <td><p>Timestamp</p></td>
                        <td><input class="text_box_style" name="created_date" type="text" value="<?php echo ''.$row['created_date'].'';?>"></td>
                </tr>

                <tr>
                        <td><p>Visitor IP Address</p></td>
                        <td><input class = "text_box_style" type="text" name="ip_addy" value="<?php echo ''.$row['ip_addy'].'';?>"></td>
				</tr>


                <tr>
                        <td><p>IP Blocked Status</p></td>
                        <td><input class = "text_box_style" type="hidden" name="is-blocked" value="<?php echo ''.$row['is-blocked'].'';?>"><input class = "text_box_style" type="text" value="<?php echo ''.$blocked.'';?>" ></td>
                </tr>

                <tr>
                        <td><p>Blocked For:</p></td>
                        <td><input class = "text_box_style" type="text" name="why-blocked" value="<?php echo ''.$row['reason'].'';?>"></td>
                </tr>

                <tr>
                        <td><p>IP Logged From</p></td>
                        <td><input class = "text_box_style" type="text" name="logged-from" value="<?php echo ''.$row['logged-from'].'';?>"></td>
                </tr>

                <tr>
                        <td><p>Is This Item Marked as Read?</p></td>
                        <td><input class = "textbox_sm" type="hidden" name="is-blocked" value="<?php echo ''.$row['seen'].'';?>"><input class = "textbox_sm" type="text" value="<?php echo ''.$seen.'';?>"></td>
                </tr>

                <tr>
                        <td><p>IP User Agent</p></td>
                        <td><input class = "text_box_style" type="text" name="usr-agnt" value="<?php echo ''.$row['usr-agnt'].'';?>"></td>
                </tr>
        </table>
<?php
//$bottrap_enabled = "1";
if ($row['is-blocked'] == 0)	{
        echo '<br>';
        echo '<div style="border:1px solid #333;padding:10px;margin:0 auto;">';
        echo '<div style="margin:20px;">';
		$id = $_GET['id'];
		$bl_type = $_GET['bl_type'];
        echo '<h2>Blacklist this User </h2>';
?>
<style>
 .hyde {
	 display:none;
 }
</style>
<form action="" method="get">		
<table>
	<tr class="hyde">
		<td></td>
		<td>
		<input type="text" name="id" value="<?php
			echo $id; ?>" />
		</td>
	</tr>
	<tr>
		<td>
			<select name="bl_type" onchange="this.form.submit()">
				<option value="choose" selected>Choose Type of Ban (Required)</option>
				<option value="ind_ip">Individual IP Address</option>
				<option value="cidr">CIDR Block</option>
				<option value="uri">URI Ban</option>
				<option value="query">Query Ban</option>
				<option value="host">Host Ban</option>
				<option value="usr_agnt">User Agent Ban</option>
			</select>
		</td>
	</tr>
</table>	
</form>
<table>
<?php
	
	echo '<tr>';
    echo '<td><label>IP ADDRESS: </td><td><input class="text_box_style" name="bl_ip" required value="'.$row['ip_addy'].'" placeholder="IP to Blacklist" /></label></td></tr>';
        echo '<tr><td><label>USER AGENT:</td><td> <input class = "text_box_style" type="text" name="usr-agnt" value="'.$row['usr-agnt'].'"></label></td></tr>';
        echo '<tr><td><label>QUERY  : </td><td><input class="text_box_style" name="bl_query" placeholder="Query to Blacklist" /></label></td></tr>';
        echo '<tr><td><label>REMOTE HOST: </td><td><input class="text_box_style" name="host" value="'.$host.'"</label></td></tr>';
        echo '<tr><td><label>REFERER : </td><td><input class="text_box_style" name="ref" value="'.$ref.'" /></label></td></tr>';
        echo '<tr><td><label>Blacklist Reason: </td><td><textarea class="medium-text" name="bl_reason" required placeholder="Enter a reason for this blacklisting"></textarea></label></td></tr>';
        echo '<tr><td><label>Threat Level (Default = 4: Crtical): </td><td><select name=""><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4" selected>4</option></select></label></td></tr>';

        echo '<tr><td><button type ="submit" name="submit">Blacklist</button></td>';
    echo '</tr></table>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
}


?>



</div>
<table>
        <tr>
            <td>
                <?php
                    $sql= "SELECT * FROM `visitor_ips` where `ip_addy` ='".$row['ip_addy']."'";
                    $rs = mysqli_query($conn, $sql);
                if (mysqli_num_rows($rs) > 0) {
                        $totalhits = '0';
                    while($row = mysqli_fetch_assoc($rs)) {
                        $totalhits = $totalhits + 1;
						$ip = $row['ip_addy'];
                    }
                }
                echo '<td><a href="viewVisitorActivity.php?ip='.$ip.'"><button class="read_more" type="button">View All '.$totalhits.' Hits From This IP</button></a></td>';
                ?>
            </td>
        </tr>
</table> 
</article>
</section>

 
<?php       
 }
        }
echo '</body>';
echo '</html>';
?>