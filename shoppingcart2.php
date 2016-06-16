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
	
	$run = mysql_query("SELECT * FROM order_details WHERE order_key=$id");
	$num = mysql_num_rows($run);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart | MaxLifeFoods</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" />

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16356880-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</head>

<body>
<div id="content">
    	<div class="topbar">
        	<div class="banner"></div>
            <div class="cart"><a href="shoppingcart.php?id=<?php echo $id; ?>">View Cart</a></div>
        </div>
        <div class="subtop">
            <ul class="navigation">
                	<li>
                    	<a href="index.php?id=<?php echo $id; ?>">HOME</a>
                    </li>
                    <li>
                    	<a href="food-storage.php?id=<?php echo $id; ?>">FOOD STORAGE</a>
                    </li>
                    <li>
                    	<a href="camping-food.php?id=<?php echo $id; ?>">72HR / CAMPING FOOD</a>
                    </li>
                    <li>
                    	<a href="menu.php?id=<?php echo $id; ?>">MENU</a>
                    </li>
                    <li>
                    	<a href="why-maxlife.php?id=<?php echo $id; ?>">WHY MAXLIFE</a>
                    </li>
                    <li>
                    	<a href="contact.php?id=<?php echo $id; ?>">CONTACT</a>
                    </li>
                </ul>
        </div>
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
                            <tr><td><img src="images/product/<?php echo $pimage;?>" alt="" /></td><td><?php echo $pname; $ispackage = strpos($pname, "Package"); if($ispackage !== false) echo "<br>($pname2)";?></td>
                            <td><?php $number = $pprice; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?></td>
                            <td><input type="text" name="quantity<?php echo $pkey?>" value="<?php echo $pq?>" maxlength="3" size="2" /></td>                    
                            <td><?php $number = $pprice*$pq; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?></td>
                            <td><a href="process-cart.php?id=<?php echo $id; ?>&pid=<?php echo $pkey?>&del=1">Remove</a></td></tr>
                    <?php					
                        }
									$tax = $total*0.03;
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
<div class="subbottom">
        	<ul class="navigationb">
                	<li>
                    	<a href="index.php?id=<?php echo $id; ?>">HOME</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="food-storage.php?id=<?php echo $id; ?>">FOOD STORAGE</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="camping-food.php?id=<?php echo $id; ?>">72HR / CAMPING FOOD</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li> 
                    <li>
                    	<a href="menu.php?id=<?php echo $id; ?>">MENU</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="why-maxlife.php?id=<?php echo $id; ?>">WHY MAXLIFE</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="contact.php?id=<?php echo $id; ?>">CONTACT</a>
                    </li>
                </ul>
                <div class="fb">
                	<a href="http://www.facebook.com/pages/Max-Life-Foods/137779489655373" target="_blank">FB</a>
                </div>
        </div>
</div>
</body>
</html>