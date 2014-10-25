<?php session_start();
$customerID=$_SESSION['customerID'];
$orderID=$_GET['orderID'];
?>

<!DOCTYPE html>
<html>
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Wenlai E-shop</title>
	  <link rel="stylesheet" type="text/css" href="stylesheet.css" />
	  <script type="text/javascript" src="shop_cart_request1.js"></script>
</head>
<body onload="showitemsquantity(<?php echo htmlspecialchars($customerID);?>)">
       <div id="main_div">
	         <?php require "header.html" ?>
			 <div id="main">
			       <?php require"left_bar.html" ?>
				   <div id="content">
				         <div>
						      <?php if($orderID!=0){
							        $sql="select *from `order` where orderID='$orderID'";
									$con=mysql_connect("localhost:3306","root","");
									if(!$con){
									         die("could not connect:".mysql_error());
									}
									mysql_select_db("logindb",$con);
									$result=mysql_query($sql);
									if($row=mysql_fetch_assoc($result)){
							  ?>      
								<div style="margin-left:80px">
				                <h3>Order Number:<?php echo htmlspecialchars($orderID);?></h3>
								<h3>Order Date:<?php echo htmlspecialchars($row['orderdate']);?></h3>
								<h3>Total Price:<?php echo htmlspecialchars($row['totalprice']);?></h3>
								</div>
								<table id="addresssummary" class="order_summary_table">
								      <th>Billing Address</th>
									  <th>Shipping Address</th>
									       <tr>
										      <td><?php echo htmlspecialchars($row['billname']);?></td>
											  <td><?php echo htmlspecialchars($row['shipname']);?></td>
										   </tr>
										   <tr>
										      <td><?php echo htmlspecialchars($row['billaddress']);?></td>
											  <td><?php echo htmlspecialchars($row['shipaddress']);?></td>
										   </tr>
										   <tr>
										      <td><?php echo htmlspecialchars($row['billcity']);?></td>
											  <td><?php echo htmlspecialchars($row['shipcity']);?></td>
										   </tr>
										   <tr>
										      <td><?php echo htmlspecialchars($row['billzip']);?></td>
											  <td><?php echo htmlspecialchars($row['shipzip']);?></td>
										   </tr>
										   <tr> 
										      <td><?php echo htmlspecialchars($row['billphone']);?></td>
											  <td><?php echo htmlspecialchars($row['shipphone']);?></td>
										   </tr>
								</table>
                                <?php $sql="select productquantity,productname,oi.productprice from `order` o, `orderitem` oi, `product` p where o.orderID='$orderID' and o.orderID=oi.orderID and oi.productID=p.productID";
								      $result=mysql_query($sql);
									  if(mysql_num_rows($result)!=0){
									  ?>
									  <table rules="rows" frame="void" class="order_summary_table">
									  <th>Qty.</th>
									  <th>Product Name</th>
									  <th>Price</th>
									  <th>Total</th>
									  
									  <?php while($row=mysql_fetch_assoc($result)){
									  ?>
									  <tr>
									      <td><?php echo htmlspecialchars($row['productquantity']);?></td>
										  <td><?php echo htmlspecialchars($row['productname']);?></td>
										  <td><?php echo htmlspecialchars($row['productprice']);?></td>
										  <td><?php $subtotal=$row['productquantity']*$row['productprice'];
										            echo htmlspecialchars($subtotal);
										       ?>
										  </td>
									  </tr>
									 <?php 
									  }
									  ?>
									  </table>
									 <?php } ?>
									 <input type="button" class="continue_shopping_button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Continue Shopping" onclick="continueshopping()"/>
									 <input type="button" class="continue_shopping_button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Go Back Mayaccount"onclick="gobackmyaccount()">
				    <?php  mysql_close($con);
					       }
                        }
					?>								
				         </div>
				   </div>
				   <div class="clear"></div>
			 </div>
			   <?php require "foot_bar.html"?>
	   </div>
</body>
</html>
