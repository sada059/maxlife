<?php
	//CHECK FOR HACKERS
	foreach ($_POST as $key => $value) {
	    if (strlen($value) > 100 or strpos($value, '=') > 0) {
	    	exit("invalid variable");
	    }
	}
	//END CHECK
	
	include("includes/db.php");
	
	$id    = $_GET['id'];
	$pid   = $_GET['pid'];
	$q     = $_GET['q'];
	$price     = $_GET['price'];
   
  if ($id == '') {
	ini_set('session.gc_maxlifetime', 3600);

    session_start();
    if(isset($_SESSION['id']))
      $id = $_SESSION['id'];
  }
  
  if ($id == '') {
  		$id = $_COOKIE['id'];
  }
  
	//CHECK FOR ORDER ALREADY COMPLETED
	$run = mysql_query("SELECT d.* FROM orders o, order_details d WHERE o.order_key=$id AND o.order_key = d.order_key AND o.ship_address IS NULL");
	$num = mysql_num_rows($run);
	if ($num == 0) {
		// REMOVE ALL COOKIES AND SESSION VARIABLES IF THE ORDER HAS ALREADY BEEN COMPLETED
      $_SESSION['id'] = '';
      setcookie('id', '', time() - 3600);
      $id = '';
   }
   //END CHECK FOR ORDER ALREADY COMPLETED

	if ($id == ''){
		$start = mysql_query("insert into orders (order_date) values (CURDATE())") or die(mysql_error());
		
		if($start){
			$sql = mysql_query("select MAX(order_key) from orders");
			$result = mysql_fetch_assoc($sql);
			$orderid = $result['MAX(order_key)'];
			$run = mysql_query("insert into order_details values ($orderid,$pid,$q,$price)");
      
      session_start();
      $_SESSION['id'] = $orderid;
      setcookie('id', $orderid, time()+60*60*24*30);
      
			header("Location:shoppingcart.php?id=$orderid");
		}
	} else {
		$check = mysql_query("SELECT * FROM order_details WHERE order_key = $id AND product_key = $pid");
		$num = mysql_num_rows($check);
		$row = mysql_fetch_assoc($check);
		$quantity = $row['quantity']+1;
		
		if ($num == 0) {
			$run = mysql_query("insert into order_details values ($id,$pid,$q,$price)");
		}elseif ($pid <> '111') {
			$update = mysql_query("UPDATE order_details SET quantity = $quantity WHERE order_key = $id AND product_key = $pid");
		}
		header("Location:shoppingcart.php?id=$id");
	}
?>