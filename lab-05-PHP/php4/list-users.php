<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

$active_user = $_SESSION['userid'];


$search_query = "";
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
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

    <h4><b>Hi, <?php echo $active_user; ?></b></h4>
    
    <h2>Characters</h2>

    <form class="w3-margin-bottom" action="list-users.php" method="GET">
        <input class="w3-input w3-border w3-padding" type="text" name="search" placeholder="Search for UserID" value="<?php echo $search_query; ?>" style="width: 50%; display: inline-block;">
        <button type="submit" class="w3-button w3-blue w3-padding">Search</button>
        <a href="list-users.php" class="w3-button w3-light-grey w3-padding">Reset</a>
    </form>

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

            $item_per_page = 5;
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            if ($current_page < 1) $current_page = 1;
            $offset = ($current_page - 1) * $item_per_page;

            // Logika Pencarian menggunakan Query SQL
            if ($search_query != "") {
                // Jika ada pencarian, gunakan klausa WHERE dan LIKE
                $count_sql = "SELECT COUNT(*) as total FROM users WHERE userid LIKE '%$search_query%'";
                $sql = "SELECT userid, passcode, avatar FROM users WHERE userid LIKE '%$search_query%' LIMIT $offset, $item_per_page";
            } else {
                // Jika tidak ada pencarian, tampilkan semua data
                $count_sql = "SELECT COUNT(*) as total FROM users";
                $sql = "SELECT userid, passcode, avatar FROM users LIMIT $offset, $item_per_page";
            }
            
            $count_result = mysqli_query($conn, $count_sql);
            $total_rows = mysqli_fetch_assoc($count_result)['total'];
            $total_pages = ceil($total_rows / $item_per_page);

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
                echo "<tr><td colspan='5' class='w3-center'>0 results found for '$search_query'</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
    
    <br>
    <div class="w3-bar w3-center">
        <?php if ($current_page > 1): ?>
            <a href="?page=<?php echo $current_page - 1; ?><?php echo $search_query ? '&search='.$search_query : ''; ?>" class="w3-button w3-blue">&laquo; Previous</a>
        <?php endif; ?>
        
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?><?php echo $search_query ? '&search='.$search_query : ''; ?>" class="w3-button <?php echo $i == $current_page ? 'w3-green' : 'w3-light-grey'; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
        
        <?php if ($current_page < $total_pages): ?>
            <a href="?page=<?php echo $current_page + 1; ?><?php echo $search_query ? '&search='.$search_query : ''; ?>" class="w3-button w3-blue">Next &raquo;</a>
        <?php endif; ?>
    </div>

    <br>
    <a href="logout.php" class="w3-btn w3-black"><b>Logout</b></a>

</div>
</body>
</html>