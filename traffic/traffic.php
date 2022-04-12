<?php
require 'config.php';

    echo '<!doctype html5>';
    echo '<html lang="en">';
    echo '<head>';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<title>KDG Web Design Traffic Report for Brads Brass Flamingo</title>';
    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
    echo '<link rel="stylesheet" type="text/css" href="https://thecovenstead.org/css/default.css" media="all" />';
    echo '<link rel="stylesheet" type="text/css" href="https://thecovenstead.org/css/menu.css" media="all" />';
	echo '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>';
    echo '</head>';
    echo '<body>';
    echo '<section style="border:1px solid #333!important;margin:20px auto 20px auto;width:100%;">';
    echo '<article style="border:1px solid #333!important;margin:20px auto 20px auto;width:100%;;">';	
    echo '<h2>Traffic Report:</h2>';
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn,$dbname);
                $perpage = 5;
        ?>
<table style="color:#000;background:#ccc;border:1px solid #333;margin-bottom:10px;font-size:.8em;font-weight:normal!important;width:90%;" cellspacing="2" cellpadding="2" align="center">
<?php
$rs = mysqli_query($conn, "select * from visitor_ips where `seen` = 0 ORDER BY `id` DESC");
$count = mysqli_num_rows($rs);

echo '<form action="" method="get"><select name="show" onchange="this.form.submit()"><option>Show per Page</option><option value=5>5</option><option value=10>10</option><option value=20>20</option><option value=50>50</option><option value=100>100</option><option value=500>500</option><option value=1000>1000</option><option value="'.$count.'">All ('.$count.')</option></select></form>';
if ($_GET['show'] == $count) {
    $show = 'All';
} else {
    $show= $_GET['show'];
}
if(isset($_GET["show"])){
$perpage = $_GET["show"];
echo ' Showing ' .$show. ' Records ';
}

if(isset($_GET["page"])){
$page = intval($_GET["page"]);
} else {
$page = 1;
}
$calc = $perpage * $page;
$start = $calc - $perpage;
$result = mysqli_query($conn, "select * from visitor_ips where `seen` = 0  ORDER BY `id` DESC Limit $start, $perpage");

$rows = mysqli_num_rows($result);
if($rows){
$i = 0;
?>
<h2 style="text-align:center; color:#fff">Showing Page <?php echo $page; ?> of Visitor Records</h2>
<tbody>
<tr>
    <td>ID</td>
    <td>IP Address</td>
    <td>User Agent</td>
    <td>Remote Host</td>
    <td>Timestamp</td>
    <td>Threat Score</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<?php
while($post = mysqli_fetch_assoc($result)) {
$usr_agnt = $post['usr-agnt'];
    $shrtUA = strip_tags($usr_agnt);
                if (strlen($shrtUA) > 72) {
                    $stringCut = substr($shrtUA, 0, 72);
                    $shrtUA = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                }
?>
<tbody>
<tr style="color:#fff;background: #000;">
<td style="font-weight: bold;font-family: arial;"><?php echo $post["id"]; ?></td>
<td style="font-family: arial;padding-left: 20px;"><?php echo $post["ip_addy"]; ?></td>
<td style="font-family: arial;padding-left: 20px;" title="<?php echo $usr_agnt; ?>"><?php echo $shrtUA; ?></td>
<td style="font-family: arial;padding-left: 20px;"><?php echo $post["remotehost"]; ?></td>
<td style="font-family: arial;padding-left: 20px;"><?php echo $post["created_date"]; ?></td>
<td style="font-family: arial;padding-left: 20px;"><?php echo $post["threat_score"]; ?></td>

<?php
echo '<td style="font-family: arial;padding-left: 20px;"><a href="viewSingleVisit.php?id='.$post['id'].'"><span style="text-align:center;padding-right:10px;">View</span></a></td>
</tr>';

}
}
?>
</tbody>
</table>
<table style="color:#000;background:#ccc;border:1px solid #333;margin-bottom:10px;font-size:.8em;font-weight:normal!important;width:90%;" cellspacing="2" cellpadding="2" align="center">
<tbody>
<tr>
<td align="center">
<?php
if(isset($page))
{
$result = mysqli_query($conn,"select Count(*) As Total from post");
$rows = mysqli_num_rows($rs);
if($rows)
{
$rs = mysqli_fetch_assoc($rs);
$total = $rs["Total"];
}
$totalPages = ceil($total / $perpage);
if($page <=1 ){
echo "<span id='page_links' style='font-weight: bold;'>< Prev </span>";
} else {
$j = $page - 1;
echo "<span><a id='page_a_link' href='traffic.php?page=$j&show=$perpage'>< Prev </a></span>";
}
for($i=1; $i <= $totalPages; $i++)  {
if($i<>$page) {
echo "<span><a id='page_a_link' href='traffic.php?page=$i&show=$perpage'>$i</a></span>";
} else {
echo "<span id='page_links' style='font-weight: bold;'>$i</span>";
}
}
if($page == $totalPages ){
echo "<span id='page_links' style='font-weight: bold;'>Next ></span>";
} else {
$j = $page + 1;
echo "<span><a id='page_a_link' href='traffic.php?page=$j&show=$perpage'>Next ></a></span>";
}
}

    else {
        echo '<center><em>No visitor records found &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button>Archives</button></em></center>';
    }
?>
</td>

</tr>
</tbody>
</table>
<br />
<br />
<br />
<?php
include 'counter.php';
    echo '<h2>Bot Management:</h2>';
    echo '<form action="block-ip-range.php" method="post"><label>Enter IP Range to block: <input name="ip" class="text_box_style" id="ip" /></label>';
    echo '<select name="block_reason" required>';
    echo    '<option selected value="">Choose a reason (required)</option>';
    echo    '<option value="LACNIC">Lacnic</option>';
    echo    '<option value="RIPE">Ripe</option>';
    echo    '<option value="QUANTIL">Quantil</option>';
    echo    '<option value="APNIC">Apnic</option>';
    echo    '<option value="Useless">Useless</option>';
    echo '</select>';
    echo '<button name="submit" type="submit">Block</button></form>';
    echo '<form action="delete_traffic.php" method="post"><label>Enter IP Address to Delete Records of: <input class="text_box_style" name="delete_ip" /></label>';
    echo '<button type ="submit" name="submit">Delete</button>';
    echo '</form>';
	echo '<form action="findVisitFromIP.php" method="post"><button type="submit">Search by IP</button></form>';
   echo '</article>';

echo '</section>';

echo '</body>';
echo '</html>';

?>
