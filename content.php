<?php
include "db_conn.php";

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
     $user_id = $_SESSION['id'];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="navbar">
    <button onclick="location.href='home.php';" class="diary">Diary</button>

          <div class="actions">
               <p class="profile"><?php echo $_SESSION['user_name']; ?></p>
               <a class="logout" href="logout.php">Logout</a>
          </div>
    </div>


    <h2> Content</h2>
    <form action="content.php" method="POST">
        <input class="textarea" type="name" id="title" name="title" placeholder="Enter Title">
        <br>
        <br>
        <textarea class="textarea" name="content" id="content" placeholder="Enter Content" rows="4" cols="25">
        </textarea>
        <br>
        <button class="button" type="submit" name="submit">Submit</button>
    </form>
    <button class="button" onclick="location.href='display.php';" >Go Back</button>


        
<?php
     include "db_conn.php";
    
    if (isset($_POST['submit'])) {
        $title =$_POST['title'];
        $content =$_POST['content'];

                $sql = "INSERT INTO crud(`title`, `content`, `user_id`) VALUES ('$title', '$content', '$user_id')";
                $result = mysqli_query($conn, $sql);
               if ($result) {
                    header ("location: display.php");
                    echo "Content submited successfully";
               }else {
                    echo "The content was not inserted successfully ". mysqli_error($conn);
               }
          }
?>
</body>
</html>


<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>
