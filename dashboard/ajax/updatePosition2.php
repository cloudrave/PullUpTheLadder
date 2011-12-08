<?php
  // ensure user is logged in and that helpers are included
  require("../../include/common.php");

  $winnerRank = mysqlRealEscapeString($_GET['winnerRank']);
  $loserRank = mysqlRealEscapeString($_GET['loserRank']);
  $tableNumber = mysqlRealEscapeString($_GET['tableNumber']);

  // if loser's rank is lower than or equal
  // (greater than or equal in terms of numbers)
  // than winner's rank, do nothing
  if ($loserRank >= $winnerRank)
    die('Winner must beat someone with better rank to update leaderboard.');

  // find loser's id
  $result = query("SELECT * FROM $tableNumber WHERE playerRank = $loserRank");
  $loserData = mysql_fetch_array($result);
  $loserID = $loserData['id'];
  
  // find winner's id
  $result = query("SELECT * FROM $tableNumber WHERE playerRank = $winnerRank");
  $winnerData = mysql_fetch_array($result);
  $winnerID = $winnerData['id'];

  // set winner's rank as loser's old rank
  $result = query("UPDATE $tableNumber SET playerRank = $loserRank WHERE id = $winnerID");
  $winnerOldRank = $winnerRank; // remember winner's old rank
  $winnerRank = $loserRank;

  // move everyone below winner's rank (with higher rank #)
  // down the ladder one position (by increasing rank # by 1)
  $result = query("UPDATE $tableNumber SET playerRank = playerRank + 1 WHERE playerRank > $winnerRank AND playerRank < $winnerOldRank"); // move everyone else down
  $result = query("UPDATE $tableNumber SET playerRank = playerRank + 1 WHERE id = $loserID"); // move loser down
  
?>
