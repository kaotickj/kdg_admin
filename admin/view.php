<?php
require_once('initialize.php');
require_login();
//    $sql = "SELECT * FROM articles WHERE active = 1 ORDER BY id DESC";
    $articles = Article::find_all();
//    die(var_dump($object_array));
    echo '
    <p>&nbsp;</p>
    <h2><i class="fa fa-file-text" aria-hidden="true"></i> List of Site Pages <small><a href="index.php?page=addPage" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;&nbsp;Add Page</span></a></small></h2>';

    echo '<table style="color:#000;background:#ccc;font-weight:600; border: 1px solid #fff; margin:10px auto;width:100%;" class="db_table">';
    echo '
    <tr>
        <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">ID</th>
        <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Page Title</th>
        <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Manage</th>
    </tr>';
    foreach($articles as $article) {
        if($article['active'] == "1") $active = "Yes";
        if($article['active'] == "0") $active = "No";
        echo '<tr style="color:#fff;background: #000;">';
            echo '<td style="font-weight: bold;font-family: arial;padding-left: 10px;border:1px solid #fff;">'. h($article['id']). '&nbsp;&nbsp;</td>';
//            echo '<td style="border:1px solid #fff;">'. h($active). '</td>';
            echo '<td style="border:1px solid #fff;" title="'. h($article['description']) .'">'. h($article['title']). '</td>';
            echo '<td style="padding-left: 10px; padding-right:10px;text-align:center;border:1px solid #fff;"><a style="color:#fff!important;margin:8px 0px;" class="btn btn-sm btn-success" href="index.php?page=viewSinglePage&id='. h($article['id']) .'"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> <a class="btn btn-sm btn-primary" href="../'. h($article['page']) .'" target="_blank" style="color:#fff!important;margin:5px 0px;"><i class="fa fa-eye" aria-hidden="true"></i> View </a> <a style="color:#fff!important;margin:8px 0px;" class="btn btn-sm btn-danger" href="index.php?page=delete&id='. h($article['id']) .'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<p>&nbsp;</p><hr>';

?>
