<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $crime = $_POST['crime'];
    $details= $_POST['details'];
    $status = $_POST['status'];
    $date= $_POST['date'];

    if (empty($details) || empty($id) || empty($crime)|| empty($date)) {
        die('All fields are required!');
    }


    $sql = "INSERT INTO criminal_records (citizen_id , offense_type, date_of_offense, conviction_status, sentence_details) VALUES (?, ?, ?, ?,?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss",  $id, $crime, $date, $status, $details);

        if ($stmt->execute()) {
            echo "Criminal record inserted successfully.";
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
