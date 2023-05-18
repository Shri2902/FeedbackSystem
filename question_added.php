<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// Retrieve the questions and their options from the database
$query = "SELECT * FROM questions";
$result = mysqli_query($db, $query);

// Display the questions and options
while ($row = mysqli_fetch_assoc($result)) {
  $question_id = $row['id'];
  $question_text = $row['question'];

  // Retrieve the options for each question
  $options_query = "SELECT * FROM options WHERE question_id = $question_id";
  $options_result = mysqli_query($db, $options_query);

  echo "<h3>$question_text</h3>";

  while ($option_row = mysqli_fetch_assoc($options_result)) {
    $option_id = $option_row['id'];
    $option_text = $option_row['option_text'];

    echo "<input type='radio' name='option_$question_id' value='$option_id'> $option_text <br>";
  }

  echo "<br>";
}

// Add a submit button to submit the answers
echo "<input type='submit' name='submit_answers' value='Submit Answers'>";
?>
