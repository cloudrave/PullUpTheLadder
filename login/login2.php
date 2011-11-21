<?php
    
    require('../include/common.php');
    
    // get username and password from form submission and escape them
    $username = mysqlRealEscapeString($_POST['username']);
    $password = $_POST['password'];

    $result = query("SELECT * FROM users WHERE username = '$username'");

    $row = mysql_fetch_array($result);

    $hash = $row['hash'];

    if (crypt($password, $hash) == $hash)
      echo "password correct";
    else
      echo "invalid password!";
?>
