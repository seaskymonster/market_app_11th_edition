<?php session_start();
session_destroy();
echo "Log out successfully!</br>";
echo "The browser will jump to login page in 3 secondes...<br> if it not work, please click";
$url='index.php';
echo"<a href='$url'> here</a>";
?>