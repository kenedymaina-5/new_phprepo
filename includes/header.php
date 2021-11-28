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

    <title>Infinite Computing | </title>
</header>

<body >
    <nav id="navbar">
        <ul class="navitems" id="navb">
            <li>
                <div class="logo">
                    <a href="/">Infinite Computing</a>
                </div>
            </li>
            <li><a href="/">Home</a></li>
            <li><a href="/arena.php">Market</a></li>
            <?php 
                if ($status == $t){
                    $uname = $_COOKIE['uname'];
                    $smtt = "SELECT * FROM items WHERE username = '$uname'";
                    $data = $conn->query($smtt);
                    $count = $data->num_rows;
                    echo "<div><li><a href='/cart.php'>Cart</a>
                        <div class='cart'>
                            $count
                        </div>
                    </li></div>";
                    echo "<li><a href='#'>Bal: Ksh$balance</a></li>";
                   echo '
                    <li class="tprofile"><a href="#">Profile></a></li>
                        <ul class="nav-drop">
                            <li><a href="#">Profile</a></li>
                            <li class="mode"><a href="#">Dark</a></li>
                            <li><a href="/logout.php">Logout</a>
                        </ul>
                    </li>';
                    if ($admin == true){
                        echo "<li><a href='/admdashboard.php'>Admin</a></li>";
                    }
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
