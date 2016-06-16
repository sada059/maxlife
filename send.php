<?php 

foreach ($_POST as $key => $value) {
    if (($key <> 'question' and strlen($value) > 100) or strpos($value, '=') > 0) {
    	exit("invalid variable");
    }
}

	require_once "/usr/share/php/Mail.php";
     $to = "foodstorage@maxlifefoods.com"; 
	 $from = "foodstorage@maxlifefoods.com";
     $email = $_POST['email']; 
     $fname = $_POST['fname'];
	 $lname = $_POST['lname'];
	 $name = $fname . ' ' . $lname;
     $message = $_POST['question'];
 	 $subject = "MaxLifeFoods.com";
 	 $body = "From: $name \n"
            ."Email: $email \n"
            ."Message: $message";
 
 $host = "ssl://smtp.zoho.com";
 $username = "foodstorage@maxlifefoods.com";
 $password = "pargile1739620";
 $port = "465";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
   	  'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   header("Location:thankyou-contact.php");
  }

	include("includes/db.php");


$a = mysql_query("SELECT * FROM mailing WHERE mailing_email='$email'");
$r = mysql_fetch_assoc($a);
$found = $r['mailing_email'];
if ($found != $email) {
	$a = mysql_query("INSERT INTO mailing (mailing_email, mailing_fname) VALUES ('" . $email . "', '" . addslashes($fname) . "')");
	$w = mysql_fetch_assoc($a);
	}
 ?>