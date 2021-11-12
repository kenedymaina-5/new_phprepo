<?php

if ( isset($_COOKIE['status'])){
    $status = $_COOKIE['status'];
}else{
    setcookie("status", "false", time()+3600, "/","", 0);
}

session_start();
if ($_SESSION["id"] == ""){
    
    $_SESSION["id"] = 1;
    $_SESSION["name"] == "Francis";
}
?>
<?php require("header.php"); ?>
        <div class="home">
            <div class="container">
                <form action=auth.php class="loreg" method="post">
                    <?php require("errors.php"); ?>
                    <div class="form">
                        <img src="/Images/logo5.png" alt="logo">
                        <h2>
                            Please Enter Your credentials to continue
                            <?php echo $_COOKIE["status"]?>
                        </h2>
                        <label for="username">Username :</label>
                        <br>
                        <input name="uname" type="text" placeholder="Username">
                        </br>
                        <label for="password">Password :</label>
                        </br>
                        <input name="upass" type="password" placeholder="password">
                        <br>
                        <div class="query">
                            Do not have an account? <a href="/registration.php">Register</a>
                        </div>
                        <br>
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>
        <?php require("footer.php"); ?>