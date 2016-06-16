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
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/bjqs-1.3.min.js"></script>

<script type="text/javascript">
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
<div id="containerhead"><img src="/images/bg_front_red_n.jpg" /><span style="position:relative;right:-300px;"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_left_s.png" border="0" /></a><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_middle_s.png" border="0" /></a><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_right_s.png" border="0" /></a></span></div>

<div id="container"><div id="portfolio_cycler">
<img class="active" src="/images/radio_ramsey.jpg" alt="Our Food Storage Recommended by Dave Ramsey" />
<img src="/images/radio_ingraham.jpg" alt="Our Food Storage Recommended by Laura Ingraham" />	
<img src="/images/radio_gallagher.jpg" alt="Our Food Storage Recommended by Mike Gallagher" />	
<img src="/images/radio_gresham.jpg" alt="Our Food Storage Recommended by Tom Gresham" />		
<img src="/images/radio_prager.jpg" alt="Our Food Storage Recommended by Dennis Prager" />	
</div>
<div id="banner-fade"><ul class="bjqs">
    <li><a href="food-storage.php?id=<?php echo $id; ?>"><img src="/images/pic1.jpg" alt="Best Food Storage Value" border="0"></a></li>
    <li><a href="food-storage.php?id=<?php echo $id; ?>"><img src="/images/pic2.jpg" alt="Best Food Storage Value" border="0"></a></li>
    <li><a href="compare.php?id=<?php echo $id; ?>"><img src="/images/pic3.jpg" alt="Best Food Storage Value" border="0"></a></li>
    <li><a href="food-storage.php?id=<?php echo $id; ?>"><img src="/images/pic4.jpg" alt="Best Food Storage Value" border="0"></a></li>
  </ul></div>

<div id="box1"><a href="compare.php"><img src="/images/financing.jpg" border="0" alt="Financing Option"></a></div>
<div id="box2"><a href="why-maxlife.php?id=<?php echo $id; ?>"><img src="/images/asseenon.gif" alt="Watch our TV Commercial" border="0"></a></div>
<div id="box3"><a href="details.php?id=<?php echo $id; ?>&pid=111"><img src="/images/try_samples.jpg" border="0" alt="Try Samples"></a></div>
<div class="menuitems"><a href="index.php?id=<?php echo $id; ?>">HOME</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="food-storage.php?id=<?php echo $id; ?>">FOOD STORAGE</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="supplemental.php?id=<?php echo $id; ?>">ADD-ONS (MEAT...)</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="seeds.php?id=<?php echo $id; ?>">SEEDS</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="compare.php?id=<?php echo $id; ?>">COMPARE</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="faq.php?id=<?php echo $id; ?>">FAQ</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="why-maxlife.php?id=<?php echo $id; ?>">WHY MAXLIFE?</b></a></div>
<a style="display:block;position:relative;top:-330px;left:80px;width:690px;height:300px;background-color:transparent;" href="/food-storage.php"></a>
</div>

<div id="container2">
				<table align="center" border="0" cellpadding="10" cellspacing="10">
						<tr>
                        <td style="vertical-align: text-top;">
                        		<a href="meat.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/meat.jpg" alt="" /></a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="fruit.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/fruit.jpg" alt="" /></a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="veg.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/veg.jpg" alt="" /></a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="dairy.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/dairyeggs.jpg" alt="" /></a><br /><br />
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

<div id="containerfooter"><span id="indexfooter">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://verify.authorize.net/anetseal/?pid=6a6313b8-1f03-4eaa-9a4f-39b386e72824&rurl=http%3A//www.maxlifefoods.com/contact.php%3Fid%3D" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
							<!--<a href="MaxLifeFoodsBrochure.pdf"><b>PRICE BROCHURE</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;-->
							<a href="index.php?id=<?php echo $id; ?>">HOME</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="food-storage.php?id=<?php echo $id; ?>">FOOD STORAGE</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="supplemental.php?id=<?php echo $id; ?>">FRUIT/VEG/DAIRY</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="seeds.php?id=<?php echo $id; ?>">SEEDS</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="compare.php?id=<?php echo $id; ?>">COMPARE</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="privacy.php?id=<?php echo $id; ?>">PRIVACY</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="terms.php?id=<?php echo $id; ?>">TERMS</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="contact.php?id=<?php echo $id; ?>">CONTACT</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="faq.php?id=<?php echo $id; ?>">FAQ</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="why-maxlife.php?id=<?php echo $id; ?>">WHY MAXLIFE?</a></span>
                    	
                    	
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
