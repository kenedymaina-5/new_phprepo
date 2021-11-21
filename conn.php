<?php

// $servername = "remotemysql.com";
// $username = "UtGp1ssC6O";
// $password = "Yk917zbTBf";
// $dbname = "UtGp1ssC6O";

$servername = "127.0.0.1";
$username = "francis";
$password = "francis";
$dbname = "infinitecomputing";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  header("Location: /notfound.php?error=$conn->connect_error");
}

?>