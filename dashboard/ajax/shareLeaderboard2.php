<?php
    // ensure user is logged in and that helpers are included
    require("../../include/common.php");
    
    $tableNumber = mysqlRealEscapeString($_GET['tableNumber']);
    $sharingUsername = mysqlRealEscapeString($_GET['sharingUsername']);
    
    // verify existence of leaderboard
    $leaderboard = query("SELECT * FROM {$_SESSION['id']}OwnedLeaderboards WHERE tableName = '$tableNumber'");
    if (mysql_num_rows($leaderboard) == 0)
      die("This leaderboard does not exist.");

    // get leaderboard data
    $row = mysql_fetch_array($leaderboard);
    $leaderboardName = $row['name'];
    $leaderboardPermissions = $row['permissions'];
    $leaderboardPublicLink = $row['publicLink'];
    
    // if user is not the owner of this leaderboard, do not allow the share
    if ($leaderboardPermissions != 0)
      die("You must be the creator of this leaderboard to share it.");

    // verify existence of user
    $user = query("SELECT * FROM users WHERE username = '$sharingUsername'");
    if (mysql_num_rows($user) == 0)
      die("This user does not exist.");

    // get sharing user's id
    $row = mysql_fetch_array($user);
    $userID = $row['id'];
     
    $result = query("INSERT INTO {$userID}OwnedLeaderboards (name, tableName, permissions, publicLink) VALUES ('$leaderboardName', '$tableNumber', 1, '$leaderboardPublicLink')");

    echo "success";
?>
