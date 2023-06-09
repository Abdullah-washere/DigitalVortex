<?php
session_start();
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
        include "src/css/auth.css";
        ?>
    </style>
    <title>Socio | Create Account</title>
</head>
<body>
    <?php include "nav.php" ?> <br>
    <div class="container">
        <form class="login-form" action="handle_signup.php" method="POST" enctype="multipart/form-data">
            <h2>Create Account</h2>
           <?php
           if(isset($_REQUEST["msg"]) && $_REQUEST["msg"] == 11){
            echo ' <span class="message error">This Email Already Exist</span> ';
           }else if(isset($_REQUEST["msg"]) && $_REQUEST["msg"] == 0){
            echo ' <span class="message error">Please Choose Only Image file of size < 5MB</span> ';
           }else if(isset($_REQUEST["msg"]) && $_REQUEST["msg"] == 1){
            echo ' <span class="message success">Account Created Sucessfully. Please Login</span> ';
           }else if(isset($_REQUEST["msg"]) && $_REQUEST["msg"] == 2){
            echo ' <span class="message error">Password Did not Match</span> ';
           }
           ?>
            <div class="form-group">
            <br>
                <label for="email">Name</label>
                <input type="text" class="frm-box" name="name" placeholder="Enter your Full Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="frm-box" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="frm-box" name="password" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="frm-box" name="cpassword" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="picture">Profile Picture</label>
                <input type="file" class="frm-box" name="img" accept="image/*">
            </div>
            <div class="form-group">
                <input type="submit" value="Register" class="login-button">
            </div>
            <div class="form-group">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
