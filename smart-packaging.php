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
<title>Smart Packaging| MaxLifeFoods</title>
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

        <div class="subbody2" style="height: 900px;">
			<div class="subbody">
            	<div class="calcbutton"><a href="food-storage-calculator.php?id=<?php echo $id; ?>">Family Food Storage Calculator</a></div>
            	<div class="maincontent">
        			<h1>Smart Packaging</h1>
                    <img src="images/extraimage.jpg" alt="" style="border: 15px solid white; margin-left: 20px;" align="right" />
                    <p style="text-align: justify;">Our unique packaging adds value to our meals by protecting them better and making them easier to store and easier to prepare.</p>

                    <p style="text-align: justify;"><strong>Resealable Pouch&nbsp; </strong><strong>&nbsp;</strong></p>
                    
                    <p style="text-align: justify;">MaxLife&rsquo;s ready-made meals are packed in airtight oxygen-absorbed pouches.&nbsp; Our packaging process removes the majority of the residual oxygen.&nbsp; <strong>&nbsp;</strong></p>
                    
                    <p style="text-align: justify;"><strong>Mylar Family-size Foil Pouch</strong></p>
                    
                    <p style="text-align: justify;">Our unique packaging also adds incredible value to our products by making it easier to store, eat, and further prolong the shelf life of each individual meal. Instead of using #10 cans&mdash;which when opened force you to eat enormous amounts of that particular food all at once to prevent rapid spoilage&mdash;we package each meal in its own separate mylar pouch, thus eliminating waste. It&rsquo;s basically a flexible tin can that gives you the ability to eat what you want, when you want.&nbsp; <strong>&nbsp;</strong></p>
                    
                    <p style="text-align: justify;"><strong>Square Plastic Container and Grab&mdash;and&mdash;Go Handle</strong></p>
                    
                    <p style="text-align: justify;">We take the safe-keeping of your food a step further by adding another layer of security placing these 4-serving pouches into compact, 4- and 5-gallon, square buckets that are very easy to stack and store.&nbsp; Because we don&rsquo;t waste space by using and boxing #10 cans. MaxLife food storage is much more compact and takes significantly less space.&nbsp; Also, because the buckets are small and light, even children are able to grab and carry a month&rsquo;s supply of food, if needed.&nbsp; If you are placed in an emergency situation these buckets can also serve several other purposes, such as digging or disposing of waste.<strong>&nbsp;</strong></p>
                    
                    <p style="text-align: justify;"><strong>Stackable Design</strong></p>
                    
                    <p style="text-align: justify;">Each container is notched on the bottom to ensure stackability.&nbsp; In no more space than a washer and dryer takes up, you can store enough ready-made meals to feed a family of 6 for a full year.</p>
                    
                    <p style="text-align: justify;">Typical food storage can take an incredible amount of space to store that most families don&rsquo;t have.&nbsp; Other food storage companies will want you to purchase a year&rsquo;s supply comprising as many as 85 large cases of awkward and bulky #10 cans. With MaxLife, in no more space than is taken up by a washer and dryer, you can store enough freeze-dried meals to feed a family of 6 for a full year.</p>
                    
                    <p style="text-align: justify;"><strong>Re-sealable Pull Tab Lid</strong></p>
                    
                    <p style="text-align: justify;">Have you ever tried to open the lid of a 5-gallon bucket typically used for food storage?&nbsp; As you know it can be a real pain. MaxLife&rsquo;s unique bucket contains an easy-to-open, easy-to-close re-sealable pull tab lid.</p>
                    
                    <p>&nbsp;</p>

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
