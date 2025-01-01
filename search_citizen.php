<?php
include 'includes/header.php';
include 'db_connection.php';  

if (isset($_GET['citizen_id']) && !empty($_GET['citizen_id'])) {
    $id = $_GET['citizen_id'];  

    $sql = "SELECT * FROM citizens WHERE citizen_id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    $stmt->bind_param("s", $id);  
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<style>
                table {
                    width: 80%;
                    margin: 20px auto;
                    border-collapse: collapse;
                    text-align: left;
                }

                table, th, td {
                    border: 1px solid #ddd;
                    padding: 10px;
                }

                th {
                    background-color: #f2f2f2;
                    text-align: center;
                }

                td {
                    text-align: center;
                }

                form {
                    width: 50%;
                    margin: 20px auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    background-color: #f9f9f9;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                form label {
                    display: block;
                    margin-bottom: 8px;
                    font-weight: bold;
                }

                form input, form button {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 15px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }

                form button {
                    background-color: #004aad;
                    color: white;
                    font-size: 16px;
                    cursor: pointer;
                }

                form button:hover {
                    background-color: #003580;
                }
              </style>';

        echo "<h1 style='text-align: center;'>Citizen Details</h1>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Gender</th><th>Nationality</th><th>Address</th><th>Contact</th></tr>";
        
        $row = $result->fetch_assoc(); 
        
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['citizen_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date_of_birth']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nationality']) . "</td>";
        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['contact_info']) . "</td>";
        echo "</tr>";
        echo "</table>";
        
        echo '<h2 style="text-align: center;">Update Citizen Details</h2>';
        echo '<form action="update_citizen.php" method="POST">
                <input type="hidden" name="id" value="' . htmlspecialchars($row['citizen_id']) . '">
                
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="' . htmlspecialchars($row['name']) . '" required>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="' . htmlspecialchars($row['date_of_birth']) . '" required>

                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" value="' . htmlspecialchars($row['gender']) . '" required>

                <label for="nationality">Nationality:</label>
                <input type="text" id="nationality" name="nationality" value="' . htmlspecialchars($row['nationality']) . '" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="' . htmlspecialchars($row['address']) . '" required>

                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" value="' . htmlspecialchars($row['contact_info']) . '" required>

                <button type="submit">Update</button>
              </form>';
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
