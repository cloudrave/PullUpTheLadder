<?php
	require("include/helpers.php");
?>

<!DOCTYPE html> 
<head>
<link rel="stylesheet" type="text/css" href="include/style.css" />
<title>Leaderboard</title>
</head>

<body>

<?php
	echo connect();
    query("SELECT * FROM users WHERE id = 7");
	echo "CONNECTED!   :-)";
//	disconnect();
?>

</body>
</html>
