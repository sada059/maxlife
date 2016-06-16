<?php
	include("includes/db.php");
	include("includes/functions.php");
	
	$id = $_GET['id'];

    if ($id == '') {
        session_start();
        if(isset($_SESSION['id']))
          $id = $_SESSION['id'];
    }
	
	$query = "SELECT * FROM products WHERE product_category='1'";
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
        <div class="subbody2" style="height: 2050px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Food Storage</h1>
                    <p style="text-align: justify;">
                At Max Life Foods our goal is to provide emergency food storage and sportsman food kits that are <strong>convenient, long lasting, affordable, and delicious</strong>.  Whatever the situation that requires your family to turn to your food storage supply, we want you to look forward to your meals that will be <strong>easy to prepare, and enjoyable</strong>. <br /><br />
                
                Whether you're preparing breakfast, or one of our many <strong>gourmet entrees</strong>, your meals will be ready right in the pouch in just 12 minutes by just adding boiling water.  Don't have access to a heat source for your water?  No worries, just give cold water a little more time.</p>
                
                <div class="moredetails">Click a product below to view more details.</div>
        <br><br>
    
    <div class=" products-grid">
    <?php
    while($info = mysql_fetch_assoc($run)){
		$pps = $info['product_price']/$info['servings'];
        ?>
                        <div class="item first">
                            <div id="products-grid-container">
                                <div class="inner">
                
                    <a href="details.php?id=<?php echo $info['product_key']; ?>"><img src="/images/product/<?php echo $info['product_image']; ?>" width="135" height="135" alt="<?php echo $info['product_name']; ?>" /></a>
                    
                    <div class="floatright">
                    <h2 class="product-name" style="color:#fff;"><?php echo $info['product_name']; ?> <?php if ($info['product_key'] == '963852' || $info['product_key'] == '820741'){ }else {$number = $pps; setlocale(LC_MONETARY, 'en_US'); echo "- ".money_format('%(#10n', $number)."/Serving"; } ?><br /><p style="font-size: 12px; margin-top: -2px; text-indent: 40px;"><?php if ($info['product_key'] == '963852' || $info['product_key'] == '820741'){ echo "&nbsp;"; }else { echo $info['servings']." Servings"; } ?></p><a href="details.php?id=<?php echo $info['product_key']; ?>"><p class="viewDetails" style="margin-top: -40px;"><?php $number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); $number2 = money_format('%(#10n',$number * 1.4); echo money_format('%(#10n', $number); if ($number > 400) echo "<br><font style='font-size: 14px;'>Competitors: <del> $number2 </del></font>"; ?></p></a></h2>
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
