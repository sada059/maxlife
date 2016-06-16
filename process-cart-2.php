<?php
	include("includes/db.php");
	include("includes/functions.php");
	
	$orderid = $_GET['id'];
	  if ($id == '') {
      session_start();
      if(isset($_SESSION['id']))
        $id = $_SESSION['id'];
  }
  if ($id == '') {
  		$id = $_COOKIE['id'];
    }
    
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			mysql_query("insert into order_details values ('$orderid',$pid,$q,$price)");
		}
		header("Location:https://www.maxlifefoods.com/billing.php?id=$orderid");
?>