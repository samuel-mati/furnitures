<?php
$server="localhost";
$username="root";
$dbname="furnitures";
$password="";

$con= new mysqli($server,$username,$password,$dbname);

if($con->connect_error){
    die ("Connection failed: ".$con->connect_error);
}



?>