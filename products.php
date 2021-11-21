<?php

require("conn.php");
$code = $_GET['code'];

$smt = "SELECT * FROM products WHERE barcode='$code'";
$result = $conn->query($smt);

$row = $result->fetch_assoc();
$pname = $row['name'];
$pprice = $row['price'];
$pdesc = $row['description'];
$pbarcode = $row['barcode'];
$pimg = "$pbarcode". ".jpg";
$pavail = $row['availability'] ; 

require("header.php");
require('messages.php');
echo "
    <div class='content'>
    <div class='product-item'>
        <div class='product-image'>
            <img src='/Images/$pimg' alt=$pbarcode'>
        </div>
        <div class='product-description'>
            <p>$pname</p>
            <p>$pdesc</p>
            <p>$pprice</p>
            $pname
";
if ($pavail == 1){
    echo "<p>Availability : Available<br></p>";
}else{
    echo "<p>Availability  : Not Available<br></p>";
}

echo "
        </div>
                
        <div class='product-action'>
            <a href='#'>Add to cart</a><a href='#'>Purcase</a>
        </div>
        </div>
    </div>
";
require("footer.php");

?>
