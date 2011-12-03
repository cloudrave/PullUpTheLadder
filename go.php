<?php
    require("include/common.php");
?>
<!DOCTYPE html>
  <head>
    <?= defaults(); ?>
    <script type = 'text/javascript'>
      function submitForm()
      {
        // hide all error messages
        $('.formError').hide();

        /* validate form */
        // check valid email entered in email field
        var email = $('#user_email').val(); 
        var emailMatch = email.match(/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/);
       
        // check valid password entered in password1 field
        var password1 = $('#user_password').val();
        var password1Match = password1.match(/^.{6,16}$/);

        // display error message and return if invalid
        if (emailMatch == null)
          $('#userEmailError').html("Please enter a valid email address.").fadeIn(200);
        if (password1Match == null)
          $('#userPassword1Error').html("Please enter password between 6 and 16 characters.").fadeIn(200);
        if (emailMatch == null || password1Match == null)
        {
          return;
        }

        // determine whether user already exists
        var username = encodeURIComponent($('#user_email').val());
        $.getJSON('ajax/isUser.php?username=' + username)
          .error(function() { alert('Sorry. There was an error. Please try again.'); })
          .success(function(data) {
            $.each(data, function(key, val) {
              if(key == 'status')
              {
                if (!confirmationIsShown)
                {
                  if (val == true) // if user already exists, submit login form
                  {
                    // however, if password is incorrect, display error instead
                  /*  var newInput = $('<input>').attr('type','hidden').attr('name','typeOfForm').val('login');
                    $('form').append($(newInput));
                    $.post('go2.php', $('form').serialize())
                      .error(function() { alert('Sorry. There was an error. Please try again.'); })
                      .success(function(data) {
                        alert(data);
                        if (data == "Invalid Password!")
                        {
                          $('#password1Error').html("Invalid password. Please try again.").fadeIn(200);
                          return;
                        }
                        }); */

                    // submit login form
                    var newInput = $('<input>').attr('type','hidden').attr('name','typeOfForm').val('login');
                    $('form').append($(newInput));
                    $('form').submit();
                  }
                  else // if user does not exist, show confirmation field
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
                  // check that password2 matches password1
                  var password1 = $('#user_password').val();
                  var password2 = $('#password_confirmation').val();
                  // display error message if passwords don't match
                  if (password2 != password1)
                  {
                    $('#userPassword2Error').html("Please enter matching passwords.").fadeIn(200);
                    return;
                  }

                  // submit form
                  var newInput = $('<input>').attr('type','hidden').attr('name','typeOfForm').val('register');
                  $('form').append($(newInput));
                  $('form').submit();
                }
              }
          });
        });

        // submit form
//        $('form').submit();
      }
      
      $(document).ready(function() {
        
        /* Immediately set initial conditions */
        // update classes
        $('input').addClass('unfocused');
        $('#submit_button_image').addClass('default');
        // clear all fields
        $('input').val('');
        // set labels and errors to not display
        $('label').css('display','none');
        $('.formError').css('display','none');
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
        $labelSpacing = 57;
        $firstLabelTop = 19;
        $secondLabelTop = $firstLabelTop + 1*$labelSpacing;
        $thirdLabelTop = $firstLabelTop + 2*$labelSpacing;
        $labelXOffset = 105;
        $tableCellPadding = 3;

        $formLeftOfCenter = $inputWidth/2 + 35;
      ?>
    
      form
      {
          position:absolute;
          margin-left:50%;
          left:-<?= $formLeftOfCenter ?>px;
          top:270px;
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

      .formError
      {
          position:absolute;
          margin-left:50%;
          left:122px;
          width:320px;
          color:#D02;
          text-align:left;
      }

      label#user_email_label
      {
          top:<?= $firstLabelTop ?>px;
      }

      #userEmailError
      {
          top:<?= $firstLabelTop ?>px;
      }

      label#user_password_label
      {
          top:<?= $secondLabelTop ?>px;
      }

      #userPassword1Error
      {
          top:<?= $secondLabelTop ?>px;
      }

      label#password_confirmation_label
      {
          top:<?= $thirdLabelTop ?>px;
      }

      #userPassword2Error
      {
          top:<?= $thirdLabelTop ?>px;
      }

      img.default
      {
          opacity:1.0;
      }

      img.mouseOver
      {
          opacity:1.0;
      }
    </style>
    <title><?= $NAME_OF_SITE ?> | Your Leaderboard Solution</title>
  </head>
  <body>
    <div class = 'page'></div>
    <noscript><p style = "font-size:1.4em;"><b>Please enable JavaScript for this site to work properly.</b></p></noscript>
    <div id = 'mainView' style = "text-align:center; display:none;">
    <img style = "position:relative; top:15px;" src = 'images/logo.png' />
    <br />
    <h1>Your Leaderboard Solution</h1>
    <h2>Please enter your information below to begin.</h2>
    <div>
      <form id = 'registrationForm' action = 'go2.php' method = 'post'>
        <table cellpadding = '<?= $tableCellPadding ?>'>
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
              <td><a href = 'javascript: submitForm();'>
                <img id = 'submit_button_image' src = "<?= getButtonLinkManual('Go', 24, 150, 50) ?>" />
                <img style = "display:none;" id = 'signup_button_image' src = "<?= getButtonLinkManual('Sign Up', 24, 180, 50) ?>" />
              </a></td>
            </div>
          </tr>
        </table>
        <div class = 'formError' id = 'userEmailError'></div>
        <div class = 'formError' id = 'userPassword1Error'></div>
        <div class = 'formError' id = 'userPassword2Error'></div>
        </table>
      </form>
    </div>
    </div>
  </body>
</html>
