
var xmlHttp;
function continueshopping() {
	window.location.href = "index.php";
}

function checkout(type) {
	if (type == '1') {
		window.location.href = "checkout.php";
	} else if (type == '2') {
		window.location.href = "login.php?type=visitor";
	}
}

function addshopcart(productID, productquantity, customerID) {
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert("Browser does not support HTTP Request");
		return;
	}

	var url = "shop_cart_operation.php";
	xmlHttp.onreadystatechange = reload;
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send("action=addshopcart&productID=" + productID + "&productquantity=" + productquantity + "&customerID=" + customerID);
}

function GetXmlHttpObject() {
	var xmlHttp = null;
	try {
		// Firefox, Opera 8.0+, Safari
		xmlHttp = new XMLHttpRequest();
	} catch (e) {
		//Internet Explorer
		try {
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}

function viewshopcart() {
	if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
		document.getElementById("itemquantity").innerHTML = xmlHttp.responseText;
	}
}

function reload() {
	if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
		window.location.reload();
	}
}

function removeshopcart(productID, customerID) {
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert("Browser does not support HTTP Request");
		return;
	}

	var url = "shop_cart_operation.php";
	xmlHttp.onreadystatechange = reload;
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send("action=removeshopcart&productID=" + productID + "&customerID=" + customerID);
}

function addtocart(productID, customerID) {
	productquantity = document.addcart.productquantity.value;
	addshopcart(productID, productquantity, customerID);
}

function showitemsquantity(customerID) {
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert("Browser does not support HTTP Request");
		return;
	}

	var url = "shop_cart_operation.php";
	xmlHttp.onreadystatechange = viewshopcart;
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send("action=showitemsquantity&customerID=" + customerID);

}

function updateshopcart(productID, customerID) {
	productquantity = document.getElementById("modifyquantity" + productID).value;
	if(isNaN(productquantity) || productquantity =='' ||productquantity =='0'){
		return;
	}else if (isNeedToUpdate() == false) {
		return;
	} else {
		xmlHttp = GetXmlHttpObject();
		if (xmlHttp == null) {
			alert("Browser does not support HTTP Request");
			return;
		}

		var url = "shop_cart_operation.php";
		xmlHttp.onreadystatechange = reload;
		xmlHttp.open("POST", url, true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.send("action=updateshopcart&productID=" + productID + "&productquantity=" + productquantity + "&customerID=" + customerID);
	}

}

function isNeedToUpdate() {
	return true;
}

function removeall(customerID) {
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert("Browser does not support HTTP Request");
		return;
	}

	var url = "shop_cart_operation.php";
	xmlHttp.onreadystatechange = reload;
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send("action=removeall&customerID=" + customerID);
}

function clearall(customerID) {
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert("Browser does not support HTTP Request");
		return;
	}

	var url = "shop_cart_operation.php";
	xmlHttp.onreadystatechange = viewshopcart;
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send("action=removeall&customerID=" + customerID);
}

function seemoredetail(productID) {
	window.location.href = "item_page.php?productID=" + productID;
}

function gobackmyaccount(){
	window.location.href = "myaccount.php";
}
function ajaxclearall(customerID) {
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert("Browser does not support HTTP Request");
		return;
	}

	var url = "shop_cart_operation.php";
	xmlHttp.onreadystatechange = viewshopcart;
	xmlHttp.open("POST", url, false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send("action=removeall&customerID=" + customerID);
}
function searchaddshopcart(productID, productquantity, customerID) {
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null) {
		alert("Browser does not support HTTP Request");
		return;
	}

	var url = "shop_cart_operation.php";
	xmlHttp.onreadystatechange = viewshopcart;
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send("action=addshopcart&productID=" + productID + "&productquantity=" + productquantity + "&customerID=" + customerID);
}
