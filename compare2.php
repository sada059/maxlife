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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Compare MaxLife Food Storage | MaxLifeFoods</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" />

<script src="/js/jquery-1.3.2.min.js" content="text/javascript"></script>
<script type="text/javascript">

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
<?php include_once("analyticstracking.php") ?>
</head>
<body>

<div id="content">

<?php include_once("header.php") ?>

        <div class="subbody2" style="height: 2500px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>The Best Value In Long Term Food Storage</h1>
        			
        			<div>
                    <a href="/food-storage.php" border="0"><img src="/images/foodstorage_topimage2.gif"></a>
                    </div>

                <h1>Compare MaxLife Gourmet Food Storage</h1>


					<table id="comparison">
					<tr>
					  <th>&nbsp;</th>
					  <th width="130">MaxLife</th>
					  <th width="130">Food Insurance</th>
					  <th width="130">Daily Bread</th>
					  <th width="130">eFoods</th>
					</tr>
					<tr>
					<td>Package Name</td>
					<td class="focus"><a href="http://www.maxlifefoods.com/details.php?pid=4106"><u>6 Mo. Family Pack</u></a></td>
					<td>Basic 3-Month</td>
					<td>6 Mo Basic Plan</td>
					<td>1 Year Food Supply</td>
					</tr>
					<tr class="alt">
					<td>Retail Cost (w/ship)</td>
					<td class="focus">$1,699.99</td>
					<td>$1,839.99</td>
					<td>Call ($2100 Sale Ended)</td>
					<td>$2,446.22</td>
					</tr>
					<tr>
					<td>Meal Servings (non-meals excluded)</td>
					<td class="focus">1,200</td>
					<td>582</td>
					<td>740</td>
					<td>1,296</td>
					</tr>
					<tr class="alt">
					<td>Total Calories (including non-meals)</td>
					<td class="focus">333,000</td>
					<td>297,140</td>
					<td>324,000</td>
					<td>385,440</td>
					</tr>
					<tr>
					<td>% of servings are non-meals</td>
					<td class="focus">16%</td>
					<td>69%</td>
					<td>61%</td>
					<td>43%</td>
					</tr>
					<tr class="alt">
					<td>Avg Calories Per Serving</td>
					<td class="focus">231</td>
					<td>143</td>
					<td>168</td>
					<td>167</td>
					</tr>
					<tr>
					<td># of 2000 Calorie Days</td>
					<td class="focus">166</td>
					<td>148</td>
					<td>162</td>
					<td>192.72</td>
					</tr>
					<tr class="alt">
					<td># of 2000 Calorie Meal Days</td>
					<td class="focus">151</td>
					<td>70</td>
					<td>82</td>
					<td>116</td>
					</tr>
					<tr>
					<td>Cost Per 2000 Calories (including non-meals)</td>
					<td class="focus">$10.21</td>
					<td>$12.38</td>
					<td>$12.96</td>
					<td>$12.69</td>
					</tr>
					<tr class="alt">
					<td>Stackable Storage Buckets</td>
					<td class="focus"><img src="/images/check_green.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					</tr>
					<tr>
					<td>Convenient Resealable Pouches</td>
					<td class="focus"><img src="/images/check_green.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					</tr>
					<tr class="alt">
					<td>Oxygen Absorbers in Every Pouch</td>
					<td class="focus"><img src="/images/check_green.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					</tr>
					<tr>
					<td>Free Shipping</td>
					<td class="focus"><img src="/images/check_green.png"></td>
					<td>Over $1000</td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					</tr>
					<tr class="alt">
					<td>Time to Ship</td>
					<td class="focus">2-5 Bus. Days</td>
					<td>9-13 Bus. Days</td>
					<td>9-13 Bus. Days</td>
					<td>10-14 Bus. Days</td>
					</tr>
					</table>
					<br>
					<table border="0" align="center"><tr><td><a href="http://www.maxlifefoods.com/details.php?pid=4110"><img src="/images/compare120.gif" border="0"></a></td><!--<td><a href="http://www.maxlifefoods.com/details.php?pid=4106"><img src="/images/compare1440.gif" border="0"></a></td>--></tr></table>
<br>

                    <div id="foodstoragelist">
                    	<div id="column1"><ul><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=111">Sampler Kit</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4110">1 Mo. Family Dinners</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4109">1 Mo. Family Breakfasts</a></li><li><a href="http://maxlifefoods.com/supplemental.php?id=<?php echo $id; ?>">Add-Ons (Meat,Fruit...)</a></li></ul></div>
                    	<div id="column2"><ul><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4108">1 Mo. Family Pack - $335</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4107">3 Mo. Family Pack - $929</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4106">6 Mo. Family Pack - $1699</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4105">1 Yr. Family Pack - $3199</a></li></ul></div>
                    	<div id="column3"><ul><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4208">1 Mo. Family Pack - $479</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4207">3 Mo. Family Pack - $1299</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4206">6 Mo. Family Pack - $2499</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4205">1 Yr. Family Pack - $4499</a></li></ul></div>
                    	<div id="column4"><ul><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=651651">3 Mo. Family Pack - $1349</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=654981">6 Mo. Family Pack - $2499</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=987564">1 Yr. Family Pack - $4499</a></li></ul></div>
                    </div>
                    <br /><br />
					<table align="center" border="0" cellpadding="10" cellspacing="10">
						<tr>
                    	<!--<td style="vertical-align: text-top;">
                        		<a href="food-storage.php?id=<?php echo $id; ?>"><img border="0" src="/images/foodstorage.jpg" alt="" /></a><br /><br />
                        </td>-->
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
					</table><table border="0" cellspacing="3" cellpadding="3">
					<tr><td colspan="4" class="smallhead"><table border="0"><tr><td><img src="/images/25year.gif"></td><td class="smallhead">See our comparison chart.  Not only are you spending less money per serving than other major brands, but you're also spending a lot less money per actual meal, and per 2000 calories, even with their high percentages of filler servings like drinks and desserts.  <a href="food-storage.php?id=<?php echo $id; ?>">Click here to view our food storage products</a>.</td></tr></table></td><td rowspan="6"><a href="details.php?id=<?php echo $id; ?>&pid=4108"><img src="/images/2buckets_stacked_logo.gif"></a></td></tr>
					<tr><td align="right"><img src="/images/icon_fillers.gif"></td><td><font class="smallhead">Fewer Filler (Non-Meal) Servings</font><br /><font class="smalldesc">We fill our servings numbers with meals, not cheap drinks and desserts.  Competitors fill their packages with up to 69% non-meal servings.</font></td><td align="right"><img src="/images/icon_ship.gif"></td><td><font class="smallhead">Free Shipping</font><br /><font class="smalldesc">We offer free shipping on EVERY order in 48 U.S. states. No minimums.</font></td></tr>
					<tr height="3"><td></td><td></td><td></td><td></td></tr>
					<tr><td align="right"><img src="/images/icon_cost.gif"></td><td><font class="smallhead">Lower Cost Per Serving</font><br /><font class="smalldesc">Despite offering more meal servings, our price per serving is still lower than the competition.</font></td><td align="right"><img src="/images/icon_taste.gif"></td><td><font class="smallhead">Better Tasting</font><br /><font class="smalldesc">Rated independently at 85% for taste.  Compare to 57% competitor rating.</font></td></tr>
					<tr height="3"><td></td><td></td><td></td><td></td></tr>
					<tr><td align="right"><img src="/images/icon_calories.gif"></td><td><font class="smallhead">Lower Cost Per 2000 Calories</font><br /><font class="smalldesc">Servings with low calorie count won't last in a food emergency.  Our servings get you closer to your required daily calorie intake.</font></td><td align="right"><img src="/images/icon_convenient.gif"></td><td><font class="smallhead">More Convenient</font><br /><font class="smalldesc">Faster time to ship, resealable pouches. Some of our competitors don't even offer stackable & resuable buckets or just-add-water meals.</font></td></tr>
					<tr height="3"><td></td><td></td><td></td><td></td></tr>
					</table>                


					<br />
					<div align="center" class="smallhead"><a href="food-storage.php?id=<?php echo $id; ?>">Click here to view our food storage products</a>.</div>
					<table border="0"><tr><td><a href="details.php?id=<?php echo $id; ?>&pid=111"><img src="/images/try_samples.jpg" border="0"></a></td><td class="smallhead">
					<a href="details.php?id=<?php echo $id; ?>&pid=111">Click to try</a> some samples of our gourmet just-add-water food storage.  We're sure you'll fall in love with the great taste of gourmet MaxLife Foods.  You want your food storage to not only be there when you need it, but also for your family to enjoy it.
					<br /><br />35 sample servings that include our fruit mix, apple blueberry granola, hearty potato soup & cheddar broccoli soup.  Highly discounted sample pack of the MaxLife entree/breakfast line. LIMIT ONE PER CUSTOMER. 25 year shelf life.</td></tr>
					</table>
					<table align="center" border="0" cellpadding="10" cellspacing="10">
						<tr>
                    	<!--<td style="vertical-align: text-top;">
                        		<a href="food-storage.php?id=<?php echo $id; ?>"><img border="0" src="/images/foodstorage.jpg" alt="" /></a><br /><br />
                        </td>-->
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
                </div>
                <div style="clear: both;"></div>
        	</div>
        </div>
        
<?php include_once("footer.php") ?>
        
</div>
<?php include_once("googlefooter.php") ?>
</body>
</html>