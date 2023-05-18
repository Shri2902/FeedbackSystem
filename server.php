<?php
session_start();

// initializing variables
$username = "";
$email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {

  $role = $_POST['role'];

  // Perform role-specific actions or database operations
  if ($role === 'Student') {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    $user_check_query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
    $stmt = mysqli_prepare($db, $user_check_query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }

      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }
    }

    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($email)) {
      array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
      array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
      // Hash the password
      $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);

      // Insert user data into the database
      $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
      $stmt = mysqli_prepare($db, $query);
      mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
      mysqli_stmt_execute($stmt);

      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now registered";
      header('location: registration_success.php');
      exit();
    }
  } elseif ($role === 'Faculty') {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // Check if the username or email already exists
    $user_check_query = "SELECT * FROM faculty WHERE username=? OR email=? LIMIT 1";
    $stmt = mysqli_prepare($db, $user_check_query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }

      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }
    }

    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($email)) {
      array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
      array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
      // Hash the password
      $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);

      // Insert user data into the database
      $query = "INSERT INTO faculty (username, email, password) VALUES (?, ?, ?)";
      $stmt = mysqli_prepare($db, $query);
      mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
      mysqli_stmt_execute($stmt);

      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now registered";
      header('location: registration_success.php');
      exit();
    }
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $role = $_POST['role'];
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    if ($role === 'Student') {
      $query = "SELECT * FROM users WHERE username=?";
    } elseif ($role === 'Faculty') {
      $query = "SELECT * FROM faculty WHERE username=?";
    } elseif ($role === 'Admin') {
      // Define your predefined admin usernames and passwords
      $adminCredentials = array(
        'Nishal' => 'abcdefgh',
        'Shriprada' => 'abcdefgh',
        'Amod' => 'abcdefgh'
      );

      if (isset($adminCredentials[$username]) && $adminCredentials[$username] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in as an admin";
        header('location: admin_dashboard.php');
        exit();
      } else {
        array_push($errors, "Wrong username/password combination");
      }
    } else {
      array_push($errors, "Invalid role");
    }

    // Only execute the query for student and faculty login
    if ($role === 'Student' || $role === 'Faculty') {
      $stmt = mysqli_prepare($db, $query);
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if ($role === 'Student' && password_verify($password, $user['password'])) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in as a student";
          header('location: login_success.php');
          exit();
        } elseif ($role === 'Faculty' && $password === $user['password']) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in as a faculty";
          header('location: login_success.php');
          exit();
        } else {
          array_push($errors, "Wrong username/password combination");
        }
      } else {
        array_push($errors, "Wrong username/password combination");
      }
    }
  }
}


?>