<?php
include_once("dbconfig.php");//Database connection
$id = $_GET['id'];

$conn->query("DELETE FROM  allstudents WHERE id= $id");

if($conn->affected_rows){
    header("Location: index.php");
}
?>