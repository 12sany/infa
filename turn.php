<?php
$login=$_COOKIE['login'];
$mysql=new mysqli('localhost','root','','turn');
$mysql->query("INSERT INTO `queue` (`login`)
VALUES('$login')");
header('Location: /queue.php');
?>

