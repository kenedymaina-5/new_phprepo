<?php
    if ($_GET['message'] == ""){
        $display = "none";
    }

?>
<div class="info" style="display:<?=$display?>">
    <div class="message">
        <?php echo  $_GET['message'] ?>
    </div>
</div>