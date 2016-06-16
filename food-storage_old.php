<?php
	include("includes/db.php");
	include("includes/functions.php");
	
	$id = $_GET['id'];

    if ($id == '') {
        session_start();
        if(isset($_SESSION['id']))
          $id = $_SESSION['id'];
    }
    if ($id == '') {
  		$id = $_COOKIE['id'];
    }
	
	$query = "SELECT * FROM products WHERE product_category='1' ORDER BY product_appear_order ASC";
	$run = mysql_query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Food Storage | MaxLifeFoods</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" />
<script language="javascript">
	function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>

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
<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>
<div id="content">
    	<div class="topbar">
        	<div class="banner"></div>
            <div class="cart"><a href="shoppingcart.php?id=<?php echo $id; ?>">View Cart</a></div>
        </div>
        <div class="subtop">
			<div id="portfolio_cycler2">
			<img class="active" src="/images/radio_ramsey.jpg" alt="Our Food Storage Recommended by Dave Ramsey" />
			<img border="0" src="/images/radio_ingraham.jpg" alt="Our Food Storage Recommended by Laura Ingraham" />	
			<img border="0" src="/images/radio_gallagher.jpg" alt="Our Food Storage Recommended by Mike Gallagher" />	
			<img border="0" src="/images/radio_gresham.jpg" alt="Our Food Storage Recommended by Tom Gresham" />		
			<img border="0" src="/images/radio_prager.jpg" alt="Our Food Storage Recommended by Dennis Prager" />	
			</div>
            <ul class="navigation">
                	<li>
                    	<a href="index.php?id=<?php echo $id; ?>">HOME</a>
                    </li>
                    <li>
                    	<a href="food-storage.php?id=<?php echo $id; ?>">LONG-TERM FOOD</a>
                    </li>
                    <li>
                    	<a href="supplemental.php?id=<?php echo $id; ?>">MEAT/FRUIT/VEG/DAIRY</a>
                    </li>
                    <li>
                    	<a href="camping-food.php?id=<?php echo $id; ?>">FOOD KITS</a>
                    </li>
                    <li>
                    	<a href="menu.php?id=<?php echo $id; ?>">MENU</a>
                    </li>
                    <li>
                    	<a href="why-maxlife.php?id=<?php echo $id; ?>">DETAILS</a>
                    </li>
                </ul>
        </div>
        <div class="subbody2" style="height: 1600px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Long-Term Food Storage</h1>
                    <p style="text-align: justify;">
                At Max Life Foods our goal is to provide emergency food storage and sportsman food kits that are <strong>convenient, long lasting, affordable, and delicious</strong>.  Whatever the situation that requires your family to turn to your food storage supply, we want you to look forward to your meals that will be <strong>easy to prepare, and enjoyable</strong>. <br /><br />
                
                Whether you're preparing breakfast, or one of our many <strong>gourmet entrees</strong>, your meals will be ready right in the pouch in just 12 minutes by just adding boiling water.  Don't have access to a heat source for your water?  No worries, just give cold water a little more time.</p>
                
                <div class="moredetails">Click a product below to view more details.</div>
        <br><br>
    
    <div class=" products-grid">
    <table border="0"><tr><td><a href="supplemental.php?id=<?php echo $id; ?>"><img border="0" src="http://maxlifefoods.com/images/product/addonthumb.jpg" border="0"></a></td><td><b><a href="supplemental.php?id=<?php echo $id; ?>">CLICK FOR SUPPLEMENTAL DAIRY, EGGS, MEAT & RICE, FRUIT, AND VEGETABLES LINES.</a></b></td></tr></table><br><br>
    <?php
    while($info = mysql_fetch_assoc($run)){
		$pps = $info['product_price']/$info['servings'];
        ?>
                        <div class="item first">
                            <div id="products-grid-container">
                                <div class="inner">
                
                    <a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><img border="0" src="/images/product/<?php echo $info['product_image']; ?>" width="135" height="135" alt="<?php echo $info['product_name2']; ?>" /></a>
                    
                    <div class="floatright">
                    <h2 class="product-name" style="color:#fff;"><?php echo $info['product_name2']; ?> <?php if ($info['product_key'] == '963852' || $info['product_key'] == '820741'){ }else {$number = $pps; setlocale(LC_MONETARY, 'en_US'); echo "- ".money_format('%(#10n', $number)."/Srv"; } ?><br /><p style="font-size: 12px; margin-top: -2px; text-indent: 40px;"><?php if ($info['servings'] === NULL){ echo "&nbsp;"; }else { echo $info['servings']." Servings"; } if ($info['servings'] === NULL){ echo "&nbsp;"; }else { echo "&nbsp;"; } ?></p><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><p class="viewDetails" style="margin-top: -40px;"><?php $number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); $number2 = money_format('%(#10n',$number * 1.4); echo money_format('%(#10n', $number); if ($number > 100) echo "<br><font style='font-size: 14px;'>Competitors: <del> $number2 </del></font>"; ?></p></a></h2>
                    <div class="text" style="margin-top: -25px;">
                    <?php
                    $position = 83;
                    
                    $message = $info['product_desc']; 
					$post = substr($message, 0, $position); 
					
                    echo $post;
                    echo "...";
                    ?>                                       
                            
                            
                           <div class="clear"></div>                 
                            
                            
                            <input type="image" style="border:none;float:left" onclick="window.location='details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>'" name="details" src="/images/viewDetails.png" />
                            <input type="image" style="border:none;float:right" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']?>&q=1&price=<?php echo $info['product_price']?>'" name="myclicker" src="/images/add_to_cart.jpg" > 
    
                                    
                  
                    </div>
                   <!-- <div class="pricebox">  
                        Price: <br>
    
            
        <div class="price-box">
                                                                <span class="regular-price" id="product-price-1">
                        <span class="price">
							<?php 
								//$number = $info['product_price'];
								//setlocale(LC_MONETARY, 'en_US');
								//echo money_format('%(#10n', $number);
							?>
                        </span>                </span>
                            
            </div>
    
                        <div class="clear"></div>
                    </div>-->
                    
                    
                    
                    
                                        </div>
                
                <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div><br><br>
                </div>
    <?php
	}
    ?>
                </div>
                </div>
                <div style="clear: both;"></div>
        	</div>
        </div>
        <div class="subbottom">
        	<ul class="navigationb">
                	<li>
                    	<a href="http://www.maxlifefoods.com/MaxLifeFoodsBrochure.pdf"><b>PRICING BROCHURE</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>                	
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
                    	<a href="http://www.maxlifefoods.com/privacy.php?id=<?php echo $id; ?>">PRIVACY</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/terms.php?id=<?php echo $id; ?>">TERMS</a>&nbsp;&nbsp;|&nbsp;&nbsp;
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
