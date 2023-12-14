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
    // Check if passwords match
    if ($password !== $passwordVerify) {
      $passwordErr ="Error: Passwords do not match.";
      header("Location: ../pages/Signup.php?passwordErr=" . urlencode($passwordErr));
      exit;
    }

    // Check if email already exists
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

    header("Location: ../pages/Login.php");

    // Close statement
    $stmt->close();

  
  }
?>
