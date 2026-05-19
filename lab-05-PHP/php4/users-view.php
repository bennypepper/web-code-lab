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
    <title>Characters - View Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include 'sidebar.php'; ?>
<div class="w3-main w3-container w3-margin-top" style="margin-left:20%">

    <h2>Characters</h2>
    <p>The following table:</p>

    <table class="w3-table-all w3-hoverable">
        <thead>
            <tr class="w3-light-grey">
                <th>No.</th>
                <th>Avatar</th>
                <th>User ID</th>
                <th>Passcode</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "codelab";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT userid, passcode, avatar FROM users";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row["avatar"] . "</td>"; 
                    echo "<td>" . $row["userid"] . "</td>";
                    echo "<td>" . $row["passcode"] . "</td>";
                    

                    echo "<td>
                            <a href='users-details.php?userid=" . $row["userid"] . "' class='w3-button w3-tiny w3-blue' title='Details'><i class='fa fa-search'></i></a> 
                            <a href='users-form-update.php?userid=" . $row["userid"] . "' class='w3-button w3-tiny w3-orange' title='Update'><i class='fa fa-pencil'></i></a> 
                            <a href='users-delete.php?userid=" . $row["userid"] . "' class='w3-button w3-tiny w3-red' title='Delete' onclick=\"return confirm('Are you sure you want to delete this user?');\"><i class='fa fa-trash'></i></a>
                          </td>";
                          
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='5' class='w3-center'>0 results</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>

</div>
</body>
</html>