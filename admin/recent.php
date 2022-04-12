 <?php
 	require_once ('initialize.php');
 	require_login();
 ?>
<p>&nbsp;</p>
<h2><i class="fa fa-file-text" aria-hidden="true"></i> Recent Articles <small><a href="index.php?page=viewArts" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fa fa-eye" aria-hidden="true"></i> View Page List </span></a></small></h2>
<table style="color:#000;background:#ccc;font-weight:600; border: 1px solid #fff; margin:10px auto;width:100%;" class="db_table">
<?php
	$result = mysqli_query($conn, "select * from articles ORDER BY id DESC Limit 10");
	$rows = mysqli_num_rows($result);
	if ($rows) {
		$i = 0;
	?>
    <tr>
        <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">ID</th>
        <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Page Title</th>
        <th style="font-weight: bold;font-family: arial;border:1px solid #fff;">Manage</th>
    </tr>
		<?php
			while ($post = mysqli_fetch_assoc($result)) {
			?>
	<tr style="color:#fff;background: #000;">
		<td style="font-weight: bold;font-family: arial;padding:10px;border:1px solid #fff;">&nbsp;&nbsp;<?php echo $post["id"]; ?> &nbsp;&nbsp;</td>
		<td style="border:1px solid #fff;"><?php echo $post["title"]; ?></td>
	    <td style="font-family: arial;padding-left: 10px; padding-right:10px;text-align:center;border:1px solid #fff;"><a style="color:#fff!important;margin:8px 0px;" class="btn btn-sm btn-success" href="index.php?page=viewSinglePage&id=<?php echo h($post['id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> <a class="btn btn-sm btn-primary" href="../?page=<?php echo h($post['page']); ?>" target="_blank" style="color:#fff!important;margin:5px 0px;"><i class="fa fa-eye" aria-hidden="true"></i> View </a> <a style="color:#fff!important;margin:8px 0px;" class="btn btn-sm btn-danger" href="index.php?page=delete&id=<?php echo h($post['id']); ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
	</tr>
		<?php
		}
	}
?>
</table>
