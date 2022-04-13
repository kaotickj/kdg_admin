<?php
//echo '<h1 style="background:#fff;padding:20px;font-size:3em;">Initialized</h1>';
    ob_start(); // output buffering is turned on

    session_start(); // turn on sessions
    date_default_timezone_set('America/Indianapolis');

    // Assign file paths to PHP constants
    // __FILE__ returns the current path to this file
    // dirname() returns the path to the parent directory
//    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(__FILE__));
    define("PUBLIC_PATH", PROJECT_PATH . '/');
//    define("SHARED_PATH", PRIVATE_PATH . '/');

    // * Can dynamically find everything in URL up to "/admin"
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/admin') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $doc_root);

    require_once('functions.php');
    require_once('database.php');
    require_once('query_functions.php');
    require_once('validation_functions.php');
    require_once('auth_functions.php');
    $date = date("D, j M Y");
    $time = date("G:i:s T");
    $db = db_connect();
    $errors = [];
	$siteName = "KDG_ADMIN";
	$siteURL = "https://example.com/";
    $ip = $_SERVER['REMOTE_ADDR'];
    $_SESSION['attempts'] = 0;
    // Load class definitions manually

    // -> Individually
    // require_once('classes/article.class.php');

    // -> All classes in directory
    foreach(glob('classes/*.class.php') as $file) {
        require_once($file);
    }

    // Autoload class definitions
    function cls_autoload($class) {
        if(preg_match('/\A\w+\Z/', $class)) {
            include('classes/' . $class . '.class.php');
        }
    }
    spl_autoload_register('cls_autoload');

    $database = db_connect();
    Article::set_database($database);
?>
