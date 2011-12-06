<?php
    require("../../include/common.php");

    $playerName = $_GET['playerName'];
    $tableNumber = $_GET['tableNumber'];
    
    echo "add $playerName to $tableNumber";

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

    $result = query("INSERT INTO $tableNumber (playerName, playerRank) VALUES ('$playerName', $rank)");
?>
