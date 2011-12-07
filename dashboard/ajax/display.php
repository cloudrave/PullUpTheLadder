<?php
  require("../../include/helpers.php");
  $publicLink = $_GET['code'];

  $result = query("SELECT * FROM allLeaderboards WHERE publicLink = $publicLink");
?>

<!DOCTYPE html>
  <head>
    <?= defaults(); ?>
    <?php
      echo "
        <script type = 'text/javascript'>
	  publicLink = $publicLink;
	</script>
      ";
    ?>
  </head>
  
  <body>
    <h1>This is a leaderboard</h1>
  </body>
</html>
