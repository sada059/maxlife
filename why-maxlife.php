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
<title>MaxLife Nationwide TV Commercial | MaxLifeFoods</title>
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

        <div class="subbody2" style="height: 1000px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Why Maxlife?</h1>
                    <iframe src="//player.vimeo.com/video/86631588" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    <p style="text-align: justify;">
                <b>PEACE OF MIND</b> - We created MaxLife Foods to create food storage that <b>stored as long as possible, tasted better, provided more food per serving, was more convenient to store & use, was easier to prepare, and was more affordable</b>.  We did just that.  Our delicious, gourmet, just-add-water food storage entrees are guaranteed to be the best price.
                <br><br><b>BEST VALUE</b> - Some competitors are so expensive that they won't even tell you their prices until they're in your home doing a demonstration and trying to upsell you.  You also may end up with <b>canned food that is hard to store, difficult to open, and unweildy once opened</b>.  Other food storage companies <b>claim packages with a high number of servings while using a lot of cheap fillers like drinks and desserts</b> that provide low caloric intake that is needed in an emergency.
					<br><br><b>U.S. PRODUCED</b> - Our food storage is 100% produced in the U.S. and 99% of the food is sourced from the U.S.  The other small percentage is for seasonal freshness.
					<br \><br \><b>CONVENIENT</b> - We are your one-stop shop for everything food storage.  Thought you didn't have the space or budget for a long-term, 1 year food storage option for your whole family?  For 2 adults and 4 kids you can fit your rationed supply in the same amount of space as a washer and dryer.  Use your long-term food storage for the food portion of a 72 hour emergency kit as well.  Just grab a 20 lb bucket full of a variety of individually packaged, airtight, nitrogen flushed meals and go.  For sportsmen, <strong>it doesn't get much easier than pulling pouch out of your backpack and adding water.</strong>
                </p>
                
                <ul style="list-style-type:circle;line-height:25px;">
                <li><a href="freeze-dry-and-dehydration-process.php">Freeze Dry and Dehydration Process</a></li>
                <li><a href="shelf-life.php">Shelf Life</a></li>
                <li><a href="smart-packaging.php">Smart Packaging</a></li>
                </ul>

                <p>&nbsp;</p>


                </div>
                <div style="clear: both;"></div>
        	</div>
        </div>
        
<?php include_once("footer.php") ?>
        
</div>
<?php include_once("googlefooter.php") ?>
</body>
</html>