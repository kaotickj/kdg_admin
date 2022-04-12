		<!DOCTYPE html>
		<html lang="en-US">
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<?php
if (!empty ($_GET['page'])) {
	$page = $_GET['page'];
    $id = $_GET['id'] ?? false;
	if(empty($_GET['id'])) {
		include './admin/config.php';
		$conn = new mysqli($servername, $username, $password);
		if ($conn->connect_error) {
			die('' . $db_error .'');
		}
		mysqli_select_db($conn,$dbname);
		$sql='SELECT `id` FROM `articles` WHERE `page`="'.$page.'" LIMIT 1';
		$rs = mysqli_query($conn, $sql);
		if (mysqli_num_rows($rs) > 0) {
			if(! $rs ) {
				die('Could not get data: ' . mysql_error());
			}
			while($row = mysqli_fetch_assoc($rs)) {
				$id = $row['id'];
			}
		}
	} 
    if($id) {
        $article = Article::find_by_id($id);
        $title = $article->title;
        $cat = $article->category;
        $created = $article->created_date;
        $author = $article->author;
        $img = $article->image;
        $desc = $article->description;
        $img_alt = $article->img_alt;
        $body = $article->body;
        $active = $article->active;
        $page = $article->page;
        $show_title = $article->show_title;
        $show_byline = $article->show_byline;
        $no_index = $article->no_index;
        $schemadata = $article->schemadata;
        $hits = $article->hits;
        $moddate = $article->moddate;
        $modauthor = $article->modauthor;
		?>
				<title><?php echo strtoupper($title); ?> - KDG_ADMIN</title>
				<meta name="twitter:title" content="<?php echo strtoupper($page); ?> - KDG_ADMIN">
				<meta name="twitter:image" content="<?php echo $img;?>">
				<meta property="og:image" content="<?php echo $img;?>">
				<meta name="description" content="<?php echo $desc;?>">
				<meta name="twitter:description" content="<?php echo $desc;?>"><?php
	}
} else {
	?>
				<title>Home - KDG_ADMIN</title>
				<meta name="twitter:title" content="Hernandez Brothers">
				<meta name="twitter:image" content="assets/img/bg.jpg">
				<meta property="og:image" content="assets/img/bg.jpg">
				<meta name="description" content="Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!">
				<meta name="twitter:description" content="Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!">
<?php
}
?>
				<meta property="og:type" content="website">
				<meta name="twitter:card" content="summary_large_image">
				<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
				<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
				<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
			</head>
