<?php
    require_once("constants.php");
    
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
        connect();
        $result = mysql_query($query) or die('There was an error obtaining some information.');
        disconnect();
        return $result; 
    }

    // Return mysql_real_escape_string
    function mysqlRealEscapeString($input)
    {
        connect();
        return mysql_real_escape_string($input);
        disconnect();
    }

    // Return default script and style inclusions.
    function defaults()
    {
        return "<link rel='stylesheet' type='text/css' href='/~jharvard/AnyLadder/include/style.css' />\n".
            "<script type='text/javascript' src='/~jharvard/AnyLadder/include/jQuery.js'></script>\n";
    }

    // Return link to button image from dabuttonfactory.com with specified width and height
    function getButtonLinkManual($text, $fontSize, $width, $height)
    {
        $text = urlencode($text);
        return 'http://dabuttonfactory.com/b?t='.$text.'&f=Calibri-Bold&ts='.$fontSize.'&tc=ffffff&tshs=1&tshc=222222&it=png&c=3&bgt=gradient&bgc=4477cc&ebgc=223388&bs=1&bc=569&w='.$width.'&h='.$height;
    }

    // Return button image link from dabuttonfactory.com without specified width or height
    function getButtonLinkAuto($text, $fontSize)
    {
        $text = urlencode($text);
        return 'http://dabuttonfactory.com/b?t='.$text.'&f=Calibri-Bold&ts='.$fontSize.'&tc=ffffff&tshs=1&tshc=222222&it=png&c=3&bgt=gradient&bgc=4477cc&ebgc=223388&bs=1&bc=569&vp=11&hp=20';
    }
?>
