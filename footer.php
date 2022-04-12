<?php
    $copyYear = "2005";
    $copy = "Copyright &copy; 2005 - " .date('Y');
?>
<footer>
<div class="center">
<h4><b class="section-tagline"><?php echo $copy ?></b> by <b class="section-tagline"><a href="https://kdgwebsolutions.com/">KDG Web Solutions Athens Tn.</a></b></h4>

<div style="text-align:center;font-size:90%;"><small><b>Website use is subject to <a href="https://kdgwebsolutions.com/terms-of-service" target="_blank">these terms.&nbsp; </a>Visitor data <a href="https://kdgwebsolutions.com/privacy-policy" target="_blank">Privacy Policy</a></b></small></div>

<br></div>
</footer>
<?php
    db_disconnect($database);
?>

