<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_POST['cid'];
    $rid = $_POST['rid'];
    $type = $_POST['type'];


    $sql = "UPDATE family_relations SET relative_id = ?, relationship_type=? where citizen_id = ? ";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssi", $rid, $type, $cid);

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
