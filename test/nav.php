<div class="navbar">
    <div class="navbar-logo">
      <img src="src/img/logo.png" alt="Logo">
      <a href="index.php" style="font-size:33px;text-decoration:none;color:aqua;">Socio</a>
    </div>
    <div class="navbar-options">
      <a href="index.php" class="navbar-option">Home</a>
      <?php
      if(isset($_SESSION["user"])){
        echo '<a href="create_post.php" class="navbar-option">Create Post</a>';
       echo '<a href="logout.php" class="navbar-option">Logout</a>';
      }else{
        echo '<a href="signup.php" class="navbar-option">Register</a>';
      }
      ?>
    </div>
    <div class="user-avatar">
      <?php
      if(isset($_SESSION["user"])){
        include "conn.php";
        $user_id = $_SESSION["user"];
        $q = "select image from users where email= '$user_id'";
        $res = mysqli_query($conn, $q);
        $row = mysqli_fetch_assoc($res);
        echo '<img src="' . $row["image"] . '" alt="User Avatar">';
      }else{
        echo '<img src="src/img/user.png" alt="User Avatar">';
      }
      ?>
    </div>
  </div>