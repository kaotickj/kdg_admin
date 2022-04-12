<?php

require_once('initialize.php');
require_login();
if(!isset($_GET['id'])) {
  redirect_to(url_for('index.php?page=viewArts'));
}
$id = $_GET['id'];
$article = Article::find_by_id($id);
if(!$article) {
    redirect_to(url_for('index.php?page=viewArts'));
}

if(is_post_request()) {

    // Delete article
    $result = $article->delete();
    if(!$result) {
        die('Delete Failed!');
    } else {
        $_SESSION['message'] = 'The article was deleted successfully.';
        redirect_to(url_for('index.php?page=viewArts'));
    }

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Article'; ?>

<div id="content">

<h4><a href="index.php?page=viewArts"> <i class="fa fa-fast-backward" aria-hidden="true"></i> Back to Pages List</a></h4>

  <div class="article delete">
    <h1>Delete Article</h1>
    <h3>Are you sure you want to delete this article?</h3>
    <p>&nbsp;</p>
    <h5 class="item db_table message"><?php echo h($article->title); ?></h5>
    <h5 class="item db_table message"><?php echo h($article->description); ?></h5>
    <p>&nbsp;</p>
    <form action="<?php echo url_for('index.php?page=delete&id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <button type="submit" name="commit" class="btn btn-lg btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Confirm Delete</button>
      </div>
    </form>
  </div>

</div>
