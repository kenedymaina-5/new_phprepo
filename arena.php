<?php

$servername = "remotemysql.com";
$username = "UtGp1ssC6O";
$password = "Yk917zbTBf";
$dbname = "UtGp1ssC6O";

$username = $_COOKIE['uname'];

if ($_COOKIE["status"] != md5("true")){
    header("Location: /login.php?error=You Must Be loged in to access the Profile page");
  }
$conn = new mysqli($dbhost, $dbusername, $password, $dbname);
  // Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if ($_COOKIE['status'] != "true"){
    $message = "Not loged in";
}
$authcheck = "SELECT * FROM Users WHERE username = '$username'";
$confm = $conn->query($authcheck);
$row = $confm->fetch_assoc();
$balance = $row['balance'];
?>

       
<?php require("header.php"); ?>
<?php require("message.php"); ?>
        <div class="content">
        <div class="prod">
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $pname = $row['name'];
                    $pprice = $row['price'];
                    $pdesc = $row['description'];
                    $pbarcode = $row['barcode'];
                    $pavail = $row['availability'] ; 
                    $pimg = "$pbarcode" . ".jpg";
                    
                    echo '<div class="products-items">';
                    echo '<div class="prodimg">';
                    echo "<img src='/Images/$pimg' alt='$pbarcode'>";
                    echo '</div>';
                    echo "<div class='prod-desc'><p>$pname</p></div><br>";
                    echo "<div class='prod-desc'>";
                    echo "$pdesc<br>";
                    echo "Price : Ksh$pprice<br>";
                    if ($pavail == 1){
                        echo "Availability : Available<br>";
                    }else{
                        echo "Availability  : Not Available<br>";
                    }
                    echo "<div class='actions'>";
                    echo "<a href='/addcart.php?code=$pbarcode&uname=$username'>Add to Cart</a>";
                    echo "<a href='/purchase.php?code=$pbarcode&uname=$username'>Purchase</a>";
                    echo "</div>";
                    echo "</div>";
                    
                    echo "</div>";
                }
                
            }
                
            ?>
        
        </div>
        </div>
        <?php require("footer.php"); ?>
        
