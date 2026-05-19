<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container w3-margin-top">

<div class="w3-container w3-half w3-margin-top">
    <h2>Login</h2>
    <p>Please, Register or Login to our site first !</p>

    <form class="w3-container w3-card-4 w3-padding" action="login-access.php" method="POST">
        <p>
            <label class="w3-text-black"><b>User ID</b></label>
            <input class="w3-input w3-border" name="userid" type="text" required>
        </p>
        <p>
            <label class="w3-text-black"><b>Passcode</b></label>
            <input class="w3-input w3-border" name="passcode" type="password" required>
        </p>
        <p>
            <button type="submit" class="w3-btn w3-blue">Signin</button>
        </p>
    </form>
</div>

</body>
</html>