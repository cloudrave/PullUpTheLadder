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

<form id = 'addPlayer'>
  <input type = 'hidden' name = 'type' value = 'addPlayer'>
    <tr>
      <td>Player Name</td>
      <td><input name = 'addPlayerName'></td>
    </tr>
    <tr>
      <td colspan = 2>
        <?= getButtonAuto("javascript: addPlayer();", "addPlayerButton", "Add Player", "18"); ?>
      </td>
    </tr>
  </table>
</form>

<br />

<form id = 'updatePosition'>
  <table>
    <tr>
     <td></td>
    </tr>
  </table>
</form>
