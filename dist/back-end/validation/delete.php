<?php
require '../Config.php'; // Adjust the path as needed

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['gestureId'])) {
    $gestureId = $_POST['gestureId'];

    // Prepare and execute your update query
    $stmt = $conn->prepare("UPDATE gesture SET gesture_content = '' WHERE gesture_id = ?");
    $stmt->bind_param("i", $gestureId);
    $success = $stmt->execute();

    if ($success) {
        // Redirect or handle the successful update
        header('Location: path_to_redirect_after_deletion.php');
    } else {
        // Handle error
        echo "Error: " . $conn->error;
    }
} else {
    // Handle invalid request
    echo "Invalid request";
}
?>
