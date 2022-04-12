<?php
require 'config.php';
            		$ip = $_POST['delete_ip'];
            					$conn = mysqli_connect($servername, $username, $password, $dbname);

            					if (!$conn) {
            						die("Connection failed: " . mysqli_connect_error());
            					}

                                $sql= "DELETE FROM  `visitor_ips` WHERE  `ip_addy` =  '".$ip."'";
            					if (mysqli_query($conn, $sql)) {

            					ob_clean();
            					header('Location: traffic.php');
            	}
                        else {
                            echo 'Oops!  Something went wrong!';
                        }
?>