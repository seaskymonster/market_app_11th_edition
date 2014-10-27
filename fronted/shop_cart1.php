<?php
class shopcart{
         public $itemquantity;
		 
		 function isalreadyincart($productID,$customerID){
		       $sql="select *from shoppingcart where productID='$productID' and customerID='$customerID'";
		       $con=mysql_connect("localhost:3306","root","");
			   if(!$con){
			           die("could not connect:".mysql_error());
			    }
				mysql_select_db("logindb",$con);
				$result=mysql_query($sql);
				if(mysql_num_rows($result)==0){
				    mysql_close($con);
					return FALSE;
				}else{
				     mysql_close($con);
					 return TRUE;
				}
		 }
		 
		 function addshopcart($productID,$productquantity,$customerID){
		
		       if($this->isalreadyincart($productID,$customerID)==FALSE){
			                 $sql="insert into shoppingcart(productID,productquantity,customerID) values('$productID','$productquantity','$customerID')";
			                 $con=mysql_connect("localhost:3306","root","");
			                 if(!$con){
							          die("could not connect:".mysql_error());
							 }
							 mysql_select_db("logindb",$con);
							     if(mysql_query($sql)){
								     mysql_close($con);
									 return $this->cartcount($customerID);
								 }else{
								     mysql_close($con);
									 return 'error';
								 }
			   }else{
			        $sql="select productquantity from shoppingcart where productID='$productID' and customerID='$customerID'";
					$con=mysql_connect("localhost:3306","root","");
					if(!$con){
							          die("could not connect:".mysql_error());
							 }
							 mysql_select_db("logindb",$con);
					         $result=mysql_query($sql);
							 if($row=mysql_fetch_array($result)){
							      $oldquantity=$row['productquantity'];
								  $newquantity=$oldquantity+$productquantity; 
								  var_dump($newquantity);
								  $sql="update shoppingcart set productquantity='$newquantity' where productID='$productID' and customerID='$customerID'";
								  if(mysql_query($sql)){
								        mysql_close($con);
										return $this->cartcount($customerID);
								  }else{
								       mysql_close($con);
									   return 'error';
								  }
							 }
					
			    }
					
		 }
		 
	 function cartcount($customerID){
	           $sql="select productquantity from shoppingcart where customerID='$customerID'";
			   $con=mysql_connect("localhost:3306","root","");
			   if(!$con){
			            die("could not connect".mysql_error());
			    }
				mysql_select_db("logindb",$con);
				$result=mysql_query($sql);
				while($row=mysql_fetch_array($result)){
				      $this->itemquantity+=$row['productquantity'];
				}
				return $this->itemquantity;
				//var_dump($this->itemquantity);
	 }
	 
   function updatequantity($productID, $productquantity,$customerID){
            $sql="update shoppingcart set productquantity='$productquantity' where productID='$productID' and customerID='$customerID'";
			
			$con=mysql_connect("localhost:3306","root","");
			if(!$con){
			         die("could not connect:".mysql_error());
			 }
			 mysql_select_db("logindb",$con);
			 if(mysql_query($sql)){
			    mysql_close($con);
				return'successful';
		     }else{
			    mysql_close($con);
				return'error';
			 }
	
			
     }
  function removeshopcart($productID,$customerID){
        $sql="delete from shoppingcart where productID='$productID' and customerID='$customerID'";
		$con=mysql_connect("localhost:3306","root","");
			if(!$con){
			         die("could not connect:".mysql_error());
			 }
			 mysql_select_db("logindb",$con);
			 if(mysql_query($sql)){
			    mysql_close($con);
				return'successful';
		     }else{
			    mysql_close($con);
				return'error';
			 }
  }
  
 function removeall($customerID){
       $sql="delete from shoppingcart where customerID='$customerID'";
	   $con=mysql_connect("localhost:3306","root","");
			if(!$con){
			         die("could not connect:".mysql_error());
			 }
			 mysql_select_db("logindb",$con);
			 if(mysql_query($sql)){
			    mysql_close($con);
				return'successful';
		     }else{
			    mysql_close($con);
				return'error';
			 }
 }
}
$shopcart=new shopcart();
?>
