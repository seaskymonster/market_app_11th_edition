<?php session_start();
?>


<html>
<head>
      <script>
	     function usersubmit(){
		           errormessage='';
				   if(validateradiobutton(document.f1.deletechoose)==false){
				    
					errormessage+="Please select an user to delete";
				   }
				  
				   
				   if(errormessage==''){
				       document.f1.submit();
				   } else{
				       p=document.getElementById("usererrormessage");
					   p.innerHTML=errormessage;
					}
		  }
				   
        function employeesubmit(){
		         errormessage='';
				 if(validateradiobutton(document.f2.deletechoose)==false){
				      errormessage+="Please select an employee to delete";
				 }
				 if(errormessage==''){
				      document.f2.submit();
				 } else{ 
				     p=document.getElementById("employeeerrormessage");
					 p.innerHTML=errormessage;
				    }
		  }
		 function validateradiobutton(field){
		          var i=0;
				  for(i=0;i<field.length;i++){
				      if (field[i].checked)
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
	   $url="adminoperation.php?type=delete&tabletype=$tabletype";
       if($tabletype=='user'){
      ?>
          <h2>Delete a user</h2>
          <form name="f1" method="post" action="<?php echo $url;?>">	
               <table>
                     <tr>
                         <th>choose</th>
						 <th>username</th>
						 <th>password</th>
						 <th>userIDea</th>
					 </tr>
				<?php
				  $sql="SELECT * from user";
				  $con=mysql_connect("localhost:3306","root","");
				  if(!$con){
				      die('Cannnot connect:'. mysql_error());
				  }
				  mysql_select_db("logindb",$con);
				  $result= mysql_query($sql);
				  while($row=mysql_fetch_assoc($result)){
				     echo"
					     <tr>";
					 echo"<td><input type='radio'name='deletechoose' value='".$row['userID']."'>
					      </td>";
				     echo"<td>".$row['username']."</td>";
					 echo"<td>".$row['password']."</td>";
					 echo"<td>".$row['usertype']."</td>";
					 echo"<td>".$row['userID']."</td>";
					 echo"
					      </tr>";
						  }
				?>
				</table>
			    <p id="usererrormessage" style="color:red"></p>
				<input type="button" value="go to next" onclick="usersubmit()">
		  </form>
	 <?php 
        }elseif($tabletype=='employee'){
      ?>
	    <h2> Delete a employee</h2>
		<form name="f2" method="post" action="<?php echo $url;?>">
		    <table>
			       <tr>
				       <th>choose</th>
					   <th>firstname</th>
					   <th>lastname</th>
					   <th>age</th>
					   <th>salary</th>
					   <th>employeetype</th>
					   <th>userID</th>
					   <th>employeeID</th>
					</tr>
			 <?php 
			      $sql="select *from employee";
				  $con= mysql_connect("localhost:3306","root","");
				  if(!$con){
				     die("Cannot connect:".mysql_error());
				   }
				   mysql_select_db("logindb",$con);
				   $result=mysql_query($sql);
				   while($row=mysql_fetch_assoc($result)){
				         echo"
						     <tr>
							 ";
						echo"<td>
						    <input type='radio' name='deletechoose' value='".$row['employeeID']."'>
							</td>";
						echo"<td>".$row['firstname']."</td>";
						echo"<td>".$row['lastname']."</td>";
						echo"<td>".$row['age']."</td>";
						echo"<td>".$row['salary']."</td>";
						echo"<td>".$row['employeetype']."</td>";
						echo"<td>".$row['userID']."</td>";
						echo"<td>".$row['employeeID']."</td>";
						echo"
						    </tr>
							";
					   }
				?>
			</table>
			<p id="employeeerrormessage" style="color:red"></p>
			<input type="button" value="submit" onclick="employeesubmit()">
	</form>
<?php
}
?>
	  
					   
					 
	
                         						 
	  
     


</body>
</html>