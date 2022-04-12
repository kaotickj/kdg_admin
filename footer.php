<?php
    $copyYear = "2021";
    $copy = "Copyright &copy; 2021 - " .date('Y');
?>
<footer class="text-center footer text-faded py-5">
        <div class="container">
            <p class="m-0 small"><?php echo $copy; ?> by <?php echo $siteName;?></p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/current-day.js"></script>
<?php
    db_disconnect($database);
?>
</body>
</html>
