<?php
include_once "database.php";

$id = $_GET["id"];

$results = mysqli_query($conn, "DELETE FROM `qoutes` WHERE id = $id");

if($results){
    header("location:index.php");
}else{
    echo "not work";
}
?>