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
<title>Cancellation/Returns | MaxLifeFoods</title>
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

        <div class="subbody2" style="height: 4000px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
                    

        <h1>CANCELLATION/RETURNS</h1>

<p>You agree to comply with the following cancellation/returns policy if you make a purchase through the Site:</p>
<ul class="terms">
	<li>All purchases should be made with the consideration that you are purchasing perishable (though long-lasting) food items, and that 
	we strive for the utmost freshness of all purchases made by our customers.  It is for this reason that all sales are final once they have been shipped
	or placed on the loading dock.  It is understood that even if an email is sent seconds after an order is placed that cancellation notification by the
	customer to customer service may not be immediate, and that although customer service will make a reasonable attempt to stop shipment, there is no 
	guarantee that an order can be stopped no matter how quickly notification was attempted.  Refunds for cancellations will be issued in full
	minus 5% to cover credit card processing fees.</li>
</ul>


<p>©2012 MaxLife Foods, LLC. All rights reserved.</p></div>
		
		
		
		
        		</div>
			</div>
</div>

<?php include_once("footer.php") ?>

</div>
<?php include_once("googlefooter.php") ?>
</body>
</html>