<?php
session_start();

// Redirect to login if user is not logged in
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Success</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h2>Login Success</h2>
    </div>

    <div class="content">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="success">
                <h3>
                    <?php echo $_SESSION['success']; ?>
                </h3>
            </div>
        <?php endif ?>

        <?php if (isset($_SESSION['username'])): ?>
            <p>Welcome,
                <?php echo $_SESSION['username']; ?>
            </p>
            <p><a href="logout.php">Logout</a></p>
        <?php endif ?>
    </div>

</body>

</html>