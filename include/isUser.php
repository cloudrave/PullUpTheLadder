<?php
    
    include('helpers.php');

    $result = query("SELECT * FROM users WHERE username = '{$_GET['username']}'");

    if(mysql_num_rows($result) > 0)
        $isUser = true;
    else
        $isUser = false;

    echo json_encode(array('status' => $isUser));
    
?>
