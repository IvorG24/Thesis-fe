<?php
// Start the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = "";
$user_gloves_settings = "";

// Attempt to fetch the user's profile information
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Prepare a select statement
    $sql = "SELECT username, gloves_settings FROM users WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = $_SESSION["id"];

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if user exists, if yes then fetch result
            if (mysqli_stmt_num_rows($stmt) == 1) {
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $username, $user_gloves_settings);
                mysqli_stmt_fetch($stmt);
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <!-- Add additional tags and styling as needed -->
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($username); ?></b>. Welcome to your profile.</h1>
    </div>
    <p>
        <!-- Display user's gloves settings or other relevant information -->
        <?php echo $user_gloves_settings; ?>
    </p>
    <p>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>
