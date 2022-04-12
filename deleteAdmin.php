<?php
require_once('initialize.php');
require_login();
if(!isset($_GET['id'])) {
  redirect_to(url_for('index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $result = delete_admin($id);
  $_SESSION['message'] = 'Admin deleted.';
  redirect_to(url_for('index.php?page=viewUsers'));
} else {
  $admin = find_admin_by_id($id);
}

?>
<section id="main_body" style="width:90%; margin-left:auto; margin-right:auto; !important;">
<article style="width:100%; border:1px solid #333; padding-left:30px; margin-bottom:12%; margin-left:20px; margin-right:auto; right:120;!important;padding:40px;">

<div id="content">
  <div class="admin delete center">
    <h1>Delete User</h1>
    <br><p>Are you sure you want to delete this user?</p><br>
    <p class="message" style="color:#000!important;"><?php echo h($admin['username']); ?></p>
	<p>&nbsp;</p>
    <form action="<?php echo url_for('?page=deleteAdmin&id=' . h(u($admin['id']))); ?>" method="post">
      <div id="operations">
        <input class="btn btn-danger" type="submit" name="commit" value="Confirm Delete" />
      </div>
    </form>
  </div>

</div>
</article>
</section>
<?php
   for($i = 0; $i < 4; $i++){
        echo '<p>&nbsp;</p>';
    }

?>