<?php session_start();
     
	 
	 echo"administrator homepage.<br>";
	 
	 
?>



<!DOCTYPE html>
 <html>
      <head>
            <script>
			function viewtable(){
						d1 = document.getElementById("div1");
						d2 = document.getElementById("div2");
						d3 = document.getElementById("div3");
						d1.style.display = "block";
						d2.style.display = "none";
						d3.style.display = "none";	
					}
			function usertable(){
						d1 = document.getElementById("div1");
						d2 = document.getElementById("div2");
						d3 = document.getElementById("div3");
						d1.style.display = "none";
						d2.style.display = "block";
						d3.style.display = "none";	
					}
			function employeetable(){
						d1 = document.getElementById("div1");
						d2 = document.getElementById("div2");
						d3 = document.getElementById("div3");
						d1.style.display = "none";
						d2.style.display = "none";
						d3.style.display = "block";	
			         }
			function adduser(){
						location.href="admin_insert_change.php?tabletype=user";
					}
			function changeuser(){
						location.href="admin_change.php?tabletype=user";
					}
			function deleteuser(){
						location.href="admin_delete.php?tabletype=user";
					}
			function addemployee(){
						location.href="admin_insert_change.php?tabletype=employee";
					}
			function changeemployee(){
						location.href="admin_change.php?tabletype=employee";
					}
			function deleteemployee(){
						location.href="admin_delete.php?tabletype=employee";
					}
			function logout(){
						if(confirm("Are you sure to log out?")==false){
							return;
						}
						location.href="logout.php";
					}
	        </script>
 
      </head>
      <body>
	       <div style="float:right">
		       <input type="button" value="Log Out" onClick="logout()">
		   </div>
           <div style="width:150px;float:left;border:solid black 3px;padding: 15px;">
					<input type="button"value="View All Tables"onclick="viewtable()" /><br /><br />
					<input type="button"value="Edit User Table"onclick="usertable()" /><br /><br />
					<input type="button"value="Edit Employee Table"onclick="employeetable()" />
			</div>
		   <div style="width:700px;float:right;text-align: center">
				<div id="div1">
					<h2>User Table</h2>
				<table style='display:inline;width:200px' border=1>
					<tr>
    					<th>username</th>
    					<th>password</th>
    					<th>usertype</th>
    					<th>userID</th>
  					</tr>
			        <?php
			            $sql="select * from user";
			            $con=mysql_connect("localhost:3306","root","");
			            if(!$con){
			                     die("could not connect:" .mysql_error());
			            }
			            mysql_select_db("logindb",$con);
			            $result=mysql_query($sql);
			
			            while($row=mysql_fetch_assoc($result)){
			                  echo"<tr>";
			                  echo"<td>".$row['username']."</td>";
			                  echo"<td>".$row['password']."</td>";
			                  echo "<td>".$row['usertype']."</td>";
			                  echo "<td>".$row['userID']."</td>";
			                  echo "</tr>";
			            }
			            mysql_close($con);
			        ?>
				</table>
				
				    <h2>Employee Table</h2>
		             <table style='display:inline;width:200px' border=1>
					 <tr>
    					<th>firstname</th>
    					<th>lastname</th>
    					<th>age</th>
    					<th>salary</th>
    					<th>employeetype</th>
    					<th>userID</th>
    					<th>employeeID</th>
  					</tr>
		            <?php
		                $sql = "select * from employee";
		                $con = mysql_connect('localhost:3306','root','');
		                if(!$con){
			                      die('Could not connect: ' . mysql_error());
		                }
		                mysql_select_db("logindb",$con);
		                $res = mysql_query($sql);
		                  //require "preadministrator.html";
		                while($row = mysql_fetch_assoc($res)){

			                                                 echo "<tr>";
			                                                 echo "<td>".$row['firstname']."</td>";
			                                                 echo "<td>".$row['lastname']."</td>";
			                                                 echo "<td>".$row['age']."</td>";
			                                                 echo "<td>".$row['salary']."</td>";
			                                                 echo "<td>".$row['employeetype']."</td>";
			                                                 echo "<td>".$row['userID']."</td>";
			                                                 echo "<td>".$row['employeeID']."</td>";
			                                                 echo "</tr>";
		                }
		                                 //require "postadministrator.html";
		                mysql_close($con);
		            ?>
		           </table>
			    </div>
                <div id="div2"style="display:none">
			<h2>User Table</h2>
			<table style='display:inline;width:200px' border=1>
					<tr>
    					<th>username</th>
    					<th>password</th>
    					<th>usertype</th>
    					<th>userID</th>
  					</tr>
		<?php
		$sql = "select * from user";
		$con = mysql_connect('localhost:3306','root','');
		if(!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("logindb",$con);
		$res = mysql_query($sql);
		//require "preadministrator.html";
		while($row = mysql_fetch_assoc($res)){

			echo "<tr>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['password']."</td>";
			echo "<td>".$row['usertype']."</td>";
			echo "<td>".$row['userID']."</td>";
			echo "</tr>";
		}
		//require "postadministrator.html";
		mysql_close($con);
		?>
		</table>
		<br />
		<br />
		<form name="admin"method="post">
			<input type="button" value="add new user"onclick="adduser()"/>
			<input type="button" value="change user"onclick="changeuser()"/>
			<input type="button" value="delete user"onclick="deleteuser()"/>
		</form>
		</div>
		
		        <div id="div3"style="display:none">
			<h2>Employee Table</h2>
			<table style='display:inline;width:200px' border=1>
					<tr>
    					<th>firstname</th>
    					<th>lastname</th>
    					<th>age</th>
    					<th>salary</th>
    					<th>employeetype</th>
    					<th>userID</th>
    					<th>employeeID</th>
  					</tr>
		<?php
		$sql = "select * from employee";
		$con = mysql_connect('localhost:3306','root','');
		if(!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("logindb",$con);
		$res = mysql_query($sql);
		//require "preadministrator.html";
		while($row = mysql_fetch_assoc($res)){

			echo "<tr>";
			echo "<td>".$row['firstname']."</td>";
			echo "<td>".$row['lastname']."</td>";
			echo "<td>".$row['age']."</td>";
			echo "<td>".$row['salary']."</td>";
			echo "<td>".$row['employeetype']."</td>";
			echo "<td>".$row['userID']."</td>";
			echo "<td>".$row['employeeID']."</td>";
			echo "</tr>";
		}
		//require "postadministrator.html";
		mysql_close($con);
		?>
		</table>
		<br />
		<br />
		<form name="admin"method="post">
			<input type="button" value="add new employee"onclick="addemployee()"/>
			<input type="button" value="change employee"onclick="changeemployee()"/>
			<input type="button" value="delete employee"onclick="deleteemployee()"/>
		</form>
		</div>
		</div>
		
		</body>
	</html>
			
			
			
 
  