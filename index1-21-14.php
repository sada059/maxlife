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
<html>

<head>

<meta http-equiv="content-type" content="text/html; charset=WINDOWS-1252" >
<title>MaxLifeFoods - Food Storage & Sportsman Food Kits</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" media="all">

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
      var $active = $('#portfolio_cycler .active');
      var $next = ($('#portfolio_cycler .active').next().length > 0) ? $('#portfolio_cycler .active').next() : $('#portfolio_cycler img:first');
      $next.css('z-index',2);//move the next image up the pile
	  $active.fadeOut(1500,function(){//fade out the top image
	  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
      $next.css('z-index',3).addClass('active');//make the next image the top one
	  if ($('#portfolio_cycler .active').next().length > 0) setTimeout('cycleImages()',7000);//check for a next image, and if one exists, call the function recursively
      });
    }

    $(document).ready(function(){
      // run every 7s
      setTimeout('cycleImages()', 5500);
    })

</script>

</head>

<body bgcolor="#808080" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<?php include_once("analyticstracking.php") ?>
<table align="center" cellpadding="0" cellspacing="0" border="0" width="1075">
<tr><td background="/images/background_s.jpg" align="left" width="823"><img src="/images/bg_front_red_n.jpg" /></td><td background="/images/background_s.jpg" width="164" align="right"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_left_s.png" border="0" /></a></td><td background="/images/background_s.jpg" width="42"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_middle_s.png" border="0" /></a></td><td background="/images/background_s.jpg" width="46" align="left"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_right_s.png" border="0" /></a></td></tr>
<tr><td colspan="5" background="/images/maintop2_n.jpg" height="163"/><div id="portfolio_cycler">
<img class="active" src="/images/radio_ramsey.jpg" alt="Our Food Storage Recommended by Dave Ramsey" />
<img src="/images/radio_ingraham.jpg" alt="Our Food Storage Recommended by Laura Ingraham" />	
<img src="/images/radio_gallagher.jpg" alt="Our Food Storage Recommended by Mike Gallagher" />	
<img src="/images/radio_gresham.jpg" alt="Our Food Storage Recommended by Tom Gresham" />		
<img src="/images/radio_prager.jpg" alt="Our Food Storage Recommended by Dennis Prager" />	
</div>
<span class="menuitems">
						  <a href="index.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">HOME</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="food-storage.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">FOOD STORAGE</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="supplemental.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">MEAT/FRUIT/VEG</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="seeds.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">SEEDS</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="menu.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">MENU</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="why-maxlife.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">MAXLIFE</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="faq.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">FAQ</font></b></a></span>
                    </td></tr>
<tr><td colspan="5"><a href="/food-storage.php?id=<?php echo $id; ?>"><img src="/images/main1_s.jpg" border="0"/></a></td></tr>
<form method="get" action="food-storage-calculator.php?id=<?php echo $id; ?>"><tr><td width="823"><a href="/food-storage.php?id=<?php echo $id; ?>"><img src="/images/mainleft2_s2.jpg" border="0"/></a></td><td width="164"><img src="/images/mainmiddle2_s.gif" /></td width="42"><td background="/images/bg_red.gif" align="center"><input type="text" name="adults" size="1" style="margin-top: 6px;"/></td><td align="right" width="46"><img src="/images/mainright2_s.jpg" /></td></tr>
<tr><td colspan="5"><img src="/images/main3_s2.jpg" /></td></tr>
<tr><td><img src="/images/mainleft4_s2.jpg" /></td><td><img src="/images/mainmiddle4_s.gif" /></td><td background="/images/bg_red.gif" align="center"><input type="text" name="children" size="1" style="margin-top: 6px;"/></td><td align="right"><img src="/images/mainright4_s.jpg" /></td></tr>
<tr><td colspan="5"><img src="/images/main5_s.jpg" /></td></tr>
<tr><td><img src="/images/mainleft6_s.jpg" /></td><td colspan="2" width="206"><input type="image" name="submit" src="/images/mainmiddle6_s.gif" /></td><td><img src="/images/mainright6_s.jpg" /></td></tr>
</form><tr><td colspan="5"><img src="/images/main7_s.jpg" /></td></tr>
<tr><td><img src="/images/mainleft8_n.jpg" /></td><td colspan="2" background="/images/bg_light.gif" align="center" valign="top"><a href="/why-maxlife.php?id=<?php echo $id; ?>"><img src="/images/tvtitle.jpg" border="0"/></a><br /><br /><table>
<tr><td align="center"><a href="/why-maxlife.php?id=<?php echo $id; ?>"><img src="/images/tvscreen.jpg" border="0"></a><BR><img src="/images/asseenon.jpg" border="0"></td></tr>
</table></td><td align="left" width="78"><img src="/images/mainright8_s.jpg" /></td></tr>
<tr><td colspan="2" height="65" background="/images/mainbottom_s.jpg" /><font size="1" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://verify.authorize.net/anetseal/?pid=6a6313b8-1f03-4eaa-9a4f-39b386e72824&rurl=http%3A//www.maxlifefoods.com/contact.php%3Fid%3D" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!--<a href="MaxLifeFoodsBrochure.pdf"><font size="1" face="Arial"><b>PRICE BROCHURE</b></font></a>&nbsp;&nbsp;|&nbsp;&nbsp;-->
							<a href="index.php?id=<?php echo $id; ?>"><font size="1" face="Arial">HOME</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="food-storage.php?id=<?php echo $id; ?>"><font size="1" face="Arial">FOOD STORAGE</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="supplemental.php?id=<?php echo $id; ?>"><font size="1" face="Arial">MEAT/FRUIT/VEG</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="seeds.php?id=<?php echo $id; ?>"><font size="1" face="Arial">SEEDS</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="menu.php?id=<?php echo $id; ?>"><font size="1" face="Arial">MENU</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="why-maxlife.php?id=<?php echo $id; ?>"><font size="1" face="Arial">MAXLIFE</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="privacy.php?id=<?php echo $id; ?>"><font size="1" face="Arial">PRIVACY</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="terms.php?id=<?php echo $id; ?>"><font size="1" face="Arial">TERMS</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="contact.php?id=<?php echo $id; ?>"><font size="1" face="Arial">CONTACT</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="faq.php?id=<?php echo $id; ?>"><font size="1" face="Arial">FAQ</font></a></font>
                    	
							</td><td colspan="3" align="right"><a href="http://www.facebook.com/maxlifefoods" target="_blank"><img src="/images/facebook.jpg" border="0"></a></td></tr>
</table>
</body>

</html>
