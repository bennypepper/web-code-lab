<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codelab";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_POST['userid'];
$pass_code = md5($_POST['passcode']);


$sql = "SELECT * FROM users WHERE userid='$user_id' AND passcode='$pass_code'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $_SESSION['userid'] = $user_id;
    header("Location: list-users.php");
    exit();
} else {
   
    echo "<script>alert('User ID atau Passcode salah!'); window.location.href='login.php';</script>";
}

mysqli_close($conn);
?>