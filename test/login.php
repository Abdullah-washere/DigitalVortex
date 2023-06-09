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
    <title>Socio | Login</title>
</head>
<body>
    <?php include "nav.php" ?>
    <div class="container">
        <form class="login-form" action="handle_login.php" method="post">
            <h2>Login</h2> 
            
            <?php
           if(isset($_REQUEST["msg"]) && $_REQUEST["msg"] == 0){
            echo '<br> <span class="message error">Invalid Email or Password</span> ';
           }
           ?>
            <div class="form-group" > <br>
                <label for="email">Email</label>
                <input type="email" class="frm-box" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group"> 
                <label for="password">Password</label>
                <input type="password" class="frm-box" name="password" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="login-button">
            </div>
            <div class="form-group">
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </div>
        </form>
    </div>
</body>
</html>
