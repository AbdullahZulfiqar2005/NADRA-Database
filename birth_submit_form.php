<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_POST['citizen_id'];
    $bid = $_POST['birth_record_id'];
    $date = $_POST['birth_date'];
    $place = $_POST['birth_place'];
    $father= $_POST['father_name'];


    $sql = "INSERT INTO birth_records (birth_record_id, citizen_id, birth_date, birth_place,father_name) VALUES (?, ?, ?,?,?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $bid, $cid, $date, $place, $father);

        if ($stmt->execute()) {
            echo "Family record inserted successfully.";
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
