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
<title>Why MaxLife | MaxLifeFoods</title>
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

        <div class="subbody2" style="height: 500px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Privacy Policy</h1><br>
                    <p style="text-align: left;">MaxLifeFoods.com is committed to the privacy of our customers.  Our site uses an order form as well as a question form for customers to request information, products and services.  We collect only the information necessary to deliver the requested information, products and services.  We have security measures in place to secure our customers' sensitive information.  We do not store credit card numbers unless requested by the customer.  The customer information that we do store, which includes only the customer's name, address, e-mail, & phone number is used internally only for MaxLifeFoods and the customer only.  None of this information is sold to or shared with any third party, other than to provide the shipping address to shipping companies for the sole purpose of delivering requested MaxLifeFoods.com products to MaxLifeFoods.com customers.
						  <br><br>MaxLifeFoods.com rarely may contact customers regarding MaxLifeFoods.com offers.  These offers include simple instructions on how to remove yourself from future contact.  To be removed from the MaxLifeFoods.com contact list simply <a href="unsubscribe.php"><u>CLICK HERE</u></a> and complete the simple form.
                    <br><br>MaxLifeFoods.com advertises with third party companies such as Google that may use cookies to serve customers advertisements throughout the internet based on their viewing history.  This site sometimes incorporates remarketing or similar audiences through online ads when said third party targets advertisements to users. Users can opt out of Google's use of cookies by visiting Google's <a href="http://www.google.com/settings/ads">ads settings</a>.
                    <br><br>If you have any other questions about the safety and security of your personal information, please do not hesitate to call or e-mail us:  <a href="contact.php">click here to contact</a>.</p>
                    
        		</div>
			</div>
</div>

<?php include_once("footer.php") ?>

</div>
<?php include_once("googlefooter.php") ?>
</body>
</html>