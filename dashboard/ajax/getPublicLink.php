<?php
  // ensure user is still logged in and that helpers are included
  require("../../include/common.php");
  
  // get table number from passed in data
  $tableNumber = mysqlRealEscapeString($_GET['tableNumber']);

  // lookup the public link
  $result = query("SELECT publicLink FROM {$_SESSION['id']}OwnedLeaderboards WHERE tableName = '$tableNumber'");
  $row = mysql_fetch_row($result);

  // return public link for chosen leaderboard
  echo $row[0];
?>
