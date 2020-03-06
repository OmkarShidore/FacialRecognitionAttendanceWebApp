<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "root"; /* Password */
$dbname = "employee_access_details"; /* Database name */
$dbname2="employee_attendance";
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

$con2 = mysqli_connect($host, $user, $password,$dbname2);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}