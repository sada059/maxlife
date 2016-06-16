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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<div id="content">

<?php include_once("header.php") ?>

        <div class="subbody2" style="height: 1800px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Pay-As-You-Go</h1>
        				<img src="images/table_variety_pic.jpg" alt="" style="border: 15px solid white; margin-left: 20px;" align="right" />
                    <p style="text-align: justify;">
                    <b>Bulk pricing on a budget!</b> You don't have to pay up front to get bulk pricing.  By committing to purchase the bulk package we'll give you bulk pricing and send you stackable buckets each month over the payment period with a low monthly payment.<br /><br />
                    <b>Are there fees?</b> No fees.  You'll get the same price as if you purchased it all at once, the difference is that you'll receive the shipments over time instead of all at once.<br /><br />
						 <b>Will you check my credit?</b> There is no credit check. We can do this by making the first shipment the smallest and the last shipment the largest.<br \><br \>
						 <b>What if I can't pay one month?</b> No problem.  Just contact customer service and tell them to skip that month's payment.<br \><br \>
                    <b>Is shipping still free?</b> Yes, there is no additional charge for shipping the buckets separately.  Shipping is free.<br /><br />
                    <b>How do I get started?</b> Simply "add to cart" the payment option that fits your budget on the product page.<br /><br />
						 <b>Sale Prices?</b> Sale prices cannot be applied to pay-as-you-go packages except for the first month purchased during the sale period.<br /><br />
                    <h1>Packages with Pay-As-You-Go Pricing:</h1>
                    <ul style="list-style-type:circle;line-height:25px;">
                    	<li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4107">Basic 3 Mo. Family Pack - $929</a></li>
                    	<li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4106">Basic 6 Mo. Family Pack - $1699</a></li>
                    	<li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4105">Basic 1 Yr. Family Pack - $3199</a></li>
                    	<li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4207">Deluxe 3 Mo. Family Pack - $1299</a></li>
                    	<li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4206">Deluxe 6 Mo. Family Pack - $2499</a></li>
                    	<li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4205">Deluxe 1 Yr. Family Pack - $4499</a></li>
                    	<li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=651651">Black Line 3 Mo. Family Pack - $1349</a></li>
                    	<li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=654981">Black Line 6 Mo. Family Pack - $2499</a></li>
                    	<li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=987564">Black Line 1 Yr. Family Pack - $4499</a></li>
                    </ul>

                    

				</div>
        </div>
       </div>


<?php include_once("footer.php") ?>

        
</div>
<?php include_once("googlefooter.php") ?>
</body>
</html>
