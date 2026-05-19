<?php
session_start();
$_SESSION['userid'] = 'lockey'; 
echo "Session userid has been set.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Web Code Lab 4 | Session</title> 
</head>
<body>
    <p>Klik <a href="session-get.php">disini</a> untuk pergi ke halaman kedua.</p> 
</body>
</html>