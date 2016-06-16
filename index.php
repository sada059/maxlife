<?php
error_reporting(0);
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
<html>

<head>

<meta http-equiv="content-type" content="text/html; charset=WINDOWS-1252" >
<title>MaxLifeFoods - 25 Year Food Storage</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" media="all">


<?php include_once("head.php") ?>
<!-- load jQuery and the plugin -->
<!--<script src="js/jquery-1.7.1.min.js"></script>-->
<script src="js/bjqs-1.3.min.js"></script>

<script type="text/javascript">
function cycleImages(){
      var $active = $('#portfolio_cycler .active');
      var $next = ($('#portfolio_cycler .active').next().length > 0) ? $('#portfolio_cycler .active').next() : $('#portfolio_cycler img:first');
      $next.css('z-index',2);//move the next image up the pile
	  $active.fadeOut(1500,function(){//fade out the top image
	  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
      $next.css('z-index',3).addClass('active');//make the next image the top one
	  if ($('#portfolio_cycler .active').next().length > 0) setTimeout('cycleImages()',7000);//check for a next image, and if one exists, call the function recursively
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
    
<?php include_once("header.php") ?>
<a style="display:block;position:relative;top:-330px;left:80px;width:690px;height:300px;background-color:transparent;" href="/food-storage.php"></a>
    <!-- Page Content -->
    <section class="p-t-b-0" id="slider">
        <div class="container">
            <div id="owl-demo" class="owl-carousel">
                <div class="item p-rel">
                    <img src="images/slider/slider1.jpg">

                    <div class="p-abs">
                     <p><span class="slider-text">25 YEAR</span><br>
                       <span class="bold-text">BETTER TASTING</span><br>
                         <span class="slider-text">fOOD STORAGE</span></p>

                       <a href="#">Buy now <i class="fa fa-chevron-right"></i> </a>
                        <a href="#">Shop now <i class="fa fa-chevron-right"></i> </a>
                    </div>
                </div>
                <div class="item"><img src="images/slider/slider2.jpg"></div>
                <div class="item"><img src="images/slider/slider1.jpg"></div>
            </div>
            <ul class="slider-list">

                <li>
                    BETTER TASTING

                </li>

                <li>
                    LOWER PRICES
                </li>
                <li>
                    MORE FOOD CHOICES
                </li>
                <li>
                    FREE SHIPPING
                </li>
                <li>
                    RESEALABLE POUCHES
                </li>
                <li>
                    MORE FOOD PER SERVING
                </li>

            </ul>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
            <div class="col-md-9">
                <img src="images/banner1.jpg" class="border">
            </div>
            <div class="col-md-3">
                <div class="home-banner"><img src="images/banner2.jpg"></div>
                <div class="home-banner-title">Sampler Kit</div>
            </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">

               <div class="col-md-12 col-xs-12 col-sm-12 home-price-list">
                   <div class="col-md-2 col-xs-12 col-sm-6 serving">120 serving entree</div>
                   <div class="col-md-4 col-sm-6 col-xs-12 price-box">
                       <div class="col-md-8 col-sm-8 col-xs-8 home-price-title">MaxLifeFoods</div><div class="col-md-4 col-xs-4 col-sm-4 home-price">$174.99</div>
                       <div class="col-md-8 col-sm-8 col-xs-8 home-price-title">Legacy Premium</div><div class="col-md-4 col-xs-4 col-sm-4 home-price">$174.99</div>
                       <div class="col-md-8 col-sm-8 col-xs-8 home-price-title">My Food Storage</div><div class="col-md-4  col-xs-4 col-sm-4 home-price">$174.99</div>
                   </div>
                   <div class="col-md-4 col-sm-6 col-xs-12 price-box">
                       <div class="col-md-8 col-sm-8 col-xs-8 home-price-title">*My Patriot Supply</div><div class="col-md-4 col-xs-4 col-sm-4 home-price">$174.99</div>
                       <div class="col-md-8 col-sm-8 col-xs-8 home-price-title">*Only 56 Entree Servings</div><div class="col-md-4 col-xs-4 col-sm-4 home-price">$174.99</div>
                   </div>
                   <div class="col-md-2 col-xs-12 col-sm-12" style="padding-right: 0"><span class="compare">Click to compare!</span></div>
               </div>
           </div>

    </section>
    <section id="product">
        <div class="container">
                <div class="col-md-3 home-product">
                    <a href="meat.php?id=<?php echo $id; ?>"> <img src="images/product/product1.jpg"></a>
                    <div class="home-product-title">ADD-ONS (MEAT)<span class="plus-icon"><img src="images/icons/plus_icon.png"></span> </div>
                </div>
                <div class="col-md-3 home-product">
                    <a href="fruit.php?id=<?php echo $id; ?>"><img src="images/product/product2.jpg">
                    <div class="home-product-title">ADD-ONS (FRUIT)<span class="plus-icon"><img src="images/icons/plus_icon.png"></span> </div>
                </div>
                <div class="col-md-3 home-product">
                    <a href="veg.php?id=<?php echo $id; ?>"><img src="images/product/product3.jpg"></a>
                    <div class="home-product-title">ADD-ONS (VEG)<span class="plus-icon"><img src="images/icons/plus_icon.png"></span> </div>
                </div>
                <div class="col-md-3 home-product">
                    <a href="dairy.php?id=<?php echo $id; ?>"><img src="images/product/product4.jpg"></a>
                    <div class="home-product-title">ADD-ONS (EGGS)<span class="plus-icon"><img src="images/icons/plus_icon.png"></span> </div>
                </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row compare-box">
                <div class="col-md-5 compare1">
                    <img src="images/icons/copy.png"> Click here to compare
                </div>
                <div class="col-md-7 compare2">
                    MaxLife to other major brands
                </div>
            </div>
        </div>
    </section>
    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4 border-right border-bottom">
                    <img src="images/icons/fewer.png">
                    <h2>Fewer Filler (Non-Meal) Servings</h2>
                    <p>We fill our servings numbers with meals, not cheap drinks and desserts. Competitors fill their packages with up to 69% non-meal servings.</p>
                </div>
                <div class="col-md-4 border-right border-bottom">
                    <img src="images/icons/save.png">
                    <h2>Lower Cost Per
                        Serving</h2>
                    <p>Despite offering more meal servings, our price per serving is still lower than the competition.</p>
                </div>
                <div class="col-md-4 border-bottom">
                    <img src="images/icons/calories.png">
                    <h2>Lower Cost Per 2000
                        Calories</h2>
                    <p>Servings with low calorie count won't last in a food emergency. Our servings get you closer to your required daily calorie intake.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="images/icons/shipping.png">
                    <h2>Free Shipping</h2>
                    <p>We offer free shipping on EVERY order in 48 U.S. states. No minimums.</p>
                </div>
                <div class="col-md-4 border-right">
                    <img src="images/icons/tasting.png">
                    <h2>Better Tasting</h2>
                    <p>Rated independently at 85% for taste. Compare to 57% competitor rating.</p>
                </div>
                <div class="col-md-4">
                    <img src="images/icons/more_convienient.png">
                    <h2>More Convenient</h2>
                    <p>Faster time to ship, resealable pouches. Some of our competitors don't even offer stackable & resuable buckets or just-add-water meals.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
                <img src="images/banner3.jpg">
        </div>
    </section>
    <section id="brand">
        <div class="container">
            <div class="col-md-12" style="text-align: center"><h1>BLACK LINE SEEN ON</h1></div>
            <div class="col-md-12">
                <ul>
                    <li><img src="images/brands/01.png"></li>
                    <li><img src="images/brands/02.png"></li>
                    <li><img src="images/brands/03.png"></li>
                    <li><img src="images/brands/04.png"></li>
                    <li><img src="images/brands/05.png"></li>
                    <li><img src="images/brands/06.png"></li>
                    <li><img src="images/brands/07.png"></li>
                </ul>
            </div>
        </div>
    </section>
<?php include_once("footer.php") ?>
<?php include_once("googlefooter.php") ?>
</body>

</html>
