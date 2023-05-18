<?php 
	include('server.php');
  	if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
	  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>home</title>
</head>
<body>
<?php require 'nav1.php' ?>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="welcome"><h2>Welcome<h2></div>
	
	<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
	<?php if (isset($_SESSION['username'])) {
			$username = $_SESSION['username'];
	  // Select the column item based on the username
	  $sql = "SELECT Category FROM users WHERE username = '$username'";
	  $result = mysqli_query($db, $sql);
	  if (mysqli_num_rows($result) > 0) {
		// Fetch the row and retrieve the column value
		$row = mysqli_fetch_assoc($result);
		$columnValue = $row['Category'];
		//echo $columnValue;
	} else {
		echo "No matching username found.";
	}
	}?>
	
	<script>
  // Echo the category value as a JavaScript variable
  var category = '<?php echo $columnValue; ?>';

  function redirectToPage() {
    if (category === 'admin') {
      // Redirect to page1.php
      window.location.href = "admin.php";
    } else if (category === 'student') {
      // Redirect to page2.php
      window.location.href = "feedback.php";
    } else {
      // Redirect to default-page.php
      window.location.href = "default-page.php";
    }
  }
</script>
  </script>
  <button type="button" onclick="redirectToPage()">P</button>
	

	
</div>
</body>
</html>