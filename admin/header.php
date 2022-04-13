<?php
require_once('initialize.php');
?>
<header>
	<h1><?php echo $siteName;?> Backend<br /> <small>Administrative Control Panel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $siteURL;?>" target="_blank" class="btn btn-primary" style="position:relative;"><span style=""><i class="fa fa-eye" aria-hidden="true"></i> View Site </span></a></small></h1>
<?php
if (is_logged_in()) {
?>
	<div class="nav-side-menu">
		<div class="brand morpheus">Menu</div>
		<i class="fas fa-bars fa-lg toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

			<div class="menu-list">

				<ul id="menu-content" class="menu-content collapse out">
					<li><a href="./"><i class="fas fa-home fa-lg"></i> Home</a></li>
   					<li data-toggle="collapse" data-target="#system" class="collapsed">
					  <a href="#"><i class="fa fa-tachometer fa-lg"></i> System <span class="arrow"></span></a>
					</li>
                 	<li><ul class="sub-menu collapse" id="system">
            			<li><a href="index.php?page=resetAuto"><i class="fas fa-gear fa-lg"></i> Alter DB Table</a></li>
<!-- ## 
            			<li><a href="index.php?page=viewSiteSettings"><i class="fas fa-gears fa-lg"></i> Site Config Settings</a></li>
-->
						<li><a href="phpinfo.php" target="_blank"><i class="fas fa-code fa-lg"></i> PHP Info</a></li>
            			<li><a href="sitemap.php" target="_blank"><i class="fas fa-map fa-lg"></i> Sitemapper</a></li>
            		</ul></li>

					<li data-toggle="collapse" data-target="#security" class="collapsed"><a href="#"><i class="fa fa-shield fa-lg"></i> Security <span class="arrow"></span></a>
					</li>
						<li><ul class="sub-menu collapse" id="security">
						  <li><a href="index.php?page=security"><i class="fas fa-gear fa-lg"></i> Security Console</a></li>
<!-- ## Needs configuration 
						  <li><a href="killed_log.php" target="_blank"><i class="fas fa-file-code-o fa-lg"></i> Security Logs</a></li>
						  <li><a href="traffic/traffic.php" target="_blank"><i class="fas fa-search fa-lg"></i> View Traffic Reports</a></li>
-->
						</ul></li>
					<li data-toggle="collapse" data-target="#content" class="collapsed">
					  <a href="#"><i class="fas fa-folder-open fa-lg"></i> Content<span class="arrow"></span></a>
					</li>
						<li><ul class="sub-menu collapse" id="content">
						  <li><a href="index.php?page=viewArts"><i class="fas fa-search fa-lg"></i> View Articles</a></li>
						  <li><a href="index.php?page=addPage"><i class="fas fa-plus-square fa-lg"></i> Add Article</a></li>
<!--						  <li><a href="index.php?page=viewCat"><i class="fas fa-eye fa-lg"></i> View Categories</a></li>
						  <li><a href="index.php?page=addCat"><i class="fas fa-plus-square fa-lg"></i> Add Category</a></li> -->
						</ul></li>
					<li data-toggle="collapse" data-target="#users" class="collapsed">
					  <a href="#"><i class="fas fa-user fa-lg"></i> User Management<span class="arrow"></span></a>
					</li>
						<li><ul class="sub-menu collapse" id="users">
						  <li><a href="index.php?page=viewUsers"><i class="fas fa-eye fa-lg"></i> View Users</a></li>
						  <li><a href="index.php?page=addUser"><i class="fas fa-user-plus fa-lg"></i> Add User</a></li>
<!--						  <li><a href="index.php?page=viewComments"><i class="fas fa-envelope fa-lg"></i> User Contact</a></li> -->
						</ul></li>
<!--					<li data-toggle="collapse" data-target="#help" class="collapsed"><a href="#"><i class="fa fa-question-circle fa-lg"></i> Help <span class="arrow"></span></a>
					</li>
					<li>
						<ul class="sub-menu collapse" id="help">
							<li><a href="#"><i class="fas fa-info-circle fa-lg"></i> Version Information</a></li>
							<li><a href="#"><i class="fas fa-refresh fa-lg"></i> Check For Updates</a></li>
							<li><a href="#"><i class="fas fa-life-ring fa-lg"></i> Support</a></li>
							<li><a href="#"><i class="fas fa-wrench fa-lg"></i> Help Settings</a></li>
							<li><a href="#"><i class="fas fa-search fa-lg"></i> Search Help</a></li>
							<li><a href="#"><i class="fas fa-book fa-lg"></i> Documentation</a></li>
						</ul>
					</li>
-->
				</ul>
 	<ul><li><a href="logout.php"><i class="fas fa-lock fa-lg"></i> Logout</a></li></ul>

			</div>
		 </div>
	<hr style="width:45%;text-align:center;">
</header>

<?php
}
?>
