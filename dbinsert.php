<?php

require("includes/conn.php");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_REQUEST['name'];
    $price = $_REQUEST['price'];
    $barcode = $_REQUEST['barcode'];
    $desc = $_REQUEST['desc'];
    $avail = $_REQUEST['avail'];
    $category = $_REQUEST['category'];
    $uploadedTempFile = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
    define('UPLOAD_DIRECTORY', 'Images');
    $destFile = UPLOAD_DIRECTORY . $filename;
 }
 echo "$uploadedTempFile<br> $filename <br> $destFile";
move_uploaded_file($uploadedTempFile, $destFile);
$smt = "INSERT INTO `products`(`name`, `price`, `barcode`, `description`, `availability`, `category`) VALUES ('$name','$price','$barcode','$desc', $avail,'$category')";

$exec = $conn->query($smt);
if ($exec){
    header("Location: /admdelete.php?message=Query executed successfully");
    echo "Successfully executed";
}else{
    header("Location: /admdelete.php?message=Failed to execute Query successfully");
    echo $conn->error;
}
?>