<?php

setcookie("status", "", time()-3600, "/","", 0);
setcookie("uname", "", time()-3600, "/","", 0);
header("Location: /?message=You have successfully Loged out");

?>
