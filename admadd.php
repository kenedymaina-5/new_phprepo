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
            <form action="dbinsert.php" method="POST" enctype="multipart/form-data">
            <header>Add Items</header><br>
            <label for="name">Name</label>
            <input type="text" name="name">
            <label for="file">image</label>
            <input type="file" name="file" id="" accept=".jpg,.jpeg.png">
            <label for="price">price</label>
            <input type="text" style="width:6em" name="price">
            <label for="barcode">Barcode</label>
            <input type="text" style="width:8em" name="barcode"><br>
            <label for="description">Description</label>
            <textarea name="desc" id="" cols="35" rows="3"></textarea><br>
            <label for="name">Availability</label>
            <select name="avail" id="">
                <option value="true">true</option>
                <option value="false">false</option>
            </select><br>
            <label for="name">Category</label>
            <input type="text" name="category">
            <input type="submit" value="Go">
            </form>
        </div>
            </div>
        </div>
       
    <?php  require_once('includes/footer.php'); ?>
