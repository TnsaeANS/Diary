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
    <title>Display</title>
    <link rel="stylesheet" href="profile.css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

</head>
<body>
    <div class="navbar">
          <button onclick="location.href='home.php';" class="diary">Diary</button>
          <div class="actions">
               <p class="profile"><?php echo $_SESSION['user_name']; ?></p>
               <a class="logout" href="logout.php">Logout</a>
          </div>
    </div>


    <h2> Display </h2>
    <div>
 <button class="button" onclick="location.href='content.php';">Add Content</button>
    </div>
    
    
<div class="table-wrapper">   
<table>
    <thead>
    <tr class="table-header">
        <th>Id</th>
        <th>Title</th>
        <th>Content</th> 
        <th>Date</th>
        <th>Actions</th>
    </tr>  
</thead>
    <tbody> 



<?php
$sql= "SELECT * FROM `crud` WHERE user_id = $user_id";
$result= mysqli_query($conn, $sql);

if($result){
    while($row=mysqli_fetch_assoc($result)
    ){
        $id=$row['id'];
        $title=$row['title'];
        $content=$row['content'];
        $date_entered=$row['date_entered'];

        $words = explode(' ', $content);
        $truncatedContent = implode(' ', array_slice($words, 0, 5));
        if (count($words) > 5) {
            $truncatedContent .= '...';
        }
        echo '<tr> 
        <th>'.$id.'</th>
        <td>'.$title.'</td>
        <td>'.$truncatedContent.'</td>
        <td>'.$date_entered.'</td>
        <td>
        <button class="button"><a href="update.php?updateid='.$id.'">EDIT</a></button>
        <button class="button"><a href="delete.php?deleteid='.$id.'">DELETE</a></button>
        </td>
        
        </tr>';
    }
}
?>
    </tbody>
</table>
<div>   


</body>
</html>


<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>