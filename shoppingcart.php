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
	
	$run = mysql_query("SELECT d.* FROM orders o, order_details d WHERE o.order_key=$id AND o.order_key = d.order_key AND o.ship_address IS NULL");
	$num = mysql_num_rows($run);
	
	if ($num == 0) {
		// REMOVE ALL COOKIES AND SESSION VARIABLES IF THE ORDER HAS ALREADY BEEN COMPLETED
      $_SESSION['id'] = '';
      setcookie('id', '', time() - 3600);
      $id = '';
   }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart | MaxLifeFoods</title>
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

        <div class="subbody2" style="height: 2350px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
                        <h1>Your Shopping Cart</h1>
                        <input type="button" value="Continue Shopping" onclick="window.location='food-storage.php?id=<?php echo $id; ?>'" />
                        <form name="form2" method="post" action="process-cart.php?id=<?php echo $id; ?>">
                        
					<div style="margin:0px auto; width:650px;" >
    					<div style="padding-bottom:10px">
    						
    						
    					</div>
    					<div style="color:#F00"></div>
    					<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;" width="100%">
						<?php
                            if($id !== '' && $num !== 0){
                                echo '<tr bgcolor="#831911" style="font-weight:bold; color:#fff;"><td>&nbsp;</td><td>Name</td><td>Price</td><td>Qty</td><td>Amount</td><td>Options</td></tr>';
                               // $max=count($_SESSION['cart']);
                               /* for($i=0;$i<$max;$i++){
                                    $pid=$_SESSION['cart'][$i]['productid'];
                                    $q=$_SESSION['cart'][$i]['qty'];
                                    $pname=get_product_name($pid);
									$pimage=get_product_image($pid);
                                    if($q==0) continue; */
								while($row = mysql_fetch_assoc($run)){
									$q = mysql_query("SELECT * FROM products WHERE product_key = $row[product_key]");
									$qq = mysql_fetch_assoc($q);
									$pkey = $qq['product_key'];
									$pname = $qq['product_name'];
									$pname2 = $qq['product_name2'];
									$pimage = $qq['product_image'];
									$pprice = $qq['product_price'];
									$pq = $row['quantity'];
									$total += $pprice*$pq;
									
                            ?>
                            <input type="hidden" name="product_key[]" value="<?php echo $pkey; ?>" />
                            <tr><td><img width="135" height="135" src="images/product/<?php echo $pimage;?>" alt="" /></td><td><?php echo $pname; $ispackage = strpos($pname, "Package"); if($ispackage !== false) echo "<br>($pname2)";?></td>
                            <td><?php $number = $pprice; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?></td>
                            <td><input type="text" name="quantity<?php echo $pkey?>" value="<?php echo $pq?>" maxlength="3" size="2" /></td>                    
                            <td><?php $number = $pprice*$pq; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?></td>
                            <td><a href="process-cart.php?id=<?php echo $id; ?>&pid=<?php echo $pkey?>&del=1">Remove</a></td></tr>
                    <?php					
                        }
									$tax = 0;
									$base = 10;
									$fig = $total*0.06;
									$ship = $base+$fig;
									$ship = 0;
									$gtotal = $total+$tax+$ship;
                    ?>
                    <input type="hidden" name="stotal" value="<?php echo $total; ?>" />
                    <input type="hidden" name="tax" value="<?php echo $tax; ?>" />
                    <input type="hidden" name="shipping" value="<?php echo $ship; ?>" />
                    <input type="hidden" name="gtotal" value="<?php echo $gtotal; ?>" />
                    	<tr style="background-color:#E1E1E1"><td></td><td colspan="5" align="right"><b>Sub Total: <?php $number = $total; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?></b></td></tr>
                        <tr style="background-color:#E1E1E1"><td></td><td colspan="5" align="right"><b>Tax: <?php $number = $tax; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?></b></td></tr>
                        <tr style="background-color:#E1E1E1"><td></td><td colspan="5" align="right"><b>Shipping: <?php $number = $ship; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?></b></td></tr>
                        <tr style="background-color:#E1E1E1"><td></td><td colspan="5" align="right"><b>Grand Total: <?php $number = $gtotal; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?></b></td></tr>
                        <tr style="background-color:#E1E1E1"><td></td><td colspan="5" align="right"><input type="submit" name="submit" value="Clear Cart"><input type="submit" name="submit" value="Update Cart"><input type="submit" name="submit" value="Place Order"></td></tr>
                    <?php
                    }
                    else{
                        echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
                    }
                ?>
                </table>
    </div>
</form>
			</div>
		</div>
	</div>

<?php include_once("footer.php") ?>

</div>
<?php include_once("googlefooter.php") ?>
</body>
</html>