<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];


    $sql = "INSERT INTO feedback_and_complaints (id, name, description) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $cid, $name, $description);

        if ($stmt->execute()) {
            echo "Support record inserted successfully.";
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
