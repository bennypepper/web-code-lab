<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Process Registration</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container w3-margin-top">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codelab";


$user_id = $_POST['userid'];
$pass_code = $_POST['passcode'];
$retype_passcode = $_POST['retype_passcode'];

if ($pass_code !== $retype_passcode) {
    echo "<div class='w3-panel w3-red'><p>Error: Passcode and Retype Passcode do not match!</p></div>";
    echo "<a href='users-form.php' class='w3-btn w3-blue'>Back</a>";
    exit(); 
}

$pass_code = md5($pass_code);


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (userid, passcode) VALUES ('$user_id', '$pass_code')";

if (mysqli_query($conn, $sql)) {
 
    echo "1 New record created successfully. <a href='users-form.php'>Back</a>"; 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>