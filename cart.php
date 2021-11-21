<?php

if ($_COOKIE["status"] != md5("true")){
    header("Location: /login.php?error=You Must Be loged in to access the Profile page");
  }

require("conn.php");

$username = $_COOKIE['uname'];
$authcheck = "SELECT * FROM Users WHERE username = '$username'";
$confm = $conn->query($authcheck);
$row = $confm->fetch_assoc();
$balance = $row['balance'];
?>

       
<?php require("header.php"); ?>
<?php require("messages.php"); ?>
        <div class="content">
            <div class="prod">
            <?php
            $sql = "SELECT * FROM items WHERE username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $pname = $row['name'];
                    $pprice = $row['price'];
                    $pdesc = $row['description'];
                    $pbarcode = $row['barcode'];
                    $pimg = "$pbarcode". ".jpg";
                    $pavail = $row['availability'] ; 
                    $id = $row['id'];
                    
                    echo '<div class="products-items">';
                    echo '<div class="prodimg">';
                    echo "<img src='/Images/$pimg' alt='$pbarcode'>";
                    echo '</div>';
                    echo "<div class='title'><p>$pname</p></div><br>";
                    echo "$pdesc<br>";
                    echo "Price : Ksh$pprice<br>";
                    if ($pavail == 1){
                        echo "Availability : Available<br>";
                    }else{
                        echo "Not Available<br>";
                    }
                    echo "<div class='actions'>";
                    echo "<a href='/removecart.php?code=$id&uname=$username'>Remove from Cart</a>";
                    echo "<a href='/purchase.php?code=$pbarcode&uname=$username'>Purchase</a>";
                    echo "</div>";
                    
                    echo "</div>";
                }
                
            }else{
                echo '
                <div class="empty-cart">
                    <p>No Items in the cart yet<p>
                    <p>Items you Add to cart will be displayed here</p>
                    <p><a href="/arena.php">Go to market to add items?</a>
                </div>
                ';
            }
                
            ?>
            </div>
        </div>
        <?php require("footer.php"); ?>
