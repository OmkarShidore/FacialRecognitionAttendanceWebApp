<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "root"; /* Password */
$dbname = "admin_details"; /* Database name */
$dbname2 = "employee_details";
$dbname3 = "employee_attendance";
$dbname4 = "main_attendance";

$con = mysqli_connect($host, $user, $password,$dbname);
$con2 = mysqli_connect($host, $user, $password,$dbname2);
$con3 = mysqli_connect($host, $user, $password,$dbname3);
$con4 = mysqli_connect($host, $user, $password,$dbname4);

// Check connection
/*if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}


// Check connection
if (!$con2) {
 die("Connection failed: " . mysqli_connect_error());
}


// Check connection
if (!$con3) {
 die("Connection failed: " . mysqli_connect_error());
}


// Check connection
if (!$con4) {
 die("Connection failed: " . mysqli_connect_error());
}*/