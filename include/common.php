<?
	//require_once("apologize.php");
	require_once("constants.php");
	require_once("helpers.php");
	//require_once("other shit");
    
    session_start();

    // verify that user is logged in for most pages
    if(!preg_match("{/(:?go)\d*\.php$}", $_SERVER['PHP_SELF']) && !isset($_SESSION['id']))
      header("Location: /".$ROOT_ADDRESS."/go.php");

?>
