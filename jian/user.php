<?php
@include 'db_conn.php';
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/logo-user.png">
</head>

<body>
    <div class="container">
        <div class="content">
            <h3>Hi, <span>User</span></h3>
            <h1><span><?php echo $_SESSION['user_name'] ?></span></h1>
            <p>This is an user page</p>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>
</body>

</html>