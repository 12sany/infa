<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection error: ".$conn->connect_error);
    $conn->close();
    header('Location:'.'auth.php');
    exit();
}
$conn->query("USE thepigtables;");
$half_hour = 60*30;
$count = $conn->query("SELECT COUNT(*) FROM users;");
if (!empty($count) && $count->num_rows > 0) {
	$res = $conn->query('SELECT id, datetime FROM users;');
	$ptr = $conn->query('SELECT CURRENT_TIMESTAMP();');
	$ptr = $ptr->fetch_array();
    while ($row = $res->fetch_assoc()) {
        if (strtotime($ptr[0]) - strtotime($row["datetime"]) >= $half_hour) {
            $conn->query('UPDATE users SET token="0" WHERE id='.$row['id'].';');
        }
    }
}
$conn->close();
?>

<head>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/litera/bootstrap.min.css" rel="stylesheet" integrity="sha384-D/7uAka7uwterkSxa2LwZR7RJqH2X6jfmhkJ0vFPGUtPyBMF2WMq9S+f9Ik5jJu1" crossorigin="anonymous">
	<style>
		body {
 			position: fixed;
 			top: 50%;
 			left: 50%;
			margin-top: -250px;
 			margin-left: -145px;
            background-image: url(https://demiart.ru/forum/uploads6/post-972989-1278263016.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
		}
	</style>
</head>
<body>
	<h1>The pig</h1><pre></pre>
	<b>Sign in</b><pre></pre>
	<form action="post.php" method="post">
  	  <div class="form-group">
	     <label for="exampleInputEmail1">Login</label>
 	     <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter login">
      </div>
      <div class="form-group">
       	 <label for="exampleInputPassword1">Password</label>
      	 <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
 	  <input type="submit" class="btn btn-primary" value="Submit">
 	  <a href="signup.html" style="padding-left: 140px">Sign up</a>
	</form>
</body>