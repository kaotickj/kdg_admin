<?php
require_once('initialize.php');
require_login();
if(is_post_request()) {
    // Create record using post parameters
    $args = [];
    $args['title'] = $_POST['title'] ?? NULL;
    $args['category'] = $_POST['category'] ?? NULL;
    $args['created_date'] = date("D, j M Y G:i:s T") ?? NULL;
    $args['author'] = $_POST['author'] ?? NULL;
    $args['image'] = $_POST['image'] ?? NULL;
    $args['description'] = $_POST['description'] ?? NULL;
    $args['img_alt'] = $_POST['img_alt'] ?? NULL;
    $args['body'] = $_POST['body'] ?? NULL;
    $args['active'] = $_POST['active'] ?? NULL;
    $args['page'] = $_POST['page'] ?? NULL;
    $args['show_title'] = $_POST['show_title'] ?? NULL;
    $args['show_byline'] = $_POST['show_byline'] ?? NULL;
    $args['no_index'] = $_POST['no_index'] ?? NULL;
    $args['schemadata'] = $_POST['schemadata'] ?? NULL;
    $args['moddate'] = date("D, j M Y G:i:s T") ?? NULL;
    $args['modauthor'] = $_SESSION['name'] ?? NULL;

    $article = new Article($args);
    $result = $article->save();

    if($result == true) {
        $new_id = $article->id;
        $_SESSION['message'] = 'The article was successfully saved to the database.';
        $file = '../.htaccess';
        $output = 'RewriteRule ^'.$article->page.' index.php?page='.$article->page.' [NC,L]';
        file_put_contents($file, $output. "\n", FILE_APPEND | LOCK_EX);
        if($article->active == "1") {
            redirect_to(url_for('makeRSS.php'));
        } else {
            redirect_to(url_for('index.php?page=viewSinglePage&id='.$article->id.''));
        }
    } else {
        die('Error');
    }
} else {
    $article = new Article;
}

?>
<p>&nbsp;</p>
<h2><i class="fa fa-file-text" aria-hidden="true"></i> Create a New Page <small><a href="index.php?page=viewArts" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fa fa-eye" aria-hidden="true"></i> View Page List </span></a></small></h2>

<form action="" method="POST">
<?php include 'formFields.php'; ?>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>&nbsp;&nbsp;<button type="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Clear</button>
        </div>
    </div>
</form>
