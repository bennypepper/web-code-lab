<?php


$user_id = "";
if (isset($_GET['userid'])) {
    $user_id = $_GET['userid'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>


<div class="w3-main w3-container w3-margin-top" style="margin-left:20%">

<div class="w3-container w3-half w3-margin-top">
    <h2>Users Update</h2>
    <p>This form is used to update user passcode!</p>
    
    <form class="w3-container w3-card-4 w3-padding" action="users-update.php" method="POST">
        
        <p>
        <label class="w3-text-black"><b>User ID</b></label> 
        <input class="w3-input w3-border" name="userid" type="text" value="<?php echo htmlspecialchars($user_id); ?>" readonly required>
        </p>

        <p>
        <label class="w3-text-black"><b>New Passcode</b></label> 
        <input class="w3-input w3-border" name="passcode" type="password" required>
        </p>

        <p class="w3-right">
        <button type="submit" class="w3-btn w3-orange">Update</button> 
        <a href="users-view.php" class="w3-btn w3-red">Cancel</a> 
        </p>
        
    </form>
</div>

</div>
</body>
</html>


