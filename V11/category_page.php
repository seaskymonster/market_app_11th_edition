<?php session_start();
if(isset($_SESSION['categoryID'])){
$customerID=$_SESSION['customerID'];
}else{
$customerID='';
}
$categoryID=$_GET['categoryID'];
$visitorID=$_SESSION['visitorID'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	  <title>Wenlai E-Shop</title>
	  <link rel="stylesheet" type="text/css" href="stylesheet.css">
	  <script type="text/javascript" src="shop_cart_request1.js"></script>

</head>
<?php 
     if($customerID==''){
	       if($visitorID==''){
		               echo"<script>";
					   echo"clearAll(10000)";
					   echo"</script>";
					   $_SESSION['visitorID']=10000;
					   $visitorID=$_SESSION['visitorID'];
					   $customerID=$visitorID;
			}else{
			      $customerID=$visitorID;
			}
	 }
?>
					   
<body onload="showitemsquantity(<?php echo $customerID;?>)">
       <div id="main_div">
	                 <?php require"header.html"?>
					 <div id="main">
					             <?php require"left_bar.html"?>
								 <div id="content">
								         <div>
										 <p class="content_title">Today's Special</p>
										 <?php
										      $sql="select* from product p,specialsale s where productcategoryID='$categoryID' and p.productID=s.productID";
											  $con=mysql_connect("localhost:3306","root","");
											  if(!$con){
											           die("could not connect:".mysql_error());
											   }
											  mysql_select_db("logindb",$con);
											  $result=mysql_query($sql);
											  while($row=mysql_fetch_assoc($result)){
										?>
										      <div class="product_box">
											          <a href="item_page.php?productID=<?php echo htmlspecialchars($row['productID']);?>"><h1><?php echo htmlspecialchars($row['productname']);?></h1></a>
													  <div class="product_pic">
													           <a href="item_page.php?productID=<?php echo htmlspecialchars($row['productID']);?>"><img src="<?php echo htmlspecialchars($row['productimage']);?>" alt="" width="150" height="109"></a>
													 </div>
													 <div class="product_info">
													         <?php echo htmlspecialchars(substr($row['productdescription'],0,55));echo'...';?>
															 <h3><span style="font-size:12px; color:black; text-decoration:line-through; margin-right:10px">$<?php echo htmlspecialchars($row['productprice']);?></span>$<?php echo htmlspecialchars(round($row['productprice']*$row['salesdiscount'],2));?></h3>
													 
													 <div>
													      <input class="add_to_cart_button" type="button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Add to Cart" onclick="addshopcart(<?php echo htmlspecialchars($row['productID']);?>,1,<?php echo $customerID;?>)">
													</div>
													<div>
													      <input class="see_detail_button" type="button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="See More Detail" onclick="seemoredetail(<?php echo $row['productID'];?>)">
													</div>
											        </div>
											 <div class="clear">
											    &nbsq;
											 </div>
										    </div>
								             <?php } mysql_close($con);?>
								              <div class="clear">
								               &nbsq;
							                 </div>
								      </div>
									  <div>
									  <p class="content_title">Hottest Products</p>
									<?php
									     $sql="select distinct *from product p where productcategoryID='$categoryID' and NOT EXISTS(select distinct *from specialsale s where s.productID=p.productID)";
										 $con=mysql_connect("localhost:3306","root","");
										 if(!$con){
											       die("Could not connect:".mysql_error());
                                         }
                                         mysql_select_db("logindb",$con);
                                         $result=mysql_query($sql);
                                         while($row=mysql_fetch_assoc($result)){
                                     ?>      <div class="product_box">
                                                <a href="item_page.php?productID=<?php echo htmlspecialchars($row['productID']);?>"><h1><?php echo htmlspecialchars($row['productname']);?></h1></a>
										        <div class="product_pic">
												     <a href="item_page.php?productID=<?php echo htmlspecialchars($row['productID']);?>"><img src="<?php echo htmlspecialchars($row['productimage']);?>"alt="" width="150" height="109"></a>
												</div>
												<div class="product_info">
												      <?php echo htmlspecialchars(substr($row['productdescription'],0,55));echo'...';?>
													  <h3>$<?php echo htmlspecialchars($row['productprice']);?></h3>
													  <div><input class="add_to_cart_button"type="button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Add to Cart" onclick="addshopcart(<?php echo htmlspecialchars($row['productID']);?>,1,<?php echo $customerID; ?>)">
													  </div>
													  <div><input class="see_detail_button" type="button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="See More Details" onclick="seemoredetail(<?php echo htmlspecialchars($row['productID']);?>)">
													  </div>
												</div>
												<div class="clear">
												      &nbsp;
												</div>
													 
											 </div>
										<?php } mysql_close($con);?>
									    
									  </div>
					           </div>
					           <div class="clear"></div>
	                </div>
					<?php require "foot_bar.html"?>
	</div>
</body>
</html>