<?php

$servername= "localhost";
$username= "Arsema";
$password = "arsema1996";

$db_name = "diary_db";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}