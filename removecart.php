<?php

$pid = $_GET['code'];
$username = $_COOKIE['uname'];
if ($_COOKIE["status"] != md5("true")){
  header("Location: /login.php?error=You Must Be loged in to access the Profile page");
}


require("includes/conn.php");

$smt = "DELETE FROM items WHERE id = $pid";

$output = $conn->query($smt);
echo $output;
if ($output == True){
  header("Location: /cart.php?message=Item successfully REMOVED FROM cart");
}else{
  header("Location: /cart.php?message=Failed to REMOVE Item FROM cart, try again later:");

}

?>