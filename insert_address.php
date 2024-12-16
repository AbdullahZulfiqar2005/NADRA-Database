<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['aid'];
    $cid = $_POST['id'];
    $prev = $_POST['prev'];
    $current = $_POST['current'];
    $move_in = $_POST['move_in'];
    $move_out = $_POST['move_out'];

    $sql = "INSERT INTO address_history (address_history_id, citizen_id, previous_address, current_address, move_in_date , move_out_date) VALUES (?, ?, ?, ?, ?,?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssss", $id, $cid, $prev, $current, $move_in, $move_out);

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
