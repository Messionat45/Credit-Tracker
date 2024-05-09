<?php
include("connection.php");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkuser = "select * from signup where email ='$email'";
    $result = mysqli_query($con,$checkuser);
    $count = mysqli_num_rows($result);
    

    if(empty($name) || empty($phone) || empty($email) || empty($password)){
        header("Location: signup.html?error=emptyfields");
       
        exit();
    }
    elseif(!preg_match("/^[A-Z][a-z]+ [A-Z][a-z]+$/",$name)){
        header("Location: signup.html?error=invalidname");
        exit();
    }
    elseif(!preg_match("/[0-9]{10}$/",$phone)){
        header("Location: signup.html?error=invalidphoneno");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9.]+@[a-zA-Z]+\.[A-Za-z]{3}$/",$email)){
        header("Location: signup.html?error=invalidemail");
        exit();
    }
    elseif(strlen($password) < 8){
        header("Location: signup.html?error=invalidpassword");
        exit();
    }
    elseif($count > 0){
        header("Location: login.php");
        exit();
    }

    else{
    $insert_query = "insert into signup(name,phone,email,password) values('$name', '$phone', '$email', '$password')";
    $data = mysqli_query($con, $insert_query);

    if($data) {
        // If data insertion is successful, redirect to the login page
        header("Location: login.php");       
        exit();
    } else {
        // If an error occurs during data insertion, redirect to the signup page with an error parameter
        header("Location: signup.html?error=sqlerror");
        exit();
    }
}
}

mysqli_close($con);
?>
