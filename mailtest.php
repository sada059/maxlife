<?php

//error reporting... uncomment below 2 lines to show errors in code
//error_reporting(E_ALL);
//ini_set("display_errors", "1");


	require_once "/usr/share/pear/Mail.php";
	$host = "mail.maxlifefoods.com";
 	$username = "foodstorage@maxlifefoods.com";
 	$password = "enemigos05";
 
$to = "brettr@castleparkllc.com"; 
$from = "foodstorage@maxlifefoods.com";
$subject = "Your Max Life Foods Order";

 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $emailreceipt);
 
?>
<html>
<head>
<title>mail test</title>
<body>
Done
</BODY>
</HTML>