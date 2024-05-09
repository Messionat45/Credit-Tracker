<?php
session_start();

include("connection.php");

if (isset($_POST['recordSrno'])) {
  $recordSrno = $_POST['recordSrno'];

  $sql = "DELETE FROM userdata WHERE srno = $recordSrno";
  $result = mysqli_query($con, $sql);

  if ($result) {
    // Return success status
    http_response_code(200);
    exit();
  } else {
    // Return error status
    http_response_code(500);
    exit("Error deleting record: " . mysqli_error($con));
  }
}

include("front.php");
?>
