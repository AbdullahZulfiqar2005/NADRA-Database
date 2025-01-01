<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['citizen_id'];
    $name = $_POST['employer_name'];
    $job = $_POST['job_title'];
    $start = $_POST['employment_start_date'];
    $end = $_POST['employment_end_date'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employment_detail (citizen_id, employer_name, job_title, employment_start_date , employment_end_date, salary) VALUES (?, ?, ?, ?, ?,?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssss",  $id, $name, $job, $start, $end, $salary);

        if ($stmt->execute()) {
            echo "Employee record inserted successfully.";
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
