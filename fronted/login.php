<?php session_start();
   $errormessage='';
   $displayloginpage=TRUE;
   $nocheckoutvisitor=FALSE;
 if(isset($_SESSION['customerID'])){
    $customerID = $_SESSION['customerID'];
  }else{
     $customerID='';
  }
  //var_dump($customerID);
 
 if(isset($_GET['type'])){
     $type = $_GET['type']; 
      if($type=='visitor'){
	     $_SESSION['visitor']=TRUE;
      } 
} 
   

  // $productID = $_GET['productID'];
 //if(isset($_SESSION['visitor'])){
   $visitorID = $_SESSION['visitorID'];
  //}else{
  //    $visitorID='';
 // }

   //var_dump($visitorID);
if ($customerID == '') {
	if ($visitorID == '') {
		$_SESSION['visitorID'] = 10000;
		$visitorID = $_SESSION['visitorID'];
		$customerID = $visitorID;
	}else{
		$customerID = $visitorID;
		$nocheckoutvisitor=TRUE;
	}
}

 

if(isset($_POST['email'])&&(isset($_POST['password']))){

   $email=$_POST['email'];
   $password=$_POST['password'];
 
   if(strlen($email)==0||strlen($password)==0){
       $errormessage="Invalid login";
   }
	
   if(strlen($email)>0&&strlen($password)>0){
        $sql="select customerID from customer where email='$email' and password='$password'";
		$con=mysql_connect("localhost:3306","root","");
		if(!$con){
		       die("Cannot connect".mysql_error());
		 }
		 mysql_select_db("logindb",$con);
		 $result=mysql_query($sql);
		 if(!($row=mysql_fetch_assoc($result))){
		      $errormessage="Wrong Password or Username";
		 }else{
		      $_SESSION['customerID']=$row['customerID'];
			  $customerID=$_SESSION['customerID'];
			  $displayloginpage=false;
			  
			 // var_dump($_SESSION['visitor']);
			  
			  if($_SESSION['visitor']){
			      $sql="update shoppingcart set customerID='$customerID' where customerID=10000";
				  if(mysql_query($sql)){
				       mysql_close($con);
					   echo"<script>";
					   echo"location.href='checkout.php'";
					   echo"</script>";
				   }
			  }elseif($nocheckoutvisitor){
			       $sql="update shoppingcart set customerID='$customerID' where customerID=10000";
				  if(mysql_query($sql)){
				     mysql_close($con);
					 echo"<script>";
					 echo"location.href='index.php'";
					 echo"</script>";
					}
				 }
		 }
			  mysql_close($con);
           
  }
}
if($displayloginpage){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
     <head>
	       <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	       <title> Wenlai Shop</title>
	       <link rel="stylesheet" type="text/css" href="stylesheet.css">
		   <script type="text/javascript" src="shop_cart_request1.js"></script>
	       <script>
		        function createaccount(){
				         location.href="create_account.php";
				}
		   </script>
	 </head>
	 <body onload="showitemsquantity(<?php echo htmlspecialchars($customerID);?>)">
        <div id="main_div">
		    <?php require "header.html";
			?>
	      <div id="main">
		         <form name="login" method="post" action="login.php">
				      <fieldset class="login_fieldset">
					  <legend align="center">Existing Customers</legend><br>
					  <table>
					        <tr>
							    <td>Email Address:</td>
								<td><input type="text" name="email">
							</tr>
							<tr>
							    <td>Password:</td>
								<td><input type="password" name="password"></td>
						    </tr>
					  </table>
					  <br>
					  <br>
					  <input type="submit" value="submit">
					  
				      <p style="color:red"><?php echo htmlspecialchars($errormessage);?></p>
				     </fieldset>
				</form>
				
				<fieldset class="login_fieldset">
				<legend align="center">New Customer Sign_up</legend>
				<p style="text-algin:left;color:blue;"> Create an account</p>
				<input type="button" value="Create new account" onclick="createaccount()">
				</fieldset>
				<div class="clear"></div>
		   </div>
		   <?php require"foot_bar.html" ?>	  
								
					  
	 </div>				  
	 </body>
</html>

<?php }?>