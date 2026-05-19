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
    <title>Users Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<?php include 'sidebar.php'; ?>
<div class="w3-main w3-container w3-margin-top" style="margin-left:20%">

<div class="w3-container w3-half w3-margin-top">
    <h2>Users Registration</h2>
    <p>This form is used to add new user !</p> <form class="w3-container w3-card-4 w3-padding" action="users-add.php" method="POST">
        
        <p>
        <label class="w3-text-black"><b>User ID</b></label> <input class="w3-input w3-border" name="userid" type="text" required>
        </p>

        <p>
        <label class="w3-text-black"><b>Passcode</b></label> <input class="w3-input w3-border" name="passcode" type="password" required>
        </p>

        <p>
        <label class="w3-text-black"><b>Retype Passcode</b></label> <input class="w3-input w3-border" name="retype_passcode" type="password" required>
        </p>

        <p class="w3-right">
        <button type="submit" class="w3-btn w3-green">Insert</button> <a href="users-form.php" class="w3-btn w3-red">Cancel</a> </p>
        
    </form>
</div>

</div>
</body>
</html>