<?php
require '/var/www/vhosts/kdgwebsolutions.com/httpdocs/admin/config.php';
//require_once '/var/www/vhosts/kdgwebsolutions.com/development.kdgwebsolutions.com/admin/initialize.php';
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>Admin Area<?php echo $page_name .' ' . $title; ?> </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css" />
        <style rel="stylesheet" type="text/css">
            body {
                color:#fff;
                width:80%;
                margin:0px auto;
            }

            .btn {
                color:white!important;
            }

            form select {
                color:#000!important;
            }
            form input {
                color:#000;
            }
            .db_table th {
                background-color:darkblue!important;
                text-align:center!important;
                margin:0px auto!important;
                border:1px solid #fff!important;
                color:#fff;
            }
            .db_table {
                text-align:center!important;
                margin:0px auto!important;
            }
            .db_table tr:nth-child(odd) {
                background-color:#00a!important;
            }
            .db_table tr a {
                color:white!important;
            }
            .db_table tr:hover {
                background-color:teal!important;
            }
            a {
                text-decoration:none!important;
            }
            .errors {
                color:white;
                background:red;
                border:2px solid #333;
                padding:1em 15px;
                margin:1em auto;
                width: 60%;
            }
            .user-details {
                color:#ffffff!important;
                border:1px solid #fff;
            }
            dl {
                clear:both;
                overflow:hidden;
                margin:0.5em 0;
            }
            dt {
                float:left;
                font-weight:bold;
                width:125px;
            }
            dd {
                float:left;
                margin-left:1em;
            }
            .message {
                color:#0055DD;
                background:white;
                border:1px solid #0055DD;
                padding:1em 15px;
                margin:1em auto;
                width: 90%;
            }
            .tox-statusbar__branding {
                display:none;
            }
            .actions {
                margin-bottom: 1em;
            }
            .switch {
                position:relative;
                display:inline-block;
                width:60px;
                height: 34px;
            }
            .switch input {
                display:none;
            }
            .slider {
                position:absolute;
                cursor:pointer;
                top:0;
                left:0;
                right:0;
                bottom:0;
                background-color:#6b1408;
                -webkit-transition:.4s;
                transition:.4s;
            }
            .slider:before {
                position:absolute;
                content:"";
                height:26px;
                width:26px;
                left:4px;
                bottom:4px;
                background-color:#b80808;
                -webkit-transition:.4s;
                transition:.4s;
            }
            .slider:after {}
            input:checked + .slider {
                background-color:#053d06;
            }
            input:focus + .slider {
                box-shadow:0 0 1px #2196F3;
            }
            input:checked + .slider:before {
                background-color:#08ae0c;
                -webkit-transform:translateX(26px);
                -ms-transform:translateX(26px);
                transform:translateX(26px);
            }
            .slider.round {
                border-radius:34px;
            }
            .slider.round:before {
                border-radius:50%;
            }
            table.quick_start {
                border-spacing:30px;border-collapse:separate;
            }
            .form-group {}
            .input-group {
                border:none;
                padding:5px;
            }
            .form-control {
                height:30px;
            }
            .border_333 {
                border:1px solid #333;
            }
            </style>
            <script src="../assets/js/jquery-3.4.0.js"></script><script src="../assets/js/bootstrap.min.js"></script>
        </head>

        <body>

<?php
//   require './header.php';
?>
<p>&nbsp;</p>
<section id="main_body" style="width:90%;margin:0px auto;">
    <article>

<?php
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn,$dbname);
                $perpage = 10;
        ?>
<?php
$rs = mysqli_query($conn, "select * from visitor_ips where `seen` = 0 ORDER BY `id` DESC");
$count = mysqli_num_rows($rs);

echo '<form action="" method="get"><select name="show" onchange="this.form.submit()"><option>Show per Page</option><option value=20>20</option><option value=50>50</option><option value=100>100</option><option value=500>500</option><option value=1000>1000</option><option value="'.$count.'">All ('.$count.')</option></select></form>';
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
<p>&nbsp;</p>
    <h2><i class="fa fa-search" aria-hidden="true"></i> Traffic Report <small><a href="../index.php?page=viewArts" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;&nbsp;View Pages List</span></a></small></h2>
<p style="text-align:center; color:#fff">Showing Page <?php echo $page; ?> of Visitor Records</p>
<table style="color:#fff;background:#000;font-weight:600; border: 1px solid #fff; margin:10px auto;width:90%;" class="db_table">
<tr>
    <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">ID</th>
    <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">IP Address</th>
    <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">User Agent</th>
    <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Remote Host</th>
    <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Timestamp</th>
    <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Manage</th>
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
<tr>
<td style="padding-left: 10px; padding-right:10px;text-align:center;border:1px solid #fff;"><?php echo $post["id"]; ?></td>
<td style="padding-left: 10px; padding-right:10px;text-align:center;border:1px solid #fff;"><?php echo $post["ip_addy"]; ?></td>
<td style="padding-left: 10px; padding-right:10px;text-align:center;border:1px solid #fff;" title="<?php echo $usr_agnt; ?>"><?php echo $shrtUA; ?></td>
<td style="padding-left: 10px; padding-right:10px;text-align:center;border:1px solid #fff;"><?php echo $post["remotehost"]; ?></td>
<td style="padding-left: 10px; padding-right:10px;text-align:center;border:1px solid #fff;"><?php echo $post["created_date"]; ?></td>

<?php
echo '<td style="font-family: arial;padding:10px;border:1px solid #fff;"><a class="btn btn-sm btn-primary" href="viewSingleVisit.php?id='.$post['id'].'"><span style="text-align:center;padding-right:10px;"><i class="fa fa-eye" aria-hidden="true"></i> View </span></a></td>';
?>
</tr>

<?php
}
}
?>
</table>
<table class="db_table" style="color:#fff;background:#000!important;border:1px solid #333;margin-bottom:10px;font-size:.8em;font-weight:normal!important;width:90%;" cellspacing="2" cellpadding="2" align="center">
<tr style="background:#000!important;">
<td style="padding:10px;text-align:center;border:1px solid #fff;">
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
echo "<span><a id='page_a_link' href='traffic.php?page=$j&show=$perpage'>< Prev </a></span> | ";
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
</table>
<br />
<br />
<br />
<?php
//include 'counter.php';
    echo '';
?>
<form action="block-ip-range.php" method="post" style="width:80%;margin:0px auto;">
<h2><i class="fa fa-android" aria-hidden="true"></i> Bot Management:</h2>
    <div class="form-group row">
        <label for="ip" class="col-2 col-form-label">IP Range</label>
        <div class="col-10">
            <div class="input-group">
                <input id="ip" name="ip" placeholder="192.168.0.0/24" type="text" aria-describedby="ipHelpBlock" required="required" class="form-control">
            </div>
            <span id="ipHelpBlock" class="form-text text-muted">Please enter the ip or ip range to block</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="block_reason" class="col-2 col-form-label">Reason</label>
        <div class="col-10">
            <select id="block_reason" name="block_reason" aria-describedby="block_reasonHelpBlock" required="required" class="custom-select">
                <option value="">Choose a reason (required)</option>
                <option value="HARVERSTER">Email Harvester</option>
                <option value="SPAMMER">Spammer</option>
                <option value="SCANNER">Vulnerability Probe</option>
                <option value="RECIDIVIST">Repeat Offender</option>
                <option value="UNDESIRED">Otherwise Unwanted</option>
            </select>
            <span id="block_reasonHelpBlock" class="form-text text-muted">Please Choose a reason for the block</span>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-2 col-10">
            <button name="submit" type="submit" class="btn btn-primary"><i class="fa fa-shield" aria-hidden="true"></i> Block IP</button>
        </div>
    </div>
    </form>
    <p>&nbsp;</p>

<div style="border:1px solid #fff;margin:10px auto;width:90%;padding:20px 0px;font-size:1.2em;" class="center db_table">
    <form action="delete_traffic.php" method="post"><label>Enter IP Address to Delete Records of: <input class="text_box_style" name="delete_ip" /></label>
    <button class="btn btn-primary" type ="submit" name="submit">Delete</button>
    </form>
    <br>
    <p style="border-bottom:1px solid #fff;margin:10px auto;width:90%;">&nbsp;</p> <br>
	<form action="findVisitFromIP.php" method="post"><button type="submit" class="btn btn-primary">Search by IP</button></form>
<br>
</div>

</article>

</section
</body>
</html>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>