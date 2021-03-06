<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<?php
$id = $_GET['id'];

if ($id == '') {
    session_start();
    if(isset($_SESSION['id']))
      $id = $_SESSION['id'];
}
if ($id == '') {
  		$id = $_COOKIE['id'];
    }

?>
<html>

<head>

<meta http-equiv="content-type" content="text/html; charset=WINDOWS-1252" >
<title>MaxLifeFoods - 25 Year Food Storage</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" media="all">


<!-- load jQuery and the plugin -->
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="js/bjqs-1.3.min.js"></script>

<?php include_once("analyticstracking.php") ?>

</head>

<body bgcolor="#808080" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<div id="containerhead"><img src="/images/bg_front_red_n.jpg" /><span style="position:relative;right:-300px;"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_left_s.png" border="0" /></a><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_middle_s.png" border="0" /></a><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_right_s.png" border="0" /></a></span></div>

<div id="container"><div id="best_prices3"><img src="/images/bestprices.jpg" alt="Best Prices Guaranteed" /></div>
<div id="banner-fade"><ul class="bjqs">
    <li><a href="food-storage.php?id=<?php echo $id; ?>"><img src="/images/pic1.jpg" alt="Best Food Storage Value" border="0"></a></li>
    <li><a href="food-storage.php?id=<?php echo $id; ?>"><img src="/images/pic2.jpg" alt="Best Food Storage Value" border="0"></a></li>
    <li><a href="compare.php?id=<?php echo $id; ?>"><img src="/images/pic3.jpg" alt="Best Food Storage Value" border="0"></a></li>
    <li><a href="food-storage.php?id=<?php echo $id; ?>"><img src="/images/pic4.jpg" alt="Best Food Storage Value" border="0"></a></li>
  </ul></div>

<div id="box1b"><a href="compare.php"><img src="/images/financing.jpg" border="0" alt="Financing Option"></a></div>
<div id="box2b"><a href="why-maxlife.php?id=<?php echo $id; ?>"><img src="/images/tv_commercial.jpg" alt="Watch our TV Commercial" border="0"></a></div>
<div id="box3b"><a href="details.php?id=<?php echo $id; ?>&pid=111"><img src="/images/try_samples.jpg" border="0" alt="Try Samples"></a></div>
<div class="menuitems3"><a href="index.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">HOME</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="food-storage.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">FOOD STORAGE</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="supplemental.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">MEAT/FRUIT/VEG</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="seeds.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">SEEDS</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="compare.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">COMPARE</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="menu.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">MENU</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="faq.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">FAQ</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="tv.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">TV</font></b></a></div>
</div>

<div id="container2">
				<table align="center" border="0" cellpadding="10" cellspacing="10">
						<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="food-storage.php?id=<?php echo $id; ?>"><img border="0" src="/images/foodstorage.jpg" alt="" /></a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="meat.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/meat.jpg" alt="" /></a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="fruit.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/fruit.jpg" alt="" /></a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="veg.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/veg.jpg" alt="" /></a><br /><br />
                        </td>
                    </tr>
					</table> 
					
					<table border="0" width="900" align="center" cellpadding="5" cellspacing="5">
					<tr><td align="center" colspan="5" class="smallhead"><a href="compare.php?id=<?php echo $id; ?>">Click here to compare MaxLife to other major brands</a></td><td rowspan="7"><a href="food-storage.php?id=<?php echo $id; ?>"><img src="/images/2buckets_stacked_logo.gif"></a></td>
					<tr height="3"><td></td><td></td><td></td><td></td></tr>
					<tr><td align="right"><img src="/images/icon_fillers.gif"></td><td><font class="smallhead">Fewer Filler (Non-Meal) Servings</font><br \><font class="smalldesc">We fill our servings numbers with meals, not cheap drinks and desserts.  Competitors fill their packages with up to 69% non-meal servings.</font></td><td align="right"><img src="/images/icon_ship.gif"></td><td><font class="smallhead">Free Shipping</font><br \><font class="smalldesc">We offer free shipping on EVERY order in 48 U.S. states. No minimums.</font></td></tr>
					<tr height="3"><td></td><td></td><td></td><td></td></tr>
					<tr><td align="right"><img src="/images/icon_cost.gif"></td><td><font class="smallhead">Lower Cost Per Serving</font><br \><font class="smalldesc">Despite offering more meal servings, our price per serving is still lower than the competition.</font></td><td align="right"><img src="/images/icon_taste.gif"></td><td><font class="smallhead">Better Tasting</font><br \><font class="smalldesc">Rated independently at 85% for taste.  Compare to 57% competitor rating.</font></td></tr>
					<tr height="3"><td></td><td></td><td></td><td></td></tr>
					<tr><td align="right"><img src="/images/icon_calories.gif"></td><td><font class="smallhead">Lower Cost Per 2000 Calories</font><br \><font class="smalldesc">Servings with low calorie count won't last in a food emergency.  Our servings get you closer to your required daily calorie intake.</font></td><td align="right"><img src="/images/icon_convenient.gif"></td><td><font class="smallhead">More Convenient</font><br \><font class="smalldesc">Faster time to ship, resealable pouches. Some of our competitors don't even offer stackable & resuable buckets or just-add-water meals.</font></td></tr>
					<tr height="3"><td></td><td></td><td></td><td></td></tr>
					</table>
</div>

<div id="containerfooter"><span id="indexfooter">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://verify.authorize.net/anetseal/?pid=6a6313b8-1f03-4eaa-9a4f-39b386e72824&rurl=http%3A//www.maxlifefoods.com/contact.php%3Fid%3D" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!--<a href="MaxLifeFoodsBrochure.pdf"><font size="1" face="Arial"><b>PRICE BROCHURE</b></font></a>&nbsp;&nbsp;|&nbsp;&nbsp;-->
							<a href="index.php?id=<?php echo $id; ?>"><font size="1" face="Arial">HOME</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="food-storage.php?id=<?php echo $id; ?>"><font size="1" face="Arial">FOOD STORAGE</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="supplemental.php?id=<?php echo $id; ?>"><font size="1" face="Arial">MEAT/FRUIT/VEG</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="seeds.php?id=<?php echo $id; ?>"><font size="1" face="Arial">SEEDS</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="compare.php?id=<?php echo $id; ?>"><font size="1" face="Arial">COMPARE</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="menu.php?id=<?php echo $id; ?>"><font size="1" face="Arial">MENU</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="privacy.php?id=<?php echo $id; ?>"><font size="1" face="Arial">PRIVACY</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="terms.php?id=<?php echo $id; ?>"><font size="1" face="Arial">TERMS</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="contact.php?id=<?php echo $id; ?>"><font size="1" face="Arial">CONTACT</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="faq.php?id=<?php echo $id; ?>"><font size="1" face="Arial">FAQ</font></a></font>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="tv.php?id=<?php echo $id; ?>"><font size="1" face="Arial">TV</font></a></span>
                    	
                    	
							<span id="indexfacebook"><a href="http://www.facebook.com/maxlifefoods" target="_blank"><img src="/images/facebooksquare.jpg" border="0"></a></span></div>

      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
				// width and height need to be provided to enforce consistency
				// if responsive is set to true, these values act as maximum dimensions
				width : 674,
				height : 174,
				
				// animation values
				animtype : 'fade', // accepts 'fade' or 'slide'
				animduration : 750, // how fast the animation are
				animspeed : 5000, // the delay between each slide
				automatic : true, // automatic
				
				// control and marker configuration
				showcontrols : false, // show next and prev controls
				centercontrols : true, // center controls verically
				nexttext : 'Next', // Text for 'next' button (can use HTML)
				prevtext : 'Prev', // Text for 'previous' button (can use HTML)
				showmarkers : false, // Show individual slide markers
				centermarkers : false, // Center markers horizontally
				
				// interaction values
				keyboardnav : true, // enable keyboard navigation
				hoverpause : false, // pause the slider on hover
				
				// presentational options
				usecaptions : true, // show captions for images using the image title tag
				randomstart : true, // start slider at random slide
				responsive : false // enable responsive capabilities (beta)
          });
        });
      </script>
      
<?php include_once("googlefooter.php") ?>
</body>

</html>
