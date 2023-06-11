<?php
session_start();
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform any necessary validation or sanitization of the input

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // User exists and password is correct
        // You can perform additional tasks like setting session variables here

        // Display success message
        $_SESSION["user"] = $email;
        header("location:index.php");
    } else {
        // User does not exist or password is incorrect
        // Display error message
        header("Location: login.php?msg=0");
        exit;
    }
}
?>
