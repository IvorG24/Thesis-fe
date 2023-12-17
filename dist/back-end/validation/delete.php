<?php
session_start();
require '../Config.php'; // Adjust the path as needed



    $encodedEmail = urlencode($email);
    
    $stmt1 = $conn->prepare("SELECT * FROM users WHERE EMAIL = ?");
    $stmt1->bind_param("s", $emailuser); 
    $stmt1->execute();
    $result = $stmt1->get_result(); 
    $userData = null;
    if ($row = $result->fetch_assoc()) {
        $userData = $row;

    }
    $user_id = $userData ? $userData['USER_ID'] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    
    $gestureId = $_POST['gestureId'];
    $Gesture = $gestureId;
    $stmt = $conn->prepare("UPDATE gesture g INNER JOIN users u ON g.USER_ID = u.USER_ID SET g.`$Gesture` = NULL WHERE u.USER_ID = ?");
    $stmt->bind_param("i", $user_id);
    $success = $stmt->execute();

    if ($success) {
        echo $user_id;
        // header("Location: ../pages/Success.php?email=$emailuser");
    } else {
        // Handle error
        echo "Error: " . $conn->error;
    }
} else {
    // Handle invalid request
    echo "Invalid request";
}
?>
