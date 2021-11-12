<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/static/index.css" rel="stylesheet">

    <title>InfiniteComputing | Home Page</title>
    
</head>

<body onload="profdrop()">
   
    
        <nav>
            <div class="logo">
                <img src="/Images/Logo6.png" alt="logo">
                <a href="/">Infinite Computing</a>
            </div>
            <div class="navitems">
                <div class="leftnav" >
                    <div class="item"><a href="/">Home</a></div>
                    <div class="item"><a href="products.php">Products</a></div>
                    <div class="item"><a href="/arena.php">Arena</a></div>
                <?php 
                
                if ($_COOKIE["status"] == "true"){
                    echo "        <div class='item'><a>Bal Ksh balance </a></div>";
                    echo "        <div class='item'><a href='/cart.php'>Cart</a></div>";
                    echo "        <div class='item'> <a class='profile' id='profile' onclick='profdrop()'>Profile></a>";
                    echo "          <div class='prof-drop' id='prof-drop'>";
                    echo "              <li><a href=''>Settings</a></li>";
                    echo "              <li><a href=''>miselanious</a></li>";
                    echo "              <li><a href='/logout.php'>Logout</a></li>";
                    echo "          </div>";
                    echo "         </div>";
                }else{
                    echo "        <a href='/login.php'>Login</a>";
                    echo "        <a href='/registration.php'>Register</a>";
                }
               
                ?>
                
                
            </div>
        </nav>
        <div class="content">
