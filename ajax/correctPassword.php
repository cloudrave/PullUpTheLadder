<?php
    
    include('../include/helpers.php');

    $result = query("SELECT * FROM users WHERE username = '{$_GET['username']}'");
    $row = mysql_fetch_row($result);

    $hash = $row['hash'];

    if ($_ == $hash)
      echo "true";
    else
      echo "false";

    if(mysql_num_rows($result) > 0)
        $isUser = true;
    else
        $isUser = false;

    echo json_encode(array('status' => $isUser));
    
?>
