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
	
	$query = "SELECT * FROM products WHERE product_category='4' AND active = 1 ORDER BY product_appear_order ASC";
	$run = mysql_query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Food Storage | MaxLifeFoods</title>

<?php include_once("includes/head.php") ?>
<?php include_once("analyticstracking.php") ?>
</head>
<body>

<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>

<?php include_once("includes/header.php") ?>
    <div class="container heading-blue">
        <div class="row">
            <div class="col-md-6" style="padding: 0"> <h2>Add-Ons - 100% USDA Meat</h2></div>
            <div class="col-md-6"> <a href="food-storage-calculator.php?id=<?php echo $id; ?>"><img src="images/icons/family-foodstorage-calculator.png" class="push-right"></a></div>
        </div>
    </div>

<section>
    <div class="container">
        <div class="row">
            <p>Add MEAT to your long-term food storage. Add-Ons are not meant to be the main source of food storage,<br> but to help customize your food storage to your personal tastes.</p>
            <br>
            <p><a href="#"> Click a product below to view more details.</a></p>
        </div>
                       <div class="row product">
                             <?php
    while($info = mysql_fetch_assoc($run)){
		$pps = $info['product_price']/$info['servings'];
        ?>
            <div class="col-md-3">
                <!--<img src="images/product/p1.jpg">-->
                     <a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><img border="0" src="images/product/<?php echo $info['product_image']; ?>" width="135" height="135" alt="<?php echo $info['product_name2']; ?>" /></a>
            </div>
            <div class="col-md-9">
                <div class="row">
                <div class="col-md-10">
                <h2><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><?php echo $info['product_name2']; ?></a> <?php if ($info['product_key'] == '963852' || $info['product_key'] == '820741'){ }else {$number = $pps; setlocale(LC_MONETARY, 'en_US'); echo "<!--- ".money_format('%(#10n', $number)."/Ea-->"; } ?>
                     </h2>
                <div class="btn-serv"><?php if ($info['product_key'] == '963852' || $info['product_key'] == '820741'){ echo "&nbsp;"; }else { echo $info['servings']." Servings"; } ?></div>
                </div>
                <div class="col-md-2 product-price">
                    <?php $number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); $number2 = money_format('%(#10n',$number * 1.4); echo money_format('%(#10n', $number);  ?>
                </div>
                </div>
                <p><?php
                    $position = 83;
                    
                    $message = $info['product_desc']; 
					$post = substr($message, 0, $position); 
					
                    echo $post;
                    echo "..."; 
                    ?>            </p>
                  
                <button  href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>" class="btn btn-default btn-details">View Details</button> &nbsp; &nbsp; &nbsp;
                <button class="btn btn-default btn-add-cart"><img src="images/icons/cart-plus.png" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']?>&q=1&price=<?php echo $info['product_price']?>'" name="myclicker"> ADD TO CART</button>
            </div>
            <div class="col-md-2">

            </div>
                               <?php
	}
    ?>
        </div>
  
        </div>
</section>

<?php include_once("includes/footer.php") ?>

</div>
<?php include_once("googlefooter.php") ?>
</body>
</html>
