<?php
	include("includes/db.php");
	include("includes/functions.php");
	
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
<title>Food Storage | MaxLifeFoods</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" />
<script language="javascript">
	function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
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

<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>
<div id="content">

<?php include_once("header.php") ?>

        <div class="subbody2" style="height: 500px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Supplemental - Dairy, Eggs, Meat & Rice, Fruit, and Vegetables</h1>
                    <p style="text-align: justify;">
                Supplement your long-term food storage with these lines of DAIRY, EGGS, MEAT & RICE, FRUIT, and VEGETABLES.  These lines are not meant to be the main source of food storage, but to help customize your food storage to your personal tastes.</p>
                
                <div class="moredetails">Click a product below to view more details.</div>
        <br><br>
    
    <div class=" products-grid">
    <!--<table border="0"><tr><td><a href="food-storage.php?id=<?php echo $id; ?>"><img border="0" src="http://maxlifefoods.com/images/product/mainthumb.jpg" border="0"></a></td><td><b><a href="food-storage.php?id=<?php echo $id; ?>">CLICK HERE TO VIEW OUR MAIN LINE OF FOOD STORAGE.</a></b></td></tr></table><br><br>-->
 
 
 
 
                    <table id="extragallery" style="text-align: center; margin: auto;">

                 	<tr>
                    	<td style="vertical-align: text-top;" colspan="5">
                    	<br>
                    	<b>SELECT A SUPPLEMENTAL LINE:</b>
                    	<br>
                    	</td>
                  </tr>
                	<tr>
                    	<td style="vertical-align: text-top;">
                        		<a href="meat.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/meat.jpg" alt="" /></a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="fruit.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/fruit.jpg" alt="" /></a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="veg.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/veg.jpg" alt="" /></a><br /><br />
                        </td>
                        <td style="vertical-align: text-top;">
                        		<a href="dairy.php?id=<?php echo $id; ?>"><img border="0" src="/images/product/dairyeggs.jpg" alt="" /></a><br /><br />
                        </td>
                    </tr>
				</table> 
 
 
 
 
                </div>
                </div>
                <div style="clear: both;"></div>
        	</div>
        </div>
<?php include_once("footer.php") ?>
</div>
<?php include_once("googlefooter.php") ?>
</body>
</html>
