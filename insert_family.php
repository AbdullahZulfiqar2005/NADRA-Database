<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_POST['citizen_id'];
    $rid = $_POST['relative_id'];
    $type = $_POST['relationship_type'];


    $sql = "INSERT INTO family_relations (citizen_id, relative_id, relationship_type) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $cid, $rid, $type);

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
