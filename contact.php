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
<link rel="stylesheet" href="css/main_s.css" type="text/css" />
<title>Contact Us | MaxLifeFoods</title>

    <?php include_once("includes/head.php") ?>
<?php include_once("analyticstracking.php") ?>
</head>
<body>
<?php include_once("includes/header.php") ?>
<div class="container heading">
    <div class="row">
        <div class="col-md-6"> <h2>Contact Us</h2></div>
        <div class="col-md-6"> <a href="food-storage-calculator.php?id=<?php echo $id; ?>"><img src="images/icons/family-foodstorage-calculator.png" class="push-right"></a></div>
    </div>
</div>
<form name="payment" method="post" action="send.php" onsubmit="return validate()">

<section>
    <div class="container">
        <div class="row contact-title">
            <h2>Contact Information</h2>
        </div>
        <div class="row contact-content">
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        First Name
                    </label>
                    <input id="fname" name="fname" required class="form-control" type="text" />
                </div>

                <div class="form-group">
                    <label>
                        Email
                    </label>
                    <input id="lname" name="lname"  required class="form-control" type="text" />
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Last Name
                    </label>
                    <input class="form-control"  required id="email" name="email" type="text" />
                </div>

            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row contact-title">
            <h2>Message</h2>
        </div>
        <div class="row contact-content">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea rows="10" cols="" name="question" class="form-control">
                    </textarea>
                </div>
            </div>

        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row btn-order">
            <br/>  <input type="submit" class="btn btn-default" value="SEND"><br/><br/>
        </div>
    </div>
</section>
</form>

<?php include_once("includes/footer.php") ?>

</body>
</html>
