<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration Success</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Registration Success</h2>
  </div>

  <div class="content">
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="success">
        <h3><?php echo $_SESSION['success']; ?></h3>
      </div>
    <?php endif ?>

    <?php if (isset($_SESSION['username'])) : ?>
      <p>Welcome, <?php echo $_SESSION['username']; ?></p>
      <p><a href="login.php">Click here to login</a></p>
    <?php endif ?>
  </div>

</body>
</html>

<?php
// Clear the session variables
session_unset();

// Destroy the session
session_destroy();
?>
