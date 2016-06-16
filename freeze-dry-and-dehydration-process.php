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
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Freeze Dry and Dehydration Process | MaxLifeFoods</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" />

<script src="/js/jquery-1.3.2.min.js" content="text/javascript"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16356880-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
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

</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="content">

<?php include_once("header.php") ?>

        <div class="subbody2" style="height: 800px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Freeze Dry and Dehydration Process</h1>
                    <img src="images/extraimage.jpg" alt="" style="border: 15px solid white; margin-left: 20px;" align="right" />
                    <p style="text-align: justify;">At MaxLife, we take a unique and innovative approach to long-term food storage and emergency preparedness.&nbsp; Our ready-made entrees include both freeze-dried and dehydrated components, depending upon the food component.&nbsp;</p>

                    <p style="text-align: justify;">Through extensive evaluation, research and testing, we have combined both freeze-dried and dehydrated products together to ensure optimal taste, texture and nutritional value.&nbsp; Expensive ingredients such as peas and other vegetables are generally freeze-dried.&nbsp; Other ingredients like noodles and rice actually taste better when dehydrated.&nbsp;</p>
                    
                    <p style="text-align: justify;"><strong>Freeze-Dry and Dehydration Advantages<span style="text-decoration: underline;">:</span></strong></p>
                    
                    <ul id="cmsul">
                    
                    <li>Food maintains its original flavor, shape, color, and texture</li>
                    
                    <li>Food retains its nutritional value</li>
                    
                    <li>Food is condensed in size</li>
                    
                    <li>With nearly all its water extracted, food is extremely light weight</li>
                    
                    <li>With the addition of water, food is quickly and completely reconstituted</li>
                    
                    <li>Max Life customers enjoy peace of mind because of the food&rsquo;s<br /> long shelf life</li>
                    
                    </ul>
                    
                    <p style="text-align: justify;"><strong>The Freeze-Dry Process</strong></p>
                    
                    <p style="text-align: justify;">In freeze-drying, the product is first flash frozen and then placed in a vacuum drying chamber.&nbsp; This process removes the majority of the water and moistening without affecting the taste, color, form or nutritional value of the food item.</p>
                    
                    <p style="text-align: justify;"><strong>The Dehydration Process</strong></p>
                    
                    <p style="text-align: justify;">In dehydration, food product moves through a drying chamber where air removes the moisture from the food. This occurs at low temperatures so that the nutritional profile stays intact.&nbsp;</p>

        </div>
</div>
</div>
<div class="subbottom">
        	<ul class="navigationb">
                	<li>
                    	<a href="http://www.maxlifefoods.com/MaxLifeFoodsBrochure.pdf"><b>PRICING BROCHURE</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>                	
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
                    	<a href="http://www.maxlifefoods.com/privacy.php?id=<?php echo $id; ?>">PRIVACY</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/terms.php?id=<?php echo $id; ?>">TERMS</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/contact.php?id=<?php echo $id; ?>">CONTACT</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="http://www.maxlifefoods.com/faq.php?id=<?php echo $id; ?>">FAQ</a>
                    </li>
                </ul>
                <div class="fb">
                	<a href="http://www.facebook.com/pages/Max-Life-Foods/137779489655373" target="_blank">FB</a>
                </div>
        </div>
</div>
</body>
</html>
