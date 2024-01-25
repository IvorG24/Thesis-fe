<?php
  require 'config.php';
  require './validation/passwordvalidation.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get data from POST request
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordVerify = $_POST['passwordVerify'];
    $passwordErr="";
    $emailErr="";
    $gesture1 = "⬆️";
    $gesture2 = "STOP";
    $gesture3 = "<< LEFT";
    $gesture4 = " RIGHT >>";
    $display = $_POST['display'] ?? '';
    $finger1 = $_POST['finger1'] ?? 0;
    $finger2 = $_POST['finger2'] ?? 0;
    $finger3 = $_POST['finger3'] ?? 0;
    $finger4 = $_POST['finger4'] ?? 0;

    $sourceQuery1 = "SELECT MAX(USER_ID) AS max_user_id FROM users";
    $results = mysqli_query($conn, $sourceQuery1);
    $row = mysqli_fetch_assoc($results);
    
    if ($row === null) {
        $foreignkey = 1;
    } else {
        $foreignkey = $row['max_user_id'] + 1;
    }
    
    // Check if passwords match
    if ($password !== $passwordVerify) {
      $passwordErr ="Error: Passwords do not match.";
      header("Location: ../pages/Signup.php?passwordErr=" . urlencode($passwordErr));
      exit;
  }
  
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
      $emailErr = "Error: Email already exists.";
      header("Location: ../pages/Signup.php?emailErr=" . urlencode($emailErr));
      exit;
  }
  
  $stmt->close();
  
  $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashedPassword);
  
  // Execute the statement and check for errors
  if (!$stmt->execute()) {
      // Handle the error (e.g., display an error message)
      echo "Error: " . $stmt->error;
      exit;
  }
  
  $insert_gesture = $conn->prepare("INSERT INTO gesture (GESTURE1, GESTURE2, GESTURE3, GESTURE4, USER_ID) VALUES (?, ?, ?, ?, ?)");
  $insert_gesture->bind_param("ssssi", $gesture1, $gesture2, $gesture3, $gesture4, $foreignkey);
  $insert_gesture->execute();



  for ($i = 1; $i <= 4; $i++) {
    $label = 'gesture' . $i;
    $insert_gesture = $conn->prepare("INSERT INTO $label (DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4, USER_ID) VALUES (?, ?, ?, ?, ?, ?)");
    $insert_gesture->bind_param("siiiii", ${'gesture'.$i}, $finger1, $finger2, $finger3, $finger4, $foreignkey);
    $insert_gesture->execute();
}

  $gestureTables = array(5, 6, 7, 8, 9, 10, 11, 12, 13, 14);

  foreach ($gestureTables as $table) {
    $label = 'gesture' . $table;
    $insert_statement = $conn->prepare("INSERT INTO $label (DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4, USER_ID) VALUES (?, ?, ?, ?, ?, ?)");
    $insert_statement->bind_param("siiiii", $display, $finger1, $finger2, $finger3, $finger4, $foreignkey);
    $insert_statement->execute();
}
  // Execute the statement and check for errors
  if (!$insert_gesture && !$insert_statement ->execute()) {
      // Handle the error (e.g., display an error message)
      echo "Error: " . $insert_gesture->error;
      exit;
  }    
    header("Location: ../pages/Login.php");

    // Close statement
    $stmt->close();

  
  }
?>
