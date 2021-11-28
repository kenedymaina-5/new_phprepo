<?php
define('UPLOAD_DIRECTORY', '/Images/');
$uploadedTempFile = $_FILES['file']['tmp_name'];
$filename = $_FILES['file']['name'];
$destFile = UPLOAD_DIRECTORY . $filename;
move_uploaded_file($uploadedTempFile, $destFile);

echo "succcess";

?>