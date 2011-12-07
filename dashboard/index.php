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
        $newLeaderboard = $_GET['leaderboardCreated'];
	$newLeaderboard = stripslashes($newLeaderboard);
        $message = "You have successfully created a new leaderboard ($newLeaderboard).";
        echo "
        <script type = 'text/javascript'>
          function displayMessage()
          {
	     displayMessageManual('$message', 'success');
	     history.pushState({foo:'bar'}, 'page 2', '.');
          }
        </script>
        ";
      }
      else
      {
        echo "
        <script type = 'text/javascript'>
          function displayMessage()
          {
            // essentially do nothing
          }
        </script>
        ";
      }
    ?>
    <script type = 'text/javascript'>
      function displayMessageManual(message, type)
      {
	hideMessage();

        if (type == 'error')
	{
	  $('#message').addClass('errorMessage');
	}
	else if (type == 'success')
	{
	  $('#message').addClass('successMessage');
	}

	// show message briefly
	$('#message').html(message);
	$('#message').fadeIn(200).delay(5000).fadeOut(500);
      }

      function hideMessage()
      {
        $('#message').stop(false, true).hide();
      }
    </script>
    <script type = 'text/javascript'>
      
      $(document).ready(function() {
        // when everything is loaded...
        $(window).load(function() {
          // fade in page
          $('#mainView').fadeIn(200, displayMessage());
        });

	// add click function to certain buttons
        $('#createNewLeaderboardButton').click(function() {
	  replaceWithAjax('#mainBody', 'ajax/createLeaderboardOptions.php', 200);
        });

	// make message's default class 'success'
	$('#message').addClass('successMessage');
      });
    </script>
    
    <style>
      /* insert any additional CSS here */
    </style>

    <title><?= $NAME_OF_SITE ?> | Dashboard</title>
    
  </head>
  <body>
    <noscript><p style = "font-size:1.4em;"><b>Please enable JavaScript for this site to work properly.</b></p></noscript>
    <div id = 'mainView' style = "display:none;">
      <div id = 'message'></div>
      <div class = 'page'></div>
      <div class = 'logo'><a href = './'><img src = '../images/logo-small.png' /></a></div>
      <div class = 'right' id = 'rightPage'></div>
      <div class = 'right'>
        <h1>Dashboard</h1>
        <div id = 'loader' style = 'display:none; position:absolute; margin-left:50%; left:-25px; top: 80px;'>
          <!-- image courtesy of preloaders.net -->
          <img src = '../../images/loading.gif' />
        </div>
        <div id = 'mainBody' style = 'text-align:center;'>
          <h2><br />Please select an option to the left.</h2>
        </div>
      </div>
      <div id = 'navbar' class = 'left'>
        <?= getButtonManual("#", "createNewLeaderboardButton", "Create New Leaderboard", "$navbarButtonFontSize", "$navbarButtonWidth", "35"); ?>
        <br />
        <?= getButtonManual("javascript: replaceWithAjax('#mainBody', 'ajax/listOfLeaderboardsToModify.php', 200);", "modifyLeaderboard", "Modify Existing Board", "$navbarButtonFontSize", "$navbarButtonWidth", "35"); ?>
        <br />
        <?= getButtonManual("javascript: replaceWithAjax('#mainBody', 'ajax/listOfLeaderboardsToDisplay.php', 200);", "displayLeaderboard", "Display Existing Board", "$navbarButtonFontSize", "$navbarButtonWidth", "35"); ?>
        <br />
        <?= getButtonManual("javascript: replaceWithAjax('#mainBody', 'ajax/listOfLeaderboardsToGetPublicLink.php', 200);", "getLeaderboardLink", "Get a Board's Public Link", "$navbarButtonFontSize", "$navbarButtonWidth", "35"); ?>
        <br />
        <?= getButtonManual("../account", "myAccountButton", "My Account", "$navbarButtonFontSize", "$navbarButtonWidth", "35"); ?>
      </div>
      <div class = 'topRight'>
        <?= getButtonManual("../logout2.php", "logoutButton", "Logout", "15", "70", "25"); ?>
      </div>
    </div>
  </body>
</html>
