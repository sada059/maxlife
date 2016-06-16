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

	$query = "SELECT amount FROM orders WHERE order_key = $id";
	$run   = mysql_query($query);
	$result = mysql_fetch_assoc($run);
	$total = $result['amount'];
	
	$query2 = "SELECT * FROM orders WHERE order_key = $id";
	$run2   = mysql_query($query2);
	$qq = mysql_fetch_assoc($run2);
	
	if(isset($_GET['error'])) {
		if($_GET['error'] == 1) {
			$msg = "<br>We're sorry, but your card has been declined. Please check the number and try again.<br>IMPORTANT: Your credit card company may not be expecting you to make a large purchase, so you may need to call the number on your card and tell them to expect a large purchase from MaxLifeFoods, then try again.<br /><br />";
		}
		if($_GET['error'] == 2) {
			$msg = "<br>We're sorry, but there has been an error processing your card. Please check the number and try again.<br /><br />";
		}
		if($_GET['error'] == 3) {
			$msg = "<br>We're sorry, but this transaction is being held for review. We'll notify you as soon as we know more.<br /><br />";
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
        <div class="subbody2" style="height: 1550px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="/food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
                	<h1>Checkout<font color="#cc0000"><?php echo $msg ?></h1>

                    <form name="payment" id="payment" method="post" action="https://www.maxlifefoods.com/confirm-order.php?id=<?php echo $id; ?>" onsubmit="return validate()">
                        <input type="hidden" name="command" />
                        <input type="hidden" name="orderid" value="<?php echo $id; ?>" />
                        <input type="hidden" name="total" value="<?php echo number_format ($total,2, '.', ''); ?>" />
                                <fieldset>
                                    <legend>Contact Information</legend>
                                            <ol>
                                                <li>
                                                <label for=fname>First Name</label>
                                                <input id=fname name=fname type=text placeholder="First name" value="<?php echo $_SESSION['fname']; ?>" required autofocus>
                                                </li>
                                                <li>
                                                <label for=lname>Last Name</label>
                                                <input id=lname name=lname type=text placeholder="Last name" value="<?php echo $_SESSION['lname']; ?>" required>
                                                </li>
                                                <li>
                                                <label for=email>Email</label>
                                                <input id=email name=email type=email placeholder="example@domain.com" value="<?php echo $_SESSION['email']; ?>" required>
                                                </li>
                                                <li>
                                                <label for=phone>Phone</label>
                                                <input id=phone name=phone type=tel placeholder="Eg. 801-123-4567" value="<?php echo $_SESSION['phone']; ?>" required>
                                                </li>
                                            </ol>
                                        </fieldset>
                                        <fieldset>
                                        	<legend>Billing Address (IMPORTANT: Must be verified billing address on your credit card.)</legend>
                                            <ol>
                                                <li>
                                                <label for=address>Street</label>
                                                <input id=address name=address type=text placeholder="123 Main St" value="<?php echo $_SESSION['address']; ?>" required>
                                                </li>
                                                <!--<li>
                                                <label for=address2>Street 2</label>
                                                <input id=address2 name=address2 type=text placeholder="Apartment #" value="<?php echo $_SESSION['address2']; ?>">
                                                </li>-->
                                                <li>
                                                <label for=city>City</label>
                                                <input id=city name=city type=text placeholder="City" value="<?php echo $_SESSION['city']; ?>" required>
                                                </li>
                                                <li>
                                                <label for=state>State</label>
                                                <select name="state" required>
                                                    <option value="AL" <?php if($_SESSION['state'] == 'AL'){echo "selected";} ?>>Alabama</option>
                                                    <option value="AK" <?php if($_SESSION['state'] == 'AK'){echo "selected";} ?>>Alaska (free shipping N/A)</option>
                                                    <option value="AZ" <?php if($_SESSION['state'] == 'AZ'){echo "selected";} ?>>Arizona</option>
                                                    <option value="AR" <?php if($_SESSION['state'] == 'AR'){echo "selected";} ?>>Arkansas</option>
                                                    <option value="CA" <?php if($_SESSION['state'] == 'CA'){echo "selected";} ?>>California</option>
                                                    <option value="CO" <?php if($_SESSION['state'] == 'CO'){echo "selected";} ?>>Colorado</option>
                                                    <option value="CT" <?php if($_SESSION['state'] == 'CT'){echo "selected";} ?>>Connecticut</option>
                                                    <option value="DE" <?php if($_SESSION['state'] == 'DE'){echo "selected";} ?>>Delaware</option>
                                                    <option value="DC" <?php if($_SESSION['state'] == 'DC'){echo "selected";} ?>>District of Columbia</option>
                                                    <option value="FL" <?php if($_SESSION['state'] == 'FL'){echo "selected";} ?>>Florida</option>
                                                    <option value="GA" <?php if($_SESSION['state'] == 'GA'){echo "selected";} ?>>Georgia</option>
                                                    <option value="HI" <?php if($_SESSION['state'] == 'HI'){echo "selected";} ?>>Hawaii (free shipping N/A)</option>
                                                    <option value="ID" <?php if($_SESSION['state'] == 'ID'){echo "selected";} ?>>Idaho</option>
                                                    <option value="IL" <?php if($_SESSION['state'] == 'IL'){echo "selected";} ?>>Illinois</option>
                                                    <option value="IN" <?php if($_SESSION['state'] == 'IN'){echo "selected";} ?>>Indiana</option>
                                                    <option value="IA" <?php if($_SESSION['state'] == 'IA'){echo "selected";} ?>>Iowa</option>
                                                    <option value="KS" <?php if($_SESSION['state'] == 'KS'){echo "selected";} ?>>Kansas</option>
                                                    <option value="KY" <?php if($_SESSION['state'] == 'KY'){echo "selected";} ?>>Kentucky</option>
                                                    <option value="LA" <?php if($_SESSION['state'] == 'LA'){echo "selected";} ?>>Louisiana</option>
                                                    <option value="ME" <?php if($_SESSION['state'] == 'ME'){echo "selected";} ?>>Maine</option>
                                                    <option value="MD" <?php if($_SESSION['state'] == 'MD'){echo "selected";} ?>>Maryland</option>
                                                    <option value="MA" <?php if($_SESSION['state'] == 'MA'){echo "selected";} ?>>Massachusetts</option>
                                                    <option value="MI" <?php if($_SESSION['state'] == 'MI'){echo "selected";} ?>>Michigan</option>
                                                    <option value="MN" <?php if($_SESSION['state'] == 'MN'){echo "selected";} ?>>Minnesota</option>
                                                    <option value="MS" <?php if($_SESSION['state'] == 'MS'){echo "selected";} ?>>Mississippi</option>
                                                    <option value="MO" <?php if($_SESSION['state'] == 'MO'){echo "selected";} ?>>Missouri</option>
                                                    <option value="MT" <?php if($_SESSION['state'] == 'MT'){echo "selected";} ?>>Montana</option>
                                                    <option value="NE" <?php if($_SESSION['state'] == 'NE'){echo "selected";} ?>>Nebraska</option>
                                                    <option value="NV" <?php if($_SESSION['state'] == 'NV'){echo "selected";} ?>>Nevada</option>
                                                    <option value="NH" <?php if($_SESSION['state'] == 'NH'){echo "selected";} ?>>New Hampshire</option>
                                                    <option value="NJ" <?php if($_SESSION['state'] == 'NJ'){echo "selected";} ?>>New Jersey</option>
                                                    <option value="NM" <?php if($_SESSION['state'] == 'NM'){echo "selected";} ?>>New Mexico</option>
                                                    <option value="NY" <?php if($_SESSION['state'] == 'NY'){echo "selected";} ?>>New York</option>
                                                    <option value="NC" <?php if($_SESSION['state'] == 'NC'){echo "selected";} ?>>North Carolina</option>
                                                    <option value="ND" <?php if($_SESSION['state'] == 'ND'){echo "selected";} ?>>North Dakota</option>
                                                    <option value="OH" <?php if($_SESSION['state'] == 'OH'){echo "selected";} ?>>Ohio</option>
                                                    <option value="OK" <?php if($_SESSION['state'] == 'OK'){echo "selected";} ?>>Oklahoma</option>
                                                    <option value="OR" <?php if($_SESSION['state'] == 'OR'){echo "selected";} ?>>Oregon</option>
                                                    <option value="PA" <?php if($_SESSION['state'] == 'PA'){echo "selected";} ?>>Pennsylvania</option>
                                                    <option value="PR" <?php if($_SESSION['state'] == 'PR'){echo "selected";} ?>>Puerto Rico (you will be contacted for additional shipping amount approval)</option>
                                                    <option value="RI" <?php if($_SESSION['state'] == 'RI'){echo "selected";} ?>>Rhode Island</option>
                                                    <option value="SC" <?php if($_SESSION['state'] == 'SC'){echo "selected";} ?>>South Carolina</option>
                                                    <option value="SD" <?php if($_SESSION['state'] == 'SD'){echo "selected";} ?>>South Dakota</option>
                                                    <option value="TN" <?php if($_SESSION['state'] == 'TN'){echo "selected";} ?>>Tennessee</option>
                                                    <option value="TX" <?php if($_SESSION['state'] == 'TX'){echo "selected";} ?>>Texas</option>
                                                    <option value="UT" <?php if($_SESSION['state'] == 'UT'){echo "selected";} ?>>Utah</option>
                                                    <option value="VT" <?php if($_SESSION['state'] == 'VT'){echo "selected";} ?>>Vermont</option>
                                                    <option value="VA" <?php if($_SESSION['state'] == 'VA'){echo "selected";} ?>>Virginia</option>
                                                    <option value="WA" <?php if($_SESSION['state'] == 'WA'){echo "selected";} ?>>Washington</option>
                                                    <option value="WV" <?php if($_SESSION['state'] == 'WV'){echo "selected";} ?>>West Virginia</option>
                                                    <option value="WI" <?php if($_SESSION['state'] == 'WI'){echo "selected";} ?>>Wisconsin</option>
                                                    <option value="WY" <?php if($_SESSION['state'] == 'WY'){echo "selected";} ?>>Wyoming</option>
                                                </select>

                                                </li>
                                                <li>
                                                <label for=zip>Zip Code</label>
                                                <input id=zip name=zip type=text placeholder="Zip Code" value="<?php echo $_SESSION['zip']; ?>" required>
                                                </li>
                                            </ol>
                                </fieldset>
                                        <fieldset>
                                        	<legend>Shipping Address (leave blank if same)</legend>
                                            <ol>
                                                <li>
                                                <label for=ship_address>Street 1</label>
                                                <input id=ship_address name=ship_address type=text placeholder="123 Main St" value="<?php echo $_SESSION['address']; ?>" required>
                                                </li>
                                                <!--<li>
                                                <label for=ship_address2>Street 2</label>
                                                <input id=ship_address2 name=ship_address2 type=text placeholder="Apartment #" value="<?php echo $_SESSION['address2']; ?>">
                                                </li>-->
                                                <li>
                                                <label for=ship_city>City</label>
                                                <input id=ship_city name=ship_city type=text placeholder="City" value="<?php echo $_SESSION['city']; ?>" required>
                                                </li>
                                                <li>
                                                <label for=ship_state>State</label>
                                                <select name="ship_state" required>
                                                    <option value="AL" <?php if($_SESSION['ship_state'] == 'AL'){echo "selected";} ?>>Alabama</option>
                                                    <option value="AK" <?php if($_SESSION['ship_state'] == 'AK'){echo "selected";} ?>>Alaska (free shipping N/A)</option>
                                                    <option value="AZ" <?php if($_SESSION['ship_state'] == 'AZ'){echo "selected";} ?>>Arizona</option>
                                                    <option value="AR" <?php if($_SESSION['ship_state'] == 'AR'){echo "selected";} ?>>Arkansas</option>
                                                    <option value="CA" <?php if($_SESSION['ship_state'] == 'CA'){echo "selected";} ?>>California</option>
                                                    <option value="CO" <?php if($_SESSION['ship_state'] == 'CO'){echo "selected";} ?>>Colorado</option>
                                                    <option value="CT" <?php if($_SESSION['ship_state'] == 'CT'){echo "selected";} ?>>Connecticut</option>
                                                    <option value="DE" <?php if($_SESSION['ship_state'] == 'DE'){echo "selected";} ?>>Delaware</option>
                                                    <option value="DC" <?php if($_SESSION['ship_state'] == 'DC'){echo "selected";} ?>>District of Columbia</option>
                                                    <option value="FL" <?php if($_SESSION['ship_state'] == 'FL'){echo "selected";} ?>>Florida</option>
                                                    <option value="GA" <?php if($_SESSION['ship_state'] == 'GA'){echo "selected";} ?>>Georgia</option>
                                                    <option value="HI" <?php if($_SESSION['ship_state'] == 'HI'){echo "selected";} ?>>Hawaii (free shipping N/A)</option>
                                                    <option value="ID" <?php if($_SESSION['ship_state'] == 'ID'){echo "selected";} ?>>Idaho</option>
                                                    <option value="IL" <?php if($_SESSION['ship_state'] == 'IL'){echo "selected";} ?>>Illinois</option>
                                                    <option value="IN" <?php if($_SESSION['ship_state'] == 'IN'){echo "selected";} ?>>Indiana</option>
                                                    <option value="IA" <?php if($_SESSION['ship_state'] == 'IA'){echo "selected";} ?>>Iowa</option>
                                                    <option value="KS" <?php if($_SESSION['ship_state'] == 'KS'){echo "selected";} ?>>Kansas</option>
                                                    <option value="KY" <?php if($_SESSION['ship_state'] == 'KY'){echo "selected";} ?>>Kentucky</option>
                                                    <option value="LA" <?php if($_SESSION['ship_state'] == 'LA'){echo "selected";} ?>>Louisiana</option>
                                                    <option value="ME" <?php if($_SESSION['ship_state'] == 'ME'){echo "selected";} ?>>Maine</option>
                                                    <option value="MD" <?php if($_SESSION['ship_state'] == 'MD'){echo "selected";} ?>>Maryland</option>
                                                    <option value="MA" <?php if($_SESSION['ship_state'] == 'MA'){echo "selected";} ?>>Massachusetts</option>
                                                    <option value="MI" <?php if($_SESSION['ship_state'] == 'MI'){echo "selected";} ?>>Michigan</option>
                                                    <option value="MN" <?php if($_SESSION['ship_state'] == 'MN'){echo "selected";} ?>>Minnesota</option>
                                                    <option value="MS" <?php if($_SESSION['ship_state'] == 'MS'){echo "selected";} ?>>Mississippi</option>
                                                    <option value="MO" <?php if($_SESSION['ship_state'] == 'MO'){echo "selected";} ?>>Missouri</option>
                                                    <option value="MT" <?php if($_SESSION['ship_state'] == 'MT'){echo "selected";} ?>>Montana</option>
                                                    <option value="NE" <?php if($_SESSION['ship_state'] == 'NE'){echo "selected";} ?>>Nebraska</option>
                                                    <option value="NV" <?php if($_SESSION['ship_state'] == 'NV'){echo "selected";} ?>>Nevada</option>
                                                    <option value="NH" <?php if($_SESSION['ship_state'] == 'NH'){echo "selected";} ?>>New Hampshire</option>
                                                    <option value="NJ" <?php if($_SESSION['ship_state'] == 'NJ'){echo "selected";} ?>>New Jersey</option>
                                                    <option value="NM" <?php if($_SESSION['ship_state'] == 'NM'){echo "selected";} ?>>New Mexico</option>
                                                    <option value="NY" <?php if($_SESSION['ship_state'] == 'NY'){echo "selected";} ?>>New York</option>
                                                    <option value="NC" <?php if($_SESSION['ship_state'] == 'NC'){echo "selected";} ?>>North Carolina</option>
                                                    <option value="ND" <?php if($_SESSION['ship_state'] == 'ND'){echo "selected";} ?>>North Dakota</option>
                                                    <option value="OH" <?php if($_SESSION['ship_state'] == 'OH'){echo "selected";} ?>>Ohio</option>
                                                    <option value="OK" <?php if($_SESSION['ship_state'] == 'OK'){echo "selected";} ?>>Oklahoma</option>
                                                    <option value="OR" <?php if($_SESSION['ship_state'] == 'OR'){echo "selected";} ?>>Oregon</option>
                                                    <option value="PA" <?php if($_SESSION['ship_state'] == 'PA'){echo "selected";} ?>>Pennsylvania</option>
                                                    <option value="PR" <?php if($_SESSION['ship_state'] == 'PR'){echo "selected";} ?>>Puerto Rico (you will be contacted for additional shipping amount approval)</option>
                                                    <option value="RI" <?php if($_SESSION['ship_state'] == 'RI'){echo "selected";} ?>>Rhode Island</option>
                                                    <option value="SC" <?php if($_SESSION['ship_state'] == 'SC'){echo "selected";} ?>>South Carolina</option>
                                                    <option value="SD" <?php if($_SESSION['ship_state'] == 'SD'){echo "selected";} ?>>South Dakota</option>
                                                    <option value="TN" <?php if($_SESSION['ship_state'] == 'TN'){echo "selected";} ?>>Tennessee</option>
                                                    <option value="TX" <?php if($_SESSION['ship_state'] == 'TX'){echo "selected";} ?>>Texas</option>
                                                    <option value="UT" <?php if($_SESSION['ship_state'] == 'UT'){echo "selected";} ?>>Utah</option>
                                                    <option value="VT" <?php if($_SESSION['ship_state'] == 'VT'){echo "selected";} ?>>Vermont</option>
                                                    <option value="VA" <?php if($_SESSION['ship_state'] == 'VA'){echo "selected";} ?>>Virginia</option>
                                                    <option value="WA" <?php if($_SESSION['ship_state'] == 'WA'){echo "selected";} ?>>Washington</option>
                                                    <option value="WV" <?php if($_SESSION['ship_state'] == 'WV'){echo "selected";} ?>>West Virginia</option>
                                                    <option value="WI" <?php if($_SESSION['ship_state'] == 'WI'){echo "selected";} ?>>Wisconsin</option>
                                                    <option value="WY" <?php if($_SESSION['ship_state'] == 'WY'){echo "selected";} ?>>Wyoming</option>
                                                </select>

                                                </li>
                                                <li>
                                                <label for=ship_zip>Zip Code</label>
                                                <input id=ship_zip name=ship_zip type=text placeholder="Zip Code" value="<?php echo $_SESSION['zip']; ?>" required>
                                                </li>
                                            </ol>
                                </fieldset>
                                <fieldset>
                                    <legend>Card Details</legend>
                                    	<ol>
                                            <li>
                                            <fieldset>
                                            <legend>Card type</legend>
                                            <ol>
                                                <li>
                                                <input id=visa name=cctype type=radio value="VISA" <?php if($_SESSION['cctype'] == 'VISA'){echo "checked";} ?>>
                                                <label for=visa>VISA</label>
                                                </li>
                                                <li>
                                                <input id=mastercard name=cctype type=radio value="Mastercard" <?php if($_SESSION['cctype'] == 'Mastercard'){echo "checked";} ?>>
                                                <label for=mastercard>Mastercard</label>
                                                </li>
                                                <li>
                                                <input id=discover name=cctype type=radio value="Discover" <?php if($_SESSION['cctype'] == 'Discover'){echo "checked";} ?>>
                                                <label for=discover>Discover</label>
                                                </li>
                                            </ol>
                                            </fieldset>
                                            </li>
                                            <li>
                                            <label for=ccnum>Card number</label>
                                            <input id=ccnum name=ccnum type=text value="<?php echo $_SESSION['ccnum']; ?>" required>
                                            </li>
                                            <li>
                                            <label for=ccexp1>Expiration Date</label>
                                            <select id="ccexp1" name="ccexp1" required>
                                            	<option value="01" <?php if($_SESSION['ccexp1'] == '01'){echo "selected";} ?>>01 - Jan</option>
                                                <option value="02" <?php if($_SESSION['ccexp1'] == '02'){echo "selected";} ?>>02 - Feb</option>
                                                <option value="03" <?php if($_SESSION['ccexp1'] == '03'){echo "selected";} ?>>03 - Mar</option>
                                                <option value="04" <?php if($_SESSION['ccexp1'] == '04'){echo "selected";} ?>>04 - Apr</option>
                                                <option value="05" <?php if($_SESSION['ccexp1'] == '05'){echo "selected";} ?>>05 - May</option>
                                                <option value="06" <?php if($_SESSION['ccexp1'] == '06'){echo "selected";} ?>>06 - Jun</option>
                                                <option value="07" <?php if($_SESSION['ccexp1'] == '07'){echo "selected";} ?>>07 - Jul</option>
                                                <option value="08" <?php if($_SESSION['ccexp1'] == '08'){echo "selected";} ?>>08 - Aug</option>
                                                <option value="09" <?php if($_SESSION['ccexp1'] == '09'){echo "selected";} ?>>09 - Sep</option>
                                                <option value="10" <?php if($_SESSION['ccexp1'] == '10'){echo "selected";} ?>>10 - Oct</option>
                                                <option value="11" <?php if($_SESSION['ccexp1'] == '11'){echo "selected";} ?>>11 - Nov</option>
                                                <option value="12" <?php if($_SESSION['ccexp1'] == '12'){echo "selected";} ?>>12 - Dec</option>
                                            </select>
                                            <select id="ccexp2" name="ccexp2" required>
                                                <option value="12" <?php if($_SESSION['ccexp2'] == '12'){echo "selected";} ?>>2012</option>
                                                <option value="13" <?php if($_SESSION['ccexp2'] == '13'){echo "selected";} ?>>2013</option>
                                                <option value="14" <?php if($_SESSION['ccexp2'] == '14'){echo "selected";} ?>>2014</option>
                                                <option value="15" <?php if($_SESSION['ccexp2'] == '15'){echo "selected";} ?>>2015</option>
                                                <option value="16" <?php if($_SESSION['ccexp2'] == '16'){echo "selected";} ?>>2016</option>
                                                <option value="17" <?php if($_SESSION['ccexp2'] == '17'){echo "selected";} ?>>2017</option>
                                                <option value="18" <?php if($_SESSION['ccexp2'] == '18'){echo "selected";} ?>>2018</option>
                                                <option value="19" <?php if($_SESSION['ccexp2'] == '19'){echo "selected";} ?>>2019</option>
                                                <option value="20" <?php if($_SESSION['ccexp2'] == '20'){echo "selected";} ?>>2020</option>
                                                <option value="21" <?php if($_SESSION['ccexp2'] == '21'){echo "selected";} ?>>2021</option>
                                                <option value="22" <?php if($_SESSION['ccexp2'] == '22'){echo "selected";} ?>>2022</option>
                                            </select>
                                            </li>
                                            <li>
                                            <label for=ccname>Name on card</label>
                                            <input id=ccname name=ccname type=text placeholder="Exact name as on the card" value="<?php echo $_SESSION['ccname']; ?>" required>
                                            </li>
                                            <li>
                                            <label for=ccv>CVV Code</label>
                                            <input type="text" id="cvv" name="cvv" size="4" value="" placeholder="3 digits"/> <font size="2"><b><a href="/cvv.php" target=_blank>What is CVV?</a></b></font>
                                            </li>
                                        </ol>
                                </fieldset>
              <fieldset>
                                    <legend>Offer Code</legend>
                                    	<ol>

                                            <li>
                                            <label for=offercode>Code (optional)</label>
                                            <input id=offercode name=offercode type=text value="<?php echo $_SESSION['offercode']; ?>">
                                            </li>
                                        </ol>
                                </fieldset>
                                <fieldset>
                                    	<button type=submit>Review Order</button>
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
                    	<a href="http://www.maxlifefoods.com/privacy.php?id=<?php echo $id; ?>">PRIVACY POLICY</a>&nbsp;&nbsp;|&nbsp;&nbsp;
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
