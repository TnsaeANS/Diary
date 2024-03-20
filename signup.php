<!DOCTYPE html>
<html>
<head>
  <title>SIGN UP</title>
  <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
     <form class="signup" method="post" action="signup.php">
       <h2>SIGN UP</h2>

          <label>Name</label>
          <input type="text" 
                 name="name" 
                 placeholder=""
                 value=""><br>

          <label>User Name</label>
          <input type="text" 
                 name="uname" 
                 placeholder=""
                 value=""><br>

          <label>Email</label>
          <input type="text" 
                 name="email" 
                 placeholder=""
                 value=""><br>

          <label>Password</label>
          <input type="password" 
                 name="password" 
                 placeholder=""><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder=""><br>

       <button class="signup-btn" type="signup" name="submit">Sign Up</button>
       <a href="login.php" class="ca">Already have an account? Log in</a>
     </form>
</body>
</html>


<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $re_password = $_POST['re_password'];

  if (empty($name) || empty($uname) || empty($email) || empty($password) || empty($re_password)) {
    header("Location: signup.php?error=Please fill in all the fields&name=$name&uname=$uname&email=$email");
    exit();
  } elseif ($password !== $re_password) {
    header("Location: signup.php?error=The confirmation password does not match&name=$name&uname=$uname&email=$email");
    exit();
  } else {
    $sql = "INSERT INTO users(`user_name`, `password`, `name`, `email`) VALUES ('$uname', '$password', '$name', '$email')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header("Location: login.php?success=Account created successfully");
      exit();
    } else {
      echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
    }
  }
}
?>