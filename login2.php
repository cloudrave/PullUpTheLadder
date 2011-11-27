<?php
    
    require('../include/common.php');
    
    // get username and password from form submission and escape them
    $username = mysqlRealEscapeString($_POST['username']);
    $password = $_POST['password'];

    $result = query("SELECT * FROM users WHERE username = '$username'");

    if (mysql_num_rows($result) != 1)
        die('Please enter a valid username');
    
    $row = mysql_fetch_array($result);

    $hash = $row['hash'];

    if (crypt($password, $hash) != $hash)
    {
        die('Invalid Password!');

    }
    
    $_SESSION['id'] = $row['id'];
    header("Location: ../dashboard");
?>
