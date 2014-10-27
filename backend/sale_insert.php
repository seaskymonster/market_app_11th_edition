<?php session_start();

?>

<!DOCTYPE html>

<html>
<head>
<script>
        function categorysubmit(){
		          errormessage='';
				  if(document.f1.productcategoryname.value==''){
				    errormessage +="Please input product category name.</br>";
				   }
				  if(document.f1.productcategorydescription.value==''){
				    errormessage +="Please input product category description.<br>";
				   }
				  if(errormessage==''){
				    document.f1.submit();
				  }else{
				     p=document.getElementById("categoryerrormessage");
				     p.innerHTML=errormessage;
				  }
		}
		function productsubmit(){
		          errormessage='';
				  if(document.f2.productcategoryID.value=='' || isNaN(document.f2.productcategoryID.value)){
				    errormessage +="Please input valid product category ID.</br>";
				   }
				  if(document.f2.productname.value==''){
				    errormessage +="Please input product name.<br>";
				   }
				  if(document.f2.productdescription.value==''){
				    errormessage +="Please input product description.<br>";
				   }
				  if(document.f2.productimage.value==''){
				    errormessage+="Please input product image url.<br>";
				   }
				  if(document.f2.productprice.value=='' ||isNaN(document.f2.productprice.value)){
				    errormessage +="Please input valid product price<br>";
				   }
				  if(errormessage==''){
				    document.f2.submit();
				  }else{
				     p=document.getElementById("producterrormessage");
				     p.innerHTML=errormessage;
				  }
		}
		
		function specialsalesubmit() {
				errormessage = '';
				if (document.f3.productID.value == '' || isNaN(document.f3.productID.value)) {
					errormessage += "Please input valid product ID. <br/>";
				}
				if (document.f3.salesdiscount.value == '' || isNaN(document.f3.salesdiscount.value) || document.f3.salesdiscount.value > '1' || document.f3.salesdiscount.value < '0') {
					errormessage += "Please input valid sales discount.(number between 0 and 1) <br/>";
				}
				reg = /^(\d{4})-(\d{1,2})-\d{1,2}$/;
				if (document.f3.startdate.value == '' || !document.f3.startdate.value.match(reg)) {
					errormessage += "Please input valid start date. <br/>";
				}
				if (document.f3.enddate.value == '' || !document.f3.enddate.value.match(reg)) {
					errormessage += "Please input valid end date. <br/>";
				}
				if (errormessage == '') {
					document.f3.submit();
				} else {
					p = document.getElementById("specialsaleerrormessage");
					p.innerHTML = errormessage;
				}

			}
</script>
</head>

<body>
<?php
    $tabletype=$_GET['tabletype'];
	$url="saleoperation.php?type=insert&tabletype=$tabletype";
	
	var_dump($tabletype);
	
	if($tabletype=='category'){
?>
         <form name="f1" method="post" action="<?php echo $url;?>">
         <h2> Add a product category</h2>
		 <p style="color:blue">Notice: The productcategoryID will be automatically generated</p>
         <table>
		       <tr>
			       <td>productcategoryname:</td>
				   <td><input type="text" name="productcategoryname"></td>
			   </tr>
			   <tr>
			       <td>productcategorydescription:</td>
				   <td><input type="text" name="productcategorydescription"></td>
			   </tr>
		 </table>
		 <input type="hidden" name="choose">
		 <p id="categoryerrormessage" style="color:red"></p>
		 <input type="button" value="submit" onclick="categorysubmit()">
		 </form>
<?php
   }elseif($tabletype=='product'){
?>
         <form name="f2" method="post" action="<?php echo $url;?>">
		 <h2> Add a product</h2>
		 <p style="color:blue">Notice: The productID will be automatically generated</p>
		 <table>
		       <tr>
		           <td>productcategoryID:</td>
				   <td><input type="text" name="productcategoryID"></td>
			   </tr>
			   <tr>
			       <td>productname:</td>
				   <td><input type="text" name="productname"></td>
			   </tr>
			   <tr>
			       <td>productdescription:</td>
				   <td><input type="text" name="productdescription"></td>
			   </tr>
			   <tr>
			       <td>productimage</td>
				   <td><input type="text" name="productimage"></td>
			   </tr>
			   <tr>
			       <td>productprice</td>
				   <td><input type="input" name="productprice"></td>
			   </tr>
		</table>
		<input type="hidden" name="choose">
		<p id="producterrormessage" style="color:red"></p>
		<input type="button" value="submit" onclick="productsubmit()">
		</form>
<?php 
    } elseif($tabletype=='specialsale'){
?>    
        <form name="f3" method="post" action="<?php echo $url;?>">
		 <h2> Add a specialsale</h2>
		 <p style="color:blue">Notice: The specialsaleID will be automatically generated</p>
		 <table>
		       <tr>
		           <td>productID:</td>
				   <td><input type="text" name="productID"></td>
			   </tr>
			   <tr>
			       <td>salesdiscount:</td>
				   <td><input type="text" name="salesdiscount"></td>
			   </tr>
			   <tr>
			       <td>startdate:</td>
				   <td><input type="text" name="startdate"></td>
			   </tr>
			   <tr>
			       <td>enddate</td>
				   <td><input type="text" name="enddate"></td>
			   </tr>
			  
		</table>
		<input type="hidden" name="choose">
		<p id="specialsaleerrormessage" style="color:red"></p>
		<input type="button" value="submit" onclick="specialsalesubmit()">
		</form>
<?php
    }
?>
				  
			   



</body>
</html>