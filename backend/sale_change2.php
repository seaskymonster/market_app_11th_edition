<?php session_start();
?>

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
           $changechoose=$_POST['changechoose'];
		   $url="saleoperation.php?type=change&tabletype=$tabletype";
	if ($tabletype=='category'){
       ?>
             <form name="f1" method="post" action="<?php echo $url; ?>">
             <?php 
	             $sql="select *from productcategory where productcategoryID='$changechoose'";
			     $con=mysql_connect("localhost:3306","root","");
			     if(!$con){
			          die('cannot connect:'.mysql_error());
			      }
			     mysql_select_db("logindb",$con);
			     $result=mysql_query($sql);
			     if(!($row=mysql_fetch_assoc($result))){
			        echo"error";
			     }else{
			          $productcategorydescription=$row['productcategorydescription'];
				      $productcategoryname=$row['productcategoryname'];
				      
			     }
		   
		      
		    ?> 
	        <h2> Change a category</h2>
	        <table>
	            <tr>
			         <td>categoryID</td>
				     <td><?php echo $changechoose;?></td>
			    </tr>
	            <tr> 
			         <td>Productcategoryname</td>
				     <td><input type="text" name="productcategoryname" <?php echo"value='$productcategoryname'";echo">";?></td>
			    </tr>
			    <tr>
			         <td>password:</td>
				     <td><input type="text" name="productcategorydescription"<?php echo "value='$productcategorydescription'";echo">";?></td>
			    </tr>
			    
	        </table>
			     <input type="hidden" name="ID" <?php echo"value='$changechoose'";echo">";?>
	             <p id="categoryerrormessage"style="color:red"></p>
	             <input type="button" value="submit" onclick="categorysubmit()">
            </form>
<?php
      }elseif($tabletype=='product'){
?>
       
             <form name="f2" method="post" action="<?php echo $url; ?>">
             <?php 
	             $sql="select *from product where productID='$changechoose'";
			     $con=mysql_connect("localhost:3306","root","");
			     if(!$con){
			          die('cannot connect:'.mysql_error());
			      }
			     mysql_select_db("logindb",$con);
			     $result=mysql_query($sql);
			     if(!($row=mysql_fetch_assoc($result))){
			        echo"error";
			     }else{
			          $productcategoryID=$row['productcategoryID'];
				      $productname=$row['productname'];
					  $productdescription=$row['productdescription'];
					  $productimage=$row['productimage'];
					  $productprice=$row['productprice'];
					  
				      
			     }
		   
		      
		    ?> 
	        <h2> Change a product</h2>
	        <table>
	            <tr>
			         <td>productID</td>
				     <td><?php echo $changechoose;?></td>
			    </tr>
	            <tr> 
			         <td>ProductcategoryID</td>
				     <td><input type="text" name="productcategoryID" <?php echo"value='$productcategoryID'";echo">";?></td>
			    </tr>
			    <tr>
			         <td>Productname:</td>
				     <td><input type="text" name="productname"<?php echo "value='$productname'";echo">";?></td>
			    </tr>
				<tr>
			         <td>Productdescription:</td>
				     <td><input type="text" name="productdescription"<?php echo "value='$productdescription'";echo">";?></td>
			    </tr>
			    <tr>
			         <td>Productimage:</td>
				     <td><input type="text" name="productimage"<?php echo "value='$productimage'";echo">";?></td>
			    </tr>
				<tr>
			         <td>Productprice:</td>
				     <td><input type="text" name="productprice"<?php echo "value='$productprice'";echo">";?></td>
			    </tr>
	        </table>
			     <input type="hidden" name="ID" <?php echo"value='$changechoose'";echo">";?>
	             <p id="producterrormessage"style="color:red"></p>
	             <input type="button" value="submit" onclick="productsubmit()">
            </form>
<?php
      }elseif($tabletype=='specialsale'){
?>

          <form name="f3" method="post" action="<?php echo $url; ?>">
             <?php 
	             $sql="select *from specialsale where specialsaleID='$changechoose'";
			     $con=mysql_connect("localhost:3306","root","");
			     if(!$con){
			          die('cannot connect:'.mysql_error());
			      }
			     mysql_select_db("logindb",$con);
			     $result=mysql_query($sql);
			     if(!($row=mysql_fetch_assoc($result))){
			        echo"error";
			     }else{
			          $productID=$row['productID'];
				      $salesdiscount=$row['salesdiscount'];
					  $startdate=$row['startdate'];
					  $enddate=$row['enddate'];
					  
				      
			     }
		   
		      
		    ?> 
	        <h2> Change a product</h2>
	        <table>
	            <tr>
			         <td>specialsaleID</td>
				     <td><?php echo $changechoose;?></td>
			    </tr>
	            <tr> 
			         <td>ProductcategoryID</td>
				     <td><input type="text" name="productID" <?php echo"value='$productID'";echo">";?></td>
			    </tr>
			    <tr>
			         <td>Salediscount:</td>
				     <td><input type="text" name="salesdiscount"<?php echo "value='$salesdiscount'";echo">";?></td>
			    </tr>
				<tr>
			         <td>Startdate</td>
				     <td><input type="text" name="startdate"<?php echo "value='$startdate'";echo">";?></td>
			    </tr>
			    <tr>
			         <td>Enddate:</td>
				     <td><input type="text" name="enddate"<?php echo "value='$enddate'";echo">";?></td>
			    </tr>
				
	        </table>
			     <input type="hidden" name="ID" <?php echo"value='$changechoose'";echo">";?>
	             <p id="specialsaleerrormessage"style="color:red"></p>
	             <input type="button" value="submit" onclick="specialsalesubmit()">
            </form>
<?php 
         }
?>

</body>
</html>