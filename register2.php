<?php
    
    require('include/common.php');
    
    // get username and password from form submission and escape them
    $username = mysqlRealEscapeString($_POST['username']);
    $password = $_POST['password'];

    $result = query("SELECT * FROM users WHERE username = '$username'");
    if (mysql_num_rows($result) > 0)
      die('Someone already has that username. Please select another one.');

    $hash = crypt($password);
    query("INSERT INTO users (username, hash) VALUES ('$username', '$hash')");

    $result = query("SELECT * FROM users WHERE username = '$username'");
    $row = mysql_fetch_array($result);
    echo "You are now signed up!. Please login at the <a href = 'login'>next page</a>.";

?>
