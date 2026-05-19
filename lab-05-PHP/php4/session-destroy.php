<?php
session_start();

session_destroy(); 

echo "Session has been destroyed."; 
echo "<p>Coba kembali ke <a href='session-get.php'>session-get.php</a> untuk mengeceknya.</p>";
?>