<?php session_start();
echo"hello world";
$username=$_POST['username'];
$password=$_POST['password'];
$errormessage='';
$displayloginpage= TRUE;




var_dump($username);
var_dump($password);

if(strlen($username)==0&&strlen($password)==0){
$errormessage="Invalid Data";}


if(strlen($username==0)||strlen($password)==0){
$errormessage="Invalid Data";}

if(strlen($username)>0 && strlen($password)>0){
    // $errormessage="good";
     $con= mysql_connect("localhost:3306","root","");
	
	 
     if(!$con){echo" Cannot connect to the database";
	           exit;
	 }
     else{ echo"connect to the database";
	 }
	 mysql_select_db("logindb",$con);
	 
	 
	 $sql= "SELECT usertype from user where username='$username' and password='$password'";
	 $result=mysql_query($sql);
	 var_dump($result);
	 
	 if(!$result){
	             echo"could not query from database";
				 exit;
				 }
	 
	 if(!mysql_num_rows($result)){
	             echo" Wrong username and password";
				 }
	 else{
	        $row=mysql_fetch_assoc($result);
			
			
			$_SESSION['usertype']=$row['usertype'];
			$_SESSION['session time']=time();
			$displayloginpage= false;
			
			var_dump($_SESSION['usertype']);
			if($row['usertype']=='admin'){
			mysql_close($con);
			echo"<script>";
			echo"location.href='http://localhost:1337/hw31/admin.php'";
			echo"</script>";
			}
			
			if($row['usertype']=='salem'){
			mysql_close($con);
			echo"<script>";
			echo"location.href='http://localhost:1337/hw31/salesmanager.php'";
	        echo"</script>";
			}
			
			if($row['usertype']=='manager'){
			mysql_close($con);
			echo"<script>";
			echo"location.href='http://localhost:1337/hw31/manager.php'";
	        echo"</script>";
			}
		}
		
}	
			
if($displayloginpage){
	require "prelogin.html";

?>
	<p style="color:red">
		<?php
		echo $errormessage;
		?>
	</p>
<?php
		require 'postlogin.html';
	}	        
	


  






























?>