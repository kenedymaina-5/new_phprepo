<?php



$servername = "localhost";
$username = "francis";
$password = "francis";
$dbname = "infinitecomputing";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Failed to establish connection to the database. Report burg?: " . $conn->connect_error);
}
$smt = "SELECT * FROM products WHERE category='laptop'";
$laptops = $conn->query($smt);

$smtt = "SELECT * FROM products WHERE category='desktop'";
$desktops = $conn->query($smtt);
if (isset($_COOKIE['uname'])){
    $uname = $_COOKIE['uname'];
    $smmt = "SELECT * FROM Users WHERE username = '$uname'";
    $bal = $conn->query($smmt);
    $row = $bal->fetch_assoc();
    $balance = $row['balance'];
}

require('header.php');
?>

<div class="content">
    <div class="none">
        
        <h3>Sample products : category Laptops</h3>
    <div class="home-content">
        <?php
            if ($laptops->num_rows > 0){
                while($row = $laptops->fetch_assoc()){
                    $pname = $row['name'];
                    $pprice = $row['price'];
                    $pdesc = $row['description'];
                    $pbarcode = $row['barcode'];
                    $pavail = $row['availability'] ; 
                    $pimg = "$pbarcode" . ".jpg";
                    if ($pavail == 1){
                        $avail = "Available<br>";
                    }else{
                        $avail = "Not Available<br>";
                    }
                    echo "
                    <div class='home-products'>
                        <div class='prodimg'>
                            <img src='/Images/$pimg' alt='$pbarcode'>
                        </div>
                        <div class='prod-desc'>
                            $pdesc<br>
                            Price : Ksh$pprice<br>
                            $avail
                        </div>
                    </div>
                ";
                }
            }
        ?>
    </div>
    </div>
    <div class="none">
        
    <h3>Sample products : category Laptops</h3>
    <div class="home-content">
    <?php
            if ($desktops->num_rows > 0){
                while($row = $desktops->fetch_assoc()){
                    $pname = $row['name'];
                    $pprice = $row['price'];
                    $pdesc = $row['description'];
                    $pbarcode = $row['barcode'];
                    $pavail = $row['availability'] ; 
                    $pimg = "$pbarcode" . ".jpg";
                    if ($pavail == 1){
                        $avail = "Available<br>";
                    }else{
                        $avail = "Not Available<br>";
                    }
                    echo "
                    <div class='home-products'>
                        <div class='prodimg'>
                            <img src='/Images/$pimg' alt='$pbarcode'>
                        </div>
                        <div class='prod-desc'>
                            $pdesc<br>
                            Price : Ksh$pprice<br>
                            $avail
                        </div>
                    </div>
                ";
                }
            }
        ?>
    </div>

    </div>
</div>

<?php
    require('footer.php');
?>
