<?php session_start();
if(isset($_SESSION['customerID'])){
  $customerID=$_SESSION['customerID'];
}else{
  $customerID='';
 }
  $productID=$_GET['productID'];
  $visitorID=$_SESSION['visitorID'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
<head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	  <title>Wenlai E-shop</title>
	  <link rel="stylesheet" type="text/css" href="stylesheet.css">
	  <script type="text/javascript" src="shop_cart_request1.js"></script>
</head>
<?php 
    if($customerID==''){
	      if($visitorID==''){
		       echo"<script>";
			   echo"clearall(10000)";
			   echo"</script>";
			   $_SESSION['visitorID']=10000;
			   $customerID=$visitorID;
		  }else{
		    $customerID=$visitorID;
	        }
	}
?>
<body onload="showitemsquantity(<?php echo htmlspecialchars($customerID);?>)">
    <div id="mian_div">
	      <?php require"header.html"?>
		  <div id="main">
		        <?php require"left_bar.html"?>
				<div id="content">
				      <?php 
					      $sql1="select * from product p, specialsale s where p.productID='$productID' and p.productID=s.productID";
						  $sql2="select distinct * from product p where p.productID='$productID' and NOT EXISTS(select distinct * from specialsale s where s.productID=p.productID)";
						  $con=mysql_connect("localhost:3306","root","");
						  if(!$con){
						        die("could not connect:".mysql_error());
						  }
						  mysql_select_db("logindb",$con);
						  $result1=mysql_query($sql1);
						  $result2=mysql_query($sql2);
						  if($row=mysql_fetch_assoc($result1)){
					  ?>
					          <div class="detail_product_box">
							          <div class="product_pic">
									        <img src="<?php echo htmlspecialchars($row['productimage']);?>" alt="" width="300" height="218">
									  </div>
									  <h1><?php echo htmlspecialchars($row['productname']);?></h1>
									  <div class="detail_product_info">
									          <?php echo htmlspecialchars($row['productdescription']);?>
											  <h3><span style="font-size:12px; color:black;text-decoration:line-through;margin-right:10px">$<?php echo htmlspecialchars($row['productprice']);?></span>$<?php echo htmlspecialchars(round($row['productprice']*$row['salesdiscount'],2));?></h3>
									 <div>
									 <form name="addcart">
									     Qty.<select name="productquantity">
										           <option value="1" selected="selected">1</option>
												   <option value="2">2</option>
												   <option value="3">3</option>
												   <option value="4">4</option>
												   <option value="5">5</option>
											</select>
									<input class="add_to_cart_button" type="button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Add to Cart" onclick="addtocart(<?php echo htmlspecialchars($row['productID']);?>,<?php echo htmlspecialchars($customerID);?>)">
									</form>
									</div>
									</div>
									<div class="clear">
									&nbsq;
									</div>
				            </div>
						<?php }elseif($row=mysql_fetch_assoc($result2)){
						?>
						   <div class="detail_product_box">
						             <div class="product_pic">
									      <img src="<?php echo htmlspecialchars($row['productimage']);?>"alt="" width="300" height="218">
									 </div>
									 <h1><?php echo htmlspecialchars($row['productname']);?></h1>
									 <div class="detail_product_info">
									      <?php echo htmlspecialchars($row['productdescription']);?>
										  <h3>$<?php echo htmlspecialchars($row['productprice']);?></h3>
										  <div>
										       <form name="addcart">
											    Qty.<select name="productquantity">
												      <option value="1" selected="selected">1</option>
													  <option value="2">2</option>
													  <option value="3">3</option>
													  <option value="4">4</option>
													  <option value="5">5</option>
													</select>
													<input class="add_to_cart_button" type="button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Add to Cart" onclick="addtocart(<?php echo htmlspecialchars($row['productID']);?>,<?php echo htmlspecialchars($customerID);?>)">
											    </form>
													
										  </div>
									 </div>
									 <div class="clear">
									     &nbsq;
									 </div>
							</div>
								<?php }
								else{ 
								    echo'error';
								}
								mysql_close($con);?>
				</div>
				<div class="clear"></div>
				<p style="font-size:16px; color:#fff;background:#1E90FF;margin:10px;text-align:center;height:25px;padding:5px;width:380px;">Customers Who Bought This Item Also Bought:</p>
				<?php
				      $sql="select distinct productID from `order` o, `orderitem` oi where o.orderID=oi.orderID and oi.productID<>'$productID' and o.orderID in (select distinct o.orderID from `order` o, `orderitem` oi where o.orderID=oi.orderID and oi.productID='$productID')";
					  //$sql = "SELECT distinct productID FROM `order` o,`orderitem` oi WHERE o.orderID=oi.orderID and oi.productID<>'$productID' and o.orderID in (select distinct o.orderID from `order` o, `orderitem` oi where o.orderID=oi.orderID and oi.productID='$productID')";
					 $con=mysql_connect("localhost:3306","root","");
					  if(!$con){
					          die("could not connect:".mysql_error());
					  }
					  mysql_select_db("logindb",$con);
					  $result=mysql_query($sql);
					  while($row=mysql_fetch_assoc($result)){
					       $productID=$row['productID'];
						   $sql="select *from product where productID='$productID'";
						   $result2=mysql_query($sql);
						   if($row=mysql_fetch_assoc($result2)){
						   ?>
						       <div class="small_product_box">
							   <a href="item_page.php?productID=<?php echo htmlspecialchars($productID);?>"><h1><?php echo htmlspecialchars($row['productname']);?></h1></a>
							   <div style="margin:0 auto;text-align:center;">
							       <a href="item_page.php?productID=<?php echo htmlspecialchars($productID);?>"><img src="<?php echo htmlspecialchars($row['productimage']);?>" alt="not found" width="150" height="109"></a>
							   </div>
							   <div style="margin:5px auto;">
							       <?php echo htmlspecialchars(substr($row['productdescription'],0,55));echo'...';?>
							   </div>
							   <div class="clear">
							        &nbsp;
							   </div>
							   </div>
                <?php 
                           }	
                    }
                    mysql_close($con);
                 ?>
              <div class="clear"></div>				 
	     </div>
		 <?php require"foot_bar.html"?>
	</div>

</body>
</html>