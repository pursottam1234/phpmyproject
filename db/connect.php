<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "phpmyproject";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
    die("Connection failed");
}
?>