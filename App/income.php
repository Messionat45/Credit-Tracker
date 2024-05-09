<?php

// Assuming $userid contains the session userid
$userid = $_SESSION['id'];
include("connection.php");

// Fetch total income amount for the current user
$queryIncome = "SELECT SUM(amount) AS total_income FROM userdata WHERE sessionid = '$userid' AND option1 = 'income'";
$resultIncome = mysqli_query($con, $queryIncome);
$rowIncome = mysqli_fetch_assoc($resultIncome);
$totalIncome = $rowIncome['total_income'];

// Fetch total expense amount for the current user
$queryExpense = "SELECT SUM(amount) AS total_expense FROM userdata WHERE sessionid = '$userid' AND option1 = 'expense'";
$resultExpense = mysqli_query($con, $queryExpense);
$rowExpense = mysqli_fetch_assoc($resultExpense);
$totalExpense = $rowExpense['total_expense'];

// Calculate the total amount
$totalAmount = $totalIncome - $totalExpense;




?>