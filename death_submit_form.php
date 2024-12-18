<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_POST['citizen_id'];
    $did = $_POST['death_record_id'];
    $date = $_POST['date_of_death'];
    $place = $_POST['place_of_death'];
    $cause= $_POST['cause_of_death'];


    $sql = "INSERT INTO death_records (death_record_id, citizen_id, date_of_death, place_of_death,cause_of_death) VALUES (?, ?, ?,?,?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $did, $cid, $date, $place, $cause);

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
