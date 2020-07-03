<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$dbServername="localhost";
$dbUsername="root";
$dbPassword="mark";
$dbName="website";

$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
