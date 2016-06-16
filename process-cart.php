<?php

	//CHECK FOR HACKERS
	foreach ($_POST as $key => $value) {
	    if (strlen($value) > 100 or strpos($value, '=') > 0) {
	    	exit("invalid variable");
	    }
	}
	//END CHECK
	
	include("includes/db.php");
	
	$id = $_GET['id'];

  if ($id == '') {
      session_start();
      if(isset($_SESSION['id']))
        $id = $_SESSION['id'];
  }
  if ($id == '') {
  		$id = $_COOKIE['id'];
    }

	$button = $_POST['submit'];
	
	$pid = $_GET['pid'];
	
	$del = $_GET['del'];
	
	if ($del == 1) {
		$sql = "DELETE from order_details WHERE order_key = $id AND product_key = $pid";
		$run = mysql_query($sql);
		header("Location:shoppingcart.php?id=$id");
	}
	
	if ($button == 'Clear Cart'){
		$sql = "DELETE from order_details WHERE order_key = $id";
		$run = mysql_query($sql);
		header("Location:shoppingcart.php?id=$id");
	}
	
	if ($button == 'Update Cart'){
		
		$pkey = $_POST['product_key'];
		
		foreach ($pkey as $abc) 
		{ 
		  $quantity = $_POST['quantity'.$abc];
		  if (is_numeric($quantity) and $quantity != "0") {
		  		if ($abc <> '111') {
		  			$sql = "UPDATE order_details SET quantity = $quantity WHERE order_key = $id AND product_key = $abc"; 
		  			$run = mysql_query($sql);
		  		}
		  	} else {
				$sql = "DELETE from order_details WHERE order_key = $id AND product_key = $abc";
				$run = mysql_query($sql);		  		
		  	}
		}
		
		header("Location:shoppingcart.php?id=$id");
		
	}
	
	if ($button == 'Place Order'){
		$gtotal = $_POST['gtotal'];
		$stotal = $_POST['stotal'];
		$tax = $_POST['tax'];
		$shipping = $_POST['shipping'];
		
		$sql = "UPDATE orders SET stotal=$stotal,tax=$tax,shipping=$shipping,amount=$gtotal WHERE order_key = $id"; 
		$run = mysql_query($sql);
		
		header("Location:https://www.maxlifefoods.com/billing.php?id=$id");
	}
?>