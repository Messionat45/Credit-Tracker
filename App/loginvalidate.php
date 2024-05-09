<?php

session_start(); // Start session for storing user authentication status

include("connection.php"); // Include database connection

if(isset($_POST['email']) && isset($_POST['password'])) {
    // Retrieve email and password from form submission
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if user exists with provided email and password
    $query = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        // User found, set authentication session variable and redirect to dashboard
        $user = mysqli_fetch_assoc($result);
        $userID = $user['id'];

        $_SESSION['email'] = $email;
        $_SESSION['id'] = $userID;

        header("Location: front.php");
        exit();
    } else {
        // Invalid credentials, display error message
        $error = "Invalid email or password.";
    }
}

include("login.php");
?>