<?php
    require("../include/common.php");

    $navbarButtonWidth = 200;
    $navbarButtonFontSize = 18;
?>
<!DOCTYPE html>
  <head>
    <?= defaults(); ?>
    <?php
    if (isset($_GET['leaderboardCreated']))
    {
      $message = $_GET['leaderboardCreated'];
      echo "
      <script type = 'text/javascript'>
        alert('You have successfully created a new leaderboard (' + '$message' + ').');
      </script>
      ";
    }
    ?>
    <script type = 'text/javascript'>
      
      function showCreateLeaderboardOptions()
      {
        replaceWithAjax('#mainBody', 'ajax/createLeaderBoardOptions.php', 500);
      }

      $(document).ready(function() {
        // when everything is loaded, show page
        $(window).bind('load', function() {
          $('#mainView').fadeIn(200);
        });

      });    




    </script>
    <style>
      /* insert any additional CSS here */
    </style>
    <title><?= $NAME_OF_SITE ?> | Dashboard</title>
  </head>
  <body>
    <div id = 'mainView' style = "display:none;">
      <noscript><p style = "font-size:1.4em;"><b>Please enable JavaScript for this site to work properly.</b></p></noscript>
      <div class = 'page'></div>
      <div class = 'logo'><a href = './'><img src = '../images/logo-small.png' /></a></div>
      <div class = 'right' id = 'rightPage'></div>
      <div class = 'right'>
      <h1>Dashboard</h1>
      <div id = 'mainBody' style = 'text-align:center;'>
        <h2><br />Please select an option to the left.</h2>
      </div>
      </div>
      <div id = 'navbar' class = 'left'>
        <?= getButtonManual("javascript: replaceWithAjax('#mainBody', 'ajax/createLeaderboardOptions.php', 200);", "createNewLeaderboardButton", "Create New Leaderboard", "$navbarButtonFontSize", "$navbarButtonWidth", "35"); ?>
        <br />
        <?= getButtonManual("javascript: replaceWithAjax('#mainBody', 'ajax/activeLeaderboards.php', 200);", "modifyLeaderboard", "Modify Existing Board", "$navbarButtonFontSize", "$navbarButtonWidth", "35"); ?>
        <br />
        <?= getButtonManual("../account", "myAccountButton", "My Account", "$navbarButtonFontSize", "$navbarButtonWidth", "35"); ?>
      </div>
      <div class = 'topRight'>
        <?= getButtonManual("../logout2.php", "logoutButton", "Logout", "15", "70", "25"); ?>
      </div>
    </div>
  </body>
</html>
