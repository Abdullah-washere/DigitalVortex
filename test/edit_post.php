<?php
session_start();
if(!isset($_SESSION["user"]) || !isset($_REQUEST["post_id"])){
  header("location:index.php");
}
$post_id = $_REQUEST["post_id"];
//Uploading Post
if (isset($_POST["update_post"])) {
  include "conn.php";
  $postTitle = $_POST["post-title"];
  $postDescription = $_POST["post-description"];

      $query = "update post set title = '$postTitle',  description = '$postDescription' where id = '$post_id'";
      mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php
        include "src/css/style.css";
        include "src/css/create_post.css";
        ?>
    </style>
    <title>Socio | Create Post</title>
</head>
<body>
    <?php include "nav.php" ?>
    <br> 
    <?php
           if(isset($_REQUEST["msg"]) && $_REQUEST["msg"] == 1){
            echo '<br> <span class="message error">Post Updated Sucessfully</span><br> ';
           }
           ?>
    <!-- content  -->
    <div class="container">
    <h1>Create Post</h1>
    <form action="edit_post.php" method="POST" enctype="multipart/form-data">
    <?php
    $user = $_SESSION["user"];
    $q = "select * from post where user = '$user' and id = '$post_id' ";
    $res = mysqli_query($conn, $q);
    while($row=mysqli_fetch_array($res)){
        ?>
<label for="post-title">Post Title</label>
<input type="text" id="post-title" name="post-title" placeholder="Enter post title" value="<?php echo $row["title"] ?>">

<label for="post-description">Post Description</label>
<textarea id="post-description" name="post-description" placeholder="Enter post description" ><?php echo $row["description"] ?></textarea>
<input type="hidden" name="post_id"  value="<?php echo $row["id"]; ?>">
        <?php
    }
    ?>

      <br><br>

      <button type="submit" name="update_post">Submit</button>
    </form>
  </div>
</body>
</html>