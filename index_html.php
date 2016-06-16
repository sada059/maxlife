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
                    <a href="food-storage.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">FOOD STORAGE</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="camping-food.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">72HR / CAMPING FOOD</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="menu.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">MENU</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="why-maxlife.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">WHY MAXLIFE</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="contact.php?id=<?php echo $id; ?>"><b><font face="Arial" color="#ffffff">CONTACT</font></b></a>
                    </td></tr>
<tr><td colspan="5"><a href="/food-storage.php?id=<?php echo $id; ?>"><img src="/images/main1_s.jpg" border="0"/></a></td></tr>
<form method="get" action="food-storage-calculator.php?id=<?php echo $id; ?>"><tr><td width="823"><a href="/food-storage.php?id=<?php echo $id; ?>"><img src="/images/mainleft2_s.jpg" /></a></td><td width="164"><img src="/images/mainmiddle2_s.gif" /></td width="42"><td background="/images/bg_red.gif" align="center"><input type="text" name="adults" size="1" style="margin-top: 6px;"/></td><td align="right" width="46"><img src="/images/mainright2_s.jpg" /></td></tr>
<tr><td colspan="5"><img src="/images/main3_s.jpg" /></td></tr>
<tr><td><img src="/images/mainleft4_s.jpg" /></td><td><img src="/images/mainmiddle4_s.gif" /></td><td background="/images/bg_red.gif" align="center"><input type="text" name="children" size="1" style="margin-top: 6px;"/></td><td align="right"><img src="/images/mainright4_s.jpg" /></td></tr>
<tr><td colspan="5"><img src="/images/main5_s.jpg" /></td></tr>
<tr><td><img src="/images/mainleft6_s.jpg" /></td><td colspan="2" width="206"><input type="image" name="submit" src="/images/mainmiddle6_s.gif" /></td><td><img src="/images/mainright6_s.jpg" /></td></tr>
</form><tr><td colspan="5"><img src="/images/main7_s.jpg" /></td></tr>
<tr><td><img src="/images/mainleft8_s.jpg" /></td><td colspan="2" background="/images/bg_light.gif" align="center" valign="top"><img src="/images/question_title_s.gif" /><br /><br /><table>
<form name="contact" method="post" action="send.php?id=<?php echo $id; ?>"><tr><td><font face="arial,helvetica" color="#8f0400">First Name</font></td></tr>
<tr><td><input type="text" name="fname" size="22" /></td></tr>
<tr><td><font face="arial,helvetica" color="#8f0400">Last Name</font></td></tr>
<tr><td><input type="text" name="lname" size="22" /></td></tr>
<tr><td><font face="arial,helvetica" color="#8f0400">Email</font></td></tr>
<tr><td><input type="text" name="email" size="22" /></td></tr>
<tr><td><font face="arial,helvetica" color="#8f0400">Question</font></td></tr>
<tr><td><textarea rows="3" cols="17" name="question" placeholder="Free sample? Address."></textarea></td></tr>
<tr><td align="center"><input type="image" name="submit" src="/images/submit_button_s.gif" /></td></tr></form>
</table></td><td align="left" width="78"><img src="/images/mainright8_s.jpg" /></td></tr>
<tr><td colspan="2" height="65" background="/images/mainbottom_s.jpg" /><font size="1" face="Arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="index.php?id=<?php echo $id; ?>"><font size="1" face="Arial">HOME</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="food-storage.php?id=<?php echo $id; ?>"><font size="1" face="Arial">FOOD-STORAGE</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="camping-food.php?id=<?php echo $id; ?>"><font size="1" face="Arial">72HR / CAMPING FOOD</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="menu.php?id=<?php echo $id; ?>"><font size="1" face="Arial">MENU</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="why-maxlife.php?id=<?php echo $id; ?>"><font size="1" face="Arial">WHY MAXLIFE</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    	<a href="contact.php?id=<?php echo $id; ?>"><font size="1" face="Arial">CONTACT</font></a></font>
							</td><td colspan="3" align="right"><a href="http://www.facebook.com/pages/Max-Life-Foods/137779489655373" target="_blank"><img src="/images/facebook.jpg" border="0"></a></td></tr>
</table>
</body>

</html>
