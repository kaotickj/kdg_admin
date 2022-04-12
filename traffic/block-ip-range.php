<?php
include 'config.php';
function redirect_to($location) {
    header("Location: " . $location);
    exit;
}

//require_once 'initialize.php';
            		$ip = $_POST['ip']. ' ## Manual Block ' .$_POST['block_reason'];
            		$file = '/var/www/vhosts/.htaccess';
            		$deny = 'deny from ' . $ip;


            //<======  Block the ip range ======>
            session_start();
            $_SESSION['message'] = "IP(s) Successfully Blocked";

            file_put_contents($file, $deny. "\n", FILE_APPEND | LOCK_EX);
        	redirect_to('traffic.php');


?>