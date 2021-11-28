<?php
require_once('includes/conn.php');
require("includes/variables.php");
$uname = $_COOKIE['uname'];
$logstat = $_COOKIE['status'];
$authcheck = "SELECT * FROM Users WHERE username = '$uname'";
$confm = $conn->query($authcheck);
$row = $confm->fetch_assoc();
if ($logstat != md5("true")){
    header("Location: /?message=Not loged in. Note this incident has been LOGED!!!");
}
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
            <div class="admtable" id="admtable">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>BARCODE</th>
                        <th>DESCRIPTION</th>
                        <th>AVAILABILITY</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $pname = $row['name'];
                            $pid = $row['id'];
                            $pprice = $row['price'];
                            $pdesc = $row['description'];
                            $pbarcode = $row['barcode'];
                            $pavail = $row['availability'] ; 
                            
                            echo '<tr>';
                            echo "<td>$pid</td>";
                            echo "<td>$pname</td>";
                            echo "<td>$pprice</td>";
                            echo "<td>$pbarcode</td>";
                            echo "<td>$pdesc</td>";
                            echo "<td>$pavail</td>";
                            
                            echo "</tr>";
                        }
                        
                    }
                        
                    ?>
                </table>
        </div>
        
            </div>
        </div>
       
    <?php  require_once('includes/footer.php'); ?>
