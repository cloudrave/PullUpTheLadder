<?
	require_once("apologize.php");
	require_once("constants.php");
	//require_once("helpers.php");
	//require_once("other shit");
	
	// make connection to database
	$con = mysql_connect("localhost","bbclip55_other","starcraft");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	// some code
	
	
	// verify that session user id is set and is valid

?>