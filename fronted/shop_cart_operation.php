<?php

include_once("shop_cart1.php");

if(isset($_POST['action'])){
    $action=$_POST['action'];
	$customerID=$_POST['customerID'];
	//$productquantity=$_POST['productquantity'];
}
//var_dump($action);


switch($action){
    case 'addshopcart':
	if(isset($_POST['productID'])&&isset($_POST['productquantity'])&&isset($_POST['customerID'])){
	    $result=$shopcart->addshopcart($_POST['productID'],$_POST['productquantity'],$_POST['customerID']);
		var_dump($_POST['productquantity']);
		echo htmlspecialchars($result);
	}
	break;
	     
	case 'removeshopcart':
	if(isset($_POST['productID'])&&isset($_POST['customerID'])){
	    $result=$shopcart->removeshopcart($_POST['productID'],$_POST['customerID']);
		echo htmlspecialchars($result);
	}
	break;
	
	case 'showitemsquantity':
	if(isset($_POST['customerID'])){
	    $result=$shopcart->cartcount($_POST['customerID']);
		echo htmlspecialchars($result);
		//var_dump($result);
	}
	break;
	
	case 'updateshopcart':
	if(isset($_POST['productID'])&&isset($_POST['productquantity'])&&isset($_POST['customerID'])){
	   $result=$shopcart->updatequantity($_POST['productID'],$_POST['productquantity'],$_POST['customerID']);
	   echo htmlspecialchars($result);
	 }
	 break;
	 
	 case 'removeall':
	 if(isset($_POST['customerID'])){
	   $result=$shopcart->removeall($_POST['customerID']);
	   echo htmlspecialchars($result);
	 }
	 break;
	 default:break;
	 


}
?>