<?php
  session_start();
  require './validation/passwordvalidation.php';
  require 'config.php';

  $email = "";
  $password = "";
  $loginErr = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $loginErr = "Invalid email format";
      header("Location: ../pages/Login.php?loginErr=" . urlencode($loginErr));
      exit;
    }

    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE EMAIL = ?");
    $stmt->bind_param("s", $email); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) { 
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['PASSWORD'])) {
            // Regenerate session ID
            session_regenerate_id();

            $_SESSION['USER_ID'] = $user['USER_ID'];
            $_SESSION['email'] = $email;
    
            // Get the new session ID and store it in the database
            $newSessionId = session_id();
            $update_stmt = $conn->prepare("UPDATE users SET SESSION_ID = ? WHERE USER_ID = ?");
            $update_stmt->bind_param("si", $newSessionId, $user['USER_ID']);
            $update_stmt->execute();
            $update_stmt->close();

            header("Location: ../pages/Success.php");
            exit;
    
        } else {
            $loginErr = "Incorrect password!";
            header("Location: ../pages/Login.php?loginErr=" . urlencode($loginErr));
            exit;
        }
    } else {
        $loginErr = "No user found with the specified email!";
        header("Location: ../pages/Login.php?loginErr=" . urlencode($loginErr));
        exit;
    }

   
  }
  $stmt->close();
?>
