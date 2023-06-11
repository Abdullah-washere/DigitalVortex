<?php
include "conn.php";
$msg;
// Function to validate the uploaded image

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $image = $_FILES["img"];

    if($password != $cpassword){
        header("location:signup.php?msg=2");
        exit;
    }
    // Image validation


    // Check if a person with the same email already exists
    $emailExistsQuery = "SELECT * FROM users WHERE email='$email'";
    $emailExistsResult = mysqli_query($conn, $emailExistsQuery);
    if (mysqli_num_rows($emailExistsResult) > 0) {
        header("location:signup.php?msg=11");
        exit;
    }


    $targetDirectory = "uploads/";
    $targetFileName = $targetDirectory . basename($image["name"]);
move_uploaded_file($image["tmp_name"], $targetFileName);
        // Image uploaded successfully, proceed with database insertion

        // Insert data into the "users" table
        $query = "INSERT INTO users (name, email, password, image) VALUES ('$name', '$email', '$password', '$targetFileName')";
        if (mysqli_query($conn, $query)) {
            header("location:signup.php?msg=1");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
  
?>
