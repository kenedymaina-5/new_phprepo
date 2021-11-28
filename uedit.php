<?php
require_once('includes/conn.php');
require("includes/variables.php");
$uname = $_COOKIE['uname'];
$authcheck = "SELECT * FROM Users WHERE username = '$uname'";
$confm = $conn->query($authcheck);
$row = $confm->fetch_assoc();
if ($row['status']){
    header("Location: /?message=You do not have the necesarry privilages. Note this incident has been LOGED!!!");
}
require_once('includes/header.php');
require_once('includes/messages.php');

?>

       
<div style="display: flex;"> 
            <div class="options">
                <header>Options</header>

                <a href="/admdashboard.php"><div id="option1"><input type="radio"  name="bhfbhfb" id="optiona" onfocus="displaytable()">Display database Items</div></a>
                <a href="/admadd.php"><div id="option2"><input type="radio" name="bhfbhfb" id="optionb" onfocus="displayadd()">Insert items to database</div></a>
                <a href="/admdelete.php"><div id="option3"><input type="radio"  name="bhfbhfb" id="optionc">Delete Database Items</div></a>
                <a href="/umanagement.php"><div id="option4"><input type="radio" name="bhfbhfb" id="optiond">Manage Users</div></a>
                <a href="/uedit.php"><div id="option4"><input type="radio" name="bhfbhfb" id="optiond">Edit Users Attributes</div></a>

            </div> 
            <div style="display: flex;flex-direction: column;">      
            
        <div class="adm-add" id="admadd">
            <form action="usrupdate.php" method="POST">
            <header>Edit Users attributes</header><br>
            
            
            <label for="name">SET</label>
            <select name="set" id="">
                <option value="username">username</option>
                <option value="passwords">passwords</option>
                <option value="email_address">email_address</option>
                <option value="status">status</option>
                <option value="balance">balance</option>
            </select><br>
            <label for="to">TO</label>
            <input type="text" name="to">
            <label for="name">WHERE</label>
            <select name="where" id="">
                <option value="id">id</option>
                <option value="username">username</option>
            </select><br>

            <label for="name">VALUE</label>
            <input type="text" name="value">
            <input type="submit" value="Go">
            </form>
        </div>
            </div>
        </div>
       
    <?php  require_once('includes/footer.php'); ?>
