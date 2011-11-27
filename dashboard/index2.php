<?php
    require("../include/common.php");
?>
<!DOCTYPE html>
  <head>
    <?= defaults(); ?>
    <script type = 'text/javascript'>
      function submitRegForm()
      {
        if (true)
          $('form').submit();
      }
      $(document).ready(function() {
        
        /* Immediately set initial conditions */
        // update classes
        $('input').addClass('unfocused');
        $('#submit_button_image').addClass('default');
        // clear all fields
        $('input').val('');
        // set labels to not display
        $('label').css('display','none');
        // set animation for when page elements are completely loaded
        $(window).bind('load', function() {
          $('#mainView').fadeIn(200);
          $('label').delay(100).fadeIn(400);
        });
        // allow user to submit form with enter key (maintaining looks of course)
        $('input').keypress(function(e) {
          if(e.which == 13) {
            $(this).blur();
            $('#submit_button_image').removeClass('default').addClass('mouseOver');
            submitRegForm();
          }
        });

        /* if field is selected... */
        $('#user_email').focus(function() {
          // hide label
          $('#user_email_label').hide();
          // change CSS of field to .focused
          $(this).removeClass('unfocused').addClass('focused');
        });
        
        /* if email field is unselected... */
        $('#user_email').blur(function() {
          // ... and field is empty, show label
          if ( !$(this).val() )
            $('#user_email_label').show();
          // change CSS of field to .unfocused
          $(this).removeClass('focused').addClass('unfocused');

        });
        
        /* if password field is selected... */
        $('#user_password').focus(function() {
          // hide label
          $('#user_password_label').hide();
          // change CSS of field to .focused
          $(this).removeClass('unfocused').addClass('focused');
        });
        
        /* if password field is unselected... */
        $('#user_password').blur(function() {
          // and field is empty, show label
          if ( !$(this).val() )
            $('#user_password_label').show();
          // change CSS of field to .unfocused
          $(this).removeClass('focused').addClass('unfocused');
        });

        /*************/

        /* make submit button appetising */
        $('#submit_button_image').mouseover(function() {
          $(this).removeClass('default').addClass('mouseOver');
        });

        $('#submit_button_image').mouseout(function() {
          $(this).removeClass('mouseOver').addClass('default');
        });

      });

    </script>
    <style>
      input
      {
          width:160px;
          padding:10px;
          /*height:30px;*/
          outline:none;
          font-size:20px;
      }

      .focused
      {
          background-color:#FFF;
      }

      .unfocused
      {
          background-color:#EEE;
      }
     
      label#user_email_label
      {
          position:absolute;
          top:75px;
          left:-90px;
          margin-left:50%;
      }

      label#user_password_label
      {
          position:absolute;
          top:129px;
          left:-110px;
          margin-left:50%;
      }

      label
      {
          position:relative;
          width:150px;
          height:40px;
          z-index:1;
          /* top:50px; */
          /* left:50%; */
          margin:0 auto;
          /*margin:12px 0 0 12px;*/
          color:#AAA;
          font-size:20px;
          font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;
          cursor:text;
          text-align:center;
      }

      div.inputWrapper
      {
          text-align:center;
          opacity:0.8;
      }

      img.default
      {
          opacity:0.8;
      }

      img.mouseOver
      {
          opacity:1.0;
      }

    </style>
    <title><?= $NAME_OF_SITE ?> | Your Leaderboard Solution</title>
  </head>
  <body>
    <noscript><p style = "font-size:1.4em;"><b>Please enable JavaScript for this site to work properly.</b></p></noscript>
    <div id = 'mainView' style = "display:none;">
    <h1><?= $NAME_OF_SITE ?> | Your Leaderboard Solution</h1>
    <div class='centeredForm'>
      <form id = 'registrationForm' action = 'register2.php' method = 'post'>
        <table align = 'center'>
          <tr>
            <div align = 'center' class = 'inputWrapper' id = 'email_field_wrapper'>
              <label id = 'user_email_label' for = 'user_email'>Email Address</label>
              <div><td><input id = 'user_email' type = 'text' name = 'username' /></td></div>
            </div>
          </tr>
          <tr>
            <div class = 'inputWrapper' id = 'password_field_wrapper'>
              <label id = 'user_password_label' for = 'user_password'>Password</label>
              <td><input id = 'user_password' type = 'password' name = 'password' /></td>
            </div>
          </tr>
          <tr>
            <div id = 'submit_button_wrapper'>
              <td><a href = 'javascript: submitRegForm()'><img id = 'submit_button_image' src = "<?= getButtonLinkManual('Sign Up', 24, 150, 50) ?>" /></a></td>
            </div>
          </tr>
          <tr>
            <td><a href = 'login'><img src = "<?= getButtonLinkAuto('Login', 12) ?>" /></a></td>
          </tr>
        </table>
      </form>
    </div>
    </div>
  </body>
</html>
