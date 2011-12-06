<?php
  require("../../include/common.php");

  $tableNumber = $_GET['tableNumber'];

  $result = query("SELECT playerName, playerRank FROM $tableNumber ORDER BY playerRank ASC");
  $numRows = mysql_num_rows($result);
  $arrayOfPlayers = array();

  for ($i = 0; $i < $numRows; $i++)
  {
    $row = mysql_fetch_array($result);
    $arrayOfPlayers[$row['playerRank']] = $row['playerName'];
  }

  echo json_encode($arrayOfPlayers);

?>
