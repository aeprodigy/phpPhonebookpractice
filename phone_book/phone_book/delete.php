<?php
include("auth.php");
include("db_connect.php");

$id=$_REQUEST['id'];

// delete using 'id' in your where clause
$sql = "DELETE from new_record Where id = $id";
$query = mysqli_query($con, $sql);



header("Location: table.php");
?>