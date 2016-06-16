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
<title>MaxLifeFoods - Food Storage & Sportsman Food Kits</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" media="all">

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
      var $active = $('#portfolio_cycler .active');
      var $next = ($('#portfolio_cycler .active').next().length > 0) ? $('#portfolio_cycler .active').next() : $('#portfolio_cycler img:first');
      $next.css('z-index',2);//move the next image up the pile
	  $active.fadeOut(1500,function(){//fade out the top image
	  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
      $next.css('z-index',3).addClass('active');//make the next image the top one
	  if ($('#portfolio_cycler .active').next().length > 0) setTimeout('cycleImages()',7000);//check for a next image, and if one exists, call the function recursively
      });
    }

    $(document).ready(function(){
      // run every 7s
      setTimeout('cycleImages()', 5500);
    })

</script>
<?php include_once("analyticstracking.php") ?>

</head>

<body bgcolor="#808080" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<table align="center" cellpadding="0" cellspacing="0" border="0" width="1075">
<tr><td background="/images/background_s.jpg" align="left" width="823"><img src="/images/bg_front_red_n.jpg" /></td><td background="/images/background_s.jpg" width="164" align="right"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_left_s.png" border="0" /></a></td><td background="/images/background_s.jpg" width="42"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_middle_s.png" border="0" /></a></td><td background="/images/background_s.jpg" width="46" align="left"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_right_s.png" border="0" /></a></td><td background="/images/background_s.jpg">&nbsp;</td></tr>
<tr><td colspan="5" background="/images/mainbackground.jpg" height="777"/><div id="best_prices">
<img src="/images/bestprices.jpg" alt="Best Prices Guaranteed" />
</div>
<div id="main_banner">
<a href="food-storage.php?id=<?php echo $id; ?>"><img src="/images/pic1.jpg" alt="Best Food Storage Value" border="0"></a>
</div>
<div id="box1">
<a href="compare.php"><img src="/images/financing.jpg" bored="0" alt="Financing Option"></a>
</div>
<div id="box2">
<a href="why-maxlife.php?id=<?php echo $id; ?>"><img src="/images/tv_commercial.jpg" alt="Watch our TV Commercial" border="0"></a>
</div>
<div id="box3">
<a href="details.php?id=<?php echo $id; ?>&pid=111"><img src="/images/try_samples.jpg" alt="Try Samples"></a>
</div>
<span class="menuitems">
						  <a href="index.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">HOME</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="food-storage.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">FOOD STORAGE</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="supplemental.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">MEAT/FRUIT/VEG</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="seeds.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">SEEDS</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="compare.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">COMPARE</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="menu.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">MENU</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="faq.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">FAQ</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="tv.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">TV</font></b></a></span>
                    
                    </td></tr>
<tr><td colspan="5" background="/images/background_repeat.jpg" height="10"/>
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
</td></tr>

<tr><td colspan="2" height="65" background="/images/mainbottom.jpg" /><font size="1" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://verify.authorize.net/anetseal/?pid=6a6313b8-1f03-4eaa-9a4f-39b386e72824&rurl=http%3A//www.maxlifefoods.com/contact.php%3Fid%3D" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                    	<a href="tv.php?id=<?php echo $id; ?>"><font size="1" face="Arial">TV</font></a>
                    	
                    	
							</td><td colspan="3" align="right"><a href="http://www.facebook.com/maxlifefoods" target="_blank"><img src="/images/facebook_new.jpg" border="0"></a></td></tr>
</table>

<?php include_once("googlefooter.php") ?>
</body>

</html>
