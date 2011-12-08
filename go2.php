<?php
    // include common code (helpers, etc.)    
    require('include/common.php');
    
    // validate information
    if (!preg_match('/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/', $_POST['username']) ||
        !preg_match('/^.{6,16}$/', $_POST['password']))
      die('Sorry. There was an error. Please try again.'); // if there was an error here, user must have modified client-side javascript code and is trying to hack, so don't give a helpful error message

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

      // check to see if someone already has this username
      $result = query("SELECT * FROM users WHERE username = '$username'");
      if (mysql_num_rows($result) > 0)
        die('Someone already has that username. Please select another one.');

      // encrypt password and store user in database
      $hash = crypt($password);
      query("INSERT INTO users (username, hash) VALUES ('$username', '$hash')");

      // get user id and store in session
      $result = query("SELECT * FROM users WHERE username = '$username'");
      $row = mysql_fetch_array($result);
      $_SESSION['id'] = $row['id'];

      // now that user has an id, create a table that will contain
      // all the leaderboards that that user owns
      $result = query("CREATE TABLE  `bbclip55_pulluptheladder`.`{$_SESSION['id']}OwnedLeaderboards` (
      `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
      `timeCreated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
      `name` VARCHAR( 255 ) NOT NULL ,
      `tableName` VARCHAR(255) NOT NULL ,
      `permissions` INT NOT NULL ,
      `publicLink` VARCHAR(255) NOT NULL ,
      PRIMARY KEY (  `id` )
      );");
     
      // transfer user to dashboard
      header("Location: dashboard");
    }
    elseif ($_POST['typeOfForm'] == 'login') /* if form is for login, login user */
    {
      // get username and password from form submission and escape them
      $username = mysqlRealEscapeString($_POST['username']);
      $password = $_POST['password'];

      // select user from database
      $result = query("SELECT * FROM users WHERE username = '$username'");

      // if user doesn't exist, alert user
      if (mysql_num_rows($result) != 1)
        die('Please enter a valid username');
      
      $row = mysql_fetch_array($result);
            
      $hash = $row['hash'];
      
      // see if user's password matches enterd password
      if (crypt($password, $hash) != $hash)
      {
        die('Invalid Password!');
      }
      
      // apply id to session and transfer user to dashboard
      $_SESSION['id'] = $row['id'];
      header("Location: dashboard");
    }
?>
