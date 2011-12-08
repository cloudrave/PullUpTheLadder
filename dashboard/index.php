<?php
    // ensure user is logged in and that helpers are included
    require("../include/common.php");
    
    // set navbar button width and font size
    $navbarButtonWidth = 200;
    $navbarButtonFontSize = 18;
?>

<!DOCTYPE html>
  <head>
    <?= defaults(); /* include default scripts and sheets */ ?>
    <?php
      // if a leaderboard has just been created,
      // show success message and clear address bar to
      // Dashboard page.
      if (isset($_GET['leaderboardCreated']))
      {
        // get leaderboard name
        $newLeaderboard = $_GET['leaderboardCreated'];
	$newLeaderboard = stripslashes($newLeaderboard);
	// display success message
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
      /* This function displays a message of either type
         'error' or 'success' and hides the message after
	 a while */
      function displayMessageManual(message, type)
      {
        // first, hide any messages that are currently displayed
	hideMessage();

        // apply either 'errorMessage' or 'successMessage' class,
	// depending on type of message
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
      
      /* This function hides immediately any message that is
         being displayed. */
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
      </div>
      <div class = 'topRight'>
        <?= getButtonManual("../logout2.php", "logoutButton", "Logout", "15", "70", "25"); ?>
      </div>
    </div>
  </body>
</html>
