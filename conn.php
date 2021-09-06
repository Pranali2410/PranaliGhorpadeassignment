<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "animal_db";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if($con)
{
echo "connection ok";
}
else
{
die("Connection failed".mysqli_connect_error());
}
?>
