<?php 
session_start();

include("connection.php"); 
// if($con){
//     echo"connection done";
// }
// Extract form data
if(isset($_SESSION['id'])) {
$amount = $_POST['amount'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$sessionid = $_SESSION['id'];


// Construct SQL query
$sql = "INSERT INTO userdata (amount, option1, option2, sessionid) VALUES ('$amount', '$option1', '$option2', '$sessionid')";
$userdatainput = mysqli_query($con, $sql);
    header("Location: front.php");
    exit();
}

include("front.php");

?>
