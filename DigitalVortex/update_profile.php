<?php
session_start();
include "conn.php";

$name = trim($_POST["name"]); // Use $_POST instead of $_REQUEST
$password = trim($_POST["newpssword"]); // Use $_POST instead of $_REQUEST
$userId = $_SESSION["user"];
if($name == "" || $password == ""){
    header("location:profile.php?msg=0");
    exit;
}

    // Perform the update query here
    $q = "UPDATE users SET name = '$name', password = '$password' WHERE email = '$userId'";
    mysqli_query($conn, $q) or die(mysqli_error($conn));
    // Redirect to the profile page with success message
    header("Location: profile.php?msg=1");
    exit();

?>
