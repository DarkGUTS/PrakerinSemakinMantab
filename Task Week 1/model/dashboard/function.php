<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_mmovdb";
$conn = mysqli_connect($host, $user, $pass, $db);

function takeOneData($sql) {
	global $conn;
	$query = mysqli_query($conn, $sql);
	$result = mysqli_fetch_assoc($query);
	return $result;
}

?>