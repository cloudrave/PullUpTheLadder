<?php
    function connect()
    {
        mysql_connect('localhost','jharvard','crimson') or die('Unable to connect to databse');
        mysql_select_db('jharvard_ladderProject') or die('Unable to select database');
    }

    function disconnect()
    {
        mysql_close();
    }

    function query($query)
    {
        $result = mysql_query($query);
        if (!$result)
            die('There was an error obtaining some information.');
        return $result; 
    }
?>
