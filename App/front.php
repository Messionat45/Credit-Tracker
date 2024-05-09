<?php
session_start();
// Assuming $userid contains the session userid
$userid = $_SESSION['id'];
include("connection.php");

include("income.php");
// Fetch data for the current user based on session ID
$query = "SELECT * FROM userdata WHERE sessionid = '$userid'";
$result = mysqli_query($con, $query);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div id="home-button">
      <button><a id="home" href="index.html">Home</a></button>
    </div>
    <div id="frontheading"><h1>Capital Record</h1></div>

    <div id="frontContainer">
      <div id="frontheading"><h3>Total Capital</h3></div>

      <div id="displayBox"><?php echo $totalAmount; ?></div>

      <form action="frontdata.php" method="post">
        <div id="frontinput">
          <div id="sources">
            <select name="option1" id="selectOption" onchange="getSecondSelect()">
              <option value="income">Income</option>
              <option value="expense">Expense</option>
            </select>

            <select name="option2" id="secondSelect"></select>
          </div>
          <div>
            <label for="">Amount: </label>
          </div>
          <div>
            <input id="amount" type="number" name="amount"/>
    
          </div>

          <div>
            <button id="frontBtn" >CREATE</button>
          </div>
        </div>
        <input type="hidden" id="sessionId" name="sessionid" value="<?php echo $userid; ?>">
      </form>
      
      <?php
          // Check if userDataArray is set and not empty
if (mysqli_num_rows($result) > 0) {
    // Loop through each record in userDataArray and display
    while ($row = mysqli_fetch_assoc($result)){
      echo '<div id="record">';
      echo '<img src="greendollar.png" alt="money" id="logo1" />';
      echo '<h5 class="data">Amount: '. $row['amount'] . ' || ' .$row['option2']. '</span></h5>';
      echo '<img src="trash.png" alt="delete" id="logo2"  data-record-srno="' . $row['srno'] . '"/>';
      echo '</div>';
    }
} else {
    // If no records found
    echo "No records found.";
}
?>
    </div>
    <script src="front.js"></script>
  </body>
</html>
