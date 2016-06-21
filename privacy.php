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
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Why MaxLife | MaxLifeFoods</title>

<?php include_once("includes/head.php") ?>
<?php include_once("analyticstracking.php") ?>
</head>
<body>

<?php include_once("includes/header.php") ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="padding: 0"> <h2>Privacy Policy</h2></div>
            <div class="col-md-6"> <a href="food-storage-calculator.php?id=<?php echo $id; ?>"><img src="images/icons/family-foodstorage-calculator.png" class="push-right"></a></div>
        </div>
            <br><br>
        <div class="row">
            <p style="text-align: left;">MaxLifeFoods.com is committed to the privacy of our customers.  Our site uses an order form as well as a question form for customers to request information, products and services.  We collect only the information necessary to deliver the requested information, products and services.  We have security measures in place to secure our customers' sensitive information.  We do not store credit card numbers unless requested by the customer.  The customer information that we do store, which includes only the customer's name, address, e-mail, & phone number is used internally only for MaxLifeFoods and the customer only.  None of this information is sold to or shared with any third party, other than to provide the shipping address to shipping companies for the sole purpose of delivering requested MaxLifeFoods.com products to MaxLifeFoods.com customers.</p>
                        <br><p>MaxLifeFoods.com rarely may contact customers regarding MaxLifeFoods.com offers.  These offers include simple instructions on how to remove yourself from future contact.  To be removed from the MaxLifeFoods.com contact list simply <a href="unsubscribe.php"><u>CLICK HERE</u></a> and complete the simple form.</p>
                                                          <br><br><p>MaxLifeFoods.com advertises with third party companies such as Google that may use cookies to serve customers advertisements throughout the internet based on their viewing history.  This site sometimes incorporates remarketing or similar audiences through online ads when said third party targets advertisements to users. Users can opt out of Google's use of cookies by visiting Google's <a href="http://www.google.com/settings/ads">ads settings</a>.</p>
                    <br><p>If you have any other questions about the safety and security of your personal information, please do not hesitate to call or e-mail us:  <a href="contact.php">click here to contact</a>.</p>
        </div> 
             </div>
    </section>

<section>
    <div class="container">
        <div class="row">
            <div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            <div class="heading-blue">
                <h1>Privacy Policy</h1><br>
                <p style="text-align: left;">MaxLifeFoods.com is committed to the privacy of our customers.  Our site uses an order form as well as a question form for customers to request information, products and services.  We collect only the information necessary to deliver the requested information, products and services.  We have security measures in place to secure our customers' sensitive information.  We do not store credit card numbers unless requested by the customer.  The customer information that we do store, which includes only the customer's name, address, e-mail, & phone number is used internally only for MaxLifeFoods and the customer only.  None of this information is sold to or shared with any third party, other than to provide the shipping address to shipping companies for the sole purpose of delivering requested MaxLifeFoods.com products to MaxLifeFoods.com customers.
                <br><br>MaxLifeFoods.com rarely may contact customers regarding MaxLifeFoods.com offers.  These offers include simple instructions on how to remove yourself from future contact.  To be removed from the MaxLifeFoods.com contact list simply <a href="unsubscribe.php"><u>CLICK HERE</u></a> and complete the simple form.
                <br><br>MaxLifeFoods.com advertises with third party companies such as Google that may use cookies to serve customers advertisements throughout the internet based on their viewing history.  This site sometimes incorporates remarketing or similar audiences through online ads when said third party targets advertisements to users. Users can opt out of Google's use of cookies by visiting Google's <a href="http://www.google.com/settings/ads">ads settings</a>.
                <br><br>If you have any other questions about the safety and security of your personal information, please do not hesitate to call or e-mail us:  <a href="contact.php">click here to contact</a>.</p>
            </div>
		</div>
	</div>
</section>

<?php include_once("includes/footer.php") ?>

<?php include_once("googlefooter.php") ?>
</body>
</html>