<?php
    // ensure user is still logged in and that helpers are included
    require("../../include/common.php");
?>

<script>
  // instantly redirect user to the only option to create
  // a leaderboard (without a point/scoring system).
  // (This was originally intended to give the user the option
  //  of choosing whether or not to use a point system for the
  //  leaderboard.)
  replaceWithAjax('#mainBody', 'ajax/formToCreateNewLeaderboardWithoutPointSystem.php', 200);
</script>

<!-- The page is commented out because it is not currently being used. -->
<!--
<h2>Create New Leaderboard</h2>
<div>
<p>
    <?= getButtonManual("javascript: replaceWithAjax('#mainBody', 'ajax/formToCreateNewLeaderboardWithPointSystem.php', 200);", "createNewLeaderboardWithPointSystemButton", "with Point System", "18", "250", "35"); ?> 
    <?= getButtonManual("javascript: replaceWithAjax('#mainBody', 'ajax/formToCreateNewLeaderboardWithoutPointSystem.php', 200);", "createNewLeaderboardWithoutPointSystemButton", "without Point System", "18", "250", "35"); ?> 
</p>
</div>
-->
