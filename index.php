<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>home</title>
</head>

<body>
  <?php require 'nav1.php' ?>

  <div class="header">
    <h2>Home Page</h2>
  </div>
  <div class="welcome">
    <h2>Welcome<h2>
  </div>

  <div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])): ?>
      <div class="error success">
        <h3>
          <?php
          echo $_SESSION['success'];
          unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php if (isset($_SESSION['username'])): ?>
      <p>Welcome to Student Feedback Project</p>

      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>


    <script>
      function redirectToPage() {
        window.location.href = "login.php";
      }
    </script>
    <button type="button" onclick="redirectToPage()">Login</button>
    <script>
      function redirectToPage1() {
        window.location.href = "register.php";
      }
    </script>
    <button type="button" onclick="redirectToPage1()">Sign Up</button>
  </div>
</body>

</html>