<?php
	require_once ('initialize.php');
	require_login();
    $copyYear = "2015";
    $copyEndYear = date('Y');
    $copy = "&copy; 2015";
    if ($copyEndYear > $copyYear) {
        $copy = "&copy; 2015 - " .$copyEndYear;
    }
?>
<!doctype html>
<html lang="en">
<head>
<title>K S.W.A.T. PHP Security Suite | Recent Killed Logs</title>
<meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<Style>
@font-face {
    font-family: army;
    src: url('/admin/assets/fonts/ARMY_RUST.ttf');
    font-style: normal;

}
.army { 
	font-family: army;
	font-size:1.6em;
	text-shadow: 1px 1px 1px #333;
}
body {
	background-color:#26398e;
}
pre {
    white-space: pre-wrap;
    white-space: -moz-pre-wrap;
    white-space: -pre-wrap;
    white-space: -o-pre-wrap;
    word-wrap: break-word;
}
.pre-surround {
	background-color:#000;
	color:#18f00f;
	margin:0px auto;
	padding:10px 40px;
	width:80%;
	text-align:left;	
}
.surround { 
    text-align:center;
	border:1px solid #333;
	border-radius:10px;
	width:80%;
	margin:0px auto;
	background-color:#fff;
	color:blue;
	padding:20px;
	}
</style>
</head>
<body>
<div class="surround">
<div class="">
<h5 style="background-color:#26398e;color:#fff;padding:20px;margin-top:10px!important;">Thanks for Using the K S.W.A.T. PHP Security Module v. 1.4.88(final)</h5>
<h5>K S.W.A.T.&reg; PHP Security Module and Bot S.W.A.T.&reg; Spam Prevention System<br /> Design and coding by <a href="https://www.linkedin.com/in/johnny-watts-695751125/" target="_blank">Johnny Watts</a>, MSc.IT, MSCSIA, CeH. <?php echo $copy;?> by <a href="https://kdgwebsolutions.com" target="_blank">KDG Web Solutions</a></h5>
<div style="font-size:.7em;color:#333;"><em>GOLLUMBOT:</em>
<blockquote>"WE WANTS IT, WE NEEDS IT, MUST HAVE THE PRECIOUS... "<br>
[GOLLUMBOT SNARLS IN FRUSTRATION]</blockquote><em>SMEAGOL:</em>
<blockquote>"LEAVE! NOW! AND NEVER COME BACK!"<br>[GOLLUMBOT IS SILENT; SMEAGOL WAITS]</blockquote><em>SMEAGOL:</em>
<blockquote>[looks around; then begins galumphing around with joy]<br>"We told him to go away... and away he goes, Precious! Gone, gone, gone! SMEAGOL IS FREE!"</blockquote></div>
<div style="margin:0px 40px;text-align:center;">
<div style="color:orange;font-weight:900;"><h5>(SMEAGOL-BLOCKED)</h5>
<h5>"GOLLUMBOT IS NOT AUTHORIZED ON <u>THIS</u> SERVER!"</h5></div>
<div style="margin:0px auto;width:20%;" ><img src="https://kdgwebsolutions.com/kblocker/vault/bots-count.gif" style="width:40%;" /></div>
</div>
</div>
<a name="top"></a>
<?php
echo '<h4 style="text-align:center;">K S.W.A.T. Killed Log Follows:<br>(<a href="/var/www/vhosts/kdgwebsolutions.com/httpdocs/kblocker/vault/archive/" target="_blank">View archived logs</a>)&nbsp;&nbsp;&nbsp;(<a href="">Check For Updates</a>)&nbsp;&nbsp;&nbsp;(<a href="#bottom">Go To End</a>) </h4>';
	$file = file_get_contents("/var/www/vhosts/kdgwebsolutions.com/httpdocs/kblocker/vault/killed_log.txt"); 
	echo '<div class="pre-surround">';
	include '/var/www/vhosts/kdgwebsolutions.com/httpdocs/kblocker/vault/counter.php';
	echo '<pre>'.$file.'</pre></div>';
?>
<a name="bottom"></a>
<p style="text-align:center;" title="Design and coding by Johnny Watts, aka., kaotickj.">Powered by:<br> <img src="https://www.hackthebox.eu/badge/image/476578" alt="Hack The Box"></p>
(<a href="#top">Back to Top</a>)<br>
</div>
</body>
</html>