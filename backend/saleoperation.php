<?php session_start();



$type=$_GET['type'];
$tabletype=$_GET['tabletype'];

if($tabletype=='category'){
             if($type=='insert'){
			     $productcategoryname=$_POST['productcategoryname'];
				 $productcategorydescription=$_POST['productcategorydescription'];
				 $sql="INSERT into productcategory(productcategoryname,productcategorydescription) values('$productcategoryname','$productcategorydescription')";
				 $con=mysql_connect("localhost:3306","root","");
				 if(!$con){
				     die("cannot connect".mysql_error());
				  }
				 mysql_select_db("logindb",$con);
				 if(mysql_query($sql)){
				     echo"Update successfully!<br>";
					 echo"Please Click ";
					 $url="http://localhost:1337/hw31/salesmanager.php";
					 echo"<a href='$url'>here</a> to go back to the salesmanager homepage";
				 }else{
				     echo"Update error";
				   }
				   mysql_close($con);
			  }elseif($type=='delete'){
			     $deletechoose=$_POST['deletechoose'];
				 $sql="DELETE from productcategory where productcategoryID='$deletechoose'";
				 $con=mysql_connect("localhost:3306","root","");
				 if(!$con){
				    die("cannot connect".mysql_error());
				 }
				 mysql_select_db("logindb",$con);
				 if(mysql_query($sql)){
				    echo"Delete successfully<br>";
					echo"Please click ";
					$url="http://localhost:1337/hw31/salesmanager.php";
					echo"<a href='$url'>here</a> to go back to the salesmanager homepage";
				 }else{
				   echo"delete error";
				    }
				 mysql_close($con);
		       }elseif($type=='change'){
			     $changechoose=$_POST['ID'];
				 
				 $productcategoryname=$_POST['productcategoryname'];
				 $productcategorydescription=$_POST['productcategorydescription'];
				 var_dump($changechoose);
				 var_dump($productcategoryname);
				 var_dump($productcategorydescription);
				// $sql ="update productcategory set productcategoryname='$productcategoryname',productcategorydescription='$productcategorydescription' where productcategoryID ='$userSelected'";
                 $sql ="UPDATE productcategory set productcategoryname='$productcategoryname',productcategorydescription='$productcategorydescription' where productcategoryID='$changechoose'";
                 $con=mysql_connect("localhost:3306","root","");
				 if(!$con){
				    die("cannot connect".mysql_error());
				 }
				 mysql_select_db("logindb",$con);
				 if(mysql_query($sql)){
				    echo"Update successfully<br>";
					echo"Please click ";
					$url="http://localhost:1337/hw31/salesmanager.php";
					echo"<a href='$url'>here</a> to go back to the salesmanager homepage";
				 }else{
				   echo"update error";
				    }
				 mysql_close($con);
				}
}elseif($tabletype=='product'){
             if($type=='insert'){
			     $productcategoryID=$_POST['productcategoryID'];
				 $productname=$_POST['productname'];
				 $productdescription=$_POST['productdescription'];
				 $productimage=$_POST['productimage'];
				 $productprice=$_POST['productprice'];
				 
				 
				 $sql="INSERT into product(productcategoryID,productname,productdescription,productimage,productprice) values('$productcategoryID','$productname','$productdescription','$productimage','$productprice')";
				 $con=mysql_connect("localhost:3306","root","");
				 if(!$con){
				     die("cannot connect".mysql_error());
				  }
				 mysql_select_db("logindb",$con);
				 if(mysql_query($sql)){
				     echo"Update successfully!<br>";
					 echo"Please Click ";
					 $url="http://localhost:1337/hw31/salesmanager.php";
					 echo"<a href='$url'>here</a> to go back to the salesmanager homepage";
				 }else{
				     echo"Update error";
				   }
				   mysql_close($con);
			  }elseif($type=='delete'){
			     $deletechoose=$_POST['deletechoose'];
				 $sql="DELETE from product where productID='$deletechoose'";
				 $con=mysql_connect("localhost:3306","root","");
				 if(!$con){
				    die("cannot connect".mysql_error());
				 }
				 mysql_select_db("logindb",$con);
				 if(mysql_query($sql)){
				    echo"Delete successfully<br>";
					echo"Please click ";
					$url="http://localhost:1337/hw31/salesmanager.php";
					echo"<a href='$url'>here</a> to go back to the salesmanager homepage";
				 }else{
				   echo"delete error";
				 }
				 mysql_close($con);
		       }elseif($type=='change'){
			     $changechoose=$_POST['ID'];
	             $productcategoryID=$_POST['productcategoryID'];
				 $productname=$_POST['productname'];
				 $productdescription=$_POST['productdescription'];
				 $productimage=$_POST['productimage'];
				 $productprice=$_POST['productprice'];
		         $sql="UPDATE product set productcategoryID='$productcategoryID',productname='$productname',productdescription='$productdescription',productimage='$productimage',productprice='$productprice'where productID='$changechoose'";
			     $con=mysql_connect("localhost:3306","root","");
				 if(!$con){
				    die("cannot connect".mysql_error());
				 }
				 mysql_select_db("logindb",$con);
				 if(mysql_query($sql)){
				    echo"Update successfully<br>";
					echo"Please click ";
					$url="http://localhost:1337/hw31/salesmanager.php";
					echo"<a href='$url'>here</a> to go back to the salesmanager homepage";
				 }else{
				   echo"update error";
				 }
				 mysql_close($con);
                }
}elseif($tabletype=='specialsale'){
              if($type=='insert'){
			     //$speicalsaleID=$_POST['specialsaleID'];
				 $productID=$_POST['productID'];
				 $salesdiscount=$_POST['salesdiscount'];
				 $startdate=$_POST['startdate'];
				 $enddate=$_POST['enddate'];

				 $sql="INSERT into specialsale(productID,salesdiscount,startdate,enddate) values('$productID','$salesdiscount','$startdate','$enddate')";
				 $con=mysql_connect("localhost:3306","root","");
				 if(!$con){
				     die("cannot connect".mysql_error());
				  }
				 mysql_select_db("logindb",$con);
				 if(mysql_query($sql)){
				     echo"Update successfully!<br>";
					 echo"Please Click ";
					 $url="http://localhost:1337/hw31/salesmanager.php";
					 echo"<a href='$url'>here</a> to go back to the salesmanager homepage";
				 }else{
				     echo"Update error";
				   }
				   mysql_close($con);
			  }elseif($type=='delete'){
			     $deletechoose=$_POST['deletechoose'];
				 $sql="DELETE from specialsale where specialsaleID='$deletechoose'";
				 $con=mysql_connect("localhost:3306","root","");
				 if(!$con){
				    die("cannot connect".mysql_error());
				 }
				 mysql_select_db("logindb",$con);
				 if(mysql_query($sql)){
				    echo"Delete successfully<br>";
					echo"Please click ";
					$url="http://localhost:1337/hw31/salesmanager.php";
					echo"<a href='$url'>here</a> to go back to the salesmanager homepage";
				 }else{
				   echo"delete error";
				 }
				 mysql_close($con);
		       }elseif($type=='change'){
			     $changechoose=$_POST['ID'];
				 $productID=$_POST['productID'];
				 $salesdiscount=$_POST['salesdiscount'];
				 $startdate=$_POST['startdate'];
				 $enddate=$_POST['enddate'];
				 var_dump($changechoose);
				 var_dump($salesdiscount);
				 $sql="UPDATE specialsale set productID='$productID',salesdiscount='$salesdiscount',startdate='$startdate',enddate='$enddate'where specialsaleID='$changechoose'";
				 $con=mysql_connect("localhost:3306","root","");
				 if(!$con){
				     die("cannot connect".mysql_error());
				  }
				 mysql_select_db("logindb",$con);
				 if(mysql_query($sql)){
				     echo"Update successfully!<br>";
					 echo"Please Click ";
					 $url="http://localhost:1337/hw31/salesmanager.php";
					 echo"<a href='$url'>here</a> to go back to the salesmanager homepage";
				 }else{
				     echo"Update error";
				   }
				   mysql_close($con);
                 }				   
				 
				 
}           






?>


