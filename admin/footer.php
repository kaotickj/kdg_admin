<?php
    $copyYear = "2005";
    $copy = "Copyright &copy; 2005 - " .date('Y');
?>
<footer>
<div class="center">
<h4><b class="section-tagline"><?php echo $copy ?></b> by <b class="section-tagline"><a href="https://kdgwebsolutions.com/"><?php echo $siteName;?>.</a></b></h4>

<br></div>
</footer>
<?php
    db_disconnect($database);
?>

