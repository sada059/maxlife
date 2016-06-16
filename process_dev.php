<?PHP
	$dbHost = 'localhost';
	$dbUser = 'buckrol';
	$dbPass = 'pargile1';
	$dbName = 'maxlife';
	
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

$a = mysql_query("SELECT * FROM orders WHERE order_key=$order_key");
$r = mysql_fetch_assoc($a);
$stotal = number_format ($r['stotal'],2, '.', '');
$tax = number_format ($r['tax'],2, '.', '');
$shipping = number_format ($r['shipping'],2, '.', '');
$discount = number_format ($r['discount'],2, '.', '');
$total = $stotal + $tax + $shipping - $discount;
$discounttext = "";
if ($discount > 0) {
	$discounttext = "Discount: -$ $discount<br> \n";
}

$fname = $_POST['fname']; $_SESSION['fname'] = $_POST['fname'];
$lname = $_POST['lname']; $_SESSION['lname'] = $_POST['lname'];
$address = $_POST['address']; $_SESSION['address'] = $_POST['address'];
$address2 = $_POST['address2']; $_SESSION['address2'] = $_POST['address2'];
$city = $_POST['city']; $_SESSION['city'] = $_POST['city'];
$state = $_POST['state']; $_SESSION['state'] = $_POST['state'];
$zip =  $_POST['zip']; $_SESSION['zip'] = $_POST['zip'];
$ship_address = $_POST['ship_address']; $_SESSION['ship_address'] = $_POST['ship_address'];
$ship_address2 = $_POST['ship_address2']; $_SESSION['ship_address2'] = $_POST['ship_address2'];
$ship_city = $_POST['ship_city']; $_SESSION['ship_city'] = $_POST['ship_city'];
$ship_state = $_POST['ship_state']; $_SESSION['ship_state'] = $_POST['ship_state'];
$ship_zip =  $_POST['ship_zip']; $_SESSION['ship_zip'] = $_POST['ship_zip'];
$phone = $_POST['phone']; $_SESSION['phone'] = $_POST['phone'];
$email = $_POST['email']; $_SESSION['email'] = $_POST['email'];
$cctype = $_POST['cctype']; $_SESSION['cctype'] = $_POST['cctype'];
$ccnum = $_POST['ccnum']; $_SESSION['ccnum'] = $_POST['ccnum'];
$last = substr($ccnum, -4);
$first = substr($ccnum, 0, -12);
$encrypt = $first . '********' . $last;
$ccexp1 = $_POST['ccexp1']; $_SESSION['ccexp1'] = $_POST['ccexp1'];
$ccexp2 = $_POST['ccexp2']; $_SESSION['ccexp2'] = $_POST['ccexp2'];
$ccexp = $ccexp1.$ccexp2;
$ccname = $_POST['ccname']; $_SESSION['ccname'] = $_POST['ccname'];
$ip = $_SERVER['REMOTE_ADDR'];
$x_card_code = $_POST['cvv'];

$post_values = array(
	
	// the API Login ID and Transaction Key must be replaced with valid values
	"x_login"			=> "9DYhBa92Ce",
	"x_tran_key"		=> "7w8MS54VqUx9gm52",
	

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
	
	"x_ship_to_first_name" => "$fname",
	"x_ship_to_last_name"  => "$lname",
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

// The results are output to the screen in the form of an html numbered list.
/*echo "<OL>\n";
foreach ($response_array as $value)
{
	echo "<LI>" . $value . "&nbsp;</LI>\n";
	$i++;
}
echo "</OL>\n";*/

$to = $email; 
$headers = "From: No Reply <foodstorage@maxlifefoods.com>"; 
$subject = "Your Max Life Foods Order";

if($response_array[0] == 1) {
	
	
	$d = "SELECT * FROM order_details WHERE order_key = $order_key";
	$drun = mysql_query($d);
	$productstext = "Products:<br> \n";
	while ($e = mysql_fetch_assoc($drun)){
		$pkey = $e['product_key'];
		$qty = $e['quantity'];
		$c = "SELECT product_name, product_price FROM products WHERE product_key = $pkey";
		$crun = mysql_query($c);
		while ($f = mysql_fetch_assoc($crun)) {
			$productstext .= $qty . " " . $f['product_name'] . " - $" . number_format ($f['product_price'],2, '.', '') . "<br> \n";
		}
	}
	
	$receipt = 	"Order Number: $order_key<br /> \n"
				 	 ."Date: $formatted_date<br />  \n"
				 	 .$productstext
					 ."Sub Total: $ $stotal<br /> \n"
					 ."Tax: $ $tax<br /> \n"
					 ."Shipping: $ $shipping<br /> \n"
					 .$discounttext
					 ."Total Amount: $ $total<br> \n"
					 ."Payment Method: Credit Card \n\n";
					 
	$qu = "UPDATE orders SET amount='$total',email='$email',billing_address='" . addslashes($address) . "',billing_address2='" . addslashes($address2) . "',billing_city='" . addslashes($city) . "',billing_state='$state',billing_zip='$zip',ship_address='" . addslashes($ship_address) . "',ship_address2='" . addslashes($ship_address2) . "',ship_city='" . addslashes($ship_city) . "',ship_state='$ship_state',ship_zip='$ship_zip',phone='$phone',first_name='" . addslashes($fname) . "',last_name='" . addslashes($lname) . "',cc_type='$cctype',cc_='$encrypt',cc_name='" . addslashes($ccname) . "',cc_expires='$ccexp',receipt='" . addslashes($receipt) . "' WHERE order_key = $order_key";
	mysql_query($qu);
	
	require_once "/usr/share/pear/Mail.php";
	$host = "mail.maxlifefoods.com";
 	$username = "foodstorage";
 	$password = "enemigos05";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $receipt);
 
	session_destroy();
	
	header('Location:https://www.maxlifefoods.com/thankyou.php?id='.$order_key);
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
?>
</BODY>
</HTML>