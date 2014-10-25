<?php session_start();
$displayloginpage=true;
$errormessage='';
$nocheckoutvisitor=FALSE;

if(isset($_SESSION['customerID'])){
    $customerID = $_SESSION['customerID'];
  }else{
     $customerID='';
  }
  //var_dump($customerID);
 
  
   

  // $productID = $_GET['productID'];
   $visitorID = $_SESSION['visitorID'];
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


if(isset($_POST['email'])&&isset($_POST['password'])){
$email=$_POST['email'];
$password=$_POST['password'];




if(strlen($email)>0 &&strlen($password)>0){
    $sql="select *from customer where email='$email'";
	$con=mysql_connect("localhost:3306","root","");
	if(!$con){
	         die('Could not connect:'.mysql_error());
	}
	mysql_select_db("logindb",$con);
	$result=mysql_query($sql);
	if(mysql_num_rows($result)==0){
	       $sql="insert into customer(email,password) values('$email','$password')";
		   if(!(mysql_query($sql))){
			       $errormessage="error";
			}else{
			       $customerID= mysql_insert_id();
			       $_SESSION['customerID']=$customerID;
			       $displayloginpage=false;
			   
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
	}else{ 
          echo'The Email has been used.';
	  }
	  mysql_close($con);
}
}
if($displayloginpage){
?>
<!DOCYTPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<title>Wenlai E-shop</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<script type="text/javascript" src="shop_cart_request1.js"></script>
		<script type="text/javascript">
    
	       function createaccount(){
		         var errormessage='';
				 var password=document.create.password.value;
				 var password2=document.create.password2.value;
				 var email=document.create.email.value;
				 if((password !=password2)||(password=='')||(password2=='')){
				       errormessage+="You password do not match.<br>";
				  }
				 if(email==''){
				       errormessage+="Your email is not valid.<br>";
				}
				if(errormessage==''){
				   document.create.submit();
				 }else{ 
				   p=document.getElementById("errormessage");
				   p.innerHTML=errormessage;
				   return;
				 }
		   }
	</script>
</head>

<body onload="showitemsquantity(<?php echo htmlspecialchars($customerID);?>)">
    <div id="main_div">
	  <?php require "header.html"
	  ?>
	  <div id="main">
	       <form name="create" method="post" action="create_account.php">
		        <fieldset class="login_fieldset">
				      <legend align="center"> Create Account</legend>
					  Enter your email address and a password.
					  <br>
					  <table>
					        <tr>
							     <td>Email Address:</td>
								 <td><input type="text" name="email"></td>
							</tr>
							<tr>
							     <td>Password:</td>
								 <td><input type="text" name="password"></td>
							</tr>
							<tr>  
							     <td>Confirm Password</td>
								 <td><input type="text" name="password2"></td>
							</tr>
					   </table>
					   <br><br>
					   <input type="button" value="submit" onclick="createaccount()">
		               <p style="color:red" id="errormessage"><?php echo htmlspecialchars($errormessage);?></p>
				</fieldset>
			</form>
			<div class="clear"></div>
	   </div>
	<?php require "foot_bar.html" ?>			   
   </div>	      
					  
</body>

</html>
<?php }?>
	  
	