<?php

$pcode = $_GET['code'];
$username = $_COOKIE['uname'];
if ($_COOKIE["status"] != md5("true")){
  header("Location: /login.php?error=You Must Be loged in to access the Profile page");
}



$dbhost = "remotemysql.com";
$dbusername = "UtGp1ssC6O";
$dbpassword = "Yk917zbTBf";
$dbname = "UtGp1ssC6O";

$conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
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
  header("Location: /arena.php?message=Item successfully added to cart");
}else{
  header("Location: /arena.php?message=Failed to add Item to cart");

}

?>
