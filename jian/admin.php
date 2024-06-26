<?php
@include 'db_conn.php';
session_start();
if (!isset($_SESSION['admin_name'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/logo-admin.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="content">
            <h3>Welcome, <span>Admin</span></h3>
            <h1><span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <p>This is an admin page</p>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>
</body>

</html>