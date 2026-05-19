<?php
$user = isset($_COOKIE['user']) ? $_COOKIE['user'] : "Tidak ada informasi pengguna";
echo "Hi, $user!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Code Lab 4 Cookie Get</title>
</head>
<body>
    <p>Hapus cookie di <a href="cookie-delete.php">cookie-delete Page</a>.</p>
</body>
</html>