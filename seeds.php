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

$query = "SELECT * FROM products WHERE product_category='8' and active = 1 ORDER BY product_appear_order ASC";
$run = mysql_query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Seeds | MaxLifeFoods Food Storage</title>
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

        <div class="subbody2" style="height: 700px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Seeds</h1>
                    <p style="text-align: justify;">
                Reach full self-reliance with the an asset that your emergency food storage reserve needs.  Each Mini-Ropak Bucket contains 16 popular varieties that will plant nearly 3/4 acre of garden!

These Seeds are Non-Hybrid, Non-GMO and are not chemically treated. Because they are non-hybrid, seeds may be harvested at the end of the growing season and then used for the next year's planting.</p>
                
                <div class="moredetails">Click a product below to view more details.</div>
        <br><br>
    
    <div class=" products-grid">
    <?php
    while($info = mysql_fetch_assoc($run)){
		$pps = $info['product_price']/$info['servings'];
        ?>
                        <div class="item first">
                            <div id="products-grid-container">
                                <div class="inner">
                
                  <a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><img border="0" src="/images/product/<?php echo $info['product_image']; ?>" width="135" height="135" alt="<?php echo $info['product_name']; ?>" /></a>
                    
                    <div class="floatright">
                    <h2 class="product-name" style="color:#fff;"><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><?php echo $info['product_name']; ?></a> <?php if ($pps == 0){ }else {$number = $pps; setlocale(LC_MONETARY, 'en_US'); echo "- ".money_format('%(#10n', $number)."/Serving"; } ?><br /><p style="font-size: 12px; margin-top: -2px; text-indent: 40px;"><?php if ($pps == 0) { echo "&nbsp;"; }else { echo $info['servings']." Servings"; } ?></p><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><p class="viewDetails" style="margin-top: -40px;"><?php $number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?></p></a></h2>
                    <div class="text" style="margin-top: -25px;">
                    <?php
                    $position = 83;
                    
                    $message = $info['product_desc']; 
					$post = substr($message, 0, $position); 
					
                    echo $post;
                    echo "...";
                    ?>                                       
                            
                            
                           <div class="clear"></div>                       
                            
                            
                            <input type="image" style="border:none;float:left" onclick="window.location='details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>'" name="details" src="/images/viewDetails.png" />
                            <input type="image" style="border:none;float:right" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']?>&q=1&price=<?php echo $info['product_price']?>'" name="myclicker" src="/images/add_to_cart_white.jpg" >  
                                                 
    
                                    
                  
                    </div>
                    <!--<div class="pricebox">  
                        Price: <br>
    
            
        <div class="price-box">
                                                                <span class="regular-price" id="product-price-1">
                        <span class="price">
							<?php //$number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); ?>
                        </span>                </span>
                            
            </div>
    
                        <div class="clear"></div>
                    </div>-->
                    
                    
                    
                    
                                        </div>
                
                <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div><br><br>
                </div>
    <?php
	}
    ?>
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
