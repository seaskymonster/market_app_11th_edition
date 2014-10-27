<?php session_start();
    $type=$_GET['type'];
	$tabletype=$_GET['tabletype'];
	
	if($tabletype=='user'){
	          if($type=='add'){
						       $username=$_POST['username'];
						       $password=$_POST['password'];
						       $usertype=$_POST['usertype'];
							   $sql="INSERT into user(username, password, usertype) values('$username','$password','$usertype')";
							   $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							            die('Could not connect:'.mysql_error());
							   }
							   mysql_select_db("logindb",$con);
							   if(mysql_query($sql)){
							                        echo"Insert successfully!<br>";
													echo"Please click ";
													$url='http://localhost:1337/hw31/admin.php';
													echo"<a href='$url'>here</a>to go back to the adminstrator homepage";
							    }else{
								     echo"insert error";
								}
								mysql_close($con);		 
		      }
			 if($type=='delete'){
							   $userchoose=$_POST['deletechoose'];
							   $sql="DELETE from user where userID='$userchoose'";
							   $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							          die("Cannnot connect:".mysql_error());
								}
							   mysql_select_db("logindb",$con);
							   if(mysql_query($sql)){
							      echo"Delete succssfully!<br>";
								  echo"Please click ";
								  $url="http://localhost:1337/hw31/admin.php";
								  echo"<a href='$url'>here</a>to got back to adminstrator homepage";
								}else{ 
								  echo"delete error";
								}
								mysql_close($con);
			 }
			 if($type=='change'){
			                 $userchoose=$_POST['userID'];
							 $username=$_POST['username'];
							 $password=$_POST['password'];
							 $usertype=$_POST['usertype'];
							 $sql="update user set username='$username',password='$password',usertype='$usertype'where userID='$userchoose'";
							 $con=mysql_connect("localhost:3306","root","");
							 if(!$con){
							            die('Could not connect:'.mysql_error());
							   }
							 mysql_select_db("logindb",$con);
							 if(mysql_query($sql)){
							                        echo"Update successfully!<br>";
													echo"Please click ";
													$url='http://localhost:1337/hw31/admin.php';
													echo"<a href='$url'>here</a>to go back to the adminstrator homepage";
							 }else{
								     echo"update error";
								}
						      mysql_close($con);		 
			}			
								
    }
	elseif($tabletype=='employee'){
	         if($type=='add'){
			                  $firstname=$_POST['firstname'];
							  $lastname=$_POST['lastname'];
							  $age=$_POST['age'];
							  $salary=$_POST['salary'];
							  $employeetype=$_POST['employeetype'];
							  $userID=$_POST['userID'];
							  $sql="INSERT into employee(firstname,lastname,age,salary,employeetype,userID) values('$firstname','$lastname','$age','$salary','$employeetype','$userID')";
							  $con=mysql_connect('localhost:3306','root','');
							  if(!$con){
							         die('Could not connect:'.mysql_error());
							  }
							  mysql_select_db("logindb",$con);
							  if(mysql_query($sql)){
							    echo"Insert successfully<br>";
								echo"Please click ";
								$url="http://localhost:1337/hw31/admin.php";
								echo"<a href= '$url'>here</a> to go back to the administrator homepage";
							   }
							  else{
							    echo"insert error";
			                    }
							  mysql_close($con);
				}
			if($type=='delete'){
							   $employeechoose=$_POST['deletechoose'];
							   $sql="DELETE from employee where employeeID='$employeechoose'";
							   $con=mysql_connect("localhost:3306","root","");
							   if(!$con){
							       die("Cannnot connect:".mysql_error());
								}
							   mysql_select_db("logindb",$con);
							   if(mysql_query($sql)){
							      echo"Delete succssfully!<br>";
								  echo"Please click ";
								  $url="http://localhost:1337/hw31/admin.php";
								  echo"<a href='$url'>here</a>to got back to adminstrator homepage";
								}else{ 
								  echo"delete error";
								}
								mysql_close($con);
			}
			if($type=='change'){
			                 $employeechoose=$_POST['employeeID'];
							 $firstname=$_POST['firstname'];
							 $lastname=$_POST['lastname'];
							 $age=$_POST['age'];
							 $salary=$_POST['salary'];
							 $employeetype=$_POST['employeetype'];
							 $userID=$_POST['userID'];
							 $sql="update employee set firstname='$firstname',lastname='$lastname',age='$age',salary='$salary',employeetype='$employeetype',userID='$userID'where employeeID='$employeechoose'";
							 $con=mysql_connect("localhost:3306","root","");
							 if(!$con){
							            die('Could not connect:'.mysql_error());
							   }
							 mysql_select_db("logindb",$con);
							 if(mysql_query($sql)){
							                        echo"Update successfully!<br>";
													echo"Please click ";
													$url='http://localhost:1337/hw31/admin.php';
													echo"<a href='$url'>here</a>to go back to the adminstrator homepage";
							 }else{
								     echo"update error";
								}
						      mysql_close($con);
	      }
				
				
    }


?>