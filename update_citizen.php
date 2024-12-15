<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_POST['id'];  
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $father_name = $_POST['father_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // Validate inputs (optional, add your own rules)
    if (empty($id) || empty($name) || empty($dob) || empty($father_name) || empty($address) || empty($contact)) {
        die('All fields are required!');
    }

    // Prepare the SQL query for updating the citizen's details
    $sql = "UPDATE citizens SET name = ?, dob = ?, father_name = ?, address = ?, contact = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    // Bind parameters and execute the query
    $stmt->bind_param("ssssss", $name, $dob, $father_name, $address, $contact, $id);

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
