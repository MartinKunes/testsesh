<?php
session_start();
session_destroy();
echo file_get_contents("header.php");
echo'"<h1>Byl jsi Odhlášen</h1>"';
 echo file_get_contents("footer.php");
header("Location: index.php");
return;

?>
