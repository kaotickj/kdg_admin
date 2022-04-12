<?php
require_once('initialize.php');
require_login();
        $name = $_POST['name'];
        $verline = '<?xml version="1.0" encoding="UTF-8"?>';
        $urlset_line ='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        $count = 0;
        $change = $_POST['changefreq'];
        $priority = $_POST['priority'];
        $changefreq = '<changefreq>'.$change.'</changefreq>';
        $defpriority = '<priority>'.$priority.'</priority>';
        $startpage = '<loc>https://kdgwebsolutions.com</loc>';

require 'config.php';
					$conn = new mysqli($servername, $username, $password);
					if ($conn->connect_error) {
						die('<div id="db_error">' . $db_error .'</div>');
					}
					mysqli_select_db($conn,$dbname);
     $sql='SELECT * FROM `articles` WHERE `active` = "1"';
      $rs = mysqli_query($conn, $sql);
         if (mysqli_num_rows($rs) > 0) {
           if(! $rs ) {
            die('Could not get data: ' . mysql_error());
            }
       $file = '../'.$name;
	   die($file);
       	   file_put_contents($file, $verline. "\n", LOCK_EX);
       	   file_put_contents($file, $urlset_line. "\n", FILE_APPEND | LOCK_EX);
       	   file_put_contents($file, '<url>'. "\n", FILE_APPEND | LOCK_EX);
       	   file_put_contents($file, $startpage. "\n", FILE_APPEND | LOCK_EX);
	       file_put_contents($file, '<changefreq>daily</changefreq>'. "\n", FILE_APPEND | LOCK_EX);
    	   file_put_contents($file, '<priority>1.0</priority>'. "\n", FILE_APPEND | LOCK_EX);
      	   file_put_contents($file, '</url>'. "\n", FILE_APPEND | LOCK_EX);

        	while($row = mysqli_fetch_assoc($rs)) {
        $count = $count + 1;
        $page = $row['page'];
        $fullurl ='<loc>https://kdgwebsolutions.com/'.$page.'</loc>';

	   file_put_contents($file, '<url>'. "\n", FILE_APPEND | LOCK_EX);
	   file_put_contents($file, $fullurl. "\n", FILE_APPEND | LOCK_EX);
	   file_put_contents($file, $changefreq. "\n", FILE_APPEND | LOCK_EX);
	   file_put_contents($file, $defpriority. "\n", FILE_APPEND | LOCK_EX);
	   file_put_contents($file, '</url>'. "\n", FILE_APPEND | LOCK_EX);


   }
        file_put_contents($file, '</urlset>', FILE_APPEND | LOCK_EX);

  echo '<br><br>';
  echo '<div class="mapper-group">';
  echo '<p>Finished creating sitemap containing '.$count. ' entries.  Sitemap saved as '.$file.'</p>';
  echo '<form action="index.php"><button class="button" name="submit">Back</button>';
  echo '<a href="'.$file.'"><button type="button" name="button">View</button></a>';
  echo '</div>';
               }


?>
