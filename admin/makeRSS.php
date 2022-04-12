<?php
require_once('initialize.php');
require_login();
        $name = "feed.xml";
        $header = '<?xml version="1.0" encoding="utf-8"?>
                    <rss version="2.0">
                    <channel>
                    <title>Hernandez Brothers Coffee</title>
                    <link>https://example.com/</link>
                    <description>Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!</description>
                    <category>Website</category>
                    <category>Small Business</category>';
        $count = 0;
        $footer = "</channel>
                </rss>";

require 'config.php';
//die($servername);
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die('<div id="db_error">' . $db_error .'</div>');
    }
    mysqli_select_db($conn,$dbname);
        $sql='SELECT * FROM `articles` ORDER by `id` DESC';
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
           if(! $rs ) {
               die('Could not get data: ' . mysql_error());
            }
       $file = '../'.$name;
       	   file_put_contents($file, $header. "\n", LOCK_EX);

    	while($row = mysqli_fetch_assoc($rs)) {
        $count = $count + 1;
        $page = 'https://example.com/'.$row['page'];
//        die($page);
        $title = $row['title'];
        $img = '<enclosure url="https://example.com/'.$row['image'].'" type="image/jpg" />';
        $pub = $row['created_date'];
        $item = '<item><title>'.$title.'</title>
                    <category>Website</category>
                    <category>Small Business</category>';
        $url = '<link>'.$page.'</link>';
        $pubDate = '<pubDate>'.$pub.'</pubDate>';
        $gud = '<guid>'.$page.'</guid>';
        $description = $row['description'];
        $desc = '<description>'.$description.'</description></item>';

        file_put_contents($file, $item. "\n", FILE_APPEND | LOCK_EX);
        file_put_contents($file, $img. "\n", FILE_APPEND | LOCK_EX);
        file_put_contents($file, $url. "\n", FILE_APPEND | LOCK_EX);
        file_put_contents($file, $gud. "\n", FILE_APPEND | LOCK_EX);
        file_put_contents($file, $pubDate. "\n", FILE_APPEND | LOCK_EX);
        file_put_contents($file, $desc. "\n", FILE_APPEND | LOCK_EX);


   }
        file_put_contents($file, $footer, FILE_APPEND | LOCK_EX);

  echo '<br><br>';
  echo '<div class="mapper-group">';
  echo '<p>Finished creating rss feed xml containing '.$count. ' entries.  Feed saved as '.$file.'</p>';
  echo '<form action="index.php"><button class="button" name="submit">Back</button>';
  echo '<a href="'.$file.'"><button type="button" name="button">View</button></a>';
  echo '</div>';
               }


?>
