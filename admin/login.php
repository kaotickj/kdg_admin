<?php
require_once('initialize.php');
//is_ip_authorized();
//echo (var_dump($_SESSION) .'<br><br>' .var_dump($object_array));
//require '../bot-trap/bottrap.php';
$errors = [];
$username = '';
$password = '';
$date = date('l F d, Y h:i:s a');
$file = 'logs/.login_access.txt';
$deny = 'Login page loaded from: ' . $ip .' | Logged: '.$date.' ';
file_put_contents($file, $deny. "\n", FILE_APPEND | LOCK_EX);

if ($_SESSION['attempts'] >= 5){
		$file = '../../.htaccess';
		$deny = 'deny from ' . $ip;
		file_put_contents($file, $deny. "\n", FILE_APPEND | LOCK_EX);
		$file = 'logs/.auth_logs.txt';
		$deny = 'Too many failed login attempts from ' . $ip .' | Logged: '.$date.' ';
		file_put_contents($file, $deny. "\n", FILE_APPEND | LOCK_EX);

	die('Too many failed login attempts.');		
}

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    // Using one variable ensures that msg is the same
    $login_failure_msg = "Log in failed!";

    $admin = find_admin_by_username($username);
    if($admin) {

      if(password_verify($password, $admin['hashed_password'])) {
        // password matches
        log_in_admin($admin);
		$file = 'logs/.auth_success.txt';
		$deny = "Successful login from  $ip with username: \"$username\" | Logged: $date ";
		file_put_contents($file, $deny. "\n", FILE_APPEND | LOCK_EX);

        redirect_to(url_for(''));
      } else {
        // username found, but password does not match
		$_SESSION['attempts']++;
        $errors[] = $login_failure_msg;
		$file = 'logs/.auth_logs.txt';
		$deny = 'Failed login attempt from ' . $ip . ' Wrong password: ' . '"'. $password . '"';
        $deny .= ' | Logged: '.$date.' ';
		file_put_contents($file, $deny. "\n", FILE_APPEND | LOCK_EX);
      }

    } else {
      // no username found
        $errors[] = $login_failure_msg;
		$_SESSION['attempts']++;
		$file = 'logs/.auth_logs.txt';
		$deny = 'Failed login attempt from ' . $ip . ' No such user: ' . '"'. $username . '"';
        $deny .= ' | Logged: '.$date.' ';
		file_put_contents($file, $deny. "\n", FILE_APPEND | LOCK_EX); 					
    }

  }
}

?>

<?php $page_title = 'Log in'; ?>
<?php include'head.php'; ?>
	<body>
	<?php //include'template/header.php'; ?>
        <section id="main_body" style="width:100%; margin:3% auto!important;">
        <h2 class="center">Authorization Required</h2>
        <p>&nbsp;</p>
            <article style="width:92.5%; margin-bottom:12%; margin-left:auto; margin-right:auto;padding:20px 10px; " class="center">
			    <i class="fas fa-user-secret fa-6x" style="font-weight:600;" aria-hidden="true"></i><h3>Please Sign In</h3>
				<form style="margin:10px auto;" action="login.php" method="post">
	<?php
	echo display_errors($errors);
	?>
					<div class="form-group">
<!--						<label for="username">Username</label> -->
						<div class="input-group center">
							<input id="username" name="username" placeholder="Username" type="text" aria-describedby="usernameHelpBlock" style="height:30px;" autofocus>
						</div>
						<span id="usernameHelpBlock" class="form-text text-muted">Please enter your username</span>
					</div>
					<div class="form-group">
<!--						<label for="password">Password</label> -->
						<div class="input-group center">
							<input id="password" name="password" placeholder="Password" type="password" aria-describedby="passwordHelpBlock" style="height:30px;">
						</div>
						<span id="passwordHelpBlock" class="form-text text-muted">Please enter your password</span>
					</div>
					<div class="form-group">
						<button name="submit" type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</article>
		</section>
	<?php include 'footer.php'; ?>
	</body>
</html>
