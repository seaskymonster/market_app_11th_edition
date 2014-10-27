<?php session_start();

?>

<!DOCTYPE html>
<html>
<head>
     <script>
	      function  logout(){
		      if(confirm("Are you sure to log out?")==false){
			     return;
			   }
			   location.href="logout.php";
			   }
		  function viewtable(){
		        d1=document.getElementById("div1");
				d2=document.getElementById("div2");
				d3=document.getElementById("div3");
				d4=document.getElementById("div4");
				d1.style.display="block";
				d2.style.display="none";
				d3.style.display="none";
				d4.style.display="none";
			}
		  function categorytable(){
		        d1=document.getElementById("div1");
				d2=document.getElementById("div2");
				d3=document.getElementById("div3");
				d4=document.getElementById("div4");
				d1.style.display="none";
				d2.style.display="block";
				d3.style.display="none";
				d4.style.display="none";
			}
		 function producttable(){
		        d1=document.getElementById("div1");
				d2=document.getElementById("div2");
				d3=document.getElementById("div3");
				d4=document.getElementById("div4");
				d1.style.display="none";
				d2.style.display="none";
				d3.style.display="block";
				d4.style.display="none";
			}
		 function specialsaletable(){
		        d1=document.getElementById("div1");
				d2=document.getElementById("div2");
				d3=document.getElementById("div3");
				d4=document.getElementById("div4");
				d1.style.display="none";
				d2.style.display="none";
				d3.style.display="none";
				d4.style.display="block";
			}
		function addcategory(){
		        location.href="sale_insert.php?tabletype=category";
		    }
		function changecategory(){
		        location.href="sale_change.php?tabletype=category";
			}
		function deletecategory(){
						location.href="sale_delete.php?tabletype=category";
			}
		function addproduct(){
						location.href="sale_insert.php?tabletype=product";
			}
		function changeproduct(){
						location.href="sale_change.php?tabletype=product";
			}
		function deleteproduct(){
						location.href="sale_delete.php?tabletype=product";
			}
		function addspecialsale(){
						location.href="sale_insert.php?tabletype=specialsale";
			}
		function changespecialsale(){
						location.href="sale_change.php?tabletype=specialsale";
			}
		function deletespecialsale(){
						location.href="sale_delete.php?tabletype=specialsale";
			}
	 </script>
</head>
<body>
     <div style="float:right">
	      <input type="button" value="logout" onclick="logout()">
	 </div>
          <input type="button" value="View All Tables" onclick="viewtable()"><br><br>
		  <input type="button" value="Edit Category Table" onclick="categorytable()"><br><br>
		  <input type="button" value="Edit Product Table" onclick="producttable()"><br><br>
		  <input type="button" value="Edit Specialsale Table" onclick="specialsaletable()"><br><br>
	 <div id="div1" style="display:block">
          <h2>Product Category Table</h2>
          <table>
              <tr>
                   <th>categoryID</th>
                   <th>categoryname</th>
                   <th>categorydescription</th>
              </tr>
		<?php 
            $sql="SELECT*from productcategory";
            $con=mysql_connect("localhost:3306","root","");
             if(!$con){
                 die("cannot connect".mysql_error());
             }
             mysql_select_db("logindb",$con);
             $result=mysql_query($sql);
             while($row=mysql_fetch_assoc($result)){
                   echo"<tr>";
                   echo"<td>".$row['productcategoryID']."</td>";
      			   echo"<td>".$row['productcategoryname']."</td>";   
                   echo"<td>".$row['productcategorydescription']."</td>";
                   echo"</tr>";
			 }
			 mysql_close($con);
		?>
		</table>
		<br><br>
		<h2>Product Table</h2>
		<table>
              <tr>
                   <th>productID</th>
                   <th>productcategoryID</th>
                   <th>productname</th>
				   <th>productdescription</th>
				   <th>productimage</th>
				   <th>productprice</th>
              </tr>
		<?php 
            $sql="SELECT*from product";
            $con=mysql_connect("localhost:3306","root","");
             if(!$con){
                 die("cannot connect".mysql_error());
             }
             mysql_select_db("logindb",$con);
             $result=mysql_query($sql);
             while($row=mysql_fetch_assoc($result)){
                   echo"<tr>";
                   echo"<td>".$row['productID']."</td>";
      			   echo"<td>".$row['productcategoryID']."</td>";   
                   echo"<td>".$row['productname']."</td>";
				   echo"<td>".$row['productdescription']."</td>";
      			   echo"<td>".$row['productimage']."</td>";   
                   echo"<td>".$row['productprice']."</td>";
                   echo"</tr>";
			 }
			 mysql_close($con);
		?>
		</table>
		<br><br>
		<h2>Specialsale Table</h2>
		<table>
              <tr>
                   <th>specialsaleID</th>
                   <th>productID</th>
                   <th>salesdiscount</th>
				   <th>startdate</th>
				   <th>enddate</th>
              </tr>
		<?php 
            $sql="SELECT*from specialsale";
            $con=mysql_connect("localhost:3306","root","");
             if(!$con){
                 die("cannot connect".mysql_error());
             }
             mysql_select_db("logindb",$con);
             $result=mysql_query($sql);
             while($row=mysql_fetch_assoc($result)){
                   echo"<tr>";
                   echo"<td>".$row['specialsaleID']."</td>";
      			   echo"<td>".$row['productID']."</td>";   
                   echo"<td>".$row['salesdiscount']."</td>";
				   echo"<td>".$row['startdate']."</td>";
      			   echo"<td>".$row['enddate']."</td>";   
                   echo"</tr>";
			 }
			 mysql_close($con);
		?>
		</table>
		<br><br><br>
		</div>
	 <div id="div2" style="display:none">
	 
	 <h2>Product Category Table</h2>
          <table>
              <tr>
                   <th>categoryID</th>
                   <th>categoryname</th>
                   <th>categorydescription</th>
              </tr>
		<?php 
            $sql="SELECT*from productcategory";
            $con=mysql_connect("localhost:3306","root","");
             if(!$con){
                 die("cannot connect".mysql_error());
             }
             mysql_select_db("logindb",$con);
             $result=mysql_query($sql);
             while($row=mysql_fetch_assoc($result)){
                   echo"<tr>";
                   echo"<td>".$row['productcategoryID']."</td>";
      			   echo"<td>".$row['productcategoryname']."</td>";   
                   echo"<td>".$row['productcategorydescription']."</td>";
                   echo"</tr>";
			 }
			 mysql_close($con);
		?>
		</table>
		<br><br><br><br>
		<form name="admin" method="post">
		     <input type="button" value="Add New Category" onclick="addcategory()">
			 <input type="button" value="Change Category" onclick="changecategory()">
			 <input type="button" value="Delete Category" onclick="deletecategory()">
		</form>
		</div>
     <div id="div3" style="display:none">
	 <h2>Product Table</h2>
		<table>
              <tr>
                   <th>productID</th>
                   <th>productcategoryID</th>
                   <th>productname</th>
				   <th>productdescription</th>
				   <th>productimage</th>
				   <th>productprice</th>
              </tr>
		<?php 
            $sql="SELECT*from product";
            $con=mysql_connect("localhost:3306","root","");
             if(!$con){
                 die("cannot connect".mysql_error());
             }
             mysql_select_db("logindb",$con);
             $result=mysql_query($sql);
             while($row=mysql_fetch_assoc($result)){
                   echo"<tr>";
                   echo"<td>".$row['productID']."</td>";
      			   echo"<td>".$row['productcategoryID']."</td>";   
                   echo"<td>".$row['productname']."</td>";
				   echo"<td>".$row['productdescription']."</td>";
      			   echo"<td>".$row['productimage']."</td>";   
                   echo"<td>".$row['productprice']."</td>";
                   echo"</tr>";
			 }
			 mysql_close($con);
		?>
		</table>
       <br><br><br><br>
	   <form name="admin"method="post">
			<input type="button" value="Add New Product"onclick="addproduct()"/>
			<input type="button" value="Change Product"onclick="changeproduct()"/>
			<input type="button" value="Delete Product"onclick="deleteproduct()"/>
		</form>
		</div>
	 <div id="div4" style="display:none">
	 <h2>Specialsale Table</h2>
		<table>
              <tr>
                   <th>specialsaleID</th>
                   <th>productID</th>
                   <th>salesdiscount</th>
				   <th>startdate</th>
				   <th>enddate</th>
              </tr>
		<?php 
            $sql="SELECT*from specialsale";
            $con=mysql_connect("localhost:3306","root","");
             if(!$con){
                 die("cannot connect".mysql_error());
             }
             mysql_select_db("logindb",$con);
             $result=mysql_query($sql);
             while($row=mysql_fetch_assoc($result)){
                   echo"<tr>";
                   echo"<td>".$row['specialsaleID']."</td>";
      			   echo"<td>".$row['productID']."</td>";   
                   echo"<td>".$row['salesdiscount']."</td>";
				   echo"<td>".$row['startdate']."</td>";
      			   echo"<td>".$row['enddate']."</td>";   
                   echo"</tr>";
			 }
			 mysql_close($con);
		?>
		</table>
		<br><br><br>
        <form name="admin"method="post">
			<input type="button" value="Add New Specialsale"onclick="addspecialsale()"/>
			<input type="button" value="Change Specialsale"onclick="changespecialsale()"/>
			<input type="button" value="Delete Specialsale"onclick="deletespecialsale()"/>
		</form>
		</div>

		
</body>
</html>