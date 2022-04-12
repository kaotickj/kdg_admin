<?php
require_once('initialize.php');
require_login();

$id = $_GET['id'] ?? '1'; // PHP > 7.0
if(!isset($_GET['id'])) {
//die();
$admins = find_all_admins();
  ?>
<h2><i class="fa fa-users" aria-hidden="true"></i> Users List <small><a href="index.php?page=addAdmin" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fas fa-user-plus" aria-hidden="true"></i> Add New User </span></a></small> </h2>
<div id="content">
  <div class="admin show center">
<table style="color:fff;background:#000;font-weight:600; border: 1px solid #fff; margin:10px auto;width:100%;" class="db_table">
    <tr>
        <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">ID</th>
        <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Full Name</th>
        <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Username</th>
        <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Manage</th>
    </tr>
<?php
    $count = 0;
    foreach($admins as $admin) {
        $count++;
        $fullName = $admin['first_name'] .' '. $admin['last_name'];
?>
    <tr>
        <td style="font-weight: bold;font-family: arial;padding:0px 10px;border:1px solid #fff;"><?php echo h($admin['id']); ?></td>
        <td style="font-weight: bold;font-family: arial;padding:0px 10px;border:1px solid #fff;width:60%;"><?php echo h($fullName); ?></td>
        <td style="font-weight: bold;font-family: arial;padding:0px 10px;border:1px solid #fff;"><?php echo h($admin['username']); ?></td>
	    <td style="font-family: arial;padding-left: 5px; padding-right:5px;text-align:center;border:1px solid #fff;"><a style="color:#fff!important;margin:8px 0px;" class="btn btn-sm btn-success" href="index.php?page=viewUsers&id=<?php echo $admin['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> View</a> <a style="color:#fff!important;margin:8px 0px;" class="btn btn-sm btn-danger" href="index.php?page=deleteAdmin&id=<?php echo $admin['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
    </tr>
<?php
}
?>
</table>
<?php

if($count <= 3) {
   for($i = 0; $i < 12; $i++){
        echo '<p>&nbsp;</p>';
    }
}
if($count > 3) {
   for($i = 0; $i < 6; $i++){
        echo '<p>&nbsp;</p>';
    }
}
?>
<!--    <h1>Admin: <?php echo h($admin['username']); ?></h1>
    <div style="margin:10px auto;">
    <ul style="list-style-type:none;">
        <li><p><b>Full name: </b>
        <input class="input-group center" value="" disabled /></p></li>
        <li><p><b>Email: </b>
        <input class="input-group center" value="<?php echo h($admin['email']); ?>" disabled /></p></li>
        <li><p><b>Username: </b>
        <input class="input-group center" value="<?php echo h($admin['username']); ?>" disabled /></p></li>
	</ul>

    </div> -->
    <div class="actions center">

    </div>
  </div>
</div>
<p>&nbsp;</p>

<?php
 }

else {
    $admin = find_admin_by_id($id);
    $fullName = $admin['first_name'] .' '. $admin['last_name'];
?>
<section id="main_body" style="width:80%; margin-left:auto; margin-right:auto; !important;">
<article style="width:92.5%; border:1px solid #333; padding-left:30px; margin-bottom:40%; margin-left:20px; margin-right:auto; right:120;!important;padding:40px;">

<div id="content">
  <div class="admin show center">
    <h1>Admin: <?php echo h($admin['username']); ?></h1>
    <div style="margin:10px auto;">
    <ul style="list-style-type:none;">
        <li><p><b>Full name: </b>
        <input class="input-group center" value="<?php echo h($fullName); ?>" disabled /></p></li>
        <li><p><b>Email: </b>
        <input class="input-group center" value="<?php echo h($admin['email']); ?>" disabled /></p></li>
        <li><p><b>Username: </b>
        <input class="input-group center" value="<?php echo h($admin['username']); ?>" disabled /></p></li>
	</ul>

    </div>
    <div class="actions center">

	  <a class="btn btn-primary" href="?page=edit&id=<?php echo $admin['id']; ?>">Edit</a>
      <a class="btn btn-danger" href="?page=deleteAdmin&id=<?php echo $admin['id']; ?>">Delete</a>
    </div>
  </div>
</div>
<p>&nbsp;</p>
</article>
</section>


<?php
    }

?>