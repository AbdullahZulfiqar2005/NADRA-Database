<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $citizen_id = $_POST['citizen_id'];
    $card_type = $_POST['card_type'];
    $issue_date = $_POST['issue_date'];
    $expiry_date = $_POST['expiry_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO identity_card_issuance (
        citizen_id, 
        card_type, 
        issue_date, 
        expiry_date, 
        status
    ) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", 
            $citizen_id, 
            $card_type, 
            $issue_date, 
            $expiry_date, 
            $status
        );

        if ($stmt->execute()) {
            echo "Citizen record inserted successfully.";
            header("Location: success.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

