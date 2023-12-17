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

    $sourceQuery1 = "SELECT * FROM users WHERE USER_ID = (SELECT MAX(USER_ID) FROM users)";
    $results = mysqli_query($conn, $sourceQuery1);
    $rows = mysqli_fetch_assoc($results);
  
    if ($rows === false || empty($rows)) {
        $foreignkey = 1; 
    } else {
        $foreignkey = $rows['USER_ID'] + 1; 
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

    // Prepare SQL statement for insertion
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Bind parameters to the SQL statement
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashedPassword);

    // Execute SQL statement
    $stmt->execute();

    $insert_gesture = $conn->prepare("INSERT INTO gesture (GESTURE1,GESTURE2,GESTURE3,GESTURE4,USER_ID) VALUES (?,?,?,?,?)");
    $insert_gesture->bind_param("ssssi", $gesture1, $gesture2, $gesture3 , $gesture4 , $foreignkey);
    $insert_gesture->execute();


    header("Location: ../pages/Login.php");

    // Close statement
    $stmt->close();

  
  }
?>
