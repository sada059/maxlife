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

        <div class="subbody2" style="height: 1000px;">
			<div class="subbody">
            	
            	<div class="maincontent">
        				<div>
                    <img src="/images/foodstorage_topimage.gif">
                    </div>
                    <div id="foodstoragelist">
                    	<div id="column1"><ul><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=111">Sampler Kit</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4110">1 Mo. Family Dinners</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4109">1 Mo. Family Breakfasts</a></li><li><a href="http://maxlifefoods.com/supplemental.php?id=<?php echo $id; ?>">Add-Ons (Meat,Fruit...)</a></li></ul></div>
                    	<div id="column2"><ul><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4108">1 Mo. Family Pack - $335</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4107">3 Mo. Family Pack - $929</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4106">6 Mo. Family Pack - $1699</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4105">1 Yr. Family Pack - $3199</a></li></ul></div>
                    	<div id="column3"><ul><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4208">1 Mo. Family Pack - $479</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4207">3 Mo. Family Pack - $1299</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4206">6 Mo. Family Pack - $2499</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=4205">1 Yr. Family Pack - $4499</a></li></ul></div>
                    	<div id="column4"><ul><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=651651">3 Mo. Family Pack - $1349</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=654981">6 Mo. Family Pack - $2499</a></li><li><a href="http://maxlifefoods.com/details.php?id=<?php echo $id; ?>&pid=987564">1 Yr. Family Pack - $4599</a></li></ul></div>
                    </div>
                    <br /><br /><br />
                   <table id="extragallery" style="text-align: center; margin: auto;">
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
						<table border="0"><tr><td><img src="/images/25year.gif"></td><td class="smallhead">Visit our <a href="compare.php?id=<?php echo $id; ?>" style="text-decoration:underline;">comparison page</a> to see that you're not only spending less money per serving than other major brands, but you're also spending a lot less money per actual meal, and per 2000 calories, even with their high percentages of filler servings like drinks and desserts.  At MaxLife Foods our goal is to provide food storage that is <strong>convenient, long lasting, affordable, and delicious</strong>.</td></tr></table>
                    
                    
                </div>
                <div style="clear: both;"></div>
        	</div>
        </div>

<?php include_once("footer.php") ?>

</div>
</body>
</html>
