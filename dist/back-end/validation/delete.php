<?php
session_start();
require '../Config.php'; // Adjust the path as needed



    $encodedEmail = urlencode($email);
    $finger1 = 0;
    $finger2 = 0;
    $finger3 = 0;
    $finger4 = 0;
    $display= '';
    $stmt1 = $conn->prepare("SELECT * FROM users WHERE EMAIL = ?");
    $stmt1->bind_param("s", $emailuser); 
    $stmt1->execute();
    $result = $stmt1->get_result(); 
    $userData = null;
    if ($row = $result->fetch_assoc()) {
        $userData = $row;

    }
    $user_id = $userData ? $userData['USER_ID'] : null;
    $gestureId = $_POST['gestureId'];
    $Gesture = $gestureId;
    $labelgesture = strtolower($Gesture);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    

    $stmt = $conn->prepare("UPDATE gesture g INNER JOIN users u ON g.USER_ID = u.USER_ID SET g.`$Gesture` = NULL WHERE u.USER_ID = ?");
    $stmt->bind_param("i", $user_id);
    $success = $stmt->execute();

   

    if ($success) {
        header("Location: ../pages/Success.php?email=$emailuser");
    } else {
        // Handle error
        echo "Error: " . $conn->error;
    }
} else {
    // Handle invalid request
    echo "Invalid request";
}
?>
