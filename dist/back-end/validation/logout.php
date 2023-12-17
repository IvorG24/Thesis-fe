<?php
session_start();

require '../Config.php'; // Ensure this points to your database configuration file



if (isset($_SESSION['USER_ID'])) {
    $user_id = $_SESSION['USER_ID'];

    // Clear the session ID in the database
    $update_stmt = $conn->prepare("UPDATE users SET SESSION_ID = NULL WHERE USER_ID = ?");
    if ($update_stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $update_stmt->bind_param("i", $user_id);
    if (!$update_stmt->execute()) {
        die("Error executing update: " . $update_stmt->error);
    }

    $update_stmt->close();
}

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or home page
header("Location: ../../pages/login.php");
exit;
?>
