<?php
error_reporting(0);
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
	
	$query = "SELECT * FROM products WHERE product_category='13' and active = 1 ORDER BY product_appear_order ASC";
	$run = mysql_query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Water Filters | MaxLifeFoods</title>
<?php include_once("includes/head.php") ?>
<?php include_once("analyticstracking.php") ?>
</head>
<body>

<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>
<div id="content">

<?php include_once("includes/header.php") ?>
    <div class="container heading-blue">
        <div class="row">
            <div class="col-md-6" style="padding: 0"> <h2>H20 - Easy-Use Water Storage & Filtering</h2></div>
            <div class="col-md-6"> <a href="food-storage-calculator.php?id=<?php echo $id; ?>"><img src="images/icons/family-foodstorage-calculator.png" class="push-right"></a></div>
        </div>
    </div>

 <section>
    <div class="container">
        <div class="row">
               <p> Water filters and storage containers are a necessary addition to your food storage.</p>
            
                     <p><a href="#">Click a product below to view more details.</a></p>
                </div>
        <div class="row product">
            <div class="col-md-3">
    <!--<table border="0"><tr><td><a href="food-storage.php?id=<?php echo $id; ?>"><img border="0" src="http://maxlifefoods.com/images/product/mainthumb.jpg" border="0"></a></td><td><b><a href="food-storage.php?id=<?php echo $id; ?>">CLICK HERE TO VIEW OUR MAIN LINE OF FOOD STORAGE.</a></b></td></tr></table><br><br>-->
    <?php
    while($info = mysql_fetch_assoc($run)){
		$pps = $info['product_price']/$info['servings'];
        ?>
            
                    <a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><img border="0" src="images/product/<?php echo $info['product_image']; ?>" width="135" height="135" alt="<?php echo $info['product_name2']; ?>" /></a>
                    </div>
            <div class="col-md-9">
                <div class="row">
                <div class="col-md-10">
                    <h2 class="product-name" style="color:#fff;"><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><?php echo $info['product_name2']; ?></a> <?php if ($info['product_key'] == '963852' || $info['product_key'] == '820741'){ }else {$number = $pps; setlocale(LC_MONETARY, 'en_US'); echo "<!--- ".money_format('%(#10n', $number)."/Ea-->"; } ?><br /><p style="font-size: 12px; margin-top: -2px; text-indent: 40px;"><?php if ($info['product_key'] == '963852' || $info['product_key'] == '820741'){ echo "&nbsp;"; }else { echo $info['servings']." Servings"; } ?></p><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><p class="viewDetails" style="margin-top: -40px;"><?php $number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); $number2 = money_format('%(#10n',$number * 1.4); echo money_format('%(#10n', $number); if ($number > 100); ?></p></a></h2>
          
                    <?php
                    $position = 83;
                    
                    $message = $info['product_desc']; 
					$post = substr($message, 0, $position); 
					
                    echo $post;
                    echo "...";
                    ?>                                       
                            
                </div>   
<!--                            <input type="image" style="border:none;float:left" onclick="window.location='details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>'" name="details" src="/images/viewDetails.png" />
                            <input type="image" style="border:none;float:right" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']?>&q=1&price=<?php echo $info['product_price']?>'" name="myclicker" src="/images/add_to_cart_white.jpg" > -->
    <button class="btn btn-default btn-details" onclick="window.location='details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>'" name="details">View Details</button> &nbsp; &nbsp; &nbsp;
                <button class="btn btn-default btn-add-cart" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']?>&q=1&price=<?php echo $info['product_price']?>'" name="myclicker"><img src="images/icons/cart-plus.png"> ADD TO CART</button>
            </div>
            <div class="col-md-2">

            </div>
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
                
              
    <?php
	}
    ?>
                
    </div>
 </section>
<?php include_once("includes/footer.php") ?>
<?php include_once("googlefooter.php") ?>
</body>
</html>
