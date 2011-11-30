<?php
    
    require('include/common.php');
    
    // validate information
    if (!preg_match('/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/', $_POST['username']) ||
        !preg_match('/^.{6,16}$/', $_POST['password']))
      die('Sorry. There was an error. Please try again.');

    /* if form is for registration, register new user */
    if ($_POST['typeOfForm'] == 'register')
    {
      // get username and password from form submission and escape them
      $username = mysqlRealEscapeString($_POST['username']);
      $password = $_POST['password'];
      $passwordConfirmation = $_POST['passwordConfirmation'];
      
      // verify that both passwords match
      if ($password != $passwordConfirmation)
        die('Sorry. You must enter the SAME password twice for confirmation.');

      $result = query("SELECT * FROM users WHERE username = '$username'");
      if (mysql_num_rows($result) > 0)
        die('Someone already has that username. Please select another one.');

      $hash = crypt($password);
      query("INSERT INTO users (username, hash) VALUES ('$username', '$hash')");

      $result = query("SELECT * FROM users WHERE username = '$username'");
      $row = mysql_fetch_array($result);
      $_SESSION['id'] = $row['id'];

      header("Location: dashboard");
    }
    elseif ($_POST['typeOfForm'] == 'login') /* if form is for login, login user */
    {
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
      header("Location: dashboard");
    }
?>
