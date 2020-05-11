<?php
session_start();
$login=$_SESSION["login"];
echo($login);
$mysql=new mysqli('localhost','root','','turn');
$mysql->query("UPDATE `start` SET `status`='offline'
WHERE  `login`='$login'");
SetCookie("login","");
SetCookie("password","");
header('Location: /index.php');
?>