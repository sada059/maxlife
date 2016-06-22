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
    <script language="javascript">
        function addtocart(pid){
            document.form1.productid.value=pid;
            document.form1.command.value='add';
            document.form1.submit();
        }
    </script>
</head>
<body>
<?php include_once("includes/header.php") ?>

<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>
<div class="container heading-blue">
    <div class="row">
        <div class="col-md-6" style="padding: 0"> <h2>H20 - Easy-Use Water Storage & Filtering</h2></div>
        <div class="col-md-6"> <img src="images/icons/family-foodstorage-calculator.png" class="push-right"></div>
    </div>
</div>

<section>
    <div class="container">
        <div class="row">
            <p> Water filters and storage containers are a necessary addition to your food storage.</p>
            <br>
            <p><a href="#"> Click a product below to view more details.</a></p>
        </div>
        <?php
        while($info = mysql_fetch_assoc($run)){
        $pps = $info['product_price']/$info['servings'];
        ?>
        <div class="row product">
            <div class="col-md-3">
                <a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"> <img src="images/product/<?php echo $info['product_image']; ?>"></a>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-10">
                        <h2><?php echo $info['product_name2']; ?></h2>
                    </div>
                    <div class="col-md-2 product-price">
                        <?php $number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); $number2 = money_format('%(#10n',$number * 1.4); echo money_format('%(#10n', $number); if ($number > 100); ?>
                    </div>
                </div>
                <p> <?php
                    $position = 83;

                    $message = $info['product_desc'];
                    $post = substr($message, 0, $position);

                    echo $post;
                    echo "...";
                    ?>      </p>
                <button  class="btn btn-default btn-details" name="details" onclick="window.location='details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>'">View Details</button> &nbsp; &nbsp; &nbsp;
                <button class="btn btn-default btn-add-cart"  name="myclicker" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']?>&q=1&price=<?php echo $info['product_price']?>'"><img src="images/icons/cart-plus.png"> ADD TO CART</button>
            </div>
            <div class="col-md-2">

            </div>
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
