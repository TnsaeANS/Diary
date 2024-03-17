<?php
include 'db_conn.php';
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
        
        <form method="post">
            <div class="search-bar">
            <input name="search" type="text" placeholder=" Search" />
            <button name="submit">Search</button>
        </div>
        </form>    

        
        
        <div class="actions">
            <p class="profile"><?php echo $_SESSION['name']; ?></p>
            <a class="logout" href="logout.php">Logout</a>
        </div>
        <button class="theme-toggle" onclick="location.href='?toggle_theme=true';">Tog</button>
    </div>

     <div class="homeBody">
     <h1 class="home">Hello, <?php echo $_SESSION['name']; ?></h1>
     <button  onclick="location.href='profile.php';">Profile</button>
     <button onclick="location.href='display.php';">Diary</button>
     </div>
<div>
            <table>
                <?php
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];
                    $user_id = $_SESSION['id'];
                    $sql="SELECT * FROM `crud` WHERE id='$search' AND user_id='$user_id'";
                    $result=mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        echo '<thead>
                            <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Content</th> 
                            </tr>  
                              </thead>';
                              
                            $row=mysqli_fetch_assoc($result);
                            echo '<tbody>
                            <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['title'].'</td>
                            <td>'.$row['content'].'</td> 
                            </tr>
                            </tbody>';
                    }else{
                        echo "There is no data like that.";
                    }
                    }
                ?>
            </table>    
        </div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
    exit();
}
?>
