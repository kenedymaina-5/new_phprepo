<?php

require("conn.php");

$username = $_COOKIE['uname'];
$authcheck = "SELECT * FROM Users WHERE username = '$username'";
$confm = $conn->query($authcheck);
$row = $confm->fetch_assoc();
$balance = $row['balance'];
$prodcode = $_GET['code'];

$prodcheck = "SELECT * FROM products WHERE barcode = '$prodcode'";
$get = $conn->query($prodcheck);
$data = $get->fetch_assoc();
$prodprice = $data['price'];

$bafter = $balance - $prodprice;
if ($bafter > 0 ){
    header("Location: /cart.php?message=Not sufficient funds");
}

echo $balance, $prodcode, $prodprice, $bafter;
$bupdate = "UPDATE Users SET balance='$bafter' WHERE username ='$username'";
$result = $conn->query($bupdate);
if ($result == True){
    $prodcheck = "DELETE FROM items WHERE barcode = '$prodcode'";
    $get = $conn->query($prodcheck);
    echo "Query Success";
    header("Location: /cart.php?message=Item purchasedd successfully");
}else{
    echo "Failed To Execute query";
}


?>
