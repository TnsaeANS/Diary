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
    <title>Content</title>
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
        <input type="name" id="title" name="title" placeholder="Enter Title">
        <br>
        <textarea name="content" id="content" placeholder="Enter Content" rows="4" cols="50">
        </textarea>
        <button type="submit" name="submit">Submit</button>
        <button  name="back" onclick="location.href='display.php';">Go Back</button>


    </form>

        
<?php
     include "db_conn.php";
    
    if (isset($_POST['submit'])) {
        $title =$_POST['title'];
        $content =$_POST['content'];

                $sql = "INSERT INTO crud(`title`, `content`) VALUES ('$title', '$content')";
                $result = mysqli_query($conn, $sql);
               if ($result) {
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