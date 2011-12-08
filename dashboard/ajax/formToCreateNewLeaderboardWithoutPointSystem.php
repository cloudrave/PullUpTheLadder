<?php
  // ensure user is logged in and include helpers
  require("../../include/common.php");
?>

<script type = 'text/javascript'>
  // ensure that when enter key is pressed, the submitForm()
  // function is called instead of the usual form submission method
  $('input').keypress(function(e) {
    if(e.which == 13)
    {
      e.preventDefault();
      submitForm();
    }
  });

  // before submitting form, display status message
  function submitForm()
  {
    displayMessageManual('Creating leaderboard . . .', 'success');
    $('form').submit();
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
