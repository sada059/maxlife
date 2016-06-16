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
<link rel="stylesheet" href="css/main.css" type="text/css" media="all">

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
<!--[if IE]>
<style>
	body {text-align:center;margin:0 auto;}
	.mainleft4 {margin-top: -5px;}
    .mainmiddle4 {margin-top: -5px;}
    .mainright4 {margin-top: -5px;}
    .bg_red2 {margin-top: -5px;}
    .maintop7 {margin-top: -23px;}
    .mainbottom {margin-top: -8px;}
    ul.navigation {margin-top: 130px; margin-left: 340px;}
    .topbar .cart {margin-top: -7px;}
</style>
<![endif]-->
<body>
	<div id="content">
    	<div class="topbar">
        	<div class="banner"></div>
            <div class="cart"><a href="shoppingcart.php?id=<?php echo $id; ?>">View Cart</a></div>
        </div>
        <div class="maintop" id="topper">
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
                  <a href="/food-storage.php?id=<?php echo $id; ?>" id="link1"></a>
        </div>
        <div class="mainleft2"><a href="/food-storage.php?id=<?php echo $id; ?>">Food Storage</a></div>
        <div class="mainmiddle2"></div>
        <div class="bg_red">
        	<form name="calc" method="get" action="food-storage-calculator.php?id=<?php echo $id; ?>">
        	<input type="text" name="adults" size="2" style="margin-top: 9px;" />
        </div>
        <div class="mainright2"></div>
        <div class="maintop3"></div>
        <div class="mainleft4"></div>
        <div class="mainmiddle4"></div>
        <div class="bg_red2">
        	<input type="text" name="children" size="2" style="margin-top: 8px;" />
        </div>
        <div class="mainright4"></div>
        <div class="maintop5"></div>
        <div class="mainleft6"></div>
        <div class="mainmiddle6">
        	<input type="image" name="submit" src="images/mainmiddle6.gif" />
            </form>
        </div>
        <div class="mainright6"></div>
        <div class="maintop7"></div>
        <div class="mainleft8"></div>
        <div class="mainmiddle8">
        	<img src="images/question_title.gif" /><br /><br />
            <form name="contact" method="post" action="send.php?id=<?php echo $id; ?>">
            <table align="center">
				<tr>
                	<td><font face="arial,helvetica" color="#8f0400">First Name</font></td>
                </tr>
				<tr>
                	<td><input type="text" name="fname" size="25" /></td>
                </tr>
				<tr>
                	<td><font face="arial,helvetica" color="#8f0400">Last Name</font></td>
                </tr>
				<tr>
                	<td><input type="text" name="lname" size="25" /></td>
                </tr>
				<tr>
                	<td><font face="arial,helvetica" color="#8f0400">Email</font></td>
                </tr>
				<tr>
                	<td><input type="text" name="email" size="25" /></td>
                </tr>
				<tr>
                	<td><font face="arial,helvetica" color="#8f0400">Question</font></td>
                </tr>
				<tr>
                	<td><textarea rows="6" cols="20" name="question"></textarea></td>
                </tr>
				<tr>
                	<td align="center"><input type="image" name="submit" src="images/submit_button.gif" /></td>
                </tr>
			</table>
            </form>
        </div>
        <div class="mainright8"></div>
        <div class="mainbottom">
        	<ul class="navigationb">
                	<li>
                    	<a href="index.php?id=<?php echo $id; ?>">HOME</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    </li>
                    <li>
                    	<a href="food-storage.php?id=<?php echo $id; ?>">FOOD-STORAGE</a>&nbsp;&nbsp;|&nbsp;&nbsp;
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
