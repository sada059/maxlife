<?php
	include("includes/db.php");
	include("includes/functions.php");
	
	$id = $_GET['id'];
	$pid = $_GET['pid'];

    if ($id == '') {
        session_start();
        if(isset($_SESSION['id']))
          $id = $_SESSION['id'];
    }
    if ($id == '') {
  		$id = $_COOKIE['id'];
    }
	
	$query = "SELECT * FROM products WHERE product_key='$pid'";
	$run = mysql_query($query);
	$info = mysql_fetch_assoc($run);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title><?php echo $info['product_name']; ?> | MaxLifeFoods</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" />

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
<?php include_once("analyticstracking.php") ?>
<div id="content">

<?php include_once("header.php") ?>

        <div class="subbody2" style="height: 3000px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
                <?php $pps = $info['product_price']/$info['servings']; ?>
        			<h1><?php echo $info['product_name']; ?> <?php if ($pps == 0){ }else {$number = $pps; setlocale(LC_MONETARY, 'en_US'); echo "- ".money_format('%(#10n', $number)."/Serving"; } ?></h1>
                    <table border="0"><tr><td valign="top" width="350" align="center"><img border="0" src="/images/product/big<?php echo $info['product_image']; ?>" alt="" align="center" style="padding-right: 10px;" /><br \>
                    <table border="0" cellpadding="3" cellspacing="3">
                    <?php if ($info['product_category'] == 10) { ?>
                    <tr><td align="right"><img src="/images/icon_fillers.gif"></td><td><font class="smallhead">Fewer Filler (Non-Meal) Servings</font><br \><font class="smalldesc">We fill our servings numbers with meals, not cheap drinks and desserts.  Competitors fill their packages with up to 69% non-meal servings.</font></td></tr>
                    <?php } ?>
                    <tr><td align="right"><img src="/images/icon_ship.gif"></td><td><font class="smallhead">Free Shipping</font><br \><font class="smalldesc">We offer free shipping on EVERY order in 48 U.S. states. No minimums.</font></td></tr>
                    </table></td>
                    <td valign="top">
                    <table border="0"><tr><td valign="top"><h1><?php $number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?><br>
					<input type="image" style="border:none;float:left" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']?>&q=1&price=<?php echo $info['product_price']?>'" name="myclicker" src="/images/add_to_cart.jpg" ></h1>
						<br>
						<h1>Product Information:</h1>
						</td><td><?php if ($info['product_category'] == 10 or $info['product_category'] == 6 or $info['product_category'] == 5) { ?>
						<img src="/images/25year.gif">"
						<?php }?></td>
						</tr></table>					
                    <p style="text-align: justify;" class="smallhead"><?php echo $info['product_desc']; ?></p>
                    </td></tr></table>

                    <?php if ($info['showmenu'] == 'main') { ?>
                    <br><a href="food-storage.php?id=<?php echo $id; ?>">CLICK HERE to view more packages</a>
                    <?php } ?>
                    <?php if ($info['showmenu'] == 'fruit') { ?>
                    <br><a href="supplemental.php?id=<?php echo $id; ?>">CLICK HERE to view more FRUIT packages</a>
                    <?php } ?>
                    <?php if ($info['showmenu'] == 'meat') { ?>
                    <br><a href="supplemental.php?id=<?php echo $id; ?>">CLICK HERE to view more MEAT packages</a>
                    <?php } ?>
                    <?php if ($info['showmenu'] == 'veggie') { ?>
                    <br><a href="supplemental.php?id=<?php echo $id; ?>">CLICK HERE to view more VEGETABLE packages</a>
                    <?php } ?>

                    <table id="extragallery" width="100%" style="text-align: center; margin: auto;">
                    <?php
						  $suggest = $info['suggest'];            
                    if ($suggest === NULL) { 
                    	} else { 
                    		$items = explode(' ', $suggest);
	                    ?>
	                    <tr><td style="vertical-align: text-top;" colspan="5">
	                    <h1>You also may be interested in:</h1>
								<table cellpadding="6" style="text-align: center; margin: auto;">
								<tr>
								<?php if ($info['product_category'] == '10') { ?>
									  <td style="vertical-align: text-top;">
	                        			<a href="meat.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/meat.jpg" alt="" /></a><br /><br />
		                        </td>
		                        <td style="vertical-align: text-top;">
		                        		<a href="fruit.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/fruit.jpg" alt="" /></a><br /><br />
		                        </td>
		                        <td style="vertical-align: text-top;">
		                        		<a href="veg.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/veg.jpg" alt="" /></a><br /><br />
		                        </td>
		                   <?php
								}
								else
								{ 	foreach($items as $key) {
										$query2 = "SELECT * FROM products WHERE product_key='$key'";
										$run2 = mysql_query($query2);
										$info2 = mysql_fetch_assoc($run2);
										?>
										<td><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info2['product_key']; ?>"><img border="0" src="/images/product/<?php echo $info2['product_image']; ?>" width="135" height="135" alt="<?php echo $info2['product_name2']; ?>" /></a><br><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info2['product_key']; ?>"><?php echo $info2['product_name']; ?><br><?php echo money_format('%(#10n',$info2['product_price']); ?></a></td>
									<?php }} ?>
								</tr>					
								</table>
								</td></tr>
						   <?php } ?>
                     <?php if ($info['showmenu'] == 'main'){ 
              			$num_breakfast_servings = ($info['servings'] / 2) / 3;
              			$num_entree_servings = ($info['servings'] / 2) / 10; ?>
                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=rotini"><img border="0" src="/images/menu/creamy_pasta_retouch_72dpi_4.jpg" alt="" /><br /> Creamy Pasta & Veg<br />Rotini</a> (<?php echo $num_entree_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=cheesy_lasagna_1">	<img border="0" src="/images/menu/lasagna_retouch_72_dpi_5.jpg" alt="" /><br />Cheesy Lasagna</a><br>(<?php echo ($num_entree_servings/3)*2 ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=teriyaki"><img border="0" src="/images/menu/teriyaki_and_rice_retouch_72dpi_4.jpg" alt="" /><br />Teriyaki and Rice</a><br>(<?php echo ($num_entree_servings/3) ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=pot_pie"><img border="0" src="/images/menu/wise-potpie.jpg" alt="" /><br />Potato/Chicken Flvr<br>Pot Pie</a> (<?php echo ($num_entree_servings/3)*2 ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=pasta_alfredo"><img border="0" src="/images/menu/pasta_alfredo_retouch_72dpi_5.jpg" alt="" /><br />Pasta Alfredo</a><br>(<?php echo ($num_entree_servings/3)*2 ?> servings)<br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=savory_stroganoff">	<img border="0" src="/images/menu/stroganoff_retouch_72dpi_6.jpg" alt="" /><br />Savory Stroganoff</a><br>(<?php echo $num_entree_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cheesy_macaroni"><img border="0" src="/images/menu/cheesy_mac_garnish_retouch_72dpi_3.jpg" alt="" /><br />Cheesy Macaroni</a><br>(<?php echo ($num_entree_servings/3)*2 ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=chili_macaroni"><img border="0" src="/images/menu/chili_mac_retouch_72dpi_4.jpg" alt="" /><br />Chili Macaroni</a><br>(<?php echo ($num_entree_servings/3)*2 ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=tortilla"><img border="0" src="/images/menu/tortilla_soup_retouch_72dpi_1_2.jpg" alt="" /><br />Hearty Tortilla Soup</a><br>(<?php echo ($num_entree_servings/3)*2 ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=basil">	<img border="0" src="/images/menu/tomato_basil_retouch_2.jpg" alt="" /><br />Tomato Basil Soup</a><br>(<?php echo $num_entree_servings ?> servings)<br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=noodle_soup">	<img border="0" src="/images/menu/wise-chicken-soup.jpg" alt="" /><br />Chicken Flvr Noodle<br>Soup</a> (<?php echo $num_entree_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=potato"><img border="0" src="/images/menu/wise-baked-potato.jpg" alt="" /><br />Loaded Baked Potato<br>Cassarole</a> (<?php echo ($num_entree_servings/3)*2 ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=sw_beans_rice"><img border="0" src="/images/menu/wise-swricebeans.jpg" alt="" /><br />Southwest Beans &<br>Rice</a> (<?php echo $num_entree_servings ?> servings)<br /><br />
                        </td>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=apple"><img border="0" src="/images/menu/apple_cinnamon_retouch_5.jpg" alt="" /><br />Apple Cinnamon</a><br>(<?php echo $num_breakfast_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=granola">	<img border="0" src="/images/menu/granola_retouch_2.jpg" alt="" /><br />Crunchy Granola</a><br>(<?php echo $num_breakfast_servings/2 ?> servings)<br /><br />
                        </td>
                    </tr>
                    <tr>

                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=multi-grain"><img border="0" src="/images/menu/multi-grain_retouch_2_3.jpg" alt="" /><br />Multi-grain Cereal</a><br>(<?php echo $num_breakfast_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;
                        	<a href="nutrition.php?i=strawberry"><img border="0" src="/images/menu/wise-strawberry-granola.jpg" alt="" /><br />Strawberry Granola</a><br>(<?php echo $num_breakfast_servings/2 ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                    </tr>
				</table>
                <?php } ?>



                     <?php if ($info['showmenu'] == 'maxlife'){ 
              			$num_high_servings = ($info['servings'] / 240) * 20;
              			$num_low_servings = ($info['servings'] / 240) * 10; ?>
                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>
                  <tr>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=westernchili">	<img border="0" src="/images/menu/western_chili_m.jpg" alt="" /><br />Western Chili</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=instantpotatoes">	<img border="0" src="/images/menu/instant_potatoes_m.jpg" alt="" /><br />Instant Potatoes</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cheesypasta"><img border="0" src="/images/menu/cheesy_pasta_m.jpg" alt="" /><br />Cheesy Pasta</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=redbeansrice">	<img border="0" src="/images/menu/red_beans_rice_m.jpg" alt="" /><br />Red Beans & Rice</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=cheddarbroccolisoup"><img border="0" src="/images/menu/cheddar_broccoli_soup_m.jpg" alt="" /><br />Cheddar Broccoli Soup</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                  </tr>
                  <tr>
                  		  <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=cheddarbroccolirice"><img border="0" src="/images/menu/cheddar_broccoli_rice_m.jpg" alt="" /><br />Cheddar Broccoli Rice</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=heartypotatosoup"><img border="0" src="/images/menu/hearty_potato_soup_m.jpg" alt="" /><br />Hearty Potato Soup</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=beefflavoredvegstew"><img border="0" src="/images/menu/beef_flavored_veg_stew_m.jpg" alt="" /><br />Beef Flavored Veg<br>Stew</a> (<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=oatmeal"><img border="0" src="/images/menu/oatmeal_m.jpg" alt="" /><br />Brown Sugar &<br>Cinnamon Oatmeal</a> (<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=strawberrybananaoatmeal"><img border="0" src="/images/menu/strawberry_banana_oatmeal_m.jpg" alt="" /><br />Strawberry Banana<br>Oatmeal</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=naturalgranola"><img border="0" src="/images/menu/natural_granola_m.jpg" alt="" /><br />Natural Granola</a><br> (<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=appleblueberrygranola">	<img border="0" src="/images/menu/apple_blueberry_granola_m.jpg" alt="" /><br />Apple Blueberry<br>Granola</a> (<?php echo ($num_high_servings) ?> servings)<br /><br />
                        </td>
                        
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=ricepudding"><img border="0" src="/images/menu/rice_pudding_m.jpg" alt="" /><br />Cinnamon & Rice<br>Pudding</a> (<?php echo ($num_high_servings) ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=regularwheymilk"><img border="0" src="/images/menu/regular_whey_milk_m.jpg" alt="" /><br />Regular Whey Milk</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=chocolatewheymilk"><img border="0" src="/images/menu/chocolate_whey_milk_m.jpg" alt="" /><br />Chocolate Whey Milk</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                    </tr>
				</table>
                <?php } ?>
                
                
                
                   <?php if ($info['showmenu'] == 'mbreakfast'){ 
              			$num_high_servings = ($info['servings'] / 120) * 20;
              			$num_low_servings = ($info['servings'] / 120) * 10; ?>
                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>

                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=naturalgranola"><img border="0" src="/images/menu/natural_granola_m.jpg" alt="" /><br />Natural Granola</a><br> (<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=appleblueberrygranola">	<img border="0" src="/images/menu/apple_blueberry_granola_m.jpg" alt="" /><br />Apple Blueberry<br>Granola</a> (<?php echo ($num_high_servings) ?> servings)<br /><br />
                        </td>
                        
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=ricepudding"><img border="0" src="/images/menu/rice_pudding_m.jpg" alt="" /><br />Cinnamon & Rice<br>Pudding</a> (<?php echo ($num_high_servings) ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=regularwheymilk"><img border="0" src="/images/menu/regular_whey_milk_m.jpg" alt="" /><br />Regular Whey Milk</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=chocolatewheymilk"><img border="0" src="/images/menu/chocolate_whey_milk_m.jpg" alt="" /><br />Chocolate Whey Milk</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=oatmeal"><img border="0" src="/images/menu/oatmeal_m.jpg" alt="" /><br />Brown Sugar &<br>Cinnamon Oatmeal</a> (<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=strawberrybananaoatmeal"><img border="0" src="/images/menu/strawberry_banana_oatmeal_m.jpg" alt="" /><br />Strawberry Banana<br>Oatmeal</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                  </tr>
				</table>
                <?php } ?>
                
                   <?php if ($info['showmenu'] == 'mentree'){ 
              			$num_high_servings = ($info['servings'] / 120) * 20;
              			$num_low_servings = ($info['servings'] / 120) * 10; ?>
                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>
                  <tr>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=westernchili">	<img border="0" src="/images/menu/western_chili_m.jpg" alt="" /><br />Western Chili</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=instantpotatoes">	<img border="0" src="/images/menu/instant_potatoes_m.jpg" alt="" /><br />Instant Potatoes</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cheesypasta"><img border="0" src="/images/menu/cheesy_pasta_m.jpg" alt="" /><br />Cheesy Pasta</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=redbeansrice">	<img border="0" src="/images/menu/red_beans_rice_m.jpg" alt="" /><br />Red Beans & Rice</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=cheddarbroccolisoup"><img border="0" src="/images/menu/cheddar_broccoli_soup_m.jpg" alt="" /><br />Cheddar Broccoli Soup</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                  </tr>
                  <tr>
                  		  <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=cheddarbroccolirice"><img border="0" src="/images/menu/cheddar_broccoli_rice_m.jpg" alt="" /><br />Cheddar Broccoli Rice</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=heartypotatosoup"><img border="0" src="/images/menu/hearty_potato_soup_m.jpg" alt="" /><br />Hearty Potato Soup</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=beefflavoredvegstew"><img border="0" src="/images/menu/beef_flavored_veg_stew_m.jpg" alt="" /><br />Beef Flavored Veg<br>Stew</a> (<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">&nbsp;</td>
                        <td style="vertical-align: text-top;">&nbsp;</td>
                  </tr>
				</table>
                <?php } ?>
                
                    <?php if ($info['showmenu'] == 'breakfast'){ ?>



                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=apple"><img border="0" src="/images/menu/apple_cinnamon_retouch_5.jpg" alt="" /><br />Apple Cinnamon</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=granola">	<img border="0" src="/images/menu/granola_retouch_2.jpg" alt="" /><br />Crunchy Granola</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=multi-grain"><img border="0" src="/images/menu/multi-grain_retouch_2_3.jpg" alt="" /><br />Multi-grain Cereal</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                       	<a href="nutrition.php?i=strawberry"><img border="0" src="/images/menu/wise-strawberry-granola.jpg" alt="" /><br />Strawberry Granola</a><br><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                    </tr>
				</table>
                <?php } ?>
                

                    <?php if ($info['showmenu'] == 'milk'){ ?>



                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>
                    <tr>

                        <td>&nbsp;
                        	
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=milk"><img border="0" src="/images/menu/milk.png" alt="" /><br />Long-Term Milk</a><br /><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                    </tr>
				</table>
                <?php } ?>
  
  
                      <?php if ($info['showmenu'] == 'eggs'){ ?>



                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>
                    <tr>
                    	
                        <td>&nbsp;
                        	
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=eggs"><img border="0" src="/images/menu/eggs.png" alt="" /><br />Long-Term Instant Eggs</a><br /><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                    </tr>
				</table>
                <?php } ?>
                
                              
                
                    <?php if ($info['showmenu'] == 'entree'){ ?>
                    <p>&nbsp;</p>

                     <table id="extragallery" style="text-align: center; margin: auto;">
                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=rotini"><img border="0" src="/images/menu/creamy_pasta_retouch_72dpi_4.jpg" alt="" /><br /> Creamy Pasta & Veg<br />Rotini</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=cheesy_lasagna_1">	<img border="0" src="/images/menu/lasagna_retouch_72_dpi_5.jpg" alt="" /><br />Cheesy Lasagna</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=teriyaki"><img border="0" src="/images/menu/teriyaki_and_rice_retouch_72dpi_4.jpg" alt="" /><br />Teriyaki and Rice</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=pot_pie"><img border="0" src="/images/menu/wise-potpie.jpg" alt="" /><br />Potato/Chicken Flvr<br>Pot Pie</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=pasta_alfredo"><img border="0" src="/images/menu/pasta_alfredo_retouch_72dpi_5.jpg" alt="" /><br />Pasta Alfredo</a><br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=savory_stroganoff">	<img border="0" src="/images/menu/stroganoff_retouch_72dpi_6.jpg" alt="" /><br />Savory Stroganoff</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cheesy_macaroni"><img border="0" src="/images/menu/cheesy_mac_garnish_retouch_72dpi_3.jpg" alt="" /><br />Cheesy Macaroni</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=chili_macaroni"><img border="0" src="/images/menu/chili_mac_retouch_72dpi_4.jpg" alt="" /><br />Chili Macaroni</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=tortilla"><img border="0" src="/images/menu/tortilla_soup_retouch_72dpi_1_2.jpg" alt="" /><br />Hearty Tortilla Soup</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=basil">	<img border="0" src="/images/menu/tomato_basil_retouch_2.jpg" alt="" /><br />Tomato Basil Soup</a><br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=noodle_soup">	<img border="0" src="/images/menu/wise-chicken-soup.jpg" alt="" /><br />Chicken Flvr Noodle<br>Soup</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=potato"><img border="0" src="/images/menu/wise-baked-potato.jpg" alt="" /><br />Loaded Baked Potato<br>Cassarole</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=sw_beans_rice"><img border="0" src="/images/menu/wise-swricebeans.jpg" alt="" /><br />Southwest Beans &<br>Rice</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	&nbsp;
                        </td>
                        <td style="vertical-align: text-top;">
                        &nbsp;
                        </td>
                    </tr>

				</table>
                <?php } ?>
                
                

                    <?php if ($info['showmenu'] == 'meat'){ 
                    			$num_rice_servings = ($info['servings'] / 4);
                    			$num_low_servings = ($info['servings'] - $num_rice_servings) / 7.5; 
                    			$num_high_servings = ($info['servings'] - $num_rice_servings) / 5; ?>


                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=m_stroganoff"><img border="0" src="/images/menu/stroganoff_beef_1_1.jpg" alt="" /><br /> Stroganoff Beef</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=m_teriyaki">	<img border="0" src="/images/menu/teriyaki_style_chicken_1_1.jpg" alt="" /><br />Teriyaki Style Chicken</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=m_southwest"><img border="0" src="/images/menu/southwest_sytle_chicken_1_1.jpg" alt="" /><br />Southwest Style Chicken</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=m_savory"><img border="0" src="/images/menu/savory_roasted_ground_beef_1_1.jpg" alt="" /><br />Savory Roasted Ground Beef</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=m_cheesy"><img border="0" src="/images/menu/cheesy_ground_beef_1_1.jpg" alt="" /><br />Cheesy Beef</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=m_rice">	<img border="0" src="/images/menu/rice_1_1.jpg" alt="" /><br />Long-Term Instant Rice</a><br>(<?php echo $num_rice_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=m_roasted"><img border="0" src="/images/menu/roasted_chicken_3_3.jpg" alt="" /><br />Roasted Chicken</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>                       
                        <td>&nbsp;
                        	
                        </td>                       
                        <td>&nbsp;
                        	
                        </td>                    
                    </tr>
				</table>
                <?php } ?>
                
                    <?php if ($info['showmenu'] == 'fruit'){  
                    			$num_low_servings = $info['servings'] / 7.5; 
                    			$num_high_servings = $info['servings'] / 5; ?>



                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=f_bananas"><img border="0" src="/images/menu/fruit_bananas.jpg" alt="" /><br /> Bananas</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=f_peaches">	<img border="0" src="/images/menu/fruit_peaches.png" alt="" /><br />Peaches</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=f_strawberries"><img border="0" src="/images/menu/fruit_strawberries.jpg" alt="" /><br />Strawberries</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=f_apples"><img border="0" src="/images/menu/fruit_apples.jpg" alt="" /><br />Apples</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=f_yogurt"><img border="0" src="/images/menu/fruit_yogurt.jpg" alt="" /><br />Creamy Yogurt Style Dessert</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=f_caramel">	<img border="0" src="/images/menu/fruit_caramel.jpg" alt="" /><br />Caramel Sauce</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=f_pudding"><img border="0" src="/images/menu/fruit_pudding.jpg" alt="" /><br />Vanilla Pudding</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>                       
                        <td>&nbsp;
                        	
                        </td>                       
                        <td>&nbsp;
                        	
                        </td>                    
                    </tr>
				</table>
                <?php } ?>




               <?php if ($info['showmenu'] == 'chicken'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=chicken"><img border="0" src="/images/menu/chicken_m.jpg" alt="" /><br />Diced Chicken</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
               <?php if ($info['showmenu'] == 'turkey'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=turkey"><img border="0" src="/images/menu/turkey_m.jpg" alt="" /><br />Diced Turkey</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                



               <?php if ($info['showmenu'] == 'beef'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=beef"><img border="0" src="/images/menu/beef_m.jpg" alt="" /><br />Ground Beef</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                <?php if ($info['showmenu'] == 'sausage'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=sausage"><img border="0" src="/images/menu/sausage_m.jpg" alt="" /><br />Ground Sausage</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                <?php if ($info['showmenu'] == 'apples'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=apples"><img border="0" src="/images/menu/apples_m.jpg" alt="" /><br />Freeze-Dried Apples</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                
                
                <?php if ($info['showmenu'] == 'bananas'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=bananas"><img border="0" src="/images/menu/bananas_m.jpg" alt="" /><br />Freeze-Dried Bananas</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'blackberry'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=blackberries"><img border="0" src="/images/menu/blackberries_m.jpg" alt="" /><br />Freeze-Dried Blackberries</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                
                
                <?php if ($info['showmenu'] == 'blueberry'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=blueberries"><img border="0" src="/images/menu/blueberries_m.jpg" alt="" /><br />Freeze-Dried Blueberries</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                <?php if ($info['showmenu'] == 'cherries'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cherries"><img border="0" src="/images/menu/cherries_m.jpg" alt="" /><br />Freeze-Dried Cherries</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'grapes'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=grapes"><img border="0" src="/images/menu/grapes_m.jpg" alt="" /><br />Freeze-Dried Grapes</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'mangoes'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=mangoes"><img border="0" src="/images/menu/mangoes_m.jpg" alt="" /><br />Freeze-Dried Mangoes</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'peaches'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=peaches"><img border="0" src="/images/menu/peaches_m.jpg" alt="" /><br />Freeze-Dried Peaches</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'pineapple'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=pineapples"><img border="0" src="/images/menu/pineapples_m.jpg" alt="" /><br />Freeze-Dried Pineapples</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'raspberry'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=raspberries"><img border="0" src="/images/menu/raspberries_m.jpg" alt="" /><br />Freeze-Dried Raspberries</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'strawberry'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=strawberries"><img border="0" src="/images/menu/strawberries_m.jpg" alt="" /><br />Freeze-Dried Strawberries</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'fruitreg'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=fruit_regular"><img border="0" src="/images/menu/fruit_regular_m.jpg" alt="" /><br />Freeze-Dried Fruit</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                <?php if ($info['showmenu'] == 'fruittrop'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=fruit_tropical"><img border="0" src="/images/menu/fruit_tropical_m.jpg" alt="" /><br />Tropical Fruit</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'broccoli'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=broccoli"><img border="0" src="/images/menu/broccoli_m.jpg" alt="" /><br />Broccoli</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'cauliflowe'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cauliflower"><img border="0" src="/images/menu/cauliflower_m.jpg" alt="" /><br />Cauliflower</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'corn'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=corn"><img border="0" src="/images/menu/corn_m.jpg" alt="" /><br />Corn</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'potatoes'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=potatoes"><img border="0" src="/images/menu/potatoes_m.jpg" alt="" /><br />Diced Potatoes</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'greenbeans'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=greenbeans"><img border="0" src="/images/menu/greenbeans_m.jpg" alt="" /><br />Green Beans</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'greenpeas'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION:</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=greenpeas"><img border="0" src="/images/menu/greenpeas_m.jpg" alt="" /><br />Green Peas</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>
				</table>
                <?php } ?>
                
                
                
                

                    <?php if ($info['showmenu'] == 'veggie'){   
                    			$num_low_servings = $info['servings'] / 15; 
                    			$num_high_servings = $info['servings'] / 7.5;  
                    			$num_higher_servings = $info['servings'] / 5; ?>



                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION:</b>
                    	<br>
                    	</td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=v_corn"><img border="0" src="/images/menu/veggie_corn.jpg" alt="" /><br />Corn</a><br>(<?php echo $num_higher_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=v_peas">	<img border="0" src="/images/menu/veggie_peas.jpg" alt="" /><br />Peas</a><br>(<?php echo $num_high_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=v_broccoli"><img border="0" src="/images/menu/veggie_broccoli.jpg" alt="" /><br />Broccoli</a><br>(<?php echo $num_higher_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=v_greenbeans"><img border="0" src="/images/menu/veggie_greenbeans.jpg" alt="" /><br />Green Beans</a><br>(<?php echo $num_higher_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=v_mushroom"><img border="0" src="/images/menu/veggie_mushroom.jpg" alt="" /><br />Mushroom Sauce</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=v_cheese">	<img border="0" src="/images/menu/veggie_cheese.jpg" alt="" /><br />Cheese Sauce</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=v_cream"><img border="0" src="/images/menu/veggie_cream.jpg" alt="" /><br />Cream Sauce</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=v_butter"><img border="0" src="/images/menu/veggie_butter.jpg" alt="" /><br />Butter Sauce</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>                
                        <td>&nbsp;
                        	
                        </td>                       
                        <td>&nbsp;
                        	
                        </td>                    
                    </tr>
				</table>
                <?php } ?>
                <?php if ($info['showmenu'] === NULL) {  ?>
                </table>
                <?php } ?>
                
                
                <?php if ($info['product_key'] == 4106) { ?>
                	<?php include_once("chart1440.php") ?>
                <?php } elseif ($info['product_key'] == 4105) { ?>
                	<?php include_once("chart2880.php") ?>
                <?php } ?>
        		</div>
			</div>
		</div>

<?php include_once("footer.php") ?>

</div>
</body>
</html>
