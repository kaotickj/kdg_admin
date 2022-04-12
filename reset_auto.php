<section id="main_body" style="width:80%; margin:3% auto!important;">
<article style="width:92.5%; margin-bottom:12%; margin-left:auto; margin-right:auto;padding:20px 10px; " class="center">
<?php
require_once('initialize.php');
require_login();
	include 'config.php';
if(is_post_request()){
    $tbl_alt = $_POST['tbl_alt'];
    $incr_alt = $_POST['incr_alt'];

	$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
 			$sql='ALTER TABLE ';
            $sql .= $tbl_alt;
            $sql .=' AUTO_INCREMENT = ';
            $sql .= $incr_alt;

		if (mysqli_query($conn, $sql)) {
            $_SESSION['message'] = "DB Table was successfully altered.";
            redirect_to(url_for('index.php'));
/*			echo '<section id="main_body"><article><p>&nbsp;</p>
<h2><i class="fa fa-file-text" aria-hidden="true"></i> Reset Auto Increment Successful <small><a href="index.php?page=viewArts" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fa fa-eye" aria-hidden="true"></i> View Page List </span></a></small></h2>'; */
			}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
} else {


?>

<h2><i class="fa fa-file-text" aria-hidden="true"></i> Alter Database Table <small><a href="index.php?page=viewArts" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fa fa-eye" aria-hidden="true"></i> View Page List </span></a></small></h2>

<form action="" method="POST" class="" style="">
    <div class="form-group row">
        <label for="tbl_alt" class="col-4 col-form-label">Table to alter?</label>
        <div class="col-8">
            <div class="input-group center">
                <input id="tbl_alt" name="tbl_alt" placeholder="database_table" type="text" aria-describedby="tbl_altHelpBlock" class="form-control" required="required">
            </div>
            <span id="tbl_altHelpBlock" class="form-text text-muted">Please enter the database table to alter.</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="incr_alt" class="col-4 col-form-label">Set auto increment value to what?</label>
        <div class="col-8">
            <div class="input-group center">
                <input id="incr_alt" name="incr_alt" placeholder="INT" type="number" aria-describedby="incr_altHelpBlock" class="form-control" required="required">
            </div>
            <span id="tbl_altHelpBlock" class="form-text text-muted">Please enter the a number to set the auto increment value to.</span>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>&nbsp;&nbsp;<button type="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
        </div>
    </div>
</form>
</article>
</section>
<?php
  }
?>