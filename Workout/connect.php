<?php

$conn = mysqli_connect('localhost','root','','workoutdb');

 if (!$conn) {
 	die(' Failed to connect, check your net '.mysql_error());
 	   
 }

?>