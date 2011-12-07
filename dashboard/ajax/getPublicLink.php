<?php
  require("../../include/common.php");
  
  $tableNumber = $_GET['tableNumber'];

  $result = query("SELECT publicLink FROM {$_SESSION['id']}OwnedLeaderboards WHERE tableName = '$tableNumber'");
  $row = mysql_fetch_row($result);

  // return public link for chosen leaderboard
  echo $row[0];
?>
