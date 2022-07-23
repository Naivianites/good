<?php
$host = "localhost";
$username = "root";
$password = "12345";
$db_name = "qoute";
$conn = mysqli_connect($host, $username, $password, "$db_name");

if(!$conn){
    echo "Not Connected";
}

?>