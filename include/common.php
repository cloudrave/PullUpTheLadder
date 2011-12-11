<?
    // include constants
    require_once("constants.php");

    // include helpers
    require_once("helpers.php");
   
    // start or continue session
    session_start();

    // verify that user is not using Opera or Firefox
    $browser = $_SERVER['HTTP_USER_AGENT']; 
    if (preg_match('/Firefox|Opera/', $browser))
      die("Sorry. You must use a standards-compliant browser to see this site. Try using Google Chrome.");

    // verify that user is logged in for most pages
    if(!preg_match("{/(:?go|logout)\d*\.php$}", $_SERVER['PHP_SELF']) && !isset($_SESSION['id']))
      header("Location: http://www.pulluptheladder.com/go.php"); // if not logged in, send user to login page

?>
