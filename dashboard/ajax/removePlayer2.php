<?php
    // ensure user is logged in and that helpers are included
    require("../../include/common.php");
    
    // load in data, including player name and which leaderboard
    // to remove him from
    $playerRank = $_GET['playerRank'];
    $tableNumber = mysqlRealEscapeString($_GET['tableNumber']);
    
    // remove player
    $result = query("DELETE FROM $tableNumber WHERE playerRank = $playerRank");
     
    // decrement all following player's ranks by 1
    $result = query("UPDATE $tableNumber SET playerRank = playerRank - 1 WHERE playerRank > $playerRank");
?>
