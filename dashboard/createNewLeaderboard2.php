<?php
    require("../include/common.php");

    $leaderboardName = $_POST['name'];
    // $leaderboardName = mysqlRealEscapeString($leaderboardName);

    // verify validity of name
    if ($leaderboardName == "")
      die("Sorry. You must choose a name that is not blank.");

    // check to see if the user has already created
    // a leaderboard with this name
    $result = query("SELECT name
    FROM {$_SESSION['id']}OwnedLeaderboards
    WHERE name = '$leaderboardName'");
    if (mysql_num_rows($result) > 0)
      die("Sorry. You must choose another name than $leaderboardName because you already created a leaderboard by this name.");

    // set leaderboard table name to be in the form
    // userID_leaderboardID
    $result = query("SELECT numLeaderboardsCreated
    FROM users WHERE id = {$_SESSION['id']}");
    $row = mysql_fetch_row($result);
    $num = $row[0];
    $leaderboardTableName = $_SESSION['id'] . "_" . $num;

    // be sure there is not already a table of this name
    $result = query("SELECT COUNT(*)
    FROM information_schema.tables
    WHERE table_schema = 'bbclip55_pulluptheladder'
    AND table_name = '$leaderboardTableName'");
    $row = mysql_fetch_row($result);
    if($row[0] == true)
      die('Sorry. You must choose another name than "'.$leaderboardName.'". This may be because you already created a leaderboard by this name.');

    // create leaderboard table
    $result = query("CREATE TABLE  `bbclip55_pulluptheladder`.`$leaderboardTableName` 
    (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `playerName` VARCHAR( 255 ) NOT NULL ,
    `playerRank` INT NOT NULL
    ) ENGINE = MYISAM ;
    ");
    
    // increment number of leaderboards created counter for user
    $result = query("UPDATE users
    SET numLeaderboardsCreated = numLeaderboardsCreated + 1
    WHERE id = {$_SESSION['id']}
    ");
    
    // add table into list of user's owned tables
    $result = query("INSERT INTO `bbclip55_pulluptheladder`.`{$_SESSION['id']}OwnedLeaderboards` (
    `name`,
    `tableName`
    )
    VALUES (
      '$leaderboardName',
      '$leaderboardTableName'
    );
    ");

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
