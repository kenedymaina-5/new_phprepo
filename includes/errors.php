<?php
    if ($_GET['error'] == ""){
        $display = "none";
    }
    
?>
<div class="errors" style="display:<?=$display?>">
    <div class="message">
        <?php echo  $_GET['error'] ?>
    </div>
    
</div>