<?php
	﻿/*function apologize($message)
    {
        // require template
        require_once("apologize.php");

        // exit immediately since we're apologizing
        exit;
    }*/
	echo "hiiiiiadsfljkadsfljkfsdljk";
	function connect()
	{
		$username="bbclip55_other";
		$password="starcraft";
		$database="bbclip55_ladder";
		
		$con = mysql_connect("localhost",$username,$password);
		@mysql_select_db($database) or die( "Unable to select database");
	}
	
	function disconnect()
	{
		mysql_close($con);
	}
	
	function query($query)
	{
		connect();
		mysql_query($query, $con);
		disconnect();
	}
?>