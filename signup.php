<!DOCTYPE html>
<html>
<head>
  <title>SIGN UP</title>
  <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
     <form class="signup" method="post">
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

          <label>Password</label>
          <input type="password" 
                 name="password" 
                 placeholder=""><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder=""><br>

       <button type="submit" name="submit">Sign Up</button>
       <a href="login.php" class="ca">Already have an account? Log in</a>
     </form>
</body>
</html>


<?php
     include "db_conn.php";
     

     if (isset($_POST['submit'])) {
          $name = $_POST['name'];
          $uname = $_POST['uname'];
          $password = $_POST['password'];
          $re_password = $_POST['re_password'];
          echo "aasaa";
               $sql = "INSERT INTO users(`name`, `user_name`, `password`) VALUES ('$name', '$uname', '$password')";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                    // header("Location: home.php");
                    echo "Account created successfully";
               }else {
                    echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
               }
          }
?>