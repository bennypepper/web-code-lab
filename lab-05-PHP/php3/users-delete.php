<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codelab";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['userid'])) {
    $user_id = $_GET['userid'];

    
    $sql = "DELETE FROM users WHERE userid='$user_id'";

    if (mysqli_query($conn, $sql)) {
       
        header("Location: users-view.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "User ID not provided.";
}

mysqli_close($conn);
?>

