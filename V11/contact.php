<?php session_start();
if(isset($_SESSION['customerID'])){

      $customerID=$_SESSION['customerID'];
}else{
      $customerID='';
}
$visitorID=$_SESSION['visitorID'];

?>

<!DOCTYPE html>

<html>
<head>
     <meta http-equiv="Content-Type" content="text/html ;charset=utf-8">
	 <title>Wenlai E-SHOP</title>
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
	}
?>
							  
<body onload="showitemsquantity(<?php echo htmlspecialchars($customerID);?>)">
     <div id="main_div">
	          <?php require "header.html"
			  ?>
			  <div id="main">
			        <?php require "left_bar.html"
					?>
					
				    <div id="content">
					    <p style="text-align:center; font-size:20px">If you have any question,please contact us by<span style="color:blue; font-size:25px">Email:wenlaizhang@gmail.com</span>or by<span style="color:blue;font-size:25px">Phone:213-308-8016</span></p>
				    </div>
					<div class="clear"></div>
			 </div>
			 <?php require "foot_bar.html" ?>
	 </div>
</body>
</html>
