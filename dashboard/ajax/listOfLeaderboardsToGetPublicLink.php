<?php
    require("../../include/common.php");
?>

<script type = 'text/javascript'>
  function displayLeaderboardPublicLink(table_num, table_name)
  {
    $('#loader').fadeIn(100);
    $('#linkArea').fadeOut(200);
    $.get("ajax/getPublicLink.php", { tableNumber: table_num })
      .error(function() {
        alert('Sorry. There was an error. Please try again.');
        $('#loader').hide();
      })
      .success(function(data) {
        var link = "http://www.pulluptheladder.com/display.php?code=" + data;
        $('#linkArea').html("Your public link for <em>" + table_name + "</em> is: <a href = \"" + link + "\"><br />" + link + "</a>").fadeIn(200);
	$('#loader').fadeOut(100);
      });
  }
</script>

<h2>
  <?php
    // iterate through all leaderboards for user and print them with links to the screen like below
    $result = query("SELECT name, tableName FROM {$_SESSION['id']}OwnedLeaderboards ORDER BY timeCreated DESC");
    $numRows = mysql_num_rows($result);
    if ($numRows > 0)
      echo "Choose Leaderboard to Obtain a Public Link";
    else
      echo "You have not created any leaderboards yet. To get public links for a leaderboard, first <a href = \"javascript: $('#createNewLeaderboardButton').trigger('click');\">create one</a>.";
  ?>
</h2>
<h3 id = 'linkArea'></h3>
<div style = 'text-align:left; padding-left:10px; padding-right:10px;'>
<?php
   if ($numRows > 0)
     echo "<ul>";
   for ($i = 0; $i < $numRows; $i++)
   {
     $row = mysql_fetch_row($result);
     echo "<li><a href = 'javascript: displayLeaderboardPublicLink(\"{$row[1]}\", \"".htmlspecialchars($row[0], ENT_QUOTES)."\");'>";
     echo $row[0];
     echo "</a></li>";
   }
   if ($numRows > 0)
     echo "</ul>";
?>
</div>
