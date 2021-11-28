<?php

require("includes/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_REQUEST['uname'];
  $passwd = $_REQUEST['upass'];
  $passwd = md5($passwd);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

$sqlquery = ("SELECT   username, passwords FROM Users WHERE username='$name'");
$result = $conn->query($sqlquery);

if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc();
  if ($row["passwords"] == $passwd){
    
                            
    // Store data in session variables

    $uname = $name;
    setcookie("uname", $uname, time()+3600, "/","", 0);
    setcookie("status", md5('true'), time()+3600, "/","", 0);
    
    header("Location: /?message=Welcome Back $name");
  }else{
    $message = "Incorrect Password, Please try again";
    setcookie("status", md5('false'), time()+3600, "/","", 0);
    header("Location: /login.php?error= $message");
  }
} else {
  $message = "Username Not found, Please try again";
  setcookie("status", md5('false'), time()+3600, "/","", 0);
  header("Location: /login.php?error= $message");
}

$conn->close();
?>
