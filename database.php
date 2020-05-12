<?php
$link = mysqli_connect('localhost', 'phpmyadmin', '23121973', 'database');
    if (!$link) {
          die("Connection failed: " . mysqli_connect_error());
    }
?>
