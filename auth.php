<?php

$servername = "localhost";
$username = "francis";
$password = "francis";
$dbname = "infinitecomputing";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_REQUEST['uname'];
  $passwd = $_REQUEST['upass'];
  $passwd = md5($passwd);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sqlquery = ("SELECT   username, passwords FROM Users WHERE username='$name'");
$result = $conn->query($sqlquery);

if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc();
  if ($row["passwords"] == $passwd){
    
                            
    // Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    $_SESSION["username"] = $name; 
    
    header("Location: http://127.0.0.1:8000/?message=Welcome Back $name&logedin=true&username=$name");
  }else{
    $message = "Incorrect Password, Please try again";
    header("Location: http://127.0.0.1:8000/login.php?error= $message");
  }
} else {
  $message = "Username Not found, Please try again";
  header("Location: http://127.0.0.1:8000/login.php?error= $message");
}

$conn->close();
?>