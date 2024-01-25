<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gesture = $_GET['gesture'];
    $email = $_SESSION['email'];
    $allowedTables = ['gesture5', 'gesture6', 'gesture7', 'gesture8', 'gesture9', 'gesture10', 'gesture11', 'gesture12', 'gesture13', 'gesture14'];
    $tableName = 'gesture' . $gesture;
    $colName = 'GESTURE' . $gesture;
    
    // Check if the table name is allowed
    if (!in_array($tableName, $allowedTables)) {
        echo "Error: Invalid table name.";
        exit;
    }

    // Retrieve form data
    $display = isset($_POST['display']) ? $_POST['display'] : '';
    $finger1 = isset($_POST['finger1']) ? (int)$_POST['finger1'] : 0;
    $finger2 = isset($_POST['finger2']) ? (int)$_POST['finger2'] : 0;
    $finger3 = isset($_POST['finger3']) ? (int)$_POST['finger3'] : 0;
    $finger4 = isset($_POST['finger4']) ? (int)$_POST['finger4'] : 0;

    
    $sql = "SELECT
    DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4, COUNT(*) AS occurrences
FROM (
    SELECT DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4 FROM gesture5
    UNION ALL
    SELECT DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4 FROM gesture6
    UNION ALL
    SELECT DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4 FROM gesture7
    UNION ALL
    SELECT DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4 FROM gesture8
    UNION ALL
    SELECT DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4 FROM gesture9
    UNION ALL
    SELECT DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4 FROM gesture10
    UNION ALL
    SELECT DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4 FROM gesture11
    UNION ALL
    SELECT DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4 FROM gesture12
    UNION ALL
    SELECT DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4 FROM gesture13
    UNION ALL
    SELECT DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4 FROM gesture14
) AS all_gestures
GROUP BY DISPLAY, FINGER1, FINGER2, FINGER3, FINGER4
HAVING COUNT(*) < 1
AND (
    (FINGER1 != 0 AND FINGER2 != 0 AND FINGER3 != 0 AND FINGER4 != 0)
)";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Show error message
        echo "Error: Duplicate values found.";
    } else {
     $updateGestureQuery = "UPDATE $tableName AS G 
                           INNER JOIN users AS U ON G.USER_ID = U.USER_ID
                           SET G.DISPLAY = ?, G.FINGER1 = ?, G.FINGER2 = ?, G.FINGER3 = ?, G.FINGER4 = ?
                           WHERE U.USER_ID = G.USER_ID";
    $updateGestureStmt = $conn->prepare($updateGestureQuery);

    if ($updateGestureStmt) {
        $updateGestureStmt->bind_param("siiii", $display, $finger1, $finger2, $finger3, $finger4);
        $updateGestureStmt->execute();
        $updateGestureStmt->close();
        header("Location: ../pages/Success.php?email=$email");
    } else {
        echo "Error preparing update statement: " . $conn->error;
        exit;
    }


    $updateQuery = "UPDATE gesture AS G 
                    INNER JOIN $tableName AS T ON G.USER_ID = T.USER_ID
                    SET G.$colName = ?
                    WHERE G.USER_ID = T.USER_ID";
    $updateStmt = $conn->prepare($updateQuery);

    if ($updateStmt) {
        $updateStmt->bind_param("s", $display);
        $updateStmt->execute();
        $updateStmt->close();
        echo "Update successful!";
        header("Location: ../pages/Success.php?email=$email");
        exit;
    } else {
        echo "Error preparing update statement: " . $conn->error;
    }
    }
    
    
}
?>
