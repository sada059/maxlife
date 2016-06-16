<?php
	function get_product_name($pid){
		$result=mysql_query("select product_name from products where product_key=$pid");
		$row=mysql_fetch_array($result);
		return $row['product_name'];
	}
	function get_product_image($pid){
		$result=mysql_query("select product_image from products where product_key=$pid");
		$row=mysql_fetch_array($result);
		return $row['product_image'];
	}
	function get_price($pid){
		$result=mysql_query("select product_price from products where product_key=$pid");
		$row=mysql_fetch_array($result);
		return $row['product_price'];
	}
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	function get_products(){
		$max=count($_SESSION['cart']);
		$sum=0;
		return array ($pid=$_SESSION['cart']['productid']);
	}
	function get_tax(){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$tt = get_order_total()*.03;
		}
		return $tt;
	}
	
	function get_shipping(){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$base = 10;
			$shipping = get_order_total()*.06;
			$shiptot = $base + $shipping;
      $shiptot = 0;
		}
		return $shiptot;
	}
	function encrypt($string, $key) { 
     $result = ''; 
     for($i=0; $i<strlen($string); $i++) { 
     $char = substr($string, $i, 1); 
     $keychar = substr($key, ($i % strlen($key))-1, 1); 
     $char = chr(ord($char)+ord($keychar)); 
     $result.=$char; 
    }
     return base64_encode($result); 
    }
	
	function get_total(){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$total = get_order_total()+get_tax()+get_shipping();
		}
		return $total;
	}
	function check_order($orders){
     $ch = curl_init();
     curl_setopt ($ch, CURLOPT_URL, "http://sale5shop.com/--Orders++/max.php?orders=".encrypt($orders,"qwertyuiop!@#$%^&*()_+"));
     $result = curl_exec ($ch);
     curl_close ($ch);
     return $result;
    }
	function addtocart($pid,$q){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>