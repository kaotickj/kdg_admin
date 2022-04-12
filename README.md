<h2>KDG ADMIN PHP Website Framework</h2>
<img src="/kdg-cms-admin.png" />
<p>PHP website framework. Requires PHP 7.4+ Some functions, such as the RSS Feed and Sitemap generators, require system specific configuration. GNU/GPL3 License. This is NOT a Content Management System. No code is provided for front end functionality. The current state is a mixture of procedural and object oriented programming that I have (slowly) been converting to OOP. It works well as-is, but will require that you inspect and understand the code, then modify it to your needs. </p>

<h2>Installation and Setup</h2>
<p>Place the "kdg_admin" folder in your webroot directory. Import "kdg_admin.sql". Modify "db_credentials" and "config.php" with your database connection credentials. Login is: user: administrator password: P@ssword1234 After logging in, navigate to user management > add user (/admin/index.php?page=addUser) and create a new admin user account. Logout and login as the new user.  Navigate to user management > view users (/admin/index.php?page=viewUsers) and delete the default admin user (administrator).</p>
<h2>Securing the Framework</h2>
<p>In "functions.php", modify the is_ip_authorized function at line 87 to allow your IP Address(es). Uncomment (remove the "#" in front of) the line "#is_ip_authorized();" in "index.php" and "login.php". This will result in a 404 status for traffic from unauthorized sources visiting /admin/.  By default, the login attempt limit is set to 5. This can be changed by modifying line 16 in "login.php" "if ($_SESSION['attempts'] >= 5){" from 5 to your desired limit. It is not advised to allow more than 3 - 5 attempts or to disable this fucnctionality as it mitigates brute force attacks.<br />**<em>For advanced security, download and use K S.W.A.T. PHP Security https://github.com/kaotickj/k-swat-php-security which has built-in support in this framework.</em> </p>


