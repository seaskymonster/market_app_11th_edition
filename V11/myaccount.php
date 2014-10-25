<?php session_start();
   
   if(isset($_SESSION['customerID'])){
   $customerID=$_SESSION['customerID'];
   }else{
   $customerID='';
   }
  // $productID=$_GET['productID'];
   $visitorID=$_SESSION['visitorID'];
 ?>
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	       <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	      <title>Wenlai Shop</title>
		  <link rel="stylesheet" type="text/css" href="stylesheet.css">
		  <script type="text/javascript" src="shop_cart_request1.js"></script>
	<?php
	if($customerID==''){
	        if($visitorID==''){
			            echo"<script>";
						echo"clearall(10000)";
						echo"</script>";
					    $_SESSION['visitorID']=10000;
						$visitorID=$_SESSION['visitorID'];
						$customerID=$visitorID;
			}else{
			     $customerID=$visitorID;
			}
	}
    ?>
	<script type="text/javascript">
	        function changepassword(){
				d1 = document.getElementById("previousorder");
				d2 = document.getElementById("changepassword");
				d1.style.display = "none";
				d2.style.display = "block";
							
			}
			function viewpreviousorder(){
				d1 = document.getElementById("previousorder");
				d2 = document.getElementById("changepassword");
				d1.style.display = "block";
				d2.style.display = "none";
				
			
			}
			function resetPassword(customerID){
				if(checkmatch()==false){
					return;
				}
				var oldpassword = document.resetpassword.oldpassword.value;
				var newpassword = document.resetpassword.newpassword1.value;
				
				
				xmlHttp = GetXmlHttpObject();
				if (xmlHttp == null) {
					alert("Browser does not support HTTP Request");
					return;
				}

				var url = "my_account_operation.php";
				xmlHttp.onreadystatechange = resetReply;
				xmlHttp.open("POST", url, true);
				xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlHttp.send("action=changepassword&customerID="+customerID+"&oldpassword=" + oldpassword + "&newpassword=" + newpassword);		
			}
			function resetReply() {
				if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
					document.getElementById("resetmessage").innerHTML = xmlHttp.responseText;
				}
			}
		   function checkmatch(){
		                     var oldpassword=document.resetpassword.oldpassword.value;
							 var newpassword1=document.resetpassword.newpassword1.value;
							 var newpassword2=document.resetpassword.newpassword2.value;
							 var errormessage='';
							 if(oldpassword==''){
							       errormessage+="Please input the old password!<br>";
							 }
							 if(newpassword1==''||newpassword2==''){
							       errormessage+="Please input the new password!<br>";
							 }
							 if(newpassword1!=newpassword2){
							       errormessage+="The two passwords are not match, please input again!<br>";
							 }
							 if(errormessage==''){
							        return true;
							 }else{
							     document.getElementById("resetmessage").innerHTML=errormessage;
								 return false;
							 }
    	   }
	</script>
    </head>
	
	<body onload="showitemsquantity(<?php echo htmlspecialchars($customerID);?>)">
	       <div id="main_div">
		            <?php require"header.html"?>
					      <div id="main">
						          <?php require"left_bar.html"?>
								  <div>
								  <div id="content">
								  <?php if($customerID==10000){
								     ?>
								  <p style="margin:10px;font-size:15px">Welcome Visitor! Please log in or create a new life.</p>
								  <?php }else{
								        $sql="select *from customer where customerID='$customerID'";
										$con=mysql_connect("localhost:3306","root","");
										if(!$con){
										        die("could not connect:".mysql_error());
										 }
										mysql_select_db("logindb",$con);
										$result=mysql_query($sql);
										if($row=mysql_fetch_assoc($result)){
									?>
									    <p style="margin:10px;font-size:15px">Hi <span style="color:blue;font-size:18px"><?php echo htmlspecialchars($row['email']);?></span>, Welcome to our store,Please click buttons below</p>
									<?php } ?>
									    <div>
										     <input type="button" value="Change Password" onclick="changepassword()">
											 <input type="button" value="View Previous Orders" onclick="viewpreviousorder()">
									    </div>
										
								   <div id="previousorder" style="display: none">
								      <?php
									    $sql="select *from `order` where customerID='$customerID'";
										$con=mysql_connect("localhost:3306","root","");
										if(!$con){
										        die("could not connect:".mysql_error());
										 }
										mysql_select_db("logindb",$con);
										$result=mysql_query($sql);
										if(mysql_num_rows($result)==0){
										     echo'<p style="color:red;text-align:center;font-size:20px">Error:There are no previous orders!</p>';
									    }else{
									  ?>
									    <table style="text-align: right; font-size:15px">
										<th>Order ID</th>
										<th>Order Date</th>
										<th>Total Price</th>
										<th>See More Details</th>
									    <?php
										while($row=mysql_fetch_assoc($result)){
										?>
										  <tr>
										      <td><?php echo $row['orderID'];?></td>
											  <td><?php echo $row['orderdate'];?></td>
											  <td><?php echo $row['totalprice'];?></td>
											  <td><a href="show_previous_order.php?orderID=<?php echo htmlspecialchars($row['orderID']);?>">See More</a></td>
										  </tr>
										  <?php }?>
										</table>
									  <?php }?>
								  </div>
								  <div id="changepassword" style="display: none">
								       <form name="resetpassword">
									   <table> 
									          <tr>
									              <td>Enter Current Password</td>
												  <td><input type="password" name="oldpassword"></td>
											  </tr>
											  <tr>
											      <td>Enter New Password</td>
												  <td><input type="password" name="newpassword1"></td>
											  </tr>
											  <tr>
											      <td>New Password Again</td>
												  <td><input type="password" name="newpassword2"></td>
											  </tr>
										</table>
										<p id="resetmessage" style="color:red"></p>
										
										<input type="button" value="Reset" onclick="resetPassword(<?php echo htmlspecialchars($customerID); ?>)" />
									 </form>
								  </div>
							<?php }?>	
								 </div>
							     <div class="clear"></div>
								 </div>
								 <?php require"foot_bar.html"?>
							</div>
							
			</div>
      </body>
</html>
										
										
											  
											 
										
										
	
		  
		 