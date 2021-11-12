<?php

if ($_GET['name'] != ""){
    $_SESSION['username'] = $_GET['username'];
}

if ($_GET['logedin'] == "true"){
    $cokie_value = $_GET['logedin'];
    $username = $_GET['username'];
    setcookie("uname", $_GET['username'], time()+3600, "/","", 0);
    setcookie("status", $cokie_value , time()+3600, "/","", 0);
}
$dbhost = "localhost";
$dbusername = "francis";
$dbpassword = "francis";
$dbname = "infinitecomputing";
$username = $_COOKIE['uname'];

$conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error){
    echo "Failed to establist connection to the Database";
}
$sql = "SELECT `balance` FROM Users WHERE username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $balance = $row['balance'];
}else{
    echo "Item Not found";
}


?>

        <?php require("header.php"); ?>
        <?php require("message.php"); ?>
        <div class="home">
            <h1>Why Us?</h1>
            <div class="home-items">
                <h2>Hello </h2>
                <div class="testimage">
                    <div><img src="/Images/img1.jpg" alt="test image"></div>
                </div>
            </div>
            <h1>Our Services and products</h1>
            <div class="home-items">
                <h2>Hello</h2>
            </div>
            <h1>product Categories</h1>
            <div class="home-items">
                <h2>Hello</h2>
            </div>
        </div>
        <?php require("footer.php"); ?>
        