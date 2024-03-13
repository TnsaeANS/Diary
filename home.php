<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <div class="navbar">
          <div class="diary">Diary</div>
          <div class="search-bar">
               <input type="text" placeholder=" Search" />
               <button>Search</button>
          </div>
          <div class="actions">
               <p class="profile"><?php echo $_SESSION['name']; ?></p>
               <a class="logout" href="logout.php">Logout</a>
          </div>
    </div>
     <div class="homeBody">
     <h1 class="home">Hello, <?php echo $_SESSION['name']; ?></h1>
     <button class="profile-button" onclick="location.href='profile.php';">Profile</button>
     </div>
</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>

