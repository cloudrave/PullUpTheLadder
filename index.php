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
        
        // if email field is selected, hide label
        $('#user_email').focus(function() {
          $('#user_email_label').hide();
        });
        
        /* if email field is unselected and field is empty,
           show label */
        $('#user_email').blur(function() {
          if ( !$('#user_email').val() )
            $('#user_email_label').show();
        });
        
        // if password field is selected, hide label
        $('#user_password').focus(function() {
          $('#user_password_label').hide();
        });
        
        /* if password field is unselected and field
           is empty, show label */
        $('#user_password').blur(function() {
          if ( !$('#user_password').val() )
            $('#user_password_label').show();
        });

      });

    </script>
    <style>
      td
      {
          font-size:1.4em;
      }
      
      input
      {
          width:160px;
          padding:10px;
          /*height:30px;*/
          outline:none;
          font-size:20px;
          background-color:#EEE;
      }

      label
      {
          position:relative;
          width:150px;
          height:40px;
          z-index:1;
          /* top:50px; */
          /* left:50%; */
          /*margin:12px 0 0 12px;*/
          color:#AAA;
          font-size:20px;
          font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;
          /* cursor:pointer; */
          text-align:center;
      }

      .inputWrapper
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
            <div class = 'inputWrapper' id = 'email_field_wrapper'>
              <label id = 'user_email_label' for = 'user_email'>Email Address</label>
              <td><input id = 'user_email' type = 'text' name = 'username' /></td>
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
