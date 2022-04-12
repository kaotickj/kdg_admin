<?php
require_once('initialize.php');
require_login();
    if (isset($_GET['page'])){
        $page = $_GET['page'];

        switch($page){

            //CREATE A NEW PAGE
            case 'addPage';
                include 'addPage.php';
            break;

            //SHOW ALL ARTICLES
            case 'viewArts';
                include 'view.php';
            break;

            //SHOW SINGLE ARTICLE
            case 'viewSinglePage';
                include 'viewSinglePage.php';
            break;

            //DELETE ARTICLE
            case 'delete';
                include 'delete.php';
            break;

            //SHOW PHP INFO
            case 'phpInfo';
                include 'phpinfo.php';
            break;

            //SHOW NOTIFICATIONS
            case 'notifications';
                include 'notifications.php';
            break;

            //SHOW SECURITY CONSOLE
            case 'security';
                include 'security.php';
            break;

            //ADD A USER
            case 'addUser';
                include 'new.php';
            break;

            //VIEW USERS
            case 'viewUsers':
                include 'show.php';
            break;

            //DELETE ADMIN
            case 'deleteAdmin';
                include 'deleteAdmin.php';
            break;

            //RESET AUTO INCREMENT VALUE
            case 'resetAuto';
                include 'reset_auto.php';
            break;

            //TRAFFIC REPORTS
            case 'traffic';
                include 'traffic.php';
            break;


        }
    } else {
//$vd = serialize($_SESSION);

/*
?>
<script>
alert('<?php echo $vd ?>');
</script>
*/
?>

<h2><i class="fas fa-id-card" aria-hidden="true"></i> User Info <small><a href="logout.php" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fa fa-lock" aria-hidden="true"></i> Logout </span></a></small></h2>


<div class="user-details">
    <p>&nbsp;</p>
    <p><i class="fa fa-user"></i> Name:  <?php echo ucfirst($_SESSION['name']) ?? ''; ?><!-- <i class="fas fa-question-circle" title="Full Name:  <?php echo $_SESSION['name']; ?>"></i> --></p>
    <p><i class="fas fa-user-secret"></i> Username:  <?php echo $_SESSION['username'] ?? ''; ?><!-- <i class="fas fa-question-circle" title="Username:  <?php echo $_SESSION['username']; ?>"></i> --> </p>
    <p><i class="fa fa-calendar"></i> <span class="">Logged in at:</span> <br><i class="fa fa-clock"></i> <?php echo $_SESSION['last_login']; ?></p>
    <p><i class="fa fa-laptop"></i> From: <?php echo $_SESSION['ip']; ?></p>
    <p>&nbsp;</p>
</div>
<?php
include 'recent.php';
echo '<hr>';
    }
?>