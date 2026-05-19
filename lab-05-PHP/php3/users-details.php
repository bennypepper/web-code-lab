
<!DOCTYPE html>
<html>
<head>
    <title>Character Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>


<div class="w3-main w3-container w3-margin-top w3-center" style="margin-left:20%">

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
    $sql = "SELECT * FROM users WHERE userid='$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="w3-card-4 w3-margin-top" style="width:50%; margin: 0 auto;">
            <img src="<?php echo $row['avatar']; ?>" alt="Avatar" style="width:100%; max-width: 300px;">
            <div class="w3-container w3-center">
                <h3><b><?php echo $row['userid']; ?></b></h3>
                <p><?php echo $row['passcode']; ?></p>
            </div>
        </div>
        <br>
        <a href="users-view.php" class="w3-btn w3-blue">Back to Table</a>
        <?php
    } else {
        echo "<p>User not found.</p>";
    }
}
mysqli_close($conn);
?>

</div>
</body>
</html>

