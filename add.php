<html>
<form action="online.php" method="post">
</html>
<?php
$pass=$_POST['password'];
$login=$_POST['login'];

echo("salam");

$mysql= mysql_connect('localhost','root','root','turn');

if($mysql)
echo 'Соединение установлено.';
else
die('Ошибка подключения к серверу баз данных.');

$database = 'dbbase';
$selected = mysql_select_db($database, $mysql);
if($selected)
echo ' Подключение к базе данных прошло успешно.';
else
die(' База данных не найдена или отсутствует доступ.');









echo("Afasfa");



if ($mysql->connect_error) {
    die("Connection error: ".$mysql>connect_error);
    $mysql->close();
 header('Location: /indexerr.php');
    exit();
}

$result=$mysql->query ("SELECT*  FROM `start` WHERE  `login` = '$login'");
$user=$result-> fetch_assoc();
if ($user == null) {
 header('Location: /indexerr.php');
 die();
 }

 $hash=next($user);
 $hash=next($user);


if(!password_verify($pass,$hash)){
 header('Location: /indexerr.php');
die();
}



$mysql->query("UPDATE `start` SET `status`='online'
WHERE  `login`='$login'");



setcookie ("login",$login, time()+999*9999);
setcookie("password",$hash,time()+999*9999);
session_start();
$_SESSION["login"]=$login;
header('Location: /online.php');
$mysql->close();

?>
