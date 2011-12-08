<?php
  // ensure user is still logged in and that helpers are included
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

    // refresh the list of players in the select fields
    refreshPlayersList();
  });

  // refreshes the list of players in the select fields
  function refreshPlayersList()
  {
    // load players into select lists, setting HTML 'value' property
    // as the player's rank and the text displayed as the player's
    // name
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
        $('.playerOptions').html(output); // place output into select fields
      });
    $('.playerOptions').val('0'); // make sure the selected value is back to '-- Select Player --'
  }

  // do not submit forms on enter (make user press button
  // to prevent accidental submittions)
  $('input').keypress(function(e) {
    if(e.which == 13)
    {
      e.preventDefault();
    }
  });

  // adds player at the bottom of the leaderboard
  function addPlayer()
  {
    $('#loader').fadeIn(100); // show load animation
    var name = $('#addPlayerName').val(); // get player name to add
    $.get("ajax/addPlayer2.php", { playerName: name, tableNumber: leaderboardTableNumber }) // send player's name and which table to add him/her to via Ajax
      .error(function() { $('#loader').fadeOut(100); alert('Sorry. There was an error with the connection.'); })
      .success(function() {
	displayMessageManual(''+name+' was successfully added.', 'success'); // display success message
	$('#addPlayerName').val(''); // reset form to blank
	$('#loader').fadeOut(100); // hide load animation
	refreshPlayersList();
      });

  }

  // updates the rank of players depending on who beats whom
  function updatePosition()
  {
    $('#loader').fadeIn(100); // show load animation
    var winnerRank1 = $('#winner').val(); // get rank of winner
    var loserRank1 = $('#loser').val(); // get rank of loser
    $.get("ajax/updatePosition2.php", { winnerRank: winnerRank1, loserRank: loserRank1, tableNumber: leaderboardTableNumber }) // submit data to PHP page
      .error(function() { $('#loader').fadeOut(100); alert('Sorry. There was an error with the connection.'); })
      .success(function() {
        displayMessageManual("Positions were successfully updated.", 'success'); // display success message
	$('#loader').fadeOut(100); // hide load animation
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
