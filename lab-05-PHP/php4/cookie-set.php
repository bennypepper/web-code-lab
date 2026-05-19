<?php

setcookie("user", "lockey", time() + 3600, "/");
echo "Cookie user has been set.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Code Lab 4</title>
</head>
<body>
    <p>Klik <a href="cookie-get.php">di sini</a> untuk pergi ke halaman kedua.</p>
</body>
</html>