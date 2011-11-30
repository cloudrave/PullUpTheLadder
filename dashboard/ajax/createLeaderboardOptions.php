<?php
    require("../../include/helpers.php");
?>

<h2>Create New Leaderboard</h2>
<div>
<p>
    <?= getButtonManual("javascript: replaceWithAjax('#mainBody', 'ajax/formToCreateNewLeaderboardWithPointSystem.php', 200);", "createNewLeaderboardWithPointSystemButton", "with Point System", "18", "250", "35"); ?> 
    <?= getButtonManual("javascript: replaceWithAjax('#mainBody', 'ajax/formToCreateNewLeaderboardWithoutPointSystem.php', 200);", "createNewLeaderboardWithoutPointSystemButton", "without Point System", "18", "250", "35"); ?> 
</p>
</div>
