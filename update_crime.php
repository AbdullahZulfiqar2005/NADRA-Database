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


    $sql = "UPDATE criminal_records SET offense_type=?, date_of_offense=?, conviction_status=?, sentence_details=? where citizen_id = ? ";

    if ($stmt = $conn->prepare(query: $sql)) {
        $stmt->bind_param("sssss", $crime, $date, $status, $details, $id);

        if ($stmt->execute()) {
            echo "Criminal record updated successfully.";
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
