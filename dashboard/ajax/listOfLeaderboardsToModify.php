<?php
    require("../../include/common.php");
?>

<script type = 'text/javascript'>
  function displayModifyLeaderboardOptions(tableNum)
  {
    tableNumber = tableNum;
    replaceWithAjax('#mainBody', 'ajax/modifyLeaderboardOptions.php', 200);
    alert('this will call replacePageWithAjax() and send the tableNumber in question to the next ajax page.');
  }
</script>

<h2>Choose Leaderboard to Modify</h2>
<div style = 'text-align:left; padding-left:10px; padding-right:10px;'>
<?php
   // iterate through all leaderboards for user and print them with links to the screen like below
   $result = query("SELECT name, tableName FROM {$_SESSION['id']}OwnedLeaderboards ORDER BY timeCreated DESC");
   $numRows = mysql_num_rows($result);
   if ($numRows > 0)
     echo "<ul>";
   for ($i = 0; $i < $numRows; $i++)
   {
     $row = mysql_fetch_row($result);
     echo "<li><a href = 'javascript: displayModifyLeaderboardOptions(\"{$row[1]}\");'>";
     echo $row[0];
     echo "</a></li>";
   }
   if ($numRows > 0)
     echo "</ul>";
?>
</div>
