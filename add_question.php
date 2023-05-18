
<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $question = $_POST['question'];
  $options = $_POST['options'];
  $correctOption = $_POST['correct_option'];

  // Insert the question into the database
  $query = "INSERT INTO questions (question) VALUES (?)";
  $stmt = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($stmt, "s", $question);
  mysqli_stmt_execute($stmt);

  // Get the ID of the inserted question
  $questionId = mysqli_insert_id($db);

  // Insert the options into the database
  $optionQuery = "INSERT INTO options (question_id, option_text, is_correct) VALUES (?, ?, ?)";
  $optionStmt = mysqli_prepare($db, $optionQuery);

  foreach ($options as $index => $option) {
    $isCorrect = ($index + 1) == $correctOption ? 1 : 0; // Set the correct option

    mysqli_stmt_bind_param($optionStmt, "isi", $questionId, $option, $isCorrect);
    mysqli_stmt_execute($optionStmt);
  }

  // Redirect to a success page or display a success message
  header('location: question_added.php');
  exit();
}
?>