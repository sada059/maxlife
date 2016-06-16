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

	$query = "SELECT * FROM products WHERE actual_product_key='$pid'";
	$run = mysql_query($query);

	if ($info['active'] <> 1) {
		header( 'Location: http://www.maxlifefoods.com/' ) ;
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title><?php echo $info['product_name2']; ?> | MaxLifeFoods</title>
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

        <div class="subbody2" style="height: 3000px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
                <?php $pps = $info['product_price']/$info['servings']; ?>
        			<h1><?php echo $info['product_name2']; ?> <?php if ($info['servings'] === NULL) {} else { echo "<br>(".$info['servings']." servings) ";} ?><?php if ($pps == 0){ }else {$number = $pps; setlocale(LC_MONETARY, 'en_US'); echo "<!-- - ".money_format('%(#10n', $number)."/Serving-->"; } ?></h1>
                    <table border="0"><tr><td valign="top" width="350" align="center"><img border="0" src="/images/product/big<?php echo $info['product_image']; ?>" alt="" align="center" style="padding-right: 10px;" /><br \>
                    <table border="0" cellpadding="3" cellspacing="3">
                    <?php if ($info['product_category'] == 10) { ?>
                    <tr><td align="right"><img src="/images/icon_fillers.gif"></td><td><font class="smallhead">Fewer Filler (Non-Meal) Servings</font><br \><font class="smalldesc">We fill our servings numbers with meals, not cheap drinks and desserts.  Competitors fill their packages with up to 69% non-meal servings.</font></td></tr>
                    <?php } ?>
                    <tr><td align="right"><img src="/images/icon_ship.gif"></td><td><font class="smallhead">Free Shipping</font><br \><font class="smalldesc">We offer free shipping on EVERY order in 48 U.S. states. No minimums.</font></td></tr>
                    </table></td>
                    <td valign="top">
                    <table border="0"><tr><td valign="top"><h1><?php if ($info['price_note'] === NULL) {} else {echo $info['price_note']."<br>"; }?><?php $number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?><br>
					<input type="image" style="border:none;float:left" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']?>&q=1&price=<?php echo $info['product_price']?>'" name="myclicker" src="/images/add_to_cart.gif" ></h1>
						<br>
						<?php while(	$info2 = mysql_fetch_assoc($run))
							{?>
								<h1><?php $number = $info2['product_price']; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?>/mo. x <?php echo $info2['payment_months'] ?> months (<a href="payasyougo.php?id=<?php echo $id; ?>">info</a>)<br>
								<input type="image" style="border:none;float:left" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info2['product_key']?>&q=1&price=<?php echo $info2['product_price']?>'" name="myclicker" src="/images/add_to_cart.gif" ></h1><br>
							<?php }
						?>
						<!--<h1>Product Information:</h1>-->
						</td><td valign="top"><?php if ($info['product_category'] == 10 or $info['product_category'] == 6 or $info['product_category'] == 5) { ?>
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
                    
						   
						   
                <?php if ($info['showmenu'] == 'main'){ 
              			$num_breakfast_servings = ($info['servings'] / 2) / 3;
              			$num_entree_servings = ($info['servings'] / 2) / 10; ?>

							<?php include_once('menu_main.php') ?>

                <?php } ?>



                     <?php if ($info['showmenu'] == 'maxlife' or $info['showmenu'] =='maxlifeveggiefruit' or $info['showmenu'] == 'maxlifefruit' or $info['showmenu'] == 'maxlifeveggiefruit2'){ 
              			//$num_high_servings = ($info['servings'] / 240) * 20;
              			//$num_low_servings = ($info['servings'] / 240) * 10; ?>

							<?php include_once('menu_maxlife.php') ?>

                <?php } ?>
                
                <?php if ($info['showmenu'] == 'samplerkit') {?>
                			<tr>
                    			<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  			</tr>
                  
                		  <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=appleblueberrygranola">	<img border="0" src="/images/menu/apple_blueberry_granola_m.jpg" alt="" /><br />Apple Blueberry<br>Granola</a> (10 servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=heartypotatosoup"><img border="0" src="/images/menu/hearty_potato_soup_m.jpg" alt="" /><br />Hearty Potato Soup</a><br>(10 servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=cheddarbroccolisoup"><img border="0" src="/images/menu/cheddar_broccoli_soup_m.jpg" alt="" /><br />Cheddar Broccoli Soup</a><br>(<?php echo $num_low_servings ?> servings)<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<img border="0" src="/images/menu/fruitmix.jpg" alt="" /><br />Fruit Mix</a><br>(5 servings)<br /><br />
                        </td>
                
                <?php } ?>
                
                   <?php if ($info['showmenu'] == 'mbreakfast'){ 
              			$num_high_servings = ($info['servings'] / 120) * 20;
              			$num_low_servings = ($info['servings'] / 120) * 10; ?>

							<?php include_once('menu_mbreakfast.php') ?>

                <?php } ?>
                
                   <?php if ($info['showmenu'] == 'mentree'){ 
              			$num_high_servings = ($info['servings'] / 120) * 20;
              			$num_low_servings = ($info['servings'] / 120) * 10; ?>

							<?php include_once('menu_mentree.php') ?>

                <?php } ?>
                
                    <?php if ($info['showmenu'] == 'breakfast'){ ?>

							<?php include_once('menu_breakfast.php') ?>

                <?php } ?>
                

                    <?php if ($info['showmenu'] == 'milk'){ ?>

							<?php include_once('menu_milk.php') ?>

                <?php } ?>
  
  
                      <?php if ($info['showmenu'] == 'eggs'){ ?>

							<?php include_once('menu_eggs.php') ?>

                <?php } ?>
                
                              
                
                    <?php if ($info['showmenu'] == 'entree'){ ?>

							<?php include_once('menu_entree.php') ?>

                <?php } ?>
                
                

                    <?php if ($info['showmenu'] == 'meat'){ 
                    			$num_rice_servings = ($info['servings'] / 4);
                    			$num_low_servings = ($info['servings'] - $num_rice_servings) / 7.5; 
                    			$num_high_servings = ($info['servings'] - $num_rice_servings) / 5; ?>

								<?php include_once('menu_meat.php') ?>

                <?php } ?>
                
                    <?php if ($info['showmenu'] == 'fruit'){  
                    			$num_low_servings = $info['servings'] / 7.5; 
                    			$num_high_servings = $info['servings'] / 5; ?>

								<?php include_once('menu_fruit.php') ?>

                <?php } ?>




               <?php if ($info['showmenu'] == 'chicken'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=chicken"><img border="0" src="/images/menu/chicken_m.jpg" alt="" /><br />Diced Chicken</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
               <?php if ($info['showmenu'] == 'turkey'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=turkey"><img border="0" src="/images/menu/turkey_m.jpg" alt="" /><br />Diced Turkey</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                



               <?php if ($info['showmenu'] == 'beef'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=beef"><img border="0" src="/images/menu/beef_m.jpg" alt="" /><br />Ground Beef</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                <?php if ($info['showmenu'] == 'sausage'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=sausage"><img border="0" src="/images/menu/sausage_m.jpg" alt="" /><br />Ground Sausage</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                <?php if ($info['showmenu'] == 'apples'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=apples"><img border="0" src="/images/menu/apples_m.jpg" alt="" /><br />Freeze-Dried Apples</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                
                
                <?php if ($info['showmenu'] == 'bananas'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=bananas"><img border="0" src="/images/menu/bananas_m.jpg" alt="" /><br />Freeze-Dried Bananas</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'blackberry'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=blackberries"><img border="0" src="/images/menu/blackberries_m.jpg" alt="" /><br />Freeze-Dried Blackberries</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                
                
                <?php if ($info['showmenu'] == 'blueberry'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=blueberries"><img border="0" src="/images/menu/blueberries_m.jpg" alt="" /><br />Freeze-Dried Blueberries</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                <?php if ($info['showmenu'] == 'cherries'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cherries"><img border="0" src="/images/menu/cherries_m.jpg" alt="" /><br />Freeze-Dried Cherries</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'grapes'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=grapes"><img border="0" src="/images/menu/grapes_m.jpg" alt="" /><br />Freeze-Dried Grapes</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'mangoes'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=mangoes"><img border="0" src="/images/menu/mangoes_m.jpg" alt="" /><br />Freeze-Dried Mangoes</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'peaches'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=peaches"><img border="0" src="/images/menu/peaches_m.jpg" alt="" /><br />Freeze-Dried Peaches</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'pineapple'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=pineapples"><img border="0" src="/images/menu/pineapples_m.jpg" alt="" /><br />Freeze-Dried Pineapples</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'raspberry'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=raspberries"><img border="0" src="/images/menu/raspberries_m.jpg" alt="" /><br />Freeze-Dried Raspberries</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'strawberry'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=strawberries"><img border="0" src="/images/menu/strawberries_m.jpg" alt="" /><br />Freeze-Dried Strawberries</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'fruitreg' or $info['showmenu'] == 'maxlifefruit' or $info['showmenu'] == 'maxlifeveggiefruit' or $info['showmenu'] == 'maxlifeveggiefruit2'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                                              
                        <td style="vertical-align: text-top;text-align:center;" colspan="5">
                        	<a href="nutrition.php?i=fruit_regular"><img border="0" src="/images/menu/fruit_regular_m.jpg" alt="" /><br />Freeze-Dried Fruit</a><br /><br />
                        </td>
                                           
                    </tr>

                <?php } ?>
                
                
                
                <?php if ($info['showmenu'] == 'fruittrop' or $info['showmenu'] == 'maxlifeveggiefruit2'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                                               
                        <td style="vertical-align: text-top;" colspan="5">
                        	<a href="nutrition.php?i=fruit_tropical"><img border="0" src="/images/menu/fruit_tropical_m.jpg" alt="" /><br />Tropical Fruit</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                                            
                    </tr>

                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'broccoli'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=broccoli"><img border="0" src="/images/menu/broccoli_m.jpg" alt="" /><br />Broccoli</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'cauliflowe'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cauliflower"><img border="0" src="/images/menu/cauliflower_m.jpg" alt="" /><br />Cauliflower</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'corn'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=corn"><img border="0" src="/images/menu/corn_m.jpg" alt="" /><br />Corn</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'potatoes'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=potatoes"><img border="0" src="/images/menu/potatoes_m.jpg" alt="" /><br />Diced Potatoes</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                <?php if ($info['showmenu'] == 'greenbeans'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=greenbeans"><img border="0" src="/images/menu/greenbeans_m.jpg" alt="" /><br />Green Beans</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                
                <?php if ($info['showmenu'] == 'greenpeas'){  
                    			$num_servings = $info['servings']; ?>

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>THIS PACK INCLUDES (CLICK FOR NUTRITIONAL INFORMATION):</b><br \></td>
                  </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>                       
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=greenpeas"><img border="0" src="/images/menu/greenpeas_m.jpg" alt="" /><br />Green Peas</a><br>(<?php echo $num_servings ?> servings)<br /><br />
                        </td>
                        <td>&nbsp;</td><td>&nbsp;</td>                    
                    </tr>

                <?php } ?>
                
                
                
                 <?php if ($info['showmenu'] == 'mveggie' or $info['showmenu'] == 'maxlifeveggiefruit' or $info['showmenu'] == 'maxlifeveggiefruit2'){  ?>

								<?php include_once('menu_mveggie.php') ?>

                     <?php } ?>
                

                    <?php if ($info['showmenu'] == 'veggie'){   
                    			$num_low_servings = $info['servings'] / 15; 
                    			$num_high_servings = $info['servings'] / 7.5;  
                    			$num_higher_servings = $info['servings'] / 5; ?>

								<?php include_once('menu_veggie.php') ?>

                <?php } ?>


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
		                        <td style="vertical-align: text-top;">
		                        		<a href="dairy.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/dairyeggs.jpg" alt="" /></a><br /><br />
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
						   
						   
                </table>

                
                
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
<?php include_once("googlefooter.php") ?>
</body>
</html>
