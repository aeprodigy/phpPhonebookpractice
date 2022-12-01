t<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phone_book";

$con = new mysqli($servername, $username, $password, $dbname);

if($con->connect_error){
    die("connection failed: ". $con->connect_error);
}
echo "connected successfully";

/*
make connection. the instance of the class or object you are creating is $con





*/

?>