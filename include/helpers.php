<?php
    require_once("constants.php");
    //$x = "~jharvard/AnyLadder";
    
    // Connect to SQL host and select database.
    function connect()
    {
        mysql_connect('localhost','jharvard','crimson') or die('Unable to connect to databse');
        mysql_select_db('jharvard_ladderProject') or die('Unable to select database');
    }

    // Disconnect from SQL host.
    function disconnect()
    {
        mysql_close() or die('Unable to disconnect from database');
    }

    // Query database and return result.
    function query($query)
    {
        $result = mysql_query($query) or die('There was an error obtaining some information.');
        return $result; 
    }

    // Return default script and style inclusions.
    function defaults()
    {
        return "<link rel='stylesheet' type='text/css' href='/~jharvard/AnyLadder/include/style.css' />\n".
            "<script type='text/javascript' src='/~jharvard/AnyLadder/include/jQuery.js'></script>\n";
    }
?>
