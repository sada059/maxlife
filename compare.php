<?php
error_reporting(0);
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

<?php include_once("includes/head.php") ?>
<?php include_once("analyticstracking.php") ?>
</head>
<body>

<?php include_once("includes/header.php") ?>

 <div class="container">
            <div class="row">
                <div class="col-md-6" style="padding: 0"> <h2>The Best Value In Long Term Food Storage</h2></div>
            <div class="col-md-6"> <a href="food-storage-calculator.php?id=<?php echo $id; ?>"><img src="images/icons/family-foodstorage-calculator.png" class="push-right"></a></div>
        </div>
 </div>

    <div class="container">
        <div class="center">
                    <a href="/food-storage.php" border="0"><img src="images/foodstorage_topimage2.gif"></a>
        </div>
                        <div class="row no-margin">

                <h1>Compare MaxLife Gourmet Food Storage</h1>

                <div class="row">
                    <div class="col-md-2">
                        <img src="images/25year.gif">
                    </div>
                    <div class="col-md-10">
                        <p>See our price comparison below.  Not only are you spending less money per serving than other major brands, but you're also spending a lot less money per actual meal, and per 2000 calories, even with their high percentages of filler servings like drinks and desserts. <br> <a href="food-storage.php?id=<?php echo $id; ?>">Click here to view our food storage products</a>.</p>
                    </div>
                </div>     <div class="row" style="margin-top: 20px">
                        <div class="col-md-1"><img src="images/icon_fillers.gif"></div>
                        <div class="col-md-5"><font class="smallhead">Fewer Filler (Non-Meal) Servings</font><br /><font class="smalldesc">We fill our servings numbers with meals, not cheap drinks and desserts.  Competitors fill their packages with up to 69% non-meal servings.</font>
                        </div>
                        <div class="col-md-1">
                            <img src="images/icon_ship.gif"></div>
                        <div class="col-md-5"><font class="smallhead">Free Shipping</font><br /><font class="smalldesc">We offer free shipping on EVERY order in 48 U.S. states. No minimums.</font>
                        </div>
                    </div>
					
                    <div class="row"><div class="col-md-1"><img src="images/icon_cost.gif"></div>
                        <div class="col-md-5"><font class="smallhead">Lower Cost Per Serving</font><br /><font class="smalldesc">Despite offering more meal servings, our price per serving is still lower than the competition.</font></div><div class="col-md-1"><img src="images/icon_taste.gif"></div><div class="col-md-5"><font class="smallhead">Better Tasting</font><br /><font class="smalldesc">Rated independently at 85% for taste.  Compare to 57% competitor rating.</font></div></div>

                        <div class="row"><div class="col-md-1"><img src="images/icon_calories.gif"></div>
                            <div class="col-md-5"><font class="smallhead">Lower Cost Per 2000 Calories</font><br /><font class="smalldesc">Servings with low calorie count won't last in a food emergency.  Our servings get you closer to your required daily calorie intake.</font></div>
                            <div class="col-md-1"><img src="images/icon_convenient.gif"></div>
                            <div class="col-md-5"><font class="smallhead">More Convenient</font><br /><font class="smalldesc">Faster time to ship, resealable pouches. Some of our competitors don't even offer stackable & resuable buckets or just-add-water meals.</font></div></div>				  
<br>
<!--
					<table id="comparison">
					<div class="row">
					  <th>&nbsp;</th>
					  <th width="130">MaxLife</th>
					  <th width="130">Food Insurance</th>
					  <th width="130">Daily Bread</th>
					  <th width="130">eFoods</th>
					</tr>
					<div class="row">
					<td>Package Name</td>
					<td class="focus"><a href="http://www.maxlifefoods.com/details.php?pid=4106"><u>6 Mo. Family Pack</u></a></td>
					<td>Basic 3-Month</td>
					<td>6 Mo Basic Plan</td>
					<td>1 Year Food Supply</td>
					</tr>
					<div class="row" class="alt">
					<td>Retail Cost (w/ship)</td>
					<td class="focus">$1,699.99</td>
					<td>$1,839.99</td>
					<td>Call ($2100 Sale Ended)</td>
					<td>$2,446.22</td>
					</tr>
					<div class="row">
					<td>Meal Servings (non-meals excluded)</td>
					<td class="focus">1,200</td>
					<td>582</td>
					<td>740</td>
					<td>1,296</td>
					</tr>
					<div class="row" class="alt">
					<td>Total Calories (including non-meals)</td>
					<td class="focus">333,000</td>
					<td>297,140</td>
					<td>324,000</td>
					<td>385,440</td>
					</tr>
					<div class="row">
					<td>% of servings are non-meals</td>
					<td class="focus">16%</td>
					<td>69%</td>
					<td>61%</td>
					<td>43%</td>
					</tr>
					<div class="row" class="alt">
					<td>Avg Calories Per Serving</td>
					<td class="focus">231</td>
					<td>143</td>
					<td>168</td>
					<td>167</td>
					</tr>
					<div class="row">
					<td># of 2000 Calorie Days</td>
					<td class="focus">166</td>
					<td>148</td>
					<td>162</td>
					<td>192.72</td>
					</tr>
					<div class="row" class="alt">
					<td># of 2000 Calorie Meal Days</td>
					<td class="focus">151</td>
					<td>70</td>
					<td>82</td>
					<td>116</td>
					</tr>
					<div class="row">
					<td>Cost Per 2000 Calories (including non-meals)</td>
					<td class="focus">$10.21</td>
					<td>$12.38</td>
					<td>$12.96</td>
					<td>$12.69</td>
					</tr>
					<div class="row" class="alt">
					<td>Stackable Storage Buckets</td>
					<td class="focus"><img src="/images/check_green.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					</tr>
					<div class="row">
					<td>Convenient Resealable Pouches</td>
					<td class="focus"><img src="/images/check_green.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					</tr>
					<div class="row" class="alt">
					<td>Oxygen Absorbers in Every Pouch</td>
					<td class="focus"><img src="/images/check_green.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					</tr>
					<div class="row">
					<td>Free Shipping</td>
					<td class="focus"><img src="/images/check_green.png"></td>
					<td>Over $1000</td>
					<td><img src="/images/no_red.png"></td>
					<td><img src="/images/no_red.png"></td>
					</tr>
					<div class="row" class="alt">
					<td>Time to Ship</td>
					<td class="focus">2-5 Bus. Days</td>
					<td>9-13 Bus. Days</td>
					<td>9-13 Bus. Days</td>
					<td>10-14 Bus. Days</td>
					</tr>
					</table>
					<br>-->
<div class="row">
            <div class="center">
                <a href="http://www.maxlifefoods.com/details.php?pid=4110" ><img src="images/compare120.gif" border="0"></a>
      </div>
</div>
<br>

               <div class="row no-margin">
            <div class="col-md-6 col-xs-12 col-sm-12 storage-box blue">
                <h2>Individual Buckets</h2>
                <h3>Individual &  Supplementaal Buckets</h3>
                <p>Sampler Kit<br>
                    1 Mo. Family Dinners<br>
                    1 Mo. Family Breakfasts<br>
                    Add-Ons (Meat,Fruit...)</p>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-12 storage-box green">
                <h2>Basic Family Packs</h2>
                <h3>2 Meals Per Day for 4 Individuals</h3>
                <p>1 Mo. Family Pack     		&nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp;    		$335<br>
                    3 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$929<br>
                    6 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$1699<br>
                    1Yr. Family Pack		&nbsp; &nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$3199</p>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col-md-6 col-xs-12 col-sm-12 storage-box red">
                <h2>Deluxe Family Packs</h2>
                <h3>3 Meals Per Day for 4 Individuals</h3>
                <p>1 Mo. Family Pack     		&nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp;    		$479<br>
                    3 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$1299<br>
                    6 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$2499<br>
                    1Yr. Family Pack		&nbsp; &nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$4499</p>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-12 storage-box maroon">
                <h2>Basic Family Packs</h2>
                <h3>2 Meals Per Day for 4 Individuals</h3>
                <p>
                    3 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$1349<br>
                    6 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$2499<br>
                    1Yr. Family Pack		&nbsp; &nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	4$599<br>
                 &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp;	</p>
            </div>
        </div>

                      <section id="product" style="margin-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-md-3 home-product">
                    <a href="meat.php?id=<?php echo $id; ?>"> <img src="images/product/product1.jpg">
                    <div class="home-product-title">ADD-ONS (MEAT)<span class="plus-icon"><img src="images/icons/plus_icon.png"></span> </div></a>
                </div>
                <div class="col-md-3 home-product">
                    <a href="fruit.php?id=<?php echo $id; ?>"><img src="images/product/product2.jpg">
                    <div class="home-product-title">ADD-ONS (FRUIT)<span class="plus-icon"><img src="images/icons/plus_icon.png"></span> </div></a>
                </div>
                <div class="col-md-3 home-product">
                    <a href="veg.php?id=<?php echo $id; ?>"><img src="images/product/product3.jpg">
                    <div class="home-product-title">ADD-ONS (VEG)<span class="plus-icon"><img src="images/icons/plus_icon.png"></span> </div></a>
                </div>
                <div class="col-md-3 home-product">
                    <a href="dairy.php?id=<?php echo $id; ?>"><img src="images/product/product4.jpg">
                    <div class="home-product-title">ADD-ONS (EGGS)<span class="plus-icon"><img src="images/icons/plus_icon.png"></span> </div></a>
                </div>
            </div>
        </div>
                      </section>
					<br />
                                        <div align="center" class="smallhead"><a href="food-storage.php?id=<?php echo $id; ?>" style="margin-bottom: 10%">Click here to view our food storage products</a>.</div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a href="details.php?id=<?php echo $id; ?>&pid=111"><img src="images/try_samples.jpg" border="0"></a></div>
                                            <div class="col-md-10" style="margin: 2% 0 10% 0">
					<a href="details.php?id=<?php echo $id; ?>&pid=111">Click to try</a> some samples of our gourmet just-add-water food storage.  We're sure you'll fall in love with the great taste of gourmet MaxLife Foods.  You want your food storage to not only be there when you need it, but also for your family to enjoy it.
					<br /><br />Sample our fruit mix, apple blueberry granola, hearty potato soup & cheddar broccoli soup.  Sample pack of the MaxLife Basic and Deluxe entree/breakfast line. LIMIT ONE PER CUSTOMER. 25 year shelf life.</div></div>
					
					<!--<table align="center" border="0" cellpadding="10" cellspacing="10">
						<div class="row">
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
                        <td style="vertical-align: text-top;">
                        		<a href="dairy.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/dairyeggs.jpg" alt="" /></a><br /><br />
                        </td>
                    </tr>
					</table>-->
                </div>
                <div style="clear: both;"></div>
        	</div>

        
<?php include_once("includes/footer.php") ?>
<?php include_once("googlefooter.php") ?>
</body>
</html>