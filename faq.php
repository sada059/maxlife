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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("includes/head.php") ?>
<title>FAQ | MaxLifeFoods</title>
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
<?php include_once("includes/header.php") ?>

<section>
    <div class="container">
    
    <div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
        <div class="row">
        	<h1>Why Maxlife? / FAQ</h1>
    		<div class="col-md-12 col-xs-12 col-sm-12">
            	<iframe src="//player.vimeo.com/video/86631588" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <p>&nbsp;</p>
    	<p><strong>PEACE OF MIND</strong> - We created MaxLife Foods to create food storage that <strong>stored as long as possible, tasted better, provided more food per serving, was more convenient to store & use, was easier to prepare, and was more affordable</strong>.  We did just that.  Our delicious, gourmet, just-add-water food storage entrees are guaranteed to be the best price.</p>
        <p><strong>BEST VALUE</strong> - Some competitors are so expensive that they won't even tell you their prices until they're in your home doing a demonstration and trying to upsell you.  You also may end up with <strong>canned food that is hard to store, difficult to open, and unweildy once opened</strong>.  Other food storage companies <strong>claim packages with a high number of servings while using a lot of cheap fillers like drinks and desserts</strong> that provide low caloric intake that is needed in an emergency.</p>
        <p><strong>U.S. PRODUCED</strong> - Our food storage is 100% produced in the U.S. and 99% of the food is sourced from the U.S.  The other small percentage is for seasonal freshness.</p>
    <p><strong>CONVENIENT</strong> - We are your one-stop shop for everything food storage.  Thought you didn't have the space or budget for a long-term, 1 year food storage option for your whole family?  For 2 adults and 4 kids you can fit your rationed supply in the same amount of space as a washer and dryer.  Use your long-term food storage for the food portion of a 72 hour emergency kit as well.  Just grab a 20 lb bucket full of a variety of individually packaged, airtight, nitrogen flushed meals and go.  For sportsmen, <strong>it doesn't get much easier than pulling pouch out of your backpack and adding water.</strong>
    </p>
    <div class="list-group">
      <a href="freeze-dry-and-dehydration-process.php" class="list-group-item">Freeze Dry and Dehydration Process</a>
      <a href="shelf-life.php" class="list-group-item">Shelf Life</a>
      <a href="smart-packaging.php" class="list-group-item">Smart Packaging</a>
    </div>   
    <p>&nbsp;</p>            	

    <h1>Frequently Asked Questions</h1>
    <img src="images/table_variety_pic.jpg" alt="" style="border: 15px solid white; margin-left: 20px;" align="right" />
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Why is MaxLife better?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    MaxLife food storage tastes better, is less expensive, provides more food per serving, has fewer fillers like drinks & desserts, is easier to prepare, and more convenient to store. We are truly the best value in the industry.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Financing?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    Contact us for financing options if you want all the entire pack now, or we can put you on a monthly pay-as-you-go plan and send you buckets monthly.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">How much food does a person need daily? </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                   This depends on the person, but we recommend 2000 calories per day on average for an adult. In survival mode you can survive on less, but we recommend preparing based on this number. Even with our higher calories per serving than the competition, it takes about 8 servings to reach 2000 calories.
                </div>
            </div>
        </div>
         <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">What is a "filler"?</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                   Some food storage companies fill their packages with "filler" items like drink mixes, desserts, and non-meals such as plain rice. These are cheap, but allow them to claim more servings per package. With MaxLifeFoods.com you get more meal servings, not fluff.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">How do I prepare a meal?</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    Simply add one cup of (preferably hot) water per serving. You can reuse resealable pouches to combine the food and water. There is no cooking required unless you prefer your meal hot.
                    </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Where/Temperature should I store it? </a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                   The garage is not usually a good place because of the fluctuation of temperature. The cold does not adversely affect the shelf life, but temperatures above 75 degrees will. Store indoors where temperatures are more consistently maintained. Optimal storage conditions are in cool, dark, and dry places.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">How much water will I need?</a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
                <div class="panel-body">
                   On average, each individual serving of our main entrees and breakfasts require 1 cup of water per serving.
                </div>
            </div>
        </div>        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Do you have to use boiling water?</a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="panel-body">
                   Hot water speeds up the process of reconstitution. Our meals will be ready to eat more quickly when hot water is used. However, many of the entrees/breakfasts can be re-hydrated and ready to eat with any temperature of water.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">How is the food packaged?</a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="panel-body">
                   100% of our food is packaged in Mylar pouches. These pouches are then arranged in durable polyethylene buckets for easy storage. Oxygen Absorbers are also placed in each pouch to eliminate oxygen.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">How long does the food last?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                   Studies have proven that freeze-dried and dehydrated foods will last up to 25 years or even longer when stored correctly. For optimal storage life it is suggested that food be stored in a cool, dry place, such as a basement, with room temperatures of 50 to 55 degrees.
                </div>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">Does opening the bucket affect the shelf life of the pouches within? </a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="panel-body">
                    No, the pouches have been designed to sustain long life by using mylar, nitrogen flushing and oxygen absorbers. Opening the bucket does not affect shelf life of the pouches. The bucket just creates a great way to hold and protect the pouches.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve">How much food should we have stored for our family?</a>
                </h4>
            </div>
            <div id="collapseTwelve" class="panel-collapse collapse">
                <div class="panel-body">
                   The needs of each family are different. We offer a variety of options to meet your individual and family needs. We offer packages and products based on number of servings. We also provide the number of calories in each package. From there you calculate how many servings of food needed for your family for any length of time. We also offer supplementary products to enhance your food storage such as fruits, vegetables, meats, and nutritious drinks.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen">Why use both freeze-dried and dehydrated ingredients? </a>
                </h4>
            </div>
            <div id="collapseThirteen" class="panel-collapse collapse">
                <div class="panel-body">
                   We use a best of breed approach. Certain ingredients set-up and taste better when freeze-dried (vegetables, fruits, meats) while others do better through dehydration. In these cases dehydrated ingredients offer all the benefits and better value than foods that have only been purely freeze-dried.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen">Will I be notified of my product delivery?</a>
                </h4>
            </div>
            <div id="collapseFourteen" class="panel-collapse collapse">
                <div class="panel-body">
                   Yes, you will receive an email regarding your order and delivery times.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFifteen">How do your products ship?</a>
                </h4>
            </div>
            <div id="collapseFifteen" class="panel-collapse collapse">
                <div class="panel-body">
                   MaxLife products ship via UPS.
                </div>
            </div>
        </div><div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen">Can I order individual entrees in bulk?</a>
                </h4>
            </div>
            <div id="collapseSixteen" class="panel-collapse collapse">
                <div class="panel-body">
                   No, sorry.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen">How long will it last my family?</a>
                </h4>
            </div>
            <div id="collapseSeventeen" class="panel-collapse collapse">
                <div class="panel-body">
                   Use our <a href="food-storage-calculator.php">food storage calculator</a>.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEighteen">Returns?</a>
                </h4>
            </div>
            <div id="collapseEighteen" class="panel-collapse collapse">
                <div class="panel-body">
                   All sales are final.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNineteen">Is it organic? </a>
                </h4>
            </div>
            <div id="collapseNineteen" class="panel-collapse collapse">
                <div class="panel-body">
                   No.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwenty">Is it gluten free?</a>
                </h4>
            </div>
            <div id="collapseTwenty" class="panel-collapse collapse">
                <div class="panel-body">
                   No.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwentyone">Is it non-GMO?</a>
                </h4>
            </div>
            <div id="collapseTwentyone" class="panel-collapse collapse">
                <div class="panel-body">
                   Although we do not intentionally source GMO ingredients we cannot guarantee that the product is 100% non-GMO.
                </div>
            </div>
        </div>
        	
</div>
        
    
    
    </div>
    </div>
    </div>

</section>
<style>
    .faqHeader {
        font-size: 27px;
        margin: 20px;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: FontAwesome;
        content:  "\f061"; /* "play" icon */
        float: right;
        color: #F58723;
        font-size: 15px;
		font-weight: normal;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
	.responsive-video {
position: relative;
padding-bottom: 56.25%;
padding-top: 60px; overflow: hidden;
}


.responsive-video iframe,
.responsive-video object,
.responsive-video embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}
</style>
<?php include_once("includes/footer.php") ?>
<?php include_once("googlefooter.php") ?>
</body>
</html>
