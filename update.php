<?php
include "db_conn.php";
$id = $_GET['updateid'];
    
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
     
    if (isset($_POST['submit'])) {
        $title =$_POST['title'];
        $content =$_POST['content'];

                $sql = "UPDATE `crud` SET id='$id', title='$title', content='$content'";
                $result = mysqli_query($conn, $sql);
               if ($result) {
                    echo "Content updated successfully";
                    header ('location:display.php');
                    exit();
               }else {
                    echo "The content was not inserted successfully ". mysqli_error($conn);
               }
          }else{
              $sql = "SELECT * FROM `crud` WHERE id=$id";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              $title = $row['title'];
              $content = $row['content'];
          }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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


    <h2> Update Content</h2>
    <form action="update.php?updateid=<?php echo $id; ?>" method="POST">
        <input type="name" value="<?php echo $title; ?>" id="title" name="title">
        <br>
        <textarea name="content" id="content" <?php echo $content; ?> rows="4" cols="50">
        </textarea>
        <button type="submit" name="submit">Submit</button>
    </form>

</body>
</html>


<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>