<?php

require("includes/conn.php");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $barcode = $_REQUEST['code'];
    
    
    
}
$smt = "DELETE FROM `products` WHERE barcode='$barcode'";
echo $smt;

$exec = $conn->query($smt);
if ($exec){
    echo "Successfully executed";
    header("Location: /admdelete.php?message=Query executed successfully");
}else{
    header("Location: /admdelete.php?message=Failed to execute Query successfully");
    echo $conn->error;
}

?>