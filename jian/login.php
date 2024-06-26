<?php
@include 'db_conn.php';
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];
            header('location:admin.php');
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            header('location:user.php');
        }
    } else {
        $error[] = 'incorrect email or password!';
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/forms.png">
</head>

<body>
    <div class="form-container">
        <form action="" method="POST">
            <h3>Login now</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a class="btn" href="register.php">Register now</a></p>
        </form>
    </div>
</body>

</html>