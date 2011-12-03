<?php
    require("../include/common.php");

    $leaderboardName = $_POST['name'];
?>

<?= defaults(); ?>

<script type = 'text/javascript'>
$(document).ready(function() {
  $('form').submit();
});
</script>

<form action = '../dashboard/' method = 'get'>
  <input type = 'hidden' name = 'leaderboardCreated' value = "<?= htmlspecialchars($leaderboardName) ?>">
</form>
