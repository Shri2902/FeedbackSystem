<?php
// display.php
// Connect to the database
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'project';

// Create a new mysqli object for the database connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the feedback questions from the database
$sql = "SELECT * FROM feedback_questions";
$result = mysqli_query($conn, $sql);

// Display the questions
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row['question'] . "</p>";
    }
} else {
    echo "No feedback questions found.";
}

// Close the database connection
mysqli_close($conn);
?>