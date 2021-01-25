<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        var currentUserID = null;
    </script>

    <script type="text/javascript" src="js/app.js"></script>
</head>
<body>
    <div class="frm">
        <form method="POST">
            <h1 class="head1">Registration</h1>
            <label for="">FullName:</label>
            <input type="text" name="name" id="fullname" placeholder="fullname">
            <br><br>
            <label for="">Username:</label>
            <input type="text" name="username" id="username" placeholder="username">
            <br><br>
            <label for="">Password:</label>
            <input type="password" name="password" id="password" placeholder="password">
            <br><br>
            <div>
                <button type="button" value="Register" id="register">Register</button>
                <p>
                    already got an account?<a href="login.php"> Sign In</a>
                </p>
                
            </div>
        </form>
    </div>
    
</body>
</html>