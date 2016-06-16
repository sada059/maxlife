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
<title>Menu | MaxLifeFoods</title>
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
        			<h1>Menu</h1>
                    <p style="text-align: justify;">At Max Life Foods our goal is to provide emergency food storage and sportsman food kits that are <strong>convenient, long lasting, affordable, and delicious</strong>.  Whatever the situation that requires your family to turn to your food storage supply, we want you to look forward to your meals that will be <strong>easy to prepare, and enjoyable</strong>. <br /><br />

	Whether you're preparing breakfast, or one of our many <strong>gourmet entrees</strong>, your meals will be ready right in the pouch in just 12 minutes by just adding boiling water.  Don't have access to a heat source for your water?  No worries, just give cold water a little more time.</p>

					<p style="text-align: center;"><b>CLICK FOR NUTRITIONAL INFORMATION ON OUR MAXLIFE ENTREE & BREAKFAST PRODUCT LINE:</b></p>
                
                <table id="extragallery" style="text-align: center; margin: auto;" cellspacing="3" cellpadding="3">

                  <tr>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=westernchili">	<img border="0" src="/images/menu/western_chili_m.jpg" alt="" /><br />Western Chili</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=instantpotatoes">	<img border="0" src="/images/menu/instant_potatoes_m.jpg" alt="" /><br />Instant Potatoes</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cheesypasta"><img border="0" src="/images/menu/cheesy_pasta_m.jpg" alt="" /><br />Cheesy Pasta</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=redbeansrice">	<img border="0" src="/images/menu/red_beans_rice_m.jpg" alt="" /><br />Red Beans & Rice</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=cheddarbroccolisoup"><img border="0" src="/images/menu/cheddar_broccoli_soup_m.jpg" alt="" /><br />Cheddar Broccoli Soup</a><br /><br />
                        </td>
                  </tr>
                  <tr>
                  		  <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=cheddarbroccolirice"><img border="0" src="/images/menu/cheddar_broccoli_rice_m.jpg" alt="" /><br />Cheddar Broccoli Rice</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=heartypotatosoup"><img border="0" src="/images/menu/hearty_potato_soup_m.jpg" alt="" /><br />Hearty Potato Soup</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=beefflavoredvegstew"><img border="0" src="/images/menu/beef_flavored_veg_stew_m.jpg" alt="" /><br />Beef Flavored Veg<br>Stew</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=oatmeal"><img border="0" src="/images/menu/oatmeal_m.jpg" alt="" /><br />Brown Sugar &<br>Cinnamon Oatmeal</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=strawberrybananaoatmeal"><img border="0" src="/images/menu/strawberry_banana_oatmeal_m.jpg" alt="" /><br />Strawberry Banana<br>Oatmeal</a><br /><br />
                        </td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=naturalgranola"><img border="0" src="/images/menu/natural_granola_m.jpg" alt="" /><br />Natural Granola</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=appleblueberrygranola">	<img border="0" src="/images/menu/apple_blueberry_granola_m.jpg" alt="" /><br />Apple Blueberry<br>Granola</a><br /><br />
                        </td>
                        
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=ricepudding"><img border="0" src="/images/menu/rice_pudding_m.jpg" alt="" /><br />Cinnamon & Rice<br>Pudding</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=regularwheymilk"><img border="0" src="/images/menu/regular_whey_milk_m.jpg" alt="" /><br />Regular Whey Milk</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=chocolatewheymilk"><img border="0" src="/images/menu/chocolate_whey_milk_m.jpg" alt="" /><br />Chocolate Whey Milk</a><br /><br />
                        </td>
                    </tr>




                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION ON OUR MEAT LINE:</b><br \></td>
                  </tr>
                    <tr>                    
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=chicken"><img border="0" src="/images/menu/chicken_m.jpg" alt="" /><br />Diced Chicken</a><br /><br />
                        </td>                  
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=turkey"><img border="0" src="/images/menu/turkey_m.jpg" alt="" /><br />Diced Turkey</a><br /><br />
                        </td>                   
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=beef"><img border="0" src="/images/menu/beef_m.jpg" alt="" /><br />Ground Beef</a><br /><br />
                        </td>                     
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=sausage"><img border="0" src="/images/menu/sausage_m.jpg" alt="" /><br />Ground Sausage</a><br /><br />
                        </td>
                        <td>&nbsp;</td>                   
                    </tr>



                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION ON OUR FRUIT LINE:</b><br \></td>
                  </tr>
                    <tr>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=apples"><img border="0" src="/images/menu/apples_m.jpg" alt="" /><br />Freeze-Dried Apples</a><br /><br />
                        </td>                   
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=bananas"><img border="0" src="/images/menu/bananas_m.jpg" alt="" /><br />Freeze-Dried Bananas</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=blackberries"><img border="0" src="/images/menu/blackberries_m.jpg" alt="" /><br />Freeze-Dried Blackberries</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=blueberries"><img border="0" src="/images/menu/blueberries_m.jpg" alt="" /><br />Freeze-Dried Blueberries</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cherries"><img border="0" src="/images/menu/cherries_m.jpg" alt="" /><br />Freeze-Dried Cherries</a><br /><br />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=grapes"><img border="0" src="/images/menu/grapes_m.jpg" alt="" /><br />Freeze-Dried Grapes</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=mangoes"><img border="0" src="/images/menu/mangoes_m.jpg" alt="" /><br />Freeze-Dried Mangoes</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=peaches"><img border="0" src="/images/menu/peaches_m.jpg" alt="" /><br />Freeze-Dried Peaches</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=pineapples"><img border="0" src="/images/menu/pineapples_m.jpg" alt="" /><br />Freeze-Dried Pineapples</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=raspberries"><img border="0" src="/images/menu/raspberries_m.jpg" alt="" /><br />Freeze-Dried Raspberries</a><br /><br />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=strawberries"><img border="0" src="/images/menu/strawberries_m.jpg" alt="" /><br />Freeze-Dried Strawberries</a><br /><br />
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>                    
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>                    
                    </tr>
                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5"><br \><b>CLICK FOR NUTRITIONAL INFORMATION ON OUR VEGETABLE LINE:</b><br \></td>
                  </tr>
                    <tr>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=broccoli"><img border="0" src="/images/menu/broccoli_m.jpg" alt="" /><br />Broccoli</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=cauliflower"><img border="0" src="/images/menu/cauliflower_m.jpg" alt="" /><br />Cauliflower</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=corn"><img border="0" src="/images/menu/corn_m.jpg" alt="" /><br />Corn</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=potatoes"><img border="0" src="/images/menu/potatoes_m.jpg" alt="" /><br />Diced Potatoes</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=greenbeans"><img border="0" src="/images/menu/greenbeans_m.jpg" alt="" /><br />Green Beans</a><br /><br />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=greenpeas"><img border="0" src="/images/menu/greenpeas_m.jpg" alt="" /><br />Green Peas</a><br /><br />
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>                    
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>                    
                    </tr>
				</table>

                
                
                

					<!--<p style="text-align: center;"><b>CLICK FOR NUTRITIONAL INFORMATION ON WISE FOODS BRAND ENTREE & BREAKFAST LINE:</b></p>
                
                <table id="extragallery" style="text-align: center; margin: auto;">
                	<tr>
                    	<td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=rotini"><img src="/images/menu/creamy_pasta_retouch_72dpi_4.jpg" alt="" border=""/><br /> Creamy Pasta and Veg. <br />Rotini</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=cheesy_lasagna_1"><img src="/images/menu/lasagna_retouch_72_dpi_5.jpg" alt=""  border=""/><br />Cheesy Lasagna</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=teriyaki">	<img src="/images/menu/teriyaki_and_rice_retouch_72dpi_4.jpg" alt=""  border=""/><br />Teriyaki and Rice</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=ala_king"><img src="/images/menu/ala_king_retouch_72dpi_2.jpg" alt=""  border=""/><br />Creamy Ala King and Rice</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=pasta_alfredo"><img src="/images/menu/pasta_alfredo_retouch_72dpi_5.jpg" alt=""  border=""/><br />Pasta Alfredo</a><br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=savory_stroganoff"><img src="/images/menu/stroganoff_retouch_72dpi_6.jpg" alt=""  border=""/><br />Savory Stroganoff</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=cheesy_macaroni"><img src="/images/menu/cheesy_mac_garnish_retouch_72dpi_3.jpg" alt=""  border=""/><br />Cheesy Macaroni</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=chili_macaroni">	<img src="/images/menu/chili_mac_retouch_72dpi_4.jpg" alt=""  border=""/><br />Chili Macaroni</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=tortilla"><img src="/images/menu/tortilla_soup_retouch_72dpi_1_2.jpg" alt=""  border=""/><br />Hearty Tortilla Soup</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=basil"><img src="/images/menu/tomato_basil_retouch_2.jpg" alt=""  border=""/><br />Tomato Basil Soup</a><br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=apple">	<img src="/images/menu/apple_cinnamon_retouch_5.jpg" alt=""  border=""/><br />Apple Cinnamon</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=granola">	<img src="/images/menu/granola_retouch_2.jpg" alt=""  border=""/><br />Crunchy Granola</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=multi-grain"><img src="/images/menu/multi-grain_retouch_2_3.jpg" alt=""  border=""/><br />Multi-grain Cereal</a><br /><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                    </tr>
				</table>
				
				
				<table id="extragallery" style="text-align: center; margin: auto;">
                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION ON WISE FOODS BRAND MEAT & RICE PRODUCT LINE:</b>
                    	<br>
                    	</td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=m_stroganoff"><img src="/images/menu/stroganoff_beef_1_1.jpg" alt="" /><br /> Stroganoff Beef</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=m_teriyaki">	<img src="/images/menu/teriyaki_style_chicken_1_1.jpg" alt="" /><br />Teriyaki Style Chicken</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=m_southwest"><img src="/images/menu/southwest_sytle_chicken_1_1.jpg" alt="" /><br />Southwest Style Chicken</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=m_savory"><img src="/images/menu/savory_roasted_ground_beef_1_1.jpg" alt="" /><br />Savory Roasted Ground Beef</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=m_cheesy"><img src="/images/menu/cheesy_ground_beef_1_1.jpg" alt="" /><br />Cheesy Beef</a><br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=m_rice">	<img src="/images/menu/rice_1_1.jpg" alt="" /><br />Long-Term Instant Rice</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=m_roasted"><img src="/images/menu/roasted_chicken_3_3.jpg" alt="" /><br />Roasted Chicken</a><br /><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>                       
                        <td>&nbsp;
                        	
                        </td>                       
                        <td>&nbsp;
                        	
                        </td>                    
                    </tr>
				</table>
				
				
				<table id="extragallery" style="text-align: center; margin: auto;">
                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION ON WISE FOODS BRAND FRUIT PRODUCT LINE:</b>
                    	<br>
                    	</td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=f_bananas"><img src="/images/menu/fruit_bananas.jpg" alt="" /><br /> Bananas</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=f_peaches">	<img src="/images/menu/fruit_peaches.png" alt="" /><br />Peaches</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=f_strawberries"><img src="/images/menu/fruit_strawberries.jpg" alt="" /><br />Strawberries</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=f_apples"><img src="/images/menu/fruit_apples.jpg" alt="" /><br />Apples</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=f_yogurt"><img src="/images/menu/fruit_yogurt.jpg" alt="" /><br />Creamy Yogurt Style Dessert</a><br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=f_caramel">	<img src="/images/menu/fruit_caramel.jpg" alt="" /><br />Caramel Sauce</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=f_pudding"><img src="/images/menu/fruit_pudding.jpg" alt="" /><br />Vanilla Pudding</a><br /><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>                       
                        <td>&nbsp;
                        	
                        </td>                       
                        <td>&nbsp;
                        	
                        </td>                    
                    </tr>
				</table>
				
				
				
				<table id="extragallery" style="text-align: center; margin: auto;">
                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>CLICK FOR NUTRITIONAL INFORMATION ON WISE FOODS BRAND VEGETABLE PRODUCT LINE:</b>
                    	<br>
                    	</td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="nutrition.php?i=v_corn"><img src="/images/menu/veggie_corn.jpg" alt="" /><br />Corn</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=v_peas">	<img src="/images/menu/veggie_peas.jpg" alt="" /><br />Peas</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=v_broccoli"><img src="/images/menu/veggie_broccoli.jpg" alt="" /><br />Broccoli</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=v_greenbeans"><img src="/images/menu/veggie_greenbeans.jpg" alt="" /><br />Green Beans</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=v_mushroom"><img src="/images/menu/veggie_mushroom.jpg" alt="" /><br />Mushroom Sauce</a><br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        <a href="nutrition.php?i=v_cheese">	<img src="/images/menu/veggie_cheese.jpg" alt="" /><br />Cheese Sauce</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=v_cream"><img src="/images/menu/veggie_cream.jpg" alt="" /><br />Cream Sauce</a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<a href="nutrition.php?i=v_butter"><img src="/images/menu/veggie_butter.jpg" alt="" /><br />Butter Sauce</a><br /><br />
                        </td>                
                        <td>&nbsp;
                        	
                        </td>                       
                        <td>&nbsp;
                        	
                        </td>                    
                    </tr>
				</table>-->

				
        </div>
</div>
</div>

<?php include_once("footer.php") ?>

</div>
<?php include_once("googlefooter.php") ?>
</body>
</html>
