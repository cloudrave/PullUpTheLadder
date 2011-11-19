<?php
    require("include/common.php");
?>
<!DOCTYPE html>
  <head>
    <?= defaults(); ?>
    <script type = 'text/javascript'>
      function submitRegForm()
      {
        if (true)
          document.getElementById('registrationForm').submit();
      }
      $(document).ready(function() {
       
        $('input').addClass('unfocused');

        /* if email field is selected... */
        $('#user_email').focus(function() {
          // hide label
          $('#user_email_label').hide();
          // change CSS of field to .focused
          $('#user_email').removeClass('unfocused');
          $('#user_email').addClass('focused');
        });
        
        /* if email field is unselected... */
        $('#user_email').blur(function() {
          // ... and field is empty, show label
          if ( !$('#user_email').val() )
            $('#user_email_label').show();
          // change CSS of field to .unfocused
          $('#user_email').removeClass('focused');
          $('#user_email').addClass('unfocused');

        });
        
        /* if password field is selected... */
        $('#user_password').focus(function() {
          // hide label
          $('#user_password_label').hide();
          // change CSS of field to .focused
          $('#user_password').removeClass('unfocused');
          $('#user_password').addClass('focused');
        });
        
        /* if password field is unselected... */
        $('#user_password').blur(function() {
          // and field is empty, show label
          if ( !$('#user_password').val() )
            $('#user_password_label').show();
          // change CSS of field to .unfocused
          $('#user_password').removeClass('focused');
          $('#user_password').addClass('unfocused');
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

    </style>
    <title><?= $NAME_OF_SITE ?> | Your Leaderboard Solution</title>
  </head>
  <body>
    <h1><?= $NAME_OF_SITE ?> | Your Leaderboard Solution</h1>
    <div class='centeredForm'>
      <form id = 'registrationForm' action = 'reg.php' method = 'post'>
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
              <td><a href = 'javascript: submitRegForm()'><img src = '/<?= $ROOT_ADDRESS ?>/images/buttons/sign-up.png' /></a></td>
            </div>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>
