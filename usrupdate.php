<?php

require("includes/conn.php");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $set = $_REQUEST['set'];
    $to = $_REQUEST['to'];
    $where = $_REQUEST['where'];
    $value = $_REQUEST['value'];
    if ($set == "passwords"){
        $to = md5($to);
    }
}
$smt = "UPDATE `Users` SET $set='$to' WHERE $where = '$value'";
echo $smt;

$exec = $conn->query($smt);
if ($exec){
    echo "Successfully executed";
    header("Location: /uedit.php?message=Query executed successfully");
}else{
    header("Location: /uedit.php?message=Failed to execute Query successfully, $conn->error");
    echo $conn->error;
}

?>