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
	
	$query = "SELECT * FROM products WHERE product_key='$pid'";
	$run = mysql_query($query);
	$info = mysql_fetch_assoc($run);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $info['product_name']; ?> | MaxLifeFoods</title>
<link rel="stylesheet" href="css/main.css" type="text/css" />

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16356880-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</head>
<body>
<div id="content">
    	<div class="topbar">
        	<div class="banner"></div>
            <div class="cart"><a href="shoppingcart.php?id=<?php echo $id; ?>">View Cart</a></div>
        </div>
        <div class="subtop">
            <ul class="navigation">
                	<li>
                    	<a href="index.php?id=<?php echo $id; ?>">HOME</a>
                    </li>
                    <li>
                    	<a href="food-storage.php?id=<?php echo $id; ?>">FOOD STORAGE</a>
                    </li>
                    <li>
                    	<a href="camping-food.php?id=<?php echo $id; ?>">72HR / CAMPING FOOD</a>
                    </li>
                    <li>
                    	<a href="menu.php?id=<?php echo $id; ?>">MENU</a>
                    </li>
                    <li>
                    	<a href="why-maxlife.php?id=<?php echo $id; ?>">WHY MAXLIFE</a>
                    </li>
                    <li>
                    	<a href="contact.php?id=<?php echo $id; ?>">CONTACT</a>
                    </li>
                </ul>
        </div>
        <div class="subbody2" style="height: 800px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
                <?php $pps = $info['product_price']/$info['servings']; ?>
        			<h1><?php echo $info['product_name']; ?> <?php if ($info['product_key'] == '963852' || $info['product_key'] == '820741' || $info['product_key'] == '85207419'){ }else {$number = $pps; setlocale(LC_MONETARY, 'en_US'); echo "- ".money_format('%(#10n', $number)."/Serving"; } ?></h1>
                    <img src="/images/product/big<?php echo $info['product_image']; ?>" alt="" align="left" style="padding-right: 10px;" />
                    <h1>Product Information:</h1>
                    <p style="text-align: justify;"><?php echo $info['product_desc']; ?></p>
                    <h1><?php $number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?></h1>
					<input type="image" style="border:none;float:left" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']?>&q=1&price=<?php echo $info['product_price']?>'" name="myclicker" src="/images/add_to_cart.jpg" > 
                    <?php if ($info['product_key'] == '963852' || $info['product_key'] == '820741' || $info['product_key'] == '85207419' || $info['product_key'] == '75362142' || $info['product_key'] == '98456321' || $info['product_key'] == '85206542' || $info['product_key'] == '5391764' || $info['product_key'] == '49672634' || $info['product_key'] == '51832475' || $info['product_key'] == '19465027'){ }else { ?>
                    <p>&nbsp;</p>
                     <table id="extragallery" style="text-align: center; margin: auto;">
                	<tr>
                    	<td style="vertical-align: text-top;">
                        	<img src="/images/menu/creamy_pasta_retouch_72dpi_4.jpg" alt="" /><br /> Creamy Pasta and Veg. <br />Rotini<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<img src="/images/menu/lasagna_retouch_72_dpi_5.jpg" alt="" /><br />Cheesy Lasagna<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<img src="/images/menu/teriyaki_and_rice_retouch_72dpi_4.jpg" alt="" /><br />Teriyaki and Rice<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<img src="/images/menu/ala_king_retouch_72dpi_2.jpg" alt="" /><br />Creamy Ala King and Rice<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<img src="/images/menu/pasta_alfredo_retouch_72dpi_5.jpg" alt="" /><br />Pasta Alfredo<br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        	<img src="/images/menu/stroganoff_retouch_72dpi_6.jpg" alt="" /><br />Savory Stroganoff<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<img src="/images/menu/cheesy_mac_garnish_retouch_72dpi_3.jpg" alt="" /><br />Cheesy Macaroni<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<img src="/images/menu/chili_mac_retouch_72dpi_4.jpg" alt="" /><br />Chili Macaroni<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<img src="/images/menu/tortilla_soup_retouch_72dpi_1_2.jpg" alt="" /><br />Hearty Tortilla Soup<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<img src="/images/menu/tomato_basil_retouch_2.jpg" alt="" /><br />Tomato Basil Soup<br /><br />
                        </td>
                    </tr>
                    <tr>
                    	<td style="vertical-align: text-top;">
                        	<img src="/images/menu/apple_cinnamon_retouch_5.jpg" alt="" /><br />Apple Cinnamon<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<img src="/images/menu/granola_retouch_2.jpg" alt="" /><br />Crunchy Granola<br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        	<img src="/images/menu/multi-grain_retouch_2_3.jpg" alt="" /><br />Multi-grain Cereal<br /><br />
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                        <td>&nbsp;
                        	
                        </td>
                    </tr>
				</table>
                <?php } ?>
        		</div>
			</div>
		</div>
<div class="subbottom">
        	<ul class="navigationb">
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
                    	<a href="contact.php?id=<?php echo $id; ?>">CONTACT</a>
                    </li>
                </ul>
                <div class="fb">
                	<a href="http://www.facebook.com/pages/Max-Life-Foods/137779489655373" target="_blank">FB</a>
                </div>
        </div>
</div>
</body>
</html>
