<?php
session_start(); 

$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "Tidak ada informasi pengguna"; 

echo "User ID: $userid"; 
echo "<p><a href='session-destroy.php'>Hapus Sesi</a></p>"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Code Lab 4 Session get</title> 
</head>
<body>
</body>
</html>