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
	
	$query = "SELECT * FROM products WHERE (product_category='1' or product_category='10') and active = 1 ORDER BY product_appear_order ASC";
	$run = mysql_query($query);
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

        <div class="subbody2" style="height: 3400px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Long-Term Food Storage</h1>
                    <p style="text-align: justify;">
                    <table border="0"><tr><td><img src="/images/25year.gif"></td><td class="smallhead">Visit our <a href="compare.php?id=<?php echo $id; ?>">comparison page</a> to see that you're not only spending less money per serving than other major brands, but you're also spending a lot less money per actual meal, and per 2000 calories, even with their high percentages of filler servings like drinks and desserts.  At MaxLife Foods our goal is to provide food storage that is <strong>convenient, long lasting, affordable, and delicious</strong>.</td></tr></table>
                               
                <div class="moredetails">Click a product below to view more details.</div>
        <br><br>
    
    <div class=" products-grid">
    <!--<table border="0"><tr><td><a href="supplemental.php?id=<?php echo $id; ?>"><img border="0" src="http://maxlifefoods.com/images/product/addonthumb.jpg" border="0"></a></td><td><b><a href="supplemental.php?id=<?php echo $id; ?>">ALSO SEE OUR SUPPLEMENTAL DAIRY, EGGS, MEAT & RICE, FRUIT, AND VEGETABLES LINES.</a></b></td></tr></table><br><br>-->
    <?php
    while($info = mysql_fetch_assoc($run)){
		$pps = $info['product_price']/$info['servings'];
        ?>
                        <div class="item first">
                            <div id="products-grid-container">
                                <div class="inner">
                
                    <a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><img border="0" src="/images/product/<?php echo $info['product_image']; ?>" width="135" height="135" alt="<?php echo $info['product_name2']; ?>" /></a>
                    
                    <div class="floatright">
                    <h2 class="product-name" style="color:#fff;"><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><?php echo $info['product_name2']; ?> <?php if ($info['product_key'] == '963852' || $info['product_key'] == '820741'){ }else {$number = $pps; setlocale(LC_MONETARY, 'en_US'); } ?></a><br /><p style="font-size: 15px; margin-top: -2px; text-indent: 40px;"><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><?php if ($info['servings'] === NULL){ echo "&nbsp;"; }else { echo $info['servings']." Servings"; echo "<!-- - ".money_format('%(#10n', $number)."/Srv-->"; } if ($info['servings'] === NULL){ echo "&nbsp;"; }else { echo "&nbsp;"; } ?></a></p><a href="details.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']; ?>"><p class="viewDetails" style="margin-top: -50px;"><?php $number = $info['product_price']; setlocale(LC_MONETARY, 'en_US'); echo money_format('%(#10n', $number); if ($number > 100); ?></p></a></h2>
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
                            <input type="image" style="border:none;float:right" onclick="window.location='addtocart.php?id=<?php echo $id; ?>&pid=<?php echo $info['product_key']?>&q=1&price=<?php echo $info['product_price']?>'" name="myclicker" src="/images/add_to_cart.jpg" > 
    
                                    
                  
                    </div>
                   <!-- <div class="pricebox">  
                        Price: <br>
    
            
        <div class="price-box">
                                                                <span class="regular-price" id="product-price-1">
                        <span class="price">
							<?php 
								//$number = $info['product_price'];
								//setlocale(LC_MONETARY, 'en_US');
								//echo money_format('%(#10n', $number);
							?>
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
</body>
</html>
