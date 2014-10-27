<?php session_start();
$customerID=$_SESSION['customerID'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	  <title>Wenlai E-Shop</title>
	  <link rel="stylesheet" type="text/css" href="stylesheet.css">
	  <script type="text/javascript" src="shop_cart_request1.js"></script>
	  <script>
	          function goback(){
			     document.getElementById("orderinfo").style.display="block";
				 document.getElementById("ordersummary").style.display="none";
				 
			  }
			  
			  function placeorder(){
			      ajaxclearall(<?php echo htmlspecialchars($customerID);?>);
				  document.checkoutinfo.submit();
			 }
				
	       
	          function viewsummary(){
			        if(baddressvalidation()==false){
					   return;
					}
					if(saddressvalidation()==false){
					  return;
					}
					if(paymentvalidation()==false){
					 return;
					}
					showordersummary();
					div1=document.getElementById("orderinfo");
					div2=document.getElementById("ordersummary");
					div1.style.display="none";
					div2.style.display="block";
			    }
			 
			  function sameaddress(){
			       if(document.checkoutinfo.isbillingshippingthesame.checked){
				      document.checkoutinfo.shippingfirstname.value=document.checkoutinfo.billingfirstname.value;
				      document.checkoutinfo.shippinglastname.value=document.checkoutinfo.billinglastname.value;
					  document.checkoutinfo.shippingaddress.value=document.checkoutinfo.billingaddress.value;
				      document.checkoutinfo.shippingcity.value=document.checkoutinfo.billingcity.value;
					  document.checkoutinfo.shippingstate.value=document.checkoutinfo.billingstate.value;
				      document.checkoutinfo.shippingzipcode.value=document.checkoutinfo.billingzipcode.value;
					  document.checkoutinfo.shippingphone.value=document.checkoutinfo.billingphone.value;
				     
				   }else{
				      document.checkoutinfo.shippingfirstname.value="";
				      document.checkoutinfo.shippinglastname.value="";
					  document.checkoutinfo.shippingaddress.value="";
				      document.checkoutinfo.shippingcity.value="";
					  document.checkoutinfo.shippingstate.value="";
				      document.checkoutinfo.shippingzipcode.value="";
					  document.checkoutinfo.shippingphone.value="";
				   }
			  }
			  function showordersummary(){
			        document.getElementById("bname").innerHTML=document.checkoutinfo.billingfirstname.value+''+document.checkoutinfo.billinglastname.value;
					document.getElementById("sname").innerHTML=document.checkoutinfo.shippingfirstname.value+''+document.checkoutinfo.shippinglastname.value;
					document.getElementById("baddress").innerHTML=document.checkoutinfo.billingaddress.value;
					document.getElementById("saddress").innerHTML=document.checkoutinfo.shippingaddress.value;
					document.getElementById("bcity").innerHTML=document.checkoutinfo.billingcity.value+','+document.checkoutinfo.billingstate.value;
					document.getElementById("scity").innerHTML=document.checkoutinfo.shippingcity.value+','+document.checkoutinfo.shippingstate.value;
					document.getElementById("bzip").innerHTML=document.checkoutinfo.billingzipcode.value;
					document.getElementById("szip").innerHTML=document.checkoutinfo.shippingzipcode.value;
					document.getElementById("bphone").innerHTML=document.checkoutinfo.billingphone.value;
					document.getElementById("sphone").innerHTML=document.checkoutinfo.shippingphone.value;
			  }
			  
			  function baddressvalidation(){
			        var bfirstname=document.checkoutinfo.billingfirstname.value;
					var blastname=document.checkoutinfo.billinglastname.value;
					var baddress=document.checkoutinfo.billingaddress.value;
					var bcity=document.checkoutinfo.billingcity.value;
					var bstate=document.checkoutinfo.billingstate.value;
					var bzip=document.checkoutinfo.billingzipcode.value;
					var bphone=document.checkoutinfo.billingphone.value;
					
					var errormessage='';
					if(bfirstname==''||blastname==''){
					   errormessage+="Error:Please input your billing name!</br>";
					}
					if(baddress==''){
					   errormessage+="Error:Please input your billing address!</br>";
					 }
					if(bcity==''){
					   errormessage+="Error:Please input your billing city!</br>";
					 }
					if(bstate=='0'){
					   errormessage+="Error:Please input your billing state!</br>";
					 }
					if(isNaN(bzip)||bzip.length!=5){
					   errormessage+="Error:Please input your billing zipcode!</br>";
					 }
					if(isNaN(bphone)||bphone.length!=10){
					   errormessage+="Error:Please input your billing phone!</br>";
					 }
					if(errormessage==''){
					   return true;
					 }else{
					   p=document.getElementById("error");
					   p.innerHTML=errormessage;
					   return false;
					 }
					   
			  }
	       function saddressvalidation(){
		            if(document.checkoutinfo.isbillingshippingthesame.checked){
					   return true;
					 }
			        var sfirstname=document.checkoutinfo.shippingfirstname.value;
					var slastname=document.checkoutinfo.shippinglastname.value;
					var saddress=document.checkoutinfo.shippingaddress.value;
					var scity=document.checkoutinfo.shippingcity.value;
					var sstate=document.checkoutinfo.shippingstate.value;
					var szip=document.checkoutinfo.shippingzipcode.value;
					var sphone=document.checkoutinfo.shippingphone.value;
					
					var errormessage='';
					if(sfirstname==''||slastname==''){
					   errormessage+="Errorr:Please input your Shipping name!</br>";
					}
					if(saddress==''){
					   errormessage+="Error:Please input your Shipping address!</br>";
					 }
					if(scity==''){
					   errormessage+="Error:Please input your Shipping city!</br>";
					 }
					if(sstate=='0'){
					   errormessage+="Error:Please input your Shipping state!</br>";
					 }
					if(isNaN(szip)||szip.length!=5){
					   errormessage+="Error:Please input your Shipping zipcode!</br>";
					 }
					if(isNaN(sphone)||sphone.length!=10){
					   errormessage+="Error:Please input your Shipping phone!</br>";
					 }
					if(errormessage==''){
					   return true;
					 }else{
					   p=document.getElementById("error");
					   p.innerHTML=errormessage;
					   return false;
					 }
					   
			  }
			  
			  function paymentvalidation(){
			       var cardnumber=document.checkoutinfo.cardnumber.value;
				   var securitycode=document.checkoutinfo.securitycode.value;
				   var errormessage='';
				   if(isNaN(cardnumber)||cardnumber==''){
				      errormessage+="Error:Please input valid card number!</br>";
					}
				   if(isNaN(securitycode)||securitycode.length!=3){
				      errormessage+="Error:Please input valid security code!</br>";
					}
					if(errormessage==''){
					   return true;
					 }else{
					   p=document.getElementById("error");
					   p.innerHTML=errormessage;
					   return false;
					 }
			  }
	  </script>
</head>
<body onload="showitemsquantity(<?php echo htmlspecialchars($customerID);?>)">
       <div id="main_div">
	            <?php require "header.html"?>
			<div id="main">
				<div id="orderinfo">
				        <form name="checkoutinfo" method="post" action="place_order.php">
						<fieldset class="checkout_fieldset">
						         <legend>Billing Address</legend>
								 <table>
								         <tr>
										      <td>FirstName:</td>
											  <td><input type="text" name="billingfirstname"></td>
											  <td>LastName:</td>
											  <td><input type="text" name="billinglastname"></td>
										 </tr>
										 <tr>
										      <td>Address:</td>
											  <td><input type="text" name="billingaddress"></td>
											  <td>City:</td>
											  <td><input type="text" name="billingcity"></td>
										 </tr>
										 <tr>
										      <td>State:</td>
											  <td><select name="billingstate">
												  <option value="0">Select a State</option>
										          <option value="AL">AL</option>
										          <option value="AK">AK</option>
										          <option value="AZ">AZ</option>
										          <option value="CA">CA</option>
										          <option value="CO">CO</option>
										          <option value="CT">CT</option>
										          <option value="DE">DE</option>
										          <option value="FL">FL</option>
										          <option value="GA">GA</option>
										          <option value="HI">HI</option>
										          <option value="ID">ID</option>
										          <option value="IL">IL</option>
										          <option value="IA">IN</option>
										          <option value="KS">KS</option>
										          <option value="KY">KY</option>
										          <option value="LA">LA</option>
										          <option value="ME">ME</option>
										          <option value="MD">MD</option>
										          <option value="MA">MA</option>
										          <option value="MI">MI</option>
										          <option value="MN">MN</option>
										          <option value="MS">MS</option>
										          <option value="MO">MO</option>
										          <option value="MT">MT</option>
										          <option value="NE">NE</option>
										          <option value="NV">NV</option>
										          <option value="NH">NH</option>
										          <option value="NJ">NJ</option>
										          <option value="NM">NM</option>
										          <option value="NY">NY</option>
										          <option value="NC">NC</option>
										          <option value="ND">ND</option>
										          <option value="OH">OH</option>
										          <option value="OK">OK</option>
										          <option value="OR">OR</option>
										          <option value="PA">PA</option>
										          <option value="RL">RL</option>
										          <option value="SC">SC</option>
										          <option value="SD">SD</option>
										          <option value="TN">TN</option>
										          <option value="TX">TX</option>
										          <option value="UT">UT</option>
										          <option value="VT">VT</option>
										          <option value="VA">VA</option>
										          <option value="WA">WA</option>
										          <option value="WV">WV</option>
										          <option value="WI">WI</option>
										          <option value="WY">WY</option>
									             </select>
											  </td>
											  <td>Zip code(5 digits):</td>
                                              <td><input type="text" name="billingzipcode"></td>
											  <td style="color:blue">(Please input 5 digits)</td>
										 </tr>
										 <tr>
										      <td>Phone:</td>
											  <td><input type="text" name="billingphone"></td>
											  <td style="color:blue">(Please input 10 digits)</td>
										 </tr>
								 </table>
						</fieldset>
						<input style="margin-left:80px" type="checkbox" name="isbillingshippingthesame" onchange="sameaddress()">Yes,my Billing and Shipping addresses are the same.
						<fieldset class="checkout_fieldset">
						         <legend>Shipping Address</legend>
								 <table>
								         <tr>
										      <td>FirstName:</td>
											  <td><input type="text" name="shippingfirstname"></td>
											  <td>LastName:</td>
											  <td><input type="text" name="shippinglastname"></td>
										 </tr>
										 <tr>
										      <td>Address:</td>
											  <td><input type="text" name="shippingaddress"></td>
											  <td>City:</td>
											  <td><input type="text" name="shippingcity"></td>
										 </tr>
										 <tr>
										      <td>State:</td>
											  <td><select name="shippingstate">
												  <option value="0">Select a State</option>
										          <option value="AL">AL</option>
										          <option value="AK">AK</option>
										          <option value="AZ">AZ</option>
										          <option value="CA">CA</option>
										          <option value="CO">CO</option>
										          <option value="CT">CT</option>
										          <option value="DE">DE</option>
										          <option value="FL">FL</option>
										          <option value="GA">GA</option>
										          <option value="HI">HI</option>
										          <option value="ID">ID</option>
										          <option value="IL">IL</option>
										          <option value="IA">IN</option>
										          <option value="KS">KS</option>
										          <option value="KY">KY</option>
										          <option value="LA">LA</option>
										          <option value="ME">ME</option>
										          <option value="MD">MD</option>
										          <option value="MA">MA</option>
										          <option value="MI">MI</option>
										          <option value="MN">MN</option>
										          <option value="MS">MS</option>
										          <option value="MO">MO</option>
										          <option value="MT">MT</option>
										          <option value="NE">NE</option>
										          <option value="NV">NV</option>
										          <option value="NH">NH</option>
										          <option value="NJ">NJ</option>
										          <option value="NM">NM</option>
										          <option value="NY">NY</option>
										          <option value="NC">NC</option>
										          <option value="ND">ND</option>
										          <option value="OH">OH</option>
										          <option value="OK">OK</option>
										          <option value="OR">OR</option>
										          <option value="PA">PA</option>
										          <option value="RL">RL</option>
										          <option value="SC">SC</option>
										          <option value="SD">SD</option>
										          <option value="TN">TN</option>
										          <option value="TX">TX</option>
										          <option value="UT">UT</option>
										          <option value="VT">VT</option>
										          <option value="VA">VA</option>
										          <option value="WA">WA</option>
										          <option value="WV">WV</option>
										          <option value="WI">WI</option>
										          <option value="WY">WY</option>
									             </select>
											  </td>
											  <td>Zip code(5 digits):</td>
                                              <td><input type="text" name="shippingzipcode"></td>
											  <td style="color:blue">(Please input 5 digits)</td>
										 </tr>
										 <tr>
										      <td>Phone:</td>
											  <td><input type="text" name="shippingphone"></td>
											  <td style="color:blue">(Please input 10 digits)</td>
										 </tr>
								 </table>
						</fieldset>
						<fieldset class="checkout_fieldset">
						       <legend>Please enter your credit card information:</legend>
							   <table>
							          <tr>
									       <td>Credit card Type:</td>
										   <td><select name="cardtype">
										       <option value="American Express">American Express</option>
											   <option value="Mastercard">Mastercard</option>
											   <option value="Visa">Visa</option>
											   </select>
										   </td>
									  </tr>
									  <tr>
									       <td>Card Number:</td>
										   <td><input type="text"  name="cardnumber"></td>
									  </tr>
									  <tr>
									       <td>Expiration Date:</td>
										   <td><select name="expiremonth">
										       <option value="01">01</option>
										       <option value="02">02</option>
										       <option value="03">03</option>
										       <option value="04">04</option>
										       <option value="05">05</option>
										       <option value="06">06</option>
										       <option value="07">07</option>
										       <option value="08">08</option>
										       <option value="09">09</option>
										       <option value="10">10</option>
										       <option value="11">11</option>
										       <option value="12">12</option>
											   </select>
											   <select name="expireyear">
											   <option value="2012">2012</option>
											   <option value="2013">2013</option>
										       <option value="2014">2014</option>
										       <option value="2015">2015</option>
										       <option value="2016">2016</option>
										       <option value="2017">2017</option>
										       <option value="2018">2018</option>
										       <option value="2019">2019</option>
										       <option value="2020">2020</option>
									           </select>
									  </tr>
									  <tr>
									       <td>Security code:</td>
										   <td><input type="text" name="securitycode"></td>
										   <td style="color:blue">(3 digits on the back of your card)</td>
									  </tr>
							   </table>
						</fieldset>
						<p id="error" style="color:red;text-align:center"></p>
						<input class="view_summary" type="button" value="Continue" onclick="viewsummary()">
						
				</div>
				<div id="ordersummary" style="display:none">
				      <h1 style="text-align:center">Order Summary</h1>
					  <table id="addresssummary" class="order_summary_table">
					        <th>Billing Address</th>
							<th>Shipping Address</th>
							<tr>
							    <td id="bname"></td>
								<td id="sname"></td>
							</tr>
							<tr>
							    <td id="baddress"></td>
								<td id="saddress"></td>
							</tr>
							<tr>
							    <td id="bcity"></td>
								<td id="scity"></td>
							</tr>
							<tr>
							    <td id="bzip"></td>
								<td id="szip"></td>
							</tr>
							<tr>
							    <td id="bphone"></td>
								<td id="sphone"></td>
							</tr>	
					  </table>
					  <?php
					      $total=0;
						  $sql1 = "select * from product p,shoppingcart sh,specialsale s where sh.customerID='$customerID' and p.productID=sh.productID and s.productID=p.productID";
						  $sql2 = "select * from product p,shoppingcart sh where sh.customerID='$customerID' and p.productID=sh.productID and NOT EXISTS(select distinct * from specialsale s where s.productID=p.productID)";
						  $con = mysql_connect('localhost:3306','root','');
						  if(!$con){
							   die('Could not connect: ' . mysql_error());
						  }
						  mysql_select_db("logindb",$con);
						  $result1 = mysql_query($sql1);
						  $result2 = mysql_query($sql2);
						  if(mysql_num_rows($result1)!=0 || mysql_num_rows($result2)!=0){
					?>
				         <table rules="rows"frame="void"class="order_summary_table">
				         	<th>Qty.</th>
					        <th>Item Description</th>
					        <th>Price</th>
					        <th>Total</th>
					<?php while($row=mysql_fetch_assoc($result1)){
					?>
					      <input type="hidden" name="productID[]" value="<?php echo $row['productID'];?>">
						  <input type="hidden" name="productquantity[]" value="<?php echo $row['productquantity'];?>">
						  <input type="hidden" name="productprice[]" value="<?php echo round($row['productprice']*$row['salesdiscount'],2);?>">
					       <tr>
						       <td><?php echo htmlspecialchars($row['productquantity']);?></td>
							   <td><?php echo htmlspecialchars($row['productname']);?></td>
							   <td><span style="text-decoration:line-through;margin-right:10px"><?php echo htmlspecialchars($row['productprice']);?></span><?php echo htmlspecialchars(round($row['productprice']*$row['salesdiscount'],2));?></td>
							   <td><?php $subtotal=$row['productquantity']*round($row['productprice']*$row['salesdiscount'],2);
							       $total+=$subtotal;
								   echo htmlspecialchars($subtotal);
								   ?>
							   </td>
						   </tr>
					<?php  } ?>
					<?php while($row=mysql_fetch_assoc($result2)){
					?>    
					      <input type="hidden" name="productID[]" value="<?php echo $row['productID'];?>">
						  <input type="hidden" name="productquantity[]" value="<?php echo $row['productquantity'];?>">
						  <input type="hidden" name="productprice[]" value"<?php echo $row['productprice'];?>">
						  <tr>
						      <td><?php echo htmlspecialchars($row['productquantity']);?></td>
							  <td><?php echo htmlspecialchars($row['productname']);?></td>
							  <td><?php echo htmlspecialchars($row['productprice']);?></td>
							  <td><?php $subtotal=$row['productquantity']*$row['productprice'];
							            $total+=$subtotal;
										echo htmlspecialchars($subtotal);
								   ?>
							  </td>
						</tr>	   
				   <?php } ?>
				     </table>
					 <hr>
					 <table class="summary_table">
					     <tr>
						    <td>Merchandise Subtotal:</td>
							<td><?php echo'$'.$total;?></td>
						</tr>
						<tr>
						    <td>Estimated Shipping and Handling:
							    Based on ground shipping within continential U.S.
							</td>
							<td><?php echo'$12';?></td>
						</tr>
						<tr>
						    <td>Sales Tax:</td>
							<td><?php echo'$'.round($total*0.087,2);?></td>
						</tr>
						<tr>
						    <td>Estimated Total::</td>
							<td><?php $all=round($total*1.087+12,2);
							          echo'$'.$all;
								?>
							</td>
						</tr>
					</table>
					<input type="hidden" name="totalprice" value="<?php echo $all;?>">
					<?php mysql_close($con);?>
				<?php }?>
				</form>
				<input type="button" class="continue_shopping_button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Go Back" onclick="goback()">
				<input type="button" class="checkout_button" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white'" value="Place Order" onclick="placeorder()">
							   
							  
							     
							
						  
					
						  
				</div>
				
			</div>
			<?php require "foot_bar.html"?>
	   </div>'
</body>
</html>
