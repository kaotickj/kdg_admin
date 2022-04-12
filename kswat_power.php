<?php
require_once('initialize.php');
require_login();
$status = $_POST['offline'];
if ($status == "on"){
    $status = "on";
}
if ($status == "") {
    $status = "off";
}
$stat_root = "<?php";
$kswat_enabled = " \$kswat_enabled = ";
$stat_end = "?>";
$kswat_stat = $stat_root . $kswat_enabled ."'$status';".$stat_end;
$file = 'kswat_status.php';
file_put_contents($file, $kswat_stat. "\n", LOCK_EX);
    $_SESSION['message'] = 'K S.W.A.T. Status Updated ';
    redirect_to(url_for('index.php?page=security'));

?>