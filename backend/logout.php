<?php session_start();
session_destroy();
echo 'Log out successfully!<br/>';
echo "The browser will jump to login page in 3 seconds...<br/>if it not work, please click ";
$url = 'http://localhost:1337/hw31/prelogin.html';
echo "<a href='$url'>here</a>";
echo "<script language='javascript'>";
echo "setTimeout(\"window.location.href='$url'\",3000)";
echo "</script>";
?>