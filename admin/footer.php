<?php
    $copyYear = "2021";
    $copy = "Copyright &copy; 2021 - " .date('Y');
?>
<footer>
<div class="center">
<h4><b class="section-tagline"><?php echo $copy ?></b> by <b class="section-tagline"><a href="<?php echo $siteURL;?>"><?php echo $siteName;?></a></b></h4>

<br></div>
</footer>
<?php
    db_disconnect($database);
?>

