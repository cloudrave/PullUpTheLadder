<?php
  require("../../include/common.php");
?>

<script type = 'text/javascript'>
  $('input').keypress(function(e) {
    if(e.which == 13)
    {
      e.preventDefault();
      $(this).submitForm();
    }
  });

  function submitForm()
  {
    displayMessageManual('Creating leaderboard . . .', 'error');
    $('form').submit();
  }

  function addPlayer(name)
  {
  }

  function addPlayerWithRank(name, rank)
  {
  }
</script>

<style>
  table, input
  {
    font-size:20px;
  }
</style>

<form method = 'post' action = 'createNewLeaderboard2.php'>
  <table align = 'center'>
    <tr>
      <td>Name of Leaderboard</td>
      <td><input name = 'name'></td>
    </tr>
    <tr>
      <td colspan = 2>
        <?= getButtonAuto("javascript: submitForm();", "submitButton", "Create Leaderboard", "18"); ?>
      </td>
    </tr>
  </table>
  <input type = 'hidden' name = 'type' value = 'withoutPointSystem'>
</form>
