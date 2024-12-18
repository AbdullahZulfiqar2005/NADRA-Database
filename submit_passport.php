<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $application_id = $_POST['application_id'];
    $citizen_id = $_POST['citizen_id'];
    $application_date = $_POST['application_date'];
    $passport_number = $_POST['passport_number'];
    $issue_date = $_POST['issue_date'];
    $expiry_date = $_POST['expiry_date'];
    $application_status = $_POST['application_status'];

    $sql = "INSERT INTO passport_application (
        citizen_id, 
        application_date, 
        passport_number, 
        issue_date, 
        expiry_date, 
        application_status
    ) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param( "ssssss", 
        $citizen_id, 
        $application_date, 
        $passport_number, 
        $issue_date, 
        $expiry_date, 
        $application_status);

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
