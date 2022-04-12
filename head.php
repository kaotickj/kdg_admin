<?php
if (!empty ($_GET['page'])) {
	$page = $_GET['page'];
    $id = $_GET['id'] ?? false;
    if($id) {
        $article = Article::find_by_id($id);
        $title = $article->title;
    }
} 
if(empty($_GET['id'])) {
		$page_name = "Home";
		$title = "Home";
}
	
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title><?php echo strtoupper($page); ?> - KDG_ADMIN</title>
		<meta name="twitter:title" content="<?php echo strtoupper($_GET['page']); ?> - KDG_ADMIN">
		<meta name="twitter:image" content="https://example.com/assets/img/about.jpg">
		<meta property="og:image" content="https://example.com/assets/img/about.jpg">
		<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed elementum tempus egestas sed. ">
		<meta property="og:type" content="website">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed elementum tempus egestas sed. ">
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
	</head>
