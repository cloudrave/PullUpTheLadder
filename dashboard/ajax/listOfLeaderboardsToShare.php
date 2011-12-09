<?php
    require("../../include/common.php");
?>

<script type = 'text/javascript'>
  function shareLeaderboard(table_num, table_name)
  {
    $('#loader').fadeIn(100);

    var sharingUsername1 = $('#sharingUsername').val();
    $.get("ajax/shareLeaderboard2.php", { tableNumber: table_num, sharingUsername: sharingUsername1 })
      .error(function() {
        alert('Sorry. There was an error. Please try again.');
	$('#loader').hide();
      })
      .success(function() {
        $('#loader').fadeOut(100);
        displayMessageManual("<em>" + table_name +"</em> has been successfully shared.", "success");
      });
  }
</script>

<h2>
  <?php
    // iterate through all leaderboards for user and print them with links to the screen like below
    $result = query("SELECT name, tableName FROM {$_SESSION['id']}OwnedLeaderboards ORDER BY timeCreated DESC");
    $numRows = mysql_num_rows($result);
    if ($numRows > 0)
      echo "Type in a user's email address and choose which leaderboard to share with them.";
    else
      echo "You have not created any leaderboards yet. To share a leaderboard, first <a href = \"javascript: $('#createNewLeaderboardButton').trigger('click');\">create one</a>.";
  ?>
</h2>

<div style = "font-size: 17px;">
  <table cellpadding = '5' align = 'center'>
    <tr>
      <td>User's Email</td>
      <td><input style = "font-size: 17px;" id = 'sharingUsername' type = 'text'></td>
    </tr>
  </table>
</div>

<div class = 'leaderboardList'>
<?php
   if ($numRows > 0)
     echo "<ul>";
   for ($i = 0; $i < $numRows; $i++)
   {
     $row = mysql_fetch_row($result);
     echo "<li><a href = 'javascript: shareLeaderboard(\"{$row[1]}\", \"".htmlspecialchars($row[0], ENT_QUOTES)."\");'>";
     echo $row[0];
     echo "</a></li>";
   }
   if ($numRows > 0)
     echo "</ul>";
?>
</div>

<p style = 'padding-left: 10px; padding-right: 10px; text-align: left;'><em>Note: Sharing a leaderboard will give access to whomever you specify above. They will be able to modify your leaderboard at any time.</em></p>
