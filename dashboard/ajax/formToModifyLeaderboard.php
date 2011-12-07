<?php
  require("../../include/common.php");
?>

<script type = 'text/javascript'>
  // when all code is loaded
  $(document).ready(function() {
    // align all tables to center and padding to default
    $('table').attr('align', 'center').attr('cellpadding', '7');

    // set <hr> width to 80%
    $('hr').attr('width', '80%');

    // show which board is being modified
    $('#boardToModify').html("Modifying <em>" + leaderboardName + "</em>");

    // set select field width and font size
    $('select').css('width', '160px').css('font-size', '1.5em');


    refreshPlayersList();
  });

  function refreshPlayersList()
  {
    // load players into select lists
    output = "";
    output += "<option value = '0'>-- Select Player --</option>\n";
    $.getJSON('ajax/playerList.php', { tableNumber: leaderboardTableNumber })
      .error(function() { alert('Sorry. There was an error loading players in this leaderboard. Please check your connection and try again.'); })
      .success(function(data) {
        $.each(data, function(playerRank, playerName) {
          output += "<option value = '" + playerRank + "'>";
	  output += playerRank;
	  output += ". ";
          output += playerName;
          output += "</option>\n";
        });
        $('.playerOptions').html(output);
      });
    $('.playerOptions').val('0');
  }

  // do not submit forms on enter (make user press button
  // to prevent accidental submittions
  $('input').keypress(function(e) {
    if(e.which == 13)
    {
      e.preventDefault();
    }
  });

  // add's player at the bottom of the leaderboard
  function addPlayer()
  {
    var name = $('#addPlayerName').val();
    $.get("ajax/addPlayer2.php", { playerName: name, tableNumber: leaderboardTableNumber })
      .error(function() { alert('Sorry. There was an error with the connection.'); })
      .success(function() {
	displayMessageManual(''+name+' was successfully added.');
	$('#addPlayerName').val('');
	refreshPlayersList();
      });

  }

  function updatePosition()
  {
    var winnerRank1 = $('#winner').val();
    var loserRank1 = $('#loser').val();
    $.get("ajax/updatePosition2.php", { winnerRank: winnerRank1, loserRank: loserRank1, tableNumber: leaderboardTableNumber })
      .error(function() { alert('Sorry. There was an error with the connection.'); })
      .success(function() {
        displayMessageManual("The result was successfully added."); 
	refreshPlayersList();
      });
  }
</script>

<style>
  table, input
  {
    font-size:20px;
  }

  td
  {
    vertical-align:middle;
    border:1px;
  }
</style>

<h2 id = 'boardToModify'></h2>

<table>
  <tr>
    <form id = 'addPlayer'>
      <input type = 'hidden' name = 'type' value = 'addPlayer'>
      <td>Player Name</td>
      <td><input id = 'addPlayerName' type = 'text'></td>
      <td><?= getButtonAuto("javascript: addPlayer();", "addPlayerButton", "Add Player", "18"); ?></td>
    </form>
  </tr>
</table>
  
<hr>

<table>
  <tr>
    <form id = 'updatePosition'>
      <input type = 'hidden' name = 'type' value = 'updatePosition'>
      <td>
        <select id = 'winner' class = 'playerOptions'></select>
      </td>
      <td>beat</td>
      <td>
        <select id = 'loser' class = 'playerOptions'></select>
      </td>
      <td><?= getButtonAuto("javascript: updatePosition();", "updatePositionButton", "Update Position", "18"); ?></td>
    </form>
  </tr>
</table>
