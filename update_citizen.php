<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];  
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];  
    $nationality= $_POST['nationality'];  
    $address = $_POST['address'] ;
    $contact = $_POST['contact'];

    $sql = "UPDATE citizens SET name = ?, date_of_birth = ?, gender = ?, nationality = ?, address = ?, contact_info = ? WHERE citizen_id = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    $stmt->bind_param("sssssss", $name, $date_of_birth, $gender, $nationality, $address, $contact, $id);

    if ($stmt->execute()) {
        echo "Citizen record updated successfully.";
        echo '<a href="search_citizen.php?id=' . htmlspecialchars($id) . '">View Updated Citizen</a>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
