<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wtprac";
$con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con){
    die("some issue occured during database connection");
}
?>