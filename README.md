<h2>KDG ADMIN PHP Website Framework</h2>
<p>PHP website framework. Requires PHP 7.4+ Some functions, such as the RSS Feed and Sitemap generators, require system specific configuration. GNU/GPL3 License. Sample code and content are provided for front end functionality. The current state is a mixture of procedural and object oriented programming that I have (slowly) been converting to OOP. It works well as-is, but will require that you inspect and understand the code to customize it for your needs.</p>
<h4>Login:</h4>
<img src="/kdg-cms-admin.png" />
<h4>Back End:</h4>
<img src="/kdg_admin-back-end.png" />
<h4>Front End:</h4>
<img src="/kdg_admin-front-end.png" />

<h2>Installation and Setup</h2>
<ol>
	<li>Place the contents of the "kdg_admin_master" folder in your webroot directory.</li>
	<li>Import "kdg_admin.sql". Modify "db_credentials" and "config.php" with your database connection credentials.</li>
	<li>Navigate to /admin/ where you should be required to login: user="administrator" password="P@ssword1234".</li>
	<li>After logging in, navigate to user management > add user (/admin/index.php?page=addUser) and create a new admin user account.</li>
	<li>Logout and login as the new user.</li>
	<li>Navigate to user management > view users (/admin/index.php?page=viewUsers) and delete the default admin user (administrator).</li>
	<li>In "initialize.php", edit line 30 <code>$siteName = "KDG_ADMIN";</code> change "KDG_ADMIN" to an SEO optimized name for your site.</li>
</ol>

<h2>Securing the Framework</h2>
<p>In "functions.php", modify the <code>is_ip_authorized()</code> function at line 87 to allow your IP Address(es). Uncomment (remove the "#" in front of) the line <code>#is_ip_authorized();</code> in "index.php" and "login.php". This will result in a 404 status for traffic from unauthorized sources visiting /admin/.</p>
<p>By default, the login attempt limit is set to 5. This can be changed by modifying line 16 in "login.php" <code>if ($_SESSION['attempts'] >= 5){</code> from 5 to your desired limit. It is not advised to allow more than 3 - 5 attempts or to disable this fucnctionality as it mitigates brute force attacks.</p>
<p>**<em>For advanced security, download and use K S.W.A.T. PHP Security https://github.com/kaotickj/k-swat-php-security which has built-in support in this framework.</em> </p>


