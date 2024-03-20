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
     <button class="profile-button" onclick="location.href='profile.php';">Profile</button>
     <button class="display-button" onclick="location.href='display.php';">Diary</button>
     </div>
<div>
<?php
// Define an array of quotes
$quotes = array(
    "You can always edit a bad page. You can’t edit a blank page.",
    "If there's a book that you want to read, but it hasn’t been written yet, then you must write it.",
    "One small step for man, one big step for mankind.",
);

// Select a random quote
$randomQuote = $quotes[rand(0, count($quotes) - 1)];

// Display the quote
echo $randomQuote;
?>
            <div class="table-wrapper">
            <table>
                <?php
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];
                    $user_id = $_SESSION['id'];
                    $sql="SELECT * FROM `crud` WHERE (id LIKE '%$search%' OR title LIKE '%$search%' OR content LIKE '%$search%') AND user_id='$user_id'
                    ";
                    $result=mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){

                        echo  '<thead class="fl-table">
                            <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Content</th> 
                            </tr>  
                              </thead>';
                              
                            while($row=mysqli_fetch_assoc($result)){
                            echo '<tbody>
                            <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['title'].'</td>
                            <td>'.$row['content'].'</td> 
                            </tr>
                            </tbody>';}
                    }else{
                        echo "There is no data like that.";
                    }
                    }
                ?>
            </table>   
                </div> 
        </div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
    exit();
}
?>
