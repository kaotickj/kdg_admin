<?php
if(!isset($_GET['page'])) $title = "Home";
if (!empty ($_GET['page'])) {
	$page = $_GET['page'];
    $id = $_GET['id'] ?? false;
	$title = $page;
    if($id) {
        $article = Article::find_by_id($id);
        $title = ' - View/Edit Page - '. $article->title;
    }
} 
if(empty($_GET['id'])) {
}
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>Admin Area - <?php echo $title;?> </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css" />
        <style rel="stylesheet" type="text/css">
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
		   <script src="https://cdn.tiny.cloud/1/61ywuj312ce6gvdmuufb78lqarxdyh0rpwryh9rebykv8caf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
			<script>
			tinymce.init({
			  selector: 'textarea',
			  plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
			  toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
			  toolbar_mode: 'floating',
			  tinycomments_mode: 'embedded',
			  tinycomments_author: 'Author name',
			});
		  </script>
           <script src="assets/js/jquery-3.4.0.js"></script><script src="assets/js/bootstrap.min.js"></script>
        </head>

