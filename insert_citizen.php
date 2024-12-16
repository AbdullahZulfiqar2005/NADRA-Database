<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // if (empty($name) || empty($id) || empty($dob) || empty($father_name) || empty($address) || empty($contact)) {
    //     die('All fields are required!');
    // }


    $sql = "INSERT INTO citizens (citizen_id, name, date_of_birth, gender, nationality , address, contact_info) VALUES (?, ?, ?, ?, ?, ?,?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssss", $id, $name, $dob, $gender, $nationality, $address, $contact);

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
