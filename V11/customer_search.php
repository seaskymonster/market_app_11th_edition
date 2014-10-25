<?php session_start();

if(isset($_POST['customerID'])){
 $customerID=$_SESSION['customerID'];
}else{
 $customerID='';
}

 $visitorID=$_SESSION['visitorID'];
 
 if(isset($_POST['keyword'])){
       $keyword=$_POST['keyword'];
 }else{
       $keyword='';
 }
 if(isset($_POST['customercategory'])){
       $customercategory=$_POST['customercategory'];
 }else{
      $customercategory='';
 }
 
 
 
?>
<!DOCTYPE html>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset-utf-8">
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
						$SESSION['visitorID']=10000;
						$visitorID=$SESSION['visitorID'];
						$customerID=$visitorID;
					}else{
					    $customerID=$visitorID;
					  }
	  }
?>
						
<body onload="showitemsquantity(<?php echo htmlspecialchars($customerID);?>)">
        <div id="main_div">
		      <?php require "header.html"?>
			       <div id="main">
				           <?php require "left_bar.html"?>
						      <div id="content">
							      <?php if($keyword==''&&$customercategory==''){
								                  echo"No such products found! Please search again.";
									             return;
									     }elseif($keyword!=''&&$customercategory==''){
										          $sql1="SELECT *from product p, specialsale s where productname like '%$keyword%' and  p.productID=s.productID";
												  $sql2="SELECT DISTINCT * from product p where productname like '%$keyword%' and NOT EXISTS(select distinct * from specialsale s where s.productID=p.productID)";
										 }elseif($keyword==''&&$customercategory!=''){
                                                  $sql1="SELECT *from product p,specialsale s where productcategoryID='$customercategoryID' and p.productID=s.productID";
                                                  $sql2="SELECT distinct *from product p where productcategoryID ='$productcategoryID' and NOT EXISTS(select distinct * from specialsale s where s.productID=p.productID)";
										 }elseif($keyword!=''&&$customercategory!=''){
										          $sql1="SELECT *from product p, specialsale s whre productcategoryID='$customercatgoryID' and productname like'%$keyword%' and p.productID=s.productID";
												  $sql2="SELECT distinct *form product p where productcategoryID='$productcategoryID' and productname like'%$keyword%' and NOT EXISTS(select distinct *from specialsale s where s.productID=p.productID)";
										 }
										 
										 $con=mysql_connect("localhost:3306","root","");
										 if(!$con){
										        die("cannot connect".mysql_error());
										 }
										 mysql_select_db("logindb",$con);
										 $result=mysql_query($sql1);
                                         while($row=mysql_fetch_assoc($result)){
							       ?>
								         <div class="product_box">
										        <a href="item_page.php?productID=<?php echo htmlspecialchars($row['productID']);?>"><h1><?php echo htmlspecialchars($row['productname']);?></h1></a>
											
												<div class="product_pic">
												         <a href="item_page.php?productID=<?php echo htmlspecialchars($row['productID']);?>"><img src="<?php echo htmlspecialchars($row['productimage']);?>" alt="" width="150" height="109"></a>
												</div>
												<div class="product_info">
												         <?php echo htmlspecialchars(substr($row['productdescription'],0,55));echo'....';?>
														 <h3><span style="font-size；12px;color:black;text-decoration:line-through;margin-right:10px">$<?php echo htmlspecialchars ($row['productprice']);?></span>$<?php echo htmlspecialchars(round($row['productprice']*$row['salesdiscount'],2));?></h3>
												
												<div>
												      <input class="add_to_cart_button" type="button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Add to Cart" onclick="searchaddshopcart(<?php echo htmlspecialchars($row['productID']);?>,1,<?php echo htmlspecialchars($customerID);?>)">
												</div>
												<div>
												      <input class="see_detail_button" type="button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="See More Detail" onclick="seemoredetail(<?php htmlspecialchars($row['productID']);?>">
											    </div>
										        </div>
										 
										        <div class="clear">
										          &nbsq;
										       </div>
										</div>
								<?php } ?>
								
								<?php $result=mysql_query($sql2);
								      while($row=mysql_fetch_assoc($result)){
								?>
								      <div class="product_box">
									         <a href="item_page.php?productID=<?php echo htmlspecialchars($row['productID']); ?>"><h1><?php echo htmlspecialchars($row['productname']);?></h1></a>
											 <div class="product_pic">
											     <a href="item_page.php?productID=<?php echo htmlspecialchars($row['productID']);?>"><img src="<?php echo htmlspecialchars($row['productimage']);?>" alt="" width="150" height="109"></a>
											</div>
										    <div class="product_info">
											    <?php echo htmlspecialchars(substr($row['productdescription'],0,55));echo'....';?>
												<h3>$<?php echo htmlspecialchars($row['productprice']);?></h3>
											    <div><input class="add_to_cart_button" type="button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'"value="Add to Cart" onclick="searchaddshopcart(<?php echo $row['productID'];?>,1,<?php echo htmlspecialchars($customerID);?>)">
												</div>
												<div><input class="see_detail_button" type="button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="See More Detail" onclick="seemoredetail(<?php echo $row['productID'];?>)">
												</div>
											</div>
											<div class="clear">
											   &nbsq;
											</div>
										</div>
											<?php } mysql_close($con);?>
							</div>	
							<div class="clear"></div> 
                   </div>	
                   <?php require"foot_bar.html"?>
        </div>				 
</body>
</html>