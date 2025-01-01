<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; 
    $name = $_POST['name'];
    $job = $_POST['job'];
    $start = $_POST['start'];  
    $end = $_POST['end'];  
    $salary = $_POST['salary'];

    $sql = "UPDATE employment_detail SET employer_name = ?, job_title = ?, employment_start_date = ?, employment_end_date = ?, salary = ? WHERE citizen_id = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("sssssi", $name, $job, $start, $end, $salary, $id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Employee record updated successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        die('MySQL prepare error: ' . $conn->error);
    }
} else {
    echo "Invalid request method.";
}

// Close the connection
$conn->close();
?>
