<?php
require_once('initialize.php');
require_login();
        $sql='SELECT `status` FROM `offline` WHERE `id` ="1"';
        $rs = mysqli_query($database, $sql);
            if (mysqli_num_rows($rs) > 0) {
                while($row = mysqli_fetch_assoc($rs)) {
                $old_status = $row['status'];
                    if ($old_status == "1") {
                        $checked = "checked";
                    }
                    if ($old_status == "0") {
                        $checked = "";
                    }
                }
            }

echo '<p>&nbsp;</p>
<h2><i class="fa fa-shield" aria-hidden="true"></i> Security Console <small><a href="../kblocker/vault/killed_log.php" target="_blank" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fa fa-eye" aria-hidden="true"></i> View Logs </span></a></small></h2>
<p>&nbsp;</p>


<form action="site_power.php" method="post">
<table>
    <tr>
        <td><div style="font-size:1.8em;font-weight:600;">Site Live:&nbsp;&nbsp;&nbsp;  Off  <label style="vertical-align:middle;" class="switch">
            <input type="checkbox" '.$checked.' name="offline" onchange="this.form.submit()">
            <div class="slider round"></div></label>  On</div>
        </td>
    </tr>


</table>
</form>
<h4>Set the slider to "on" for Live site or "off" for Maintenance mode.</h4>';
include 'kswat_status.php';

                    if ($kswat_enabled == "on") {
                        $checked = "checked";
                    }
                    if ($kswat_enabled == "off") {
                        $checked = "";
                    }

echo '<form action="kswat_power.php" method="post">
<table>
    <tr>
        <td><div style="font-size:1.8em;font-weight:600;">K S.W.A.T. Status:&nbsp;&nbsp;&nbsp;  Off  <label style="vertical-align:middle;" class="switch">
            <input type="checkbox" '.$checked.' name="offline" onchange="this.form.submit()">
            <div class="slider round"></div></label>  On</div> <a href="../?kblocktest" target="_blank" class="btn btn-primary btn-lg text-center btn-center">System Test</a>&nbsp;<a href="../?theplague=true" target="_blank" class="btn btn-primary btn-lg text-center btn-center">Lockdown Test</a>
        </td>
    </tr>


</table>
</form>
<h4>Set the slider to "on" to enable K S.W.A.T. PHP Security and Bot S.W.A.T. spam prevention or "off" to disable. Test by using the test buttons.</h4>
<br />
<h2>Whitelist Your IP</h2>
<form action="/" method="get" class="form-inline"><input name="wlpw" type="password" placeholder="Whitelist Password" class="form-control" /><button class="btn btn-primary text-center btn-center" type="submit">Whitelist My IP</button></form>
<h4>You only need to do this once for each IP address that you visit your site from to prevent being locked out of the system due to security settings. Enter your whitelist password.</h4>
';
include 'notifications.php';
?>