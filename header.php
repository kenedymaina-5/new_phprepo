<?php 
    $status = $_COOKIE['status'];
    $t = md5('true');
    $f = md5('false');
?>
<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/static/index.css">
    <link rel="stylesheet" href="/index.css">

    <title>Infinite Computing | Test nav</title>
</header>

<body >
    <nav>
        <div class="logo">
            <a href="#">Infinite Computing</a>
        </div>
        <ul class="navitems" id="navb">
            <li><a href="/">Home</a></li>
            <li><a href="/arena.php">Market</a></li>
            <li><a href="/messages.php">Messages</a></li>
            <li><a href="/cart.php">Cart</a></li>
            <?php 
                if ($status == $t){
                    echo "<li><a href='#'>Bal: Ksh$balance</a></li>";
                   echo '
                    <li class="tprofile"><a href="#">Profile></a></li>
                        <ul class="nav-drop">
                            <li><a href="#">Profile</a></li>
                            <li class="mode"><a href="#">Dark</a></li>
                            <li><a href="/logout.php">Logout</a>
                        </ul>
                    </li>';
                }else{
                    echo '
                    <li><a href="/login.php">Login</a></li>
                    <li><a href="/registration.php">Register</a></li>
                    ';
                }
            ?>
            
            
        </ul>
        <div class="burger">
            <div class="bug1"></div>
            <div class="bug2"></div>
            <div class="bug3"></div>
        </div>
    </nav>
