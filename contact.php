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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/main_s.css" type="text/css" />
    <title>Contact Us | MaxLifeFoods</title>
    <script language="javascript">
        function validate(){
            var f=document.form1;
            if(f.name.value==''){
                alert('Your name is required');
                f.name.focus();
                return false;
            }
            f.command.value='update';
            f.submit();
        }
    </script>

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
        <div class="row">
            <div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            <div class="heading-blue">
                <h1>Contact Us</h1>
                <font style="color: red; font-weight: bold;"><?php echo $msg; ?></font>
                <form name="payment" id="payment" method="post" action="send.php" onsubmit="return validate()">
                    <input type="hidden" name="command" />
                    <fieldset>
                        <legend>Contact Information</legend>
                        <ol>
                            <li>
                                <label for=fname>First Name</label>
                                <input id=fname name=fname type=text placeholder="First name" required autofocus>
                            </li>
                            <li>
                                <label for=lname>Last Name</label>
                                <input id=lname name=lname type=text placeholder="Last name" required>
                            </li>
                            <li>
                                <label for=email>Email</label>
                                <input id=email name=email type=email placeholder="example@domain.com" required>
                            </li>
                        </ol>
                    </fieldset>
                    <fieldset>
                        <legend>Message</legend>
                        <ol>
                            <li>
                                <textarea style="height: 200px; width: 700px;" name="question"></textarea>
                            </li>
                        </ol>
                    </fieldset>
                    <fieldset>
                        <button type=submit>Send</button>
                    </fieldset>
                    <fieldset>
                        <legend>MaxLifeFoods: &nbsp;PO Box 2335, Orem, UT &nbsp;84059</legend>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include_once("includes/footer.php") ?>
<?php include_once("googlefooter.php") ?>
</body>
</html>