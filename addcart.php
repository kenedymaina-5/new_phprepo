<?php

$pcode = $_GET['code'];
$username = $_COOKIE['uname'];
if ($_COOKIE["status"] != "true"){
  header("Location: /login.php?error=You Must Be loged in to access the Profile page");
}


$dbservername = "localhost";
$dbusername = "francis";
$dbpassword = "francis";
$dbname = "infinitecomputing";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$smt = "SELECT * FROM products WHERE barcode = '$pcode'";

$output = $conn->query($smt);
if ($output->num_rows>0){
  while ($row = $output->fetch_assoc()){
    $pname = $row['name'];
    $pprice = $row['price'];
    $pbcode = $row['barcode'];
    $pavail = $row['availability'];
    $pdesc = $row['description'];
  }
}
// echo "$pname, $pbcode, $pavail, $pdesc , $pprice";

$sql = "INSERT INTO items (`username`, `barcode`, `name`, `price`, `availability`, `description` ) VALUES ('$username', '$pbcode', '$pname', $pprice, $pavail, '$pdesc')";
$result = $conn->query($sql);

if ($result == True){
  header("Location: http://127.0.0.1:8000/arena.php?message=Item successfully added to cart");
}else{
  header("Location: http://127.0.0.1:8000/arena.php?message=Failed to add Item to cart");

}

?>
