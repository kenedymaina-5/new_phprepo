<?php

require("includes/conn.php");
require("includes/variables.php");
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

require("includes/header.php");
require('includes/messages.php');
echo "
    <div class='product'>
    <div class='product-item'>
        <div class='product-image'>
            <img src='/Images/$pimg' alt=$pbarcode'>
        </div>
        <div class='product-desc'>
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
            <a href='/addcart.php?code=$pbarcode'>Add to cart</a><a href='purchase.php?code=$pbarcode'>Purcase</a>
        </div>
        </div>
    </div>
";
require("includes/footer.php");

?>
