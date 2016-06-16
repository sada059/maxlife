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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

        <div class="subbody2" style="height: 2500px;">
			<div class="subbody">
            	<div class="maincontent">
        			<h1>Food Storage Calculator</h1>
                     <div class="calculator">
                <img class="calcImage" src="/images/calculator_sm2.png" />
                <form name="calculatorform" method="get" action="food-storage-calculator.php">
            <input type="hidden" name="do" value="calc" />
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        	<div class="left calcItem">
            	<table>
                	<tr>
                    	<td style="text-align:center; line-height:20px;">
                        	<b>Adults:</b><br />
                			over 10 years old
                        </td>
                        <?php $adults = $_REQUEST['adults'] * 1; if($adults == 0 && !$_REQUEST['do']) $adults = ''; ?>
                    	<td> <input type="text" name="adults" class="calcfield" value="<?php echo $adults; ?>" /></td>
                    </tr>
                </table>
            </div>
            <div class="left calcItem">
            	<table>
                	<tr>
                    	<td style="text-align:center; line-height:20px;">
                        	<b>Children:</b><br />
                			under 10 years old
                        </td>
                        <?php $children = $_REQUEST['children'] * 1; if($children == 0 && !$_REQUEST['do']) $children = ''; ?>
                    	<td> <input type="text" name="children" class="calcfield" value="<?php echo $children; ?>" /></td>
                    </tr>
                </table>
            </div>
            <a class="left calcbtn" href="javascript:document.calculatorform.submit();"> </a>
            </form>
            </div>
    <?php
	if($adults != 0 || $children != 0) {
		$servingspermeal = ceil($adults + ($children * .5));
		$dayservings2 = $servingspermeal * 2;
		$dayservings3 = $servingspermeal * 3;
?>
        	<div id="calculatorbg">
        	<div class="topInfo">
            	<div class="left people">
		<?php
			$c = 0;
            $w = 1;
            for($i=1;$i<=$adults;$i++) {
				if($c <= 7) {
        ?>
					<?php if($w == 1) { ?>
                        <img class="left" src="/images/sil_man.jpg" />
                    <?php } else { ?>
                    	<img class="left" src="/images/sil_woman.jpg" />
                    <?php } ?>
            
            <?php
                    if($w == 1) { $w = 0; } else { $w = 1; }
				}
                $c++;
            }
			$w = 0;
            for($i=1;$i<=$children;$i++) {
				if($c <= 7) {
        ?>
					<?php if($w == 1) { ?>
                        <img class="left" src="/images/sil_boy.jpg" />
                    <?php } else { ?>
                    	<img class="left" src="/images/sil_girl.jpg" />
                    <?php } ?>
            
            <?php
                    if($w == 1) { $w = 0; } else { $w = 1; }
				}
                $c = $c+.75;
            }
        ?>
                </div>
                <div class="calculations right" style="margin-top:20px;margin-right:20px">
                    <div class="left numbers">
                        <?php echo $adults . ' Adults'?><br />
                        <?php echo $children . ' Children'?>
                    </div>
                    <div class="left equals">
                        =
                    </div>
                    <div class="left calcDetails">
                        <?php echo $servingspermeal?> servings per meal<br />
                        <?php echo $dayservings2?> servings per day at 2 meals per day<br />
                        <?php echo $dayservings3?> servings per day at 3 meals per day
                    </div>
                </div>
            </div>
           
        </div>
        <div class="clear"></div>
		<div id="calculatorbg">
        <div id="calcPackages">
<?php
	$query = mysql_query("SELECT * FROM products WHERE (product_category='1' or product_category='10') and active = 1 and servings > 150 ORDER BY product_price ASC");
	while ($row = mysql_fetch_assoc($query)) {
		if ($row['product_name'] == 'Deluxe Survival Kit') {
            continue;
        }
		if ($row['product_name'] == 'Essential Survival Kit') {
            continue;
        }
		$num = $row['servings'];
		$pps = $row['product_price']/$row['servings'];
?>
            <div class="item">
                <div class="productImage left">
                	<a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $row['product_key']; ?>"><img border="0" width="135" height="135" src="images/product/<?php echo $row['product_image']; ?>" /></a>
                </div>
                <div class="productDetails left">
                    <div class="productName" style="font-size:20px; overflow:hidden;">
                    	<div class="left" style="padding-top:3px;"><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $row['product_key']; ?>"><?php echo $row['product_name']; ?>  - <?php echo $row['servings']; ?> Servings </a> <a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $row['product_key']; ?>"><p class="viewDetails" style="margin-top: -30px; margin-left: 520px;"><?php $number = $row['product_price']; setlocale(LC_MONETARY, 'en_US'); $number2 = money_format('%(#10n', $row['competitor_price']); if ($number > 100) echo "<!--<font style='font-size: 16px;'><del> $number2 </del></font><br>-->"; echo money_format('%(#10n', $number); ?></p></a></div>
                    </div>
                    <input type="hidden" name="itemid" value="<?php echo $row['product_key']; ?>" />
                    <table class="orderrow"><tr><td><input type="image" style="border:none;float:left" onclick="window.location='details.php?id=<?php echo $id; ?>&pid=<?php echo $row['product_key']; ?>'" name="details" src="/images/viewDetails.png" /></td><td class="price" width="400">&nbsp;</td><td width="700">&nbsp;</td>
                    <td><div class="stats">
                    	<b>2</b> servings per day per person <img border="0" src="images/arrow_sm.png" /> <b><?php print floor($num/$dayservings2)?> days</b><br />
                        <b>3</b> servings per day per person <img border="0" src="images/arrow_sm.png" /> <b><?php print floor($num/$dayservings3)?> days</b><br />
                    </div>
                    </td><td><input type="image" style="border:none;float:right" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $row['product_key']?>&q=1&price=<?php echo $row['product_price']?>'" name="myclicker" src="/images/add_to_cart.jpg" > </td></tr></table>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
        </div>
<?php
	}

if ($adults > 0 or $children > 0) {
?>
<table align="center" border="0" cellpadding="10" cellspacing="10">
						<tr>
                    	<!--<td style="vertical-align: text-top;">
                        		<a href="food-storage.php?id=<?php echo $id; ?>"><img border="0" src="/images/foodstorage.jpg" alt="" /></a><br /><br />
                        </td>-->
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
					</table><br><br>
<?php } ?>

                </div>
                <div style="clear: both;"></div>
        	</div>
        </div>

<?php include_once("footer.php") ?>

</div>
<?php include_once("googlefooter.php") ?>
</body>
</html>
