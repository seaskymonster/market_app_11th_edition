<?session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <title>Manager</title>
   <script>
   var xmlHttp;
   //type                  function
   // 1                     viewtable
   // 2                     range
   // 3                     searchprodcut
   // 4                     showemployee 
   // 5                     searchspecialsale
   // 6                     serachspecialsaledate
   function logout(){
						if(confirm("Are you sure to log out?")==false){
							return;
						}
						location.href="logout.php";
	}
   function GetXmlHttpObject(){
						var xmlHttp=null;
						try{
 							// Firefox, Opera 8.0+, Safari
 							xmlHttp=new XMLHttpRequest();
						}
						catch (e){
 							//Internet Explorer
 							try{
  								xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  							}
 							catch (e){
  								xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  							}
 						}
						return xmlHttp;
					}
	
	function tableReply() { 
						if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
 							document.getElementById("viewtable").innerHTML=xmlHttp.responseText ;
 						} 
	}
	
	function showemployee(str){
	                     xmlHttp=GetXmlHttpObject();
						if (xmlHttp==null){
 							alert ("Browser does not support HTTP Request");
 							return;
 						}
						 
	                     var url="managersearch.php";
						 url=url+"?type="+"4";
						 url=url+"&employeetype="+str;
						 url=url+"&sid"+Math.random();
						 xmlHttp.onreadystatechange=tableReply;
						 xmlHttp.open("GET",url,true);
						 xmlHttp.send(null);
						 
	}
	function viewtable(field){
	                    xmlHttp=GetXmlHttpObject();
						if (xmlHttp==null){
 							alert ("Browser does not support HTTP Request");
 							return;
 						}
	                    var url="managersearch.php";
						url=url+"?type="+"1";
						url=url+"&tabletype="+field;
						url=url+"&sid"+Math.random();
						xmlHttp.onreadystatechange=tableReply;
						xmlHttp.open("GET",url,true);
						xmlHttp.send(null);
						
						d1 = document.getElementById("dive");
						d2 = document.getElementById("divp");
						d3 = document.getElementById("divs");
						if(field == "employee"){
							d1.style.display = "block";
							d2.style.display = "none";
							d3.style.display = "none";
						}else if(field == "product"){
							d1.style.display = "none";
							d2.style.display = "block";
							d3.style.display = "none";	
						}
						else if(field == "specialsale"){
							d1.style.display = "none";
							d2.style.display = "none";
							d3.style.display = "block";
						}else{
							d1.style.display = "none";
							d2.style.display = "none";
							d3.style.display = "none";
						}
						
	} 
	function searchrange(field){
	                        xmlHttp=GetXmlHttpObject();
						  if (xmlHttp==null){
 							alert ("Browser does not support HTTP Request");
 							return;
 						  }
	                      if(field=='employee'){
						         min=document.employee.minvalue.value;
							     max=document.employee.maxvalue.value;
						        if(min==''||max==''||isNaN(min)||isNaN(max)){
								          document.getElementById("employeeerrormessage1").innerHTML="Please input valid max/min pay range";
										  return;
								 }else{
								          document.getElementById("employeeerrormessage1").innerHTML='';
								   }
								 
						          tabletype="employee";
						  }else if(field == 'product'){
 							min = document.product.minvalue.value;
 							max = document.product.maxvalue.value;
 							if(min == '' || max == '' || isNaN(min) || isNaN(max)){
 								document.getElementById("producterrormessage1").innerHTML = "Please input valid max/min product price";
 								return;
 							}else{
 								document.getElementById("producterrormessage1").innerHTML = '';
 							}
 							tabletype = "product";
 						}else if(field == 'specialsale'){
 							min = document.specialsale.minvalue.value;
 							max = document.specialsale.maxvalue.value;
 							if(min == '' || max == '' || isNaN(min) || isNaN(max)){
 								document.getElementById("specialsaleerrormessage1").innerHTML = "Please input valid max/min product price";
 								return;
 							}else{
 								document.getElementById("specialsaleerrormessage1").innerHTML = '';
 							}
 							tabletype = "specialsale";
 						}
						var url="managersearch.php";
						url=url+"?type="+"2";
						url=url+"&tabletype="+tabletype;
						url=url+"&min="+min;
						url=url+"&max="+max;
						url=url+"&sid="+Math.random();
						xmlHttp.onreadystatechange=tableReply ;
						xmlHttp.open("GET",url,true);
						xmlHttp.send(null);
       }
	function searchproduct(field){
	                          xmlHttp=GetXmlHttpObject();
						      if (xmlHttp==null){
 							      alert ("Browser does not support HTTP Request");
 							  return;
 						       }
							  
							  
	                          var url="managersearch.php";
							  url=url+"?type="+"3";
							  url=url+"&tabletype="+"product";
	                          if(field=='categoryID'){
							          categoryID=document.product.categoryID.value;
									  if(categoryID==''||isNaN(categoryID)){
									      document.getElementById("producterrormessage2").innerHTML="Please input valid product category ID";
										  return;
									   }else{
									      document.getElementById("producterrormessage2").innerHTML='';
							                }
										var flag="1";
									   url=url+"&flag="+flag;
									   url=url+"&categoryID="+categoryID;
									   
							   }else if(field=='productname'){
							          productname=document.product.productname.value;
									  if(productname==''){
									      document.getElementById("producterrormessage3").innerHTML="Please input valid product name";
										  return;
									   }else{
									      document.getElementById("producterrormessage3").innerHTML='';
									   }
									   var flag="2";
									   url=url+"&flag="+flag;
									   url=url+"&productname="+productname;
									   
                                }									   
								       url=url+"&sid="+Math.random();
									   xmlHttp.onreadystatechange=tableReply ;
						               xmlHttp.open("GET",url,true);
						               xmlHttp.send(null);
	 }
	 
	 function searchspecialsale(field){
	                         xmlHttp=GetXmlHttpObject();
						     if (xmlHttp==null){
 							 alert ("Browser does not support HTTP Request");
 							 return;
							 }
							 
							  var url="managersearch.php";
							  url=url+"?type="+"5";
							  url=url+"&tabletype="+"specialsale";
	                          if(field=='productcategoryID'){
							          productcategoryID=document.specialsale.productcategoryID.value;
									  if(productcategoryID==''||isNaN(productcategoryID)){
									      document.getElementById("specialsaleerrormessage2").innerHTML="Please input valid product specialsale category ID";
										  return;
									   }else{
									      document.getElementById("specialsaleerrormessage2").innerHTML='';
							              }
									   var flag="1";
									   url=url+"&flag="+flag;
									   url=url+"&categoryID="+productcategoryID;
							   }else if(field=='productname'){
							          productname=document.specialsale.productname.value;
									  if(productname==''){
									      document.getElementById("specialsaleerrormessage3").innerHTML="Please input valid product name";
										  return;
									   }else{
									      document.getElementById("specialsaleerrormessage3").innerHTML='';
									   }
									   url=url+"productname="+productname;
									   var flag="2";
									   url=url+"&flag="+flag;
                                }									   
								       url=url+"&sid="+Math.random();
									   xmlHttp.onreadystatechange=tableReply ;
						               xmlHttp.open("GET",url,true);
						               xmlHttp.send(null);
	 }
   
   function searchsaledate(){
                            xmlHttp=GetXmlHttpObject();
						     if (xmlHttp==null){
 							 alert ("Browser does not support HTTP Request");
 							 return;
							 }
							 
                            startdate=document.specialsale.startdate.value;
							enddate=document.specialsale.enddate.value;
							reg=/^(\d{4})-(\d{1,2})-(\d{1,2})$/;
							if(startdate==''||enddate==''||!startdate.match(reg)||!enddate.match(reg)){
							      document.getElementById("specialsaleerrormessage4").innerHTML="Please input valid start or end date";
								  return;
						     }else{
							      document.getElementById("specialsaleerrormessage4").innerHTML='';
								}
							 tabletype="specialsale";
					         var url="managersearch.php";
						     url=url+"?type="+"6";
						     url=url+"&tabletype="+tabletype;
						     url=url+"&startdate="+startdate;
						     url=url+"&enddate="+enddate;
						     url=url+"&sid="+Math.random();
                             xmlHttp.onreadystatechange=tableReply ;
						     xmlHttp.open("GET",url,true);
						     xmlHttp.send(null);
   
   
   
   
   }							 
								 
	</script>
</head>
<body>
       <div style="float:right">
	       <input type="button" value="Log out" onclick="logout()">
	   </div>
	   <div>
	       <input type="button" value="User Table" onclick="viewtable('user')">
		   <input type="button" value="Employee Table" onclick="viewtable('employee')">
		   <input type="button" value="Category Table" onclick="viewtable('productcategory')">
		   <input type="button" value="Product Table" onclick="viewtable('product')">
		   <input type="button" value="Specialsale Table" onclick="viewtable('specialsale')">
	   </div>   
       <p id="viewtable"> Please click on the button to view tables</p>
	   <div id="dive" style="display:none">
	       <form name="employee">
		   <h3>Customize Search</h3>
		   <fieldset>
		   <legend align="center">Pay Range Search:</legend>
		   <table>
		       <tr>
			        <td>Pay Range:</td>
					<td>min</td>
					<td><input type="text" name="minvalue"></td>
					<td>max</td>
					<td><input type="text" name="maxvalue"></td>
					<td><input type="button" value="go search" onclick="searchrange('employee')"></td>
				</tr>
			</table>
			 <p id="employeeerrormessage1" style="color:red"></p>
			</fieldset>
			
			<fieldset>
			<legend align="center">Employee Type Search:</legend>
			    Select a User:
				<select name="users" onchange="showemployee(this.value)">
				<option value="0">please select</option>
				<option value="administrator">Administrator</option>
				<option value="manager">Manager</option>
				<option value="salesmanager">Sales Manager</option>
				</select>
				<p id="employeeerrormessage2" style="color:red"></p>
			</fieldset>
			</form>
		</div>
		
		<div id="divp" style="display:none">
		   <form name="product">
		   <h3>Customize Search</h3>
		   <fieldset>
		   <legend align="center">Product Price Range</legend>
		     Product Price Range:min<input type="text" name="minvalue">
			                     max<input type="text" name="maxvalue"><br>
		   <input type="button" value="search" onclick="searchrange('product')";<br>
		   <p id="producterrormessage1" style="color:red"></p>
           </fieldset>
		   
           <fieldset>
		   <legend align="center">Product category ID</legend>
		   Product Category ID;<input type="text" name="categoryID">
		   <input type="button" value="search" onclick="searchproduct('categoryID')"><br>
		   <p id="producterrormessage2" style="color:red"></p>
		   </fieldset>
		   
		   <fieldset>
		   <legend align="center">Product Name</legend>
		   Product Name:<input type="text" name="productname">
		   <input type="button" value="search" onclick="searchproduct('productname')">
		   <p id="producterrormessage3" style="color:red"></p>
		   </fieldset>
		   </form>
		</div>
		
		<div id="divs" style="display:none">
		   <form name="specialsale">
		   <h3>Customize Search</h3>
		   <fieldset>
		   <legend align="center">Price Range:</legend>
		   <table>
		       <tr>
			       <td>Product Price Range For Specialsale:</td>
				   <td>min</td>
				   <td><input type="text" name="minvalue"></td>
				   <td>max</td>
				   <td><input type="text" name="maxvalue"></td>
				   <td><input type="button" value="search" onclick="searchrange('specialsale')"><br>
			   </tr>
		    </table>
			<p id="specialsaleerrormessage1" style="color:red"></p>
			</fieldset>
			
			<fieldset>
			<legend align="center">Product Category Id</legend>
			Product Category ID:<input type="text" name="productcategoryID">
			<input type="button" value="search" onclick="searchspecialsale('productcategoryID')"><br>
			<p id="specialsaleerrormessage2" style="color:red"></p>
			</fieldset>
			
			<fieldset>
			<legend align="center">Product Name</legend>
			Product Name:<input type="text" name="productname">
			<input type="button" value="search" onclick="searchspecialsale('productname')"><br>
			<p id="specialsaleerrormessage3" style="color:red"></p>
			</fieldset>
			
			<fieldset>
			<legend align="center">Sale Date</legend>
			Sale Startdate:<input type="text" name="startdate">
			Sale Enddate:<input type="text" name="enddate">
			<p style="color:blue">Please input the date as format:yyyy-mm-dd, for example:2012-06-24</p>
			<input type="button" value="search" onclick="searchsaledate()"><br>
			<p id="specialsaleerrormessage4" style="color:red"></p>
			</fieldset>
			</form>
		</div>
		 
          		   
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
</body>
</html>