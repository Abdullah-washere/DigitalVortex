<?php
session_start();
if(!isset($_SESSION["user"])){
  header("location:index.php");
}


//Uploading Post
if (isset($_POST["create_post"])) {
  include "conn.php";

  // Retrieve form data
  $postTitle = $_POST["post-title"];
  $postDescription = $_POST["post-description"];
  $postImage = $_FILES["post-image"];
  $user      = $_SESSION["user"];


  $modified_description = str_replace(array("'"," ) ","\""), "", $postDescription);
  // Store the image in the "uploads" folder
  $targetDirectory = "uploads/";
  $targetFileName = $targetDirectory . basename($postImage["name"]);
move_uploaded_file($postImage["tmp_name"], $targetFileName);
      // Image uploaded successfully, proceed with database insertion

      // Insert data into the "post" table
      $query = "INSERT INTO post (title, description,user, img) VALUES ('$postTitle', '$modified_description','$user' ,'$targetFileName')";

      if (mysqli_query($conn, $query)) {
          echo header("location:create_post.php?msg=1");
      } else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
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
            echo '<br><center> <span class="message error">Post Created Sucessfully</span></center><br> ';
           }
           ?>
    <!-- content  -->
    <div class="container">
    <h1>Create Post</h1>
    <form action="create_post.php" method="POST" enctype="multipart/form-data">
      <label for="post-title">Post Title</label>
      <input type="text" id="post-title" name="post-title" placeholder="Enter post title">

      <label for="post-description">Post Description</label>
      <textarea id="post-description" name="post-description" placeholder="Enter post description"></textarea>

      <label for="post-image">Upload Image</label>
      <input type="file" id="post-image" name="post-image" accept="image/*">
      <br><br>

      <button type="submit" name="create_post">Submit</button>
    </form>
  </div>
</body>
</html>