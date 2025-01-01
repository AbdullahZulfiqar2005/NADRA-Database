<?php
include 'includes/header.php';
include 'db_connection.php';  

if (isset($_GET['citizen_id']) && !empty($_GET['citizen_id'])) {
    $id = $_GET['citizen_id'];  

    $sql = "SELECT * FROM employment_detail WHERE citizen_id = ?";
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

        echo "<h1 style='text-align: center;'>Criminal Details</h1>";
        echo "<table>";
        echo "<tr><th>Employee ID</th><th>ID</th><th>Name</th><th>Job</th><th>Start Date</th><th>End Date</th><th>Salary</th></tr>";

        $row = $result->fetch_assoc(); 
        
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['employment_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['citizen_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['employer_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['job_title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['employment_start_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['employment_end_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['salary']) . "</td>";
        echo "</tr>";
        echo "</table>";
        
        echo '<h2 style="text-align: center;">Update Citizen Details</h2>';
        echo '<form action="update_employee.php" method="POST">
                <input type="hidden" name="id" value="' . htmlspecialchars($row['employment_id']) . '">
                
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" value="' . htmlspecialchars($row['citizen_id']) . '" required>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="' . htmlspecialchars($row['employer_name']) . '" required>

                <label for="job">Job Title:</label>
                <input type="text" id="job" name="job" value="' . htmlspecialchars($row['job_title']) . '" required>

                <label for="start">Start Date:</label>
                <input type="date" id="start" name="start" value="' . htmlspecialchars($row['employment_start_date']) . '" required>

                <label for="end">End Date:</label>
                <input type="date" id="end" name="end" value="' . htmlspecialchars($row['employment_end_date']) . '" required>

                <label for="salary">Salary:</label>
                <input type="text" id="salary" name="salary" value="' . htmlspecialchars($row['salary']) . '" required>

                <button type="submit">Update</button>
              </form>';
    } else {
        echo "<p style='text-align: center;'>No citizen found with ID: " . htmlspecialchars($id) . "</p>";
    }

    $stmt->close();
} else {
    echo '<form action="search_crime.php" method="GET" style="text-align: center; margin-top: 20px;">
            <input type="text" name="id" placeholder="Enter criminal ID" required style="padding: 10px; width: 250px; border: 1px solid #ccc; border-radius: 5px;">
            <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Search</button>
          </form>';
}

$conn->close();
?>
