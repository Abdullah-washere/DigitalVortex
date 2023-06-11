<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalVortex  | Profile</title>
    <style>
    <?php
    include "src/css/style.css";
    include "src/css/profile.css";
    include "src/css/auth.css";
  ?>
  .login-form{
    margin:0 auto;
  }
  </style>
</head>
<body>
    <?php
    include "nav.php";
    include "conn.php";
    $user = $_SESSION["user"];
    $q = "select * from users where email = '$user'";
    $res = mysqli_query($conn, $q) or die(mysqli_error($conn));
    while($row = mysqli_fetch_array($res)){
    ?>
     <div class="profile-container">
         <form class="login-form" action="update_profile.php" method="POST" >
             <h2>Update Profile</h2>
           <?php
          if(isset($_REQUEST["msg"]) && $_REQUEST["msg"] == 0){
              echo ' <span class="message error">Please Fill All details</span> ';
            }else if(isset($_REQUEST["msg"]) && $_REQUEST["msg"] == 1){
                echo ' <span class="message success">Profile Updated Sucessfully</span> ';
            }
            ?>
            <center><img class="profile-image" src="<?php echo $row['image']; ?>" alt="Profile Picture">
            <h1 class="profile-name"><?php echo $row["name"]; ?></h1>  </center>

            <div class="form-group">
            <br>
                <label for="email">Name</label>
                <input type="text" class="frm-box" name="name" placeholder="Enter your Full Name" value="<?php echo $row["name"] ?>">
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="frm-box" name="newpssword" placeholder="Enter your new password">
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="login-button">
            </div>
        </form>

        <br> <hr>
        <br>
        <center>
        <h1 class="profile-name">My Posts</h1> 
        </center>
        <div class="post-container">
            <?php
            $postQ = "select * from post where user = '$user'";
            $postres= mysqli_query($conn, $postQ) or die(mysqli_error($conn));
            if(mysqli_num_rows($postres)>0){
                while($Row = mysqli_fetch_array($postres)){
                    ?>
                        <a href="post_details.php?post_id=<?php echo $Row["id"]; ?>">
                        <div class="mypost">
                            <img src="<?php echo $Row["img"]; ?>" alt="" class="post-img">
                        </div>
                        </a>
                    <?php
                }
            }else{
                echo "<h4> No Posts Available</h4>";
            }
            ?>
          
        </div>
        <?php
    }
        ?>
  </div>
</body>
</html>