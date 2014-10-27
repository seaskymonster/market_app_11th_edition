<?php session_start();
?>

<html>
<head>
     <script>
	     function usersubmit(){
		     errormessage='';
			 if(document.f1.username.value==''){
			    errormessage+="Please input username.<br>";
			  }
			 if(document.f1.password.value==''){
			    errormessage+="Please input password.<br>";
			 }
			 if(document.f1.usertype.value!='admin' && document.f1.usertype.value!='salem' &&document.f1.usertype.value!='manager'){
			    errormessage+="Please input correct usertype";
			 }
			 if(errormessage==''){
			 document.f1.submit();
			 }else{
			   p=document.getElementById("usererrormessage");
			   p.innerHTML= errormessage;
			 }
			 
		 }
		 
		 function employeesubmit(){
		    errormessage='';
			if(document.f2.firstname.value==''){
			   errormessage+="Please input firstname.<br>";
			 }
		    if(document.f2.lastname.value==''){
			   errormessage+="Please input lastname.<br>";
			 }
			if(document.f2.age.value==''||isNaN(document.f2.age.value)){
			   errormessage+="Please input valid age.<br>";
			 }
			if(document.f2.salary.value==''||isNaN(document.f2.salary.value)){
			   errormessage+="Please input valid salary.<br>";
			 }
			if(document.f2.employeetype.value==''){
			   errormessage+="Please input employeetype.<br>";
			 }
			if(document.f2.userID.value==''||isNaN(document.f2.userID.value)){
			   errormessage+="Please input valid userID.<br>";
			 }
			 if(errormessage==''){
			    document.f2.submit();
			 }else{
			    p=document.getElementById("employeeerrormessage");
				p.innerHTML=errormessage;
			}
		}
			 
		 
	 
	 </script>
</head>

<body>
      <?php 
	     $tabletype=$_GET['tabletype'];
		 $changechoose=$_POST['changechoose'];
		 $url="adminoperation.php?type=change&tabletype=$tabletype";
  if ($tabletype=='user'){
       ?>
             <form name="f1" method="post" action="<?php echo $url; ?>">
             <?php 
	             $sql="select *from user where userID='$changechoose'";
			     $con=mysql_connect("localhost:3306","root","");
			     if(!$con){
			          die('cannot connect:'.mysql_error());
			      }
			     mysql_select_db("logindb",$con);
			     $result=mysql_query($sql);
			     if(!($row=mysql_fetch_assoc($result))){
			        echo"error";
			     }else{
			          $username=$row['username'];
				      $password=$row['password'];
				      $usertype=$row['usertype'];
			     }
		   
		      
		    ?> 
	        <h2> Change a user</h2>
	        <table>
	            <tr>
			         <td>userID</td>
				     <td><?php echo $changechoose;?></td>
			    </tr>
	            <tr> 
			         <td>username:</td>
				     <td><input type="text" name="username" <?php echo"value='$username'";echo">";?></td>
			    </tr>
			    <tr>
			         <td>password:</td>
				     <td><input type="text" name="password"<?php echo "value='$password'";echo">";?></td>
			    </tr>
			    <tr>
			         <td>usertype:</td>
				     <td><input type="text" name="usertype"<?php echo "value='$usertype'";echo">";?></td>
			    </tr>
	        </table>
			     <input type="hidden" name="userID" <?php echo"value='$changechoose'";echo">";?>
	             <p id="usererrormessage"style="color:red">Please enter the enployee type as: 'admin' for Administrator, 'salem' for Salesmanager, 'manager' for Manager</p>
	             <input type="button" value="submit" onclick="usersubmit()">
            </form>
<?php
      }elseif($tabletype=='employee'){
?>
            <form name="f2" method="post" action="<?php echo $url;?>">
			<?php 
			     $sql="SELECT *from employee where employeeID='$changechoose'";
				 $con=mysql_connect("localhost:3306","root","");
				 if(!$con){
				      die("cannot connect".mysql_error());
				  }
				  mysql_select_db("logindb",$con);
				  $result=mysql_query($sql);
				  if(!($row=mysql_fetch_assoc($result))){
				      echo"error!!";
				   }else{
				     $firstname=$row['firstname'];
					 $lastname=$row['lastname'];
					 $age=$row['age'];
					 $salary=$row['salary'];
					 $employeetype=$row['employeetype'];
					 $userID=$row['userID'];
					 }
		      ?>
			  <h2>Change an employee</h2>
			  <table> 
			          <tr>
					      <td>employeeID</td>
						  <td><?php echo $changechoose?></td>
					  </tr>
					  <tr> 
			              <td>firstname:</td>
				          <td><input type="text" name="firstname" <?php echo"value='$firstname'";echo">";?></td>
			          </tr>
			          <tr>
			              <td>lastname:</td>
				          <td><input type="text" name="lastname"<?php echo "value='$lastname'";echo">";?></td>
			          </tr>
			          <tr>
			              <td>age:</td>
				          <td><input type="text" name="age"<?php echo "value='$age'";echo">";?></td>
			         </tr>
			          <tr> 
			              <td>salary:</td>
				          <td><input type="text" name="salary" <?php echo"value='$salary'";echo">";?></td>
			          </tr>
			          <tr>
			              <td>employeetype:</td>
				          <td><input type="text" name="employeetype"<?php echo "value='$employeetype'";echo">";?></td>
			          </tr>
			          <tr>
			              <td>userID:</td>
				          <td><input type="text" name="userID"<?php echo "value='$userID'";echo">";?></td>
			         </tr>
			  </table>
			  <input type="hidden" name="employeeID" <?php echo"value='$changechoose'";echo">";?>
			  <p id="employeeerrormessage" style="color:red"></p>
			  <input type="button" value="submit" onclick="employeesubmit()">
			  </form>
			 <?php
			  }
			  ?>
    				


</body>
</html>