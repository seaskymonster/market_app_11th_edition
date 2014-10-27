<?php session_start();

?>

<html>
<head>
<script>
         function categorysubmit(){
		     errormessage="";
			 if(validateradiobutton(document.f1.changechoose)==false){
			   errormessage+="Please select a category to change.<br>";
			  }
			 if(errormessage==''){
			    document.f1.submit();
			 }else{
			    p=document.getElementById("categoryerrormessage");
				p.innerHTML=errormessage;
			  }
		     
		 }
		 
		 function productsubmit(){
		     errormessage="";
			 if(validateradiobutton(document.f2.changechoose)==false){
			   errormessage+="Please select a product to change.<br>";
			  }
			 if(errormessage==''){
			    document.f2.submit();
			 }else{
			    p=document.getElementById("producterrormessage");
				p.innerHTML=errormessage;
			  }
		     
		 }
			 function specialsalesubmit(){
		     errormessage="";
			 if(validateradiobutton(document.f3.changechoose)==false){
			   errormessage+="Please select a specialsale to change.<br>";
			  }
			 if(errormessage==''){
			    document.f3.submit();
			 }else{
			    p=document.getElementById("specialsaleerrormessage");
				p.innerHTML=errormessage;
			  }
		}  
			 function validateradiobutton(field){
			  var i=0;
			  for(i=0;i<field.length;i++){
			     if(field[i].checked)
				   break;
			   }
			   if(i==field.length)
			     return false;
				else
				  return true;
			  }
			  
		     
		 		 
			 
</script>
</head>
<body>
     <?php
	      $tabletype=$_GET['tabletype'];
		  $url="sale_change2.php?tabletype=$tabletype";
		  
		  if($tabletype=='category'){
		  
	 ?>
	      <form name="f1" method="post" action="<?php echo $url;?>">
		      <h2>Change a product category</h2>
			  <table>
			        <tr>
					    <th>Choose</th>
						<th>CategoryID</th>
						<th>Categoryname</th>
						<th>Categorydescription</th>
					</tr>
					<?php
					  $sql = "select * from productcategory";
						$con = mysql_connect('localhost:3306','root','');
						if (!$con) {
							die('Could not connect: ' . mysql_error());
						}
						mysql_select_db("logindb", $con);
						$res = mysql_query($sql);
						while ($row = mysql_fetch_assoc($res)) {
							echo "
						<tr>
							";
						    echo"<td>
							        <input type='radio'name='changechoose' value='".$row['productcategoryID']."'>
								 </td>";
							echo"<td>".$row['productcategoryID']."</td>";
							echo"<td>".$row['productcategoryname']."</td>";
							echo"<td>".$row['productcategorydescription']."</td>";
							echo"
						</tr>";
						}
					?>
				</table>
				<br>
				<br>
				<p id="categoryerrormessage" style="color:red"></p>
				<input type="button" value="submit" onclick="categorysubmit()">
	  </form>
	<?php
				}elseif($tabletype == 'product'){
				?>						     
		<form name="f2" method="post" action="<?php echo $url;?>">
		      <h2>Change a product</h2>
			  <table>
			        <tr>
					    <th>Choose</th>
						<th>ProductID</th>
						<th>ProductcategoryID</th>
						<th>Productname</th>
						<th>Productdescription</th>
						<th>Productiamge</th>
						<th>Productprice</th>
					</tr>
					<?php
					  $sql = "select * from product";
						$con = mysql_connect('localhost:3306','root','');
						if (!$con) {
							die('Could not connect: ' . mysql_error());
						}
						mysql_select_db("logindb", $con);
						$res = mysql_query($sql);
						while ($row = mysql_fetch_assoc($res)) {
							echo "
						<tr>
							";
						    echo"<td>
							        <input type='radio'name='changechoose' value='".$row['productID']."'>
								 </td>";
							echo"<td>".$row['productID']."</td>";
							echo"<td>".$row['productcategoryID']."</td>";
							echo"<td>".$row['productname']."</td>";
							echo"<td>".$row['productdescription']."</td>";
							echo"<td>".$row['productimage']."</td>";
							echo"<td>".$row['productprice']."</td>";
							echo"
						</tr>";
						}
					?>
				</table>
                <br>
				<br>
				<p id="producterrormessage" style="color:red"></p>
				<input type="button" value="submit" onclick="productsubmit()">
	  </form>
<?php
				}elseif($tabletype == 'specialsale'){
				?>						     
		<form name="f3" method="post" action="<?php echo $url;?>">
		      <h2>Change a specialsale</h2>
			  <table>
			        <tr>
					    <th>Choose</th>
						<th>SpecialsaleID</th>
						<th>ProductID</th>
						<th>Salesdiscount</th>
						<th>Startdate</th>
						<th>Enddate</th>
					</tr>
					<?php
					  $sql = "select * from specialsale";
						$con = mysql_connect('localhost:3306','root','');
						if (!$con) {
							die('Could not connect: ' . mysql_error());
						}
						mysql_select_db("logindb", $con);
						$res = mysql_query($sql);
						while ($row = mysql_fetch_assoc($res)) {
							echo "
						<tr>
							";
						    echo"<td>
							        <input type='radio'name='changechoose' value='".$row['specialsaleID']."'>
								 </td>";
							echo"<td>".$row['specialsaleID']."</td>";
							echo"<td>".$row['productID']."</td>";
							echo"<td>".$row['salesdiscount']."</td>";
							echo"<td>".$row['startdate']."</td>";
							echo"<td>".$row['enddate']."</td>";
							
							echo"
						</tr>";
						}
					?>
				</table>
                <br>
				<br>
				<p id="specialsaleerrormessage" style="color:red"></p>
				<input type="button" value="submit" onclick="specialsalesubmit()">
	  </form>
      <?php
				}
				?>
</body>
</html>