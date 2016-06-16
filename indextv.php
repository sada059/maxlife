<?php
$id = $_GET['id'];

if ($id == '') {
    session_start();
    if(isset($_SESSION['id']))
      $id = $_SESSION['id'];
}

?>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>MaxLifeFoods - Food Storage & Sportsman Food Kits</title>
<link rel="stylesheet" href="css/main_s.css" type="text/css" media="all">

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

<body bgcolor="#808080" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

<table align="center" cellpadding="0" cellspacing="0" border="0" width="1075">
<tr><td background="/images/background_s.jpg" align="left" width="823"><img src="/images/bg_front_red_s.jpg" /></td><td background="/images/background_s.jpg" width="164" align="right"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_left_s.png" border="0" /></a></td><td background="/images/background_s.jpg" width="42"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_middle_s.png" border="0" /></a></td><td background="/images/background_s.jpg" width="46" align="left"><a href="shoppingcart.php?id=<?php echo $id; ?>"><img src="/images/cart_right_s.png" border="0" /></a></td></tr>
<tr><td colspan="5" background="/images/maintop2_s.jpg" height="163"/><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <a href="index.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">HOME</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="food-storage.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">LONG-TERM FOOD STORAGE</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="supplemental.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">ADD-ONS</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="camping-food.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">SHORT-TERM</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="menu.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">MENU</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="why-maxlife.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">DETAILS</font></b></a>
                    </td></tr>
<tr><td colspan="5"><a href="/food-storage.php?id=<?php echo $id; ?>"><img src="/images/main1_s.jpg" border="0"/></a></td></tr>
<form method="get" action="food-storage-calculator.php?id=<?php echo $id; ?>"><tr><td width="823"><a href="/food-storage.php?id=<?php echo $id; ?>"><img src="/images/mainleft2_s.jpg" border="0"/></a></td><td width="164"><img src="/images/mainmiddle2_s.gif" /></td width="42"><td background="/images/bg_red.gif" align="center"><input type="text" name="adults" size="1" style="margin-top: 6px;"/></td><td align="right" width="46"><img src="/images/mainright2_s.jpg" /></td></tr>
<tr><td colspan="5"><img src="/images/main3_s.jpg" /></td></tr>
<tr><td><img src="/images/mainleft4_s.jpg" /></td><td><img src="/images/mainmiddle4_s.gif" /></td><td background="/images/bg_red.gif" align="center"><input type="text" name="children" size="1" style="margin-top: 6px;"/></td><td align="right"><img src="/images/mainright4_s.jpg" /></td></tr>
<tr><td colspan="5"><img src="/images/main5_s.jpg" /></td></tr>
<tr><td><img src="/images/mainleft6_s.jpg" /></td><td colspan="2" width="206"><input type="image" name="submit" src="/images/mainmiddle6_s.gif" /></td><td><img src="/images/mainright6_s.jpg" /></td></tr>
</form><tr><td colspan="5"><img src="/images/main7_s.jpg" /></td></tr>
<tr><td><img src="/images/mainleft8_s.jpg" /></td><td colspan="2" background="/images/bg_light.gif" align="center" valign="top"><a href="/why-maxlife.php?id=<?php echo $id; ?>"><img src="/images/tvtitle.jpg" border="0"/></a><br /><br /><table>
<tr><td align="center"><a href="/why-maxlife.php?id=<?php echo $id; ?>"><img src="/images/tvscreen.jpg" border="0"></a><BR><img src="/images/sale.jpg" border="0"></td></tr>
</table></td><td align="left" width="78"><img src="/images/mainright8_s.jpg" /></td></tr>
<tr><td colspan="2" height="65" background="/images/mainbottom_s.jpg" /><font size="1" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://verify.authorize.net/anetseal/?pid=6a6313b8-1f03-4eaa-9a4f-39b386e72824&rurl=http%3A//www.maxlifefoods.com/contact.php%3Fid%3D" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="MaxLifeFoodsBrochure.pdf"><font size="1" face="Arial"><b>PRICE BROCHURE</b></font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
							<a href="index.php?id=<?php echo $id; ?>"><font size="1" face="Arial">HOME</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="food-storage.php?id=<?php echo $id; ?>"><font size="1" face="Arial">FOOD STORAGE</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="camping-food.php?id=<?php echo $id; ?>"><font size="1" face="Arial">72HR / CAMPING</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="menu.php?id=<?php echo $id; ?>"><font size="1" face="Arial">MENU</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="why-maxlife.php?id=<?php echo $id; ?>"><font size="1" face="Arial">WHY MAXLIFE</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="privacy.php?id=<?php echo $id; ?>"><font size="1" face="Arial">PRIVACY</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="terms.php?id=<?php echo $id; ?>"><font size="1" face="Arial">TERMS</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="contact.php?id=<?php echo $id; ?>"><font size="1" face="Arial">CONTACT</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="faq.php?id=<?php echo $id; ?>"><font size="1" face="Arial">FAQ</font></a></font>
                    	
							</td><td colspan="3" align="right"><a href="http://www.facebook.com/maxlifefoods" target="_blank"><img src="/images/facebook.jpg" border="0"></a></td></tr>
</table>
</body>

</html>
