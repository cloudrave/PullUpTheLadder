<?php
    require("../include/common.php");
?>

<!DOCTYPE html> 
<head>
<link rel="stylesheet" type="text/css" href="/<?= $ROOT_ADDRESS ?>/include/style.css" />
<title>Leaderboard</title>
</head>

<body>

<h1>Pull Up the Ladder | Your Leaderboard Solution</h1>

<?php
	echo connect();
    query("SELECT * FROM users WHERE id = 7");
	echo "CONNECTED!   :-)";
//	disconnect();
?>

</body>
</html>
