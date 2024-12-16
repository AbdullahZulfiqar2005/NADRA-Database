<?php
include 'includes/header.php';
include 'db_connection.php';  

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];  

    $sql = "SELECT dob FROM citizens WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    $stmt->bind_param("s", $id);  
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dob = $row['dob'];

        $currentDate = new DateTime();
        $dateOfBirth = new DateTime($dob); 
        $age = $currentDate->diff($dateOfBirth)->y; 

        if ($age >= 18) {
            echo "<p style='text-align: center;'>Yes, you can vote. Your age is " . htmlspecialchars($age) . "</p>";
        } else {
            echo "<p style='text-align: center;'>You are a kid. Grow up first." . htmlspecialchars($id) . "</p>";
        }
    } else {
        echo "<p style='text-align: center;'>No citizen found with ID: " . htmlspecialchars($id) . "</p>";
    }

    $stmt->close();
} else {
    echo '<form action="search_citizen.php" method="GET" style="text-align: center; margin-top: 20px;">
            <input type="text" name="id" placeholder="Enter Citizen ID" required style="padding: 10px; width: 250px; border: 1px solid #ccc; border-radius: 5px;">
            <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Search</button>
          </form>';
}

$conn->close();
?>
