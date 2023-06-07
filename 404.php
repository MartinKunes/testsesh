<?php
session_start();
echo file_get_contents("header.php");
echo file_get_contents("footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .container{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
<h1>Pro přístup je potřeba se přihlásit</h1>
</div>
</body>
</html>