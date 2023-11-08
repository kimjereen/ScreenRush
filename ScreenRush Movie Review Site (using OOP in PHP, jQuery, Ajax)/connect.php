<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "screenrush_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
// echo "Connected";