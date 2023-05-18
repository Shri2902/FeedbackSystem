<?php
$errors = array(); 
// ADMIN USER
$conn = mysqli_connect('localhost', 'root', '', 'project');
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the question from the form
    $question = $_POST['question'];
  
    // Validate the question (you can add more validation if needed)
    if (!empty($question)) {
      // Store the question in the database or any other desired processing
      $question = mysqli_real_escape_string($conn, $_POST['question']);
    
      // Here, we are just displaying the question for demonstration purposes
      echo "Question added successfully: " . $question;
    } else {
      echo "Please provide a question.";
  
    }
    if (count($errors) == 0) {
        
  
        $query = "INSERT INTO feedback_questions (question) 
                  VALUES('$question')";
        mysqli_query($conn, $query);
        $_SESSION['question'] = $question;
        $_SESSION['success'] = "Question is added";
        header('location: admin.php');
    }
  }
  ?>