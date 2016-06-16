<?php

	$dbHost = 'localhost';
	$dbUser = 'buckrol';
	$dbPass = 'pargile1';
	$dbName = 'buckrol_teach';
	
	$dbConn = mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
	mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());
	
	session_start();
	
	$run2 = mysql_query("SELECT * FROM TAC");
	
	while ($row = mysql_fetch_assoc($run2))  
	{
		$tac_key = $row['tac_key'];
		$salt = md5($tac_key);
		$pass = $row['tac_password'];
		$hash_total = md5($salt.$pass).":".$salt;
		#echo "hash=".$hash_total;
		mysql_query("UPDATE TAC SET hash_password = '$hash_total' WHERE tac_key = $tac_key");
		#mysql_query("UPDATE TAC SET hash_password = NULL WHERE tac_key = $tac_key");
	}

?>

<html>
<head>
<title>hash</title>
</head>
<body>
Done.
</body>
</html>
