<?php


$servername="localhost";
$username="root";
$password="";
$my_database="service_provider";

$conn=new mysqli($servername,$username,$password,$my_database);

if($conn->connect_error)
{
	die("Connection failed:". $conn->connect_error);
}

echo("Connected successfully");

?>

