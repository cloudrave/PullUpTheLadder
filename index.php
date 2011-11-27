<?php
    require("include/common.php");
?>
<!DOCTYPE html>
  <head>
    <?= defaults(); ?>
    <script type = 'text/javascript'>
      
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
            submitForm();
          }
        });

        confirmationIsShown = false;

        function submitForm()
        {
          // validate form

          // determine whether user already exists
          var username = encodeURIComponent($('#user_email').val());
          $.getJSON('include/isUser.php?username=' + username)
            .error(function() { alert('Sorry. There was an error. Please try again.'); })
            .success(function(data) {
              $.each(data, function(key, val) {
                if(key == 'status')
                {
                  if (!confirmationIsShown)
                  {
                    if (val == true)
                    {
                      var newInput = $('<input>').attr('type','hidden').attr('name','typeOfForm').val('login');
                      $('form').append($(newInput));
                      $('form').submit();
                    }
                    else
                    {
                      $('#submit_button_image').removeClass('default').addClass('mouseOver');
                      $('#passwordConfirmationRow').fadeIn(400);
                      $('#submit_button_image').slideUp(250);
                      $('#signup_button_image').slideDown(250);
                      $('#password_confirmation').focus();
                      $('#password_confirmation_label').show();

                      confirmationIsShown = true;
                    }
                  }
                  else // if confirmation field is already shown
                  {
                    // validate fields

                    // submit form
                    var newInput = $('<input>').attr('type','hidden').attr('name','typeOfForm').val('register');
                    $('form').append($(newInput));
                    $('form').submit();
                  }
                }
            });
          });

          // submit form
//          $('form').submit();
        }

        /* if email field is selected... */
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

        /* if password confirmation field is selected... */
        $('#password_confirmation').focus(function() {
          // hide label
          $('#password_confirmation_label').hide();
          // change CSS of field to .focused
          $(this).removeClass('unfocused').addClass('focused');
        });
        
        /* if password field is unselected... */
        $('#password_confirmation').blur(function() {
          // and field is empty, show label
          if ( !$(this).val() )
            $('#password_confirmation_label').show();
          // change CSS of field to .unfocused
          $(this).removeClass('focused').addClass('unfocused');
        });

        /* if password field is changed... */
        $('#password_confirmation').keypress(function() {
          $('#password_confirmation_label').hide();
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

      <?php
        $inputWidth = 170;
        $labelSpacing = 56;
        $firstLabelTop = 19;
        $secondLabelTop = $firstLabelTop + 1*$labelSpacing;
        $thirdLabelTop = $firstLabelTop + 2*$labelSpacing;
        $labelXOffset = 106;
        $tableCellPadding = 3;

        $formLeftOfCenter = $inputWidth/2 + 35;
      ?>
    
      form
      {
          position:absolute;
          margin-left:50%;
          left:-<?= $formLeftOfCenter ?>px;
          top:100px;
      }

      input
      {
          width:-<?= $inputWidth ?>px;
          padding:10px;
          height:25px;
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
 
      label
      {
          margin-left:50%;
          left:-<?= $labelXOffset ?>px;
          position:absolute;
          height:40px;
          z-index:1;
          color:#AAA;
          font-size:20px;
          font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;
          cursor:text;
          text-align:left;
      }

      label#user_email_label
      {
          top:<?= $firstLabelTop ?>px;
      }

      label#user_password_label
      {
          top:<?= $secondLabelTop ?>px;
      }

      label#password_confirmation_label
      {
          top:<?= $thirdLabelTop ?>px;
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
    <h2>Please enter your information below.</h2>
    <div class='centeredForm'>
      <form id = 'registrationForm' action = 'go2.php' method = 'post'>
        <table id = 'formTable' cellpadding = '<?= $tableCellPadding ?>' align = 'center'>
          <tr>
            <div class = 'inputWrapper' id = 'email_field_wrapper'>
              <td>
                <label id = 'user_email_label' for = 'user_email'>Email Address</label>
                <input id = 'user_email' type = 'text' name = 'username' />
              </td>
            </div>
          </tr>
          <tr>
            <div class = 'inputWrapper' id = 'password_field_wrapper'>
              <td>
                <label id = 'user_password_label' for = 'user_password'>Password</label>
                <input id = 'user_password' type = 'password' name = 'password' />
              </td>
            </div>
          </tr>
          <tr id = 'passwordConfirmationRow' style = 'display:none'>
            <div class = 'inputWrapper' id = 'password_confirmation_field_wrapper'>
              <td>
                <label id = 'password_confirmation_label' for = 'password_confirmation'>Confirm Password</label>
                <input id = 'password_confirmation' type = 'password' name = 'passwordConfirmation' />
              </td>
            </div>
          </tr>
          <tr>
            <div id = 'submit_button_wrapper'>
              <td><a href = 'javascript: submitRegForm()'><img class = 'button_image' id = 'submit_button_image' src = "<?= getButtonLinkManual('Go', 24, 150, 50) ?>" /><img style = "display:none;" class = 'button_image' id = 'signup_button_image' src = "<?= getButtonLinkManual('Sign Up', 24, 180, 50) ?>" /></a></td>
            </div>
          </tr>
        </table>
      </form>
    </div>
    </div>
  </body>
</html>
