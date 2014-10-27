<?php session_start();
      $type=$_GET['type'];
	  if($type=='1'){
	                $tabletype=$_GET['tabletype'];
					var_dump($tabletype);
					if($tabletype=='user'){
					           $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								$sql="SELECT*from user";
								$result=mysql_query($sql);
								echo"<h2>User Table</h2>
								     <table>
									      <tr>
										      <th>username</th>
											  <th>password</th>
											  <th>usertype</th>
											  <th>userID</th>
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['username']."</td>";
									 echo"<td>".$row['password']."</td>";
									 echo"<td>".$row['usertype']."</td>";
									 echo"<td>".$row['userID']."</td>";
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con);
								 
					 }elseif($tabletype=='employee'){
                              $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								$sql="SELECT*from employee";
								$result=mysql_query($sql);
								echo"<h2>Employee Table</h2>
								     <table>
									      <tr>
										      <th>firstname</th>
											  <th>lastname</th>
											  <th>age</th>
											  <th>salary</th>
											  <th>employeetype</th>
											  <th>userID</th>
											  <th>employeeID</th>
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['firstname']."</td>";
									 echo"<td>".$row['lastname']."</td>";
									 echo"<td>".$row['age']."</td>";
									 echo"<td>".$row['salary']."</td>";
									 echo"<td>".$row['employeetype']."</td>";
									 echo"<td>".$row['userID']."</td>";
									 echo"<td>".$row['employeeID']."</td>";
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con);
						
					}elseif($tabletype=='productcategory'){
                              $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								$sql="SELECT*from productcategory";
								$result=mysql_query($sql);
								echo"<h2>Product Category Table</h2>
								     <table>
									      <tr>
										      <th>productcategoryID</th>
											  <th>productcategoryname</th>
											  <th>productcategorydescription</th>
											
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['productcategoryID']."</td>";
									 echo"<td>".$row['productcategoryname']."</td>";
									 echo"<td>".$row['productcategorydescription']."</td>";
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con); 
					
					}elseif($tabletype=='product'){
                              $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								$sql="SELECT*from product";
								$result=mysql_query($sql);
								echo"<h2>Product Table</h2>
								     <table>
									      <tr>
										      <th>productID</th>
											  <th>productcategoryID</th>
											  <th>productname</th>
											  <th>productdescription</th>
											  <th>productimage</th>
											  <th>productprice</th>
											  
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['productID']."</td>";
									 echo"<td>".$row['productcategoryID']."</td>";
									 echo"<td>".$row['productname']."</td>";
									 echo"<td>".$row['productdescription']."</td>";
									 echo"<td>".$row['productimage']."</td>";
									 echo"<td>".$row['productprice']."</td>";
									
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con);
					}elseif($tabletype=='specialsale'){
                              $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								$sql="SELECT*from specialsale";
								$result=mysql_query($sql);
								echo"<h2>Special Sale Table</h2>
								     <table>
									      <tr>
										      <th>specialsaleID</th>
											  <th>productID</th>
											  <th>salesdiscount</th>
											  <th>startdate</th>
											  <th>enddate</th>
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['specialsaleID']."</td>";
									 echo"<td>".$row['productID']."</td>";
									 echo"<td>".$row['salesdiscount']."</td>";
									 echo"<td>".$row['startdate']."</td>";
									 echo"<td>".$row['enddate']."</td>";
									 
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con);
					 }

    }elseif($type=='2'){
	                    $min=$_GET['min'];
						$max=$_GET['max'];
						$tabletype=$_GET['tabletype'];
						var_dump($min);
						var_dump($max);
						var_dump($tabletype);
						
					    if($tabletype=='employee'){
						       $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								$sql="SELECT*from employee where salary>='$min' and salary<='$max'";
								$result=mysql_query($sql);
								echo"<h2>Employee Table</h2>
								     <table>
									      <tr>
										      <th>firstname</th>
											  <th>lastname</th>
											  <th>age</th>
											  <th>salary</th>
											  <th>employeetype</th>
											  <th>userID</th>
											  <th>employeeID</th>
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['firstname']."</td>";
									 echo"<td>".$row['lastname']."</td>";
									 echo"<td>".$row['age']."</td>";
									 echo"<td>".$row['salary']."</td>";
									 echo"<td>".$row['employeetype']."</td>";
									 echo"<td>".$row['userID']."</td>";
									 echo"<td>".$row['employeeID']."</td>";
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con);
						                   
						}elseif($tabletype=='product'){
                              $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								$sql="SELECT*from product where productprice>='$min' and productprice<='$max'";
								$result=mysql_query($sql);
								echo"<h2>Product Table</h2>
								     <table>
									      <tr>
										      <th>productID</th>
											  <th>productcategoryID</th>
											  <th>productname</th>
											  <th>productdescription</th>
											  <th>productimage</th>
											  <th>productprice</th>
											  
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['productID']."</td>";
									 echo"<td>".$row['productcategoryID']."</td>";
									 echo"<td>".$row['productname']."</td>";
									 echo"<td>".$row['productdescription']."</td>";
									 echo"<td>".$row['productimage']."</td>";
									 echo"<td>".$row['productprice']."</td>";
									
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con);
	                    }elseif($tabletype=='specialsale'){
                              $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								$sql="SELECT*from specialsale,product where product.productID=specialsale.productID and productprice<='$max' and productprice>='$min'";
								$result=mysql_query($sql);
								echo"<h2>Special Sale Table</h2>
								     <table>
									      <tr>
										      <th>productID</th>
											  <th>productcategoryID</th>
											  <th>productname</th>
											  <th>productdescription</th>
											  <th>productimage</th>
											  <th>productprice</th>
										      <th>specialsaleID</th>
											  <th>productID</th>
											  <th>salesdiscount</th>
											  <th>startdate</th>
											  <th>enddate</th>
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['productID']."</td>";
									 echo"<td>".$row['productcategoryID']."</td>";
									 echo"<td>".$row['productname']."</td>";
									 echo"<td>".$row['productdescription']."</td>";
									 echo"<td>".$row['productimage']."</td>";
									 echo"<td>".$row['productprice']."</td>";
									 echo"<td>".$row['specialsaleID']."</td>";
									 echo"<td>".$row['productID']."</td>";
									 echo"<td>".$row['salesdiscount']."</td>";
									 echo"<td>".$row['startdate']."</td>";
									 echo"<td>".$row['enddate']."</td>";
									 
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con);
					 }
	
	}elseif($type=='3'){ 
	                     $flag=$_GET['flag'];
						 var_dump($flag);
						 $tabletype=$_GET['tabletype'];
						 if($flag=='1'){
	                                 $categoryID=$_GET['categoryID'];
						             $productname='';
						 }elseif($flag=='2'){
						             $categoryID='';
						             $productname=$_GET['productname'];
						 }
						 
						 var_dump($categoryID);
						 var_dump($productname);
						 $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								if(strlen($categoryID)>0 &&strlen($productname)==0){
								$sql="SELECT*from product where productcategoryID='$categoryID'";
								}elseif(strlen($categoryID)==0 && strlen($productname)>0){
								$sql="SELECT*from product where productname='$productname'";
								}
								$result=mysql_query($sql);
								echo"<h2>Product Table</h2>
								     <table>
									      <tr>
										      <th>productID</th>
											  <th>productcategoryID</th>
											  <th>productname</th>
											  <th>productdescription</th>
											  <th>productimage</th>
											  <th>productprice</th>
											  
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['productID']."</td>";
									 echo"<td>".$row['productcategoryID']."</td>";
									 echo"<td>".$row['productname']."</td>";
									 echo"<td>".$row['productdescription']."</td>";
									 echo"<td>".$row['productimage']."</td>";
									 echo"<td>".$row['productprice']."</td>";
									
									 echo"</tr>";
								 }
								 echo"</table>";
						         mysql_close($con);
						
	
	}elseif($type=='4'){
	                          $employeetype=$_GET['employeetype'];
							  var_dump($employeetype);
						       $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								$sql="SELECT*from employee where employeetype='$employeetype'";
								$result=mysql_query($sql);
								echo"<h2>Employee Table</h2>
								     <table>
									      <tr>
										      <th>firstname</th>
											  <th>lastname</th>
											  <th>age</th>
											  <th>salary</th>
											  <th>employeetype</th>
											  <th>userID</th>
											  <th>employeeID</th>
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['firstname']."</td>";
									 echo"<td>".$row['lastname']."</td>";
									 echo"<td>".$row['age']."</td>";
									 echo"<td>".$row['salary']."</td>";
									 echo"<td>".$row['employeetype']."</td>";
									 echo"<td>".$row['userID']."</td>";
									 echo"<td>".$row['employeeID']."</td>";
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con);					   
	
	
	
	}elseif($type=='5'){
	                  $flag=$_GET['flag'];
						 var_dump($flag);
						 $tabletype=$_GET['tabletype'];
						 if($flag=='1'){
	                                 $categoryID=$_GET['categoryID'];
						             $productname='';
						 }elseif($flag=='2'){
						             $categoryID='';
						             $productname=$_GET['productname'];
						 }
					$con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								if(strlen($categoryID)>0 &&strlen($productname)==0){
								$sql="SELECT*from specialsale,product where product.productID=specialsale.productID and productcategoryID='$categoryID'";
								}elseif(strlen($categoryID)==0 && strlen($productname)>0){
								$sql="SELECT*from specialsale,product where product.productID=specialsale.productID and productname='$productname'";
								}
								$result=mysql_query($sql);
								echo"<h2>Special Sale Table</h2>
								     <table>
									      <tr>
										      <th>productID</th>
											  <th>productcategoryID</th>
											  <th>productname</th>
											  <th>productdescription</th>
											  <th>productimage</th>
											  <th>productprice</th>
										      <th>specialsaleID</th>
											  <th>productID</th>
											  <th>salesdiscount</th>
											  <th>startdate</th>
											  <th>enddate</th>
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['productID']."</td>";
									 echo"<td>".$row['productcategoryID']."</td>";
									 echo"<td>".$row['productname']."</td>";
									 echo"<td>".$row['productdescription']."</td>";
									 echo"<td>".$row['productimage']."</td>";
									 echo"<td>".$row['productprice']."</td>";
									 echo"<td>".$row['specialsaleID']."</td>";
									 echo"<td>".$row['productID']."</td>";
									 echo"<td>".$row['salesdiscount']."</td>";
									 echo"<td>".$row['startdate']."</td>";
									 echo"<td>".$row['enddate']."</td>";
									 
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con);
					 
	
	}elseif($type=='6'){
	                         $tabletype=$_GET['tabletype'];
					         $startdate=$_GET['startdate'];
					         $enddate=$_GET['enddate'];
					         $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							           die('could not connect:'.mysql_error());
							    }
								mysql_select_db("logindb",$con);
								
								$sql="SELECT*from specialsale,product where product.productID=specialsale.productID and startdate>='$startdate' and enddate<='$enddate'";
								
								$result=mysql_query($sql);
								echo"<h2>Special Sale Table</h2>
								     <table>
									      <tr>
										      <th>productID</th>
											  <th>productcategoryID</th>
											  <th>productname</th>
											  <th>productdescription</th>
											  <th>productimage</th>
											  <th>productprice</th>
										      <th>specialsaleID</th>
											  <th>productID</th>
											  <th>salesdiscount</th>
											  <th>startdate</th>
											  <th>enddate</th>
										  </tr>";
								 while($row=mysql_fetch_array($result)){
								     echo"<tr>";
									 echo"<td>".$row['productID']."</td>";
									 echo"<td>".$row['productcategoryID']."</td>";
									 echo"<td>".$row['productname']."</td>";
									 echo"<td>".$row['productdescription']."</td>";
									 echo"<td>".$row['productimage']."</td>";
									 echo"<td>".$row['productprice']."</td>";
									 echo"<td>".$row['specialsaleID']."</td>";
									 echo"<td>".$row['productID']."</td>";
									 echo"<td>".$row['salesdiscount']."</td>";
									 echo"<td>".$row['startdate']."</td>";
									 echo"<td>".$row['enddate']."</td>";
									 
									 echo"</tr>";
								 }
								 echo"</table>";
								 mysql_close($con);
	
	
	
	}


?>