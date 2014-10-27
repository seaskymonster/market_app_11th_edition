<?php session_start();

?>

<!DOCYTPE html>
<html>
<body>
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
<?php 
  $tabletype=$_GET['tabletype'];
  $url = "adminoperation.php?type=add&tabletype=$tabletype";
  if ($tabletype=='user'){
 ?>
<form name="f1" method="post" action="<?php echo $url; ?>">
      <h2> Add a user</h2>
	  <p>Notice: The userID will be automatically generated</p>
	  <table>
	         <tr> 
			     <td>username:</td>
				 <td><input type="text" name="username"></td>
			 </tr>
			 <tr>
			     <td>password:</td>
				 <td><input type="text" name="password"></td>
			 </tr>
			 <tr>
			     <td>usertype:</td>
				 <td><input type="text" name="usertype"></td>
			 </tr>
	  </table>
	  <p id="usererrormessage"style="color:red">Please enter the enployee type as: 'admin' for Administrator, 'salem' for Salesmanager, 'manager' for Manager</p>
	  <input type="button" value="submit" onclick="usersubmit()">
</form>
<?php
 } elseif($tabletype=='employee'){
 ?>
 <form name="f2" method="post" action="<?php echo $url;?>">
      <h2> Add a employee</h2>
	  <p> Notice:The employeeID will be automatically generated</p>
	  <table>
	         <tr>
			     <td>firstname:</td>
				 <td><input type="text" name="firstname"></td>
		     </tr>
			 <tr>
			     <td>lastname:</td>
				 <td><input type="text" name="lastname"></td>
			 </tr>
			 <tr>
			     <td>age:</td>
				 <td><input type="text" name="age"></td>
			 </tr>
			 <tr> 
			     <td>salary:</td>
				 <td><input type="text" name="salary"></td>
			 </tr>
			 <tr>
			     <td>employeetype:</td>
				 <td><input type="text" name="employeetype"></td>
			 </tr>
			 <tr> 
                 <td>userID:</td>
                 <td><input type="text" name="userID"></td>
             </tr>
     		 	 
       </table>
	   <p id="employeeerrormessage" style="color:red"></p>
	   <input type="button" value="submit" onclick="employeesubmit()">
 </form>
 <?php 
 }
 ?>
</body>
</html>