<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codelab"; 


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (userid, passcode, avatar) VALUES ('xinqiu', 'xinqiu', 'img_avatar3.png')";

if (mysqli_query($conn, $sql)) {
    echo "1 New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>