<?php

//Globals
$servername = "remotemysql.com";
$username = "UtGp1ssC6O";
$password = "Yk917zbTBf";
$dbname = "UtGp1ssC6O";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $password2 = $_REQUEST['password2'];
    $first_name = $_REQUEST['fname'];
    $second_name = $_REQUEST['sname'];
    $email_address = $_REQUEST['email'];
}
if($password != $password2){
    header("Location: http://127.0.0.1:8000/registration.php?error=Passwords Do not match!!!");
}else {
    
    $conn = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname );


    if (!$conn){
        echo "Database Connection Failed";

    }
    $password = md5($password);
    $sql = "INSERT INTO Users (fname, sname, username, email_address, passwords) VALUES('$first_name','$second_name','$username','$email_address','$password');";
    if ($conn->query($sql) === TRUE){
        header("Location: http://127.0.0.1:8000/?message=Account created successfully!!! Currently loged in as $username&logedin=true");
    }else{
        $errorno =  $conn->errno;
        if ($errorno == 1062){
            header("Location: http://127.0.0.1:8000/registration.php?error=Username Alredy Exists Choose another Or Consider login in.");
        }
        echo "Not succcessful" . $conn->error, $conn->errno;
    }
    $conn->close();
}
?>

