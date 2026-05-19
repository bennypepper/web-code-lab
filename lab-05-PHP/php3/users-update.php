<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codelab";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['userid']) && isset($_POST['passcode'])) {
    $user_id = $_POST['userid'];
    $passcode = md5($_POST['passcode']);

    $sql = "UPDATE users SET passcode='$passcode' WHERE userid='$user_id'";

    if (mysqli_query($conn, $sql)) {
        
        header("Location: users-view.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Incomplete data provided.";
}

mysqli_close($conn);
?>

