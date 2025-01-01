<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $prev = $_POST['prev'];
    $current= $_POST['current'];
    $move_in = $_POST['move_in'];
    $move_out = $_POST['move_out'];


    $sql = "UPDATE address_history SET previous_address=?, current_address=?, move_in_date=?, move_out_date=? where citizen_id = ? ";

    if ($stmt = $conn->prepare(query: $sql)) {
        $stmt->bind_param("ssssi", $prev, $current, $move_in, $move_out, $id);

        if ($stmt->execute()) {
            echo "Address record updated successfully.";
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
