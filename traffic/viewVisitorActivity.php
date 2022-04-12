<?php
require 'config.php';
    echo '<!doctype html>';
    echo '<head lang="en">';
    echo '<title>KDG Web Design Traffic Report</title>';
    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
    echo '<meta name="no-email-collection" content="http://kaoticka.com/categories/legal/pages/tos">';
    echo '<link rel="stylesheet" type="text/css" href="css/default.css" media="all">';
    echo '<link rel="stylesheet" type="text/css" href="css/menu.css" media="all">';
    echo '</head>';
    echo '<body>';
echo '<section id="main_body">';
echo '<form action="traffic.php"><button type="submit" name="submit">Back</button></form>';
echo '<article>';
    $ip = $_GET['ip'];
echo 'Viewing all pages visited by Visitor IP Address ' .$ip;
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql="select * from `visitor_ips` where `ip_addy`='$ip'";
    $count = 0;
    $query = mysqli_query($conn, $sql);

 					if (mysqli_num_rows($query) > 0) {

        while($row = mysqli_fetch_assoc($query)) {
            $count = $count + 1;
            ?>
<p>Record ID: <input type="text" name="id" value="<?php echo ''.$row['id'].'';?>"></p>
<p>Date: <input type="text" name="date" value="<?php echo ''.$row['created_date'].'';?>"></p>
<p>Page: <input type="text" name="page" value="<?php echo ''.$row['logged-from'].'';?>"></p>
<p>User Agent String: <input type="text" name="usr-agnt" value="<?php echo ''.$row['usr-agnt'].'';?>"></p>
<hr>
<?php
            }
echo '<label>Showing all: <input type="text" name="count" value="'.$count.'"> records </label><label>from IP Address:&nbsp;<input type="text" name="ipaddy" value="'.$ip.'"></label>';
           }
echo '</article>';
echo '</section>';
echo '</body>';
echo '</html>';



?>