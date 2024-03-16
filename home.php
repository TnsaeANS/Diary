<?php
session_start();
$theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'light';

if (isset($_GET['toggle_theme'])) {
    $theme = ($theme === 'light') ? 'dark' : 'light';
    $_SESSION['theme'] = $theme;
}
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $theme; ?>.css">
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
        <button class="theme-toggle" onclick="location.href='?toggle_theme=true';">Tog</button>
    </div>

     <div class="homeBody">
     <h1 class="home">Hello, <?php echo $_SESSION['name']; ?></h1>
     <button class="profile-button" onclick="location.href='profile.php';">Profile</button>
     <button onclick="location.href='display.php';">Diary</button>


</body>
</html>
<?php
} else {
    header("Location: login.php");
    exit();
}
?>
