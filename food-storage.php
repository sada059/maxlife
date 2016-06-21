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
<?php include_once("includes/header.php") ?>
<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>

<section>
    <div class="container">
        <img src="images/banner4.jpg">
        <div class="row no-margin">
            <div class="col-md-6 col-xs-12 col-sm-12 storage-box blue">
                <h2>Individual Buckets</h2>
                <h3>Individual &  Supplementaal Buckets</h3>
                 <p><a href="details.php?id=<?php echo $id; ?>&pid=111">Sampler Kit</a><br>
                     <a href="details.php?id=<?php echo $id; ?>&pid=4110">1 Mo. Family Dinners</a><br>
                     <a href="details.php?id=<?php echo $id; ?>&pid=4109">1 Mo. Family Breakfasts</a><br>
                     <a href="details.php?id=<?php echo $id; ?>">Add-Ons (Meat,Fruit...)</a></p>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-12 storage-box green">
                <h2>Basic Family Packs</h2>
                <h3>2 Meals Per Day for 4 Individuals</h3>
                <p>
                    <a href="details.php?id=<?php echo $id; ?>&pid=4108">1 Mo. Family Pack     		&nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp;    		$335</a><br>
                    <a href="details.php?id=<?php echo $id; ?>&pid=4107">3 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$929</a><br>
                    <a href="details.php?id=<?php echo $id; ?>&pid=4106">6 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$1699</a><br>
                    <a href="details.php?id=<?php echo $id; ?>&pid=4105">1Yr. Family Pack		&nbsp; &nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$3199</a>
                </p>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col-md-6 col-xs-12 col-sm-12 storage-box red">
                <h2>Deluxe Family Packs</h2>
                <h3>3 Meals Per Day for 4 Individuals</h3>
                <p>
                    <a href="details.php?id=<?php echo $id; ?>&pid=4208"> 1 Mo. Family Pack     		&nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp;    		$479</a><br>
                    <a href="details.php?id=<?php echo $id; ?>&pid=4207">3 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$1299</a><br>
                    <a href="details.php?id=<?php echo $id; ?>&pid=4206">6 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$2499</a><br>
                    <a href="details.php?id=<?php echo $id; ?>&pid=4205">1Yr. Family Pack		&nbsp; &nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$4499</a>
                </p>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-12 storage-box maroon">
                <h2>Basic Family Packs</h2>
                <h3>2 Meals Per Day for 4 Individuals</h3>
                <p>
                    <a href="details.php?id=<?php echo $id; ?>&pid=651651">3 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$1349</a><br>
                    <a href="details.php?id=<?php echo $id; ?>&pid=654981">6 Mo. Family Pack	&nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	$2499</a><br>
                    <a href="details.php?id=<?php echo $id; ?>&pid=987564">1Yr. Family Pack		&nbsp; &nbsp; &nbsp; &nbsp;	-	&nbsp; &nbsp; &nbsp;	4$599</a><br>
                    &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp;	</p>
            </div>
        </div>
    </div>
</section>
<section id="product">
    <div class="container">
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
</section>
<section>
    <div class="container">
        <div class="row no-margin storage-year">
            <div class="col-sm-2 storage-year-first">
                <img src="images/icons/25-year.jpg">
            </div>
            <div class="col-sm-10 ">
                <p>Visit our comparison page to see that you're not only spending less money per serving than other major brands, but you're also spending a lot less money per actual meal, and per 2000 calories, even with their high percentages of filler servings like drinks and desserts. At MaxLife Foods our goal is to provide food storage that is <strong>convenient, long lasting, affordable, and delicious.</strong></p>
            </div>
        </div>
    </div>
</section>
<?php include_once("includes/footer.php") ?>
</body>
</html>
