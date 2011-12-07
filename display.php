<?php
  require("include/helpers.php");

  // get publicLink / code from browser link to determine which
  // table to display
  $code = $_GET['code'];

  // find which table number matches the code
  $result = query("SELECT * FROM allLeaderboards WHERE publicLink = $code");
  $row = mysql_fetch_array($result);
  $tableNumber = $row['tableNumber'];
  preg_match("/^[0-9]*/", $tableNumber, $matches);
  $userID = $matches[0];

  // get leaderboard name
  $result = query("SELECT * FROM {$userID}OwnedLeaderboards WHERE tableName = '$tableNumber'");
  $row = mysql_fetch_array($result);
  $leaderboardName = $row['name'];

  // get important data from database and store in PHP arrays
  $playersByRank = Array();
  $result = query("SELECT * FROM $tableNumber ORDER BY playerRank ASC");
  while($table = mysql_fetch_array($result))
  {
    $playerRank = $table['playerRank'];
    $playersByRank[$playerRank] = $table['playerName'];
  }
?>

<!DOCTYPE html>
  <head>
    <title><?php echo "$NAME_OF_SITE | $leaderboardName"; ?></title>
    <?= defaults(); ?>
    <style>
      #tableContainer
      {
        padding-bottom:50px;
      }
      table
      {
        background-color:#000;
	color:#FFF;
	font-size:1.5em;
      }
      .footer
      {
        text-align:center;
	position:fixed;
	width:100%;
	padding-top:5px;
	padding-bottom:5px;
	margin:0 auto;
	bottom:10px;
	background-color:#003;
	color:#FFF;
      }
    </style>
  </head>

  <body>
    <div class = 'page'></div>
    <div class = 'footer'>
      leaderboard provided by <a href = "http://www.pulluptheladder.com"><span style = "font-size:1.25em; font-variant:small-caps; color:#FFF;">www.pulluptheladder.com</span></a>
    </div>
    <h1><?= $leaderboardName; ?></h1>
    <div id = 'tableContainer'>
      <table align = 'center' cellpadding = '5'>
        <tr>
          <th>Rank</th>
  	<th>Name</th>
        </tr>
        <?php
          $numPlayers = count($playersByRank);
          for ($i = 1; $i <= $numPlayers; $i++)
  	{
            echo "
  	    <tr>
  	      <td style = 'text-align:center;'>$i</td>
  	      <td style = 'font-variant:small-caps;'>$playersByRank[$i]</td>
  	    </tr>
  	  ";
  	}
        ?>
      </table>
    </div>
  </body>
</html>
