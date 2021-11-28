

<?php
    $uname = $_COOKIE['uname'];
    $adm = "SELECT * FROM Users WHERE username = '$uname'";
    $bala = $conn->query($adm);
    $rowa = $bala->fetch_assoc();

    if ($rowa['status'] == 0){
        $admin = true;
    }else{
        $admin = false;
    }

?>