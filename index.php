<?php
	require("include/common.php");
?>

<!DOCTYPE html> 
<head>
<link rel="stylesheet" type="text/css" href="include/style.css" />
<title><?= $NAME_OF_SITE ?> | Your Leaderboard Solution</title>
</head>

<body>

<h1><?= $NAME_OF_SITE ?> | Your Leaderboard Solution</h1>

<?php
	echo connect();
    query("SELECT * FROM users WHERE id = 7");
	echo "CONNECTED!   :-)";
//	disconnect();
?>

</body>
</html>
