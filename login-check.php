<?php 
session_start(); 
include "db_conn.php";



if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
	$error_message= "";

	if (empty($username)) {
		$error_message= "User Name is required";
		header("Location: login.php");
	}else if(empty($password)){
		$error_message= "Password is required";
		header("Location: login.php");
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";

		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $username && $row['password'] === $password) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home.php");
		        exit();
            }else{
				$error_message = "Incorect User name or password";
				header("Location: login.php");
			}
		}else{
			$error_message= "Incorect User name or password";
			header("Location: login.php");
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}


