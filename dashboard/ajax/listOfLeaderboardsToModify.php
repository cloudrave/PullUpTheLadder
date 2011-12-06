<?php
    require("../../include/common.php");
?>

<script type = 'text/javascript'>
  function displayModifyLeaderboardOptions(tableNum)
  {
    tableNumber = tableNum;
    replaceWithAjax('#mainBody', 'ajax/modifyLeaderboardOptions.php', 200);
  }
</script>

<h2>
  <?php
    // iterate through all leaderboards for user and print them with links to the screen like below
    $result = query("SELECT name, tableName FROM {$_SESSION['id']}OwnedLeaderboards ORDER BY timeCreated DESC");
    $numRows = mysql_num_rows($result);
    if ($numRows > 0)
      echo "Choose Leaderboard to Modify";
    else
      echo "You have not created any leaderboards yet. To modify a leaderboard, first <a href = \"javascript: $('#createNewLeaderboardButton').trigger('click');\">create one</a>.";
  ?>
</h2>
<div style = 'text-align:left; padding-left:10px; padding-right:10px;'>
<?php
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
