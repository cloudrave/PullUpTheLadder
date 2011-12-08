<?php
  // ensure user is logged in and helpers are included
  require("../../include/common.php");

  // get table number from passed-in GET data
  $tableNumber = $_GET['tableNumber'];

  /* load in players' names and ranks into $arrayOfPlayers */
  $result = query("SELECT playerName, playerRank FROM $tableNumber ORDER BY playerRank ASC");
  $numRows = mysql_num_rows($result);
  $arrayOfPlayers = array();

  // iterate through all players, loading in names and ranks
  for ($i = 0; $i < $numRows; $i++)
  {
    $row = mysql_fetch_array($result);
    $arrayOfPlayers[$row['playerRank']] = $row['playerName'];
  }
  
  // encode data in JSON format for the calling Ajax function to read
  // properly
  echo json_encode($arrayOfPlayers);

?>
