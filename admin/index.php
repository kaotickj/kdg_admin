<?php
require_once 'initialize.php';
//is_ip_authorized();
require_login();
include 'block.php';
include 'head.php';
?>
	<body>
<?php
	include 'header.php';
?>
		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<?php
                echo display_session_message();
//                echo $_SESSION['message'];
				include 'body.php';
				include 'footer.php';	
			?>
		</div>

	</body>
</html>
