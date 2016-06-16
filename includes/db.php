<?php
	$dbHost = 'localhost';
	$dbUser = 'maxlife';
	$dbPass = 'pargile1739620';
	$dbName = 'maxlife';
	
	$dbConn = mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
	mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());
	
	session_start();
?>