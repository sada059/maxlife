<?php
	include("includes/db.php");
	
	$id = $_GET['id'];

    if ($id == '') {
        session_start();
        if(isset($_SESSION['id']))
          $id = $_SESSION['id'];
    }
    if ($id == '') {
  		$id = $_COOKIE['id'];
    }

	$q = mysql_query("SELECT * FROM orders WHERE order_key = $id");
	$info = mysql_fetch_assoc($q);
	

		// REMOVE ALL COOKIES AND SESSION VARIABLES
      $_SESSION['id'] = '';
      setcookie('id', '', time() - 3600);
      $id = '';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Thank You | MaxLifeFoods</title>
<link rel="stylesheet" href="/css/main_s.css" type="text/css" />

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

        <div class="subbody2" style="height: 500px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Thank You</h1>
                    <p style="text-align: center;">Thank you for your MaxLife Foods order. <br /><br/ >You will receive tracking information via e-mail 1-2 days after your order ships.</p>
                    <p><?php echo $info['receipt']; ?></p>
                    
        		</div>
			</div>
</div>

<?php include_once("footer.php") ?>

</div>

<!-- Google Code for Sale Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1010409560;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "-UkCCIDy4gMQ2MDm4QM";
var google_conversion_value = <?php echo $info['amount']; ?>;
/* ]]> */
</script>
<script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="https://www.googleadservices.com/pagead/conversion/1010409560/?value=<?php echo $info['amount']; ?>&amp;label=-UkCCIDy4gMQ2MDm4QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- MSN conversion tracking code -->
<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.msn.com/mstag/site/65290793-f0c9-474b-bc20-8356f96a424a/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"1965810",type:"1",actionid:"189833"})</script> <noscript> <iframe src="//flex.msn.com/mstag/tag/65290793-f0c9-474b-bc20-8356f96a424a/analytics.html?dedup=1&domainId=1965810&type=1&actionid=189833" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>

<?php include_once("googlefooter.php") ?>
</body>
</html>
