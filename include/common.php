<?
    // include constants
    require_once("constants.php");

    // include helpers
    require_once("helpers.php");
   
    // start or continue session
    session_start();

    // verify that user is logged in for most pages
    if(!preg_match("{/(:?go|logout)\d*\.php$}", $_SERVER['PHP_SELF']) && !isset($_SESSION['id']))
      header("Location: http://www.pulluptheladder.com/go.php"); // if not logged in, send user to login page

?>
