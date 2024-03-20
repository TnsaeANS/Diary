<?php
include "db_conn.php";

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="navbar">
    <button onclick="location.href='home.php';" class="diary">Diary</button>
          <div class="actions">
               <p class="profile"><?php echo $_SESSION['user_name']; ?></p>
               <a class="logout" href="logout.php">Logout</a>
               <button class="theme-toggle" onclick="location.href='?toggle_theme=true';">Tog</button>
          </div>
    </div>
    <h2 class="pro">Profile Management</h2>
    


<div class="profile-container">
<h3 class="profile-title">Update Name and Password</h3>
    <form class ="profile-form" action="profile.php" method="post">
        <div class = "name">
            <label class="p" for="new_name">New Name:</label>
            <input type="text" name="new_name" required>
        </div>
        
        <br>
        <div class = "name">
            <label class="p" for="new_password">New Password:</label>
            <input type="password" name="new_password" required>
        </div>
        <br>
        <input class="submit" type="submit" name="update_profile" value="Update Profile">
    </form>
</div>

</body>
</html>
<?php
    

    if (isset($_POST['update_profile'])) {
        $new_name = $_POST['new_name'];
        $new_password = $_POST['new_password'];
        $id = $_SESSION['id'];

        $sql = "UPDATE users SET user_name = '$new_name', password = '$new_password' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['user_name'] = $new_name;
        } else {
            echo "Error updating profile: " . mysqli_error($conn);
        }
    }
}else{
    header("Location: login.php");
    exit();
}
    ?>