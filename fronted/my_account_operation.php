<?php session_start();


if(isset($_POST['action'])){
$action=$_POST['action'];
}

if($action=='changepassword'){
                   if(isset($_POST['oldpassword'])&&(isset($_POST['newpassword']))&&(isset($_POST['customerID']))){
				        $customerID=$_POST['customerID'];
						$oldpassword=$_POST['oldpassword'];
						$newpassword=$_POST['newpassword'];
						
						$sql="select * from customer where customerID='$customerID' and password='$oldpassword'";
						$con=mysql_connect("localhost:3306","root","");
						if(!$con){
						      die('Could not connect:'. mysql_error());
						}
						mysql_select_db("logindb",$con);
						$result=mysql_query($sql);
						if(mysql_num_rows($result)==0){
						      echo"Wrong Password! Please Input Again";
							  mysql_close($con);
							  return;
						}else{
						     $sql="Update customer set password='$newpassword' where customerID='$customerID'";
							 if(mysql_query($sql)){
							     mysql_close($con);
								 echo"change password successfully!";
							 }else{
							     mysql_close($con);
								 echo"Error:Change password";
							   }
						 }
					}
}
						
				  
?>
