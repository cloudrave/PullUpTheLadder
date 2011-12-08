<?php
    // ensure user is logged in and that helpers are included
    require("../../include/common.php");
    
    // load in data, including player name and which leaderboard
    // to add him to
    $playerName = $_GET['playerName'];
    $tableNumber = mysqlRealEscapeString($_GET['tableNumber']);
    
    // get all players from table to find out what the lowest rank is
    $result = query("SELECT playerRank FROM $tableNumber ORDER BY playerRank DESC");
     
    // assign the rank of the new player
    $numRows = mysql_num_rows($result);
    if ($numRows == 0)
      $rank = 1;
    else
    {
      $row = mysql_fetch_row($result);
      $rank = $row[0] + 1;
    }

    // insert new player into the correct leaderboard with
    // the correct rank
    $result = query("INSERT INTO $tableNumber (playerName, playerRank) VALUES ('$playerName', $rank)");
?>
