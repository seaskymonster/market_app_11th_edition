<?php session_start();
   if(isset($_SESSION['customerID'])){
    $customerID=$_SESSION['customerID'];
    }else{
	$customerID='';
    }
	$visitorID=$_SESSION['visitorID'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	 <title> Wenlai E-Shop</title>
	 <link rel="stylesheet" type="text/css" href="stylesheet.css">
	 <script type="text/javascript" src="shop_cart_request1.js"></script>
</head>
<?php
      if($customerID==''){
	           if($visitorID==''){
			       echo"<script language='javascript'>";
				   echo"clearall(10000)";
				   echo"</script>";
				   $_SESSION['visitorID']=10000;
				   $visitorID=$_SESSION['visitorID'];
				   $customerID=$visitorID;
				}else{
				   $customerID=$visitorID;
				}
				$type=2;
	   }else{
	            $type=1;
	   }
?>



<body onload="showitemsquantity(<?php echo htmlspecialchars($customerID);?>)">
   <div id="main_div">
           <?php require "header.html"?>
		   <div id="main">
		          <?php
				       $total=0;
					   $sql1="select *from product p, shoppingcart sh, specialsale s where sh.customerID='$customerID'and p.productID=sh.productID and s.productID=p.productID";
					   $sql2="select *from product p, shoppingcart sh where sh.customerID='$customerID' and p.productID=sh.productID and NOT EXISTS(select distinct*from specialsale s where s.productID=p.productID)";
					   $con=mysql_connect("localhost:3306","root","");
					   if(!$con){
					            die("Could not connect".mysql_error());
						}
						mysql_select_db("logindb",$con);
						$result1=mysql_query($sql1);
						$result2=mysql_query($sql2);
						if(mysql_num_rows($result1)==0&&mysql_num_rows($result2)==0){
						     echo'<p style="color:red;text-align:center;font-size:20px">The Shopping Cart is Empty!</p>';
					?>
					<input type="button" class="continue_shopping_button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Continue Shopping" onclick="continueshopping()">
			 <?php   }else{
			 ?>      <input type="button" class="continue_shopping_button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Continue Shopping" onclick="continueshopping()">
			         <input type="button" class="checkout_button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Proceed to Secure Checkout" onclick="checkout(<?php echo htmlspecialchars($type);?>)">
					 <form name="editshopcart">
					       <table rules="rows" frame="void" class="product_summary_table">
						        <th>Qty.</th>
								<th>Item Description</th>
								<th>Price</th>
								<th>Total</th>
				<?php     while($row=mysql_fetch_assoc($result1)){
				?>
				                <tr>
								   <td><input type="text" name="modifyquantity" id="modifyquantity<?php echo htmlspecialchars($row['productID']);?>" size="1" style="text-align:center;" value="<?php echo htmlspecialchars($row['productquantity']);?>"><br>
								       <input type="button" value="Update" style="margin:10px 0;" onclick="updateshopcart(<?php echo htmlspecialchars($row['productID']);?>,<?php echo htmlspecialchars($customerID);?>)"><br>
									   <input type="button" value="Remove" style="margin:10px 0;" onclick="removeshopcart(<?php echo htmlspecialchars($row['productID']);?>,<?php echo htmlspecialchars($customerID);?>)">
								   </td>
								   <td><?php echo htmlspecialchars($row['productname']);?></td>
								   <td><span style="text-decoration:line-through;margin-right:10px"><?php echo htmlspecialchars($row['productprice']);?></span><?php echo htmlspecialchars(round($row['productprice']*$row['salesdiscount'],2));?></td>
								   <td><?php 
								            $subtotal=$row['productquantity']*round($row['productprice']*$row['salesdiscount'],2);
											$total+=$subtotal;
											echo htmlspecialchars($subtotal);
										?>
								   </td>
								</tr>
                <?php     } ?>
                <?php   while($row=mysql_fetch_assoc($result2)){ 
                ?>         		
                                <tr>
                                   <td><input type="text" name="modifyquantity" id="modifyquantity<?php echo htmlspecialchars($row['productID']);?>" size="1" style="text-align:center;" value="<?php echo htmlspecialchars($row['productquantity']);?>"><br>
                                       <input type="button" value="Update" style="margin:10px 0;" onclick="updateshopcart(<?php echo htmlspecialchars($row['productID']);?>,<?php echo htmlspecialchars($customerID);?>)"><br>	
                                       <input type="button" value="Remove" style="margin:10px 0;" onclick="removeshopcart(<?php echo htmlspecialchars($row['productID']);?>,<?php echo htmlspecialchars($customerID);?>)">
								   </td>
								   <td><?php echo htmlspecialchars($row['productname']);?></td>
								   <td><?php echo htmlspecialchars($row['productprice']);?></td>
								   <td><?php
								            $subtotal=$row['productquantity']*$row['productprice'];
											$total+=$subtotal;
											echo htmlspecialchars($subtotal);
									    ?>
								   </td>
								</tr>
				<?php   }
				?>    </table>
				   </form>
				   <input type="button" value="Remove All" style="margin:10px 0px 10px 800px;" onclick="removeall(<?php echo htmlspecialchars($customerID);?>)">
				   <hr>
				   <table class="summary_table">
				      <tr>
					      <td>Merchandise Subtotal:</td>
						  <td><?php echo htmlspecialchars('$'.$total);?></td>
					  </tr>
					  <tr>
					      <td>
						     Estimated Shipping and Handling:
							 Based on ground shipping within continental U.S.
						  </td>
						  <td><?php echo '$12';?></td>
					 </tr>
					 <tr>
					      <td>Sales Tax:</td>
						  <td><?php echo htmlspecialchars('$'.round($total*0.087,2));?></td>
					</tr>
					<tr>
					      <td>Estimated Total::</td>
						  <td>
						     <?php 
							      $all=round($total*1.087+12,2);
								  echo htmlspecialchars('$'.$all);
							?>
						</td>
					</tr>
				  </table>
				  <?php mysql_close($con);?>
                  <input type="button" class="continue_shopping_button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Continue Shopping" onclick="continueshopping()">
                  <br>
                  <a style="margin:100px 0 0 370px"href="http://checkout.google.com/"><img src="images/google_checkout.gif"  alt="mastercard check"/></a>
				<a href="https://www.paypal.com/home"><img src="images/paypal_checkout.gif"  alt="mastercard check"/></a>
				<input type="button" class="checkout_button2"onmouseover="this.style.color='yellow'"onMouseOut="this.style.color='white'" value="Proceed to Secure Checkout" onclick="checkout(<?php echo htmlspecialchars($type);?>)"/>
				<div style="margin:10px 10px 10px 90px">
				<a href="http://www.mastercard.us/support/securecode.html"><img src="images/mastercard.gif"  alt="mastercard check"/></a>
				<a href="https://usa.visa.com/personal/security/vbv/index.jsp"><img src="images/visa.gif"  alt="visa check"/></a>
				</div>
			<?php } ?>				  
					 
		
						
					   
		   </div>
		   <? php require "foot_bar.html"?>
   </div>
</body>

</html>