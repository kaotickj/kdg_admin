<?php
	require_once ('initialize.php');
	require_login();
	if (is_post_request()) {
		$subject = [];
		$admin['first_name'] = $_POST['first_name'];
		$admin['last_name'] = $_POST['last_name'];
		$admin['email'] = $_POST['email'];
		$admin['username'] = $_POST['username'];
		$admin['password'] = $_POST['password'];
		$admin['confirm_password'] = $_POST['confirm_password'];
		$result = insert_admin($admin);
		if ($result === true) {
			$new_id = mysqli_insert_id($db);
			$_SESSION['message'] = 'Admin created.';
			redirect_to(url_for('index.php?page=viewUsers&id=' . $new_id));
		}
		else {
			$errors = $result;
		}
	}
	else {
	// display the blank form
		$admin = [];
		$admin["first_name"] = '';
		$admin["last_name"] = '';
		$admin["email"] = '';
		$admin["username"] = '';
		$admin['password'] = '';
		$admin['confirm_password'] = '';
	}
?>
<section id="main_body" style="width:80%; margin-left:auto; margin-right:auto; !important;">
<article style="width:100%; border:1px solid #333; padding-left:30px; margin-bottom:40%; margin-left:20px; margin-right:auto; right:120;!important;padding:40px;">
 <h2><i class="fa fa-users" aria-hidden="true"></i> Create New User <small><a href="index.php?page=viewUsers" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fa fa-eye" aria-hidden="true"></i> View Users </span></a></small> </h2>

<div id="content">
  <div class="admin new center">
    <?php echo display_errors($errors); ?>
    <form action="" method="post">
      <dl>
        <dt>First name</dt>
        <dd><input class="input-group" type="text" name="first_name" value="<?php echo h($admin['first_name']); ?>" autofocus placeholder="First" required /></dd>
      </dl>

      <dl>
        <dt>Last name</dt>
        <dd><input class="input-group" type="text" name="last_name" value="<?php echo h($admin['last_name']); ?>" placeholder="Last" required /></dd>
      </dl>

      <dl>
        <dt>Username</dt>
        <dd><input class="input-group" type="text" name="username" value="<?php echo h($admin['username']); ?>" placeholder="Username" required /></dd>
      </dl>

      <dl>
        <dt>Email </dt>
        <dd><input class="input-group" type="email" name="email" value="<?php echo h($admin['email']); ?>" placeholder="user@server.tld" required /></dd>
      </dl>

      <dl>
        <dt>Password</dt>
        <dd><input class="input-group" type="password" name="password" value="" placeholder="Password" required /></dd>
      </dl>

      <dl>
        <dt>Confirm Password</dt>
        <dd><input class="input-group" type="password" name="confirm_password" value="" placeholder="Confirm Password" required /></dd>
      </dl>
      <p>
        Passwords must be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
      </p>
      <br />

      <div id="operations" class="center">
        <button class="btn btn-primary" type="submit">Create</button>&nbsp;&nbsp;<button class="btn btn-danger" type="reset">Clear</button>
      </div>
    </form>
  </div>
</div>
</article>
</section>